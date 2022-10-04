<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create(Request $req)
    {
        try {

            if ($req->password !== $req->password_confirmation) {
                return response()->json(["error" => "As senhas não conferem"], 400);
            }
        } catch (\Throwable $th) {
            return $th;
        }

        // User::create([
        //     "name" => $req->name,
        //     "rm" => $req->rm,
        //     "password" => $req->password,
        // ]);
    }
}
