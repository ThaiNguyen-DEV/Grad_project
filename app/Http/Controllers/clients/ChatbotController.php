<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\admin\ToursModel;

class ChatbotController extends Controller
{
    public function handleChat(Request $request)
    {
        $message = $request->input('message');
        if (!$message) {
            return response()->json(['error' => 'Vui lòng nhập tin nhắn.'], 400);
        }

        // Basic RAG Retrieval: Search for tours based on keywords in the message
        $toursModel = new ToursModel();
        $keywords = explode(' ', $message);

        $query = \DB::table('tbl_tours');

        $searchableWords = array_filter($keywords, function ($word) {
            return mb_strlen($word) > 2 && !in_array(mb_strtolower($word), ['có', 'không', 'cho', 'tôi', 'hỏi', 'về', 'tour', 'du', 'lịch', 'đi', 'đâu', 'nào', 'cái', 'gì', 'ai', 'khi', 'bao', 'nhiêu', 'tiền', 'giá', 'như', 'thế']);
        });

        if (!empty($searchableWords)) {
            $query->where(function ($q) use ($searchableWords) {
                foreach ($searchableWords as $word) {
                    $q->orWhere('title', 'like', '%' . $word . '%')
                        ->orWhere('destination', 'like', '%' . $word . '%');
                }
            });
        }

        $tours = $query->limit(4)->get();

        // Nếu không tìm thấy tour nào qua từ khóa, lấy mặc định 4 tour ngẫu nhiên hoặc mới nhất
        if ($tours->count() == 0) {
            $tours = \DB::table('tbl_tours')->limit(4)->inRandomOrder()->get();
        }

        $context = "";
        if ($tours->count() > 0) {
            $context .= "Dưới đây là một số thông tin về các tour du lịch có trong cơ sở dữ liệu có thể liên quan:\n";
            foreach ($tours as $tour) {
                $context .= "- Tên tour: " . $tour->title . "\n";
                $context .= "  Giá người lớn: " . number_format($tour->priceAdult) . " VNĐ\n";
                $context .= "  Giá trẻ em: " . number_format($tour->priceChild) . " VNĐ\n";
                $context .= "  Thời gian: " . $tour->time . "\n";
                $context .= "  Điểm đến: " . $tour->destination . "\n";
                $context .= "  Link chi tiết: /tour-detail/" . $tour->tourId . "\n\n";
            }
        } else {
            // Fallback context
            $context .= "LOTUSMILE là công ty du lịch chuyên cung cấp các tour du lịch nội địa và quốc tế hấp dẫn với giá cả phải chăng. Hãy gợi ý khách hàng xem thêm các tour mới nhất trên website.\n";
        }

        // Additional static context
        $context .= "\nThông tin chung: Trang web này là hệ thống đặt tour du lịch có tên là LOTUSMILE. Email liên hệ: contact@lotusmile.com. Số điện thoại: 1900 123 456. Địa chỉ: 166 Hà Bồng, Hòa Xuân, Đà Nẵng.\n";

        $systemPrompt = "Bạn là nhân viên tư vấn ảo thân thiện của công ty du lịch LOTUSMILE. Nhiệm vụ của bạn là tư vấn cho khách hàng về các tour du lịch.
Bạn hãy sử dụng ngữ cảnh (Context) được cung cấp dưới đây để trả lời câu hỏi của khách hàng. 
QUY TẮC TỐI THƯỢNG: TUYỆT ĐỐI KHÔNG tự bịa ra bất kỳ tour du lịch, giá cả, hoặc thông tin nào KHÔNG CÓ trong phần NGỮ CẢNH. Nếu khách hàng yêu cầu gợi ý tour mà trong ngữ cảnh không có thông tin, hãy xin lỗi và mời họ xem trực tiếp trên website. Trả lời ngắn gọn, súc tích và thân thiện bằng tiếng Việt.


QUAN TRỌNG: Khi bạn muốn liệt kê/hiển thị các tour du lịch cho khách hàng xem, BẮT BUỘC phải dùng định dạng HTML bằng cấu trúc sau cho mỗi tour (đừng dùng markdown list thông thường):
<div class=\"chat-tour-box\">
  <strong>[Tên tour]</strong><br>
  💰 Giá từ: [Giá người lớn]<br>
  ⏱ Thời gian: [Thời gian]<br>
  📍 Điểm đến: [Điểm đến]<br>
  <a href=\"[Link chi tiết]\" class=\"btn-book-tour\">Xem chi tiết</a>
</div>

[NGỮ CẢNH]
" . $context . "
[/NGỮ CẢNH]
";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.cohere.api_key'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->withOptions([
                'verify' => false,
            ])->post('https://api.cohere.ai/v1/chat', [
                'message' => $message,
                'model' => 'command-r-plus-08-2024',
                'preamble' => $systemPrompt,
                'temperature' => 0.3,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'reply' => $data['text'] ?? 'Xin lỗi, tôi không thể trả lời lúc này.'
                ]);
            } else {
                \Log::error('Cohere API Error: ' . $response->body());
                return response()->json(['error' => 'Lỗi khi gọi AI API.'], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Chatbot Controller Error: ' . $e->getMessage());
            return response()->json(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }
}
