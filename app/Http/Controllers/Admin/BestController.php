<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Best;
use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Requests\BestRequest;
use App\Http\Requests\StoreBestRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\elementType;

class BestController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.bests.index')->only('index');
        $this->middleware('can:admin.bests.create')->only('create');
        $this->middleware('can:admin.bests.edit')->only('edit','update');
        $this->middleware('can:admin.bests.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $best = Best::all();
        return view('admin.bests.index', compact('best'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sports = Sport::pluck('name','id');
        return view('admin.bests.create',compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBestRequest $request)
    {
        //

        //return Storage::put('bests',$request->file('file'));

        $best = Best::create($request->all());
        if($request->file('file')){
            $url = Storage::put('bests',$request->file('file'));
            $best->image()->create([
                'url' => $url,
            ]);
        }
        return redirect()->route('admin.bests.edit', $best);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Best $best)
    {
        //
        return view('admin.bests.show', compact('best'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Best $best)
    {
        //
        $sports = Sport::pluck('name','id');
        return view('admin.bests.edit', compact('best', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBestRequest $request, Best  $best)
    {
        //
        $best->update($request->all());

        if($request->file('file')){

            $url = Storage::put('bests',$request->file('file'));

            if($best->image){
                Storage::delete($best->image->url);

                $best->image->update([
                    'url' => $url,
                ]);
            }else{
                $best->image()->create([
                    'url' => $url,
                ]);
            }
        }

        return redirect()->route('admin.bests.edit',$best)->with('info', ' La apuesta se actualizo con éxito ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Best $best)
    {
        //
        $best->delete();
        return redirect()->route('admin.bests.index')->with('info', ' La apuesta se elimino con éxito ');
    }
}
