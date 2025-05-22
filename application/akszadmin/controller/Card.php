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
 * 会员管理
 * Class Item
 * @package app\akszadmin\controller
 */
class Card extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'LcCard';

    /**
     * 会员列表
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
        $this->title = '实名审核管理';
        $query = $this->_query($this->table)->alias('c')->join('lc_user u','u.id = c.user_id')->field('c.*,u.id,u.name as username');
        $query->equal('c.status')->like('c.name,c.id_card')->order('c.id desc')->page();
    }
    /**
     * 状态 开启或者关闭
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function iskqopen()
    {
        
        $id = $this->request->param('id');
        $iskq = $this->request->param('iskq');
        $this->_save($this->table, ['isjy' => $iskq]);
    }   
     public function useredits()
    {
		if($this->app->request->isPost()){
			$param = $this->app->request->param();
 
 	        $datac['uid']=$param['id'];
			$datac['pid']=$param['pid'];
			$tosave=array(
    		'bank'=>$param['bank'] ,
    		'account'=>$param['account'] ,
     
    	);
		$res = Db::name('lc_bank')->where('id = '.$datac['pid'])->update($tosave);
		  
if($res){
    	 
    		 $this->success('成功', "/akszadmin.html#/akszadmin/users/index.html?spm=m-69-74-75" ,0);


    	}else{
    	 
    		 $this->success('失败',"/akszadmin.html#/akszadmin/users/index.html?spm=m-69-74-75" ,0);
    	}
		}
        $this->title = '编辑订单信息';
        $uid = $this->request->param('id');

       $this->bank = Db::name('LcBank')->where('uid', $uid)->where('leixing', 1)->order("id desc")->select();
     $this->_form($this->table, 'useredits');
    }
 public function userbankedits()
    {
		if($this->app->request->isPost()){
			$param = $this->app->request->param();
 
 	        $datac['uid']=$param['id'];
			$datac['pid']=$param['pid'];
			$tosave=array(
    		'name'=>$param['name'] ,
    		'bank'=>$param['bank'] ,
    		'area'=>$param['area'] ,
    		'account'=>$param['account'] ,
   
    	);
		$res = Db::name('lc_bank')->where('id = '.$datac['pid'])->update($tosave);
		  
if($res){
    	 
    		 $this->success('成功', "/akszadmin.html#/akszadmin/users/index.html?spm=m-69-74-75" ,0);


    	}else{
    	 
    		 $this->success('失败',"/akszadmin.html#/akszadmin/users/index.html?spm=m-69-74-75" ,0);
    	}
		}
        $this->title = '编辑订单信息';
        $uid = $this->request->param('id');

       $this->bank = Db::name('LcBank')->where('uid', $uid)->where('leixing', 2)->order("id desc")->select();
     $this->_form($this->table, 'userbankedits');
    }


    /**
     * 数据列表处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function _index_page_filter(&$data)
    {
        $this->member = Db::name("lc_card")->field('id,name,id_card')->select();
        
    }
    
    public function user_relation(){
        $this->title = '会员关系网';
        if($this->request->isGet()){
            $list = [];
            $phone = $this->request->param('phone');
            $type = $this->request->param('type');
            if($type == 1){
                $top = Db::name('LcUser')->where(['phone'=>$phone])->value('top');
                if($top){
                    $list = Db::name('LcUser')->where(['id'=>$top])->select();
                }
            }else{
                $uid = Db::name('LcUser')->where(['phone'=>$phone])->value('id');
                if($uid){
                    $list = Db::name('LcUser')->where(['top'=>$uid])->select();
                }
            }
            if($list){
                foreach ($list as &$v){
                    $vo['top_phone'] = '';
                    if($v['top']){
                      $vo['top_phone'] = Db::name('LcUser')->where(['id'=>$v['top']])->value('phone');  
                    }
                }
            }
            $this->assign('list', $list);
        }
        $this->fetch();
    }

    /**
     * 表单数据处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function _form_filter(&$vo)
    {
        if ($this->request->isPost()) {
			 
            if($vo['mwpassword']) $vo['password'] = md5($vo['mwpassword']);
            if($vo['mwpassword2']) $vo['password2'] = md5($vo['mwpassword2']);
            if(isset($vo['id'])){
                $money = Db::name($this->table)->where("id = {$vo['id']}")->value('money');
                if($money&&$money != $vo['money']){
                    $handle_money = $money-$vo['money'];
                    $type = $handle_money>0?2:1;
                   // model('akszadmin/Users')->addFinance($vo['id'],abs($handle_money),$type,'系统操作');
                }
				if(!empty($vo['bank'])){
					Db::name("LcBank")->where('uid',$vo['id'])->update(['bank' =>$vo['bank'], 'area' =>$vo['area'],'account' =>$vo['account']]);
				}
			 
            }else{
                $vo['time'] = date('Y-m-d H:i:s');
            }
        } else {
            if(!isset($vo['auth'])) $vo['auth'] = '0';
            $this->member = Db::name("LcUserMember")->order('id desc')->select();

        }
    }

    /**
     * 添加用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function add()
    {
        $this->applyCsrfToken();
        $this->_form($this->table, 'form');
    }

    /**
     * 编辑用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function edit()
    {
        $this->applyCsrfToken();

        $uid = $this->request->param('id');

        $this->bankinfo = Db::name("LcCard")->where("user_id = {$uid}")->order('id desc')->find();

        $this->_form($this->table, 'form');
    }
    
    /**
     * 审核通过
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function statusup()
    {
        $this->applyCsrfToken();
        $uid = $this->request->param('id');
        $res = Db::name("LcCard")->where("user_id = {$uid}")->update(['status'=>1]);
        return json(['code'=>1,'info'=>'审核通过','data'=>'']);
    }
    
    /**
     * 拒绝通过
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function statusdown()
    {
        $this->applyCsrfToken();
        $uid = $this->request->param('id');
        $res = Db::name("LcCard")->where("user_id = {$uid}")->update(['status'=>2]);
        return json(['code'=>1,'info'=>'拒绝通过','data'=>'']);
    }

     /**
     * 充值用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function recharge()
    {
        $this->applyCsrfToken();

        $uid = $this->request->param('id');
        $info = Db::name("LcUser")->where("id = {$uid}")->find();
        if ($this->request->isPost()) {
            $param = $this->request->param();
            $uid = $param['id'];
            $user_info = Db::name("LcUser")->where("id = {$uid}")->field('money')->find();
            $user_data['money'] = $user_info['money'] + $param['recharge_money'] + $param['send_money'];
            Db::name("LcUser")->where("id = {$uid}")->update($user_data);
            model('akszadmin/Users')->addFinance($uid,abs($param['recharge_money']),1,'系统操作');
            if( $param['send_money'] > 0)
            {
                $log['send'] = 1;
                $log['send_money'] = $param['send_money'];
            }
            $log['uid'] = $uid;
            $log['type'] = '银行转账';
            $log['money'] = $param['recharge_money'];
            $log['status'] = 1;
            $log['orderid'] = '银行转账'.date('Ymd').time();
            
            $log['reason'] = '后台银行转账';
            $log['time'] = date('Y-m-d H:i:s');
            $log['time2'] = date('Y-m-d H:i:s');
            Db::name("LcRecharge")->insert($log);
            $this->success(lang('提交成功'));
        }
        $this->assign('vo', $info);
        $this->fetch();
    }
    

    /**
     * 禁用用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid()
    {
        $this->applyCsrfToken();
        $this->_save($this->table, ['clock' => '0']);
    }

    /**
     * 启用用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume()
    {
        $this->applyCsrfToken();
        $this->_save($this->table, ['clock' => '1']);
    }
    
    public function setrobot(){
    	$this->applyCsrfToken();
        $this->_save($this->table, ['robot' => $_POST['clock']]);
    }

    /**
     * 删除用户
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function remove()
    {
        $this->applyCsrfToken();
        $id = $this->request->param('id');
        $res = Db::name("LcCard")->where("user_id = {$id}")->delete();
        return json(['code'=>1,'info'=>'删除成功','data'=>'']);
    }
}
