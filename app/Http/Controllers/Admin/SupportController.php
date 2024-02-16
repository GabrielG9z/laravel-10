<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\{CreateSupportDTO, UpdateSupportDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {}


    //Injetando dados que vem da request
    public function index(Request $request)
    {
       // $support = new Support(); Essa impressão utiliza uma forma alternativa de utilizar a variável

       //Aqui retornamos os dados trazidos da request, junto do parametro filter
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter,  

        );

        $filters = ['filter' => $request->get('filter', '')];

       // dd($supports); Este comando Dump and Die, debuga e informa os itens de um array, ignorando o código abaixo
        return view('admin/supports/index',compact('supports', 'filters'));
    }

    public function show(string $id)
    {
        //Support::find($id)
        //Support::where('id', $id)->first();
        //Support::where('id', '!=', $id)->first();
        if(!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }
//QUERO EDITAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function edit(Support $support, string $id)
    {
        if(!$support = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }
//QUERO CRIAR E SALVAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }
//QUERO ATUALIZAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function update(StoreUpdateSupport $request,Support $support, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );
        if(!$support = $this->find($support->id)) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function find($id)
    {
        return Support::find($id);
    }


    //QUERO DESTRUIR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function destroy(string $id)
    {
        $this->service->delete($id);
    
        return redirect()->route('supports.index');
    }
    
}
