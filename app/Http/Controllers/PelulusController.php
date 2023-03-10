<?php

namespace App\Http\Controllers;

use DOMDocument;
use Carbon\Carbon;
use App\Models\Song;
use App\Models\User;
use App\Models\Status;
use App\Models\Country;
use App\Models\Penilai;
use App\Models\Keputusan;
use App\Models\Choose_user;
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
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%');
        }
        

        return view ('pelulus.index',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_meluluskan(Song $meluluskan)
    {
        $songs = Song::where('keputusan_id',$meluluskan->keputusan_id = 3);

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%');
        }
        

        return view ('pelulus.index_meluluskan',[

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

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhere('kategori_lagu', 'like', '%' . request('search') . '%');
        }
        

        return view ('pelulus.index_lulus',[

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

        if(request('search')){

            $songs->where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhere('kategori_lagu', 'like', '%' . request('search') . '%');
        }
        

        return view ('pelulus.index_taklulus',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index_statistik()
    {   
        $songs1 = Song::paginate(3);  
        $songs = Song::count();
        $syarikat_rakaman = User::where('choose_user_id','1')->count();
        $syarikat_stesen = User::where('choose_user_id','2')->count();
        $penilai = User::where('choose_user_id','3')->count();
        $downloadCount = Song::count('downloadCount');

        $songsChart = Song::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(downloadCount) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->pluck('count', 'month_name');

        $labels = $songsChart->keys();
        $data = $songsChart->values();

        return view ('pelulus.index_statistik', compact('syarikat_rakaman', 'syarikat_stesen', 'penilai', 'songs', 'labels', 'data', 'downloadCount','songs1'));
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
        // $lagu = Song::find($pelulus_lagu->id);
        // dd($song);

        $validatedData = $request->validate([
            'tarikh_diluluskan' => '',   
            'keputusan_id'=>'',
            'penilai_id'=>'',
            'terbit'=>''
        ]);
        
        $pelulus_lagu->terbit = $request->has('terbit');

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
