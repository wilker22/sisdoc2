<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMunicipio;
use App\Http\Requests\StoreUpdateSetor;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{

   protected $repository;

   public function __construct(Setor $setor)
   {
       $this->repository = $setor;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setores = $this->repository->paginate();

        return view('admin.pages.setores.index', compact('setores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('setores.create');
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

        return redirect()->route('setores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$setor = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.setores.show', compact('setor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$setor = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.setores.edit', compact('setor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSetor $request, $id)
    {
        if(!$setor = $this->repository->find($id)){
            return redirect()->back();
        }

        $setor->update($request->all());

        return redirect()->route('setores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$setor = $this->repository->find($id)){
            return redirect()->back();
        }

        $setor->delete;

        return redirect()->route('setores.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $setores = $this->repository->where(function($query) use ($request){
                if($request->filter){
                    $query->orwhere('descricao', 'LIKE', "%{$request->filter}%");
                    $query->orwhere('nome', 'LIKE', "%{$request->filter}%");
                    $query->orwhere('sigla', 'LIKE', "%{$request->filter}%");
                }
        })->paginate();

        return view('admin.pages.setores.index', compact('filters', 'setores'));
    }
}
