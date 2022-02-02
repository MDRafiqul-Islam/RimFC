<?php

use App\Http\Controllers\AchievementController;
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
use App\Models\Achievement;
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

Route::get('/',[UserHomeController::class, 'dashboard'])->name('user.website');
Route::get('/dologin',[UserController::class,'dologin'])->name('user.dologin');
Route::get('/doregistration',[UserController::class,'doregistration'])->name('user.doregistration');
Route::post('/registration',[UserController::class,'registration'])->name('user.registration');
Route::post('/login',[UserController::class,'login'])->name('user.login');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
Route::get('/profile/{id}',[UserController::class,'userprofile'])->name('user.profile')->middleware('auth');
//profile
Route::get('/pages/editprofile/{id}',[UserController::class, 'editprofile'])->name('user.pages.editprofile')->middleware('auth');
Route::patch('/pages/profileedit/{id}',[UserController::class, 'profileedit'])->name('user.pages.profileedit')->middleware('auth');
Route::get('/ticketprint/{id}',[UserHomeController::class, 'ticketPrint'])->name('user.pages.ticketprint')->middleware('auth');
//player
Route::get('/pages/playersList',[UserHomeController::class, 'showPlayer'])->name('user.pages.playerslist');
Route::get('/pages/playerdetailes/{player_id}',[UserHomeController::class, 'playerdetailes'])->name('user.pages.playerdetailes');

//news
Route::get('/pages/news',[UserHomeController::class, 'shownews'])->name('user.pages.news');
Route::get('/pages/newsdetailes/{news_id}',[UserHomeController::class, 'shownewsdetailes'])->name('user.pages.newsDetails');

Route::group(['prefix'=>'user'],function (){
//massage
Route::get('/pages/massage',[MessageController::class, 'usermassage'])->name('user.pages.massage')->middleware('auth');
Route::post('/pages/createmassage/{user_id}',[MessageController::class, 'usercreatemassage'])->name('user.pages.createmassage')->middleware('auth');
Route::get('/pages/massagelist/{user_id}',[MessageController::class, 'usermassagelist'])->name('user.pages.massagelist')->middleware('auth');

//Ticket
Route::get('/pages/showticket',[TicketController::class, 'showTicketUser'])->name('user.pages.showticket');
Route::get('/pages/buyticket/{ticket_id}',[TicketController::class, 'buyTicket'])->name('user.pages.buyticket')->middleware('auth');
Route::post('/pages/cartticket/{ticket_id}',[TicketController::class, 'cart'])->name('user.pages.cartticket')->middleware('auth');
Route::post('/pages/confirmcart',[TicketController::class, 'confirmcart'])->name('user.pages.confirmcart')->middleware('auth');
Route::get('/pages/cancleticket/{id}',[TicketController::class, 'cancleTicket'])->name('user.pages.cancleticket')->middleware('auth');

//fixture
Route::get('/pages/fixture',[UserHomeController::class, 'showfixture'])->name('user.pages.fixture');
//result
Route::get('/pages/result',[UserHomeController::class, 'showResult'])->name('user.pages.result');
//venu
Route::get('/pages/venu',[UserHomeController::class, 'showvenu'])->name('user.pages.venu');
//sponsor
Route::get('/pages/partnerlist',[UserHomeController::class, 'showsponsor'])->name('user.pages.partnerlist');
//gellary
Route::get('/pages/showGallery',[UserHomeController::class, 'showGallery'])->name('user.pages.showGallery');
Route::get('/pages/showGalleryplayer',[UserHomeController::class, 'showGalleryplayer'])->name('user.pages.showGalleryplayer');
Route::get('/pages/showGalleryresult',[UserHomeController::class, 'showGalleryresult'])->name('user.pages.showGalleryresult');
Route::get('/pages/showGallerytraining',[UserHomeController::class, 'showGallerytraining'])->name('user.pages.showGallerytraining');
Route::get('/pages/showGalleryachievement',[UserHomeController::class, 'showGalleryachievement'])->name('user.pages.showGalleryachievement');
});


//manager


Route::group(['prefix'=>'manager', 'middleware'=>['auth','manager']],function (){
    Route::get('/', [playercontroller::class, 'dashboard']);

Route::get('/manager/profile/{id}',[UserController::class,'managerprofile'])->name('manager.profile');
//player
Route::get('/pages/playersList',[playercontroller::class, 'showPlayer'])->name('manager.pages.playerslist');
Route::get('/pages/matchplayer',[FormationController::class, 'matchPlayer'])->name('manager.pages.matchplayer');
Route::get('/pages/editplayer/{id}',[FormationController::class, 'editplayer'])->name('manager.pages.editplayer');
Route::patch('/pages/playeredit/{id}',[FormationController::class, 'playeredit'])->name('manager.pages.playeredit');
Route::get('/pages/playerstate',[playercontroller::class, 'playerstate'])->name('manager.pages.playerstate');

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
  //driblling
  Route::get('/pages/trainingdribling',[TrainingTypeController::class, 'traindriblling'])->name('manager.pages.training.dribbling');
  Route::get('/pages/addtainingdriblling',[TrainingTypeController::class, 'trainingdriblling'])->name('manager.pages.addtainingdriblling');
  Route::get('/pages/trainplayerdribling',[TrainingTypeController::class, 'showdriblling'])->name('manager.pages.dribbling');
  Route::Post('/pages/editdribling',[TrainingTypeController::class, 'editdriblling'])->name('manager.pages.edit.dribbling');
  //crossing
  Route::get('/pages/trainingcrossing',[TrainingTypeController::class, 'traincrossing'])->name('manager.pages.training.crossing');
  Route::get('/pages/addtainingcrossing',[TrainingTypeController::class, 'trainingcrossing'])->name('manager.pages.addtainingcrossing');
  Route::get('/pages/trainplayercrossing',[TrainingTypeController::class, 'showcrossing'])->name('manager.pages.crossing');
  Route::Post('/pages/editcrossing',[TrainingTypeController::class, 'editcrossing'])->name('manager.pages.edit.crossing');
  //heading
  Route::get('/pages/trainingheading',[TrainingTypeController::class, 'trainheading'])->name('manager.pages.training.heading');
  Route::get('/pages/addtainingheading',[TrainingTypeController::class, 'trainingheading'])->name('manager.pages.addtainingheading');
  Route::get('/pages/trainplayerheading',[TrainingTypeController::class, 'showheading'])->name('manager.pages.heading');
  Route::Post('/pages/editheading',[TrainingTypeController::class, 'editheading'])->name('manager.pages.edit.heading');
  //passing
  Route::get('/pages/traininpassing',[TrainingTypeController::class, 'trainpassing'])->name('manager.pages.training.passing');
  Route::get('/pages/addtainingpassing',[TrainingTypeController::class, 'trainingpassing'])->name('manager.pages.addtainingpassing');
  Route::get('/pages/trainplayerpassing',[TrainingTypeController::class, 'showpassing'])->name('manager.pages.passing');
  Route::Post('/pages/editpassing',[TrainingTypeController::class, 'editpassing'])->name('manager.pages.edit.passing');
  //shooting
  Route::get('/pages/trainingshooting',[TrainingTypeController::class, 'trainshooting'])->name('manager.pages.training.shooting');
  Route::get('/pages/addtainingshooting',[TrainingTypeController::class, 'trainingshooting'])->name('manager.pages.addtainingshooting');
  Route::get('/pages/trainplayershooting',[TrainingTypeController::class, 'showshooting'])->name('manager.pages.shooting');
  Route::Post('/pages/editshooting',[TrainingTypeController::class, 'editshooting'])->name('manager.pages.edit.shooting');
  //tracling
  Route::get('/pages/trainingtracling',[TrainingTypeController::class, 'traintracling'])->name('manager.pages.training.tracling');
  Route::get('/pages/addtaining',[TrainingTypeController::class, 'trainingtracling'])->name('manager.pages.addtainingtracling');
  Route::get('/pages/trainplayertracling',[TrainingTypeController::class, 'showtracling'])->name('manager.pages.tracling');
  Route::Post('/pages/edittracling',[TrainingTypeController::class, 'edittracling'])->name('manager.pages.edit.tracling');
  //turning
  Route::get('/pages/trainingturning',[TrainingTypeController::class, 'trainturning'])->name('manager.pages.training.turning');
  Route::get('/pages/addtainingturning',[TrainingTypeController::class, 'trainingturning'])->name('manager.pages.addtainingturning');
  Route::get('/pages/trainplayerturning',[TrainingTypeController::class, 'showturning'])->name('manager.pages.turning');
  Route::Post('/pages/editturning',[TrainingTypeController::class, 'editturning'])->name('manager.pages.edit.turning');

//Result
Route::get('/pages/result',[playercontroller::class, 'showResult'])->name('manager.pages.result');

//profile
Route::get('/pages/editprofile/{id}',[UserController::class, 'managereditprofile'])->name('manager.pages.editprofile');
Route::patch('/pages/profileedit/{id}',[UserController::class, 'managerprofileedit'])->name('manager.pages.profileedit');


});



//admin



Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', [ManageController::class,'dashboard']);
Route::get('/admin/profile/{id}',[UserController::class,'adminprofile'])->name('admin.profile');
//players
Route::get('/pages/playersList',[PlayerListController::class, 'playerList'])->name('admin.pages.playerslist');
Route::get('/pages/createplayers',[PlayerListController::class, 'create'])->name('admin.pages.createplayers');
Route::post('/pages/addplayers',[PlayerListController::class, 'addplayer'])->name('admin.player.add');
Route::get('/pages/Deleteplayer/{player_id}',[PlayerListController::class, 'playerDelete'])->name('admin.pages.deleteplayers');
Route::get('/pages/EditPlayer/{player_id}', [PlayerListController::class, 'playerEdit'])->name('admin.pages.editplayers');
Route::patch('/pages/EditPlayerlist/{player_id}', [PlayerListController::class, 'editPlayerList'])->name('admin.pages.editplayerlist');
Route::get('/pages/matchplayers',[ManageController::class, 'matchplayer'])->name('admin.pages.matchplayer');
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
Route::get('/pages/deleteresult/{result_id}',[ResultController::class, 'resultdelete'])->name('admin.pages.deleteresult');
Route::get('/pages/Editresult/{result_id}', [ResultController::class, 'resultEdit'])->name('admin.pages.editresult');
Route::patch('/pages/Editresultlist/{result_id}', [ResultController::class, 'editResultList'])->name('admin.pages.editresultlist');

//manage
Route::get('/pages/user',[ManageController::class, 'showUser'])->name('admin.pages.manageuser');
Route::patch('pages/block/{id}', [UserController::class, 'block'])->name('admin.pages.block');


//ticket
Route::get('/pages/createticket/{fixture_id}',[TicketController::class, 'createTicket'])->name('admin.pages.createticket');
Route::post('/pages/addticket',[TicketController::class, 'addTicket'])->name('admin.pages.addticket');
Route::get('/pages/showticket',[TicketController::class, 'showTicket'])->name('admin.pages.showticket');
Route::get('/pages/ticketshow',[ManageController::class, 'ticketshow'])->name('admin.pages.ticketshow');
Route::get('/pages/editticket/{id}',[TicketController::class, 'editticket'])->name('admin.pages.editticket');
Route::patch('/pages/ticketedit/{id}',[TicketController::class, 'ticketedit'])->name('admin.pages.ticketedit');
Route::patch('/pages/deleteticket/{id}',[TicketController::class, 'ticketdelete'])->name('admin.pages.deleteticket');

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
Route::get('/pages/Deletecategory/{id}',[GalleryController::class, 'deletecategory'])->name('admin.pages.deletecategory');
Route::get('/pages/DeleteGallery/{id}',[GalleryController::class, 'deleteGallery'])->name('admin.pages.deleteGallery');
   //player
Route::get('/pages/showGalleryplayer',[GalleryController::class, 'showGalleryplayer'])->name('admin.pages.showGalleryplayer');
Route::get('/pages/createGalleryplayer/{player_id}',[GalleryController::class, 'createGalleryplayer'])->name('admin.pages.createGalleryplayer');
Route::post('/pages/addGalleryplayer',[GalleryController::class, 'addGalleryplayer'])->name('admin.pages.addGalleryplayer');
   //result
Route::get('/pages/showGalleryresult',[GalleryController::class, 'showGalleryresult'])->name('admin.pages.showGalleryresult');
Route::get('/pages/createGalleryresult/{result_id}',[GalleryController::class, 'createGalleryresult'])->name('admin.pages.createGalleryresult');
Route::post('/pages/addGalleryresult',[GalleryController::class, 'addGalleryresult'])->name('admin.pages.addGalleryresult');
   //achievement
Route::get('/pages/showGalleryachievement',[GalleryController::class, 'showGalleryachievement'])->name('admin.pages.showGalleryachievement');
Route::get('/pages/createGalleryachievement/{achievement_id}',[GalleryController::class, 'createGalleryachievement'])->name('admin.pages.createGalleryachievement');
Route::post('/pages/addGalleryachievement',[GalleryController::class, 'addGalleryachievement'])->name('admin.pages.addGalleryachievement');
   //training
Route::get('/pages/showGallerytraining',[GalleryController::class, 'showGallerytraining'])->name('admin.pages.showGallerytraining');
Route::get('/pages/createGallerytraining',[GalleryController::class, 'createGallerytraining'])->name('admin.pages.createGallerytraining');
Route::post('/pages/addGallerytraining',[GalleryController::class, 'addGallerytraining'])->name('admin.pages.addGallerytraining');

//Player Achievement
Route::get('/pages/PlayerAchievement',[PlayerListController::class, 'pachivement'])->name('admin.pages.playerachievement');
Route::get('/pages/editplayerAchievement/{player_id}',[PlayerListController::class, 'pachivementEdit'])->name('admin.pages.editplayerachievement');
Route::patch('/pages/playerAchievementedit/{id}',[PlayerListController::class, 'editpachivement'])->name('admin.pages.playerachievementedit');


//achievement
Route::get('/pages/Achievement',[AchievementController::class, 'achievement'])->name('admin.pages.achievement');
Route::get('/pages/createAchievement',[AchievementController::class, 'create'])->name('admin.pages.createachievement');
Route::post('/pages/createAchievementlist',[AchievementController::class, 'addachievement'])->name('admin.pages.crateachievementlist');
Route::get('/pages/Deleteachievement/{id}',[AchievementController::class, 'deleteachievemnt'])->name('admin.pages.deleteachievement');
Route::get('/pages/editAchievement/{id}',[AchievementController::class, 'achivementEdit'])->name('admin.pages.editachievement');
Route::patch('/pages/achievementedit/{id}',[AchievementController::class, 'editachivement'])->name('admin.pages.achievementedit');

//profile
Route::get('/pages/editprofile/{id}',[UserController::class, 'admineditprofile'])->name('admin.pages.editprofile');
Route::patch('/pages/profileedit/{id}',[UserController::class, 'adminprofileedit'])->name('admin.pages.profileedit');

});
