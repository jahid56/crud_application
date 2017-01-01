@extends('layouts.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    <div class="content bg-gray-lighter" style="min-height: 50px;">
        <div class="row items-push">
            <div class="col-sm-7">
                <a href="{{ url('/crud') }}" class="btn btn-default"> <i class="icon-plus"></i>Back</a>
            </div>
        </div>
    </div>
      
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ (!empty($student->id)) ? URL::to('crud/'.$student->id) : '' }}" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{ method_field('PUT') }}


              <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name">Student Name</label>
                    <input type="text" class="form-control" name="name" id="name"  value="{{ (!empty($student->name)) ? $student->name : old('name') }}">
                    @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                   @endif
                </div>
                
              </div>

              <div class="box-body">
                <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                  <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" id="age" value="{{ (!empty($student->age)) ? $student->age : old('age') }}">
                    @if ($errors->has('age'))
                      <span class="help-block">
                          <strong>{{ $errors->first('age') }}</strong>
                      </span>
                   @endif
                </div>
                
              </div>

              <div class="box-body">
                <div class="form-group{{ $errors->has('blood') ? ' has-error' : '' }}">
                  <label for="blood">Blood Group</label>
                  <select class="form-control" name="blood" style="width: 100%;">
                          
                    <option value="A Positive">A  Positive</option> 
                    <option value="B  Positive">B  Positive</option>
                    <option value="O  Positive">O  Positive</option>
                    <option value="AB  Positive">AB  Positive</option>
                    <option value="A Negative">A Negative</option>
                    <option value="B Negative">B Negative</option>
                    <option value="O Negative">O Negative</option>
                    <option value="AB Negative">AB Negative</option>

                  </select>
                </div>
                
              </div>

              <div class="box-body">
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <input type="radio" id="male" name="gender" value="male" />
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" />
                    <label for="female">Female</label>
                    @if ($errors->has('gender'))
                      <span class="help-block">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                   @endif
                </div>
                
              </div>

              <div class="box-body">

                <div class="form-group"  style="width:150px;height:150px">
                  <label for="logo">Avatar</label><br/>
                  <div class="input-col col-xs-12 col-sm-12">
                      <div class="be-change-ava">
                          <a class="be-ava-user style-xlg style-2" href="#" style="width: auto;height: auto;">
                          <input type="hidden" value="{{ (!empty($student->image)) ? $student->image : ''}}" name="hdLogo">
                                @if (!empty($student->image))
                                    <img id="userAvatar" src="{{ asset("images/$student->image") }}" alt="{{ $student->name }}" style="max-width: 200px;max-height: 200px;width: auto;height: auto;">
                                @else
                                    <img id="userAvatar" src="{{ URL::to('ava_10.gif')}}" alt="">
                                @endif
                            </a>
                          <input id="avatar" type="file" name="avatar" class="hidden">
                          <label for="avatar" class="btn color-4 size-2 hover-7" style="font-weight: bold; font-size: 18px; color: #FF0000;">Replace image</label>
                      </div>
                  </div>
                </div>
              </div>

              <script>
                document.getElementById("avatar").onchange = function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById("userAvatar").src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                };
            </script>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection