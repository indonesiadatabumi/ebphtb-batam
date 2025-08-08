<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
// *** PENAMBAHAN: Pastikan Validator di-import untuk digunakan ***
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function login() 
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Menggunakan first() lebih aman daripada firstOrFail() jika ingin menangani kasus user tidak ditemukan secara manual
        $user = User::where('username', $credentials['username'])->first();

        if($user){
            if (Hash::check($credentials['password'], $user->password)) {
                
                $maskNohp = substr($user->no_hp, -4);
                $nohp = $user->no_hp;
                $username = $credentials['username'];
                // Hindari mengirim password ke view. Simpan di session jika benar-benar perlu, tapi lebih baik tidak.
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
                // Menambahkan timeout untuk mencegah request hang
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);

                $response = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $err = curl_error($ch);
                curl_close($ch);

                if($http_code === 200){
                    // Mengirim password ke view adalah praktik yang tidak aman.
                    // Data ini sudah ada di request saat OTP diverifikasi nanti.
                    return view('pages.form_otp', compact('maskNohp', 'nohp', 'username', 'pwd'));
                } else {
                    // Menangani jika API OTP gagal
                    return back()->with(['loginError' => 'Gagal mengirim OTP. Silakan coba lagi.']);
                }

            } else {
                 return back()->with(['loginError' => 'Password salah.']);
            }
        } else {
             return back()->with(['loginError' => 'Username tidak ditemukan.']);
        }

    }

    // ===================================================================================
    // *** PERUBAHAN UTAMA: Method ini diubah untuk menangani AJAX dan mengembalikan JSON ***
    // ===================================================================================
    public function verifyOTP(Request $request)
    {
        // 1. Validasi input dari AJAX request
        $validator = Validator::make($request->all(), [
            'otp_combined' => 'required|numeric|digits:6',
            'username' => 'required',
            'password' => 'required',
            'nohp' => 'required',
        ]);

        // Jika validasi gagal, kirim respons error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Format OTP tidak valid atau data tidak lengkap.'
            ], 422); // 422 Unprocessable Entity
        }

        // 2. Siapkan data untuk dikirim ke API verifikasi OTP
        $postData = [
            "target" => $request->nohp,
            "otp" => $request->otp_combined
        ];
        $postJson = json_encode($postData);
        $url = "https://otp-system.kirimpesan.info/verify-otp";

        // 3. Kirim request cURL ke API verifikasi
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: */*'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $result = json_decode($response, true);

        // 4. Proses respons dari API
        // Cek jika request ke API berhasil (kode 200) DAN status dari API adalah "success"
        if($http_code === 200 && isset($result['status']) && $result['status'] === "success"){
            
            // Jika OTP benar, coba untuk login
            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                
                // Kirim respons JSON untuk sukses
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login berhasil! Anda akan diarahkan ke dashboard.',
                    'redirect_url' => url('/dashboard') // Gunakan url() atau route() helper
                ]);
            } else {
                // Kasus yang jarang terjadi: OTP benar tapi login gagal (misal: user dinonaktifkan setelah OTP dikirim)
                return response()->json([
                    'status' => 'error',
                    'message' => 'Autentikasi pengguna gagal setelah verifikasi OTP.'
                ], 401);
            }

        } else {
            // Jika OTP salah atau API error, kirim respons JSON untuk error
            $errorMessage = isset($result['message']) ? $result['message'] : 'Gagal memverifikasi OTP.';
            return response()->json([
                'status' => 'error',
                'message' => 'Oppss! ' . $errorMessage
            ], 401); // 401 Unauthorized
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
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $result = json_decode($response, true);

        if($http_code === 200 && isset($result['status']) && $result['status'] === "success")
        {
            $status_otp = [
                'code' => $http_code,
                'msg' => $result['message']
            ];
        } else {
            $status_otp = [
                'code' => $http_code,
                'msg' => isset($result['message']) ? $result['message'] : 'Error'
            ];
        }

        return json_encode($status_otp);
    }

    public function formOtp(Request $request) 
    {
        $maskNohp = $request->maskNohp;
        $nohp = $request->nohp;

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
