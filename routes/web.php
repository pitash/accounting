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

Route::get('/', function () {
	$item=DB::table('settings')->first();
    return view('admin.login',compact('item'));
});

Route::get('signup', function () {
    return view('admin.login');
});

Route::get('index', function () {
	$slider= view('frontend.slider');
	$video= view('frontend.video');
	$main= view('frontend.main');
    return view('frontend.index',compact('slider','video','main'));
});

Route::get('join-us', function () {
    return view('frontend.login');
});

Route::get('sign-in', function () {
    return view('frontend.register');
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('home', 'BackendViewController@index')->name('home');
Route::resource('menu', 'MenuController');
Route::resource('role', 'RoleController');
Route::resource('setting', 'SettingController');
Route::resource('media', 'MediaController');
Route::resource('user', 'UserController');
Route::resource('permission', 'PermissionController');
Route::get('get-permission', 'PermissionController@permission')->name('get-permission');
Route::resource('currency', 'CurrencyController');
Route::resource('company', 'CompanyController');
Route::resource('customer', 'CustomerController');
Route::resource('supplier', 'SupplierController');
Route::resource('bank', 'BankController');
Route::resource('tree', 'TreeController');
Route::get('list', 'TreeController@list');
Route::get('category-tree-view',['uses'=>'CategoryController@manageCategory'])->name('category-tree-view');
Route::post('add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory']);
Route::resource('ledger', 'LedgerController');
Route::resource('purchase', 'PurchaseController');
Route::resource('payment', 'PaymentController');
Route::resource('invoice', 'InvoiceController');
Route::resource('receive', 'ReceiveVoucherController');
Route::resource('journal', 'JournalController');


 
});
