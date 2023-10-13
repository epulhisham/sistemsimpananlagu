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
use Illuminate\Support\Facades\Storage;

class PelulusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $songs = Song::latest();

<<<<<<< HEAD
        if ($request->has('search_query') && $request->has('search_field')) {
            $searchField = $request->input('search_field');
            $searchQuery = $request->input('search_query');
    
            if ($searchField === 'song_category') {
                $songs->whereHas('song_category', function ($query) use ($searchQuery) {
                    $query->where('kategori', 'like', '%' . $searchQuery . '%');
=======
        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhereHas('penilai', function($pilih_penilai){
                    $pilih_penilai->where('pilih_penilai', 'like', '%' . request('search') . '%');
                })
                ->orWhereHas('keputusan', function($pilih_keputusan){
                    $pilih_keputusan->where('pilih_keputusan', 'like', '%' . request('search') . '%');
>>>>>>> 87c393958a09f990c16591640cf583eccecdea84
                });
            } elseif ($searchField === 'country') {
                $songs->whereHas('country', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                });
            } elseif ($searchField === 'user') {
                $songs->whereHas('user', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                });
            } elseif($searchField === 'penilai') {
                if ($searchQuery === 'belum dipilih') {
                    $songs->whereNull('penilai_id');
                } elseif ($searchQuery !== '') {
                    $songs->whereHas('penilai', function ($subQuery) use ($searchQuery) {
                        $subQuery->where('pilih_penilai', 'LIKE', '%' . $searchQuery . '%');
                    });
                }    
            }  elseif($searchField === 'tarikh_dinilai') {
                if ($searchQuery === 'belum dinilai') {
                    $songs->whereNull('tarikh_dinilai');
                } elseif ($searchQuery === 'telah dinilai') {
                    $songs->whereNotNull('tarikh_dinilai');
                }
            }  elseif ($searchField === 'keputusan') {
                if (strcasecmp($searchQuery, 'Lulus') === 0) {
                    $songs->where(function ($query) {
                        $query->whereHas('keputusan', function ($subQuery) {
                            $subQuery->where('pilih_keputusan', 'LIKE', 'Lulus');
                        })->orWhereDoesntHave('keputusan');
                    });
                } else {
                    $songs->whereHas('keputusan', function ($query) use ($searchQuery) {
                        $query->where('pilih_keputusan', 'like', '%' . $searchQuery . '%');
                    });
                }
            }  elseif($searchField === 'terbit') {
                if ($searchQuery === 'belum diterbit') {
                    $searchQuery = 0; // Map "belum diterbit" to 0
                } elseif ($searchQuery === 'telah diterbit') {
                    $searchQuery = 1; // Map "telah diterbit" to 1
                }
            
                $songs->where('terbit', $searchQuery);
            }  else {
                $songs->where($searchField, 'like', '%' . $searchQuery . '%');
            }
        }

        return view ('pelulus.index',[

            "songs"=>$songs->paginate(20),
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

            "songs"=>$songs->paginate(5),
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

    public function index_taklulus(Song $lagu_tak_lulus)
    {
        $songs = Song::where('keputusan_id',$lagu_tak_lulus->keputusan_id = 2);

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
        

        return view ('pelulus.index_tak_lulus',[

            "songs"=>$songs->paginate(10),
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
        if ($request->has('tarikh_dinilai')) {
            $pelulus_lagu->tarikh_dinilai = now();
            $pelulus_lagu->keputusan_id = 1;
            $pelulus_lagu->status_id = $request->input('status_id');
            $pelulus_lagu->penilai_id = $request->input('penilai_id');
            $pelulus_lagu->tarikh_diluluskan = $request->input('tarikh_diluluskan');
        } else {
            $pelulus_lagu->tarikh_dinilai = $request->input('tarikh_dinilai');
            $pelulus_lagu->keputusan_id = 3;
            $pelulus_lagu->penilai_id = $request->input('penilai_id');
            $pelulus_lagu->status_id = $request->input('status_id');
            $pelulus_lagu->tarikh_diluluskan = $request->input('tarikh_diluluskan');
        }
        
        $pelulus_lagu->terbit = $request->has('terbit');
    
        $pelulus_lagu->save();

        return redirect('/pelulus-lagu')->with('success', 'Lagu telah dikemaskini!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $pelulus_lagu)
    {
        if($pelulus_lagu->lagu){
            // Storage::delete($lagu->lagu);     
            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$pelulus_lagu->lagu));
        }
        
        if($pelulus_lagu->fail_lagu){
            // Storage::delete($lagu->fail_lagu);
            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$pelulus_lagu->fail_lagu)); 
        }

        Song::destroy($pelulus_lagu->id);
        return redirect('/pelulus-lagu')->withErrors($pelulus_lagu)->withInput()->with('success', 'Lagu telah dipadam!');

    }
}
