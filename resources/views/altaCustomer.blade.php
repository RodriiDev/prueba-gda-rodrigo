@extends('app')

@section('titulo')
    Registrar Customer
@endsection

@section('contenido')
    <div class="container d-flex justify-content-center mt-4 vh-90">
        <div class="card p-4 shadow-sm" style="width: 22rem;">
            <form action="{{route('customer.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresa el dni">
                    @if ($errors->has('dni'))
                            <div class="text-danger">{{ $errors->first('dni') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el email">
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Name</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el name">
                    @if ($errors->has('nombre'))
                        <div class="text-danger">{{ $errors->first('nombre') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingresa el last name">
                    @if ($errors->has('last_name'))
                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Ingresa el address">
                    @if ($errors->has('address'))
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="region" class="form-label">Región</label><span class="text-danger">*</span>
                    <select class="form-select" name="region" id="region" onchange="llenaCommune(this.value)">
                        <option value="">Select</option>
                        @foreach ($regions as $region)
                            <option value="{{$region->id_reg}}">{{$region->description}}</option>
                        @endforeach
                    </select>        
                    @if ($errors->has('region'))
                        <div class="text-danger">{{ $errors->first('region') }}</div>
                    @endif        
                </div>
                <div class="mb-3">
                    <label for="commune" class="form-label">Commune</label><span class="text-danger">*</span>
                    <select class="form-select" name="commune" id="commune">
                        <option value="">Select</option>
                    </select>       
                    @if ($errors->has('commune'))
                        <div class="text-danger">{{ $errors->first('commune') }}</div>
                    @endif           
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>

    function llenaCommune(region){

        const jsCommunes = @json($communes);
        const mySelect = document.getElementById('commune');

        jsCommunes.forEach(function(item) {
            if(item.id_reg == region){
                const newOption = document.createElement('option');
                newOption.value = item.id_com; 
                newOption.text = item.description;  
                mySelect.appendChild(newOption);           
            }
        });

    }

</script>