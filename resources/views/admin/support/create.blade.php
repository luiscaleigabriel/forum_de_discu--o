<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('support.store') }}" method="post">
 @include('admin.support.partials.form')
</form>
