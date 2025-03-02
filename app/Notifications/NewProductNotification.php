<?php

namespace App\Notifications;

use App\Models\Producto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProductNotification extends Notification
{
    use Queueable;

    protected $product;

    public function __construct(Producto $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nuevo Producto Disponible')
                    ->line("Se ha agregado un nuevo producto: {$this->product->name}")
                    ->action('Ver Producto', url("/products/{$this->product->id}"))
                    ->line('¡Gracias por estar atento a nuestras novedades!');
    }

    public function toArray($notifiable)
    {
        return [
            'product_id' => $this->product->id,
            'name' => $this->product->name,
        ];
    }
}
