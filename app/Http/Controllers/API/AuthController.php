<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:225',
            'email'    => 'required|string|unique:users|max:225',
            'password' => 'required|string|min:8',
        ]);

        //jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 501);
        }
        //membuat user baru
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //membuat respone json
        return response()->json([
            'success' => true,
            'data '   => $user,
            'message' => 'akun berhasil dibuat',
        ], 201);

    }

    public function login(Request $request)
    {
        // Validasi input terlebih dahulu (opsional tapi disarankan)
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->firstOrFail();

        // Membuat auth token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Login berhasil',
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 200);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout berhasil',

        ], 200);
    }
}
