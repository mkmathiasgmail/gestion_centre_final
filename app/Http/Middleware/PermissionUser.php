<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
            // ce code permet de recuperer le role de l'utilisateur connecté et de le comparer avec le role passé en parametre
            $user = $request->user();
            $roles = $user->getRoleNames();
            foreach($roles as $item){
                $getrole[] = $item;
            }


        try {
            if(in_array($role,$getrole)){
                return $next($request);
                }
                else {
                    if(in_array('admin',$getrole)){

                        return back();
                    }

                    return redirect()->route('activitencours');

                }

        } catch (\Throwable $th) {
            return back()->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
        }





    }
}
