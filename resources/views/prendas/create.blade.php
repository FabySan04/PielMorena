@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/prendas')}}" method="post" enctype="multipart/form-data">
@csrf

@include('prendas.form',['modo'=>'Agregar'], ['modobtn'=>'Guardar'])
    
</form>
</div>
@endsection