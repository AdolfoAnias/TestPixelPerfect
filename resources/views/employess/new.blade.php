@extends('home')

@section('header')
    New employ
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

            <form method="POST" action="{{ route('employess.store') }}" role="form" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{old('firstName')}}">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{old('lastName')}}">
                </div>
                <div class="form-group"> 
                    <label>Company</label>
                    <select class="form-control selectizable" id="company_id" name="company_id">
                        <option value=""></option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}"> 
                                {{ $company->name }} 
                            </option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{old('phone')}}">
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
