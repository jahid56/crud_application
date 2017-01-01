<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Student;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'students' => Student::all(),
        );
        return view('student.crud', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'blood' => 'required',
            'gender' => 'required',
            'file' => 'required',
        ]);

        $student= New Student();
        $student->name=$request['name'];
        $student->age=$request['age'];
        $student->blood_group=$request['blood'];
        $student->gender=$request['gender'];
        $image = $request->file('file');

        $original_extension = $request->file('file')->getClientOriginalExtension();
        $name =  time() .'-'. rand(1000, 9999) .'.'. $original_extension;
        if (File::exists($student->image)) {
            File::delete($student->image);
        }

        $fileName = $image->getClientOriginalName() ;
        $destinationPath = public_path().'/images/' ;
        $image->move($destinationPath,$fileName);
        $student->image = $fileName;
        $student->save();

        $request->session()->flash('alert-success', 'Student Successfully Created!');

        return redirect('crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
            if (!empty($student)) {
                $data = array(
                    'student' => $student
                );
                return view('student.index', $data);
            } else {
                Session::flash('error', 'Try again.');
                return redirect()->back();
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
            if (!empty($student)) {
                $data = array(
                    'student' => $student
                );
                return view('student.edit', $data);
            } else {
                Session::flash('error', 'Try again.');
                return redirect()->back();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'blood' => 'required',
            'gender' => 'required',
            'avatar' => '',
            'hdLogo' => '',
        ]);

        $student= Student::where('id', $id)->first();
        $student->name=$request['name'];
        $student->age=$request['age'];
        $student->blood_group=$request['blood'];
        $student->gender=$request['gender'];

        $hdLogo = $request->input('hdLogo');
        $photo = $request->file('avatar');
        if(!empty($photo) && !empty($hdLogo)){
            $ext = $photo->getClientOriginalExtension();
            $fileName = rand(100, 5000000) . '.' .$ext;
            if (File::exists($student->image)) {
                File::delete($student->image);
            }
            $destinationPath = public_path().'/images/' ;
            $photo->move($destinationPath,$fileName);
            $student->image = $fileName;
        }else if(!empty($photo) && empty($hdLogo)){
            $ext = $photo->getClientOriginalExtension();
            $fileName = rand(100, 5000000) . '.' .$ext;
            if (File::exists($student->image)) {
                File::delete($student->image);
            }
            $destinationPath = public_path().'/images/' ;
            $photo->move($destinationPath,$fileName);
            $student->image = $fileName;
        }else if(empty($photo) && !empty($hdLogo)){
            $student->image = $student->image;
        }
        else if(empty($photo) && empty($hdLogo)){
            Session::flash('error','Avatar is required.');
            return redirect()->back();
        }

        $student->save();

        $request->session()->flash('alert-success', 'Student Successfully Created!');

        return redirect('crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id)->first();
        if (!empty($student)) {
            $student->delete();
            $student->update();
            if($student->update()) {
                Session::flash('success', 'Student deleted successful.');
                return redirect()->back();
            } else {
                Session::flash('error', 'Try again.');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Try again.');
            return redirect()->back();
        }
    }

    public function activate($id)
    {
        $student = Student::where('id', $id)->first();
        if (!empty($student)) {
            $active = 1;
            $student->active = $active;
            if ($student->save()) {
                Session::flash('success', 'Student Activated successfully.');
                return redirect()->back();
            } else {
                Session::flash('error', 'Try again.');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Try again.');
            return redirect()->back();
        }
    }

    public function deactivate($id)
    {
        $student = Student::where('id', $id)->first();
        if (!empty($student)) {
            $active = 0;
            $student->active = $active;
            if ($student->save()) {
                Session::flash('success', 'Student Deactivated successfully.');
                return redirect()->back();
            } else {
                Session::flash('error', 'Try again.');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Try again.');
            return redirect()->back();
        }
    }
}
