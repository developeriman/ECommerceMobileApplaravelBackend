<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfoModuleController;
use App\Http\Controllers\Theme\DashboardController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\DescriptionModuleController;

Route::get('/cache-clear',function(){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'Cache is cleared';

});

Route::get('/pass',[LoginController::class,'pass'])->name('pass');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'],function(){
      //----- Admin Auth -----
      Route::get('/login',[LoginController::class,'adminLoginIndex'])->name('admin.login.form');
      Route::post('/login',[LoginController::class,'adminLogin'])->name('adminLogin');
     
   Route::group([
      'middleware' => ['admin_auth']
  ],function(){
   Route::get('dashboard',[DashboardController::class,'dashboard']);
   Route::get('/logout', [LoginController::class, 'adminLogout'])->name('logout');
   // Route::get('/logout',[LoginController::class,'adminLogout']);

        //Brand
        Route::get('/brand', [BrandController::class, 'index'])->name('indexBrand');
        Route::get('/brand/add', [BrandController::class, 'indexAddBrand'])->name('indexAddBrand');
        Route::post('/brand/store', [BrandController::class, 'storeBrand'])->name('storeBrand');
        Route::get('/brand/edit/{id}', [BrandController::class, 'indexEditBrand']);
        Route::post('/brand/update', [BrandController::class, 'updateBrand'])->name('updateBrand');
        Route::get('/brand/delete/{id}', [BrandController::class, 'brandDelete'])->name('deleteBrand');


        //Category 
        Route::get('/category', [CategoryController::class, 'index'])->name('indexCategory');
        Route::get('/category/add', [CategoryController::class, 'indexAddCategory'])->name('indexAddCategory');
        Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');
        Route::get('/category/edit/{id}', [CategoryController::class, 'indexEditCategory']);
        Route::post('/category/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('deleteCategory');
        
        
        //Product
        Route::get('/product', [ProductController::class, 'index'])->name('indexProduct');
        Route::get('/product/add', [ProductController::class, 'indexAddProduct'])->name('indexAddProduct');
        Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('storeProduct');
        Route::get('/product/edit/{id}', [ProductController::class, 'indexEditProduct']);
        Route::post('/product/update', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::get('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('productDelete');


        //Product Attribute 
        Route::get('/product_atr', [ProductAttributeController::class, 'index'])->name('ProductAttribute');
        Route::get('/product_atr/add', [ProductAttributeController::class, 'indexAddProductAttr'])->name('indexAddProductAttribute');
        Route::post('/product_atr/store', [ProductAttributeController::class, 'storeProductAttr'])->name('storeProductAttr');
        Route::get('/product_atr/edit/{id}', [ProductAttributeController::class, 'indexEditProductAttribute']);
        Route::post('/product_atr/update', [ProductAttributeController::class, 'updateProductAttribute'])->name('updateProductAttribute');
        Route::get('/product_atr/delete/{id}', [ProductAttributeController::class, 'DeleteProductAttribute'])->name('DeleteProductAttribute');
     //Product Attributes Values 
        Route::get('/product_atr/setting/{id}', [ProductAttributeController::class, 'Setting'])->name('Setting');
        Route::get('/product_atr/setting/delete/{id}', [ProductAttributeController::class, 'DeleteSettingAttributes'])->name('DeleteSettingAttributes');
        Route::get('/product_atr/setting/edit/{id}', [ProductAttributeController::class, 'indexEditSettingAttributes'])->name('indexEditSettingAttributes');
        Route::post('/product_atr/setting/', [ProductAttributeController::class, 'storeAttributeValue'])->name('storeAttributeValue');

        Route::post('/product_atr/setting/update', [ProductAttributeController::class, 'updateSettingAttributes'])->name('updateSettingAttributes');

        

        // Seller
        Route::get('/seller', [SellerController::class, 'index'])->name('indexSeller');
        Route::get('/seller/add', [SellerController::class, 'indexAddSeller'])->name('indexAddSeller');
        Route::post('/seller/store', [SellerController::class, 'storeSeller'])->name('storeSeller');
        Route::get('/seller/edit/{id}', [SellerController::class, 'indexEditSeller']);
        Route::post('/seller/update', [SellerController::class, 'updateSeller'])->name('updateSeller');
        Route::get('/seller/delete/{id}', [SellerController::class, 'deleteSeller'])->name('deleteSeller');


        // Description Module
        Route::get('/description-module', [DescriptionModuleController::class, 'index'])->name('indexDesModule');
        Route::get('/description-module/add', [DescriptionModuleController::class, 'indexAddDesModule'])->name('indexAddDesModule');
        Route::post('/description-module/store', [DescriptionModuleController::class, 'storeDesModule'])->name('storeDesModule');
        Route::get('/description-module/edit/{id}', [DescriptionModuleController::class, 'indexEditDesModule']);
        Route::post('/description-module/update', [DescriptionModuleController::class, 'updateDesModule'])->name('updateDesModule');
        Route::get('/description-module/delete/{id}', [DescriptionModuleController::class, 'deleteDesModule'])->name('deleteDesModule');


        // Info Module
        Route::get('/info-module', [InfoModuleController::class, 'index'])->name('indexInfoModule');
        Route::get('/info-module/add', [InfoModuleController::class, 'indexAddInfoModule'])->name('indexAddInfoModule');
        Route::post('/info-module/store', [InfoModuleController::class, 'storeInfoModule'])->name('storeInfoModule');
        Route::get('/info-module/edit/{id}', [InfoModuleController::class, 'indexEditInfoModule']);
        Route::post('/info-module/update', [InfoModuleController::class, 'updateInfoModule'])->name('updateInfoModule');
        Route::get('/info-module/delete/{id}', [InfoModuleController::class, 'deleteInfoModule'])->name('deleteInfoModule');
    

});
});


Route::prefix('theme')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('theme.dashboard');
});