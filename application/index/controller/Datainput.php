<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-20
 * Time: 21:53
 */

namespace app\index\controller;
use think\Controller;

set_time_limit(0);
class Datainput extends Controller{
    public function imageupload(){
        $status = input('get.status',0,'intval');
        $str = "";
        switch ($status){
            //待审核
            case "0":
                $str = " status=0";
                break;
            //已审核
            case "1":
                $str = " status=1";
                break;
            //查看所有数据
            case "2":
                $str = " 1=1";
                break;
            default :
                $str = " status=0";
                break;
        }

        $allData = model('Pic')->getAllData($str);
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
        $status = input('get.status',0,'intval');
        $str = "";
        switch ($status){
            //待审核
            case "0":
                $str = " status=0";
                break;
            //已审核
            case "1":
                $str = " status=1";
                break;
            //查看所有数据
            case "2":
                $str = " 1=1";
                break;
            default :
                $str = " status=0";
                break;
        }
        $allData = model('Pic')->getAllData($str);
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
