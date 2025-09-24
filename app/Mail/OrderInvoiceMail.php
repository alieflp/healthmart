<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $filePath;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, $filePath)
    {
        $this->order = $order;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Invoice Pesanan #' . $this->order->id)
                    ->markdown('emails.orders.invoice')
                    ->attach($this->filePath, [
                        'as' => 'Invoice_' . $this->order->id . '.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
