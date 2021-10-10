<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
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
    public function store(ItemRequest $request)
    {
        $request_token = $request->bearerToken();
        $user = User::where('token', $request_token)->first();
        $shop = Shop::find($user->shop_id);
        if (is_null($shop)) {
            return response(["message" => "Bad Request"], 404);
        }
        
        $item = new Item();
        $item->photo = $request->photo;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->shop_id = $user->shop_id;
        $item->save();

        return response(["id" => $item->id], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($itemId)
    {
        $item = Item::find($itemId)->makeVisible(['created_at', 'updated_at']);
        if (is_null($item)) {
            return response(["message" => "Not Found"], 404);
        }
        return response($item, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $itemId)
    {
        $request_token = $request->bearerToken();
        $user = User::where('token', $request_token)->first();
        $item = Item::find($itemId);
        if ($user->shop_id != $item->shop_id) {
            return response(["message" => "Unauthorized"], 402);
        }

        $item->photo = $request->photo;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();

        return response('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($itemId)
    {
        $item = Item::find($itemId);
        if (is_null($item)) {
            return response(["message" => "Not Found"], 404);
        }

        $item->delete();

        return response('', 204);
    }
}
