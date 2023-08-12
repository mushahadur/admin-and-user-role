<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use AdminUpdateRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class AdminController extends Controller
{
    public function index(){
        $users = User::get();
        return view('admin.home.index', compact('users'));
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
        
    }

    public function active($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->save();
        }
         return redirect()->back();
    }
    public function deactive($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_active == 1) {
            $user->is_active = 0;
            $user->save();
            return redirect()->back();
        }
         return redirect()->back();
    }

    public function viewProfile(){
        return view('admin.profile.index');
    }
    public function editProfile(){
        return view('admin.profile.edit');
    }


}
