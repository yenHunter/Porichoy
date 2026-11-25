<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoutingController;
use App\Models\SelectType;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::get('register', [AuthController::class, 'register_view'])->name('register.view');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
    Route::post('register', [AuthController::class, 'register'])->name('register.attempt');
    Route::get('forgot-password', [AuthController::class, 'forgot_password_view'])->name('forgot.password.view');
    Route::post('forgot-password', [AuthController::class, 'forgot_password'])->middleware('throttle:5,1')->name('forgot.password.attempt');
    Route::get('reset-password/{token}', [AuthController::class, 'reset_password_view'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'reset_password'])->middleware('throttle:5,1')->name('reset.password.attempt');
});

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('lock', [AuthController::class, 'session_lock'])->name('lock.screen');
    Route::post('unlock', [AuthController::class, 'session_unlock'])->name('unlock.screen');

    // The signed-in admin's own account, driven by the topbar modals.
    Route::prefix('account')->name('account.')->group(function () {
        Route::put('profile', [AccountController::class, 'updateProfile'])->name('profile.update');
        Route::put('password', [AccountController::class, 'updatePassword'])->name('password.update');
    });

    Route::prefix('module')->name('module.')->group(function () {
        Route::prefix('education')->name('education.')->group(function () {
            Route::get('', [EducationController::class, 'view'])->name('view');
            Route::post('store', [EducationController::class, 'store'])->name('store');
            Route::get('edit/{education_id}', [EducationController::class, 'edit'])->name('edit');
            Route::put('update', [EducationController::class, 'update'])->name('update');
            Route::get('delete/{education_id}', [EducationController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [EducationController::class, 'update_sequence'])->name('sequence');
            Route::put('settings-update', [EducationController::class, 'settings_update'])->name('settings.update');
        });

        Route::prefix('experience')->name('experience.')->group(function () {
            Route::get('', [ExperienceController::class, 'view'])->name('view');
            Route::post('store', [ExperienceController::class, 'store'])->name('store');
            Route::get('edit/{experience_id}', [ExperienceController::class, 'edit'])->name('edit');
            Route::put('update', [ExperienceController::class, 'update'])->name('update');
            Route::get('delete/{experience_id}', [ExperienceController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [ExperienceController::class, 'update_sequence'])->name('sequence');
            Route::put('settings-update', [ExperienceController::class, 'settings_update'])->name('settings.update');
        });

        Route::prefix('research')->name('research.')->group(function () {
            Route::get('', [ResearchController::class, 'view'])->name('view');
            Route::post('store', [ResearchController::class, 'store'])->name('store');
            Route::get('edit/{experience_id}', [ResearchController::class, 'edit'])->name('edit');
            Route::put('update', [ResearchController::class, 'update'])->name('update');
            Route::get('delete/{experience_id}', [ResearchController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [ResearchController::class, 'update_sequence'])->name('sequence');
            Route::put('settings-update', [ResearchController::class, 'settings_update'])->name('settings.update');
        });

        Route::prefix('training')->name('training.')->group(function () {
            Route::get('', [TrainingController::class, 'view'])->name('view');
            Route::post('store', [TrainingController::class, 'store'])->name('store');
            Route::get('edit/{training_id}', [TrainingController::class, 'edit'])->name('edit');
            Route::put('update', [TrainingController::class, 'update'])->name('update');
            Route::get('delete/{training_id}', [TrainingController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [TrainingController::class, 'update_sequence'])->name('sequence');
            Route::put('settings-update', [TrainingController::class, 'settings_update'])->name('settings.update');
        });

        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('', [BlogController::class, 'view'])->name('view');
            Route::post('store', [BlogController::class, 'store'])->name('store');
            Route::get('edit/{blog_id}', [BlogController::class, 'edit'])->name('edit');
            Route::put('update', [BlogController::class, 'update'])->name('update');
            Route::get('delete/{blog_id}', [BlogController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [BlogController::class, 'update_sequence'])->name('sequence');
            Route::put('settings-update', [BlogController::class, 'settings_update'])->name('settings.update');
        });
    });

    Route::prefix('element')->name('element.')->group(function () {
        Route::prefix('service')->name('service.')->group(function () {
            Route::get('', [ServiceController::class, 'view'])->name('view');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::get('edit/{service_id}', [ServiceController::class, 'edit'])->name('edit');
            Route::put('update', [ServiceController::class, 'update'])->name('update');
            Route::get('delete/{service_id}', [ServiceController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [ServiceController::class, 'update_sequence'])->name('sequence');
        });

        Route::prefix('project')->name('project.')->group(function () {
            Route::get('', [ProjectController::class, 'view'])->name('view');
            Route::post('store', [ProjectController::class, 'store'])->name('store');
            Route::get('edit/{project_id}', [ProjectController::class, 'edit'])->name('edit');
            Route::put('update', [ProjectController::class, 'update'])->name('update');
            Route::get('delete/{project_id}', [ProjectController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [ProjectController::class, 'update_sequence'])->name('sequence');
        });

        Route::prefix('skill')->name('skill.')->group(function () {
            Route::get('', [SkillController::class, 'view'])->name('view');
            Route::post('store', [SkillController::class, 'store'])->name('store');
            Route::get('edit/{skill_id}', [SkillController::class, 'edit'])->name('edit');
            Route::put('update', [SkillController::class, 'update'])->name('update');
            Route::get('delete/{skill_id}', [SkillController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [SkillController::class, 'update_sequence'])->name('sequence');
        });

        Route::prefix('client')->name('client.')->group(function () {
            Route::get('', [ClientController::class, 'view'])->name('view');
            Route::post('store', [ClientController::class, 'store'])->name('store');
            Route::get('edit/{client_id}', [ClientController::class, 'edit'])->name('edit');
            Route::put('update', [ClientController::class, 'update'])->name('update');
            Route::get('delete/{client_id}', [ClientController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [ClientController::class, 'update_sequence'])->name('sequence');
        });

        Route::prefix('testimonial')->name('testimonial.')->group(function () {
            Route::get('', [TestimonialController::class, 'view'])->name('view');
            Route::post('store', [TestimonialController::class, 'store'])->name('store');
            Route::get('edit/{testimonial_id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::put('update', [TestimonialController::class, 'update'])->name('update');
            Route::get('delete/{testimonial_id}', [TestimonialController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [TestimonialController::class, 'update_sequence'])->name('sequence');
        });
    });

    Route::prefix('management')->name('management.')->group(function () {
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('', [UserController::class, 'view'])->name('view');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{user_id}', [UserController::class, 'edit'])->name('edit');
            Route::put('update', [UserController::class, 'update'])->name('update');
            Route::get('delete/{user_id}', [UserController::class, 'delete'])->name('delete');
            Route::post('update-sequence', [UserController::class, 'update_sequence'])->name('sequence');
        });

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('', [SettingsController::class, 'profile_management'])->name('view');
                Route::post('update', [SettingsController::class, 'profile_update'])->name('update');
            });
        });

        Route::prefix('contact-message')->name('contact_message.')->group(function () {
            Route::get('', [ContactMessageController::class, 'view'])->name('view');
            Route::get('read/{contact_message_id}', [ContactMessageController::class, 'read'])->name('read');
            Route::get('delete/{contact_message_id}', [ContactMessageController::class, 'delete'])->name('delete');
        });

        Route::prefix('system')->name('system.')->group(function () {
            Route::get('user-log', [SystemController::class, 'userLog'])->name('user-log');
            Route::get('application-log', [SystemController::class, 'applicationLog'])->name('application-log');
        });
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        // The theme picker lives under configuration; SettingsController has no theme_view().
        Route::get('theme', [ConfigurationController::class, 'theme_view'])->name('theme');
        // The five select-type lists share one controller action set; each
        // route names the list it serves through a `lookup` default.
        $selectTypeLookups = [
            'research-source' => SelectType::RESEARCH_SOURCE,
            'location-type' => SelectType::LOCATION_TYPE,
            'employment-type' => SelectType::EMPLOYMENT_TYPE,
            'training-category' => SelectType::TRAINING_CATEGORY,
            'blog-category' => SelectType::BLOG_CATEGORY,
        ];

        foreach ($selectTypeLookups as $uri => $lookup) {
            Route::prefix($uri)->name($lookup.'.')->group(function () use ($lookup) {
                Route::get('', [SettingsController::class, 'viewLookup'])
                    ->name('view')->defaults('lookup', $lookup);
                Route::post('store', [SettingsController::class, 'storeLookup'])
                    ->name('store')->defaults('lookup', $lookup);
                Route::get('edit/{lookup_id}', [SettingsController::class, 'editLookup'])
                    ->name('edit')->defaults('lookup', $lookup);
                Route::put('update', [SettingsController::class, 'updateLookup'])
                    ->name('update')->defaults('lookup', $lookup);
                Route::get('delete/{lookup_id}', [SettingsController::class, 'deleteLookup'])
                    ->name('delete')->defaults('lookup', $lookup);
                Route::post('update-sequence', [SettingsController::class, 'updateLookupSequence'])
                    ->name('sequence')->defaults('lookup', $lookup);
            });
        }
    });

    Route::prefix('configuration')->name('configuration.')->group(function () {
        Route::get('', [ConfigurationController::class, 'view'])->name('view');
        Route::get('theme', [ConfigurationController::class, 'theme_view'])->name('theme');
        Route::post('update/{theme}', [ConfigurationController::class, 'theme_update'])->name('update');
        Route::post('color/{color}', [ConfigurationController::class, 'color_update'])->name('color');
    });
});
