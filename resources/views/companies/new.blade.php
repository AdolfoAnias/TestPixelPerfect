@extends('home')

@section('header')
    New Company
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

            <form method="POST" action="{{ route('companies.store') }}" role="form" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{old('website')}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <input type="file" id="imagen" name="imagen">
                  <img id="imglogopromo" height="150">

                  <p class="help-block">Example block-level help text here.</p>
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
