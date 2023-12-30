<?php

use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::post('/get_states', 'get_states')->name('get.states');
    Route::post('/contect-us','user_message_send')->name('user.contect.us');
});


Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login_view')->name('login.view');
    Route::get('/register', 'register_view')->name('register.view');
});

Route::middleware(['admin'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin-dashbaord', 'admin_index')->name('admin.dashboard');
        Route::get('/admin/user-list', 'user_list')->name('admin.user.list.view');
        Route::get('/admin/message-list', 'user_contact_messages')->name('admin.user.messages.list');
    });

    Route::controller(GiftController::class)->group(function () {
        Route::get('/gift-listing', 'index')->name('admin.gift.list');
        Route::get('/add-gift', 'create_view')->name('admin.gift.create.view');
        Route::get('/update-gift/{gift}', 'update_view')->name('admin.gift.update.view');
        Route::post('/add-update-category/{gift?}', 'addupdategift')->name('admin.add.update.gift');
        Route::get('/delete-gift/{gift}', 'deletegift')->name('admin.delete.gift');
    });
});

Route::middleware(['user-login'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/user-dashboard', 'index')->name('dashboard');
        Route::get('/meet-more-women', 'matches_view')->name('dashborad.meet-more-women.view');
        Route::get('/user-edit-profile', 'edit_profile_view')->name('dashborad.user-edit-profile.view');
        Route::get('/photos', 'user_photos_view')->name('dashborad.user-photos.view');
        Route::get('/match', 'match_user_view')->name('dashbaord.user-match.view');
        Route::get('/interest', 'interest_view')->name('dashbaord.user-interest.view');
        Route::get('/personality', 'personality_view')->name('dashbaord.user-personality.view');
        Route::get('/billing', 'billing_view')->name('dashboard.billing.view');
        Route::get('/email-address', 'email_address_view')->name('dashboard.user-email-address.view');
        Route::get('/reset-password', 'reset_password_view')->name('dashboard.user-reset-password.view');
        Route::get('/notifications', 'notifications_view')->name('dashboard.user-notifications.view');
        Route::get('/partner-detail-page/{id}', 'partner_detail_view')->name('dashborad.partner.detail.view');
        Route::get('/user-detail-page', 'user_detail_view')->name('dashborad.user.details.view');
        Route::get('/user-messages/{id}', 'message_view')->name('dashboard.user.message.view');
        Route::get('/user-messages', 'message_view_all')->name('dashboard.user.all.message.view');
        Route::get('/profile-setting', 'profile_setting')->name('dashboard.profile.setting.view');
        Route::get('/advanced-search', 'advanced_serach')->name('dashboard.advanced.search.view');
        Route::get('/first-name', 'first_name')->name('dashboard.serach.first.name.view');
        Route::get('/member-number', 'member_number')->name('dashboard.search.member.number.view');
        Route::get('/popular-searches', 'popular_searches')->name('dashboard.search.popular.searches.view');
        Route::get('/user-search','user_search')->name('dashboard.users.search');
        Route::get('/user-advanced-search','advanced_search_user')->name('dashboard.users.advanced.search');
        Route::get('/user-first-name-search','first_name_search')->name('dashboard.first.name.search');
        Route::get('/user-search-by-code','search_by_unique_code')->name('dashboard.member.number.search');
        Route::get('/user-search-popular/{name}','search_by_popular')->name('dashboard.search.popular');
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('/user_add_photos', 'user_photos_add')->name('user.photos.upload');
        Route::post('/user_interest', 'user_interest')->name('user.interest.upload');
        Route::post('/user/change_email', 'change_email_address')->name('user.change.email');
        Route::post('/user/add_update_details', 'add_update_user_details')->name('user.add.update.details');
        Route::post('/user/change_password', 'change_password')->name('user.change.password');
        Route::post('/user/add-remove-favourite', 'user_favourite')->name('user.add.remove.favourite');
        Route::post('/user/gift-purchase', 'user_gift_purchase')->name('user.gift.purchase');
        Route::post('/user/send_message', 'send_message')->name('user.send.message');
        Route::post('/user/profile-boost', 'user_boost_profie')->name('user.boost.profile');
        Route::post('/user-personality-question-add-update','user_personality_question_add_update')->name('user.add.update.personality.question');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/admin-login', 'index')->name('admin.login.view');
    Route::post('/admin-login-form', 'loginAdmin')->name('admin_login');
    Route::post('/user-login', 'login')->name('user.login');
    Route::post('/user-register', 'register')->name('user.register');
    Route::get('/logout', 'logout')->name('user.logout');
});
