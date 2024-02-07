<h1>Dúvida {{ $support->id }}</h1>

<form action="{{route('supports.update', $support->id)}}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token()}}" name=" _token"> CTRL+K+C= COMENTÁRIO LARAVEL--}}  
    @csrf
    @method('put')
    <input type="text" placeholder="Assunto" name="subject" value="{{$support->subject}}">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição" >{{ $support->body}}</textarea>
    <button type="submit">Enviar</button>
</form>