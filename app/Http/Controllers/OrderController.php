<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, $shopId)
    {
        $order = new Order();

        $order->name = $request->name;
        $order->number = $request->number;
        $order->zip_code = $request->zip_code;
        $order->address = $request->address;
        $order->shop_id = $shopId;
        $order->save();

        $ordered_items = [];
        foreach ($request->items as $item) {
            $ordered_item = new OrderedItem();
            $ordered_item->item_id = $item['id'];
            $ordered_item->quantity = $item['quantity'];
            array_push($ordered_items, $ordered_item);
        }
        $order->orderedItems()->saveMany($ordered_items);

        return response(["id" => $order->id], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
