<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeadlineReminder extends Notification implements ShouldQueue
{
    use Queueable;

    protected $assignment;

    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reminder: Tugas ' . $this->assignment->nama)
            ->line('Deadline tugas "' . $this->assignment->nama . '" semakin dekat.')
            ->line('Mata Kuliah: ' . $this->assignment->course->nama)
            ->line('Deadline: ' . $this->assignment->deadline->format('d-m-Y H:i'))
            ->action('Cek Tugas', url('/dashboard'))
            ->line('Segera selesaikan sebelum waktu habis!');
    }
}
