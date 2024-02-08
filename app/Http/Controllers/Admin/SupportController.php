<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
       // $support = new Support(); Essa impressão utiliza uma forma alternativa de utilizar a variável
        $supports = $support->all();
       // dd($supports); Este comando Dump and Die, debuga e informa os itens de um array, ignorando o código abaixo
        return view('admin/supports/index',compact('supports'));
    }

    public function show(string|int $id)
    {
        //Support::find($id)
        //Support::where('id', $id)->first();
        //Support::where('id', '!=', $id)->first();
        if(!$support = Support::find($id)) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }
//QUERO EDITAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id',$id)->first()) {
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }
//QUERO CRIAR E SALVAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function store(StoreUpdateSupport $request, Support $support)
    {
        //Adicionamos o validated para pegarmos apenas os dados que foram validados
        $data = $request->validated();
        $data['status'] = 'a';
        //Criamos os dados na database
        $support->create($data);
        //Assim que criado redirecione para a view onde se encontra a exibição dos dados.
        return redirect()->route('supports.index');
        
    }
//QUERO ATUALIZAR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function update(StoreUpdateSupport $request,Support $support, string $id)
    {
        if(!$support = $support->find($id)) {
            return back();
        }   

        //$support->subject = request->subject;
        //support->body = request->body;
        //support->save();

        //maneira mais prática de validar os dados processados 
        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    //QUERO DESTRUIR UMA STRING OU UM INTEIRO, PASSO O TIPO DESTE ITEM, E ADICIONO O VALOR DO $ID DO ITEM.
    public function destroy(string|int $id)
    {
        if(!$support = Support::find($id)) {
            return back();
        }   
        $support->delete();
    
        return redirect()->route('supports.index');
    }
    
}
