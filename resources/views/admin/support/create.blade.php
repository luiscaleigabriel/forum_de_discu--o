<h1>Nova Dúvida</h1>
<form action="{{ route('support.store') }}" method="post">
  @csrf
  <input type="text" name="subject" id="subject" placeholder="Assunto">
  <textarea name="body" rows="6" placeholder="Descrição"></textarea>
  <button type="submit">Enviar</button>
</form>