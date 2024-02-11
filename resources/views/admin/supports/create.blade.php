<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{route('supports.store')}}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name=" _token"> CTRL+K+C= COMENTÁRIO LARAVEL--}}  
    @include('admin.supports.partials.form')
</form>