<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shops = Shop::all();

        $price_range_sort = $request->input('price_range_sort');
        $opening_only = $request->input('opening_only');

        if ($price_range_sort == "true") {
            $shops = $shops->sortBy("price_range");
        } else if ($price_range_sort == "false") {
            $shops = $shops->sortByDesc("price_range");
        }

        if ($opening_only == "true") {
            $resultShops = [];
            $now = new Carbon("now", "Asia/Tokyo");

            foreach ($shops as $shop) {
                $opening_time = new Carbon($shop->opening_time, 'Asia/Tokyo');
                $closing_time = new Carbon($shop->closing_time, 'Asia/Tokyo');

                if ($opening_time < $closing_time) {
                    $closing_time->addDay();
                }
                if ($now->between($opening_time, $closing_time)) {
                    array_push($resultShops, $shop);
                }
            }
            $shops = $resultShops;
        }

        return response($shops, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($shop_id)
    {
        $shop = Shop::find($shop_id);
        if (is_null($shop)) {
            return response(['message' => 'Not Found'], 404);
        }
        $shop->makeVisible(['created_at', 'updated_at']);
        return response($shop, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request)
    {
        $request_token = $request->bearerToken();
        $user = User::where('token', $request_token)->first();
        $shop = Shop::find($user->shop_id);

        if (is_null($shop)) {
            return response(["message" => "Not Found"], 404);
        }

        $shop->photo = $request->photo;
        $shop->name = $request->name;
        $shop->opening_time = $request->opening_time;
        $shop->closing_time = $request->closing_time;
        $shop->price_range = $request->price_range;
        $shop->save();

        return response('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
