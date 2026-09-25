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

