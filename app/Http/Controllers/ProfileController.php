<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('pages.profile');
    }

    public function update(Request $request)
    {
        // Proses pengambilan user berdasarkan id
        $item = User::where('id', Auth::user()->id)->first();

        // Membuat validasi inputan
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // Membuat sebuah perkondisian apabila password tidak diubah
        if($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        // Menyimpan ke database
        $item->nama = $request->nama;
        $item->username = $request->username;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        // Kembali ke halaman profile
        return redirect()->route('profile.edit')->with('success', 'Berhasil Mengubah Profile');
    }
}
