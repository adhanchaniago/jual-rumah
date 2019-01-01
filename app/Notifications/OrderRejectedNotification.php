<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderRejectedNotification extends Notification
{
    use Queueable;
    
    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Order Telah Ditolak')
                ->line('Order Anda Dengan Kode '.$this->order->code.' Telah Ditolak')
                ->line($this->order->rumah->perumahan->name.' '.$this->order->rumah->block.'/'.$this->order->rumah->number)
                ->line('Sejumlah '.$this->order->total.' Telah Ditolak')
                ->action('Lihat Detail', url('/user/order'))
                ->line('Terimakasih!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
