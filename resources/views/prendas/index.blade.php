  @extends('layouts.app')
  
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                <span aria-hiden="true">&times;</span>
            </button>
        </div>
    @endif
    


<a href="{{ url('prendas/create') }}" class="btn btn-success">Agregar</a><br/><br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre del producto</th>
            <th>Precio</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($prendas as $prenda)
        <tr>
            <td>{{ $prenda->id }}</td>

            <td>                
                <img src="{{ asset('storage').'/'.$prenda->Foto1 }}" width="auto" height="100" alt="#">        
            </td>

            <td>{{ $prenda->NombreProd }}</td>
            <td>{{ $prenda->Precio }}</td>
            <td>{{ $prenda->Talla }}</td>
            <td>{{ $prenda->Color }}</td>
            <td>{{ $prenda->Stock }}</td>
            <td>
            
            <a href="{{ url('/prendas/'.$prenda->id.'/edit') }}" class="btn btn-primary" ><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" class="svg-inline--fa fa-pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.9 74.16L437.8 14.06c-18.75-18.75-49.19-18.75-67.93 0l-56.53 56.55l127.1 128l56.56-56.55C516.7 123.3 516.7 92.91 497.9 74.16zM290.8 93.23l-259.7 259.7c-2.234 2.234-3.755 5.078-4.376 8.176l-26.34 131.7C-1.921 504 7.95 513.9 19.15 511.7l131.7-26.34c3.098-.6191 5.941-2.141 8.175-4.373l259.7-259.7L290.8 93.23z"></path></svg></a>

                |


            <form action="{{ url('/prendas/'.$prenda->id) }}" method="post" class="d-inline">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" class="svg-inline--fa fa-trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464C32 490.5 53.5 512 80 512h288c26.5 0 48-21.5 48-48V128H32V464zM304 208C304 199.1 311.1 192 320 192s16 7.125 16 16v224c0 8.875-7.125 16-16 16s-16-7.125-16-16V208zM208 208C208 199.1 215.1 192 224 192s16 7.125 16 16v224c0 8.875-7.125 16-16 16s-16-7.125-16-16V208zM112 208C112 199.1 119.1 192 128 192s16 7.125 16 16v224C144 440.9 136.9 448 128 448s-16-7.125-16-16V208zM432 32H320l-11.58-23.16c-2.709-5.42-8.25-8.844-14.31-8.844H153.9c-6.061 0-11.6 3.424-14.31 8.844L128 32H16c-8.836 0-16 7.162-16 16V80c0 8.836 7.164 16 16 16h416c8.838 0 16-7.164 16-16V48C448 39.16 440.8 32 432 32z"></path></svg></button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $prendas->links() !!}
</div>
@endsection
<!-- <a href="#"><button type="button" class="btn btn-primary" style="width:125px; height:40px">Editar</button></a>
<a href="#"><button type="button" class="btn btn-danger" style="width:125px; height:40px">Eliminar</button></a> -->