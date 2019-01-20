<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-20
 * Time: 21:53
 */

namespace app\index\controller;
use think\Controller;

class Datainput extends Controller{
    public function imageupload(){
        $allData = model('Pic')->getAllData("1=1");
        $allCount = count($allData);
        $status0Data = model('Pic')->selectByWhere("status='0'");
        $status0Count = $status0Data[0]['count'];
        $status1Data = model('Pic')->selectByWhere("status='1'");
        $status1Count = $status1Data[0]['count'];

        return $this->fetch('',[
            'allData' => $allData,
            'allCount' => $allCount,
            'status0Data' => $status0Data,
            'status0Count' => $status0Count,
            'status1Data' => $status1Data,
            'status1Count' => $status1Count,
        ]);
    }

    public function patch(){
        $allData = model('Pic')->getAllData("1=1");
        $allCount = count($allData);
        $status0Data = model('Pic')->selectByWhere("status='0'");
        $status0Count = $status0Data[0]['count'];
        $status1Data = model('Pic')->selectByWhere("status='1'");
        $status1Count = $status1Data[0]['count'];

        return $this->fetch('',[
            'allData' => $allData,
            'allCount' => $allCount,
            'status0Data' => $status0Data,
            'status0Count' => $status0Count,
            'status1Data' => $status1Data,
            'status1Count' => $status1Count,
        ]);
    }
}
