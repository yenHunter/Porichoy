<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\RoutingController;

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
	Route::post('forgot-password', [AuthController::class, 'forgot_password'])->name('forgot.password.attempt');
	Route::get('reset-password/{token}', [AuthController::class, 'reset_password_view'])->name('password.reset');
	Route::post('reset-password', [AuthController::class, 'reset_password'])->name('reset.password.attempt');
});

Route::middleware('auth')->group(function () {
	Route::get('home', [HomeController::class, 'dashboard'])->name('home');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('lock', [AuthController::class, 'session_lock'])->name('lock.screen');
	Route::post('unlock', [AuthController::class, 'session_unlock'])->name('unlock.screen');

	Route::prefix('user')->name('user.')->group(function () {
		Route::get('list', [UserController::class, 'user_view'])->name('view');
		Route::post('store', [UserController::class, 'user_store'])->name('store');
		Route::put('update', [UserController::class, 'user_update'])->name('update');
		Route::get('delete/{user_id}', [UserController::class, 'user_delete'])->name('delete');
		Route::get('profile', [UserController::class, 'profile_view'])->name('profile');
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
			Route::get('edit/{experience_id}', [TrainingController::class, 'edit'])->name('edit');
			Route::put('update', [TrainingController::class, 'update'])->name('update');
			Route::get('delete/{experience_id}', [TrainingController::class, 'delete'])->name('delete');
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
		Route::prefix('skill')->name('skill.')->group(function () {
			Route::get('', [SkillController::class, 'skill_view'])->name('view');
			Route::post('store', [SkillController::class, 'skill_store'])->name('store');
			Route::get('edit/{skill_id}', [SkillController::class, 'edit'])->name('edit');
			Route::put('update', [SkillController::class, 'update'])->name('update');
			Route::get('delete/{skill_id}', [SkillController::class, 'delete'])->name('delete');
			Route::post('update-sequence', [SkillController::class, 'update_sequence'])->name('sequence');
		});
	});

	Route::prefix('settings')->name('settings.')->group(function () {
		Route::get('theme', [SettingsController::class, 'theme_view'])->name('theme');
		Route::prefix('research-source')->name('research_source.')->group(function () {
			Route::get('', [SettingsController::class, 'viewResearchSource'])->name('view');
			Route::post('store', [SettingsController::class, 'storeResearchSource'])->name('store');
			Route::get('edit/{research_source_id}', [SettingsController::class, 'editResearchSource'])->name('edit');
			Route::put('update', [SettingsController::class, 'updateResearchSource'])->name('update');
			Route::get('detete/{research_source_id}', [SettingsController::class, 'deleteResearchSource'])->name('delete');
		});
		
		Route::prefix('location-type')->name('location_type.')->group(function () {
			Route::get('', [SettingsController::class, 'viewLocationType'])->name('view');
			Route::post('store', [SettingsController::class, 'storeLocationType'])->name('store');
			Route::get('edit/{location_type_id}', [SettingsController::class, 'editLocationType'])->name('edit');
			Route::put('update', [SettingsController::class, 'updateLocationType'])->name('update');
			Route::get('detete/{location_type_id}', [SettingsController::class, 'deleteLocationType'])->name('delete');
		});
		
		Route::prefix('employment-type')->name('employment_type.')->group(function () {
			Route::get('', [SettingsController::class, 'viewEmploymentType'])->name('view');
			Route::post('store', [SettingsController::class, 'storeEmploymentType'])->name('store');
			Route::get('edit/{employment_type_id}', [SettingsController::class, 'editEmploymentType'])->name('edit');
			Route::put('update', [SettingsController::class, 'updateEmploymentType'])->name('update');
			Route::get('detete/{employment_type_id}', [SettingsController::class, 'deleteEmploymentType'])->name('delete');
		});
	});

	Route::prefix('configuration')->name('configuration.')->group(function () {
		Route::get('', [ConfigurationController::class, 'view'])->name('view');
		Route::get('theme', [ConfigurationController::class, 'theme_view'])->name('theme');
		Route::get('update/{theme}', [ConfigurationController::class, 'theme_update'])->name('update');
	});
});