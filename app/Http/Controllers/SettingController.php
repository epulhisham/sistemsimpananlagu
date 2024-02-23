<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Song_category;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(){
        return view('setting.setting');
    }

    public function song_category(){

        $song_categories = Song_category::paginate(10);

        return view('setting.song_category',[
            "song_categories" => $song_categories
        ]);
    }

    public function create_song_category(){

        return view('setting.create_song_category');
    }

    public function store_song_category(Request $request){

        $validatedData = $request->validate([
            'kategori' => 'required|max:255'
        ]);

        Song_category::create($validatedData);

        return redirect('/tetapan/kategori-lagu')->with('success','Kategori Lagu berjaya ditambah');

    }

    public function edit_song_category(Song_category $song_category){

        return view('setting.edit_song_category',[
            "song_category"=>$song_category
        ]);
    }

    public function update_song_category(Request $request, Song_category $song_category ){

        $song_category = Song_category::find($song_category->id);

        $validatedData = $request->validate([
            'kategori' => 'required|max:255'
        ]);

        Song_category::where('id',$song_category->id)->update($validatedData);

        return redirect('/tetapan/kategori-lagu')->with('success','Kategori Lagu berjaya dikemaskini');
    }

    public function destroy_song_category($id){

        $song_category = Song_category::find($id);

        $song_category->delete();

        return redirect('/tetapan/kategori-lagu')->with('success','Kategori Lagu berjaya dipadam');
    }
}
