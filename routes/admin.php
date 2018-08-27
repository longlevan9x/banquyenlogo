<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 6/26/2018
 * Time: 11:26 PM
 */

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdviceController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\BulkController;
use App\Http\Controllers\Admin\CategoryCityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryDistrictController;
use App\Http\Controllers\Admin\CategoryStreetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExpertController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuth\LoginController as AdminLoginController;

use App\Http\Controllers\Admin\ShareController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WebsiteController;

Route::middleware(['admin.guest'])->group(function() {
	/*===========Login Route============*/
	Route::get(AdminLoginController::getResourceName(), AdminLoginController::getControllerWithAction('showLoginForm', 'AdminAuth'))
	     ->name(AdminLoginController::getAdminRouteName('show-login'));
	Route::post(AdminLoginController::getResourceName(), AdminLoginController::getControllerWithAction('login', 'AdminAuth'))->name(AdminLoginController::getAdminRouteName('login'));
	/*===========Login Route============*/

});
Route::middleware(['admin', 'auth:admin'])->group(function() {
	Route::post('logout', AdminLoginController::getControllerWithAction('logout', 'AdminAuth'))->name(AdminLoginController::getAdminRouteName('logout'));
	Route::post('change-password', AdminController::getControllerWithAction('change_password'))->name(AdminController::getAdminRouteName('change-password'));
	/*===========Profile============*/
	Route::get('profile', AdminController::getControllerWithAction('show_profile'))->name(AdminController::getAdminRouteName('show-profile'));
	Route::post('profile/{id}', AdminController::getControllerWithAction('update_profile'))->name(AdminController::getAdminRouteName('update-profile'));
	/*===========Profile============*/
	/*===========Dashboard Route============*/
	Route::get('/', DashboardController::getControllerWithAction('index'))->name(DashboardController::getAdminRouteName('dashboard'));
	Route::get(DashboardController::getResourceName(), DashboardController::getControllerWithAction('index'))->name(DashboardController::getAdminRouteName('dashboard'));
	/*===========Dashboard Route============*/

	Route::get(NewsController::getResourceName('banner'), NewsController::getControllerWithAction('showBanner'));
	Route::post(NewsController::getResourceName('banner'), NewsController::getControllerWithAction('doBanner'));
	Route::get(CategoryController::getResourceName('get-category'), CategoryController::getControllerWithAction('getOptionCategoryWithType'));
	Route::get(ProductController::getResourceName('detail'), ProductController::getControllerWithAction('_index'));
	Route::post(ProductController::getResourceName('detail'), ProductController::getControllerWithAction('_store'));
	Route::put(OrderController::getResourceName('confirm/{id}'), OrderController::getControllerWithAction('confirm'));
	Route::put(OrderController::getResourceName('cancel/{id}'), OrderController::getControllerWithAction('cancel'));

	Route::get(WebsiteController::getResourceName('config'), WebsiteController::getControllerWithAction('showConfig'));
	Route::post(WebsiteController::getResourceName('config'), WebsiteController::getControllerWithAction('postConfig'));
	Route::get(WebsiteController::getResourceName('message'), WebsiteController::getControllerWithAction('showMessage'));
	Route::post(WebsiteController::getResourceName('message'), WebsiteController::getControllerWithAction('postMessage'));
	Route::get(WebsiteController::getResourceName('subscribe'), WebsiteController::getControllerWithAction('showSubscribe'));
	Route::delete(WebsiteController::getResourceName('subscribe/{id}'), WebsiteController::getControllerWithAction('deleteSubscribe'));
	Route::get(WebsiteController::getResourceName('contact'), WebsiteController::getControllerWithAction('showContact'));
	Route::delete(WebsiteController::getResourceName('contact/{id}'), WebsiteController::getControllerWithAction('deleteContact'));
	Route::get(WebsiteController::getResourceName('info-expert'), WebsiteController::getControllerWithAction('showInformationExpert'));
	Route::post(WebsiteController::getResourceName('info-expert'), WebsiteController::getControllerWithAction('postInformationExpert'));

	Route::get(MenuController::getResourceName('sort-order'), MenuController::getControllerWithAction('showSortOrder'));
	Route::post(MenuController::getResourceName('sort-order'), MenuController::getControllerWithAction('postSortOrder'));
	/*===========Resource===========*/
	Route::resource(SettingController::getResourceName(), SettingController::getClassName());
	Route::resource(CategoryController::getResourceName(), CategoryController::getClassName());
	Route::resource(AreaController::getResourceName(), AreaController::getClassName());
	Route::resource(CategoryCityController::getResourceName(), CategoryCityController::getClassName());
	Route::resource(CategoryDistrictController::getResourceName(), CategoryDistrictController::getClassName());
	Route::resource(CategoryStreetController::getResourceName(), CategoryStreetController::getClassName());
	Route::resource(StoreController::getResourceName(), StoreController::getClassName());
	Route::resource(AdminController::getResourceName(), AdminController::getClassName());
	Route::resource(NewsController::getResourceName(), NewsController::getClassName());
	Route::resource(PostController::getResourceName(), PostController::getClassName());
	Route::resource(AnswerController::getResourceName(), AnswerController::getClassName());
	Route::resource(AdviceController::getResourceName(), AdviceController::getClassName());
	Route::resource(ProductController::getResourceName(), ProductController::getClassName());
	Route::resource(SlideController::getResourceName(), SlideController::getClassName());
	Route::resource(ShareController::getResourceName(), ShareController::getClassName());
	Route::resource(ExpertController::getResourceName(), ExpertController::getClassName());
	Route::resource(WebsiteController::getResourceName(), WebsiteController::getClassName());
	Route::resource(OrderController::getResourceName(), OrderController::getClassName());
	Route::resource(MenuController::getResourceName(), MenuController::getClassName());
	/*===========Route Ajax===========*/
	Route::post(AjaxController::getResourceName('delete-file/{table}/{key}/{id?}'), AjaxController::getControllerWithAction('deleteFile'));
	/*===========Route Bulk===========*/
	Route::delete(BulkController::getResourceName('bulk-delete'), BulkController::getControllerWithAction('bulkDelete'));
	Route::delete(BulkController::getResourceName('bulk'), BulkController::getControllerWithAction('bulk'));
});

