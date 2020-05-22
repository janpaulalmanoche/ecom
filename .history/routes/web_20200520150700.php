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

/*Route::get('/', function () {
    return view('welcome');
});*/

//for the front endn index page
Route::get('/', 'IndexController@index');


//visit rellers page
Route::resource('product-reseller','FrontEndResellerController');


//category listing page
Route::get('products/{url}', 'FrontEndDisplayProductsController@products');



//product Detail page,when you click the product
Route::get('/product/{id}', 'FrontEndDisplayProductsController@ProductDetail');


//add product to cart route
Route::match(['get', 'post'], '/add-cart', 'CartController@addtocart');

//add product to cart from index page
Route::match(['get', 'post'], '/add-cart-p/', 'CartController@addtocartFromIndex');
//add product using jquery
Route::match(['get', 'post'], '/add-cart-jq', 'CartController@addtocartjquery');
// cart page
Route::match(['get', 'post'], '/cart', 'CartController@cartp');

//delete product form crt page
Route::get('/cart/delete-product/{id}', 'CartController@deleteCartProduct');

//update product quantity on cart pge
Route::get('/cart/update-quantity/{id}/{quantity}', 'CartController@updateCartQuantity');

//for ajax to get the product attribute price
Route::get('//get-product-price', 'ProductsController@getProductPriceajax');



//for admin login
Route::match(['get', 'post'], '/admin', 'AdminController@login'); //match for FORMS


//for adminlogout
Route::get('/logout', 'AdminController@logout');

//for users register
Route::get('/login-register', 'UsersController@userLoginRegister');
//Users Register form submit
Route::post('/user-register', 'UsersController@register');
//user login
Route::post('/user-login', 'UsersController@login');
//userlogout
Route::get('/user-logout', 'UsersController@logout');

//redirect to register page
Route::get('/user-registration', 'UsersController@RegistrationPageLink');

//for route protection that needs login
Route::group(['middleware' => ['frontlogin']], function () {
    //users account page
    Route::match(['get', 'post'], '/account', 'UsersController@account');

    //user checkout
    Route::match(['get', 'post'], '/checkout', 'OrderController@checkout');
    //Check user password before changing
    Route::post('/check-user-pwd', 'UsersController@chkUserPassword');
    //for ujpdating passwrd in db
    Route::post('/update-user-pwd', 'UsersController@updatePassword');
    //orderreviewpage
    Route::match(['get', 'post'], '/order-review', 'OrderController@orderReview');

    //for order-review part to successorder page
    Route::match(['get', 'post'], '/ty', 'OrderController@aaveOrder');

    //user order history page
    Route::get('/orders-history', 'OrderController@OrderHistory');
    //for paid orders

    Route::get('/orders-history-paid', 'OrderController@PaidOrderHistory');



    //minus quantity to stocks
    Route::post('/admin/minus-quantity-stocks', 'CartController@MinusQtytoStocks');
});


//Route::match(['get','post'],'/login-register','UsersController@register');
//for user registration if email alreadt exist jquery
Route::match(['get', 'post'], '/check-email-register', 'UsersController@CheckEmail');

//admin part
//adminlogin is found in kernep.php where we put our mfiddleware file
Route::group(['middleware' => ['adminlogin']], function () { //this is how to put admin protection in laravel.middleware method
    //then go to app/http/middleware/RedirectifAuthenticated
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');

    Route::get('/admin/check-pwd', 'AdminController@chkPassword'); //this if form the ajax in matrix.form_validation.jd
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@UpdatePassword'); //admin

    //category
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories'); //get is when you want to VIEW records
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory'); //we put /{id} to pass id,we use
    //we use match again for update
    Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');


    //new route for adding sub category /revision
    Route::match(['get', 'post'], '/admin/view-main-category', 'CategoryController@viewMainCategory');

    //pass the id of the main cat to another view
    Route::match(['get', 'post'], '/admin/view-main-categoryy/{id}', 'CategoryController@viewMainCategorywithID');
    //insert the subcat values into the databse
    Route::match(['get', 'post'], '/admin/insert-sub-cat/{id}', 'CategoryController@insertSUBCATS');



    //product
    Route::match(['get', 'post'], '/admin/add-product', 'ProductsController@addProduct');
    Route::get('/admin/view-products', 'ProductsController@viewProducts');
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductsController@editProduct');
    Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage');
    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProduct');

    //product attribute
    Route::match(['get', 'post'], '/admin/add-attributes/{id}', 'ProductsController@addAttributes');
    Route::get('/admin/delete-attribute/{id}', 'ProductsController@deleteAttribute');
    //for edit
    Route::match(['get', 'post'], '/admin/edit-attributes/{id}', 'ProductsController@editAttributes');


    //measurement in size
    Route::match(['get', 'post'], '/admin/add-measurement', 'MeasurementController@measurement');


    //display new orders
    Route::get('/admin/view-orders', 'AdminManageOrderController@viewCustomerOrders');
    //display Paid Orders
    Route::get('/admin/view-paid-orders', 'AdminManageOrderController@viewPaidCustomerOrders');
    //display cancelled Orders
    Route::get('/admin/view-cancelled-order', 'AdminManageOrderController@viewCancelOrders');
    //display IN process Orders
    Route::get('/admin/view-in-process-order', 'AdminManageOrderController@viewInProcesslOrders');

    //view orders detail
    Route::get('/admin/view-order/{id}', 'AdminManageOrderController@viewCustomerOrdersDetails');

    //update status order
    Route::post('admin/update-status', 'AdminManageOrderController@updateOrderStatus');

    //order invoice
    Route::get('/admin/view-order-invoice/{id}', 'AdminManageOrderController@OrderInvoice');

    //view list products stock
    Route::get('/admin/view-product-stocks', 'StockController@ViewStocks');

    //view prodct detail roducts from vie stock
    Route::match(['get', 'post'], '/admin/view-add-stocks/{id}', 'StockController@addstocks');




    Route::match(['get', 'post'], '/admin/add-stcokk', 'StockController@ADDS');
    //revisin stocksss
    //view deliveted stocks
    Route::match(['get', 'post'], '/admin/view-request-addstocks', 'StockController@ViewAddedStocks');

    //view pending stpck
    Route::match(['get', 'post'], '/admin/view-pending-addstocks', 'StockController@viewPstock');

    //edit form

    Route::match(['get', 'post'], '/admin/edit-pending-past-form/{id}', 'StockController@Pfrom');
    //

    Route::match(['get', 'post'], '/admin/update-Pstcokk/{id}', 'StockController@UPS');


    //for address users

    //city
    Route::match(['get', 'post'], '/admin/add-city', 'AddressController@city');
    Route::match(['get', 'post'], '/admin/add-city2', 'AddressController@ADDcity');

    //street
    Route::match(['get', 'post'], '/admin/add-street', 'AddressController@street');
    Route::match(['get', 'post'], '/admin/add-street2', 'AddressController@ADDstreet');

    //baranggay

    Route::match(['get', 'post'], '/admin/add-baranggay', 'AddressController@baranggay');
    Route::match(['get', 'post'], '/admin/add-baranggay2', 'AddressController@ADDbaranggay');

    //for suplier part

    Route::match(['get', 'post'], '/admin/add-supplier-form', 'SupplierController@supplierAddForm');
    //insert
    Route::match(['get', 'post'], '/admin/add-supplier-insert', 'SupplierController@insertSupplier');


    Route::match(['get', 'post'], '/admin/view-supplier', 'SupplierController@viewsupplier');
    //edit form route
    Route::match(['get', 'post'], '/admin/edit-supplier/{id}', 'SupplierController@editsupplier');

    //edit function
    Route::match(['get', 'post'], '/admin/edit-function', 'SupplierController@editfunction');

    //ajaaax drodown menu populat



    Route::get('/city-id', 'AddressController@Ajaxcity');

    //dynamic dtopdown meenuu for ajaaxxx
    Route::post('/dynamic_dependent/fetch', 'UsersController@fetch');


    //for price hisotry

    Route::match(['get', 'post'], '/admin/view-pricehistory', 'PriceHistoryController@ViewProducts');

    Route::match(['get', 'post'], '/admin/view-price-history/{id}', 'PriceHistoryController@viewProductPriceHistory');

    //reports
    Route::match(['get', 'post'], '/admin/daily-report-form', 'ReportController@DailyReportForm');

    //for daily rep

    Route::match(['get', 'post'], '/admin/generate-dailyreport', 'ReportController@DDreport');
    //for product display for purcahes history

    Route::match(['get', 'post'], '/admin/view-p', 'ReportController@viewp');


    Route::match(['get', 'post'], '/admin/PH/{id}', 'ReportController@PHform');


    //route for weekly report
    Route::match(['get', 'post'], '/admin/weeklyform', 'ReportController@weeklyform');

    //for random view file report route
    Route::match(['get', 'post'], '/admin/date-range', 'ReportController@randomViewpage');


    ///submit route for random report
    Route::match(['get', 'post'], '/admin/generate-randomR', 'ReportController@randomSUBMIT');

    //add reseller
    Route::resource('/admin/reseller', 'ResellerController');
});




Route::group(['middleware' => ['resellerlogin'],'prefix' => 'reseller'], function () {

    Route::resource('/dashboard', 'ResellerDashBoardController');
    Route::resource('/products', 'ResellerAddProductsController');
    Route::resource('/products-list', 'ResellerProductController');
    Route::resource('/orders/list', 'ResellerOrderController');
    
});




//get for displaying a page, and post when submitting form,
//we use Route::match(['get','post'],when we have to use both display and submit
//When same route can be used both for get as well as for post like when we
// simply display the page then we use Get and when we submit some form then we use Post.﻿

///dflsdjfksdjfjdfjdkljfkldjfkljdklfjdfj

Route::get('/dynamic_dependent', 'DynamicController@index');

Route::post('dynamic_dependent/fetch', 'DynamicController@fetch')->name('dynamicdependent.fetch');

//this only
Route::post('dynamic_dependent/fetchh', 'DynamicController@fetch2')->name('dynamicdependent.fetch2');

Route::post('dynamic_dependent/fetchhh', 'DynamicController@fetch3')->name('dynamicdependent.fetch3');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/callback',function(){
dd('test');
// secret fQ3wA2kV1bH5lY2pS5iG7uT6vH0dS2jE8jG6kQ8nX1sE2pV0pH
// id faa78f59-d055-4016-ab41-a3f812f78310
// 
});

Route::get('sandbox-account','PaymentController@make_sanbox_account');
Route::get('gc','PaymentController@customer_generate_code_for_access_token');