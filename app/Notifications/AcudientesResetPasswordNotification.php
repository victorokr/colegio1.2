<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Messages\MailMessage;

class AcudientesResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        // if (static::$toMailCallback) {
        //     return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        // }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Solicitud de Reestablecimiento contraseña'))
            ->greeting('Hola ' . $notifiable->nombres)
            ->line(Lang::getFromJson('Recibes este email porque se solicito un restablecimiento de contraseña para tu cuenta.'))
            ->action(Lang::getFromJson('Reestablecer contraseña'), url(config('app.url').route('acudiente.password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Si no realizaste esta petición, puedes ignorar este correo y nada habrá cambiado.'))
            ->salutation(Lang::getFromJson('Saludos'));
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
