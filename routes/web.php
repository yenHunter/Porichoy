<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visitor\VisitorController;

@include_once('admin.php');

Route::middleware('visitor')->name('visitor.')->group(function () {
	Route::get('/', [VisitorController::class, 'index'])->name('index');
	Route::get('about', [VisitorController::class, 'about'])->name('about');
	Route::get('education', [VisitorController::class, 'education'])->name('education');
	Route::get('services', [VisitorController::class, 'services'])->name('service.index');
	Route::get('service/{service}', [VisitorController::class, 'service_details'])->name('service.details');
	Route::get('projects', [VisitorController::class, 'projects'])->name('project.index');
	Route::get('project/{project}', [VisitorController::class, 'project_details'])->name('project.details');
	Route::get('blogs', [VisitorController::class, 'blogs'])->name('blog.index');
	Route::get('blog/{blog}', [VisitorController::class, 'blog_details'])->name('blog.details');
	Route::get('contact', [VisitorController::class, 'contact'])->name('contact.index');
	Route::post('contact', [VisitorController::class, 'contactStore'])->name('contact.store');
});
