<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to('/apps');
        }
        return view('landing.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username atau password salah',
            ]);
        }

        if ($user->is_reset_password == 1 && $user->password_reset == $request->password) {
            session()->put([
                'username' => $request->username,
                'allow_to_change_password' => 1
            ]);
            return redirect()->to('/change-password');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // $payload = Auth::user();
            // $payload = json_encode($payload);
            // $token = Crypt::encryptString($payload);

            // return redirect()->to('http://localhost:8000/auth?token=' . $token);
            return redirect()->intended('/apps');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->to('/');
    }

    public function jwt()
    {
        // $payload = Auth::user();
        // $payload = json_encode($payload);
        // $token = Crypt::encryptString($payload);
        $token = Crypt::decryptString('eyJpdiI6IkExWDcwekZRckJROUU2QUJHOEZuN3c9PSIsInZhbHVlIjoiaFM4SnBFelZBZ0lZUGlyUzVCcEY0Z3o5TU5aRDN2cUJ5Z1I4Wk0zWTQ2aXBOZ0hONnlGdWpCMDZzTThMU1lCdmo0OEJ1dnBBWHN6Lzc5SndtWmJNbTdlblFCRk5PcVFHck1ZeVBXT0p0SGJoaTVtSktuM0p5ZC9PUCtteThYWm96Z0g0T3VQOERWaVNVU0FtTkF2bDhpK0RBTmc1VFhCSHpYR3pXUzhOTzhaSXVDWHM5UG1BL2E0MzBrRDM1NG9UWmFXK0hOUk5nLzNIRHNrTlpod2JtL0NFU0VIaGd1cVFXODFqZkdGb2VZbWVCTmhlS0VPZ2lmYjBMa3daV2FrdHRaSlkzTWlMa3RyUnhMdnVDckx2VVAzY3dhZXhTQUtxVkRMbGtCaDZXSDNPR1FjSkFSam1Rc0lReGU0dlpoSkRXTEcyQlBKMnIvbkJJODdzaHh0NnFKTUVCQUJ6S1k3ZEdjV0FJWE1wanBBPSIsIm1hYyI6IjNmYmI5ODY0OTUyZGI5YTMzZjkxY2VjODk2Nzk2ZWNlZDEyZTUxZjU5MzJiMjQxZTA1OTg2ZDQ0NTBlZTZkYjUiLCJ0YWciOiIifQ==');
        return $token;
    }

    public function change_password()
    {
        if (session('allow_to_change_password') == 1) {

            return view('change-password.index');
        }
        return redirect()->to('/');
    }

    public function save_change_password(Request $request)
    {
        $request->validate([
            'password' => 'min:6|confirmed',
        ], [
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        if (session('allow_to_change_password') == 1 && session()->has('username')) {
            $user = User::where('username', session('username'))->firstOrFail();

            $user->update([
                'is_reset_password' => 0,
                'password' => bcrypt($request->password),
            ]);

            $request->session()->forget(['allow_to_change_password', 'username']);

            Auth::login($user);
        }

        return redirect()->to('/');
    }
}
