@extends('home')

@section('header')
    Companies
@endsection

@section('content-all')
  
      <div class="row">
        <div class="col-xs-12">
            <div id="app"> 
                @include('layouts.flash-message')
                @yield('content')
            </div>
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Companies list</h3>
            </div>
              
            <p><a href="{{ route('companies.create') }}" class="btn btn-primary">create new company</a></p>
              
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>  
                  <th>Name</th>
                  <th>Email</th>
                  <th>Website</th>
                 </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)    
                        <tr>
                          <td>{{ $company->id }}</td>  
                          <td>{{ $company->name }}</td>
                          <td>{{ $company->email }}</td>
                          <td>{{ $company->website }}</td>
                            <td>
                                <a class="btn btn-sm btn-info btn-block"
                                   href="{{ route('companies.edit' , $company->id ) }}"
                                   data-toggle="tooltip" title="Editar">Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger btn-block"
                                   href="{{ route('companyDelete' , $company->id ) }}"
                                   data-toggle="tooltip" title="Eliminar">Delete
                                </a>
                            </td>                            
                        </tr>
                    @endforeach                  
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>  
                  <th>Name</th>
                  <th>Email</th>
                  <th>Website</th>
                </tr>
                </tfoot>                
              </table>
              {{ $companies->links() }}  
            </div>
          </div>
        </div>
      </div>

@endsection

