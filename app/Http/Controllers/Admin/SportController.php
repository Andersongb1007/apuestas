<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.sport.index')->only('index');
        $this->middleware('can:admin.sport.create')->only('create');
        $this->middleware('can:admin.sport.edit')->only('edit','update');
        $this->middleware('can:admin.sport.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar lista de deportes
        $sports = Sport::all();

        return view('admin.sport.index',compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Sport $sport)
    {
        //
        $request->validate([
            'name'=>'required|unique:sports',
            'slug'=>'required|unique:sports'
        ]);
        $sport = Sport::create($request->all());
        return  redirect()->route('admin.sports.edit',$sport)->with('info','El deporte fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sport)
    {
        //
        return view('admin.sport.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        //
        return view('admin.sport.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Sport $sport)
    {
        //
        $request->validate([
            'name'=>'required|unique:sports',
            'slug'=> "required|unique:sports,slug,$sport->id"
        ]);
        $sport->update($request->all());
        return redirect()->route('admin.sports.edit',$sport)->with('info','El deporte fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
        $sport->delete();
        return redirect()->route('admin.sports.index')->with('info','Se eliminó con éxito');
    }
}