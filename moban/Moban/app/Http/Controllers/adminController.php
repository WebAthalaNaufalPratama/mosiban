<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class adminController extends Controller
{
    public function dataSetting() {
        $getData = admin::get()->first();
        return response()->json(['data' => $getData]);
    }

    public function updateSetting() {
        $getData = admin::get()->first();

        $getData->tinggi_sensor = request('tinggiinp');
        $getData->luas_area = request('luasinp');
        $getData->stat1 = request('stat1inp');
        $getData->stat2 = request('stat2inp');
        $getData->stat3 = request('stat3inp');

        $getData->save();

        return json_encode(array('StatusCode' => 200)); 
    }
}
