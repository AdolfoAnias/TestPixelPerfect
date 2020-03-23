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

            <form method="POST" action="{{ route('companyUpdate',$company[0]->id) }}" role="form" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $company[0]->name }}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $company[0]->email }}">
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{ $company[0]->website }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <input type="file" id="imagen" name="imagen">
                  <input type="hidden" name="old_name" value="{{ $company[0]->logo }}"></input>  
                  <img id="img_destino" src="{{ asset('public/'.$company[0]->logo) }}" alt="avatar" height="350">

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
   function filePreview(input){
       var preview = document.querySelector('img');
       var file = document.querySelector('input[type=file]').files[0];
       var reader = new FileReader();
       
       reader.addEventListener("load", function(){
            preview.src = reader.result;
       }, false);
       
       if(file){
           reader.readAsDataURL(file);
       }      
    }

    $("#imagen").change(function(){
       filePreview(this); 
    });

</script>

@endsection

