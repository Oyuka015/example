<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Repositories\User\UserInterface', 'App\Repositories\User\UserRepository');
        $this->app->bind('App\Repositories\Information\InformationInterface', 'App\Repositories\Information\InformationRepository');
        $this->app->bind('App\Repositories\Online\OnlineInterface', 'App\Repositories\Online\OnlineRepository');
        $this->app->bind('App\Repositories\Feedback\FeedbackInterface', 'App\Repositories\Feedback\FeedbackRepository');
        $this->app->bind('App\Repositories\Faq\FaqInterface', 'App\Repositories\Faq\FaqRepository');
        $this->app->bind('App\Repositories\Exam\ExamInterface', 'App\Repositories\Exam\ExamRepository');
        $this->app->bind('App\Repositories\Certificate\CertificateInterface', 'App\Repositories\Certificate\CertificateRepository');
        $this->app->bind('App\Repositories\Examtakers\ExamtakersInterface', 'App\Repositories\Examtakers\ExamtakersRepository');
        $this->app->bind('App\Repositories\Systemuser\SystemuserInterface', 'App\Repositories\Systemuser\SystemuserRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
