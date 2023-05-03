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
        $songs = Song::whereHas('penilai', function($query){
            $query->where('user_id', auth()->user()->id);
        })
        ->latest();

        if (request('search')) {
            $songs->where(function ($query) {
                $query->where('artis', 'like', '%' . request('search') . '%')
                    ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                    ->orWhere('album', 'like', '%' . request('search') . '%')
                    ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                    ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                    ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                    ->orWhereHas('penilai', function($pilih_penilai){
                        $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                    });
                if (!auth()->user()->id) {
                    $query->whereHas('penilai', function($penilai) {
                        $penilai->where('user_id', auth()->user()->id);
                    });
                }
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

    public function index_lagudinilai()
    {
        $songs = Song::whereNotNull('tarikh_dinilai')
        ->whereHas('penilai', function($query){
            $query->where('user_id', auth()->user()->id);
        })
        ->latest();

        if (request('search')) {
            $songs->where(function ($query) {
                $query->where('artis', 'like', '%' . request('search') . '%')
                    ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                    ->orWhere('album', 'like', '%' . request('search') . '%')
                    ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                    ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                    ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                    ->orWhereHas('penilai', function($pilih_penilai){
                        $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                    });
                if (!auth()->user()->id) {
                    $query->whereHas('penilai', function($penilai) {
                        $penilai->where('user_id', auth()->user()->id);
                    });
                }
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

    public function index_belumdinilai()
    {
        $songs = Song::whereHas('penilai', function($query){
            $query->where('user_id', auth()->user()->id);
        })
        ->where(function($query) {
            $query->whereNull('tarikh_dinilai')->orWhere('tarikh_dinilai', '=', 0);
        })
        ->latest();

        if (request('search')) {
            $songs->where(function ($query) {
                $query->where('artis', 'like', '%' . request('search') . '%')
                    ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                    ->orWhere('album', 'like', '%' . request('search') . '%')
                    ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                    ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                    ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                    ->orWhereHas('penilai', function($pilih_penilai){
                        $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                    });
                if (!auth()->user()->id) {
                    $query->whereHas('penilai', function($penilai) {
                        $penilai->where('user_id', auth()->user()->id);
                    });
                }
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

    public function index_lulus(Song $lagu_lulus)
    {
        $songs = Song::where('keputusan_id',$lagu_lulus->keputusan_id = 1);

        $songs->where(function($query) {
            $query->where('keputusan_id', 1);
        })->where(function($query) {
            $query->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                });
        });
        

        return view ('penilai.index_lulus',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_taklulus(Song $lagu_taklulus)
    {
        $songs = Song::where('keputusan_id',$lagu_taklulus->keputusan_id = 2);

        $songs->where(function($query) {
            $query->where('keputusan_id', 2);
        })->where(function($query) {
            $query->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                });
        });
        

        return view ('penilai.index_taklulus',[

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

            'song'=>$penilai_lagu,
            'keputusans' =>  Keputusan::all()
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
            'penerbitan_teknikal' => 'max:255',
            'keputusan_id'=>''
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
