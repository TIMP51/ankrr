<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimationRequest;
use App\Models\Animations;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Genres;
use App\Models\Studios;
use App\Models\Types;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpOffice\PhpWord\IOFactory;
use \App\Models\Comment;

class AnimeController extends Controller
{
    public function download(){
        $anime = Animations::all();
        $phpWord = new PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle('Мультфильмы',);
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '006699',
            'cellMargin' => 80,
        ]);
        $table->addRow();
        $table->addCell(500)->addText('Название мульфильма',['size' => 16, 'bold' => true]);
        $table->addCell(2000)->addText('Тип мульфильма',['size' => 16, 'bold' => true]);
        $table->addCell(4000)->addText('Студия',['size' => 16, 'bold' => true]);
        foreach($anime as $movie) {
            $table->addRow();
            $table->addCell(2000)->addText($movie->name,['size' => 14]);
            $table->addCell(2000)->addText($movie->type->name,['size' => 14]);
            $table->addCell(2000)->addText($movie->studio->name,['size' => 14]);
        }
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('мультфильмы.docx');
        return response()->download(public_path('animations.docx'));
    }
    public function animeIndex()
    {
        $anime = Animations::paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime, 'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio,]);
    }

    public function animeFilter(Request $request)
    {
//        //коллекция по жанрам
        $genre_ids = $request->input('genres', []);
        $type_id = $request->input('type_id');
        $studio_id = $request->input('studio_id');
        $query = Animations::query();
        if (!empty($genre_ids)) {
            $query->whereHas('genres', function ($query) use ($genre_ids) {
                $query->whereIn('genres.id', $genre_ids);
            });
        }
        if (!empty($type_id)) {
            $query->where('type_id', $type_id);
        }
        if (!empty($studio_id)) {
            $query->where('studio_id', $studio_id);
        }
        $animations = $query->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', [
            'anime' => $animations,
            'genres' => $availableGenres,
            'type' => $type,
            'studio' => $studio,
        ]);
    }

    public function sortName()
    {
        $anime = Animations::orderBy('name')->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime,'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio]);
    }
    public function sortData()
    {
        $anime = Animations::orderByDesc('release_year')->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime,'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio]);
    }
    public function search(Request $req){
        $search = $req->search;
        $anime = Animations::query()->where('name','LIKE',"%{$search}%")->get();
        return view('/anime/search',['anime'=>$anime]);
    }
    public function serials()
    {
        $anime = Animations::where('type_id',1)->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime,'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio]);
    }
    public function full()
    {
        $anime = Animations::where('type_id', 2)->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime,'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio]);
    }
    public function short()
    {
        $anime = Animations::where('type_id', 3)->paginate(8);
        $genres = Genres::all();
        $assignedGenres = [];
        $type = Types::all();
        $studio = Studios::all();
        $availableGenres = $genres->diff($assignedGenres);
        return view('/anime/animeIndex', ['anime' => $anime,'genres' => $availableGenres, 'type'=>$type, 'studio'=>$studio]);
    }
    public function view($id)
    {
        $anime = Animations::find($id);
        $heroes = Animations::with('heroes')->find($id);
        $genres = Animations::with('genres')->find($id);
        $countries = Animations::with('countries')->find($id);
        $userLiked = Animations::with('users')->find($id);
        $col=1;
        $userId = Auth::id();
        $com = Animations::with('comments')->find($id);
//        foreach ($anime->comments as $row) {
//            if ($row->user_id == $userId) {
//                dd($row->text);
//            }
//        }
        $averageRating = $anime->averageRating;
//        foreach ($anime->heroes as $hero){
//                dd($hero->first_name, $hero->actor->first_name);
//        }
        if(Auth::check()) {
            $userNames = $userLiked->users->pluck('name')->contains(Auth::user()->name);
            return view('/anime/animeView', ['genre' => $genres, 'anime' => $anime->find($id), 'heroes'=>$heroes, 'col'=>$col,
                'userNames'=>$userNames,'com'=>$com,'averageRating'=>$averageRating, 'userId'=>$userId, 'countries'=>$countries] );
        }

        return view('/anime/animeView', ['genre'=>$genres,'anime'=>$anime->find($id),'heroes'=>$heroes,'col'=>$col,'userId'=>$userId,'averageRating'=>$averageRating,'countries'=>$countries] );
    }
    public function animeLiked($id){
        $animation = Animations::findOrFail($id);
        $animation->users()->attach(auth()->id());
        return redirect()->back()->with('licked', 'Добавлено в избранное.');
    }
    public function animeDisliked($id){
        $animation = Animations::findOrFail($id);
        $animation->users()->detach(auth()->id());
        return redirect()->back()->with('disliked', 'Удалено из избранного.');
    }
    public function comment_add($id, Request $request){
        $animation = Animations::findOrFail($id);
        $userId = auth()->id();
        if(Comment::with('user_id', $userId)->where('animation_id', $animation)->exists()){
            return back()->withErrors(['review' => 'Вы уже оставили отзыв на этот фильм']);
        }
        $this->validate($request, [
            'text' => 'required|string|max:255',
        ]);
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->animation_id = $animation->id;
        $comment->rating = $request->input('rating');
        $comment->text = $request->input('text');
        $comment->save();
        return redirect()->back();
    }
    public function comment_edit($id, Request $request)
    {
        $comment = Comment::where('user_id', auth()->id())
            ->where('animation_id', $id)
            ->firstOrFail();
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $comment->save();

        return redirect()->back();
    }
    public function comment_del(Comment $comment, Request $request)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Комментарий удален успешно!');
    }

    public function viewUp($id)
    {
        $animation = Animations::with(['genres' => function ($query) {
            $query->orderBy('name');
        }])->findOrFail($id);
        $type = Types::all();
        $studio = Studios::all();
        $category = Categories::all();
        $allGenres = Genres::all()->sortBy('name');
        $assignedGenres = $animation->genres->pluck('id')->toArray();
        $availableGenres = $allGenres->diffKeys($assignedGenres);
        $allCountries = Countries::all()->sortBy('name');
        $assignedCountries = $animation->countries->pluck('id')->toArray();
        $availableCountries = $allCountries->diffKeys($assignedCountries);
        return view('anime/animeUpdate', ['animation' => $animation->find($id), 'type' => $type, 'studio' => $studio,
            'genres' => $availableGenres, 'countries'=>$availableCountries,'category'=>$category]);
    }
    public function animeUpdate($id, AnimationRequest $req)
    {
        $animation = Animations::findOrFail($id);
        $req->validate([
            'image' => 'image|mimes:jpg,bmp,webp,png'
        ]);
        $animation->name = $req->input('name');
        $animation->description = $req->input('description');
        $animation->release_year = $req->input('release_year');
        $animation->type_id = $req->input('type_id');
        $animation->studio_id = $req->input('studio_id');
        $animation->category_id = $req->input('category_id');
        $animation->user_id = 1;
        if ($req->has('image')) {
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 600)->save($location);
            $animation->image = $filename;
        }
        $genre_ids = $req->input('genre_ids');
        $animation->genres()->attach($genre_ids);
        $country_ids = $req->input('country_ids');
        $animation->countries()->attach($country_ids);
        $animation->save();
        return redirect()->route('anime-view', $id);
    }
    public function create()
    {
        $type = Types::all();
        $studio = Studios::all();
        $genres = Genres::all();
        $assignedGenres = [];
        $availableGenres = $genres->diff($assignedGenres);
        $countries = Countries::all();
        $assignedCountries = [];
        $availableCountries = $countries->diff($assignedCountries);

        return view('anime/animeCreate', ['type' => $type, 'studio' => $studio, 'genres' => $availableGenres, 'countries'=>$availableCountries]);
    }
    public function animeCreate(AnimationRequest $req)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'release_year' => '',
            'image' => 'required|image|mimes:jpg,bmp,webp,png',
            'type_id' => 'required|exists:types,id',
            'studio_id' => 'required|exists:studios,id',
            'category_id' => 'required|exists:categories,id',
            'user_id' => '1',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
            'countries'=>'array',
            'countries.*' => 'exists:countries,id',
        ]);
        $animation = new Animations([
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'release_year' => $req->input('release_year'),
            'type_id' => $req->input('type_id'),
            'studio_id' => $req->input('studio_id'),
            'category_id' => $req->input('category_id'),
            'genre_ids' => $req->input('genre_ids'),
            'country_ids' => $req->input('country_ids'),
        ]);
        if ($req->has('image')) {
            $image = $req->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 600)->save($location);
            $animation->image = $filename;
        }
        $animation->save();
        $animation->genres()->attach($validatedData['genres']);
        $animation->countries()->attach($validatedData['countries']);
        return redirect()->route('anime');
    }
    public function animeGenresDel($ani_id, $gen_id)
    {
        $animation = Animations::find($ani_id);
        $genre = Genres::find($gen_id);
        $animation->genres()->detach($genre);
        return redirect()->route('anime-view-update', $ani_id);
    }
    public function animeCountriesDel($ani_id, $cou_id)
    {
        $animation = Animations::find($ani_id);
        $country = Countries::find($cou_id);
        $animation->countries()->detach($country);
        return redirect()->route('anime-view-update', $ani_id);
    }
    public function delete($id){
        Animations::find($id)->delete();
        return redirect()->route('anime');
    }
    public function animeVideo($filename){
        $videoPath = public_puth('videos/'.$filename);
        return response()->file($videoPath);
    }

}
