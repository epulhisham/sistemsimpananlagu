<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Status;
use App\Models\Country;
use App\Models\Penilai;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use App\Models\Song_category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Download;

class DiterbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Song $lagu_diterbit, Request $request)
    {
            $songs = Song::where('terbit',$lagu_diterbit->terbit = 1)->latest();
    
            if ($request->has('search_query') && $request->has('search_field')) {
                $searchField = $request->input('search_field');
                $searchQuery = $request->input('search_query');
        
                if ($searchField === 'song_category') {
                    $songs->whereHas('song_category', function ($query) use ($searchQuery) {
                        $query->where('kategori', 'like', '%' . $searchQuery . '%');
                    });
                } elseif ($searchField === 'country') {
                    $songs->whereHas('country', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    });
                }elseif ($searchField === 'user') {
                    $songs->whereHas('user', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    });
                } else {
                    $songs->where($searchField, 'like', '%' . $searchQuery . '%');
                }
            }
            
            return view ('diterbit.index',[
    
                "songs"=>$songs->paginate(20),
                'statuses'=>Status::all(),
                'penilais'=>Penilai::all(),
                'countries'=>Country::all(),
                'keputusans'=>Keputusan::all()
                
            ]);
    }

    public function downloadCount(Request $request){

        $song = Song::find($request->id);
        $song->downloadCount = $song->downloadCount+1;
        $song->save();

        $songCount = $song->downloadCount; 

        $totalCount = Song::sum('downloadCount');

        Download::create([
            "user_id" => auth()->user()->id,
            "song_id" => $song->id,
            'tarikh' => $song->created_at
        ]);

        return response()->json(['songCount'=>$songCount, 'totalCount'=>$totalCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $lagu_diterbit)
    {
        return view('diterbit.show',[

            "song" =>$lagu_diterbit,
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all(),
            'song_categories'=>Song_category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
