<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

// admin
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\DietaryController;
use App\Http\Controllers\admin\UserController;

// vendor
use App\Http\Controllers\vendor\CustomizeMenuController;
use App\Http\Controllers\vendor\ZipCodeController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\VariationController;
use App\Http\Controllers\vendor\CouponController;


// user
use App\Http\Controllers\user\ProductRemarkController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\ContactQueryController;
use App\Http\Controllers\user\FavoriteController;
use App\Http\Controllers\user\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('user-login', [AuthController::class, 'login']);
Route::post('user-register', [AuthController::class, 'register']);

Route::post('vendor_register', [AuthController::class, 'vendor_register']);


//All listing Routes
Route::get('/category_listing', [CategoryController::class, 'listing']);
Route::get('/menu_listing', [MenuController::class, 'listing']);
Route::get('/dietary_listing', [DietaryController::class, 'listing']);
Route::get('/customize_menu_listing', [CustomizeMenuController::class, 'listing']);

//home
Route::get('/store_list', [ProductController::class, 'store_list']);
Route::get('/product_by_store/{store_id}', [ProductController::class, 'product_by_store']);
Route::get('/product_by_zipcode/{zipcode}', [ProductController::class, 'product_by_zipcode']);
Route::get('/all_product', [ProductController::class, 'all_product']);
Route::get('/product_detail/{product}', [ProductController::class, 'product_detail']);
Route::get('/trending_product', [ProductController::class, 'trending_product']);
Route::get('/popular_product', [ProductController::class, 'popular_product']);
Route::get('/filter_product', [ProductController::class, 'filter_product'])->middleware('cors');
Route::get('/beverage_product', [ProductController::class, 'beverage_product']);
Route::post('/contact_query', [ContactQueryController::class, 'contact_query']);


//// order
Route::controller(OrderController::class)->group(function(){
    Route::post('order_placed', 'order_placed')->middleware(['auth:sanctum','user']);
    Route::get('order_detail/{order_id}', 'order_detail')->middleware(['auth:sanctum']);
    Route::get('user_order_listing', 'user_order_listing')->middleware(['auth:sanctum','user']);

});

//// favorite
Route::controller(FavoriteController::class)->middleware(['auth:sanctum','user'])->group(function(){
    Route::post('/add_remove_favorite/{product_id}', 'add_remove_favorite');
    Route::get('/favorite_list', 'favorite_list');

});



// Route::post('/vendor/product_add_update/{product?}', [ProductController::class, 'product_add_update']);

Route::group(['middleware' => ['auth:sanctum']], function () {


     //-------------Logout Route-----------------//
    Route::post('logout', [AuthController::class, 'logout']);
    //-------------Logout Route-----------------//



    Route::middleware(['user'])->group(function () {
    });


    Route::get('test', [AuthController::class,'test']);

    //-------------Admin Routes-----------------//
    Route::middleware(['admin'])->group(function () {


         //Category Routes
         Route::post('/admin/category_add_update/{category?}', [CategoryController::class, 'category_add_update']);
         Route::get('/admin/category_view/{category}', [CategoryController::class, 'view_category']);


         //Menu Routes
         Route::post('/admin/menu_add_update/{menu?}', [MenuController::class, 'menu_add_update']);
         Route::get('/admin/menu_view/{menu}', [MenuController::class, 'view_menu']);

         //Dietary Routes
         Route::post('/admin/dietary_add_update/{dietary?}', [DietaryController::class, 'dietary_add_update']);
         Route::get('/admin/dietary_view/{dietary}', [DietaryController::class, 'view_dietary']);


         //user routes
         Route::get('/admin/user_listing', [UserController::class, 'view_users']);


         //vendor routes
         Route::get('/admin/vendor_listing', [UserController::class, 'view_vendors']);

         //order management
         Route::get('/admin/admin_order_listing', [OrderController::class, 'admin_order_listing']);

         //get_contact_query
         Route::get('/admin/get_contact_query', [ContactQueryController::class, 'get_contact_query']);



    });
    //-------------Admin Routes End-----------------//


    //-------------Vendor Routes-----------------//
     Route::middleware(['vendor'])->group(function () {

        //customize menu
        Route::post('/vendor/customize_menu_add_update/{customizemenu?}', [CustomizeMenuController::class, 'customize_menu_add_update']);
        Route::get('/vendor/view_customize_menu/{customizemenu}', [CustomizeMenuController::class, 'view_customize_menu']);
        Route::post('/vendor/customize_menu_delete/{customizemenu}', [CustomizeMenuController::class, 'customize_menu_delete']);
        Route::get('/vendor/customize_menu_by_category/{category}', [CustomizeMenuController::class, 'customize_menu_by_category']);

        // zip code
        Route::get('/vendor/zip_code_list', [ZipCodeController::class, 'zip_code_list']);
        Route::post('/vendor/zip_code_add', [ZipCodeController::class, 'zip_code_add']);
        Route::post('/vendor/zip_code_update/{zipcode}', [ZipCodeController::class, 'zip_code_update']);
        Route::post('/vendor/zip_code_delete/{zipcode}', [ZipCodeController::class, 'zip_code_delete']);


        //product managment
        Route::get('/vendor/product_list', [ProductController::class, 'product_list']);
        Route::post('/vendor/product_add_update/{product?}', [ProductController::class, 'product_add_update']);
        Route::post('/vendor/multiple_product_image/{product?}', [ProductController::class, 'multiple_product_image']);

        Route::get('/vendor/edit_product/{product}', [ProductController::class, 'edit_product']);
        Route::get('/vendor/view_product/{product}', [ProductController::class, 'view_product']);
        Route::get('/vendor/product_listing', [ProductController::class, 'product_listing']);
        Route::post('/vendor/product_image_delete/{productImage}', [ProductController::class, 'product_image_delete']);
        // Route::post('/vendor/update_product/{productid}', [ProductController::class, 'update_product']);


        //variation managment
        Route::get('/vendor/variation_list', [VariationController::class, 'variation_list']);
        Route::get('/vendor/view_variation/{variation}', [VariationController::class, 'view_variation']);
        Route::post('/vendor/variation_add_update/{variation?}', [VariationController::class, 'variation_add_update']);
        Route::post('/vendor/variation_delete/{variation}', [VariationController::class, 'variation_delete']);

        //variation item managment
        Route::get('/vendor/view_variation_item/{variation_item}', [VariationController::class, 'view_variation_item']);
        Route::get('/vendor/get_item_by_variation/{variation}', [VariationController::class, 'get_item_by_variation']);
        Route::post('/vendor/variation_item_add_update/{variation_item?}', [VariationController::class, 'variation_item_add_update']);
        Route::post('/vendor/variation_item_delete/{variation_item}', [VariationController::class, 'variation_item_delete']);

        //coupon management
        Route::get('/vendor/coupon_list', [CouponController::class, 'coupon_list']);
        Route::get('/vendor/view_coupon/{coupon}', [CouponController::class, 'view_coupon']);
        Route::post('/vendor/coupon_add_update/{coupon?}', [CouponController::class, 'coupon_add_update']);
        Route::post('/vendor/delete_coupon/{coupon}', [CouponController::class, 'delete_coupon']);


        //order management
        Route::get('/vendor/vendor_order_listing', [OrderController::class, 'vendor_order_listing']);


    });
    //-------------Vendor Routes End-----------------//


    //-------------User Routes start-----------------//
    Route::middleware(['user'])->group(function () {
        //// Product Remark
        Route::post('/user/product_remark_add', [ProductRemarkController::class, 'product_remark_add']);
        Route::get('/user/remark_by_product/{product}', [ProductRemarkController::class, 'remark_by_product']);

        //// Product add to cart
        Route::post('/user/add_to_cart/{product}', [CartController::class, 'add_to_cart']);
        Route::get('/user/view_cart', [CartController::class, 'view_cart']);
        Route::post('/user/update_cart', [CartController::class, 'update_cart']);
        Route::post('/user/apply_coupon', [CartController::class, 'apply_coupon']);

        //profile
        Route::get('/user/user_detail', [ProfileController::class, 'user_detail']);
        Route::post('/user/update_profile', [ProfileController::class, 'update_profile']);
        Route::post('/user/change_password', [ProfileController::class, 'change_password']);

     });
    //-------------User Routes End-----------------//

});





//------------------------------//
Route::any('/login',function () {
    return Response()->json(["status"=>false,'msg'=>'Token is Wrong OR Did not Exist!']);
}
)->name('login');
//------------------------------//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
