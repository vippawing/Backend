<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockPriceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $id = DB::table('stockprices')->insertGetId(
                array(
                    'stockId' => $r->stockId,
                    'dateTime' => $r->dateTime,
                    'kInterval' => $r->kInterval,
                    'open' => $r->open,
                    'high' => $r->high,
                    'low' => $r->low,
                    'close' => $r->close,
                    'volume' => $r->volume,
                )
            );
            $JSON = array('id' => $id);
            return $id;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
