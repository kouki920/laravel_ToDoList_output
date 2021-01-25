<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;

use App\Models\Area;

class ShopController extends Controller
{
    public function index(){
        $area_tokyo = Area::find(1)->shops;//area_idが1のshopを表示


        $shop = Shop::find(3)->area->name;//shopのidが3のareaの名前を表示

        $shop_route = Shop::find(1)->routes()->get();//shopのidが1のrouteが取得できる
        dd($area_tokyo,$shop,$shop_route);
    }
}
