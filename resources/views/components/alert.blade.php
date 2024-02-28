@if ($errors->any())

<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-4 rounded relative" role="alert">
    
    @foreach($errors->all() as $error)
   <p>{{$error}}</p>
    @endforeach
  </div>
  @endif 