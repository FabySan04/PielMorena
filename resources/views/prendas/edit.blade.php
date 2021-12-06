@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/prendas/'.$prenda->id) }}" method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

@include('prendas.form', ['modo'=>'Editar'])

</form>
</div>
@endsection