<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Raffle;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function create(Request $req)
    {
        try {

            $req->validate([
                "title" => ["required"],
                "description" => ["required"],
                "date" => ["required"],
                "price" => ["required"],
                "prizes" => ["required"],
                "ticket_book_number" => ["required"],
                "ticket_number_by_book" => ["required"],
                "manager_id" => ["required"],
            ]);

            $raffle = Raffle::create([
                "title" => $req->title,
                "description" => $req->description,
                "date" => $req->date,
                "price" => $req->price,
                "ticket_book_number" => $req->ticket_book_number,
                "ticket_number_by_book" => $req->ticket_number_by_book,
                "manager_id" => $req->manager_id,
            ]);

            foreach ($req->prizes as $prize) {
                $createdPrize = Prize::create([
                    "raffle_id" => $raffle->id,
                    "description" => $prize["description"],
                    "position" => $prize["position"]
                ]);
            }

            return response($raffle, 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }

    public function delete(string $id)
    {
        try {
            $raffle = Raffle::find($id);
            $raffle->delete();

            return response('OK', 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }
}
