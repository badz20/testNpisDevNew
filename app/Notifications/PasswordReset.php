<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordReset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;

    public function __construct($token)
    {
        //
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
        // return (new MailMessage)
        //     ->greeting('Hello!')
        //     // ->from('barrett@example.com', 'Barrett Blair')
        //     // ->subject('Notification Subject')
        //     ->line('Permohonan tukar kata laluan anda telah berjaya')
        //     ->line('Sila klik pautan untuk menukar kata laluan anda')
        //     ->action('Reset Password', url('password/reset', $this->token))
        //     ->line('Terima Kasih');

        $url = url('password/reset', $this->token);

        return (new MailMessage)
        ->subject("SET SEMULA KATA LALUAN NATIONAL PROJECT INFORMATION SYSTEM")
        ->view('email.reset_password', ['user' =>  $notifiable->name,'Url' => $url ]);

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
