<?php

use App\Http\Controllers\admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerListController;
use App\Http\Controllers\user\UserHomeController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/',[UserHomeController::class, 'home'])->name('website');

//user

Route::group(['prefix'=>'user'],function (){
    Route::get('/', function () {
            return view('user.welcome');
        })->name('website');

Route::get('/pages/playersList',[UserHomeController::class, 'showPlayer'])->name('user.pages.playerslist');
Route::get('/pages/news',[UserHomeController::class, 'shownews'])->name('user.pages.news');
//Route::get('/pages/news',[UserHomeController::class, 'shownewsdetailes'])->name('user.pages.newsDetails');


});


//admin


Route::get('admin/login',[AdminUserController::class, 'login'])->name('admin.login');
Route::post('admin/dologin',[AdminUserController::class, 'dologin'])->name('admin.dologin');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/', function () {
            return view('welcome');
        })->name('home');

Route::get('/logout',[AdminUserController::class,'logout'])->name('admin.logout');

//players
Route::get('/pages/playersList',[PlayerListController::class, 'playerList'])->name('admin.pages.playerslist');
Route::get('/pages/createplayers',[PlayerListController::class, 'create'])->name('admin.pages.createplayers');
Route::post('/pages/addplayers',[PlayerListController::class, 'addplayer'])->name('admin.player.add');
Route::get('/pages/Deleteplayer/{player_id}',[PlayerListController::class, 'playerDelete'])->name('admin.pages.deleteplayers');
Route::get('/pages/EditPlayer/{player_id}', [PlayerListController::class, 'playerEdit'])->name('admin.pages.editplayers');
Route::patch('/pages/EditPlayerlist/{player_id}', [PlayerListController::class, 'editPlayerList'])->name('admin.pages.editplayerlist');
Route::get('/pages/searchplayers',[PlayerListController::class, 'serach'])->name('admin.pages.searchplayer');


//news
Route::get('/pages/news',[NewsController::class, 'news'])->name('admin.pages.news');
Route::get('/pages/createnews',[NewsController::class, 'create'])->name('admin.pages.createnews');
Route::post('/pages/addnews' , [NewsController::class, 'addnews'])-> name('admin.pages.addnews');
});
