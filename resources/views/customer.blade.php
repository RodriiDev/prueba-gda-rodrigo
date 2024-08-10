@extends('app')

@section('titulo')
    Customers
@endsection

@section('contenido')
    <div class="container d-flex justify-content-center mt-4 vh-90">
        <div class="card p-4 shadow-sm" style="width: 90%">
            
            <form action="{{route('customer.search')}}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label class="fw-bold" for="">DNI: </label>
                    </div>
                    <div class="col-md-3" >
                        <input class="form-control" type="text" id="dni" name="dni" placeholder="Ingresa DNI...">
                    </div>
                    <div class="col-md-2" >
                        <label class="fw-bold" for="">Email: </label>
                    </div>
                    <div class="col-md-3">
                        <input  class="form-control" type="text" id="emailsearch" name="emailsearch" placeholder="Ingresa email...">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-primary fw-bold">Buscar</button>
                    </div>
                </div>
            </form>
            

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Region</th>
                    <th scope="col">Commune</th>
                    <th scope="col" class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                      <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->address ?? 'null'}}</td>
                            <td>{{$customer->strRegion}}</td>
                            <td>{{$customer->strCommune}}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-xs" href="{{ route('customer.destroy', ['dni' => $customer->dni] ) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                      </svg>
                                </a>
                            </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection