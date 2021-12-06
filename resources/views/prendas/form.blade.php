    <h1>{{ $modo }} prenda</h1>
    @if(count($errors))
        
        <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
        </div>

    @endif


    <div class="form-goup">
    <label for="NombreProd">Descripción</label>
    <input type="text" class="form-control" value="{{ isset($prenda->NombreProd)?$prenda->NombreProd:old('NombreProd') }}" name="NombreProd" id="NombreProd">
    </div>

    <div class="form-goup">
    <label for="Precio">Precio</label>
    <input type="text" class="form-control" value="{{ isset($prenda->Precio)?$prenda->Precio:old('Precio') }}" name="Precio" id="Precio">
    </div>

    <div class="form-goup">
    <label for="Talla">Talla</label>
    <input type="text" class="form-control" value="{{ isset($prenda->Talla)?$prenda->Talla:old('Talla') }}" name="Talla" id="Talla">
    </div>

    <div class="form-goup">
    <label for="Color">Color</label>
    <input type="text" class="form-control" value="{{ isset($prenda->Color)?$prenda->Color:old('Color') }}" name="Color" id="Color">
    </div>

    <div class="form-goup">
    <label for="Stock">En existencia</label>
    <input type="text" class="form-control" value="{{ isset($prenda->Stock)?$prenda->Stock:old('Stock') }}" name="Stock" id="Stock">
    </div><br>

    <div class="form-goup">
    @if(isset($prenda->Foto1))
    <img src="{{ asset('storage').'/'.$prenda->Foto1 }}" width="auto" height="100" alt="#">
    @endif
    <input class="form-control" type="file" name="Foto1" id="Foto1"><br>
    </div>

    <div class="form-goup">
    @if(isset($prenda->Foto2))
    <img src="{{ asset('storage').'/'.$prenda->Foto2 }}" width="auto" height="100" alt="#">
    @endif
    <input class="form-control" type="file" name="Foto2" id="Foto2"><br>
    </div>

    <div class="form-goup">
    @if(isset($prenda->Foto3))
    <img src="{{ asset('storage').'/'.$prenda->Foto3 }}" width="auto" height="100" alt="#">
    @endif
    <input class="form-control" type="file" name="Foto3" id="Foto3"><br>
    </div>

    <input type="submit" class="btn btn-success" value="{{ $modo }} Datos">
    <a href="{{ url('prendas/') }}" class="btn btn-primary">Inicio</a><br>