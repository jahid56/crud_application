@extends('layouts.dashboard')
@section('content')
<section id="blog" class="container">
        <div class="content bg-gray-lighter" style="min-height: 50px;">
            <div class="row items-push">
                <div class="col-sm-7">
                    <a href="{{ url('/crud') }}" class="btn btn-default"> <i class="icon-plus"></i>Back</a>
                </div>
            </div>
        </div>

        <div class="blog" style="min-height: 410px;">
            <div class="row">
                 <div class="col-md-12">
                    <div class="blog-item">
                        <div class="row">      
                            <div class="col-xs-12 col-sm-4 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="{{ asset("images/$student->image") }}" alt="{{ $student->name }}" style="max-width: 200px;max-height: 200px;width: auto;height: auto;" /></a>
                            </div>
                            
                                <div class="col-xs-12 col-sm-6 blog-content">
                                    <h2><a href="#">{{ $student->name }}</a></h2>
                                    <h4>Age : {{ $student->age }}</h4> 
                                    <h4>Blood Group : {{ $student->blood_group }}</h4>
                                    <h4>Gender : {{ $student->gender }}</h4>
                                    
                                </div>
                        </div>

                    </div><!--/.blog-item-->
                </div><!--/.col-md-8-->

            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
@endsection