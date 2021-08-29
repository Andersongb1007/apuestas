<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.type.index')->only('index');
        $this->middleware('can:admin.type.create')->only('create');
        $this->middleware('can:admin.type.edit')->only('edit','update');
        $this->middleware('can:admin.type.destroy')->only('destroy');
    }

    public function index()
    {
        //
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Type $type  )
    {
        //
        $request->validate([
            'name'=>'required|unique:sports',
            'slug'=>'required|unique:sports',
            'condition'=>'required',
            'description'=>'required',
            'percentage' => 'required'
        ]);
        $sport = Type::create($request->all());
        return  redirect()->route('admin.type.edit',$sport)->with('info','El Typo de apuesta fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
        return view('admin.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Type $type)
    {
        //Ediar apuestas

        $request->validate([
            'name'=>'required|unique:sports',
            'slug'=> "required|unique:sports,slug,$type->id",
            'condition'=>'required',
            'description'=>'required',
            'percentage' => 'required'
        ]);
        $type->update($request->all());
        return redirect()->route('admin.type.edit',$type)->with('info','El tipo de apuesta fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return redirect()->route('admin.type.index')->with('info','Se eliminó con éxito');
    }
}