@extends('admin.supports.layouts.app')

@section('title', 'Criar novo tópico')

@section('header')
<h1 class="text-lg text-black-500">Nova Dúvida</h1>
@endsection

@section('content')


<form action="{{route('supports.store')}}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name=" _token"> CTRL+K+C= COMENTÁRIO LARAVEL--}}  
    @include('admin.supports.partials.form')
</form>
@endsection