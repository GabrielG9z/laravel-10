<h1>Detalhes da dúvida {{ $support->id }}</h1>

<ul>
    <li>Assunto:{{$support->subject}}</li>
    <li>Descrição{{$support->status}}</li>
    <li>Status{{$support->body}}</li>
    
</ul>
 {{-- Criando a ação de formulário para redirecionar para a rota que quero, junto de seu id e passo o método POST, pois o botão é um componente de formulário e é ele que irá disparar a ação que desejo realizar, no caso DELETE! --}}
<form action="{{route('supports.destroy', $support->id)}}" method="post">
   {{-- Informando o método HTTP, para que o botão interprete a ação correta, pois o método POST e DELETE são diferentes. --}}
    @method('DELETE')
{{-- Informo o também o token para que valide a requisição, pois se não fizer isto, apresentará erro, e não retornará de acordo com a lógica que foi criada ! --}}
    @csrf()

     {{-- Informando o tipo de botão  Submit, que agora sim irá realizar a ação definida acima, quando clicado.--}}
<button type="submit">Deletar</button>
    </form>