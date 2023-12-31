<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Status;
use App\Models\Country;
use App\Models\Penilai;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use App\Models\Song_category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $songs = Song::where('user_id',auth()->user()->id)->orderby('created_at','desc');

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
            }  elseif($searchField === 'tarikh_dinilai') {
                if ($searchQuery === 'belum dinilai') {
                    $songs->whereNull('tarikh_dinilai');
                } elseif ($searchQuery === 'telah dinilai') {
                    $songs->whereNotNull('tarikh_dinilai');
                }
            } elseif ($searchField === 'keputusan') {
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
            }else {
                $songs->where($searchField, 'like', '%' . $searchQuery . '%');
            }
        }
        

        return view ('lagu.index',[

            "songs"=>$songs->paginate(5),
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
        $categories = Song_category::where('kategori', '!=', 'Lain-lain')->get();
        $lainLain = Song_category::where('kategori', 'Lain-lain')->first();
        $songCategories = $categories->concat([$lainLain]);

        return view('lagu.create',[

            'statuses'=>Status::all(),
            'penilais'=>Penilai::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all(),
            'song_categories'=>$songCategories
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
            'ref_number' => 'max:255',
            'pencipta_lagu' => 'required|max:255',
            'penulis_lirik' => 'required|max:255',
            'syarikat_rakaman' => 'required|max:255',
            'song_category_id' => 'required|not_in:0',
            'country_id' => 'required|not_in:0',
            'catatan' => 'max:255',
            'lagu'=>'required|mimes:audio/mpeg,mpga,mp3,wav,aac,flac|max:150000',
            'fail_lagu'=>'mimes:pdf,docx,png,jpeg',
            'tarikh_diterima' => '',
            'tarikh_dinilai' => '',
            'tarikh_diluluskan' => '',      
            'lirik' => 'max:255',
            'sebutan' => 'max:255',
            'nyanyian' => 'max:255',
            'muzik' => 'max:255',
            'penerbitan_teknikal' => 'max:255',
            'keputusan_id'=>'',
            'terbit'=>''
        ]);

        if($request->file('lagu')){
            $filenameWithExt = $request->lagu->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $filePath = 'public/songs/'.$fileNameToStore;
            $toLocalStorage = $request->lagu->storeAs('public/songs/', $fileNameToStore);
            echo $toLocalStorage;
            $validatedData['lagu'] = 'https://d38gy8luw6hjwu.cloudfront.net/' . $filePath;
        }

        if($request->file('fail_lagu')){
            $filenameWithExt = $request->fail_lagu->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->fail_lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $filePath = 'public/files/'.$fileNameToStore;
            $toLocalStorage = $request->fail_lagu->storeAs('public/files/', $fileNameToStore);
            echo $toLocalStorage;
            $validatedData['fail_lagu'] = 'https://d38gy8luw6hjwu.cloudfront.net/' . $filePath;
        }
        
        $validatedData['user_id'] = auth()->user()->id;


        Song::create($validatedData);

        return redirect('/lagu')->with('success', 'Lagu baharu ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $lagu)
    {
        return view('lagu.show',[

            "song" =>$lagu,
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
    public function edit(Song $lagu)
    {

        $categories = Song_category::where('kategori', '!=', 'Lain-lain')->get();
        $lainLain = Song_category::where('kategori', 'Lain-lain')->first();
        $songCategories = $categories->concat([$lainLain]);

        return view('lagu.edit',[

            'song'=>$lagu,
            'statuses'=>Status::all(),
            'countries'=>Country::all(),
            'keputusans'=>Keputusan::all(),
            'song_categories'=>$songCategories
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $lagu)
    {
        $lagu = Song::find($lagu->id);
        // dd($song);

        $validatedData = $request->validate([
            'artis' => 'required|max:255',
            'tajuk' => 'required|max:255',
            'album' => 'required|max:255',
            'ref_number' => 'max:255',
            'pencipta_lagu' => 'required|max:255',
            'penulis_lirik' => 'required|max:255',
            'syarikat_rakaman' => 'required|max:255',
            'song_category_id' => 'not_in:0',
            'country_id' => 'not_in:0',
            'catatan' => 'max:255',
            'lagu'=>'mimes:audio/mpeg,mpga,mp3,wav,aac,flac|max:150000',
            'fail_lagu'=>'mimes:pdf,docx,png,jpeg',   
            'tarikh_diterima' => '',
            'tarikh_dinilai' => '',
            'tarikh_diluluskan' => '',   
            'lirik' => 'max:255',
            'sebutan' => 'max:255',
            'nyanyian' => 'max:255',
            'muzik' => 'max:255',
            'penerbitan_teknikal' => 'max:255',
            'keputusan_id'=>'',
            'terbit'=>''
        ]);

        if($request->hasFile('lagu')){

            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$lagu->lagu));
            $filenameWithExt = $request -> lagu -> getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $filePath = 'public/songs/'.$fileNameToStore;
            $toLocalStorage = $request->lagu->storeAs('public/songs/', $fileNameToStore);
            echo $toLocalStorage;
            $validatedData['lagu'] = 'https://d38gy8luw6hjwu.cloudfront.net/'. $filePath;
        }

        if($request->hasFile('fail_lagu')){
            
            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$lagu->fail_lagu));
            $filenameWithExt = $request -> fail_lagu -> getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->fail_lagu->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $filePath = 'public/files/'.$fileNameToStore;
            $toLocalStorage = $request->fail_lagu->storeAs('public/files/', $fileNameToStore);
            echo $toLocalStorage;
            $validatedData['fail_lagu'] = 'https://d38gy8luw6hjwu.cloudfront.net/' . $filePath;
        }
        
        $lagu->terbit = $request->has('terbit');

        Song::where('id', $lagu->id)->update($validatedData);

        $user = Auth::user();

        $redirectUrl = $user->choose_user_id == 2 ? '/lagu' : '/pelulus-lagu';

        return redirect($redirectUrl)->with('success', 'Lagu telah dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $lagu)
    {
        if($lagu->lagu){   
            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$lagu->lagu));
        }
        
        if($lagu->fail_lagu){
            Storage::delete(str_replace('https://d38gy8luw6hjwu.cloudfront.net/',"",$lagu->fail_lagu)); 
        }

        Song::destroy($lagu->id);
        return redirect('/pelulus-lagu')->withErrors($lagu)->withInput()->with('success', 'Lagu telah dipadam!');

    }
}
