<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Attendance;
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
        $students = Student::orderBy('created_at', 'desc')->paginate(10);
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
        if ($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        $student->avatar = $filename;
        }else{
            $avatar = public_path('/uploads/avatars/avatar.png');
            $filename = time() . '.' . 'png';
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $student->avatar = $filename;
        }
        $student->save();
        return redirect()->route('student.index')->with('message', 'Muvaffaqiyatli kiritildi!');
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
        $attendances = $student->attendance()->orderBy('created_at', 'desc')->paginate(5);
        return view('student.show', compact('student', 'attendances'));
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
        $attendance = new Attendance();
        $attendance->status = 1;
        $student = $student->attendance()->save($attendance);
        return view('student.edit', compact('student'));
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
        $student = Student::find($id);
        $student->name = $request->firstname;
        $student->surname = $request->surname;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->sms_phone = $request->sms_phone;
        $student->description = $request->description;

        // load avatar
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $student->avatar = $filename;
        }

        $student->save();
        return redirect()->route('student.index')->with('message', 'Ma\'lumotlar yangilandi!');
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
        return redirect()->back()->with('message', 'Ma\'lumot o\'chirildi!');
    }

    public function qrReader($id)
    {
        $student = Student::find($id);
        return response()->json([
            'name' => $student->name,
            'surname' => $student->surname,
            'phone' => $student->phone,
            'avatar' => $student->avatar,
            'created_at' => $student->created_at
        ],200);
    }
    public function qrDownload($id)
    {
        $student = Student::find($id);
        $fileDest = public_path('/uploads/qrcode/'.$student->id.'.png');
        \QrCode::size(500)
            ->margin(1)
            ->format('png')
            ->generate($student->qr_code, $fileDest);
        return response()->download($fileDest);
    }
}
