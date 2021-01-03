<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingPage'])->name('landingPage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', App\Http\Controllers\PostsController::class);

Route::resource('departments', App\Http\Controllers\DepartmentsController::class);

Route::resource('members', App\Http\Controllers\MembersController::class);

Route::resource('alumni', App\Http\Controllers\AlumniController::class);

Route::resource('contact', App\Http\Controllers\ContactController::class);

Route::resource('images', App\Http\Controllers\ImagesController::class);
Route::resource('files', App\Http\Controllers\FilesController::class);


Route::get('/posts/create/{type}', [App\Http\Controllers\PostsController::class, 'create'])->name('landingPageCreate');
Route::get('/posts/{type}/{id}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('landingPageEdit');
Route::get('/images/create/{post_id}', [App\Http\Controllers\ImagesController::class, 'create'])->name('postImagesCreate');
Route::get('/files/create/{post_id}', [App\Http\Controllers\FilesController::class, 'create'])->name('postFilesCreate');

Route::get('/posts/{type}/{id}', [App\Http\Controllers\HomeController::class, 'routePost'])->name('routePostContent');
Route::get('/view/gallery/{id}', [App\Http\Controllers\PostsController::class, 'displayGallery'])->name('displayPostGallery');
Route::get('/view/{type}', [App\Http\Controllers\PostsController::class, 'display'])->name('displayContent');
Route::get('/view/{type}/{id}', [App\Http\Controllers\PostsController::class, 'displayPostWithLink'])->name('displayPostContent');
Route::get('/posts/view/{type}/{id}', [App\Http\Controllers\PostsController::class, 'displayPost'])->name('viewPostContent');

Route::get('/academics/{type}', [App\Http\Controllers\MembersController::class, 'display'])->name('displayMember');
Route::get('/members/{type}/{id}', [App\Http\Controllers\MembersController::class, 'displayMember'])->name('displayMemberContent');
Route::get('/academics/faculty/{name}', [App\Http\Controllers\DepartmentsController::class, 'displayFaculties'])->name('displayFaculties');
Route::get('/academics/members/{id}', [App\Http\Controllers\MembersController::class, 'displayMember'])->name('displayMemberContent');

//Route::delete('/posts/{type}/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('landingPageDestroy');
//Route::delete('/members/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('landingPageDestroy');
//Route::get('/members/{type}/{id}', [App\Http\Controllers\MembersController::class, 'displayMember'])->name('viewPost');

Route::get('/students/alumni', [App\Http\Controllers\AlumniController::class, 'displayAlumni'])->name('displayAlumni');
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'display'])->name('displayContact');
Route::post('/contacts/sendMail', [App\Http\Controllers\ContactController::class, 'sendMail'])->name('displayContact');

//Route::post('/posts/{type}/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('landingPageDestroy');

Route::post('/contact/saveInquiryDetails',
    [App\Http\Controllers\ContactController::class, 'saveInquiryDetails'])->name('saveDetails');
