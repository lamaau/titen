<?php

use App\Http\Controllers\Api\BrandJsonController;
use App\Http\Controllers\Api\DirectorJsonController;
use App\Http\Controllers\Hrd\Api\DutyJsonController;
use App\Http\Controllers\Hrd\Api\VehicleJsonController;
use App\Http\Controllers\Logistics\Api\CategoryJsonController;
use App\Http\Controllers\Logistics\Api\CommodityNoteJsonController;
use App\Http\Controllers\Logistics\Api\EmployeJsonController;
use App\Http\Controllers\Logistics\Api\NecessityJsonController;
use App\Http\Controllers\Logistics\Api\ProductJsonController;
use App\Http\Controllers\Logistics\Api\PurchaseItemJsonController;
use App\Http\Controllers\Logistics\Api\SupplierJsonController;
use App\Http\Controllers\Logistics\Api\UnitJsonController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(fn (): array => [
    Route::controller(DirectorJsonController::class)->prefix('directors')->group(fn (): array => [
        Route::get('/', 'index'),
        Route::get('/{director}', 'show'),
    ]),

    Route::controller(BrandJsonController::class)->prefix('brands')->group(fn (): array => [
        Route::get('/', 'index'),
        Route::get('/{brand}', 'show'),
    ]),

    Route::prefix('/hrd')->group(fn (): array => [
        Route::controller(DutyJsonController::class)->prefix('duties')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{duty}', 'show'),
        ]),

        Route::controller(EmployeJsonController::class)->prefix('employes')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{employe}', 'show'),
        ]),

        Route::controller(VehicleJsonController::class)->prefix('vehicles')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{vehicle}', 'show'),
        ]),
    ]),

    Route::prefix('/logistics')->group(fn (): array => [
        Route::controller(PurchaseItemJsonController::class)->prefix('purchase')->group(fn (): array => [
            Route::get('{commodity}', 'show'),
        ]),

        Route::controller(UnitJsonController::class)->prefix('units')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{unit}', 'show'),
        ]),

        Route::controller(CommodityNoteJsonController::class)->prefix('notes')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{note}', 'show'),
        ]),

        Route::controller(CategoryJsonController::class)->prefix('categories')->group(fn (): array => [
            Route::get('/', 'index'),
            Route::get('/{category}', 'show'),
        ]),

        Route::controller(ProductJsonController::class)->prefix('/select')->group(fn (): array => [
            Route::get('/products', 'products'),
            Route::get('/{necessity}/products', 'productsWhereNecessity'),
        ]),

        Route::controller(NecessityJsonController::class)->prefix('/necessities')->group(fn (): array => [
            Route::get('/', 'select'),
            Route::get('/{necessity}', 'show'),
        ]),

        Route::controller(SupplierJsonController::class)->prefix('/suppliers')->group(fn (): array => [
            Route::get('/', 'select'),
            Route::get('/{supplier}', 'show'),
        ]),
    ]),
]);
