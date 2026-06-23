<?php

use App\Http\Controllers\ADMIN\CategoryController;
use App\Http\Controllers\ADMIN\CompanyController;
use App\Http\Controllers\ADMIN\ContactPersonController;
use App\Http\Controllers\ADMIN\DashboardController;
use App\Http\Controllers\ADMIN\DivisionController;
use App\Http\Controllers\ADMIN\ProductController;
use App\Http\Controllers\ADMIN\SearchController;
use App\Http\Controllers\ADMIN\SegmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'DashboardData']);
    Route::get('/product', [ProductController::class, 'ProductData']);
    Route::get('/category', [CategoryController::class, 'CategoryData']);
    Route::get('/segment', [SegmentController::class, 'SegmentData']);
    Route::get('/division', [DivisionController::class, 'DivisionData']);
    Route::get('/contact_person', [ContactPersonController::class, 'ContactPersonData']);
    Route::get('/company', [CompanyController::class, 'CompanyData']);

    Route::get('/search', [SearchController::class, 'index']);

    Route::prefix('category')->group(function () {
        Route::post('/create', [CategoryController::class, 'createCategory'])
            ->name('admin.category.create');
        Route::get('/{id}', [CategoryController::class, 'getSingleCategory'])
            ->name('admin.category.id');
        Route::post('/update/{id}',[CategoryController::class, 'updateCategory'])
            ->name('admin.category.update');
        Route::delete('/delete/{id}',[CategoryController::class, 'deleteCategory'])
            ->name('admin.category.delete');
    });

    Route::prefix('segment')->group(function () {
        Route::post('/create', [SegmentController::class, 'createSegment'])
            ->name('admin.segment.create');
        Route::get('/{id}', [SegmentController::class, 'getSingleSegment'])
            ->name('admin.segment.id');
        Route::post('/update/{id}',[SegmentController::class, 'updateSegment'])
            ->name('admin.segment.update');
        Route::delete('/delete/{id}',[SegmentController::class, 'deleteSegment'])
            ->name('admin.segment.delete');
    });

    Route::prefix('division')->group(function () {
        Route::post('/create', [DivisionController::class, 'createDivision'])
            ->name('admin.division.create');
        Route::get('/{id}', [DivisionController::class, 'getSingleDivision'])
            ->name('admin.division.id');
        Route::post('/update/{id}',[DivisionController::class, 'updateDivision'])
            ->name('admin.division.update');
        Route::delete('/delete/{id}',[DivisionController::class, 'deleteDivision'])
            ->name('admin.division.delete');
    });

    Route::prefix('contact_person')->group(function () {
        Route::post('/create', [ContactPersonController::class, 'createContactPerson'])
            ->name('admin.contact_person.create');
        Route::get('/{id}', [ContactPersonController::class, 'getSingleContactPerson'])
            ->name('admin.division.id');
        Route::post('/update/{id}',[ContactPersonController::class, 'updateContactPerson'])
            ->name('admin.contact_person.update');
        Route::delete('/delete/{id}',[ContactPersonController::class, 'deleteContactPerson'])
            ->name('admin.contact_person.delete');
    });

    Route::prefix('company')->group(function () {
        Route::post('/create', [CompanyController::class, 'createCompany'])
            ->name('admin.company.create');
        Route::get('/{id}', [CompanyController::class, 'getSingleCompany'])
            ->name('admin.company.id');
        Route::post('/update/{id}',[CompanyController::class, 'updateCompany'])
            ->name('admin.company.update');
        Route::delete('/delete/{id}',[CompanyController::class, 'deleteCompany'])
            ->name('admin.company.delete');
    });

    Route::prefix('company')->group(function () {
        Route::post('/create', [CompanyController::class, 'createCompany'])
            ->name('admin.company.create');
        Route::get('/{id}', [CompanyController::class, 'getSingleCompany'])
            ->name('admin.company.id');
        Route::post('/update/{id}',[CompanyController::class, 'updateCompany'])
            ->name('admin.company.update');
        Route::delete('/delete/{id}',[CompanyController::class, 'deleteCompany'])
            ->name('admin.company.delete');
    });

    Route::prefix('product')->group(function () {
        Route::post('/create', [ProductController::class, 'createProduct'])
            ->name('admin.product.create');
        Route::get('/detail/{id}', [ProductController::class, 'productDetailPage'])
            ->name('admin.product.detail.id');
        Route::get('/detail/data/{id}', [ProductController::class, 'getSingleProduct'])
            ->name('admin.product.detail.data.id');
        // Route::get('/{id}', [CompanyController::class, 'getSingleCompany'])
        //     ->name('admin.company.id');
        // Route::post('/update/{id}',[CompanyController::class, 'updateCompany'])
        //     ->name('admin.company.update');
        // Route::delete('/delete/{id}',[CompanyController::class, 'deleteCompany'])
        //     ->name('admin.company.delete');
    });
});