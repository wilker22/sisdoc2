<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDocumento;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    protected $repository;

    public function __construct(Documento $documento)
    {
        $this->repository = $documento;
    }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $documentos = $this->repository->paginate();

         return view('admin.pages.documentos.index', compact('documentos'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return redirect()->route('documentos.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(StoreUpdateDocumento $request)
     {
         $this->repository->create($request->all());

         return redirect()->route('documentos.index');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         if(!$documento = $this->repository->find($id)){
             return redirect()->back();
         }

         return view('admin.pages.documentos.show', compact('documento'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         if(!$documento = $this->repository->find($id)){
             return redirect()->back();
         }

         return view('admin.pages.documentos.edit', compact('documento'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(StoreUpdateDocumento $request, $id)
     {
         if(!$documento = $this->repository->find($id)){
             return redirect()->back();
         }

         $documento->update($request->all());

         return redirect()->route('documentos.index');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         if(!$documento = $this->repository->find($id)){
             return redirect()->back();
         }

         $documento->delete;

         return redirect()->route('documentos.index');
     }

     public function search(Request $request)
     {
         $filters = $request->only('filter');
         $documentos = $this->repository->where(function($query) use ($request){
                 if($request->filter){
                     $query->orwhere('id', 'LIKE', "%{$request->filter}%");
                     $query->orwhere('numero', 'LIKE', "%{$request->filter}%");
                     $query->orwhere('origem', 'LIKE', "%{$request->filter}%");
                     $query->orwhere('assunto', 'LIKE', "%{$request->filter}%");

                 }
         })->paginate();

         return view('admin.pages.documentos.index', compact('filters', 'documentos'));
    }
}
