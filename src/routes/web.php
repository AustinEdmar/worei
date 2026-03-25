<?php

use App\Http\Controllers\aboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Mail;


Route::get('/', [App\Http\Controllers\indexController::class, 'index'])->name('site.index');
Route::get('/about', [App\Http\Controllers\aboutController::class, 'index'])->name('site.about');
Route::get('/events', [App\Http\Controllers\eventsController::class, 'index'])->name('site.events');
Route::get('/services', [App\Http\Controllers\servicesController::class, 'index'])->name('site.services');
Route::get('/blog', [App\Http\Controllers\blogController::class, 'index'])->name('site.blog');
Route::get('/contacts', [App\Http\Controllers\contactController::class, 'index'])->name('site.contacts');
Route::post('/contacts', [ContactsController::class, 'sendEmail'])->name('contacts.sendEmail');

Auth::routes();

/* Route::get('/test-email', function () {
    Mail::raw('Teste MailHog', function ($msg) {
        $msg->to('admin@worei.com')
            ->subject('Email de teste');
    });

    return 'Email enviado';
}); */

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth']) // opcional: apenas logados
    ->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Grupo de rotas do Blog
        Route::prefix('blog')
            ->name('blog.')
            ->group(function () {
            Route::get('', [App\Http\Controllers\blogController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\blogController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\blogController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
            Route::get('/show/{post}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
            Route::put('/update/{post}', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('about')
            ->name('about.')
            ->group(function () {

                Route::get('', [aboutController::class, 'index'])->name('index');

                Route::post('/store', [aboutController::class, 'store'])->name('store');

                Route::get('/edit/{about}', [aboutController::class, 'edit'])->name('edit');

                Route::put('/update/{about}', [aboutController::class, 'update'])->name('update');

                Route::delete('/destroy/{about}', [aboutController::class, 'destroy'])->name('destroy');

            });

        Route::prefix('team')
            ->name('team.')
            ->group(function () {

                Route::get('', [App\Http\Controllers\TeamMemberController::class, 'index'])->name('index');

                Route::post('/store', [App\Http\Controllers\TeamMemberController::class, 'store'])->name('store');

                Route::put('/update/{team}', [App\Http\Controllers\TeamMemberController::class, 'update'])->name('update');

                Route::delete('/destroy/{team}', [App\Http\Controllers\TeamMemberController::class, 'destroy'])->name('destroy');

            });

        Route::prefix('partners')
            ->name('partners.')
            ->group(function () {

                Route::get('', [App\Http\Controllers\PartnerController::class, 'index'])->name('index');

                Route::post('/store', [App\Http\Controllers\PartnerController::class, 'store'])->name('store');

                Route::put('/update/{partner}', [App\Http\Controllers\PartnerController::class, 'update'])->name('update');

                Route::delete('/destroy/{partner}', [App\Http\Controllers\PartnerController::class, 'destroy'])->name('destroy');

            });

        //contact
        Route::prefix('contactinfo')
            ->name('contactinfo.')
            ->group(function () {
            Route::get('', [App\Http\Controllers\Admin\ContactInfoController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ContactInfoController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Admin\ContactInfoController::class, 'store'])->name('store');
            Route::get('/edit/{contactinfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'edit'])->name('edit');
            Route::get('/show/{contactinfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'show'])->name('show');
            Route::put('/update/{contactInfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'update'])->name('update');
            Route::delete('/destroy/{contactInfo}', [App\Http\Controllers\Admin\ContactInfoController::class, 'destroy'])->name('destroy');
        });

        // perguntas frequentes
        Route::prefix('faq')
            ->name('faq.')
            ->group(function () {
            Route::get('', [App\Http\Controllers\Admin\FaqsController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\FaqsController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Admin\FaqsController::class, 'store'])->name('store');
            Route::get('/edit/{faq}', [App\Http\Controllers\Admin\FaqsController::class, 'edit'])->name('edit');
            Route::get('/show/{faq}', [App\Http\Controllers\Admin\FaqsController::class, 'show'])->name('show');
            Route::put('/update/{faq}', [App\Http\Controllers\Admin\FaqsController::class, 'update'])->name('update');
            Route::delete('/destroy/{faq}', [App\Http\Controllers\Admin\FaqsController::class, 'destroy'])->name('destroy');
        });

        //services
        Route::prefix('services')
            ->name('services.')
            ->group(function () {
            Route::get('', [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ServicesController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Admin\ServicesController::class, 'store'])->name('store');
            Route::get('/edit/{services}', [App\Http\Controllers\Admin\ServicesController::class, 'edit'])->name('edit');
            Route::get('/show/{services}', [App\Http\Controllers\Admin\ServicesController::class, 'show'])->name('show');
            Route::put('/update/{services}', [App\Http\Controllers\Admin\ServicesController::class, 'update'])->name('update');
            Route::delete('/destroy/{services}', [App\Http\Controllers\Admin\ServicesController::class, 'destroy'])->name('destroy');
        });

    });


Route::prefix('site')
    ->name('site.')
    ->group(function () {
        Route::get('/blog/show/{post}', [App\Http\Controllers\blogController::class, 'show'])->name('blog.show');
    });