<?php

namespace App\Http\Controllers;

use App\Models\Prendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['prendas']=Prendas::paginate(5);
        return view('prendas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('prendas.create');
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
        //$datosPrenda=request()->all();
        $campos=[
            'NombreProd'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Talla'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Stock'=>'required|string|max:100',
            'Foto1'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Foto2'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Foto3'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto1'=>'La foto 1 es requerida'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto2'=>'La foto 2 es requerida'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto3'=>'La foto 3 es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPrenda=request()->except('_token');

        if ($request->hasFile('Foto1')) {
            $datosPrenda['Foto1']=$request->file('Foto1')->store('uploads','public');
        }
        if ($request->hasFile('Foto2')) {
            $datosPrenda['Foto2']=$request->file('Foto2')->store('uploads','public');
        }
        if ($request->hasFile('Foto3')) {
            $datosPrenda['Foto3']=$request->file('Foto3')->store('uploads','public');
        }

        Prendas::insert($datosPrenda);
        //return response()->json($datosPrenda);
        return redirect('prendas')->with('mensaje','Prenda agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prendas  $prendas
     * @return \Illuminate\Http\Response
     */
    public function show(Prendas $prendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prendas  $prendas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $prenda=Prendas::findOrFail($id);
        return view('prendas.edit', compact('prenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prendas  $prendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'NombreProd'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Talla'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Stock'=>'required|string|max:100',            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if ($request->hasFile('Foto1')) {
            $campos=['Foto1'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto1'=>'La foto 1 es requerida'];

        }
        if ($request->hasFile('Foto2')) {
            $campos=['Foto2'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto2'=>'La foto 2 es requerida'];

        }
        if ($request->hasFile('Foto3')) {
            $campos=['Foto3'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto3'=>'La foto 3 es requerida'];

        }
        $this->validate($request,$campos,$mensaje);


        //
        $datosPrenda=request()->except(['_token','_method']);

        if ($request->hasFile('Foto1')) {
            $prenda=Prendas::findOrFail($id);

            Storage::delete('public'.'/'.$prenda->Foto1);

            $datosPrenda['Foto1']=$request->file('Foto1')->store('uploads','public');
        }
        if ($request->hasFile('Foto2')) {
            $prenda=Prendas::findOrFail($id);

            Storage::delete('public'.'/'.$prenda->Foto2);

            $datosPrenda['Foto2']=$request->file('Foto2')->store('uploads','public');
        }
        if ($request->hasFile('Foto3')) {
            $prenda=Prendas::findOrFail($id);

            Storage::delete('public'.'/'.$prenda->Foto3);

            $datosPrenda['Foto3']=$request->file('Foto3')->store('uploads','public');
        }
        Prendas::where('id','=',$id)->update($datosPrenda);
        $prenda=Prendas::findOrFail($id);
        return redirect('prendas')->with('mensaje','Prenda actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prendas  $prendas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prenda=Prendas::findOrFail($id);

        if(Storage::delete('public'.'/'.$prenda->Foto)){
            Prendas::destroy($id);
        }
        return redirect('prendas')->with('mensaje','Prenda eliminada');
    }
/* para la pagina y vistas del visitante */
    public function welcome()
    {
        //
        $datos['prendas']=Prendas::paginate(5);
        return view('prendas.welcome',$datos);
    }

    public function producto($id)
    {
        //
        $prenda=Prendas::findOrFail($id);
        return view('prendas.producto', compact('prenda'));
    }

}
