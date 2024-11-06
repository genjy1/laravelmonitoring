<?php

namespace App\Jobs;

use App\Mail\RegistrationConfirmation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;

class SendRegistrationConfirmationJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Отправка письма с подтверждением регистрации

        Mail::to($this->user->user_email)->send(new RegistrationConfirmation($this->user));
    }
}

