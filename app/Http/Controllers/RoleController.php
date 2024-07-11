<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function assignRoles($role,$user){

        $users = User::find($user);
        $users->assignRole($role);

        return back()->with('status','rôle activé avec succès');

    }
    public function desactiverRoles($role,$user){
        $users = User::find($user);
        $users->removeRole($role);

        return back()->with('status','rôle desactivé avec succès');
    }




}
