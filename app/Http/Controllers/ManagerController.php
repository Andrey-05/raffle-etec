<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function create(Request $req)
    {
        try {

            $req->validate([
                "name" => ["required"],
                "rm" => ["required"],
                "password" => ["required", "min:8"],
            ]);

            $hashedPassword = Hash::make($req->password, [
                "rounds" => 10,
            ]);

            $manager = Manager::create([
                "name" => $req->name,
                "rm" => $req->rm,
                "password" => $hashedPassword,
            ]);

            return response()->json($manager, 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }
}
