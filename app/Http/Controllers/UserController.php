<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role == 'cashier')
        {
            toast('Anda tidak memiliki akses!','error');
            return back();
        }
        $data = [
                    "page"      => "Users",
                    "users"     => User::where('role', '!=', 'admin')->get(),
                ];
        return view('user.index', compact('data'));
    }

    public function store(Request $request)
    {
        $insert = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make('12345678'),
            'role'      => $request->role
        ]);

        if(!$insert)
        {
            toast('User baru gagal ditambahkan!','error');
            return back();
        }
        else
        {
            toast('User baru telah ditambahkan!','success');
            return back();
        }
    }



    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'admin')
        {
            toast('You do not have access!','error');
            return back();
        }
        
        if($request->password)
        {
            $update = User::where('id', $id)->update
            ([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => $request->role,
            ]);
        }
        else
        {
            $update = User::where('id', $id)->update
            ([
                'name'      => $request->name,
                'email'     => $request->email,
                'role'     => $request->role
            ]);
        }

        if($update)
        {
            toast('Your Post as been updated!','success');
            return back();
        }
        else
        {
            toast('Your Post failed to updated!','error');
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

        $delete = User::destroy($id);

        if($delete)
        {
            toast('Your Post as been updated!','success');
            return back();;
        }
        else
        {
            toast('Your Post failed to updated!','error');
            return back();
        }
    }
}
