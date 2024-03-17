<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Chats\ChatRepository;
use App\Repository\QRCodes\QRCodeRepository;
use App\Interfaces\Chats\ChatRepositoryInterface;
use App\Interfaces\QRCodes\QRCodeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatRepositoryInterface::class, ChatRepository::class);
        $this->app->bind(QRCodeRepositoryInterface::class, QRCodeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
