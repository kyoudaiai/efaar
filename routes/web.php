<?php

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

// Route::get('/', function () {return view('welcome');});
//Route::get('/', 'WelcomeController@index')->name('blog');
//Route::get('/blog/post/{post}', [PostController::class, 'show'])->name('blog.post');
//Route::get('/blog/category/{category}', 'WelcomeController@category')->name('blog.category');
//Route::get('/blog/tag/{tag}', 'WelcomeController@tag')->name('blog.tag');



Auth::routes(['register' => true, 'verify' => true]);
Route::post('/register-complete', 'Auth\RegisterController@completeRegistration')->name('register.complete');
Route::get('/reauth', 'Admin\otpController@reauthenticate')->name('2fa.reauth');
Route::post('/2fa', function () { return redirect(URL()->previous()); })->name('2fa')->middleware('2fa');


Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider')->where('platform', 'google|linkedin|facebook|twitter')->name('social.login');
Route::get('login/{platform}/fallback', 'Auth\LoginController@handleProviderCallback')->where('platform', 'google|linkedin|facebook|twitter')->name('social.fallback');
Route::redirect('/home', '/dashboard');



Route::redirect('/', app()->getLocale());

Route::group(['prefix' => '/{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function ($locale) {
    // ホーム
    Route::get('/', 'WelcomeController@home')->name('home');

    Route::get('/about', 'WelcomeController@about')->name('about');
    Route::get('/services', 'WelcomeController@services')->name('services');
    Route::get('/portfolio', 'WelcomeController@portfolio')->name('portfolio');
    Route::get('/portfolio/{portfolio}', 'WelcomeController@portfolio_details')->name('portfolio.detail');
    Route::get('/clients', 'WelcomeController@clients')->name('clients');
    Route::get('/contact', 'WelcomeController@contactpage')->name('contact');
    Route::post('/contact', 'WelcomeController@contact')->name('contactsend');


// BLOG
// 一覧はblog-default-both-sidebar、詳細がblog-default-single
Route::get('/blog', 'WelcomeController@index')->name('blog.index');
Route::get('/blog/post/{post}', 'WelcomeController@showPost')->name('blog.post');
Route::get('/blog/category/{category}', 'WelcomeController@category')->name('blog.category');
Route::get('/blog/tag/{tag}', 'WelcomeController@tag')->name('blog.tag');
});




// auth only routes
Route::group(['middleware' => ['auth', '2fa', 'profilecomplete', 'verified']], function () {

    /* Dashboard */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('dashboard/profile', 'DashboardController@profile')->name('dashboard.profile');
    Route::put('dashboard/profile', 'DashboardController@updateProfile')->name('dashboard.user.update');
    Route::put('dashboard/profile/update', 'ProfileController@update')->name('dashboard.profile.update');
    Route::post('dashboard/profile/media', 'ProfileController@storeMedia')->name('profile.storeMedia');

    /* notifications */
    Route::get('dashboard/notifications', 'NotificationsController@index')->name('notifications');
    Route::get('dashboard/notifications/unread', 'NotificationsController@unreadlist')->name('notifications.unread');
    Route::get('dashboard/notifications/markalltoasted', 'NotificationsController@markalltoasted')->name('notifications.markalltoasted');
    Route::get('dashboard/notifications/markallread', 'NotificationsController@markallread')->name('notifications.markallread');

    /* todos */
    Route::get('dashboard/user/todos', 'TodoController@index')->name('todos.index');


    /* Profile */
    Route::get('profile', function () { return redirect('profile/my-profile'); });
    Route::get('profile/my-profile', 'ProfileController@myProfile')->name('profile.my-profile');


    /* blog */
    Route::resource('dashboard/blog/categories', 'CategoriesController');
    Route::resource('dashboard/blog/tags', 'TagsController');
    Route::resource('dashboard/blog/posts', 'PostsController');
    Route::get('dashboard/blog/trashed-posts', 'PostsController@trashed')->name('posts.trashed');
    Route::put('dashboard/blog/posts/{post}/restore', 'PostsController@restore')->name('posts.restore');

     /* clients */
     Route::resource('dashboard/pages/clients', 'ClientsController');

     /* Portfolio Projects */
     Route::resource('dashboard/pages/portfolio', 'PortfolioController');
     Route::get('dashboard/pages/portfolio/{portfolio}/photos', 'PortfolioController@portfolio_photos')->name('portfolio.photos');
     Route::get('dashboard/pages/portfolio/{portfolio}/addphoto', 'PortfolioController@create_photo')->name('portfolio.addphoto');
     Route::post('dashboard/pages/portfolio/{portfolio}/addphoto', 'PortfolioController@store_photo')->name('portfolio.storephoto');
     Route::delete('dashboard/pages/portfolio/{portfolio}/delphoto/{photo}', 'PortfolioController@del_photo')->name('portfolio.delphoto');

     /* Services */
     Route::resource('dashboard/pages/services', 'ServicesController');

      /* Services */
    Route::resource('dashboard/pages/about', 'AboutPageController');

    Route::resource('dashboard/pages/coverphotos', 'CoverPhotosController');




});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

 // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

});
