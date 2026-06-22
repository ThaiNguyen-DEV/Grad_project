<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Services\Rag\HybridTourRetriever;
use GuzzleHttp\Handler\StreamHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleChat(Request $request, HybridTourRetriever $retriever)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);
        $message = trim($validated['message']);
        $tours = $retriever->retrieve($message);

        $context = '';
        if ($tours->count() > 0) {
            $context .= "Dưới đây là một số thông tin về các tour du lịch có trong cơ sở dữ liệu có thể liên quan:\n";
            foreach ($tours as $tour) {
                $context .= '- Tên tour: '.$tour->title."\n";
                $context .= '  Giá người lớn: '.number_format($tour->priceAdult)." VNĐ\n";
                $context .= '  Giá trẻ em: '.number_format($tour->priceChild)." VNĐ\n";
                $context .= '  Thời gian: '.$tour->time."\n";
                $context .= '  Điểm đến: '.$tour->destination."\n";
                $context .= '  Link chi tiết: /tour-detail/'.$tour->tourId."\n\n";
            }
        } else {
            $context .= "Không tìm thấy tour nào đủ liên quan trong dữ liệu. Hãy nói rõ rằng hiện chưa tìm thấy tour phù hợp và mời khách hàng mô tả thêm nhu cầu; không được tự bịa tour.\n";
        }

        // Additional static context
        $context .= "\nThông tin chung: Trang web này là hệ thống đặt tour du lịch có tên là LOTUSMILE. Email liên hệ: contact@lotusmile.com. Số điện thoại: 1900 123 456. Địa chỉ: 166 Hà Bồng, Hòa Xuân, Đà Nẵng.\n";

        $systemPrompt = 'Bạn là nhân viên tư vấn ảo thân thiện của công ty du lịch LOTUSMILE. Nhiệm vụ của bạn là tư vấn cho khách hàng về các tour du lịch.
Bạn hãy sử dụng ngữ cảnh (Context) được cung cấp dưới đây để trả lời câu hỏi của khách hàng. 
QUY TẮC TỐI THƯỢNG: TUYỆT ĐỐI KHÔNG tự bịa ra bất kỳ tour du lịch, giá cả, hoặc thông tin nào KHÔNG CÓ trong phần NGỮ CẢNH. Nếu khách hàng yêu cầu gợi ý tour mà trong ngữ cảnh không có thông tin, hãy xin lỗi và mời họ xem trực tiếp trên website. Trả lời ngắn gọn, súc tích và thân thiện bằng tiếng Việt.


QUAN TRỌNG: Khi bạn muốn liệt kê/hiển thị các tour du lịch cho khách hàng xem, BẮT BUỘC phải dùng định dạng HTML bằng cấu trúc sau cho mỗi tour (đừng dùng markdown list thông thường):
<div class="chat-tour-box">
  <strong>[Tên tour]</strong><br>
  💰 Giá từ: [Giá người lớn]<br>
  ⏱ Thời gian: [Thời gian]<br>
  📍 Điểm đến: [Điểm đến]<br>
  <a href="[Link chi tiết]" class="btn-book-tour">Xem chi tiết</a>
</div>

[NGỮ CẢNH]
'.$context.'
[/NGỮ CẢNH]
';

        try {
            $httpOptions = ['verify' => config('services.cohere.ca_bundle') ?: true];
            if (config('services.cohere.stream_handler')) {
                $httpOptions['handler'] = new StreamHandler;
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('services.cohere.api_key'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->withOptions($httpOptions)->post('https://api.cohere.com/v1/chat', [
                'message' => $message,
                'model' => config('services.cohere.chat_model'),
                'preamble' => $systemPrompt,
                'temperature' => 0.3,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                return response()->json([
                    'reply' => $data['text'] ?? 'Xin lỗi, tôi không thể trả lời lúc này.',
                ]);
            } else {
                \Log::error('Cohere API Error: '.$response->body());

                return response()->json(['error' => 'Lỗi khi gọi AI API.'], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Chatbot Controller Error: '.$e->getMessage());

            return response()->json(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.'], 500);
        }
    }
}
