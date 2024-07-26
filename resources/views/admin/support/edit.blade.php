<h1>Dúvida {{ $support->id }}</h1>

@if($errors->any())
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('support.update', $support->id) }}" method="post">
  @csrf()
  @method('PUT')
  <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ $support->subject }}">
  <textarea name="body" rows="6" placeholder="Descrição">{{ $support->body }}</textarea>
  <button type="submit">Atualizar</button>
</form>