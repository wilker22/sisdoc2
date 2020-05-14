<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMunicipio;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{

    protected $repository;

    public function __construct(Municipio $municipio)
    {
        $this->repository = $municipio;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = $this->repository->paginate();

        return view('admin.pages.municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.municipios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMunicipio $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('municipios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$municipio = $this->repository($id)){
            redirect()->back();
        }

        return view('admin.pages.municipios.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$municipio = $this->repository->find($id)){
            redirect()->back();
        }


        return view('admin.pages.municipios.edit', compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMunicipio $request, $id)
    {
        if(!$municipio = $this->repository->find($id)){
            redirect()->back();
        }

        $municipio->update($request->all());

        return redirect()->route('municipios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$municipio = $this->repository->find($id)){
            redirect()->back();
        }

        $municipio->delete();

        return redirect()->route('municipios.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');//filter é nome do campo de pesquisa na index

        $municipios = $this->repository
                    ->where(function($query) use ($request){
                        if($request->filter){
                            $query->orwhere('descricao', 'LIKE', "%{$request->filter}%");
                            $query->orwhere('nome','LIKE', "%{$request->filter}%");
                        }
                    })
                    ->latest()
                    ->paginate();

        return view('admin.pages.municipios.index', compact('municipios','filters'));
    }
}
