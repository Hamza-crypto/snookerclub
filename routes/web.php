<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerHistory;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


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


Route::get('/test', function (){

});

Route::get('/', [PlayerHistory::class, 'index'])->name('homepage.index');


Route::get('/reset', function () {
    DB::table('matches')->truncate();
    DB::table('players')->truncate();
    \Artisan::call('migrate:refresh');
    \Artisan::call('db:seed');
    \Artisan::call('optimize:clear');
    dd('Database cleared');
});


Route::group(['middleware' => ['auth']], function () {

    Route::group([
        'prefix' => 'profile',
    ], function () {
        Route::get('/{tab?}', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('account', [ProfileController::class, 'account'])->name('profile.account');

    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::impersonate();

    Route::resource('matches', MatchController::class);

    Route::group(
        [
            'middleware' => 'admin',
            'prefix' => 'admin',
            'as' => 'admin.'
        ], function () {

        Route::resource('admin/players', PlayerController::class);
        Route::resource('users', UsersController::class);
        Route::post('password/{user}', [UsersController::class, 'password_update'])->name('user.password_update');

    });


});
