<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [Api\HomeController::class, 'index'])->name('api');

Route::group(['prefix' => 'p'], function () {
    Route::get('/', [Api\ProvinceController::class, 'index'])->name('api.provinces.index');
    Route::get('/{provinceCode}', [Api\ProvinceController::class, 'show'])->name('api.provinces.show');
    Route::get('/{provinceCode}/d', [Api\DistrictController::class, 'getByProvinceCode'])->name('api.districts.getByProvinceCode');
    Route::get('/{provinceCode}/d/{districtCode}', [Api\DistrictController::class, 'show'])->name('api.districts.show');
});
