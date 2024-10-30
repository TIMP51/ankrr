<?php

use App\Http\Controllers;
use App\Http\Controllers\CountriesController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('home');
//})->name('home');

Route::get('/countries', [CountriesController::class,'countiesIndex'])->name('countries')->middleware('role');
Route::post('/countries',[CountriesController::class,'countriesCreate'])->name('countries-create')->middleware('role');//Создание страны
Route::post('/countries/{id}',[CountriesController::class,'countriesOneUpdate'])->name('countries-view-update')->middleware('role');//Изменение страны
Route::get('/countries/view',[CountriesController::class,'countriesView'])->name('countries-view')->middleware('role');
Route::get('/countries/{id}',[CountriesController::class,'countriesOne'])->name('countries-view-one');
Route::get('/countries/{id}/delete',[CountriesController::class,'countriesDelete'])->name('countries-view-delete')->middleware('role');

Route::get('/studios/view', [Controllers\StudiosController::class, 'studiosView'])->name('studios-view')->middleware('role');
Route::get('/studios', [Controllers\StudiosController::class,'studios'])->name('studios')->middleware('role');
Route::post('/studios', [Controllers\StudiosController::class, 'studiosCreate'])->name('studios-create')->middleware('role');
Route::post('/studios/{id}',[Controllers\StudiosController::class,'studiosOneUpdate'])->name('studios-view-update')->middleware('role');
Route::get('/studios/{id}',[Controllers\StudiosController::class,'studiosOne'])->name('studios-view-one');
Route::get('/studios/{id}/delete',[Controllers\StudiosController::class,'studiosDelete'])->name('studios-view-delete')->middleware('role');

Route::get('/genres/view',[Controllers\GenresController::class, 'genresIndex'])->name('genres-view');
Route::get('/genres/create', [Controllers\GenresController::class, 'genres'])->name('genres')->middleware('role');
Route::post('/genres/create', [Controllers\GenresController::class, 'genresCreate'])->name('genres-create')->middleware('role');
Route::post('/genres/{id}',[Controllers\GenresController::class,'genresUpdate'])->name('genres-update')->middleware('role');
Route::get('/genres/{id}',[Controllers\GenresController::class,'genresOne'])->name('genres-one');
Route::get('/genres/{id}/delete',[Controllers\GenresController::class,'genresDelete'])->name('genres-delete')->middleware('role');

Route::get('/',[Controllers\AnimeController::class, 'animeIndex'])->name('anime');
Route::get('/filter',[Controllers\AnimeController::class, 'animeFilter'])->name('filter');
Route::get('/video/{filename}', [Controllers\AnimeController::class, 'animeVideo'])->name('video');
Route::get('/search',[Controllers\AnimeController::class, 'search'])->name('search');
Route::get('/sortName',[Controllers\AnimeController::class, 'sortName'])->name('sortName');
Route::get('/sortData',[Controllers\AnimeController::class, 'sortData'])->name('sortData');
Route::get('/serials',[Controllers\AnimeController::class, 'serials'])->name('serials');
Route::get('/full',[Controllers\AnimeController::class, 'full'])->name('full');
Route::get('/short',[Controllers\AnimeController::class, 'short'])->name('short');
Route::get('/anime/create',[Controllers\AnimeController::class, 'create'])->name('animation-create')->middleware('role');
Route::post('/anime/create',[Controllers\AnimeController::class, 'animeCreate'])->name('anime-create')->middleware('role');
Route::get('/anime/{id}',[Controllers\AnimeController::class, 'view'])->name('anime-view');

Route::get('/anime/liked/{id}',[Controllers\AnimeController::class, 'animeLiked'])->name('anime-liked');
Route::get('/anime/disliked/{id}',[Controllers\AnimeController::class, 'animeDisliked'])->name('anime-disliked');

Route::post('/anime/comment_edd/{id}',[Controllers\AnimeController::class, 'comment_add'])->name('comment-add');
Route::put('/anime/comment_edd/{id}',[Controllers\AnimeController::class, 'comment_edit'])->name('comment-edit');
Route::DELETE('/anime/comment_del/{comment}/delete',[Controllers\AnimeController::class, 'comment_del'])->name('comment-del');


Route::get('/anime/delete/{id}',[Controllers\AnimeController::class, 'delete'])->name('anime-delete')->middleware('role');
Route::get('/anime/update/{id}',[Controllers\AnimeController::class, 'viewUp'])->name('anime-view-update')->middleware('role');
Route::post('/anime/update/{id}',[Controllers\AnimeController::class, 'animeUpdate'])->name('anime-update')->middleware('role');
Route::get('/anime/{ani_id}/genres/{gen_id}', [Controllers\AnimeController::class, 'animeGenresDel'])->name('genre-delete')->middleware('role');
Route::get('/anime/{ani_id}/countries/{cou_id}', [Controllers\AnimeController::class, 'animeCountriesDel'])->name('country-delete')->middleware('role');

Route::get('/heroes',[Controllers\HeroesController::class, 'index'])->name('heroes-index')->middleware('role');
Route::get('/heroes/create',[Controllers\HeroesController::class, 'create'])->name('heroes-create')->middleware('role');
Route::post('/heroes/create',[Controllers\HeroesController::class, 'store'])->name('heroes-store')->middleware('role');
Route::get('/heroes/show/{id}',[Controllers\HeroesController::class, 'show'])->name('heroes-show');
Route::get('/heroes/edit/{id}',[Controllers\HeroesController::class, 'edit'])->name('heroes-edit')->middleware('role');
Route::post('/heroes/update/{id}',[Controllers\HeroesController::class, 'update'])->name('heroes-update')->middleware('role');
Route::get('/heroes/destroy/{id}',[Controllers\HeroesController::class, 'destroy'])->name('heroes-destroy')->middleware('role');

Route::get('/actors',[Controllers\ActorsController::class, 'index'])->name('actors-index')->middleware('role');
Route::get('/actors/create',[Controllers\ActorsController::class, 'create'])->name('actors-create')->middleware('role');
Route::post('/actors/create',[Controllers\ActorsController::class, 'store'])->name('actors-store')->middleware('role');
Route::get('/actors/show/{id}',[Controllers\ActorsController::class, 'show'])->name('actors-show');
Route::get('/actors/edit/{id}',[Controllers\ActorsController::class, 'edit'])->name('actors-edit')->middleware('role');
Route::post('/actors/update/{id}',[Controllers\ActorsController::class, 'update'])->name('actors-update')->middleware('role');
Route::get('/actors/destroy/{id}',[Controllers\ActorsController::class, 'destroy'])->name('actors-destroy')->middleware('role');

Route::get('/episodes',[Controllers\EpisodesController::class, 'index'])->name('episodes-index')->middleware('role');
Route::get('/episodes/create',[Controllers\EpisodesController::class, 'create'])->name('episodes-create')->middleware('role');
Route::post('/episodes/create',[Controllers\EpisodesController::class, 'store'])->name('episodes-store')->middleware('role');
Route::get('/episodes/show/{id}',[Controllers\EpisodesController::class, 'show'])->name('episodes-show')->middleware('role');
Route::get('/episodes/edit/{id}',[Controllers\EpisodesController::class, 'edit'])->name('episodes-edit')->middleware('role');
Route::post('/episodes/update/{id}',[Controllers\EpisodesController::class, 'update'])->name('episodes-update')->middleware('role');
Route::get('/episodes/destroy/{id}',[Controllers\EpisodesController::class, 'destroy'])->name('episodes-destroy')->middleware('role');

Route::get('video-upload', [ Controllers\EpisodesController::class, 'getVideoUploadForm' ])->name('get.video.upload');
Route::post('video-upload', [ Controllers\EpisodesController::class, 'uploadVideo' ])->name('store.video');


Route::get('/about',function (){
    return view('layouts/app');
})->name('about');
Route::get('/download',[Controllers\AnimeController::class, 'download'])->name('download');
Route::get('/help',function (){
    return response()->download(public_path('docs/guide.pdf'));
})->name('help');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/{id}', [ Controllers\UsersController::class, 'show' ])->name('user-show');
Route::get('/user/edit/{id}', [ Controllers\UsersController::class, 'edit' ])->name('user-edit');
Route::post('/user/update/{id}',[Controllers\UsersController::class, 'update'])->name('user-update');

