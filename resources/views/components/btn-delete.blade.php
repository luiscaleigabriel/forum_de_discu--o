<form action="{{ route('support.destroy', $slot) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
