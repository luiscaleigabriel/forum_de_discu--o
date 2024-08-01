@csrf
<input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">
<textarea name="body" rows="6" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
<button type="submit">Enviar</button>
