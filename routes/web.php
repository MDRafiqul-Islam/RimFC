<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\user\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\PlayerListController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\FixtureController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\user\UserHomeController;
use App\Http\Controllers\manager\playercontroller;
use App\Http\Controllers\admin\PlayerStateController;
use App\Http\Controllers\admin\SponsorController;
use App\Http\Controllers\admin\VenuController;
use App\Http\Controllers\manager\FormationController;
use App\Http\Controllers\manager\TrainingTypeController;
use App\Http\Controllers\manager\Fixturecontroller as ManagerFixtureController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TicketController;
use GuzzleHttp\Psr7\Message;

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



//user

Route::get('/',[UserHomeController::class, 'home'])->name('user.website');
Route::get('/dologin',[UserController::class,'dologin'])->name('user.dologin');
Route::get('/doregistration',[UserController::class,'doregistration'])->name('user.doregistration');
Route::post('/registration',[UserController::class,'registration'])->name('user.registration');
Route::post('/login',[UserController::class,'login'])->name('user.login');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');

//player
Route::get('/pages/playersList',[UserHomeController::class, 'showPlayer'])->name('user.pages.playerslist');

//news
Route::get('/pages/news',[UserHomeController::class, 'shownews'])->name('user.pages.news');
Route::get('/pages/newsdetailes/{news_id}',[UserHomeController::class, 'shownewsdetailes'])->name('user.pages.newsDetails');

Route::group(['prefix'=>'user'],function (){
    Route::get('/', function () {
            return view('user.welcome');
        })->name('website');
//massage
Route::get('/pages/massage',[MessageController::class, 'usermassage'])->name('user.pages.massage')->middleware('auth');
Route::post('/pages/createmassage/{user_id}',[MessageController::class, 'usercreatemassage'])->name('user.pages.createmassage')->middleware('auth');
Route::get('/pages/massagelist/{user_id}',[MessageController::class, 'usermassagelist'])->name('user.pages.massagelist')->middleware('auth');

//Ticket
Route::get('/pages/showticket',[TicketController::class, 'showTicketUser'])->name('user.pages.showticket');
Route::get('/pages/buyticket/{ticket_id}',[TicketController::class, 'buyTicket'])->name('user.pages.buyticket')->middleware('auth');
Route::post('/pages/cartticket/{ticket_id}',[TicketController::class, 'cart'])->name('user.pages.cartticket')->middleware('auth');
Route::post('/pages/confirmcart',[TicketController::class, 'confirmcart'])->name('user.pages.confirmcart')->middleware('auth');

});


//manager


Route::group(['prefix'=>'manager', 'middleware'=>['auth','manager']],function (){
    Route::get('/', function () {
            return view('manager.welcome');
        })->name('website');


//player
Route::get('/pages/playersList',[playercontroller::class, 'showPlayer'])->name('manager.pages.playerslist');
Route::get('/pages/matchplayer',[FormationController::class, 'matchPlayer'])->name('manager.pages.matchplayer');

//fixture
Route::get('/pages/fixture',[ManagerFixtureController::class, 'showFixture'])->name('manager.pages.fixture');

//massage
Route::get('/pages/massage',[MessageController::class, 'managermassage'])->name('manager.pages.massage');
Route::post('/pages/createmassage/{user_id}',[MessageController::class, 'managercreatemassage'])->name('manager.pages.createmassage');
Route::get('/pages/massagelist/{user_id}',[MessageController::class, 'managermassagelist'])->name('manager.pages.massagelist');

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

//training
Route::get('/pages/trainingtype',[TrainingTypeController::class, 'trainingtypelist'])->name('manager.pages.trainingtype');
Route::get('/pages/trainingstatus',[TrainingTypeController::class, 'trainingstatus'])->name('manager.pages.trainingstatus');
Route::get('/pages/editstatus/{id}',[TrainingTypeController::class, 'editstatmanager'])->name('manager.pages.editstatus');
Route::patch('/pages/editstatuslist/{id}', [TrainingTypeController::class, 'editstateListmanager'])->name('manager.pages.editstatuslist');


});



//admin



Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', function () {
            return view('admin.welcome');
        });



//players
Route::get('/pages/playersList',[PlayerListController::class, 'playerList'])->name('admin.pages.playerslist');
Route::get('/pages/createplayers',[PlayerListController::class, 'create'])->name('admin.pages.createplayers');
Route::post('/pages/addplayers',[PlayerListController::class, 'addplayer'])->name('admin.player.add');
Route::get('/pages/Deleteplayer/{player_id}',[PlayerListController::class, 'playerDelete'])->name('admin.pages.deleteplayers');
Route::get('/pages/EditPlayer/{player_id}', [PlayerListController::class, 'playerEdit'])->name('admin.pages.editplayers');
Route::patch('/pages/EditPlayerlist/{player_id}', [PlayerListController::class, 'editPlayerList'])->name('admin.pages.editplayerlist');
Route::get('/pages/searchplayers',[PlayerListController::class, 'serach'])->name('admin.pages.searchplayer');

//player-state
Route::get('/pages/playerStateList',[PlayerStateController::class, 'showState'])->name('admin.pages.playerstatelist');
Route::get('/pages/createplayerStateList',[PlayerStateController::class, 'createState'])->name('admin.pages.createplayerstate');
Route::post('/pages/addplayerStateList',[PlayerStateController::class, 'createPlayerState'])->name('admin.pages.addplayerstate');

//massage
Route::get('/pages/massage',[MessageController::class, 'massage'])->name('admin.pages.massage');
Route::post('/pages/createmassage/{user_id}',[MessageController::class, 'createmassage'])->name('admin.pages.createmassage');
Route::get('/pages/massagelist/{user_id}',[MessageController::class, 'massagelist'])->name('admin.pages.massagelist');

//news
Route::get('/pages/news',[NewsController::class, 'news'])->name('admin.pages.news');
Route::get('/pages/createnews',[NewsController::class, 'create'])->name('admin.pages.createnews');
Route::post('/pages/addnews' , [NewsController::class, 'addnews'])-> name('admin.pages.addnews');
Route::get('/pages/Deletenews/{news_id}',[NewsController::class, 'newsdelete'])->name('admin.pages.deletenews');
Route::get('/pages/Editnews/{news_id}', [NewsController::class, 'newsEdit'])->name('admin.pages.editnews');
Route::patch('/pages/Editnewslist/{news_id}', [NewsController::class, 'editNewsList'])->name('admin.pages.editnewslist');

//stadium
Route::get('/pages/venu',[VenuController::class, 'showvenu'])->name('admin.pages.venu');
Route::get('/pages/createvenu',[VenuController::class, 'createvenu'])->name('admin.pages.createvenu');
Route::post('/pages/addvenu',[VenuController::class, 'addVenu'])->name('admin.pages.addvenu');
Route::get('/pages/Editvenu/{venu_id}', [VenuController::class, 'venuEdit'])->name('admin.pages.editvenu');
Route::patch('/pages/Editvixturelist/{venu_id}', [VenuController::class, 'editVenuList'])->name('admin.pages.editvenulist');
Route::get('/pages/showvenu/{id}',[VenuController::class, 'viewimage'])->name('admin.pages.showvenu');
Route::get('/pages/deletevenu/{id}',[VenuController::class, 'venudelete'])->name('admin.pages.deletevenu');

//fixture
Route::get('/pages/fixture',[FixtureController::class, 'showFixture'])->name('admin.pages.fixture');
Route::get('/pages/createfixture',[FixtureController::class, 'createFixture'])->name('admin.pages.createfixture');
Route::post('/pages/addfixture',[FixtureController::class, 'addFixture'])->name('admin.pages.addfixture');
Route::get('/pages/deletefixture/{fixture_id}',[FixtureController::class, 'fixturedelete'])->name('admin.pages.deletefixture');
Route::get('/pages/Editfixture/{fixture_id}', [FixtureController::class, 'FixtureEdit'])->name('admin.pages.editfixture');
Route::patch('/pages/EditFixturelist/{fixture_id}', [FixtureController::class, 'editFixtureList'])->name('admin.pages.editfixturelist');


//result
Route::get('/pages/createresult/{fixture_id}',[ResultController::class, 'createResult'])->name('admin.pages.createresult');
Route::post('/pages/addresult',[ResultController::class, 'addResult'])->name('admin.pages.addresult');
Route::get('/pages/result',[ResultController::class, 'showResult'])->name('admin.pages.result');

//manage
Route::get('/pages/user',[ManageController::class, 'showUser'])->name('admin.pages.manageuser');
Route::patch('pages/block/{id}', [UserController::class, 'block'])->name('admin.pages.block');


//ticket
Route::get('/pages/createticket/{fixture_id}',[TicketController::class, 'createTicket'])->name('admin.pages.createticket');
Route::post('/pages/addticket',[TicketController::class, 'addTicket'])->name('admin.pages.addticket');
Route::get('/pages/showticket',[TicketController::class, 'showTicket'])->name('admin.pages.showticket');


//training
Route::get('/pages/trainingstatus',[TrainingTypeController::class, 'admintrainingstatus'])->name('admin.pages.trainingstatus');
Route::get('/pages/editstatus/{id}',[TrainingTypeController::class, 'editstat'])->name('admin.pages.editstatus');
Route::patch('/pages/editstatuslist/{id}', [TrainingTypeController::class, 'editstateList'])->name('admin.pages.editstatuslist');

//partner
Route::get('/pages/partnerlist',[SponsorController::class, 'showsponsor'])->name('admin.pages.partnerlist');
Route::get('/pages/createpartner',[SponsorController::class, 'createsponsor'])->name('admin.pages.createpartner');
Route::post('/pages/createpartnerlist',[SponsorController::class, 'createsponsorlist'])->name('admin.pages.createpartnerlist');
Route::get('/pages/Deletesponsor/{sponsor_id}',[SponsorController::class, 'sponsorDelete'])->name('admin.pages.deletesponsor');
Route::get('/pages/Editsponsor/{sponsor_id}', [SponsorController::class, 'sponsoerEdit'])->name('admin.pages.editsponsor');
Route::patch('/pages/Editsponsor/{sponsor_id}', [SponsorController::class, 'editSponsorList'])->name('admin.pages.editsponsorlist');

//gallery
Route::get('/pages/showGalleryCategory',[GalleryController::class, 'showGalleryCategory'])->name('admin.pages.showGalleryCategory');
Route::get('/pages/createGalleryCategory',[GalleryController::class, 'createGalleryCategory'])->name('admin.pages.createGalleryCategory');
Route::post('/pages/createCategory',[GalleryController::class, 'createCategory'])->name('admin.pages.createCategory');
Route::get('/pages/showGallery',[GalleryController::class, 'showGallery'])->name('admin.pages.showGallery');
Route::get('/pages/createGallery',[GalleryController::class, 'createGallery'])->name('admin.pages.createGallery');




});
