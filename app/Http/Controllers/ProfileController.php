<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman edit profil.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Proses update data profil.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update nama & email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika user isi password baru, update juga
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect kembali dengan pesan sukses
        return back()->with('status', 'Profil berhasil diperbarui!');
    }

    /**
     * Hapus akun (opsional).
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();

        return redirect('/')->with('status', 'Akun telah dihapus.');
    }
}
