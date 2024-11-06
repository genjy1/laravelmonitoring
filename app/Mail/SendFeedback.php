<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendFeedback extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $feedbackData; // Переменная для данных из формы

    /**
     * Create a new message instance.
     *
     * @param array $feedbackData
     */
    public function __construct(array $feedbackData)
    {
        $this->feedbackData = $feedbackData; // Присваиваем данные, переданные в конструктор
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Обратная связь с Vendshop Online', // Устанавливаем тему письма
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.feedback', // Представление, которое будет использоваться для письма
            with: ['feedbackData' => $this->feedbackData], // Передаем данные в представление
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Здесь можно добавлять вложения, если нужно
    }
}

