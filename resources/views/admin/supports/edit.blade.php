
@extends('admin.supports.layouts.app')

@section('title', "Editar a dúvida {$support->subject}")

@section('header')
<h1 class="text-lg text-black-500">{{ $support->subject }}</h1>
@endsection

@section('content')


<form action="{{route('supports.update', $support->id)}}" method="POST">
    @csrf
    @method('put')
    @include('admin.supports.partials.form', [
        'support'=> $support
    ])
</form>
@endsection