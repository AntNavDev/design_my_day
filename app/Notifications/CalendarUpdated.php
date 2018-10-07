<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CalendarUpdated extends Notification implements ShouldQueue
{
    use Queueable;
    protected $cu_task = '';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $task )
    {
        $this->cu_task = $task;
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
                    ->subject( 'A task has been saved!' )
                    ->greeting( 'Hello from ' . config( 'app.name' ) . '!' )
                    ->line( 'This email is designed to let you know that the following task was saved to your user account.' )
                    ->line( $this->cu_task )
                    ->action( 'Check out ' . config( 'app.name' ) . ' here!', url( '/' ) );
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
