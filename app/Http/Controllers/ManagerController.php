<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Exception;
use Error;
use Exception as GlobalException;

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

            return response()->json($manager, 201)->cookie(cookie("raffle_token", $manager->id, 60 * 24 * 7)); //7 days
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }

    public function login(Request $req)
    {
        try {
            $req->validate([
                "rm" => ["required"],
                "password" => ["required"],
            ]);

            $manager = Manager::where("rm", $req->rm)->first();

            if (!$manager) {
                throw new Error("RM ou senha incorretos");
            }

            if (Hash::check($req->password, $manager->password, [
                "rounds" => 10,
            ])) {
                return response()->json($manager, 200)->cookie(cookie("raffle_token", $manager->id, 60 * 24 * 7)); //7 days
            } else {
                throw new Error("RM ou senha incorretos");
            };
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }
}
