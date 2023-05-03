<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Song;
use App\Models\Status;
use App\Models\Country;
use App\Models\Penilai;
use App\Models\Download;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use App\Models\Song_category;
use Illuminate\Support\Facades\DB;

class PelulusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        

        return view ('pelulus.index',[

            "songs"=>$songs->paginate(5),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_meluluskan(Song $meluluskan)
    {
        $songs = Song::where('keputusan_id',$meluluskan->keputusan_id = 3)
                    ->whereNotNull('tarikh_dinilai');

        $songs->where(function($query) {
            $query->where('keputusan_id', 3);
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

        return view ('pelulus.index_meluluskan',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_statistik(Request $request)
    {   
        $search = $request->input('search');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        
        $downloads = Download::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%');
        })
        ->whereBetween('created_at', [$startDate, $endDate])
        ->paginate(5)
        ->appends(['search' => $search, 'startDate' => $startDate, 'endDate' => $endDate]);

        $labels = $downloads->pluck('user.name')->unique();
        $data = $downloads->groupBy('user.name')->map(function ($downloadsByUser) {
        return count($downloadsByUser);
        })->values();


        return view('pelulus.index_statistik',[

            'downloads' => $downloads,
            'labels'=>$labels,
            'data'=>$data

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
    public function show(Song $pelulus_lagu)
    {
        return view('pelulus.show',[

            "song" =>$pelulus_lagu,
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
    public function edit(Song $pelulus_lagu)
    {

        return view('pelulus.edit',[

            'song'=>$pelulus_lagu,
            'keputusans'=>Keputusan::all(),
            'penilais'=>Penilai::all(),
            'statuses'=>Status::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $pelulus_lagu)
    {
        $validatedData = $request->validate([
            'tarikh_diluluskan' => '',
            'status_id' => '',   
            'penilai_id'=>'',
            'terbit'=>''
        ]);
        
        $pelulus_lagu->terbit = $request->has('terbit');

        $validatedData['terbit'] = $pelulus_lagu->terbit;

        Song::where('id', $pelulus_lagu->id)->update($validatedData);

        return redirect('/pelulus-lagu')->with('success', 'Lagu telah dikemaskini!');

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
