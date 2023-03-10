<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Status;
use App\Models\Country;
use App\Models\Penilai;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use App\Models\Song_category;
use App\Http\Controllers\Controller;

class PenilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $songs = Song::where('penilai_id',$penilai->pilih_penilai)->orderby('created_at','desc');
        $songs = Song::latest();

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                });
        }
        

        return view ('penilai.index',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_lagudinilai(Song $lagu_dinilai)
    {
        $songs = Song::whereNot('tarikh_dinilai',$lagu_dinilai->tarikh_dinilai = null);

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')                
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                });
        }
        

        return view ('penilai.index_lagudinilai',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_belumdinilai(Song $belum_dinilai)
    {
        $songs = Song::where('tarikh_dinilai',$belum_dinilai->tarikh_dinilai = null);

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                });
        }
        

        return view ('penilai.index_belumdinilai',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
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
    public function show(Song $penilai_lagu)
    {
        return view('penilai.show',[

            "song" =>$penilai_lagu,
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
    public function edit(Song $penilai_lagu)
    {
        return view('penilai.edit',[

            'song'=>$penilai_lagu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $penilai_lagu)
    {
        $song = Song::find($penilai_lagu->id);
        // dd($song);

        $validatedData = $request->validate([   
            'tarikh_dinilai' => '',  
            'lirik' => 'max:255',
            'sebutan' => 'max:255',
            'nyanyian' => 'max:255',
            'muzik' => 'max:255',
            'penerbitan_teknikal' => 'max:255'
        ]);
        

        Song::where('id', $song->id)->update($validatedData);

        return redirect('/penilai-lagu')->with('success', 'Lagu telah dikemaskini!');
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
