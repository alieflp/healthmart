@extends('customer.layout')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 flex items-center gap-2">
        🛒 Keranjang Belanja
    </h1>

    @if ($cartItems->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-5 rounded-lg shadow-md">
            Keranjang masih kosong. Yuk belanja dulu ✨
        </div>
    @else
        <div class="space-y-5">
            @foreach ($cartItems as $item)
                <div class="flex items-center justify-between bg-white rounded-2xl shadow-md p-5">

                    {{-- Kiri: Gambar + Info --}}
                    <div class="flex items-center gap-5">
                        <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/120' }}" 
                             alt="{{ $item->product->name }}"
                             class="w-20 h-20 object-cover rounded-xl border">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">{{ $item->product->name }}</h3>
                            <p class="text-green-600 font-semibold">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    {{-- Tengah: Quantity Control --}}
                    <div class="flex items-center gap-2">
                        <button class="decrease bg-gray-200 px-2 py-1 rounded" data-id="{{ $item->id }}">-</button>
                        <input type="number" data-id="{{ $item->id }}" value="{{ $item->quantity }}" 
                            min="1" class="quantity-input w-16 border rounded p-1 text-center">
                        <button class="increase bg-gray-200 px-2 py-1 rounded" data-id="{{ $item->id }}">+</button>
                        <span class="text-gray-500">x Rp {{ number_format($item->product->price,0,',','.') }}</span>
                    </div>

                    <p class="text-green-600 font-bold">
                        Subtotal: Rp <span id="subtotal-{{ $item->id }}">{{ number_format($item->product->price * $item->quantity,0,',','.') }}</span>
                    </p>

                    {{-- Kanan: Hapus --}}
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg font-semibold shadow hover:from-red-600 hover:to-red-700 transition">
                            ❌ Hapus
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- Total & Checkout --}}
        <div class="mt-10 bg-white rounded-2xl shadow-lg p-6 flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold text-gray-700">Total:</p>
                <p class="text-2xl font-extrabold text-green-600">
                    Rp <span id="cart-total">{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}</span>
                </p>
            </div>
            <a href="{{ route('orders.checkout') }}" 
               class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:from-green-600 hover:to-green-700 transition transform hover:scale-105">
               ✅ Checkout Sekarang
            </a>
        </div>
    @endif
</div>

{{-- Ajax Script --}}
<script>
document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function() {
        updateQuantity(this.dataset.id, this.value);
    });
});

document.querySelectorAll('.increase').forEach(btn => {
    btn.addEventListener('click', function() {
        let input = this.previousElementSibling;
        input.value = parseInt(input.value) + 1;
        input.dispatchEvent(new Event('change'));
    });
});

document.querySelectorAll('.decrease').forEach(btn => {
    btn.addEventListener('click', function() {
        let input = this.nextElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            input.dispatchEvent(new Event('change'));
        }
    });
});

function updateQuantity(id, quantity) {
    fetch(`/cart/${id}`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ quantity })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`subtotal-${id}`).textContent = 
                new Intl.NumberFormat('id-ID').format(data.subtotal);
            document.getElementById('cart-total').textContent = 
                new Intl.NumberFormat('id-ID').format(data.total);
        }
    });

}
</script>
@endsection
