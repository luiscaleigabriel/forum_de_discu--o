<h1>Dúvida {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('support.update', $support->id) }}" method="post">
  @method('PUT')
  @include('admin.support.partials.form', [
    'support' => $support
  ])
</form>
