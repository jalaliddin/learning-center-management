<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
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
    public function store(StoreStudentRequest $request)
    {
        $student = new Student;
        $student->name = $request->firstname;
        $student->surname = $request->surname;
        $student->phone = $request->phone;
        $student->qr_code = Str::random(60);
        $student->email = $request->email;
        $student->address = $request->address;
        $student->sms_phone = $request->sms_phone;
        $student->description = $request->description;

        // load avatar
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        $student->avatar = $filename;

        $student->save();
        return redirect()->route('student.index');
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
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->attendance()->delete();
        $student->parents()->delete();
        $student->delete();
        return redirect()->back();
    }

    public function qrReader($id)
    {
        $student = Student::find($id);
        return response()->json([
            'name' => $student->name,
            'surname' => $student->surname,
            'avatar' => $student->avatar,
            'phone' => $student->phone
        ],200);
    }
    public function qrDownload($id)
    {
        $student = Student::find($id);
        $fileDest = storage_path('qrcode/'.$student->id.'.png');
        \QrCode::size(500)
            ->margin(1)
            ->format('png')
            ->generate($student->qr_code, $fileDest);
        return response()->download($fileDest);
    }
}
