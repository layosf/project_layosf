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
Auth::routes();

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);

Route::get('/','MenuController@dashboard');
Route::get('/home', 'MenuController@dashboard')->name('home');
Route::get('/getlanguage/{id}', 'LanguageController@index')->name('language.index');

Route::prefix('master')->name('master.')->middleware(['auth', 'auth.admin'])->group(function(){
    //suplier
    Route::get('/supplier', 'SupplierController@index')->name('supplier');
    Route::post('/supplier/store', 'SupplierController@store')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
    Route::post('/supplier/update/{id}', 'SupplierController@update')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierController@destroy')->name('supplier.delete');
    Route::get('/supplier/get_province/{id}', 'SupplierController@get_province');
    Route::get('/supplier/get_city/{id}', 'SupplierController@get_city');
    Route::get('/supplier/list', 'SupplierController@list')->name('supplier.list');

    //species
    Route::get('/species', 'SpeciesController@index')->name('species');
    Route::get('/species/list', 'SpeciesController@list')->name('species.list');
    Route::post('/species/store', 'SpeciesController@store')->name('species.store');
    Route::get('/species/edit/{id}', 'SpeciesController@edit')->name('species.edit');
    Route::post('/species/update/{id}', 'SpeciesController@update')->name('species.update');
    Route::get('/species/delete/{id}', 'SpeciesController@destroy')->name('species.delete');


    //productionline
    Route::get('/productionline', 'ProductionlineController@index')->name('productionline');
    Route::get('/productionline/list', 'ProductionlineController@list')->name('productionline.list');
    Route::post('/productionline/store', 'ProductionlineController@store')->name('productionline.store');
    Route::get('/productionline/edit/{id}', 'ProductionlineController@edit')->name('productionline.edit');
    Route::post('/productionline/update/{id}', 'ProductionlineController@update')->name('productionline.update');
    Route::get('/productionline/delete/{id}', 'ProductionlineController@destroy')->name('productionline.delete');

    //itemproduct
    Route::get('/itemproduct', 'ItemproductController@index')->name('itemproduct');
    Route::get('/itemproduct/list', 'ItemproductController@list')->name('itemproduct.list');


    //buyer
    Route::get('/buyer', 'BuyerController@index')->name('buyer');
    Route::get('/buyer/list', 'BuyerController@list')->name('buyer.list');
    Route::post('/buyer/store', 'BuyerController@store')->name('buyer.store');
    Route::get('/buyer/edit/{id}', 'BuyerController@edit')->name('buyer.edit');
    Route::post('/buyer/update/{id}', 'BuyerController@update')->name('buyer.update');
    Route::get('/buyer/delete/{id}', 'BuyerController@destroy')->name('buyer.delete');


      //bank
    Route::get('/bank', 'BankController@index')->name('bank');

    //bankaccount
    Route::get('/bankaccount', 'BankAccountController@index')->name('bankaccount');
    Route::post('/bankaccount/store','BankAccountController@store')->name('bankaccount.store');
    Route::get('/bankaccount/list', 'BankAccountController@list')->name('bankaccount.list');
    Route::get('/bankaccount/delete/{id}', 'BankAccountController@delete');
    Route::get('/bankaccount/edit/{id}', 'BankAccountController@edit')->name('bankaccount.edit');
    Route::post('/bankaccount/update/{id}', 'BankAccountController@update')->name('bankaccount.update');


    //category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    //grade
    Route::get('/grade', 'GradeController@index')->name('grade');
    Route::post('/grade/store', 'GradeController@store')->name('grade.store');
    Route::get('/grade/delete/{id}', 'GradeController@destroy')->name('grade.delete');
    Route::get('/grade/edit/{id}', 'GradeController@edit')->name('grade.edit');
    Route::post('/grade/update/{id}', 'GradeController@update')->name('grade.update');

    //dimention
    Route::get('/dimention', 'DimentionController@index')->name('dimention');
    Route::post('/dimention/store', 'DimentionController@store')->name('dimention.store');
    Route::get('/dimention/delete/{id}', 'DimentionController@destroy')->name('dimention.delete');
    Route::get('/dimention/edit/{id}', 'DimentionController@edit')->name('dimention.edit');
    Route::post('/dimention/update/{id}', 'DimentionController@update')->name('dimention.update');

    //item product
    Route::get('/itemproduct', 'ItemproductController@index')->name('itemproduct');
});

//PO
Route::prefix('po')->name('po.')->middleware(['auth'])->group(function(){

    Route::get('/', 'POcontroller@index')->name('index');
    Route::get('/orderdetail', 'POcontroller@index')->name('orderdetail');
    // Route::get('/requirement', 'POcontroller@index')->name('orderrequirement');
    Route::get('/top', 'POcontroller@index')->name('top');
    Route::get('/core', 'POcontroller@index')->name('core');
    Route::get('/bottom', 'POcontroller@index')->name('bottom');

    Route::get('/list_top/{id}', 'POcontroller@list_top')->name('listtop');
    Route::get('/list_core/{id}', 'POcontroller@list_core')->name('listcore');
    Route::get('/list_bottom/{id}', 'POcontroller@list_bottom')->name('listbottom');
    Route::get('/list_detail/{id}', 'POcontroller@list_detail')->name('listdetail');

    Route::get('/list', 'POcontroller@list')->name('list');
    Route::post('/store', 'POcontroller@general_store')->name('general.store');

    Route::get('/delete/{id}', 'POcontroller@delete')->name('general.delete');
    Route::get('/edit/{id}', 'POcontroller@editgeneral')->name('general.edit');
    Route::post('/update/{id}', 'POcontroller@updategeneral')->name('general.update');

    Route::post('/orderdetail/store', 'POcontroller@orderdetail_store')->name('orderdetail.store');
    Route::get('/get_info/{id}', 'POcontroller@get_info');
    Route::get('/get_infodate/{id}', 'POcontroller@get_infodate');
    Route::get('/orderdetail/edit/{id}', 'POcontroller@edit_orderdetail')->name('orderdetail.edit');
    Route::post('/orderdetail/update/{id}', 'POcontroller@updatedetail')->name('orderdetail.update');
    Route::get('/orderdetail/delete/{id}', 'POcontroller@delete_orderdetail')->name('orderdetail.delete');

    Route::post('/requirement/store', 'POcontroller@orderrequirement_store')->name('requirement.store');
    Route::get('/requirement/edit/{id}', 'POcontroller@edit_requirement')->name('requirement.edit');
    Route::post('/requirement/update/{id}', 'POcontroller@updaterequirement')->name('requirement.update');
    Route::get('/requirement/delete/{id}', 'POcontroller@delete_requirement')->name('requirement.delete');

    Route::post('/top/store', 'POcontroller@top_store')->name('top.store');
    Route::get('/top/edit/{id}', 'POcontroller@edit_top')->name('top.edit');
    Route::post('/top/update/{id}', 'POcontroller@updatetop')->name('top.update');
    Route::get('/top/delete/{id}', 'POcontroller@delete_top')->name('top.delete');

    Route::post('/core/store', 'POcontroller@core_store')->name('core.store');
    Route::get('/core/edit/{id}', 'POcontroller@edit_core')->name('core.edit');
    Route::post('/core/update/{id}', 'POcontroller@updatecore')->name('core.update');
    Route::get('/core/delete/{id}', 'POcontroller@delete_core')->name('core.delete');

    Route::post('/bottom/store', 'POcontroller@bottom_store')->name('bottom.store');
    Route::get('/bottom/edit/{id}', 'POcontroller@edit_bottom')->name('bottom.edit');
    Route::post('/bottom/update/{id}', 'POcontroller@updatebottom')->name('bottom.update');
    Route::get('/bottom/delete/{id}', 'POcontroller@delete_bottom')->name('bottom.delete');
});

//perjanjian jual beli supplier
Route::prefix('agreement')->name('agreement.')->middleware(['auth'])->group(function(){
    Route::get('/', 'AgreementController@index')->name('index');
    Route::get('/detail', 'AgreementController@index')->name('detail');

    Route::post('/detail/store', 'AgreementController@store_detail')->name('detail.store');
    Route::post('/detail/update/{id}', 'AgreementController@update_detail')->name('detail.update');
    Route::get('/detail/delete/{id}', 'AgreementController@delete_detail')->name('detail.delete');
    Route::get('/detail/edit/{id}', 'AgreementController@edit_detail')->name('detail.edit');

    Route::post('/store', 'AgreementController@store')->name('store');
    Route::get('/get_infosupplier/{id}', 'AgreementController@get_infosupplier');
    Route::get('/list', 'AgreementController@list')->name('list');
    Route::get('/edit/{id}', 'AgreementController@edit')->name('edit');
    Route::post('/update/{id}', 'AgreementController@update');
    Route::get('/delete/{id}', 'AgreementController@delete');
    Route::get('/print/{id}', 'AgreementController@print')->name('print');
});

//Arrival Raw Material
Route::prefix('rm')->name('rm.')->middleware(['auth'])->group(function(){
    Route::get('/', 'RMcontroller@index')->name('index');
    Route::get('/list', 'RMcontroller@list')->name('list');
    Route::get('/warehouserm', 'RMcontroller@warehouserm')->name('warehouserm');

    Route::post('/store', 'RMcontroller@store')->name('store');
    Route::get('/edit/{id}', 'RMcontroller@edit')->name('edit');
    Route::post('/update/{id}', 'RMcontroller@update')->name('update');
    Route::get('/delete/{id}', 'RMcontroller@delete')->name('delete');

    Route::get('/sendapproval/{id}', 'RMcontroller@sendapproval');
    Route::get('/approve/{id}', 'RMcontroller@approve');
    Route::get('/reject/{id}', 'RMcontroller@reject');

    Route::post('/reasonreject/{id}', 'RMcontroller@reasonreject')->name('reasonreject');
    Route::get('/get_reason/{id}', 'RMcontroller@get_reason');
});

