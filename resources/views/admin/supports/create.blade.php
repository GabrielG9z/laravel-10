<h1>Nova Dúvida</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
    @endif

<form action="{{route('supports.store')}}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name=" _token"> CTRL+K+C= COMENTÁRIO LARAVEL--}}  
    @csrf
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>