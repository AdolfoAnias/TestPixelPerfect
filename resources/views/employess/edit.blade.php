@extends('home')

@section('header')
    Edit Company
@endsection

@section('content-all')

      <div class="row">
        <div class="col-md-12">         
          <div class="box box-primary">
            @if(count($errors) > 0)
                <div class="errors">
                    <ul>
                    @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('employessUpdate',$employ[0]->id) }}" role="form" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{ $employ[0]->first_name }}">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{ $employ[0]->last_name }}">
                </div>
                <div class="form-group"> 
                    <label>Company</label>
                    <select class="form-control selectizable" id="company_id" name="company_id">
                        <option value=""></option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $employ[0]->company_id == $company->id ? 'selected' : '' }}> 
                                {{ $company->name }} 
                            </option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $employ[0]->email }}">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $employ[0]->phone }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <input type="file" id="imagen" name="imagen">
                  <input type="hidden" name="old_name" value="{{ $employ[0]->image }}"></input>  
                  <img id="img_destino" src="{{ asset('image/'.$employ[0]->image) }}" alt="avatar" height="350">

                  <p class="help-block">Formato de Imagen a subir: jpg, gif, png</p>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>

        </div>
      </div>

<script>
</script>

@endsection

