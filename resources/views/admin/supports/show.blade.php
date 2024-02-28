@extends('admin.supports.layouts.app')

@section('title', "Detalhes da Dúvida {$support->subject}")

@section('header')
<h1 class="text-lg text-black-500">{{ $support->subject }}</h1>
@endsection

@section('content')



<ul>
    <li>Assunto:{{$support->subject}}</li>
    <li>Descrição{{$support->status}}</li>
    <li>Status{{$support->body}}</li>
    
</ul>
 
<form action="{{route('supports.destroy', $support->id)}}" method="post">
  
    @method('DELETE')

    @csrf()
    <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
        Deletar
      </button>
</form>
@endsection