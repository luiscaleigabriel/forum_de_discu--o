<h1>Listagem dos Suportes</h1>

<a href="{{ route('support.create') }}">Adicionar nova dúvida</a>

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
    @foreach($supports->items() as $support)
    <tr>
        <td>{{ $support->subject }}</td>
        <td>{{ getStatusSupport($support->status) }}</td>
        <td>{{ $support->body }}</td>
        <td>
        <a href="{{ route('support.show', $support->id) }}"> > </a> |
        <a href="{{ route('support.edit', $support->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

<x-pagination :paginator="$supports" :appends="$filters" />
