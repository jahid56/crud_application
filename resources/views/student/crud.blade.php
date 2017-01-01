@extends('layouts.dashboard')
@section('content')
    <main id="main-container">
        <div class="content bg-gray-lighter" style="min-height: 50px;">
            <div class="row items-push">
                <div class="col-sm-7">
                    <a href="{{ url('/crud/create') }}" class="btn btn-success"> <i class="icon-plus"></i>Add Student</a>
                </div>
            </div>
        </div>


        <div class="content" style="min-height: 410px;">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Users</h3>
                </div>
                <div class="block-content">
                    <table id="example" class="table table-bordered table-striped js-dataTable-full">
                    <div class="pull-right">
                                <a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
                                </div>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                            <th>Avatar</th>
                            <th>View Details</th>
                            <th style="width: 120px;" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (isset($students))
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="text-center">{{ (!empty($student->id)) ? $student->id : '' }}</td>
                                        <td class="font-w600">{{ (!empty($student->name)) ? $student->name : '' }}</td>
                                        <td class="font-w600">{{ (!empty($student->age)) ? $student->age : '' }}</td>
                                        <td class="font-w600">{{ (!empty($student->blood_group)) ? $student->blood_group : '' }}</td>
                                        <td class="font-w600">{{ (!empty($student->gender)) ? $student->gender : '' }}</td>

                                        <td class="font-w600"><img src="{{asset('images/').'/'.$student->image}}"  width="100" height="100"></td>

                                        <td>
                                               <a href="{{ (!empty($student->id)) ? URL::to('crud/'.$student->id) : '' }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Details">View Details</button></a>
                                          </td>

                                        <td class="text-center">
                                          <div class="btn-group">
                                              <a onclick="return confirm('Are you sure?')" href="{{ (!empty($student->id)) ? URL::to('crud/'.$student->id.'/edit') : '' }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>

                                              @if (!empty($student) && $student->active == 1)
                                                  <a onclick="return confirm('Are you sure?')" href="{{ (!empty($student->id)) ? URL::to('crud/deactivate/'.$student->id) : '' }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Deactivate"><i class="fa fa-battery-empty"></i></button></a>
                                              @else
                                                  <a onclick="return confirm('Are you sure?')" href="{{ (!empty($student->id)) ? URL::to('crud/activate/'.$student->id) : '' }}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Activate"><i class="fa fa-battery-full"></i></button></a>
                                              @endif

                                              {{ Form::open(array('url' => 'crud/' . $student->id, 'class' => 'pull-right')) }}
                                                  {{ Form::hidden('_method', 'DELETE') }}
                                                  {!! Form::button('<i class="fa fa-times" aria-hidden="true"></i>', array('type' => 'submit',  'class' => 'btn btn-xs btn-default', 'title'=>'Remove')) !!}
                                              {{ Form::close() }}

                                            </div>
                                      </td> 
                                                                              
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
