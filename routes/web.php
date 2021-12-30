<?php

use App\Http\Controllers\ClientController;
use App\Model\ItemCategory;
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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Frontend -->
//Front End
Route::get('/', 'FrontendController@index')->name('index');
Route::get('home', 'FrontendController@home')->name('home');
Route::get('about', 'FrontendController@about')->name('about');
Route::get('team', 'FrontendController@team')->name('team');
Route::get('service', 'FrontendController@service')->name('service');

Route::get('portfolio', 'FrontendController@portfolio')->name('portfolio');
Route::get('portfolio/{slug}', 'FrontendController@portfolio_view')->name('portfolio_view');

Route::get('gallery', 'FrontendController@gallery')->name('gallery');
Route::get('gallery/{slug}', 'FrontendController@gallery_view')->name('gallery_view');

Route::get('blog', 'FrontendController@blog')->name('blog');
Route::get('blog/{slug}', 'FrontendController@blog_view')->name('blog_view');
Route::post('blog/comment', 'BlogController@addBlogComment')->name('blog.comment');


Route::get('contact', 'FrontendController@contact')->name('contact');
Route::post('contact-send', 'FrontendController@contactSend')->name('contact-send');


// Backend -->

Route::get('admin', function () {
    return redirect()->route('admin.login');
});
//Backend
Route::group(['prefix' => 'admin'], function(){
    Auth::routes([
        'login' => false, // Login Routes...
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
    Route::get('login','Backend\BackendController@login')->name('admin.login');
    Route::post('logout', 'Backend\BackendController@logout')->name('admin.logout');

    Route::middleware('auth','check_backend_user_status')->group(function(){
        Route::get('dashboard', 'Backend\BackendController@dashboard')->name('admin.dashboard');

        Route::get('form', function () {
            return view('admin.form');
        })->name('form');

        Route::get('table', function () {
            return view('admin.table');
        })->name('table');

        Route::get('report-table', function () {
            return view('admin.report-table');
        })->name('report-table');

        //BLOG CATEGORIES
        Route::resource('blog', 'BlogController')->except(['show']);
        Route::resource('blog-category', 'BlogCategoryController')->except(['show']);



        //COMMENTS
        Route::resource('comment', 'CommentController')->except(['show']);


        //PROJECT CATEGORIES
        Route::resource('project', 'ProjectController')->except(['show']);
        Route::resource('project-category', 'ProjectCategoryController')->except(['show']);

        //GALLERY CATEGORIES
        Route::resource('gallery', 'GalleryController')->except(['show']);
        Route::resource('gallery-category', 'GalleryCategoryController')->except(['show']);

        //TEAM
        Route::resource('team', 'TeamController')->except(['show']);
        Route::resource('team-department', 'TeamDepartmentController')->except(['show']);

        //ITEM CATEGORIES
        Route::resource('item-category', 'ItemCategoryController')->except(['show']);

        //CLIENTS
        Route::resource('client', 'ClientController')->except(['show']);

        //TESTIMONIALS
        Route::resource('testimonial', 'TestimonialController')->except(['show']);

        //CONTACTS
        Route::resource('contacts', 'ContactController');

        //SYSTEM SETTINGS
        Route::get('system/setting', 'SettingController@index')->name('admin.system.settings');
        Route::post('system/setting/general', 'SettingController@general')->name('admin.system.general.store');
        Route::post('system/setting/local', 'SettingController@local')->name('admin.system.local.store');
        Route::post('system/setting/logo', 'SettingController@logo')->name('admin.system.logo.store');
        Route::post('system/setting/admin-logo', 'SettingController@adminLogo')->name('admin.system.admin-logo.store');

        Route::get('system/seo', 'SettingController@seo')->name('admin.system.seo');
        Route::post('system/seo/save', 'SettingController@seoStore')->name('admin.system.seo.store');
        Route::post('system/og-image/save', 'SettingController@ogImage')->name('admin.seo.og.image');

        //COVER-PHOTOS UPDATES
        Route::resource('slider', 'SliderController')->except(['show']);
        Route::resource('index', 'IndexPhotoController')->except(['show']);
        Route::resource('about', 'AboutPhotoController')->except(['show']);



        //USERS, ROLES & PERMISSION
        Route::resource('permission', PermissionController::class,
            [
                'only' => ['index', 'create', 'store']
            ]
        );
        Route::resource('role', 'RoleController');

        Route::resource('user', 'UserController');
        Route::get('my-account', 'UserProfileController@index')->name('admin.my-account');
        Route::post('my-account/general/{user}', 'UserProfileController@general')->name('admin.my-account.general');
        Route::post('my-account/avatar/{user}', 'UserProfileController@avatar')->name('admin.my-account.avatar');
        Route::post('my-account/profile/{user}', 'UserProfileController@profile')->name('admin.my-account.profile');
        Route::post('my-account/security/{user}', 'UserProfileController@security')->name('admin.my-account.security');
    });
});

