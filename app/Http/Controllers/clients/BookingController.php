<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Booking;
use App\Models\clients\Checkout;
use App\Models\clients\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    private $tour;
    private $booking;
    private $checkout;

    public function __construct()
    {
        parent::__construct(); // Gọi constructor của Controller để khởi tạo $user
        $this->tour = new Tours();
        $this->booking = new Booking();
        $this->checkout = new Checkout();
    }

    public function index($id)
    {

        $title = 'Đặt Tour';
        $tour = $this->tour->getTourDetail($id);
        $transIdVNPay = null;
        return view('clients.booking', compact('title', 'tour', 'transIdVNPay'));
    }

    public function createBooking(Request $req)
    {
        // dd($req);
        $address = $req->input('address');
        $email = $req->input('email');
        $fullName = $req->input('fullName');
        $numAdults = $req->input('numAdults');
        $numChildren = $req->input('numChildren');
        $paymentMethod = $req->input('payment_hidden');
        $tel = $req->input('tel');
        $totalPrice = $req->input('totalPrice');
        $tourId = $req->input('tourId');
        $userId = $this->getUserId();
        /**
         * Xử lý booking và checkout
         */
        $dataBooking = [
            'tourId' => $tourId,
            'userId' => $userId,
            'address' => $address,
            'fullName' => $fullName,
            'email' => $email,
            'numAdults' => $numAdults,
            'numChildren' => $numChildren,
            'phoneNumber' => $tel,
            'totalPrice' => $totalPrice
        ];

        $bookingId = $this->booking->createBooking($dataBooking);

        $dataCheckout = [
            'bookingId' => $bookingId,
            'paymentMethod' => $paymentMethod,
            'amount' => $totalPrice,
            'paymentStatus' => ($paymentMethod === 'zalopay-payment' || $paymentMethod === 'vnpay-payment') ? 'y' : 'n',
        ];

        if ($paymentMethod === 'zalopay-payment') {
            $dataCheckout['transactionId'] = $req->transactionIdZaloPay;
        } elseif ($paymentMethod === 'vnpay-payment') {
            $dataCheckout['transactionId'] = $req->transactionIdVNPay;
        }
        $checkoutId = $this->checkout->createCheckout($dataCheckout);

        if (empty($bookingId) && !$checkoutId) {
            toastr()->error('Có vấn đề khi đặt tour!');
            return redirect()->back(); // Quay lại trang hiện tại nếu có lỗi
        }

        /**
         * Update quantity mới cho tour đó, trừ số lượng
         */
        $tour = $this->tour->getTourDetail($tourId);
        $dataUpdate = [
            'quantity' => $tour->quantity - ($numAdults + $numChildren)
        ];

        $updateQuantity = $this->tour->updateTours($tourId, $dataUpdate);

        /******************************* */

        toastr()->success('Đặt tour thành công!');
        return redirect()->route('tour-booked', [
            'bookingId' => $bookingId,
            'checkoutId' => $checkoutId,
        ]);
    }

    // public function createMomoPayment(Request $request)
    // {
    //     // Lưu tourId vào session để dùng sau khi callback
    //     session()->put('tourId', $request->tourId);

    //     try {
    //         $amount = (int) $request->amount; // Lấy amount thật từ request

    //         // Thông tin MoMo sandbox
    //         $endpoint    = "https://test-payment.momo.vn/v2/gateway/api/create";
    //         $partnerCode = "MOMOBKUN20180529";
    //         $accessKey   = "klm05TvNBzhg7h7j";
    //         $secretKey   = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";

    //         $orderInfo   = "Thanh toan tour du lich";
    //         $requestId   = time() . rand(100, 999); // Tránh trùng requestId
    //         $orderId     = time() . rand(100, 999);
    //         $extraData   = "";
    //         $redirectUrl = "https://clothes-subheader-slashing.ngrok-free.app/momo/callback";
    //         $ipnUrl      = "https://clothes-subheader-slashing.ngrok-free.app/momo/callback";
    //         $requestType = 'captureWallet';

    //         // Tạo chữ ký
    //         $rawHash = "accessKey="   . $accessKey
    //             . "&amount="     . $amount
    //             . "&extraData="  . $extraData
    //             . "&ipnUrl="     . $ipnUrl
    //             . "&orderId="    . $orderId
    //             . "&orderInfo="  . $orderInfo
    //             . "&partnerCode=" . $partnerCode
    //             . "&redirectUrl=" . $redirectUrl
    //             . "&requestId="  . $requestId
    //             . "&requestType=" . $requestType;

    //         $signature = hash_hmac("sha256", $rawHash, $secretKey);

    //         $data = [
    //             'partnerCode' => $partnerCode,
    //             'partnerName' => "LOTUSMILE",
    //             'storeId'     => "LotusmileStore",
    //             'requestId'   => $requestId,
    //             'amount'      => $amount,
    //             'orderId'     => $orderId,
    //             'orderInfo'   => $orderInfo,
    //             'redirectUrl' => $redirectUrl,
    //             'ipnUrl'      => $ipnUrl,
    //             'lang'        => 'vi',
    //             'extraData'   => $extraData,
    //             'requestType' => $requestType,
    //             'signature'   => $signature,
    //         ];

    //         // Bỏ qua SSL verify khi test localhost
    //         $response = Http::withoutVerifying()->post($endpoint, $data);

    //         if ($response->successful()) {
    //             $body = $response->json();
    //             if (isset($body['payUrl'])) {
    //                 return response()->json(['payUrl' => $body['payUrl']]);
    //             }
    //             return response()->json([
    //                 'error'   => 'MoMo không trả về payUrl',
    //                 'details' => $body
    //             ], 400);
    //         }

    //         return response()->json([
    //             'error'   => 'Lỗi kết nối MoMo',
    //             'details' => $response->body()
    //         ], 500);
    //     } catch (\Exception $e) {
    //         \Log::error('MoMo Error: ' . $e->getMessage());
    //         return response()->json([
    //             'error'   => 'Đã xảy ra lỗi',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }


    // public function handlePaymentMomoCallback(Request $request)
    // {
    //     $resultCode = $request->input('resultCode');
    //     $transIdMomo = $request->query('transId');
    //     // dd(session()->get('tourId'));
    //     $tourId = session()->get('tourId');
    //     $tour = $this->tour->getTourDetail($tourId);
    //     session()->forget('tourId');
    //     // Handle the payment response
    //     if ($resultCode == '0') {
    //         $title = 'Đã thanh toán';
    //         return view('clients.booking', compact('title', 'tour', 'transIdMomo'));
    //     } else {
    //         // Payment failed, handle the error accordingly
    //         $title = 'Thanh toán thất bại';
    //         return view('clients.booking', compact('title', 'tour'));
    //     }
    // }

    public function createVNPayPayment(Request $request)
    {
        // Lưu dữ liệu form vào session để dùng sau khi callback
        session()->put('booking_form_data', $request->all());
        session()->put('tourId', $request->tourId);

        $vnp_TmnCode    = "3C2BP71A";
        $vnp_HashSecret = "H5Y9I9JI6YWH63PQGF0VPEO99FYHPY2K";
        $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl  = route('vnpay.callback');

        // Tạo TxnRef duy nhất
        $vnp_TxnRef = time() . '_' . $request->tourId;

        $vnp_OrderInfo  = "Thanh toan tour du lich";
        $vnp_Amount     = (int)(preg_replace('/[^0-9]/', '', $request->totalPrice)) * 100;
        $vnp_Locale     = "vn";
        $vnp_IpAddr     = $request->ip();
        $vnp_CreateDate = date('YmdHis');

        $inputData = [
            "vnp_Version"    => "2.1.0",
            "vnp_TmnCode"    => $vnp_TmnCode,
            "vnp_Amount"     => $vnp_Amount,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_Locale"     => $vnp_Locale,
            "vnp_OrderInfo"  => $vnp_OrderInfo,
            "vnp_OrderType"  => "other",
            "vnp_ReturnUrl"  => $vnp_Returnurl,
            "vnp_TxnRef"     => $vnp_TxnRef,
        ];

        ksort($inputData);

        $query = "";
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            $hashdata .= urlencode($key) . "=" . urlencode($value) . "&";
            $query    .= urlencode($key) . "=" . urlencode($value) . "&";
        }

        $hashdata = rtrim($hashdata, "&");
        $query    = rtrim($query, "&");

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $payUrl = $vnp_Url . "?" . $query . "&vnp_SecureHash=" . $vnpSecureHash;

        return response()->json([
            'payUrl' => $payUrl
        ]);
    }

    public function handleVNPayCallback(Request $request)
    {
        $vnp_HashSecret = "H5Y9I9JI6YWH63PQGF0VPEO99FYHPY2K";

        // Phải loại bỏ cả vnp_SecureHash và vnp_SecureHashType
        $inputData = $request->except(['vnp_SecureHash', 'vnp_SecureHashType']);
        $vnp_SecureHash = $request->vnp_SecureHash;

        ksort($inputData);
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if (str_starts_with($key, 'vnp_')) {
                $hashdata .= urlencode($key) . "=" . urlencode($value) . "&";
            }
        }
        $hashdata = rtrim($hashdata, "&");
        $secureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $tourId = session()->get('tourId');
        if (!$tourId) {
            toastr()->error('Không tìm thấy thông tin tour, vui lòng thử lại!');
            return redirect()->route('home');
        }

        $tour   = $this->tour->getTourDetail($tourId);
        $formData = session()->get('booking_form_data');

        $transIdVNPay = $request->vnp_TransactionNo;

        if ($secureHash === $vnp_SecureHash && $request->vnp_ResponseCode === '00') {
            $title = 'Đã thanh toán';
            return view('clients.booking', compact('title', 'tour', 'transIdVNPay', 'formData'));
        } else {
            $title = 'Thanh toán thất bại';
            $transIdVNPay = null;
            return view('clients.booking', compact('title', 'tour', 'transIdVNPay', 'formData'));
        }
    }

    //Kiểm tra người dùng đã đặt và hoàn thành tour hay chưa để đánh giá
    public function checkBooking(Request $req)
    {
        $tourId = $req->tourId;
        $userId = $this->getUserId();
        $check = $this->booking->checkBooking($tourId, $userId);
        if (!$check) {
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);
    }

    public function createZaloPayPayment(Request $request)
    {
        // Lưu dữ liệu form vào session để dùng sau khi callback
        session()->put('booking_form_data', $request->all());
        session()->put('tourId', $request->tourId);

        $config = [
            "app_id" => 554,
            "key1" => "8NdU5pG5R2spGHGhyO99HN1OhD8IQJBn",
            "key2" => "uUfsWgfLkRLzq6W2uNXTCxrfxs51auny",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        $embeddata = json_encode(['redirecturl' => route('zalopay.callback')]);
        $item = '[]';
        $amount = (int)(preg_replace('/[^0-9]/', '', $request->totalPrice));

        $transID = time() . '_' . $request->tourId;
        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000),
            "app_trans_id" => date("ymd") . "_" . $transID,
            "app_user" => "lotusmile_user",
            "item" => $item,
            "embed_data" => $embeddata,
            "amount" => $amount,
            "description" => "Thanh toan tour du lich #" . $transID,
            "bank_code" => "", // "" nghĩa là hiển thị tất cả phương thức trong ZaloPay
        ];

        // app_id|app_trans_id|app_user|amount|app_time|embed_data|item
        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"] . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

        // Gửi POST request dùng Laravel Http Client
        $response = Http::withoutVerifying()->asForm()->post($config["endpoint"], $order);
        $result = $response->json();

        if ($result && isset($result['return_code']) && $result['return_code'] == 1) {
            return response()->json(['payUrl' => $result['order_url']]);
        } else {
            Log::error('ZaloPay Error: ' . json_encode($result));
            return response()->json([
                'error' => 'Lỗi kết nối ZaloPay',
                'details' => $result
            ], 400);
        }
    }

    public function handleZaloPayCallback(Request $request)
    {
        $tourId = session()->get('tourId');
        if (!$tourId) {
            toastr()->error('Không tìm thấy thông tin tour, vui lòng thử lại!');
            return redirect()->route('home');
        }

        $tour   = $this->tour->getTourDetail($tourId);
        $formData = session()->get('booking_form_data');

        // ZaloPay trả về status trên URL (status = 1 là thành công, status = -49 là user huỷ)
        $status = $request->input('status');
        $transIdZaloPay = $request->input('apptransid');

        if ($status == 1) {
            $title = 'Đã thanh toán';
            return view('clients.booking', compact('title', 'tour', 'transIdZaloPay', 'formData'));
        } else {
            $title = 'Thanh toán thất bại';
            $transIdZaloPay = null;
            return view('clients.booking', compact('title', 'tour', 'transIdZaloPay', 'formData'));
        }
    }
}
