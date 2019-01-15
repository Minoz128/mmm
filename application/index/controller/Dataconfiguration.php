<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-04
 * Time: 23:05
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;
use think\Request;

set_time_limit(0);
class Dataconfiguration extends Controller{
    public function select(){
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
            case "3":
                $str = " resulterr=1";
                break;
            default :
                $str = " status=0";
                break;
        }
        /*
         * 统计数据
         * */
        $data = model('Pic')->getAllData($str);
        $status0Data = model('Pic')->selectByWhere("status='0'");
        $status0Count = $status0Data[0]['count'];
        $status1Data = model('Pic')->selectByWhere("status='1'");
        $status1Count = $status1Data[0]['count'];
        $successData = model('Pic')->selectByWhere("resulterr='1'");
        $successCount = $successData[0]['count'];
        $allCountData = model('Pic')->selectByWhere("1=1");
        $allCount = $allCountData[0]['count'];
        $count = count($data);
        if($allCount == 0){
            $rate = 0;
        }else{
            $rate = round(((int)$successCount / (int)$allCount),4) * 100;
        }

        $rate = (string)$rate.'%';
        return $this->fetch('',[
            'data' => $data,
            'count' => $count,
            'allCount' => $allCount,
            'status0Data' => $status0Count,
            'status1Data' => $status1Count,
            'successCount' => $successCount,
            'rate' => $rate
        ]);
    }

    public function getchange(){
        $id = input('post.id');
        $resulterr = input('post.resulterr');
        if($id && $resulterr){
            $data = [
                'resulterr' => $resulterr,
                'status' => 1,
                'uid' => session('user')[0]['uid'],
                'date' => date('Y-m-d H:i:s'),
            ];
            try{
                $res = model("Pic")->save($data,['id'=>$id]);

            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            if($res){
                return show(1,'修改成功');
            }else{
                return show(0,'修改失败');
            }
        }
    }

    public function reset0(){
        model("Pic")->reset0();
        $this->success('重置成功');
    }

    /**
     * 更新数据
     */
    public function upload(){
        $file = Request::instance()->file('file');
        $info = $file->move('upload');
        $data = [
            'root' =>  __PUBLIC__.'/'.$info->getPathname(),
            'relative' => '/'.$info->getPathname(),
        ];
        return show(1,"上传成功",$data);

    }

    public function uploadimg(){
        $experience = model('Base')->select();
        return $this->fetch('',[
            'user' => session('user'),
            'experience' => $experience

        ]);
    }

    public function adddata(){
        if(request()->isPost()){
            $data = input('post.');
            if($data){
                //验证数据合法性
                if(!Validate('Pic')->scene('add')->check($data)){
                    return show(0,Validate('Pic')->getError());
                };
                //添加入库
                for ($i=0;$i<count($data['imglist']);$i++){
                    $postData = [
                        'uid' => $data['uid'],
                        'status' => $data['status'],
                        'type' => $data['type'],
                        'brief' => $data['brief'],
                        'manmadetags' => $data['manmadetags'],
                        'src' => $data['imglist'][$i],
                    ];
                    Db::name("Pic")->insert($postData);
                }
                return show(1,"添加成功");
            }

        }
    }

    /**
     * @param $keyword
     * @param $num
     * @return array
     * 爬取百度图片
     */
    function spider($keyword, $num) {
        $res = array();
        for ($pn = 0; $pn <= $num; $pn += 30) {
            $url = "http://image.baidu.com/search/acjson?tn=resultjson_com&ipn=rj&ct=201326592&fp=result&queryWord+=&ie=utf-8&oe=utf-8&word=".$keyword."=&pn=".$pn."&rn=30";
            $json = file_get_contents($url);
            $array = json_decode($json);

            foreach ($array->data as $key => $image) {
                if (!in_array($image, $res)) {
                    if (isset($image->middleURL)) {
                        $res[] = $image->middleURL;
                    }elseif (isset($image->thumbURL)){
                        $res[] = $image->thumbURL;
                    }
                }
            }
        }
        return $res;
    }

    /**
     * [download 下载图片到本地]
     * @param  [string] $url     [图片地址]
     * @param  [string] $path    [存储路径]
     * @param  string $referer [HTTP Header中的referer值]
     */
    function download($url, $path, $referer = '') {
        $filename = pathinfo($url, PATHINFO_BASENAME);
        if (!file_exists($path.$filename)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_REFERER, $referer);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            $file = curl_exec($ch);
            curl_close($ch);
            $data = [
                'src' => '/patch/'.$filename,
                'status' => 0,
                'type' => session('typeByPatchImg'),
                'uid' => session('user')[0]['uid'],
                'date' => date('Y-m-d H:i:s'),
            ];
            Db::name('Pic')->insert($data);
            $resource = fopen($path.$filename, 'a');
            fwrite($resource, $file);
            fclose($resource);
        }
    }

    /**
     * [batchDownload 批量下载图片]
     * @param  [type] $imgUrls [图片地址数组]
     * @param  [type] $path    [目标路径]
     * @param  string $referer [HTTP Header中的referer值]
     * @return int
     */
    function batchDownload($imgUrls, $path, $referer = '') {
        $count = 0;
        foreach ($imgUrls as $key => $imgUrl) {
            $count = isset($key)?$count+1:$count;
            $this->download($imgUrl, $path, $referer);
        }
        return $count;
    }

    /**
     * 获取表单提交的关键字 利用curl spider下载图片并保存
     */
    function searchKeywordsAndDownload(){
        $keywords = input('post.keywords');
        $type = input('post.type');
        if(!$type){
            return show(0,"请选择实验项目");
        }
        session('typeByPatchImg',null);
        session('typeByPatchImg',$type);
        if(!trim($keywords)){
            return show(0,"请输入搜索关键字");
        }
        $num = input('post.num');
        $t1 = microtime(true);
        $images = $this->spider($keywords,$num);
        $path =  'patch/';
        $referer = "https://image.baidu.com/search/acjson?tn=resultjson_com&ipn=rj&ct=201326592&is=&fp=result&queryWord+=&cl=&lm=&ie=utf-8&oe=utf-8&adpicid=&st=&word=%E6%96%B0%E5%9E%A3%E7%BB%93%E8%A1%A3&z=&ic=&s=&se=&tab=&width=&height=&face=&istype=&qc=&nc=&fr=&step_word=%E6%96%B0%E5%9E%A3%E7%BB%93%E8%A1%A3&pn=120&rn=30&gsm=78&1506604653115=";
        $return = $this->batchDownload($images, $path, $referer);
        $t2 = microtime(true);
        $data = [
            'num' => $return,
            'time' => round($t2-$t1,3),
            'memory_use' =>  round((memory_get_usage()/(1024*1024)),2)
        ];
        if($return){
            return show(1,"搜索成功",$data);
        }
    }

    function patch(){
        $experience = model('Base')->select();
        return $this->fetch('',[
            'user' => session('user'),
            'experience' => $experience
        ]);
    }

    function delByDir($path){
        if(is_dir($path)) {
            //扫描一个文件夹内的所有文件夹和文件并返回数组
            $p = scandir($path);
            foreach ($p as $val) {
                //排除目录中的.和..
                if ($val != "." && $val != "..") {
                    //如果是目录则递归子目录，继续操作
                    if (is_dir($path . $val)) {
                        //子目录中操作删除文件夹和文件
                        $this->delByDir($path . $val . '/');
                        //目录清空后删除空文件夹
                        @rmdir($path . $val . '/');
                    } else {
                        //如果是文件直接删除
                        unlink($path . $val);
                    }
                }
            }
        }
    }

    /**
     * 清空所有数据
     */
    function delimages(){
        if(input('get.status') == "del"){
            model('Pic')->trundata();
            $path1 = "patch/";
            $path2 = "upload/";
            $this->delByDir($path1);
            $this->delByDir($path2);
            return show(1,"删除成功");
        };
    }

    /**
     * @return string
     * 如果不存在对应的session
     * 根据m_base和m_tagbase表关联组成一个大数组
     * 包含整个实验 => 母标签 => 子标签三级功能
     *
     * 保存进session的目的是一次生成 以后次次读取(维持持久化)
     * 不用每次进行动态分析时都去数据库查询
     *
     * 也可以用redis缓存数据
     * Array
        (
            [0] => Array
                        (
                        [id] => 1
                        [parentid] => 0
                        [name] => 人脸识别
                        [no] => FACEMODULE
                        [childrens] => Array
                                            (
                                            [0] => Array
                                                        (
                                                        [id] => 17
                                                        [nid] => 1
                                                        [tagname] => 识别速度
                                                        [no] =>
                                                        [connectbaseid] => 1
                                                        [status] => 1
                                                        [sonchildcounts] => 3
                                                        [sonlists] => Array
                                                                            (
                                                                            [0] => 18
                                                                            [1] => 19
                                                                            [2] => 23
                                                        )
                                            )
                                            [1] => Array
                                                        (
                                                        [id] => 20
                                                        [nid] => 1
                                                        [tagname] => 准确度
                                                        [no] =>
                                                        [connectbaseid] => 1
                                                        [status] => 1
                                                        [sonchildcounts] => 2
                                                        [sonlists] => Array
                                                                            (
                                                                            [0] => 21
                                                                            [1] => 22
                                                                            )
                                                        )
                                            )
                        )
            [1] => Array
                        (
                        [id] => 2
                        [parentid] => 0
                        [name] => 手势验证
                        [no] => HAND
                        [childrens] => Array
                                            (
                                            [0] => Array
                                                        (
                                                        [id] => 12
                                                        [nid] => 8
                                                        [tagname] => 折损率
                                                        [no] =>
                                                        [connectbaseid] => 2
                                                        [status] => 1
                                                        [sonchildcounts] => 2
                                                        [sonlists] => Array
                                                                            (
                                                                            [0] => 13
                                                                            [1] => 14
                                                                            )
                                                        )
                                            )
                        )
        )
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    function SelectByMachineSession(){
        $base = Db::name('Base')->select();
        //最外层
        foreach($base as $key => $value){
            if(isset($value['no'])){
                $root = Db::name('Tagbase')->where('no','eq',$value['no'])->field('id')->find();
                foreach ($root as $rootKey=>$rootValue){
                    //标签组
                    $childrenByRoot = Db::name('Tagbase')->where('nid','eq',$rootValue)->select();
                    //母标签
                    foreach($childrenByRoot as $childrenKey=>$childrenValue){
                        $sonTags = Db::name('Tagbase')->where('nid','eq',$childrenValue['id'])->select();
                        $childrenByRoot[$childrenKey]['sonchildcounts'] = count($sonTags);
                        $list = [];
                        foreach($sonTags as $sonKey => $sonValue){
                            $list[] = $sonValue;
                        }
                        //母标签下子标签信息
                        $childrenByRoot[$childrenKey]['sonlists'] = $list;
                    }
                    $base[$key]['childrens'] = $childrenByRoot;
                }
            }
        }
        session("tags_SelectByMachine",$base);
        return "session_save_success";
    }


    /**
     * 准备函数 遍历m_pic每张表的数据
     *
     * 如果没有session 跳转到SelectByMachineSession方法
     * 目的是避免每次生成随机数据都去数据库查询一次数据
     *
     * 并根据记录的type(实验编号) 与 session中匹配 只返回匹配对应的children信息
     * 把数据传入执行函数executeRandomdata
     *
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     *
     */
    function rendomSelectByMachine(){
        if(!is_array(session("tags_SelectByMachine"))){
            $return = $this->SelectByMachineSession();
            if(!$return){
                $this->error("session生成失败,功能停止运行");
            }
        }

        $pics = Db::name('Pic')->select();

        foreach ($pics as $picKey=>$picValue){
            foreach(session("tags_SelectByMachine") as $sessionKey=>$sessionValue){
                if($sessionValue['id'] == $pics[$picKey]['type']){
                    $this->executeRandomdata($pics[$picKey]['id'],$sessionValue['childrens']);
                }
            }
        }
        $this->success("已获取机器生成标签接口的数据");
    }


    /**
     * 获取从 rendomSelectByMachine 函数批量提交过来的m_pic表中的id和与之匹配的数据 进行rand 随机分配
     * 并批量插入数据库
     * @param $id
     * @param $data
     * @return string
     */
    function executeRandomdata($id,$data){
        $insert = "";
        if(is_array($data) && $id>0){
            foreach ($data as $key=>$value){
                if(is_array($value['sonlists']) && $value['sonchildcounts']>0){
                $rand = rand(0,$value['sonchildcounts']-1);
                    $insert.= $data[$key]['sonlists'][$rand].',';
                }
            }
            $insert = substr($insert,0,-1);
            $insertData = [
                'tag' => $insert
            ];
            model('Pic')->updateData($id,$insert);
            return "single_insert_success";
        }else{
            $this->error("参数传递不合法");
        }
    }


    function updatetag(){
        $id = input('get.id');
        session("tags_SelectByMachine",null);
        $this->SelectByMachineSession();
        if (is_numeric($id)){
            $tag = model('Pic')->get($id);
            if($tag){
                $type =$tag['type'];
                $tag = $tag['tag'];
                if(is_array(session("tags_SelectByMachine"))){
                    foreach(session("tags_SelectByMachine") as $key=>$value){
                        if($value['id'] == $type){
                            $tree = session("tags_SelectByMachine")[$key];
                        }
                    };

                    return $this->fetch('',[
                        'tag' => $tag,
                        'tree' => $tree
                    ]);
                }


            }
        }
    }
}