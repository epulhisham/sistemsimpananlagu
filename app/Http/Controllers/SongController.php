<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Status;
use App\Models\Country;
use App\Models\Keputusan;
use App\Models\Penilai;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
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
                ->orWhere('kategori_lagu', 'like', '%' . request('search') . '%');
        }
        

        return view ('mainpage.songs.index',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index1()
    {
        // $songs = Song::latest();
        $songs = Song::where('user_id',auth()->user()->id);


        if(request('search')){

            $songs = Song::where('artis', 'like', '%' . request('search') . '%')
                ->orWhere('tajuk', 'like', '%' . request('search') . '%')
                ->orWhere('album', 'like', '%' . request('search') . '%')
                ->orWhere('pencipta_lagu', 'like', '%' . request('search') . '%')
                ->orWhere('penulis_lirik', 'like', '%' . request('search') . '%')
                ->orWhere('syarikat_rakaman', 'like', '%' . request('search') . '%')
                ->orWhere('kategori_lagu', 'like', '%' . request('search') . '%');
        }
        

        return view ('mainpage.songs.index1',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index2()
    {
        $songs = Song::latest();
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
        

        return view ('mainpage.songs.index2',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index3()
    {
        $songs = Song::latest();
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
        

        return view ('mainpage.songs.index3',[

            "songs"=>$songs->paginate(3),
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
            
        ]);
    }

    public function index4(Song $song)
    {
        $songs = Song::where('terbit',$song->terbit = 1);
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
        

        return view ('mainpage.songs.index4',[

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
        return view('mainpage.songs.create',[

            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'artis' => 'required|max:255',
            'tajuk' => 'required|max:255',
            'album' => 'required|max:255',
            'pencipta_lagu' => 'required|max:255',
            'penulis_lirik' => 'required|max:255',
            'syarikat_rakaman' => 'required|max:255',
            'kategori_lagu' => 'required|max:255',
            'saiz' => 'required|max:255',
            'masa_minit' => 'required|max:255',
            'masa_saat' => 'required|max:255',
            'country_id' => 'required',
            'catatan' => 'required|max:255',
            'tarikh_diterima' => '',
            'tarikh_dinilai' => '',
            'tarikh_diluluskan' => '',   
            'status_id' => 'required',   
            'penilai_id' => 'required',
            'lirik' => 'max:255',
            'sebutan' => 'max:255',
            'nyanyian' => 'max:255',
            'muzik' => 'max:255',
            'penerbitan_teknikal' => 'max:255',
            'keputusan_id'=>'',
            'terbit'=>''
        ]);

        if($request->file('fail_lagu')){
            $filenameWithExt = $request->fail_lagu->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->fail_lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // dd($fileNameToStore);
            // $validatedData['fail_lagu'] = $request->file('fail_lagu')->put('songs');
            $toLocalStorage = $request->fail_lagu->storeAs('public/songs/', $fileNameToStore);
            $validatedData['fail_lagu'] = '/storage/songs/' . $fileNameToStore;
        }
        
        $validatedData['user_id'] = auth()->user()->id;


        Song::create($validatedData);

        return redirect('/mainpage/songs')->with('success', 'Lagu baharu ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('mainpage.songs.show',[

            "song" =>$song,
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Song $song)
    {
        // dd(  Keputusan::all()[0]->id);
        return view('mainpage.songs.edit',[

            'song'=>$song,
            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $song = Song::find($song->id);

        $validatedData = $request->validate([
            'artis' => 'required|max:255',
            'tajuk' => 'required|max:255',
            'album' => 'required|max:255',
            'pencipta_lagu' => 'required|max:255',
            'penulis_lirik' => 'required|max:255',
            'syarikat_rakaman' => 'required|max:255',
            'kategori_lagu' => 'required|max:255',
            'saiz' => 'required|max:255',
            'masa_minit' => 'required|max:255',
            'masa_saat' => 'required|max:255',
            'country_id' => 'required',
            'catatan' => 'required|max:255',
            'tarikh_diterima' => '',
            'tarikh_dinilai' => '',
            'tarikh_diluluskan' => '',   
            'status_id' => 'required',   
            'penilai_id' => 'required',
            'lirik' => 'max:255',
            'sebutan' => 'max:255',
            'nyanyian' => 'max:255',
            'muzik' => 'max:255',
            'penerbitan_teknikal' => 'max:255',
            'keputusan_id' => '',
            'terbit'=>''
        ]);

        if($request->hasFile('fail_lagu')){

            $destination = '/storage/songs/' . $song->fail_lagu;
            if(Song::exists($destination)){
                Song::destroy($destination);
            }

            $filenameWithExt = $request -> fail_lagu -> getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->fail_lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $toLocalStorage = $request->fail_lagu->storeAs('public/songs/', $fileNameToStore);
            $validatedData['fail_lagu'] = '/storage/songs/' . $fileNameToStore;
        }

        $song->terbit = $request->has('terbit');

        Song::where('id', $song->id)->update($validatedData);

        return redirect('/mainpage/songs')->with('success', 'Lagu telah dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        if($song->fail_lagu){
            Storage::delete($song->fail_lagu);
        }
        
        Song::destroy($song->id);
        return redirect()->back()->withErrors($song)->withInput()->with('success', 'Lagu telah dipadam!');
    }


}
