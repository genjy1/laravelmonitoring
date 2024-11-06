<?php

namespace App\Jobs;

use App\Mail\SendFeedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendFeedbackJob implements ShouldQueue
{
    use Dispatchable,Queueable, SerializesModels;

    protected $feedbackData;

    // Устанавливаем количество попыток
    public $tries = 5; // Увеличиваем количество попыток (по умолчанию 3)

    // Устанавливаем время до следующей попытки
    public $retryAfter = 120; // Время в секундах между попытками (по умолчанию 60 секунд)


    /**
     * Create a new job instance.
     *
     * @param array $feedbackData
     */
    public function __construct(array $feedbackData)
    {
        $this->feedbackData = $feedbackData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Отправка письма через очередь
        Mail::to('dmayorov@vend-shop.com')->send(new SendFeedback($this->feedbackData));
    }

    public function failed(Exception $exception)
    {
        // Логируем ошибку или выполняем другие действия при неудачной попытке
        Log::error('Failed to send feedback email: ' . $exception->getMessage());
    }

}

