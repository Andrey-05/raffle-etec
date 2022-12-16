<?php

use App\Models\Manager;
use App\Models\Raffle;
use App\Models\Seller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//OK
Route::get('/', function () {
    $raffles = Raffle::all();

    return Inertia::render("allRaffles", [
        "raffles" => $raffles
    ]);
});

//OK
Route::get('/register', function () {
    return Inertia::render("register");
});

//OK
Route::get('/login', function () {
    try {
        $token = $_COOKIE["raffle_token"];

        $manager = Manager::where("id", $token)->first();

        if ($manager) {
            return redirect("/dashboard");
        } else {
            return Inertia::render("login");
        }
    } catch (\Throwable $th) {
        return Inertia::render("login");
    }
});

//OK
Route::get('/logout', function () {
    return redirect("/")->cookie(Cookie::forget("raffle_token"));
});


Route::get('/ranking/{id}', function ($id) {
    $raffle = Raffle::find($id);
    $sellers = DB::select("select sellers.rm, count(purchased_tickets.id) as sold_raffles from purchased_tickets inner join raffles on purchased_tickets.raffle_id = raffles.id inner join sellers on purchased_tickets.seller_id = sellers.id where raffles.id=? group by sellers.rm order by sold_raffles desc", [$id]);

    return Inertia::render("ranking", [
        "sellers" => $sellers,
        "raffle" => $raffle
    ]);
});

//OK
Route::get("/dashboard", function () {

    try {
        $token = $_COOKIE["raffle_token"];

        $manager = Manager::where("id", $token)->first();

        if ($manager) {

            return Inertia::render("dashboard", [
                "manager" => $manager,
                "raffles" => $manager->raffles()->get(["id", "title", "date"]),
            ]);
        } else {
            return redirect("/login");
        }
    } catch (\Throwable $th) {
        return redirect("/login");
    }
});

//OK
Route::get('/dashboard/criar', function () {
    try {
        $token = $_COOKIE["raffle_token"];

        $manager = Manager::where("id", $token)->first();

        if ($manager) {

            return Inertia::render("newRaffle", [
                "manager" => $manager
            ]);
        } else {
            return redirect("/login");
        }
    } catch (\Throwable $th) {
        return redirect("/login");
    }
});

//OK
Route::get('/vender-rifa/{id}', function ($id) {
    try {
        $token = $_COOKIE["raffle_token"];

        $manager = Manager::where("id", $token)->first();

        $raffle = Raffle::find($id);

        if ($manager) {

            return Inertia::render("sellRaffle", [
                "manager" => $manager,
                "raffle" => $raffle,
            ]);
        } else {
            return redirect("/login");
        }
    } catch (\Throwable $th) {
        return redirect("/login");
    }
});

// OK
Route::get('/dashboard/{id}', function ($id) {
    try {
        $token = $_COOKIE["raffle_token"];

        $manager = Manager::where("id", $token)->first();

        if ($manager) {

            $raffle = Raffle::find($id);

            return Inertia::render("selectRaffle", [
                "raffle" => $raffle,
                "prizes" => $raffle->prizes()->orderBy("position", "asc")->get(),
                "purchasedTickets" => $raffle->purchasedTickets()->with("seller")->orderBy("ticket_number", "asc")->get(),
            ]);
        } else {
            return redirect("/login");
        }
    } catch (\Throwable $th) {
        return redirect("/login");
    }
});
