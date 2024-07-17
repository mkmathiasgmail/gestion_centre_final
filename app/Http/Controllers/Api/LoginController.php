<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
    
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $requet = Http::timeout(100)->post('http://10.143.41.70:8000/2024/odc/public/api/users/login', $data);

        return $requet->json();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
