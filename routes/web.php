<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\PlayerListController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\FixtureController;
use App\Http\Controllers\user\UserHomeController;
use App\Http\Controllers\manager\playercontroller;
use App\Http\Controllers\manager\FormationController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\manager\Fixturecontroller as ManagerFixtureController;

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
Route::get('/pages/newsdetailes/{news_id}',[UserHomeController::class, 'shownewsdetailes'])->name('user.pages.newsDetails');


});


//manager

Route::group(['prefix'=>'manager'],function (){
    Route::get('/', function () {
            return view('manager.welcome');
        })->name('website');

//player
Route::get('/pages/playersList',[playercontroller::class, 'showPlayer'])->name('manager.pages.playerslist');

//fixture
Route::get('/pages/fixture',[ManagerFixtureController::class, 'showFixture'])->name('manager.pages.fixture');

//formation
Route::get('/pages/formation/{fixture_id}',[FormationController::class, 'formation'])->name('manager.pages.formation');
Route::get('/pages/formation1/{fixture_id}',[FormationController::class, 'formation1'])->name('manager.pages.formations.3-4-2-1');
Route::get('/pages/formation2/{fixture_id}',[FormationController::class, 'formation2'])->name('manager.pages.formations.3-4-3');
Route::get('/pages/formation3/{fixture_id}',[FormationController::class, 'formation3'])->name('manager.pages.formations.4-1-2-1-2');
Route::get('/pages/formation4/{fixture_id}',[FormationController::class, 'formation4'])->name('manager.pages.formations.4-2-1-3');
Route::get('/pages/formation5/{fixture_id}',[FormationController::class, 'formation5'])->name('manager.pages.formations.4-3-1-2');
Route::get('/pages/formation6/{fixture_id}',[FormationController::class, 'formation6'])->name('manager.pages.formations.4-3-3-d');
Route::get('/pages/formation7/{fixture_id}',[FormationController::class, 'formation7'])->name('manager.pages.formations.4-4-2');
Route::post('/pages/createformation',[FormationController::class, 'createFormation'])->name('manager.pages.createFormation');
Route::get('/pages/position',[FormationController::class, 'showPosition'])->name('manager.pages.position');


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
Route::get('/pages/Deletenews/{news_id}',[NewsController::class, 'newsdelete'])->name('admin.pages.deletenews');
Route::get('/pages/Editnews/{news_id}', [NewsController::class, 'newsEdit'])->name('admin.pages.editnews');
Route::patch('/pages/Editnewslist/{news_id}', [NewsController::class, 'editNewsList'])->name('admin.pages.editnewslist');


//fixture
Route::get('/pages/fixture',[FixtureController::class, 'showFixture'])->name('admin.pages.fixture');
Route::get('/pages/createfixture',[FixtureController::class, 'createFixture'])->name('admin.pages.createfixture');
Route::post('/pages/addfixture',[FixtureController::class, 'addFixture'])->name('admin.pages.addfixture');


//result
Route::get('/pages/createresult/{fixture_id}',[ResultController::class, 'createResult'])->name('admin.pages.createresult');
Route::post('/pages/addresult',[ResultController::class, 'addResult'])->name('admin.pages.addresult');
Route::get('/pages/result',[ResultController::class, 'showResult'])->name('admin.pages.result');


});
