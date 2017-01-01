@extends('layouts.dashboard')
@section('content') 

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Application Development</h2>
                <p class="lead">This Aplication is built for use sample Laravel Crud Operation Using Laravel 5.3.<br> More services will be added periodically </p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
							<center>
								<i class="fa fa-user"></i>
								<h2>About Application</h2>
							</center>
                            <h3>First Complete Registration in the site. After completing the registration you can add CRUD application. One can add Student Name, Age, Blood Group, Gender, Picture. User can also Active or Deactivate a Student.</h3>              
                        </div>
                    </div><!--/.col-md-6-->

                    <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <center>    
                                <i class="fa fa-user-md (doctor)"></i>
                                <h2>Instructions</h2>
                            </center>   
                            <h3>First create a database and then add it in the .env file. Also change the Username & Password Field.</h3>
                            <h3>Then run command php artisan migrate.</h3>
                            <h3>You are now set to use this Application</h3>
                        </div>
                    </div><!--/.col-md-6-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->
@stop