<?php

namespace App\Http\Controllers;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    // Simpan pesan dari visitor
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        Guestbook::create($request->only('name','message'));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
