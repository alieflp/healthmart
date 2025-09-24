@component('mail::message')
# Terima Kasih Telah Berbelanja 🙏

Halo **{{ $order->user->name }}**,  
Pesanan Anda berhasil dibuat dengan detail berikut:

- **Order ID:** {{ $order->id }}
- **Tanggal:** {{ $order->created_at->format('d-m-Y H:i') }}
- **Total:** Rp {{ number_format($order->total_price, 0, ',', '.') }}
- **Metode Pembayaran:** {{ strtoupper($order->payment_method) }}
- **Status:** {{ ucfirst($order->status) }}

@component('mail::button', ['url' => route('orders.show', $order->id)])
Lihat Pesanan
@endcomponent

Kami lampirkan juga **Invoice (PDF)** pada email ini.  
Terima kasih sudah mempercayai kami 🌿

Salam,  
{{ config('app.name') }}
@endcomponent
