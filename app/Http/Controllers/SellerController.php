<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the sellers.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $sellers = Seller::leftJoin("sales", "sales.seller_id", "=", "sellers.id")
            ->select("sellers.id", "sellers.name", "sellers.email", DB::raw("sum(commission) as commission"))
            ->groupBy("sellers.id")
            ->get()->toJson(JSON_PRETTY_PRINT);

        return response($sellers, 200);
    }

    /**
     * Store a newly created seller in storage.
     *
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerRequest $request)
    {
        $data = $request->all();
        $seller = Seller::create($data);

        return response()->json([
            "id" => $seller->id,
            "name" => $seller->name,
            "email" => $seller->email,
        ], 201);
    }
}
