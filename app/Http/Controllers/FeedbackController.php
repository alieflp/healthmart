<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // 🟢 Tambah feedback
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $feedback = Feedback::create([
            'user_id' => auth::id(),
            'product_id' => $request->product_id,
            'comment' => $request->comment,
            'rating' => $request->rating
        ]);

        return response()->json($feedback, 201);
    }

    // 🟢 Lihat semua feedback produk
    public function index($productId)
    {
        $feedbacks = Feedback::with('user')->where('product_id', $productId)->get();
        return response()->json($feedbacks);
    }
}

