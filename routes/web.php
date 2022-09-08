<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerHistory;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Models\Tournament;
use Illuminate\Support\Facades\Mail;
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

Route::get('/test', function() {

    $matches = Tournament::WhereIn('player_1', [$player1->id, $player2->id])
        ->WhereIn('player_2', [$player1->id, $player2->id])
        ->get();
    $player1_wins = $matches->where('winner', $player1->id)->count();
    $player2_wins = $matches->where('winner', $player2->id)->count();
});

Route::get('/', [PlayerHistory::class, 'index_front'])->name('homepage.front');

Route::get('scores', [TournamentController::class, 'results'])->name('tournament.results');
Route::get('contact', [TournamentController::class, 'contact'])->name('tournament.contact');
Route::get('about', [TournamentController::class, 'about'])->name('tournament.about');
Route::post('email', [TournamentController::class, 'send_email'])->name('contact.send_email');

Route::get('results2', [TournamentController::class, 'results2'])->name('tournament.results2');

Route::group(['middleware' => ['auth']], function () {

    Route::group([
        'prefix' => 'profile',
    ], function () {
        Route::get('/{tab?}', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('account', [ProfileController::class, 'account'])->name('profile.account');

    });

//    Route::get('/home', [PlayerHistory::class, 'index'])->name('homepage.index');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::impersonate();

    Route::resource('matches', TournamentController::class);

    Route::group(
        [
            'middleware' => 'admin',
            'prefix' => 'admin',
            'as' => 'admin.'
        ], function () {

        Route::resource('players', PlayerController::class);
        Route::resource('users', UsersController::class);
        Route::post('password/{user}', [UsersController::class, 'password_update'])->name('user.password_update');

        Route::get('/reset', function () {
            dd('Nothing to do');

            if (env('APP_ENV') != 'local') {
                dd('Nothing to do');
                return;
            }
            \Artisan::call('migrate:fresh');
            \Artisan::call('db:seed');
            \Artisan::call('optimize:clear');
            dd('Database cleared');
        });

    });

});
