<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Models\Sale;
use App\Models\Seller;
use Carbon\Carbon;

class SaleController extends Controller
{

    /**
     * Display a listing of the sales by seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($seller)
    {
        $sales = Sale::join("sellers", "sales.seller_id", "=", "sellers.id")
            ->select("sales.id", "sellers.name", "sellers.email", "sales.commission", "sales.sale_value", "sales.created_at")
            ->where("sales.seller_id", $seller)
            ->get()->toJson(JSON_PRETTY_PRINT);

        return response($sales, 200);
    }

    /**
     * Store a newly created sale in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $data = $request->all();
        $sale_value = format_currency($data['sale_value']);
        $data['sale_value'] = $sale_value;
        $data['commission'] = $sale_value * 0.085;
        $sale = Sale::create($data);

        $seller = Seller::find($request->input("seller_id"));

        return response()->json([
            "id" => $sale->id,
            "nome" => $seller->name,
            "email" => $seller->email,
            "commission" => $sale->commission,
            "sale_value" => $sale->sale_value,
            "sale_date" => Carbon::parse($sale->created_at)->format('Y-m-d')
        ], 201);
    }
}
