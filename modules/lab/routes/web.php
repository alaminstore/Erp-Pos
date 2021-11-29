<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web', 'namespace' => 'SkylarkSoft\GoRMG\Lab\Controllers'], function() {
    Route::get('/login', 'AuthenticateController@login')->name('login');
    Route::post('/post-login', 'AuthenticateController@postLogin');
    Route::get('/logout', 'AuthenticateController@logout');
});
Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'SkylarkSoft\GoRMG\Lab\Controllers'], function () {
    // Dashboard
    Route::get('/dashboard', 'DashboardController@index');

    // Routes for company
    Route::get('/companies', 'CompanyController@index');
    Route::get('/companies/create', 'CompanyController@create');
    Route::post('/companies', 'CompanyController@store');
    Route::get('/companies/{id}/edit', 'CompanyController@edit');
    Route::put('/companies/{id}', 'CompanyController@update');
    Route::delete('/companies/{id}', 'CompanyController@destroy');

    // Routes for user
    Route::get('/users', 'UserController@index');
    Route::get('/users/create', 'UserController@create');
    Route::post('/users', 'UserController@store');
    Route::get('/users/{id}/edit', 'UserController@edit');
    Route::put('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@destroy');
    Route::get('search-users', 'UserController@searchUsers');

    // Routes for color
    Route::get('/colors', 'ColorController@index');
    Route::get('/colors/create', 'ColorController@create');
    Route::post('/colors', 'ColorController@store');
    Route::get('/colors/{id}/edit', 'ColorController@edit');
    Route::put('/colors/{id}', 'ColorController@update');
    Route::delete('/colors/{id}', 'ColorController@destroy');

    // Routes for sizes
    Route::get('/sizes', 'SizeController@index');
    Route::get('/sizes/create', 'SizeController@create');
    Route::post('/sizes', 'SizeController@store');
    Route::get('/sizes/{id}/edit', 'SizeController@edit');
    Route::put('/sizes/{id}', 'SizeController@update');
    Route::delete('/sizes/{id}', 'SizeController@destroy');

    // Routes for buyers
    Route::get('/buyers', 'BuyerController@index');
    Route::get('/buyers/create', 'BuyerController@create');
    Route::post('/buyers', 'BuyerController@store');
    Route::get('/buyers/{id}/edit', 'BuyerController@edit');
    Route::put('/buyers/{id}', 'BuyerController@update');
    Route::delete('/buyers/{id}', 'BuyerController@destroy');

    // Routes for styles
    Route::get('/styles', 'StyleController@index');
    Route::get('/styles/create', 'StyleController@create');
    Route::post('/styles', 'StyleController@store');
    Route::get('/styles/{id}/edit', 'StyleController@edit');
    Route::put('/styles/{id}', 'StyleController@update');
    Route::delete('/styles/{id}', 'StyleController@destroy');
    Route::get('/get-styles/{id}', 'StyleController@getStyle');   // buyer to style selector in stockout ajax


    // Routes for purchase orders
    Route::get('/purchase-orders', 'PurchaseOrderController@index');
    Route::get('/purchase-orders/create', 'PurchaseOrderController@create');
    Route::post('/purchase-orders', 'PurchaseOrderController@store');
    Route::get('/purchase-orders/{id}/edit', 'PurchaseOrderController@edit');
    Route::put('/purchase-orders/{id}', 'PurchaseOrderController@update');
    Route::delete('/purchase-orders/{id}', 'PurchaseOrderController@destroy');

    //requisition
    Route::get('/requisitions', 'RequisitionController@index');
    Route::get('/requisition/create', 'RequisitionController@create');
    Route::post('/requisition', 'RequisitionController@store');
    Route::get('requisition/{receive}/view', 'RequisitionController@show');
    Route::get('/get-requisition-data-for-log-book-entry', 'RequisitionController@getRequisitionDataForLogBookEntry');
    Route::get('requisition/{receive}/edit', 'RequisitionController@edit');
    Route::put('requisition/{receive}/update', 'RequisitionController@update');
    Route::get('requisition/{receive}/delete', 'RequisitionController@delete');
    Route::get('/get-requisition-data-for-work-sheet-entry', 'RequisitionController@getRequisitionDataForWorkSheetEntry');
    Route::get('/requisitions/pdf-download/{id}', 'RequisitionController@pdfDownload');

    // Log Book
    Route::get('log-books', 'LogBookController@index');
    Route::get('log-books/create', 'LogBookController@create');
    Route::post('log-books', 'LogBookController@store');
    Route::get('log-books/{id}/edit', 'LogBookController@edit');
    Route::put('log-books/{id}', 'LogBookController@update');
    Route::delete('log-books/{id}', 'LogBookController@destroy');

    // Reports
    Route::get('daily-log-book-report', 'ReportController@dailyLogBookReport');
    Route::get('daily-log-book-report-download', 'ReportController@dailyLogBookReportDownload');

    // Work Sheet
    Route::get('/work-sheets', 'WorkSheetController@index');
    Route::get('/work-sheets/create', 'WorkSheetController@create');
    Route::post('/work-sheets', 'WorkSheetController@store');
    Route::get('/work-sheets/{requisition_id}/edit', 'WorkSheetController@edit');
    Route::get('/work-sheets/{requisition_id}/show', 'WorkSheetController@show');
    Route::put('/work-sheets/{requisition_id}', 'WorkSheetController@update');
    Route::delete('/work-sheets/{requisition_id}', 'WorkSheetController@destroy');
    Route::get('/get-work-sheet-data', 'WorkSheetController@getWorkSheetData');



    // Routes for Zalo po
    Route::get('/zalopo', 'ZalopoController@index');
    Route::get('/zalopo/create', 'ZalopoController@create');
    Route::post('/zalopo', 'ZalopoController@store');
    Route::get('/zalopo/{id}/edit', 'ZalopoController@edit');
    Route::put('/zalopo/{id}', 'ZalopoController@update');
    Route::delete('/zalopo/{id}', 'ZalopoController@destroy');
    Route::get('/get-zalopo/{id}', 'ZalopoController@getZalopo');   // buyer to zalopo selector in stockout ajax
    Route::get('/get-style/{id}', 'ZalopoController@getStyle');   // zalopo to style selector in stockout ajax

    // Routes for Supplier
    Route::get('/suppliers', 'SupplierController@index');
    Route::get('/suppliers/create', 'SupplierController@create');
    Route::post('/suppliers', 'SupplierController@store');
    Route::get('/suppliers/{id}/edit', 'SupplierController@edit');
    Route::put('/suppliers/{id}', 'SupplierController@update');
    Route::delete('/suppliers/{id}', 'SupplierController@destroy');


    // Routes for Fabric Composition
    Route::get('/fabric', 'FabriccompositionController@index');
    Route::get('/fabric/create', 'FabriccompositionController@create');
    Route::post('/fabric', 'FabriccompositionController@store');
    Route::get('/fabric/{id}/edit', 'FabriccompositionController@edit');
    Route::put('/fabric/{id}', 'FabriccompositionController@update');
    Route::delete('/fabric/{id}', 'FabriccompositionController@destroy');


    // Routes for Fabric Season
    Route::get('/season', 'SeasonController@index');
    Route::get('/season/create', 'SeasonController@create');
    Route::post('/season', 'SeasonController@store');
    Route::get('/season/{id}/edit', 'SeasonController@edit');
    Route::put('/season/{id}', 'SeasonController@update');
    Route::delete('/season/{id}', 'SeasonController@destroy');

    // Routes for Fabric Season
    Route::get('/racklist', 'RacklistController@index');
    Route::get('/racklist/create', 'RacklistController@create');
    Route::post('/racklist', 'RacklistController@store');
    Route::get('/racklist/{id}/edit', 'RacklistController@edit');
    Route::put('/racklist/{id}', 'RacklistController@update');
    Route::delete('/racklist/{id}', 'RacklistController@destroy');

    // Routes for Fabric UOM
    Route::get('/uom', 'UomController@index');
    Route::get('/uom/create', 'UomController@create');
    Route::post('/uom', 'UomController@store');
    Route::get('/uom/{id}/edit', 'UomController@edit');
    Route::put('/uom/{id}', 'UomController@update');
    Route::delete('/uom/{id}', 'UomController@destroy');


    // Routes for Fabric Booking
    Route::get('/fabricbooking', 'FabricbookingController@index');
    Route::get('/fabricbooking/create', 'FabricbookingController@create');
    Route::post('/fabricbooking', 'FabricbookingController@store');
    Route::get('/fabricbooking/{id}/edit', 'FabricbookingController@edit');
    Route::put('/fabricbooking/{id}', 'FabricbookingController@update');
    Route::delete('/fabricbooking/{id}', 'FabricbookingController@destroy');
    Route::get('/fabricbooking/{id}/view', 'FabricbookingController@viewFabricBooking');



    // Routes for Stock In
    Route::get('/stockin', 'StockinController@index');
    Route::get('/stockin/create', 'StockinController@create');
    Route::post('/stockin', 'StockinController@store');
    Route::get('/stockin/{id}/edit', 'StockinController@edit');
    Route::put('/stockin/{id}', 'StockinController@update');
    Route::delete('/stockin/{id}', 'StockinController@destroy');
    Route::get('/styleid/{id}', 'StockinController@styleid');
    Route::get('/findValue','StockinController@findTextBoxValue');  //dropdown to auto fetch value in textbox
    Route::get('/get-fabrication/{id}', 'StockinController@fabric');
    Route::get('/get-gsm/{id}', 'StockinController@gsm');
    Route::get('/get-dia/{id}', 'StockinController@dia');
    Route::get('/stock-in/{id}/view', 'StockinController@viewStockin');

    // Routes for Stock Out
    Route::get('/stockout', 'StockoutController@index')->name('stockoutget');
    Route::get('/stockout/create', 'StockoutController@create');
    Route::post('/stockout', 'StockoutController@store');
    Route::delete('/stockout/{id}', 'StockoutController@destroy');
    Route::get('/stockoutValue','StockoutController@stockoutValue');  //dropdown to auto fetch value in textbox
    Route::get('/out-fabrication/{id}', 'StockoutController@fabric');
    Route::get('/out-gsm/{id}', 'StockoutController@gsm');
    Route::get('/out-dia/{id}', 'StockoutController@dia');
    Route::get('/out-booking/{id}', 'StockoutController@booking');
    Route::get('/out-receive/{id}', 'StockoutController@receiving');
    Route::get('/stock-out/{id}/view', 'StockoutController@viewStockout');


});
