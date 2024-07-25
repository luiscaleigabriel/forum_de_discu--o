<h1>Listagem dos Suportes</h1>

<a href="{{ route('support.create') }}">Adicionar nova dúvida</a>

@if(count($supports) < 1)
  <h1>Nemhum support encontrado!</h1>
@else
  <table>
    <thead>
      <tr>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      @foreach($supports as $support)
        <tr>
          <td>{{ $support->subject }}</td>
          <td>{{ $support->status }}</td>
          <td>{{ $support->body }}</td>
          <td>
            <a href="{{ route() }}"> > </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif