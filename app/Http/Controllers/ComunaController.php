<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Comuna;
use App\Municipio;

class ComunaController extends Controller
{
    //Creo constructor para verificar que no se me cuelen geis en __construct()
    public function __construct()
    {
        //$this->middleware('auth')->only('create');//se adiciona metodos para autentificar
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = DB::table('tb_comuna as c')
                    ->join('tb_municipio','c.muni_codi','=','tb_municipio.muni_codi')
                    //->join('tb_municipio as m','c.muni_codi','=','m.muni_codi')
                    //->join('tb_departamento as p','p.depa_codi','=','m.depa_codi')
                    ->select('c.comu_codi','c.comu_nomb','c.muni_codi','tb_municipio.muni_nomb')
                    //->select('c.comu_codi','c.comu_nomb','c.muni_codi','m.muni_nomb')
                    //->get();
                    ->paginate(10);
        return view('comuna.index', compact('comunas'));
        //return $comunas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $municipios = Municipio::orderBy('muni_nomb')->get();
        return view('comuna.create',compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Request recive los name del formulario
    {
        request()->validate([
            'comu_nomb' => 'Required|min:5',
            'muni_codi' => 'Required'
        ]);
        
        $comuna = new Comuna;
        //$flight->name = $request->name
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();//Modelo metodo save
        return redirect()->route('comuna.index')->with('status','guardado');//re direccionar junto con el status para el mensaje
        //return $request; Retorna el formulario con el token
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comuna = Comuna::findOrFail($id);//busque
        $municipios = Municipio::all();//busque x2
        return view('comuna.edit', compact('comuna','municipios'));//compact con comuna y todos los municipios(combobox)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comuna = Comuna::findOrFail($id);
        $comuna->fill($request->all());//necesita que los name formulario sean iguales a los campos de tabla
        $comuna->save();
        return redirect()->route('comuna.index')->with('status','actualizado');
        //return $request; Retorna el formulario con el token
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//delete
    {
        $comuna = Comuna::findOrFail($id);//busque o devuelva pero no muestre error bb
        $comuna->delete();
        return redirect()->route('comuna.index')->with('status','eliminado');
    }
}
