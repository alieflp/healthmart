<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    // 🟢 Tampilkan semua pesan tamu
    public function index()
    {
        $guestbooks = Guestbook::latest()->paginate(10);
        return view('admin.guestbook.index', compact('guestbooks'));
    }

    // 🟢 Hapus pesan tamu
    public function destroy($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        $guestbook->delete();

        return redirect()->route('admin.guestbook.index')
            ->with('success', 'Pesan tamu berhasil dihapus');
    }
}
