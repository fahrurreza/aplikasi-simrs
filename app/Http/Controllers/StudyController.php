<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Study, Student};
use Alert;
use Auth;

class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
                    'page'  => 'Study',
                    'study' => Study::all()
                ];
        
        return view('study.index', compact('data'));
    }

    public function show($id)
    {
        $data = [
                    'page'  => 'Study',
                    'student' => Student::whereRelation('study', 'study_id', '=', $id)->get(),
                    'study'    => Study::with('group')->where('id', '=', $id)->first()
                ];

        return view('study.student', compact('data'));
    }

    public function store(Request $request)
    {
        $insert = Study::create([
            'study'   => $request->study,
            'price'   => $request->price,
            'is_active'         => 1
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
        $update =Study::where('id', $id)
                ->update([
                        'study'         => $request->study,
                        'is_active'     => $request->is_active
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
        $delete = Study::destroy($id);

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
