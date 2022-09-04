<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Student, Transaction, Group};
use Alert;
use Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
                    'page'          => 'Transaction',
                    'student'       => Student::all(),
                    'transaction'   => Transaction::all()
                ];
        
        return view('transaction.index', compact('data'));
    }

    public function store(Request $request)
    {
        $insert = Transaction::create([
            'student_id'    => $request->student_id,
            'user_id'       => Auth::user()->id,
            'money'         => $request->money
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
        $update =Transaction::where('id', $id)
                ->update([
                            'user_id'       => Auth::user()->id,
                            'money'         => $request->money
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
        
        $delete = Transaction::destroy($id);

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
