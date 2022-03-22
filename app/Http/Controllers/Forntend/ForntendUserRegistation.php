<?php

namespace App\Http\Controllers\Forntend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ForntendUserRegistation extends Controller
{
    public function register(){
     return view('forntend.dashboard.registation');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user_id=User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $role=Role::find(5);
        $user_id->assignRole($role);
        return redirect(route('forntend.user.register'));
    }
}
