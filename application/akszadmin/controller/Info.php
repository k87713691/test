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
 * 网站配置
 * Class Item
 * @package app\akszadmin\controller
 */
class Info extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'LcInfo';
    protected $reward_table = 'LcReward';

    /**
     * 网站设置
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function set()
    {
        $this->title = '网站设置';
        $this->_form($this->table, 'form');
    }

    /**
     * 表单数据处理
     * @param array $vo
     * @throws \ReflectionException
     */
    protected function _form_filter(&$vo){
        if ($this->request->isPost()&&isset($vo['ban_ip'])&&!empty($vo['ban_ip'])){
            $vo['ban_ip'] = trim(str_replace('，',',',$vo['ban_ip']));
        }
    }
    
    /**
     * 奖励设置
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function reward()
    {
        $this->title = '奖励设置';
        $this->_form($this->reward_table, 'reward');
    }

    /**
     * 支付设置
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function pay()
    {
        $this->title = '支付设置';
        $this->_form($this->table, 'pay');
    }

    /**
     * 图片设置
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function img()
    {
        $this->title = '支付设置';
        $this->_form($this->table, 'img');
    }
    
    public function payments()
    {
        $this->title = '支付方式配置';
        $list=Db::table('lc_payments')->where('id > 0 and status < 5')->select();
        
        //$this->_form($this->table, 'img');
        $this->assign('list',$list);
        $this->fetch();
    }
    public function getpaymentbyid(){
    	
    	if(empty($_GET)){return "数据错误！";exit;die;}
    	$res=Db::name('lc_payments')->where('id = '.$_GET['id'])->find();
    	return $res;
    	
    }
    public function editpayment(){
     	if(empty($_POST)){return "数据错误！";exit;die;}
    	$tosave=array(
    		'title'=>$_POST['title'],
    		'img'=>$_POST['img'],
    		'status'=>$_POST['status'],
    		'addr'=>$_POST['addr'],
    		'more'=>$_POST['more'],
    		'addtime'=>time(),
    	);
    	$res=Db::name('lc_payments')->where('id = '.$_POST['id'])->update($tosave);
    	if($res){
    		return "ok";
    	}else{
    		return "false";
    	}
    	
    }
    
    public function addpayment(){
     	if(empty($_POST)){return "数据错误！";exit;die;}
    	$tosave=array(
    		'title'=>$_POST['title'],
    		'img'=>$_POST['img'],
    		'status'=>$_POST['status'],
    		'addr'=>$_POST['addr'],
    		'more'=>$_POST['more'],
    		'addtime'=>time(),
    	);
    	$res=Db::name('lc_payments')->insert($tosave);
    	if($res){
    		return "ok";
    	}else{
    		return "false";
    	}
    	
    }
    
    public function delpaymentbyid(){
     	if(empty($_GET)){return "数据错误！";exit;die;}
    	$res=Db::name('lc_payments')->where('id = '.$_GET['id'])->update(['status'=>9]);
    	return "ok";
    	
    }
    

}
