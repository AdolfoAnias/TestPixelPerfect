@extends('home')

@section('header')
    Employess
@endsection

@section('content-all')
  
      <div class="row">
        <div class="col-xs-12">
            <div id="app"> 
                @include('layouts.flash-message')
                @yield('content')
            </div>
            
          <div class="box">
              
            <p><a href="{{ route('employess.create') }}" class="btn btn-primary">Create new employ</a></p>
              
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>  
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                 </tr>
                </thead>
                <tbody>
                    @foreach($employess as $employ)    
                        <tr>
                          <td>{{ $employ->id }}</td>  
                          <td>{{ $employ->first_name }}</td>
                          <td>{{ $employ->last_name }}</td>
                          <td>{{ $employ->company->name }}</td>
                          <td>{{ $employ->email }}</td>
                          <td>{{ $employ->phone }}</td>
                            <td>
                                <a class="btn btn-sm btn-info btn-block"
                                   href="{{ route('employess.edit' , $employ->id ) }}"
                                   data-toggle="tooltip" title="Editar">Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger btn-block"
                                   href="{{ route('employessDelete' , $employ->id ) }}"
                                   data-toggle="tooltip" title="Eliminar">Delete
                                </a>
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>  
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
                </tfoot>
              </table>
              {{ $employess->links() }}  
            </div>
          </div>
        </div>
      </div>

@endsection

