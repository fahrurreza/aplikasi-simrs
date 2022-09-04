<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Group, Study, Student};
use DB;
use Alert;
use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
                    'page'      => 'Student',
                    'student'   => Student::with(['study', 'group'])->get(),
                    'group'     => Group::with('study')->get(),
                    'study'     => Study::where('is_active', 1)->with('group')->get()
                ];

        return view('student.index', compact('data'));
    }

    public function registration()
    {
        $data = [
                    'page'      => 'Pendaftaran',
                    'student'   => Student::with('study')->get(),
                    'study'   => Study::with('group')->get(),
                ];
        return view('student.registration', compact('data'));
    }

    public function register(Request $request)
    {
        $insert = DB::table('student_study')->insert([
            'student_id'    => $request->student_id,
            'study_id'      => $request->study_id
        ]);

        if(!$insert)
        {
            toast('Your Post failed to submited!','error');
            return back();
        }
        else
        {
            toast('Your Post as been submited!','success');
            return back();
        }
    }

    public function store(Request $request)
    {
        $insert = Student::create([
            'name'          => $request->name,
            'nisn'          => $request->nisn,
            'address'       => $request->address,
            'kelamin'       => $request->kelamin,
            't_lahir'       => $request->t_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'group_id'      => $request->group_id,
            'user_id'       => Auth::user()->id,
            'created_at'    => now()
        ]);

        if(!$insert)
        {
            toast('Your Post failed to submited!','error');
            return back();
        }
        else
        {
            toast('Your Post as been submited!','success');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $update =Student::where('id', $id)
                ->update([
                            'name'          => $request->name,
                            'nisn'          => $request->nisn,   
                            'address'       => $request->address,
                            'kelamin'       => $request->kelamin,
                            't_lahir'       => $request->t_lahir,
                            'tgl_lahir'     => $request->tgl_lahir,
                            'user_id'       => 1,
                            'updated_at'    => now()
                        ]);

        if(!$update)
        {
            toast('Your Post failed to updated!','error');
            return back();
        }
        else
        {
            toast('Your Post as been updated!','success');
            return back();
        }
    }

    public function destroy($id)
    {
        if(Auth::user()->role != 'admin')
        {
            toast('You do not have access!','error');
            return back();
        }
        $delete = Student::destroy($id);

        if($delete)
        {
            toast('Your Post as been deleted!','success');
            return back();
        }
        else
        {
            toast('Your Post failed to deleted!','error');
            return back();
        }
    }
}
