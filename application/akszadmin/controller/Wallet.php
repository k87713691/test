<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://demo.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库3：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库3：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\akszadmin\controller;

use library\Controller;
use think\Db;

/**
 * 流水记录
 * Class Item
 * @package app\akszadmin\controller
 */
class Wallet extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
 

    /**
     * 流水记录
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
       //$list=Db::name('lc_wallet_list')->where('id',">",0)->select();
       $query = $this->_query('lc_wallet_list')->where("id > 0 and status < 5");
        $query->order('id desc')->page();
       //$this->assign('list',$list);
       $this->fetch();
		
    }
    
    public function walletdel(){
    	if($_SESSION['fw']['user']['username']=="admin"){
    		Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->update(['status'=>9]);
    		return "OK";
    	}else{
    		return "false";
    	}
    
    }
    public function walletstop(){
    	if($_SESSION['fw']['user']['username']=="admin"){
    		$getstatus=Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->find();
    		if($getstatus['status']==0) Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->update(['status'=>1]);
    		if($getstatus['status']==1) Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->update(['status'=>0]);
    		//Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->update(['status'=>0]);
    		return "OK";
    	}else{
    		return "false";
    	}
    	
    }
    public function walletadd(){
    	if($_SESSION['fw']['user']['username']!="admin"){return "非法访问";exit;die;}
    	if(empty($_POST)){return "数据错误！";exit;die;}
    	$adddata=array(
    		'title'=>$_POST['title'],
    		'exc_rmb'=>$_POST['exc_rmb'],
    		'exc_usdt'=>$_POST['exc_usdt'],
    		'addtime'=>time(),
    		'status'=>$_POST['status'],
    	);
    	$ok=Db::name('lc_wallet_list')->insert($adddata);
    	return $ok==1?"OK":"false";die;
    }
     public function walletedit(){
    	if($_SESSION['fw']['user']['username']!="admin"){return "非法访问";exit;die;}
    	if(empty($_POST)){return "数据错误！";exit;die;}
    	$adddata=array(
    		'title'=>$_POST['title'],
    		'exc_rmb'=>$_POST['exc_rmb'],
    		'exc_usdt'=>$_POST['exc_usdt'],
    		'addtime'=>time(),
    		'status'=>$_POST['status'],
    	);
    	$ok=Db::name('lc_wallet_list')->where('id = '.$_POST['id'])->update($adddata);
    	return $ok;die;
    }
    public function walletgetbyid(){
    	$res=Db::name('lc_wallet_list')->where('id = '.$_GET['id'])->find();
    	return $res;
    }
    
   
    //////////////////////////////////////////以下是用户钱包逻辑代码。
    
    
    public function walletuser(){

		$query = $this->_query('lc_wallet_user')->where("id > 0 and status < 5");
        $query->order('id desc')->page();
		$this->fetch();
		
	}
	
	public function walletuserdel(){
    	if($_SESSION['fw']['user']['username']=="admin"){
    		Db::name('lc_wallet_user')->where("id = ".$_GET['id'])->update(['status'=>9]);
    		return "OK";
    	}else{
    		return "false";
    	}
    
    }
    public function walletuserstop(){
    	if($_SESSION['fw']['user']['username']=="admin"){
    		$getstatus=Db::name('lc_wallet_user')->where("id = ".$_GET['id'])->find();
    		if($getstatus['status']==0) Db::name('lc_wallet_user')->where("id = ".$_GET['id'])->update(['status'=>1]);
    		if($getstatus['status']==1) Db::name('lc_wallet_user')->where("id = ".$_GET['id'])->update(['status'=>0]);
    		//Db::name('lc_wallet_list')->where("id = ".$_GET['id'])->update(['status'=>0]);
    		return "OK";
    	}else{
    		return "false";
    	}
    	
    }
    public function walletuseradd(){
    	//die("123");
    	if($_SESSION['fw']['user']['username']!="admin"){return "非法访问";exit;die;}
    	if(empty($_POST)){return "数据错误！";exit;die;}
    	$adddata=array(
    		'title'=>$_POST['title'],
    		'exc_rmb'=>$_POST['exc_rmb'],
    		'exc_usdt'=>$_POST['exc_usdt'],
    		'balance'=>$_POST['balance'],
    		'uid'=>$_POST['uid'],
    		'addtime'=>time(),
    		'status'=>$_POST['status'],
    	);
    	$ok=Db::name('lc_wallet_user')->insert($adddata);
    	return $ok==1?"OK":"false";die;
    }
     public function walletuseredit(){
    	if($_SESSION['fw']['user']['username']!="admin"){return "非法访问";exit;die;}
    	if(empty($_POST)){return "数据错误！";exit;die;}
    	$adddata=array(
    		'title'=>$_POST['title'],
    		'exc_rmb'=>$_POST['exc_rmb'],
    		'exc_usdt'=>$_POST['exc_usdt'],
    		'balance'=>$_POST['balance'],
    		'uptime'=>time(),
    		'status'=>$_POST['status'],
    	);
    	$ok=Db::name('lc_wallet_user')->where('id = '.$_POST['id'])->update($adddata);
    	return $ok;die;
    }
    public function walletusergetbyid(){
    	$res=Db::name('lc_wallet_user')->where('id = '.$_GET['id'])->find();
    	return $res;
    }
}
