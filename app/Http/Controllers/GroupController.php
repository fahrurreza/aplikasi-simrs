<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Group, Study};
use Alert;
use Auth;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
                    'page'  => 'Group',
                    'group' => Group::all(),
                    'study' => Study::all()
                ];
        
        return view('group.index', compact('data'));
    }

    public function store(Request $request)
    {
        $insert = Group::create([
            'group'      => $request->group,
            'study_id'   => $request->study_id,
            'kuota'      => $request->kuota
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
        $update =Group::where('id', $id)
                ->update([
                            'group'      => $request->group,
                            'study_id'   => $request->study_id,
                            'kuota'      => $request->kuota
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
        $delete = Group::destroy($id);

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
