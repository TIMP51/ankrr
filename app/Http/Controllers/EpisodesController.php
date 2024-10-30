<?php

namespace App\Http\Controllers;

use App\Models\Animations;
use App\Models\Episodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $episodes = Episodes::with('animation')->get();
        return view ('/episodes/index',compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $animations = Animations::all();
        return view('/episodes/create', compact('animations', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimetypes:video/mp4|max:'. (100 * 1024), // 100 MB
        ], [
            'video.max' => 'Размер видео не может превышать: 100мб',
        ], [
            'max' => ':attribute must be :max or less.',
        ]);
        $fileName = $request->video->getClientOriginalName();
        $filePath = ''. $fileName;
        $isFileUploaded = Storage::disk('public')->put($fileName, file_get_contents($request->video));

        if ($isFileUploaded) {
            $video = new Episodes();
            $video->name = $request->name;
            $video->description = $request->description;
            $video->animation_id = $request->animation_id;
            $video->video = $filePath;
            $video->save();
            return back()
            ->with('success','Видео было успешно загружено.');
        }
            return back()
                ->with('error','Unexpected error occured');

//        $episodes->save();
//        return redirect()->route('episodes-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $episodes = Episodes::find($id);
        return view('/episodes/view',compact('episodes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $episodes = Episodes::find($id);
        $animations = Animations::all();
        return view('/episodes/edit',compact('episodes', 'animations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episodes = Episodes::findOrFail($id);
//        $request->validate([
//            'video' => 'required|mimetypes:video/mp4|max:100000'
//        ]);
        $request->validate([
            'video' => 'required|mimetypes:video/mp4|max:'. (100 * 1024), // 100 MB
        ], [
            'video.max' => 'Размер видео не может превышать: 100мб',
        ], [
            'max' => ':attribute must be :max or less.',
        ]);
        $fileName = $request->video->getClientOriginalName();
        $filePath = ''. $fileName;
        $isFileUploaded = Storage::disk('public')->put($fileName, file_get_contents($request->video));
        if ($isFileUploaded) {
            $video = $episodes;
            $video->name = $request->name;
            $video->description = $request->description;
            $video->animation_id = $request->animation_id;
            $video->video = $filePath;
            //dd($video);
            $video->save();

            return back()
            ->with('success','Эпизод был успешно изменен.');
        }
        return back()
            ->with('error','ошибка загрузки видео');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Episodes::find($id)->delete();
        return redirect()->route('episodes-index');
    }
}
