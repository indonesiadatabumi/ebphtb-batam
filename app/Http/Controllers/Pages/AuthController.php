<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login() 
    {
        // if(\Session::has('id_user')) return redirect()->back();
        // $maskNohp = substr("08161137595", -4);
        // $nohp = "+628161137505";
        // $hashedPassword = Hash::make('123456');
        // dd($hashedPassword);

        return view('login');
        // return view('pages.form_otp', compact('maskNohp', 'nohp'));
        
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->firstOrFail();
        //  dd($user->password);


        if($user->id){
            if (Hash::check($credentials['password'], $user->password)) {
               
                $maskNohp = substr($user->no_hp, -4);
                $nohp = $user->no_hp;
                $username = $credentials['username'];
                $pwd = $credentials['password'];
                
                $postData = [
                    "target" => $nohp
                ];
            
                $encodeJson = json_encode($postData);
                $url = "https://otp-system.kirimpesan.info/send-otp";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: */*'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeJson);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                $response = curl_exec($ch);
                $err = curl_error($ch);
                curl_close($ch);

                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if($http_code === 200){
                    return view('pages.form_otp', compact('maskNohp', 'nohp', 'username', 'pwd'));
                    exit();
                }

            }else {
                 return back()->with(['loginError' => 'Password Login Failed']);
            }
        }else {
             return back()->with(['loginError' => 'Login Failed']);
        }

    }

    public function verifyOTP(Request $req)
    {
        $otp1 = $req->otpfirst;
        $otp2 = $req->otpsecond;
        $otp3 = $req->otpthird;
        $otp4 = $req->otpfourth;
        $otp5 = $req->otpfifth;
        $otp6 = $req->otpsixth;
        $otp = $otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
        $nohp = $req->nohp;
        $username = $req->username;
        $pwd = $req->password;

        $postData = [
            "target" => $nohp,
            "otp" => $otp
        ];
        $postJson = json_encode($postData);

        $url = "https://otp-system.kirimpesan.info/verify-otp";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: */*'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($http_code === 200 && $result['status'] === "success"){
            $credentials = [
                'username' => $username,
                'password' => $pwd
            ];

            if(Auth::attempt($credentials)){
                $req->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else {
                return back()->with(['loginError' => 'Authentifikasi user failed.']);
            }


        }else {
            $timer = $req->countdowntimer;
            $maskNohp = substr($nohp, -4);
            $otpError = $result['message'];
            $minute = substr($timer, 0, 2);
            $second = substr($timer, 3, 2);
            $pwd = $pwd;

            Session::flash('loginError', 'Oppss '. $result['message']); 

            return view('pages.form_otp')->with(['nohp' => $nohp, 'maskNohp' => $maskNohp, 'timer' => $timer, 'minute' => $minute, 'second' => $second, 'username' => $username, 'pwd' => $pwd]);
        }

    }

    public function cekOTP(Request $request)
    {
        $nohp = $request->nohp;
        $otp = $request->otp;

        $postData = [
            "target" => $nohp,
            "otp" => $otp
        ];
        $postJson = json_encode($postData);

        $url = "https://otp-system.kirimpesan.info/verify-otp";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: */*'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($http_code === 200 && $result['status'] === "success")
        {
            $status_otp = [
                'code' => $http_code,
                'msg' => $result['message']
            ];
        }else {
            $status_otp = [
                'code' => $http_code,
                'msg' => $result['message']
            ];
        }

        return json_encode($status_otp);
    }

    public function formOtp(Request $request) 
    {
        // if(\Session::has('id_user')) return redirect()->back();
        $maskNohp = $request->maskNohp;
        $nohp = $request->nohp;

        // return view('pages.login');
        return view('pages.form_otp', compact('maskNohp', 'nohp'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function updateUserTest(Request $request)
    {
        $nama = $request->nama;
        $nohp = $request->nohp;
        $newPhoneNumber = preg_replace('/^0/', '+62', $nohp);

        $update = \DB::table('tbl_user')->where('id', 1)
        ->update([
            'nama_lengkap' => $nama,
            'no_hp' => $newPhoneNumber
        ]);

        if($update){
            return redirect('login')->with('loginError', 'Update user test sukses. Silahkan login');
        }else {
            return redirect('login')->with('loginError', 'Update user test gagal.');
        }
    }

    public function tesOTP()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://otp-system.kirimpesan.info/send-otp",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'target' => '+628161137505'
        ]),
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "Content-Type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
}
