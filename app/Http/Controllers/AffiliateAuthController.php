<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Hash;

class AffiliateAuthController extends Controller
{
    public function dashboard()
    {
        $affiliate = Affiliate::find(session('affiliate_id'));
        return view('affiliate.dashboard', compact('affiliate'));
    }
    // Tampilkan form registrasi affiliate
    public function showRegisterForm()
    {
        return view('affiliate.register');
    }

    // Proses registrasi affiliate
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:affiliates',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $affiliate = Affiliate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'affiliate_code' => uniqid(), // Generate kode unik
        ]);

        return redirect()->route('affiliate.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Tampilkan form login affiliate
    public function showLoginForm()
    {
        return view('affiliate.login');
    }

    // Proses login affiliate
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $affiliate = Affiliate::where('email', $request->email)->first();

        if ($affiliate && Hash::check($request->password, $affiliate->password)) {
            // Simpan session affiliate
            session(['affiliate_id' => $affiliate->id]);
            return redirect()->route('affiliate.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout affiliate
    public function logout()
    {
        session()->forget('affiliate_id');
        return redirect()->route('affiliate.login');
    }
}