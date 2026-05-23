<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\alternatif;
use App\Models\kriteria;
class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Menampilkan halaman dashboard
     */
    public function index()
    {
        $alternatif = alternatif::all();
        session(['from_page' => 'index']);
        return view('index', compact('alternatif'));
    }



    /**
     * Menampilkan halaman dashboard admin
     */
    public function showAdminDashboard()
    {
        $jumlahAlternatif = alternatif::count();
        $jumlahKriteria   = kriteria::count();
         return view('admin.dashboard', compact('jumlahAlternatif', 'jumlahKriteria'));
    }

     // Proses login
    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Bisa login pakai email atau name
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Karena tidak pakai role → langsung ke dashboard admin
            return redirect()->route('dashboard')->with('success', 'Selamat datang di Dashboard!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}

