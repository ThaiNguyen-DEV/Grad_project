<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Login;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->user = new Login();
    }

    private function getSocialiteDriver()
    {
        // Tắt SSL verify để fix lỗi cURL error 60 trên môi trường localhost
        return Socialite::driver('google')->setHttpClient(
            new Client(['verify' => false])
        );
    }

    public function redirectToGoogle()
    {
        return $this->getSocialiteDriver()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = $this->getSocialiteDriver()->stateless()->user();
            $finduser = $this->user->checkUserExistGoogle($user->id);

            if ($finduser) {
                session()->put('username', $finduser->username);
                return redirect()->intended('/');
            } else {
                $data_google = [
                    'google_id' => $user->id,
                    'fullName'  => $user->name,
                    'username'  => 'user-google-' . time(),
                    'password'  => md5('12345678'),
                    'email'     => $user->email,
                    'isActive'  => 'y'
                ];
                $newUser = $this->user->registerAcount($data_google);
                if ($newUser && isset($newUser->username)) {
                    session()->put('username', $newUser->username);
                    return redirect()->intended('/');
                } else {
                    return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình đăng ký người dùng mới');
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
