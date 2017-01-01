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
            <form role="form" method="POST" action="{{ url('/crud') }}" enctype="multipart/form-data">
              {{ csrf_field() }}


              <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name">Student Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
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
                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Student Age">
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
                          <input type="hidden" id="hdavatar" name="hdavatar"  />
                          <figure class="avatar">
                              <img src="{{ URL::to('ava_10.gif')}}" alt="" id="file" style="width: 200px; height: 150px;">
                          </figure>
                          <div class="figcaption" style="color: #FF0000;">
                              <label for="avatar" class="btn color-2 size-1 hover-5" style="font-weight: bold; font-size: 18px;">
                                  <i class="fa fa-picture-o" style="color: #fff;"></i> Choose Image
                              </label>
                          </div>
                          <p id="msg_avatar" style="color: red"></p>
                          <input id="avatar" type="file" name="file" class="hidden">
                          @if ($errors->has('file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                         @endif
                      </div>
                  </div>
                </div>
              </div>

              <script>
                document.getElementById("avatar").onchange = function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById("file").src = e.target.result;
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