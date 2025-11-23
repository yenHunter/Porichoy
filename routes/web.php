<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
	Route::get('login', [AuthController::class, 'login_view'])->name('login.view');
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
	});

	Route::prefix('element')->name('element.')->group(function () {
		Route::prefix('skill')->name('skill.')->group(function () {
			Route::get('', [HomeController::class, 'skill_view'])->name('view');
			Route::post('store', [HomeController::class, 'skill_store'])->name('store');
			Route::get('edit/{experience_id}', [HomeController::class, 'edit'])->name('edit');
			Route::put('update', [HomeController::class, 'update'])->name('update');
			Route::get('delete/{experience_id}', [HomeController::class, 'delete'])->name('delete');
			Route::post('update-sequence', [HomeController::class, 'update_sequence'])->name('sequence');
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


// Visitor (theme switchable)
Route::middleware('visitor')->name('visitor.')->group(function () {
	Route::get('/', [VisitorController::class, 'index'])->name('index');
	Route::get('about', [VisitorController::class, 'about'])->name('visitor.about');
	Route::get('education', [VisitorController::class, 'education'])->name('visitor.education');
	Route::get('/service/{service}', [VisitorController::class, 'service_details'])->name('service.details');
	Route::get('/project/{service}', [VisitorController::class, 'project_details'])->name('project.details');
	Route::post('/theme/change', [VisitorController::class, 'changeTheme'])->name('visitor.theme.change');
});


Route::get('/analytics', function () {
	return view('/admin/pages/analytics');
});

Route::get('/email/inbox', function () {
	return view('/admin/pages/email-inbox');
});

Route::get('/email/compose', function () {
	return view('/admin/pages/email-compose');
});

Route::get('/email/detail', function () {
	return view('/admin/pages/email-detail');
});

Route::get('/widgets', function () {
	return view('/admin/pages/widgets');
});

Route::get('/ai/chat', function () {
	return view('/admin/pages/ai-chat');
});

// Route::get('/ai/image-generator', function () {
// 	return view('/pages/ai-image-generator');
// });

// Route::get('/pos/kitchen-order', function () {
// 	return view('/pages/pos-kitchen-order');
// });

// Route::get('/pos/counter-checkout', function () {
// 	return view('/pages/pos-counter-checkout');
// });

// Route::get('/pos/table-booking', function () {
// 	return view('/pages/pos-table-booking');
// });

// Route::get('/pos/menu-stock', function () {
// 	return view('/pages/pos-menu-stock');
// });

Route::get('/ui/bootstrap', function () {
	return view('/admin/pages/ui-bootstrap');
});

Route::get('/ui/buttons', function () {
	return view('/admin/pages/ui-buttons');
});

Route::get('/ui/card', function () {
	return view('/admin/pages/ui-card');
});

Route::get('/ui/icons', function () {
	return view('/admin/pages/ui-icons');
});

Route::get('/ui/modal-notifications', function () {
	return view('/admin/pages/ui-modal-notifications');
});

// Route::get('/ui/typography', function () {
// 	return view('/pages/ui-typography');
// });

// Route::get('/ui/tabs-accordions', function () {
// 	return view('/pages/ui-tabs-accordions');
// });

Route::get('/form/elements', function () {
	return view('/admin/pages/form-elements');
});

Route::get('/form/plugins', function () {
	return view('/admin/pages/form-plugins');
});

Route::get('/form/wizards', function () {
	return view('/admin/pages/form-wizards');
});

Route::get('/table/elements', function () {
	return view('/admin/pages/table-elements');
});

// Route::get('/table/plugins', function () {
// 	return view('/pages/table-plugins');
// });

// Route::get('/chart/chart-js', function () {
// 	return view('/pages/chart-js');
// });

// Route::get('/chart/chart-apex', function () {
// 	return view('/pages/chart-apex');
// });

// Route::get('/map', function () {
// 	return view('/pages/map');
// });

// Route::get('/layout/starter-page', function () {
// 	return view('/pages/layout-starter-page');
// });

// Route::get('/layout/fixed-footer', function () {
// 	return view('/pages/layout-fixed-footer');
// });

// Route::get('/layout/full-height', function () {
// 	return view('/pages/layout-full-height');
// });

// Route::get('/layout/full-width', function () {
// 	return view('/pages/layout-full-width');
// });

// Route::get('/layout/boxed-layout', function () {
// 	return view('/pages/layout-boxed-layout');
// });

// Route::get('/layout/minified-sidebar', function () {
// 	return view('/pages/layout-minified-sidebar');
// });

// Route::get('/layout/top-nav', function () {
// 	return view('/pages/layout-top-nav');
// });

// Route::get('/layout/mixed-nav', function () {
// 	return view('/pages/layout-mixed-nav');
// });

// Route::get('/layout/mixed-nav-boxed-layout', function () {
// 	return view('/pages/layout-mixed-nav-boxed-layout');
// });

// Route::get('/page/scrum-board', function () {
// 	return view('/pages/page-scrum-board');
// });

// Route::get('/page/products', function () {
// 	return view('/pages/page-products');
// });

// Route::get('/page/product/details', function () {
// 	return view('/pages/page-product-details');
// });

// Route::get('/page/orders', function () {
// 	return view('/pages/page-orders');
// });

// Route::get('/page/order/details', function () {
// 	return view('/pages/page-order-details');
// });

Route::get('/page/gallery', function () {
	return view('/admin/pages/page-gallery');
});

// Route::get('/page/search-results', function () {
// 	return view('/pages/page-search-results');
// });

Route::get('/page/coming-soon', function () {
	return view('/admin/pages/page-coming-soon');
});

Route::get('/page/error', function () {
	return view('/admin/pages/page-error');
});

// Route::get('/page/login', function () {
// 	return view('pages.page-login');
// });

// Route::get('/page/register', function () {
// 	return view('pages.page-register');
// });

// Route::get('/page/messenger', function () {
// 	return view('/pages/page-messenger');
// });

// Route::get('/page/data-management', function () {
// 	return view('/pages/page-data-management');
// });

Route::get('/page/file-manager', function () {
	return view('/admin/pages/page-file-manager');
});

// Route::get('/page/pricing', function () {
// 	return view('/pages/page-pricing');
// });

// Route::get('/landing', function () {
// 	return view('/pages/landing');
// });

Route::get('/calendar', function () {
	return view('/admin/pages/calendar');
});

Route::get('/settings', function () {
	return view('/admin/pages/settings');
});

// Route::get('/helper', function () {
// 	return view('/pages/helper');
// });
