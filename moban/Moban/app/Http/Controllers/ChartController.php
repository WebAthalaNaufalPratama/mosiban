<?php

namespace App\Http\Controllers;

use App\Models\Moban;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Label;

class ChartController extends Controller
{
    public function chartBanjir()
    {
        $getData = Moban::get();
        $arrLabel = array();
        $arrData = array();
        $arrTinggi = array();
        foreach ($getData as $a) {
            $dateTime = $a->created_at;
            $array = explode(" ", $dateTime);
            $date = $array[0];
            $time = end($array);
            $arrData[] = $a->debit;
            $arrTinggi[] = $a->tinggi;
            $arrDate[] = $date;
            $arrTime[] = $time;
            $arrLabel[] = $date . " " . $time;
        }
        $data['label'] = $arrLabel;
        $data['data'] = $arrData;
        $data['tinggi'] = $arrTinggi;
        $data['date'] = $arrDate;
        $data['time'] = $arrTime;
        // return $data;
        return response()->json(['data' => $data]);
    }

    public function chartTinggi()
    {
        $getData = Moban::get();
        $arrLabel = array();
        $arrData = array();
        foreach ($getData as $a) {
            $dateTime = $a->created_at;
            $array = explode(" ", $dateTime);
            $date = $array[0];
            $time = end($array);
            $arrData[] = $a->tinggi;
            $arrLabel[] = $date . " " . $time;
        }
        $data['label'] = $arrLabel;
        $data['data'] = $arrData;
        // return $data;
        return response()->json(['data' => $data]);
    }

    public function chartHujan() {
        $getData = Moban::get();
        $arrLabel = array();
        $arrData = array();
        foreach ($getData as $a) {
            $dateTime = $a->created_at;
            $array = explode(" ", $dateTime);
            $date = $array[0];
            $time = end($array);
            $arrData[] = $a->curah_hujan;
            $arrDate[] = $date;
            $arrTime[] = $time;
            $arrLabel[] = $date . " " . $time;
        }
        $data['label'] = $arrLabel;
        $data['data'] = $arrData;
        $data['date'] = $arrDate;
        $data['time'] = $arrTime;
        // return $data;
        return response()->json(['data' => $data]);
    }

    public function chartIntensitas()
    {
        $getData = Moban::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',date('13'))->get();
        // return $getData;
        $arrLabel = array();
        $arrData = array();
        // return date('G',strtotime('24:12:00'));
        foreach($getData as $a){
            $dateTime = $a->created_at;
            $array = explode(" ", $dateTime);
            $date = $array[0];
            $time = end($array);
            for($i=0;$i<24;$i++){
                // $arrData[]=date('G',strtotime($getData[$i]->time));
                // $arrData[]=$i;
                
                if(date('H',strtotime($time))==$i && date('i',strtotime($time))=='00') {
                    $total= 0;
                    // $datePrev=$a->curah_hujan;
                    // $arrLabel[]=$getData[$i]->
                    // $arrLabel[]=$a->date." ".date("H",strtotime($a->time));
                    $curah = $a->curah_hujan;
                    $total = $curah - $total;
                    // $arrData[]=[
                    //     'label' => $date,
                    //     'intensitas' => $total
                    // ];
                    $arrData[] = $total;
                    $arrLabel[] = $date . " " . $time;
                    // $arrLabel[] = $date;
                }   
            }

            $data['label'] = $arrLabel;
            $data['data'] = $arrData;
            
        }
        return response()->json(['data' => $data]);
        // $data['label'] = $arrLabel;
        // $data['data'] = $arrData;
        // $data['intensitas'] = $arrIntensitas;
        // $data['date'] = $arrDate;
        // $data['time'] = $arrTime;
        // return $data;
        // return response()->json(['data' => $data]);
    }

    // public function chartIntensitas()
    // {
    //     $getData = Moban::get();
    //     $arrLabel = array();
    //     $arrData = array();
    //     foreach ($getData as $a) {
    //         $arrData[] = $a->intensitas_hujan;
    //         $arrLabel[] = $a->date . " " . $a->time;
    //     }
    //     $data['label'] = $arrLabel;
    //     $data['data'] = $arrData;
    //     // return $data;
    //     return response()->json(['data' => $data]);
    // }

    public function uploadData(Request $req) {
        $newData = Moban::create([
            'curah_hujan' => $req->ch,
            'longitude' => $req->long,
            'latitude' => $req->lat,
            'debit' => $req->debit,
            'intensitas_hujan' => $req->ih,
            'nilai' => $req->nilai,
            'tinggi' => $req->tinggi,
        ]);


        $newData->save();
        return response()->json(['StatusCode' => 200]);
    }
}
