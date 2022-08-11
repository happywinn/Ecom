<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function users()
    {
    	$users = User::all();
    	return view('admin.users.index',compact('users'));
    }

    public function viewuser($id)
    {
    	$users = User::find($id);
    	return view('admin.users.view',compact('users'));
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('status','User Deleted Successfully');
        
    }
}
