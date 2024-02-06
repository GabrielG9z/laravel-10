<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id',$id)->first()) {
            return back();
        }
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';
        //Criamos os dados na database
        $support->create($data);
        //Assim que criado redirecione para a view onde se encontra a exibição dos dados.
        return redirect()->route('supports.index');
        
    }
}
