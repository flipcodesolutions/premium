<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('admin:create {email=kpkhushiparmar04@gmail.com} {password=admin123}', function ($email, $password) {
    $user = \App\Models\User::updateOrCreate(
        ['email' => $email],
        [
            'name' => 'Khushi Parmar',
            'password' => \Illuminate\Support\Facades\Hash::make($password),
            'role' => 'admin',
        ]
    );

    $this->info("Admin user [{$user->email}] created/updated with role 'admin'!");
})->purpose('Create or update an admin user');

Artisan::command('mail:test {email=kpkhushiparmar04@gmail.com}', function ($email) {
    $driver = config('mail.default');
    $this->info("Sending test email to [{$email}] using driver [{$driver}]...");
    try {
        \Illuminate\Support\Facades\Mail::raw("This is a test email from Premium Building & Pest Inspections to verify that real email delivery to your mailbox is working!", function ($message) use ($email) {
            $fromAddress = \App\Services\CustomerMailService::getFromAddress();
            $fromName = \App\Services\CustomerMailService::getFromName();
            $message->to($email)
                    ->from($fromAddress, $fromName)
                    ->subject("Test Email - Premium Building & Pest Inspections");
        });
        $this->info("SUCCESS: Email sent to [{$email}]! (Driver: {$driver})");
    } catch (\Throwable $e) {
        $this->error("ERROR: Failed to send email: " . $e->getMessage());
    }
})->purpose('Send a test email to verify SMTP configuration');

