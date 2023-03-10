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

class DiterbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Song $lagu_diterbit)
    {
            $songs = Song::where('terbit',$lagu_diterbit->terbit = 1);
            // $songs = Song::where('user_id',auth()->user()->id)->paginate(3);
    
            if(request('search')){
    
                $songs->where('artis', 'like', '%' . request('search') . '%')
                    ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                    ->orWhere('album', 'like', '%' . request('search') . '%')
                    ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                    ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                    ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                    ->orWhere('kategori_lagu', 'like', '%' . request('search') . '%');
            }
            
            return view ('diterbit.index',[
    
                "songs"=>$songs->paginate(3),
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
