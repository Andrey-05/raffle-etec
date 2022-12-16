<?php

namespace App\Http\Controllers;

use App\Models\PurchasedTicket;
use App\Models\Seller;
use Illuminate\Http\Request;

class PurchasedTicketController extends Controller
{
    public function create(Request $req)
    {
        try {
            $req->validate([
                "raffle_id" => ["required"],
                "rm" => ["required"],
                "buyer_phone" => ["required"],
                "buyer_name" => ["required"],
                "ticket_numbers" => ["required"],
                "purchase_date" => ["required"],
            ]);

            $seller = Seller::where("rm", $req->rm)->firstOr(function () use ($req) {
                return Seller::create([
                    "rm" => $req->rm,
                ]);
            });

            foreach ($req->ticket_numbers as $ticket_number) {
                $purchasedTicket = PurchasedTicket::create([
                    "raffle_id" => $req->raffle_id,
                    "seller_id" => $seller->id,
                    "buyer_phone" => $req->buyer_phone,
                    "buyer_name" => $req->buyer_name,
                    "ticket_number" => $ticket_number,
                    "purchase_date" => $req->purchase_date,
                ]);
            }

            return response()->json($purchasedTicket, 201);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }
}
