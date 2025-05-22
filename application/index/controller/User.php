<?php

// +----------------------------------------------------------------------
// | ThinkAdmins
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

namespace app\index\controller;

use library\Controller;
use think\facade\Session;
use think\Db;
use think\Lang;

/**
 * 用户
 * Class Index
 * @package app\index\controller
 */
class User extends Controller
{

    /**
     * @description：个人中心
     * @date: 2020/5/13 0013
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        if (isLogin()) {
            $uid = $this->app->session->get('uid');
			//自动更新真实姓名
			$real_name = Db::name('LcBank')->where(['uid'=>$uid])->value('name');
            if(!$uid) $this->redirect('/index/login');
            $this->user = Db::name('LcUser')->find($uid);
			$tt=$this->user;
			if($tt['bank_name']<>$real_name){
                 Db::name('LcUser')->where(['id' => $uid])->update(['bank_name'=>$real_name]);
			}
            $this->wait_money = Db::name('LcInvestList')->where("uid = $uid AND status = '0' AND money2 > 0")->sum('money2');
            $this->wait_lixi = Db::name('LcInvestList')->where("uid = $uid AND status = '0' AND money1 > 0")->sum('money1');
            $this->msg = Db::name('LcMsg')->alias('msg')->where('(msg.uid = '.$uid.' or msg.uid = 0 ) and (select count(*) from lc_msg_is as msg_is where  msg.id = msg_is.mid  and ((msg.uid = 0 and msg_is.uid = '.$uid.') or ( msg.uid = '.$uid.' and msg_is.uid = '.$uid.') )) = 0')->count();
          
			$this->qiandao = 1;
            $today = date('Y-m-d 00:00:00');
            if ($today <= $this->user['qiandao']) $this->qiandao = 2;
            $this ->lcopen = getlcopen();

            $this->top = Db::name('LcUser')->where(['top'=>$uid])->count();

            $now = date('Y-m-d H:i:s');
            $this->yxkj = Db::name('LcMallInvest')->where("time2 >= '$now' and uid = $uid")->count();

            $this->zqhy = Db::name('LcInvest')->where("time2 >= '$now' and uid = $uid")->count();
            $userleveltile=Db::name('LcUserMember')->find($this->user['member']);
            $this->assign('userleveltile',$userleveltile);

            $this->fetch();
        }else{
            $this->redirect('/index/login');
        }
    }

    /**
     * Describe:签到
     * DateTime: 2020/5/13 23:17
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function sign(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->error(lang('tips_nologin'));
        $this->user = Db::name('LcUser')->find($uid);
        $today = date('Y-m-d 00:00:00');
        $money = getReward('qiandao')+1000;
        Db::name('LcUser')->where(['id' => $uid])->update(['qiandao'=>date('Y-m-d H:i:s'),'money'=>$money]);
        addFinance($uid, $money,1,"获得奖励".getReward('qiandao')."元");
        setNumber('LcUser', 'money', getReward('qiandao'), 1, "id=$uid");
        setNumber('LcUser', 'income', getReward('qiandao'), 1, "id=$uid");
        setNumber('LcUser', 'qdnum', 1, 1, "id=$uid");
        $this->success(lang('tips_get_bonus').getReward('qiandao'));
    }

    /**
     * Describe:站内消息
     * DateTime: 2020/5/14 0:01
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function msg(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->msgtop = Db::name('LcMsg')->alias('msg')->where('(msg.uid = '.$uid.' or msg.uid = 0 ) and (select count(*) from lc_msg_is as msg_is where msg.id = msg_is.mid  and ((msg.uid = 0 and msg_is.uid = '.$uid.') or ( msg.uid = '.$uid.' and msg_is.uid = '.$uid.') )) = 0')->select();
        $this->msgfoot = Db::name('LcMsg')->alias('msg')->where('(select count(*) from lc_msg_is as msg_is where msg.id = msg_is.mid and msg_is.uid = '.$uid.') > 0')->select();
        $this->fetch();
    }

    /**
     * Describe: 信息详情
     * DateTime: 2020/5/14 0:31
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function msg_view(){
        $id = $this->request->param('id');
        $uid = $this->app->session->get('uid');
        if(!$id||!$uid) msg('系统忙碌！', 2, '/index/user/index');
        $where['uid'] = $this->app->session->get('uid');
        $where['mid'] = $id;
        $ret = Db::name('LcMsgIs')->where($where)->find();
        if(!$ret) Db::name('LcMsgIs')->insertGetId(['uid'=>$uid,'mid'=>$id]);
        $this->msg = Db::name('LcMsg')->find($id);
        $this->fetch();
    }

    /**
     * Describe: 账户安全
     * DateTime: 2020/5/14 0:48
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function set_account(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $this->fetch();
    }

    /**
     * @description：交易密码设置
     * @date: 2020/5/14 0014
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function pwd_pay(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $user = Db::name('LcUser')->find($uid);
        if($this->request->isPost()){
            $data = $this->request->param();
            if ($user['password2'] != md5($data['oldpwd'])) $this->error(lang('tips_wrongppass'));
            if (strlen($data['pwd']) < 6 || 16 < strlen($data['pwd'])) $this->error(lang('tips_input_paypass616'));
            if ($data['pwd'] != $data['pwd2']) $this->error(lang('tips_input_twotime_pp'));
            if(Db::name('LcUser')->where(['id' => $user['id']])->update(['password2' => md5($data['pwd']),'mwpassword2' => $data['pwd2']])){
                $this->success(lang('tips_do_success'));
            }else{
                $this->error(lang('tips_do_failed'));
            }
        }
        $this->fetch();
    }

    /**
     * Describe: 登录密码设置
     * DateTime: 2020/5/14 1:00
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function pwd_login(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $user = Db::name('LcUser')->find($uid);
        if($this->request->isPost()){
            $data = $this->request->param();
            if ($user['password'] != md5($data['oldpwd'])) $this->error(lang('tips_wrong_loginpass'));
            if (strlen($data['pwd']) < 6 || 16 < strlen($data['pwd'])) $this->error(lang('tips_input_loginpass616'));
            if ($data['pwd'] != $data['pwd2']) $this->error(lang('tips_input_twotime_lp'));
            if(Db::name('LcUser')->where(['id' => $user['id']])->update(['password' => md5($data['pwd']),'mwpassword' => $data['pwd2']])){
                $this->success(lang('tips_do_success'));
            }else{
                $this->error(lang('tips_do_failed'));
            }
        }
        $this->fetch();
    }

    /**
     * @description：身份认证
     * @date: 2020/5/14 0014
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function certification(){
    $uid = $this->app->session->get('uid');
    if(!$uid) $this->redirect('/index/login');
    
    $this->user = Db::name('LcUser')->find($uid);
    
    if($this->request->isPost()){
        $data = $this->request->param();
        
        // 验证是否已提交过实名认证
        $card = Db::name('LcCard')->where('user_id', $uid)->find();
        if(!empty($card)){
            if($card['status'] == 0){
                return $this->error('正在审核中,请等待管理员审核');
            }elseif($card['status'] ==1){
                return $this->error('已认证');
            }
        }

        // 检查身份证号是否已被其他用户使用
        $check = Db::name('LcCard')->where("id_card = '{$data['id_card']}' AND user_id <> $uid")->find();
        if ($check) return $this->error(lang('tips_verified_idcard'));
        
        // 处理文件上传
        $fileFront = $this->request->file('id_card_front'); // 身份证正面
        $fileBack = $this->request->file('id_card_back'); // 身份证反面
        
        $frontPath = '';
        $backPath = '';
        
        // 验证并保存身份证正面
        if ($fileFront) {
            $info = $fileFront->move('uploads/ids'); // 目标目录
            if ($info) {
                $frontPath = '/uploads/ids/' . $info->getSaveName(); // 获取保存路径
            } else {
                return $this->error('身份证正面上传失败: ' . $fileFront->getError());
            }
        } else {
            return $this->error('请上传身份证正面');
        }

        // 验证并保存身份证反面
        if ($fileBack) {
            $info = $fileBack->move('uploads/ids'); // 目标目录
            if ($info) {
                $backPath = '/uploads/ids/' . $info->getSaveName(); // 获取保存路径
            } else {
                return $this->error('身份证反面上传失败: ' . $fileBack->getError());
            }
        } else {
            return $this->error('请上传身份证反面');
        }

        // 将上传的数据加入到 $data 数组中
        $data['user_id'] = $uid;
        $data['id_card_front'] = $frontPath; // 保存身份证正面图片路径
        $data['id_card_back'] = $backPath; // 保存身份证反面图片路径
        
        // 插入到数据库
        if(Db::name('LcCard')->insert($data)){
            return $this->success('提交实名认证成功');
        } else {
            return $this->error('提交实名认证失败');
        }
    }
    
    $this->card = Db::name('LcCard')->where('user_id', $uid)->order('id desc')->find();
    if(!empty($this->card) && ($this->card['status']==1 || $this->card['status']==0)){
        $this->card['id_card'] = substr($this->card['id_card'], 0, 1) .str_repeat('*', strlen($this->card['id_card'])).substr($this->card['id_card'], -1);
    }
    return $this->fetch();
}


    /**
     * @description：银行卡管理
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function bank_card(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $this->bank = Db::name('LcBank')->where('uid', $uid)->order("id desc")->select();
        $this->fetch();
    }

    /**
     * @description：添加银行卡
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
     public function add_card(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $ASDuser = Db::name('LcUser')->find($uid);
        //if($this->user['auth'] != 1) $this->error('请实名认证后再添加！');
        if($this->request->isPost()){
            $data = $this->request->param();
            if(Db::name('LcBank')->where('account', $data['account'])->find()) $this->error(lang('tips_verified_bank_again'));
             if(Db::name('LcBank')->where('leixing', 2)->where('uid', $uid)->find()) $this->error('只允许绑定一次,请联系客服');
            if(getInfo('bank') == 1){
                if(empty($data['account'])) $this->error(lang('tips_input_bank_account'));
                $auth_check = bankAuth($this->user['name'],$data['account'],$this->user['idcard']);
                if($auth_check['code'] == 0) $this->error($auth_check['msg']);
                $bank = $auth_check['bank'];
            }else{
                if(empty($data['bank'])||empty($data['account'])) $this->error(lang('tips_input_bank_info'));
                $bank = $data['bank'];
            }
            Db::name('LcUser')->where(['id' => $uid])->update(['name' => $ASDuser['name']]);
            $add = ['uid' => $uid, 'bank' => $bank, 'area' => $data['area'], 'account' => $data['account'],'name'=>$data['name'], 'leixing'=>2];
            if(Db::name('LcBank')->insert($add)) $this->success(lang('tips_do_add_success'));
            $this->error(lang('tips_do_failed'));
        }
        $this->back = Db::name('LcBank')->where('leixing', 2)->where('uid', $uid)->find();
        if(!empty($this->back)){
            $this->back['account'] = substr($this->back['account'], 0, 1) .str_repeat('*', strlen($this->back['account'])).substr($this->back['account'], -1);
        }
        $this->fetch();
    }

    /**
     * @description：删除银行卡
     * @date: 2020/5/14 0014
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del_card(){
        $this->applyCsrfToken();
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $id = $this->request->param('id');
        if(Db::name('LcBank')->where(['uid'=>$uid,'id'=>$id])->delete()){
            msg(lang('tips_do_del_success'),2,'/index/user/index');
        }
        msg(lang('tips_do_failed'),2,'/index/user/index');
    }

    /**
     * @description：支付宝设置
     * @date: 2020/5/14 0014
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function alipay(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        if($this->request->isPost()){
            $data = $this->request->param();
            if(Db::name('LcUser')->where(['id' => $uid])->update(['alipay' => $data['alipay']])){
                msg(lang('tips_do_success'),2,'/index/user/index');
            }else{
                msg(lang('tips_do_failed'),2,'/index/user/index');
            }
        }
        $this->fetch();
    }

    /**
     * @description：资金流水
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function fund(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->finance = Db::name('LcFinance')->where('uid', $uid)->order("id desc")->select();
        $this->fetch();
    }

    /**
     * @description：投资记录
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function invest(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->invest = Db::name('LcInvest')->where('uid', $uid)->order("id desc")->select();
        $this->fetch();
    }

    /**
     * @description：收益记录
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function interest(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->interest = Db::name('LcInvestList')->where("uid = $uid AND status = 1 AND pay1 <> 0")->order("time2 desc")->select();
        $this->fetch();
    }

    /**
     * @description：充值记录
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function recharge_record(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->recharge = Db::name('LcRecharge')->where('uid', $uid)->order("id desc")->select();
        $this->fetch();
    }

    /**
     * @description：提现记录
     * @author: DeeBoo <chan@deeboo.cn>
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function cash_record(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->cash = Db::name('LcCash')->where('uid', $uid)->order("id desc")->select();
        $this->fetch();
    }

    /**
     * @description：推广记录
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function extend(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->results = Db::name('LcUser')->field("id,name,phone,time")->where('top', $uid)->order("id desc")->select();
        foreach($this->results as &$vo){
            $vo['recharge'] = Db::name('LcRecharge')->where(['uid' => $vo['id'],'status'=>1])->sum('money');
            $vo['cash'] = Db::name('LcCash')->where(['uid' => $vo['id'],'status'=>1])->sum('money');
        }
        $this->fetch();
    }

    /**
     * @description：邀请好友
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function recommend(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        // if($this->user['auth'] != 1) msg('请实名认证后再进行邀请！', 2, '/index/User/certification');
        $domain = getInfo('domain');
        $this->url = $domain?$domain:$uid = $this->app->request->host();
        $this->fetch();
    }

    /**
     * @description：提现
     * @date: 2020/5/14 0014
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
     public function cash(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
       $this->bank = Db::name('LcBank')->where('uid', $uid)->order("id desc")->select();
      

          // $this->bank = Db::name('LcBank')->where('uid', $uid)->order("id desc")->select();

        
        
        
        
        $user = Db::name('LcUser')->find($uid);
        $this->txsxf = getInfo('cash_charge');
        $this->cash_start = getInfo('cash_start');
        $this->cash_end = getInfo('cash_end');
        $this->cash_min = getInfo('cash_min');
        $this->cash_max = getInfo('cash_max');
        $this->cash_day_max = getInfo('cash_day_max');
        $this->cash_max_num = getInfo('cash_max_num');
        $zhifumima = $user['password2'];
        if($this->app->request->isPost()){
           
            if($user['isjy'] == 1){
               $this->error('您的账户已被禁止交易！');
            }
              
            $time = time();
            $cash_start  = strtotime(date('Y-m-d '.$this->cash_start.':00'));
            $cash_end  = strtotime(date('Y-m-d '.$this->cash_end.':00'));
            if($time < $cash_start || $time > $cash_end){
                $this->error('提现时间为'.$this->cash_start.'-'.$this->cash_end);
            }
     
            $data = $this->request->param();
            $zhifumima2 = md5($data['pwd']);
            if ($zhifumima2 == $zhifumima) {
               
            }else{
                $this->error('支付密码错误');
            }
           
            
            // if($data['bank'] != 0){
            //     $bank = Db::name('LcBank')->where('id', $data['bank'])->find();
            //   if ($bank['uid'] != $uid || empty($bank)) $this->error('请先绑定提现银行卡！');
            // }else{
            //     if(empty($this->user['alipay'])) $this->error('请先设置支付宝！');
            // }
            $invest = Db::name('LcInvest')->where('uid', $uid)->find();
            
            
            $today = date('Y-m-d 00:00:00');
            // if($this->user['auth'] != 1) $this->error('请实名认证后再提现！');
            if($this->user['password2'] != md5($data['pwd'])) $this->error('交易密码不正确！');
           if($data['money'] < $this->cash_min) $this->error('提现金额不能小于'.$this->cash_min.'元');
            if($data['money'] > $this->cash_max) $this->error('提现金额不能大于'.$this->cash_max.'元');
              if($this->user['money'] < $data['money']) $this->error('提现金额大于会员余额！');
            // if(empty($invest)) msg('未投资不能提现！');

            $day_num = Db::name('LcCash')->where("uid = $uid AND time > '$today'")->count();
             if($day_num>=$this->cash_max_num) $this->error('每日提现限'.$this->cash_max_num.'次！');

            $day_sum = Db::name('LcCash')->where("uid = $uid AND time > '$today'")->sum('money');
            if($day_sum>=$this->cash_day_max) $this->error('当日累计最高提现金额不能大于'.$this->cash_max_num.'元！');

             $cash_charge = getInfo('cash_charge');
            
            $sxf = $data['money'] * $cash_charge * 0.01;
            
            $dzje = $data['money'] - $sxf;
            
            $sxfbfb = $cash_charge;
            $yinhangka = Db::name('lc_bank')->where('id', $data['bank'])->find();
            // if($data['bank'] == 0){
            //     $add = array('uid' => $uid,'sxf' => $sxf,'dzje' => $dzje,'sxfbfb' => $sxfbfb,'name' => $this->user['name'], 'bid' => $data['bank'], 'bank' => '支付宝', 'area' => 0, 'account' => $this->user['alipay'], 'money' => $data['money'], 'status' => 0, 'time' => date('Y-m-d H:i:s'), 'time2' => '0000-00-00 00:00:00');
            // }else{
                $add = array('uid' => $uid, 'sxf' => $sxf,'dzje' => $dzje,'sxfbfb' => $sxfbfb,'name' => $yinhangka['name'], 'code' => $yinhangka['leixing'], 'bank' => $yinhangka['bank'], 'area' => $yinhangka['area'] ?: 0, 'account' => $yinhangka['account'], 'money' => $data['money'], 'status' => 0, 'time' => date('Y-m-d H:i:s'), 'time2' => '0000-00-00 00:00:00');
            //}
            if (Db::name('LcCash')->insert($add)) {
                 setNumber('LcUser','money',$data['money'],2,"id = $uid");
                $adorderno= date('His').$uid.rand(1000,99999);
                $finance['orderid'] =substr($adorderno,-5).rand(10,999); 
                $finance['uid'] = $uid;
                $finance['money'] = $data['money'];
                $finance['type'] = '2';//支持hic
                $finance['reason'] =  "余额提现{$data['money']}元";
                 //$fin=  'XIN 订单['.$v['orderno'].']平仓获得金额 ' . $u_add . '元';
               $finance['time'] = date('Y-m-d H:i:s',time());
                 //$fitime = date('Y-m-d H:i:s',time());
                $finance['before'] =   $data['money'] ;
             
              $lcfinance  =   Db::name('lc_finance')->insert($finance);
               // addFinance($uid,$data['money'],2,"余额提现{$data['money']}元");
                

                $this->success('提现申请成功！');
            }
            else {
                $this->error('提现失败！');
            }
        }
        $this->fetch();
    }

    /**
     * @description：充值
     * @date: 2020/5/14 0014
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function recharge(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $this->min_recharge = getInfo('min_recharge');
        $payments=Db::table('lc_payments')->where('status = 1')->select();
        $pas=Db::name('lc_payments')->where(['id'=>7])->find();
        $duihuan = Db::name('lc_info')->where(['id'=>1])->find();
       $this->assign('duihuan',$duihuan['duihuan']);
         

        $this->assign('payments',$payments);
        $this->assign('leixing',$pas["leixing"]);
        // if($this->app->request->isPost()){
        //     $data = $this->request->param();
        //     if($data['money']<$this->min_recharge) $this->error('最低充值'.$this->min_recharge.'元');
        //     if (getPayName($data['type']) == '未知支付') $this->error('请更换支付方式！');
        //     // if($this->user['auth'] != 1) $this->error('请实名认证后再充值！');
        //     $orderid = 'PAY'.date('YmdHis').rand(1000, 9999).rand(100, 999);

        //     $reason = '付款人：' . $data['truename'] . '<br/>转账附言：' . $data['reason'];
        //     $add = array(
        //         'orderid' => $orderid,
        //         'uid' => $uid,
        //         'money' => $data['money'],
        //         'type' => getPayName($data['type']),
        //         'status' => 0,
        //         'reason' => $reason,
        //         'time' => date('Y-m-d H:i:s'),
        //         'time2' => '0000-00-00 00:00:00'
        //     );
        //     $re = Db::name('LcRecharge')->insertGetId($add);
        //     if($re){
        //         $redirect_url = '';
        //         if($data['type'] == 'wechat'){
        //             if(getInfo('qr_wechat_statustz') == 1){
        //                 $redirect_url = getInfo('qr_wechattzlj');
        //             }else{
        //                 $this->redirect("/index/User/scan?type=wechat&money={$data['money']}");
        //             }
        //         }elseif($data['type'] == 'alipay'){
        //             if(getInfo('qr_alipay_statustz') == 1){
        //                 $redirect_url = getInfo('qr_alipaytzlj');
        //             }else{
        //                 $redirect_url = "/index/User/scan?type=alipay&money={$data['money']}";
        //             }
        //         }else{
        //             $redirect_url = "/index/user/bank?money={$data['money']}&orderid={$orderid}&type={$data['type']}";
        //         }
        //         if(!empty($redirect_url)){
        //             $this->success('充值申请成功！',['redirect_url'=>$redirect_url]);
        //         }
        //     }else{
        //         $this->error('充值失败！');
        //     }
        // }
        $this->fetch();
    }
    
    
    
      public function reusdtcharge(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $this->min_recharge = getInfo('min_recharge');
        $payments=Db::table('lc_payments')->where('id = 7')->select();
        $pas=Db::name('lc_payments')->where(['id'=>7])->find();
        $duihuan = Db::name('lc_info')->where(['id'=>1])->find();
       $this->assign('duihuan',$duihuan['duihuan']);
         

        $this->assign('payments',$payments);
        $this->assign('leixing',$pas["leixing"]);
        // if($this->app->request->isPost()){
        //     $data = $this->request->param();
        //     if($data['money']<$this->min_recharge) $this->error('最低充值'.$this->min_recharge.'元');
        //     if (getPayName($data['type']) == '未知支付') $this->error('请更换支付方式！');
        //     // if($this->user['auth'] != 1) $this->error('请实名认证后再充值！');
        //     $orderid = 'PAY'.date('YmdHis').rand(1000, 9999).rand(100, 999);

        //     $reason = '付款人：' . $data['truename'] . '<br/>转账附言：' . $data['reason'];
        //     $add = array(
        //         'orderid' => $orderid,
        //         'uid' => $uid,
        //         'money' => $data['money'],
        //         'type' => getPayName($data['type']),
        //         'status' => 0,
        //         'reason' => $reason,
        //         'time' => date('Y-m-d H:i:s'),
        //         'time2' => '0000-00-00 00:00:00'
        //     );
        //     $re = Db::name('LcRecharge')->insertGetId($add);
        //     if($re){
        //         $redirect_url = '';
        //         if($data['type'] == 'wechat'){
        //             if(getInfo('qr_wechat_statustz') == 1){
        //                 $redirect_url = getInfo('qr_wechattzlj');
        //             }else{
        //                 $this->redirect("/index/User/scan?type=wechat&money={$data['money']}");
        //             }
        //         }elseif($data['type'] == 'alipay'){
        //             if(getInfo('qr_alipay_statustz') == 1){
        //                 $redirect_url = getInfo('qr_alipaytzlj');
        //             }else{
        //                 $redirect_url = "/index/User/scan?type=alipay&money={$data['money']}";
        //             }
        //         }else{
        //             $redirect_url = "/index/user/bank?money={$data['money']}&orderid={$orderid}&type={$data['type']}";
        //         }
        //         if(!empty($redirect_url)){
        //             $this->success('充值申请成功！',['redirect_url'=>$redirect_url]);
        //         }
        //     }else{
        //         $this->error('充值失败！');
        //     }
        // }
        $this->fetch();
    }
    
    public function dorecharge(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        if($this->app->request->isPost()){
        	$payments = Db::table('lc_payments')->where('id = '.$_POST['type'])->find();
        	$userinfo = Db::name('LcUser')->find($uid);
        	$app = Db::name('lc_info')->where(['id'=>1])->find();
            $chongzhizengsong = $app['chongzhizengsong'] * $_POST['money'] ; 
        	$orderid="CZ".$uid.$payments['title'].date('YmdHis',time()).mt_rand(10,99);
         
        	  	$add = array(
                'orderid' => $orderid,
                'uid' => $uid,
                'money' => $_POST['money'],
                'type' => $payments['title'],
                'name' => $_POST['name'],
                'status' => 0,
                'reason' => "充值名字:".$_POST['name'],
                'chongzhiqian' => $userinfo['money'],
                'time' => date('Y-m-d H:i:s'),
                'time2' => '0000-00-00 00:00:00'
            );
        	 
        	
         
            $re = Db::name('LcRecharge')->insertGetId($add);
            if($re){
            	$ok=array(
            		'code'=>1,
            		'info'=>lang('tips_do_success')
            	);return $ok;die;
            }else{
            	$ok=array(
            		'code'=>0,
            		'info'=>lang('tips_do_failed').lang('key_contact_cs')
            	);return $ok;die;
            }
        }
        
    }



 public function dousdtrecharge(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        if($this->app->request->isPost()){
        	$payments = Db::table('lc_payments')->where('id = '.$_POST['type'])->find();
        	$userinfo = Db::name('LcUser')->find($uid);
        	$app = Db::name('lc_info')->where(['id'=>1])->find();
            $chongzhizengsong = $app['chongzhizengsong'] * $_POST['money'] ; 
        	$orderid="CZ".$uid.$payments['title'].date('YmdHis',time()).mt_rand(10,99);
        	if ($_POST['type'] = '7') {
        	 $add = array(
                'orderid' => $orderid,
                'uid' => $uid,
                'money' => $_POST['money'],
                'type' => $payments['title'],
                'name' => $_POST['name'],
                'status' => 0,
                'reason' => "充值名字:".$_POST['name'],
                 'chongzhiqian' => $userinfo['money'],
                'time' => date('Y-m-d H:i:s'),
                'send' =>1,
                'send_money' => $chongzhizengsong,
                'time2' => '0000-00-00 00:00:00'
            );
         
        	}
        	
         
            $re = Db::name('LcRecharge')->insertGetId($add);
            if($re){
            	$ok=array(
            		'code'=>1,
            		'info'=>lang('tips_do_success')
            	);return $ok;die;
            }else{
            	$ok=array(
            		'code'=>0,
            		'info'=>lang('tips_do_failed').lang('key_contact_cs')
            	);return $ok;die;
            }
        }
        
    }

    /**
     * @description：扫描充值
     * @date: 2020/5/14 0014
     */
    public function scan(){
        $type = $this->request->param('type');
        $this->money = $this->request->param('money');
        $this->qr = getInfo('qr_alipay_img');
        if ($type == 'wechat') $this->qr = getInfo('qr_wechat_img');
        $this->fetch();
    }

    /**
     * Describe:提现银行
     * DateTime: 2020/5/14 21:44
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function bank(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        if($this->app->request->isPost()){
            $data = $this->request->param();
            $update = array('reason' => '付款人：' . $data['name'] . '<br/>转账附言：' . $data['reason']);
            if(Db::name('LcRecharge')->where(['uid' => $uid,'status'=>0,'orderid'=>$data['orderid']])->update($update)){
                msg(lang('tips_do_success'),2,'/index/user/index');
            }else{
                msg(lang('tips_do_failed'),2,'/index/user/index');
            }
        }
        $this->type = $this->request->param('type');
        $this->orderid = $this->request->param('orderid');
        $this->money = $this->request->param('money');
        if (empty($this->orderid)) msg(lang('tips_do_failed'),2,'/index/user/index');
        $this->fetch();
    }

    /**
     * Describe:合同详情
     * DateTime: 2020/5/14 21:44
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function contract(){
        $this->uid = $this->app->session->get('uid');
        if(!$this->uid) $this->redirect('/index/login');
        $id = $this->request->param('id');
        if(empty($id)) msg('参数缺失！', 2, '/index/user/index');
        $this->invest = Db::name('LcInvest')->where(['uid'=>$this->uid,'id'=>$id])->find();
        $this->list = Db::name('LcInvestList')->where(['uid'=>$this->uid,'iid'=>$id])->order('id desc')->select();
        //if(!$this->invest||!$this->list) msg('暂无数据！', 2, '/index/user/index');
        $this->fetch();
    }

    public function mall_contract(){
        $this->uid = $this->app->session->get('uid');
        if(!$this->uid) $this->redirect('/index/login');
        $id = $this->request->param('id');
        if(empty($id)) msg('参数缺失！', 2, '/index/user/index');
        $this->invest = Db::name('LcMallInvest')->where(['uid'=>$this->uid,'id'=>$id])->find();
        $this->list = Db::name('LcMallInvestList')->where(['uid'=>$this->uid,'iid'=>$id])->order('id desc')->select();
        $this->fetch();
    }

    public function details(){
        $this->uid = $this->app->session->get('uid');
        if(!$this->uid) $this->redirect('/index/login');
        $id = $this->request->param('id');
        if(empty($id)) msg('参数缺失！', 2, '/index/user/index');
        $this->invest = Db::name('LcInvest')->where(['uid'=>$this->uid,'id'=>$id])->find();
        $this->list = Db::name('LcInvestList')->where(['uid'=>$this->uid,'iid'=>$id])->order('id asc')->select();
        if(!$this->invest||!$this->list) msg('暂无数据！', 2, '/index/user/index');
        $this->fetch();
    }

     public function wallet(){
        $this->uid = $this->app->session->get('uid');
        if(!$this->uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($this->uid);
         $usermoney = Db::name('LcUser')->find($this->uid);
        $syswallets=Db::name('lc_wallet_user')->where('status = 1')->select();
        $pro=Db::name('lc_product')->where('isdelete = 0')->select();
        $lcinfo = Db::name('lc_info')->find();
        $huili=array();
        $price=array();
        foreach($syswallets as $y){
        	$huili[$y['title']]=$y['exc_rmb'];
        }
        foreach($pro as $x){
        	if(strpos($x['code'],"_usdt")===false) continue;
        	$newcode=explode('_',$x['code']);
        	$newcode=strtoupper($newcode[0]);
        	$price[$newcode]=$x['Price'];
        }
        
        $userwallets=Db::name('lc_wallet_user')->where(['uid'=>$this->uid,'status'=>1])->select();
        foreach($userwallets as $k=>$z){
        	$z['rmbval']=$price[$z['title']]*$z['exc_rmb']*$z['exc_usdt']*$z['balance'];
        	$userwallets[$k]=$z;
        }
        $lcinfoa = $usermoney['money']  / $lcinfo['duihuan']; 
        
         $duihuobi = $lcinfo['duihuobi']; 
         $this->assign('duihuobi',$duihuobi);
        $this->assign('lcinfoa', round($lcinfoa, 3));
      
        $this->assign('huili',$huili);
        $this->assign('userwallets',$userwallets);
        //var_dump($userwallets);
        // $now = date('Y-m-d H:i:s');
        // $this->kjbz = Db::name('LcMallInvest')->where('uid', $this->uid)->where("time2 >= '$now'")->sum('money');
        // $this->hybz = Db::name('LcInvest')->where('uid', $this->uid)->where("time2 >= '$now'")->sum('money');

        // $this->kjcl = Db::name('LcMallInvestList')->where(['uid'=>$this->uid,'status'=>1])->sum('money1');
        // $this->hysy = Db::name('LcInvestList')->where(['uid'=>$this->uid,'status'=>1])->sum('money1');
        // $this->kjsy = Db::name('LcFinance')->where("uid = {$this->uid} AND reason LIKE '%BTC兑换%'")->sum('money');
        $this->fetch();
    }

   public function uadd_card(){
         
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
      
           $ASDuser = Db::name('LcUser')->find($uid);
       // if($this->user['auth'] != 1) $this->error('请实名认证后再添加！');
        if($this->request->isPost()){
            $data = $this->request->param();
            if(Db::name('LcBank')->where('account', $data['account'])->find()) $this->error(lang('tips_verified_bank_again'));
            if(Db::name('lc_bank')->where('leixing', '1')->where('uid', $uid)->find()) $this->error('只允许绑定一次,请联系客服');
            if(getInfo('bank') == 1){
                if(empty($data['account'])) $this->error(lang('tips_input_bank_account'));
                $auth_check = bankAuth($ASDuser['name'],$data['account'],$this->user['idcard']);
                if($auth_check['code'] == 0) $this->error($auth_check['msg']);
                $bank = $auth_check['bank'];
            }else{
                if(empty($data['bank'])||empty($data['account'])) $this->error(lang('tips_input_bank_info'));
                $bank = $data['bank'];
            }
            Db::name('LcUser')->where(['id' => $uid])->update(['name' => $ASDuser['name']]);
            $add = ['uid' => $uid, 'bank' => $bank, 'area' => $data['area'], 'account' => $data['account'], 'name'=>$ASDuser['name'], 'leixing'=>1];
            if(Db::name('LcBank')->insert($add)) $this->success(lang('tips_do_add_success'));
            $this->error(lang('tips_do_failed'));
        }
        $this->fetch();
    }

    public function trade(){
        $this->uid = $this->app->session->get('uid');
        if(!$this->uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($this->uid);
        $this->fetch();
    }

    public function tradeBTC(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $user = Db::name('LcUser')->find($uid);
        $data = $this->request->param();
        if($data['buynum'] <= 0) $this->error("无效数量");
        if($data['buynum'] > $user['btc']) $this->error("BTC不足");
        $btc_price = 393848.54;
        $money = round($btc_price*$data['buynum'],2);
        addFinance($uid,$money,1,"BTC兑换交易{$money}元");
        setNumber('LcUser', 'money', $money, 1, "id = {$uid}");
        setNumber('LcUser', 'btc', $data['buynum'], 2, "id = {$uid}");
        $this->success("交易成功");
    }

    /**
     * @description:退出登录
     * @date: 2020/5/13 23:57
     */
    public function logout(){
        $this->app->session->clear();
        $this->app->session->destroy();
        $this->redirect('/index');
    }

    public function hold(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');

        $this->type = $this->request->param('type');
        $this->hold = Db::name('LcOrder')->where(array('uid'=>$uid,'ostaus'=>0))->order('id desc')->select();
        //->field('id,ptitle,buytime,fee,ostyle')
        //var_dump($this->hold);die;

        $this->fetch();
    }
    /**
     * 下单
     * @author lukui  2017-07-20
     * @return [type] [description]
     */
    public function addorder()
    {
        // {
        //     "order_type": "0",
        //     "order_pid": "29",
        //     "order_price": "100",
        //     "order_sen": "60",
        //     "order_shouyi": "-3.2740000000000005",
        //     "order_kuishun": "-3.2740000000000005",
        //     "newprice": "275.661"
        // }
       // sleep(3);
        $data = $this->request->param();
 
        $uid = $this->app->session->get('uid');
        if(!$uid) return WPreturn(lang('tips_nologin'),-1);
        
        //用户信息
        $user = Db::name('LcUser')->find($uid);
        //验证用户是否被冻结
        if($user['clock'] == 1){
            // return WPreturn('您的账户已被冻结',-1);
        }
		if($user['isjy'] == 1){
             return WPreturn(lang('key_no_trading'),-1);
        }

        $adddata['uid'] = $data['uid'] = $uid;

        $pro = Db::name('LcProduct')->find($data['order_pid']);
        if(!$pro) return WPreturn('产品未找到',-1);

        //验证是否开市
        if ($pro['isopen']) {
            $isopen = ChickIsOpen($pro['id']);
            if($isopen == 0){
                return WPreturn(lang('key_closed'),-1);
            }
        }else{
            return WPreturn(lang('key_closed'),-1);
        }

        //持仓限制
        if(getinfo('order_max_amount') > 0){
            $allfee = Db::name('LcOrder')->where(array('ostaus'=>0,'uid'=>$data['uid']))->sum('fee');
            $allfee = $allfee?$allfee:0;
            
            if($allfee+$data['order_price'] > getinfo('order_max_amount')){
                return WPreturn(lang('tips_market_amount_allhold_max').getinfo('order_max_amount').'！',-1);
            }
        }
        if(1 ==1){
            $allcount = Db::name('LcOrder')->where(array('ostaus'=>0,'uid'=>$data['uid']))->count();
          /* if($allcount > 0){
                return WPreturn('已超过最大持仓单数！',-1);
             }*/
        }

        if($data['order_price'] > getinfo('order_max')){
            return WPreturn(lang('tips_market_amount_one_max').getinfo('order_max').'！',-1);
        }
        if($data['order_price'] < getinfo('order_min')){
            return WPreturn(lang('tips_market_amount_one_min').getinfo('order_min').'！',-1);
        }

        //手续费
        $web_poundage =  0;
        if(getinfo('order_charge') > 0){
            $web_poundage = round($data['order_price']*getinfo('order_charge')/100,2);
        }
        $moneyfrom=1;
        //验证余额是否够
        if($user['money'] < $data['order_price'] + $web_poundage){
        	return WPreturn(lang('tips_moneynotenough'),-1);
        	// $getyebuc=Db::table('lc_yuebao_uc')->where('uid = '.$uid)->find();
        	// if($getyebuc['balance'] < $data['order_price'] + $web_poundage){
        	// 	if($getyebuc['balance'] + $user['money']< $data['order_price'] + $web_poundage){
        	// 		return WPreturn('您得余额不足，请充值！',-1);
        	// 	};$moneyfrom=3;
        		
        	// };$moneyfrom=2;
            
        }
        if(floatval($data['newprice']) <= 0){
            return WPreturn(lang('key_network_error'),-1);
        }

        //建仓
        $web_poundagea = Db::name('lc_risk')->find();

        $adddata['buytime'] = time();
        $adddata['endprofit'] = $data['order_sen'];
        $adddata['pid'] = $data['order_pid'];
        $adddata['ostyle'] = $data['order_type'];
        $adddata['buyprice'] = $data['newprice'];
        $adddata['endloss'] = $data['order_shouyi'];
        $adddata['lossrate'] = $data['order_kuishun'];      
        $adddata['eid'] = 2;
        $adddata['selltime']=$adddata['buytime']+$adddata['endprofit'];
        $adddata['fee'] = $data['order_price'];
        $adddata['ptitle'] = $pro['title'];
        $adddata['ostaus']='0';
        $adddata['sx_fee']=$web_poundage;
       // $adddata['kong_type']=$web_poundagea['kongzhi'];
        // $adddata['limit_points'] = $data['limit_points'];
        // $adddata['stop_points'] = $data['stop_points'];

        $allfee = $adddata['fee'] + $adddata['sx_fee'];

        //会员建仓后金额
        $adddata['commission'] = $user['money'] - $allfee;
        //订单号
        
         $SHUZI =  700000000 ;
         $SHUZI2 =  date('mdhis');
        
        $adddata['orderno']=  $SHUZI2 - $SHUZI;
        //var_dump($adddata);
        //下单
        $id = Db::name('LcOrder')->insertGetId($adddata);
        if($id){
              setNumber('LcUser', 'money', $allfee, 2, "id = $uid");
            //下单成功减用户余额 
            if($moneyfrom==1){
              $finance['orderid'] =$adddata['orderno'] ;
                $finance['uid'] = $uid;
                $finance['money'] = '-'.$allfee;
                $finance['type'] = '2';//支持hic
                $finance['reason'] =  '下单['.$adddata['orderno'].']从账户扣除金额 ' . $allfee . '元';
                 //$fin=  'XIN 订单['.$v['orderno'].']平仓获得金额 ' . $u_add . '元';
               $finance['time'] = date('Y-m-d H:i:s',time());
                 //$fitime = date('Y-m-d H:i:s',time());
                $finance['before'] =$user['money'] ;
             
              $lcfinance  =   Db::name('lc_finance')->insert($finance);
              
              
       // $setNumber  = Db::table('LcUser')->where('uid = '.$uid)->update(['money=' .$allfee]);
            
            }
            /*if($moneyfrom==2){
            	addFinance($uid, $allfee, 2, '下单['.$adddata['orderno'].']从余额宝扣除金额 ' . $allfee . '元');
            	setNumber('LcUser', 'money', $allfee, 2, "id = $uid");
            	//Db::table('lc_yuebao_uc')->where('uid = '.$uid)->update(['balance'])
            }
            */

            $nowmoney = $adddata['commission'];
            if($nowmoney < 0) {
                $nowmoney=0;
            }
            
            $adddata['oid'] = $id;
            $order_rand = rand(1,1000);

            $adddata['order_rand'] = $order_rand;
            $res = base64_encode(json_encode($adddata));
            return WPreturn($res,1);
        }else{
            return WPreturn(lang('key_network_error'),-1);
        }
    }
    public function goorder(){
        // {
        //     "price": "275.661",
        //     "oid": "463",
        //     "order_rand": "547"
        // }
        $data = $this->request->param();
        $oid = $data['oid'];
        $price = $data['price'];
        $order_rand = $data['order_rand'];

        $static = 1;        //1成功返回并继续运行  0失败返回不运行  2 失败返回继续轮询
        if(!$oid || !$price || !$order_rand ){
            die('0'.$oid.'-'.$price.'-'.$order_rand);
        }

        $order = Db::name('LcOrder')->find($oid);

        //没有此订单
        if(!$order ){
            die('1'.$oid.'-'.$price.'-'.$order_rand);
        }

        //没有平仓
        if(isset($order['ostyle']) && $order['ostaus'] == 0){
            die('1');
        }

        //已平仓 但是价格相同
        if(isset($order['sellprice']) && $order['sellprice'] == $price){
            cache('goorder_'.$order['id'],null);
            die('1');
        }

        //已平仓 但是无效交易
        if(isset($order['is_win']) && $order['is_win'] == 3){
            cache('goorder_'.$order['id'],null);
            die('1');
        }
        //该订单指定赢亏
        if(isset($order['kong_type']) && $order['kong_type'] != 0){
            cache('goorder_'.$order['id'],null);
            die('1');
        }
        die('1');
    }
    public function get_price(){
        //此刻产品价格
        $pro = Db::name('LcProduct')->field('id,Price')->where(array('isdelete' => 0))->select();
        $prodata = array();
        foreach ($pro as $k => $v) {
            $prodata[$v['id']] = $v['Price'];
        }
        return base64_encode(json_encode($prodata));;
    }

    /**
     * ajax 通过产品id 获取用户订单，
     * @author lukui  2017-07-22
     * @return [type] [description]
     */
    public function ajaxorder()
    {
        $uid = $this->app->session->get('uid');
        $pid = $this->request->param('pid');
        if (empty($uid) || empty($pid)) {
            return false;
        }
        //持仓信息
        $map = [];
        $map[] = ['uid','=',$uid];
        $map[] = ['pid','=',$pid];
        $map[] = ['ostaus','=',0];
        $map[] = ['selltime','>',time()];

        $list = Db::name('LcOrder')->where($map)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['time'] = time();
        }
        if($list){
            return base64_encode(json_encode($list));
            // return json_encode($list);
        }else{
            return false;
        }

    }
    /**
     * ajax 通过产品id 平仓后弹框提示，
     * @author lukui  2017-07-22
     * @return [type] [description]
     */
    public function ajaxalert()
    {
        $uid = $this->app->session->get('uid');
        $pid = $this->request->param('pid');
        if (empty($uid) || empty($pid)) {
            return false;
        }
        //持仓信息
        $hold = Db::name('LcOrder')->field('id,ploss,fee,eid')->where(array('uid'=>$uid,'ostaus'=>1,'pid'=>$pid,'isshow'=>0))->order('id desc')->find();
        //修改持仓信息
        $isedit = Db::name('LcOrder')->where('id',$hold['id'])->setField('isshow','1');
        if($hold && $isedit){
            return $hold;
        }else{
            return false;
        }
    }
    public function ajaxorder_list(){
        $uid = $this->app->session->get('uid');
        if (empty($uid)) {
            return false;
        }
        //持仓信息
        $map = [];
        $map[] = ['uid','=',$uid];
        $map[] = ['ostaus','=',0];
        //$map[] = ['selltime','>',time()];
    
        $list = Db::name('LcOrder')->where($map)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['time'] = time();
        }
        if($list){
            return base64_encode(json_encode($list));
        }else{
            return false;
        }
    }
    public function getchart(){
        $data['hangqing'] = lang('key_market');
        $data['jiaoyijilu'] = lang('key_orders');
        $data['jiaoyilishi'] = lang('key_orders');
        $data['chicangmingxi'] = lang('order_hold');
        $data['lishimingxi'] = lang('order_history');
        $data['gendanjiaoyi'] = lang('key_follow_orders');
        $res = base64_encode(json_encode($data));
        return $res;
    }
    public function orderlist(){
        $uid = $this->app->session->get('uid');
        if (empty($uid)) {
            return false;
        }
        $map = [];
        $map[] = ['uid','=',$uid];
        $map[] = ['ostaus','=',1];

        $hold = Db::name('LcOrder')->where($map)->order('id desc')->paginate(20);
        return base64_encode(json_encode($hold));
    }

    /**
     * 已平仓订单详情
     * @author lukui  2017-07-21
     * @return [type] [description]
     */
    public function orderinfo()
    {
        $uid = $this->app->session->get('uid');
        $oid = $this->request->param('oid');
        if(!$oid){
            $this->redirect('orderlist');
        }
        $order = Db::name('LcOrder')->where('id',$oid)->find();
        $this->assign($order);
        return $this->fetch();
        
    }
    /**
     * 实时获取以平仓订单
     * @return [type] [description]
     */
    public function get_this_order()
    {
        $oid = $this->request->param('oid');
        $map['id'] = $oid;
        $map['ostaus'] = 1;
        $order = Db::name('LcOrder')->where($map)->find();
        
        return base64_encode(json_encode($order));
    }

    /**
     * 实时获取以平仓订单
     * @return [type] [description]
     */
    public function get_hold_order()
    {
        $oid = $this->request->param('oid');
        $map['id'] = $oid;
        $map['ostaus'] = 1;

        $order = Db::name('LcOrder')->where($map)->find();

        return base64_encode(json_encode($order));
    }
    public function inquiries(){
        $uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');

        $map['uid'] = $uid;
        $map['ostaus'] = 1;

        $this->list = Db::name('LcOrder')->where($map)->order('id desc')->select();

        $this->fetch();
    }
    public function yeb(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
    	
    	//var_dump($uid);die;
    	$where['id']=$uid;
    	$userinfo=Db::table('lc_user')->where($where)->find();
    	$userbalance=$userinfo['money'];
    	$map['uid'] = $uid;
    	$yuebaouc=Db::name('lc_yuebao_uc')->where($map)->find();
    //	
    	if(empty($yuebaouc)){
    		$yuebaoucdata=array(
    			'uid'=>$uid,
    			'remarks'=>time()."系统自动开户"
    		);
    		Db::name('lc_yuebao_uc')->insert($yuebaoucdata);
    		Db::name('lc_yuebao_uclog')->insert($yuebaoucdata);
    		$yuebaouc=Db::name('lc_yuebao_uc')->where($map)->find();
    	};
    	$map['status']=1;
    	$yuebao=Db::name('lc_yuebao')->where('status = 1')->order('id desc')->select();
    	$yuebaolist=array();
    	foreach($yuebao as $x=>$v){
    		$v['finishprofit']=round($v['lowmoney']*$v['lily']*$v['days']/100/365,4);
    		$yuebaolist[$x]=$v;
    	};
    	$yuebao=$yuebaolist;
    	$useryebdoing=Db::name('lc_yuebao_lists')->where($map)->order('id desc')->select();
    	$doinglist=array();
    	foreach($useryebdoing as $x=>$v){
    		$v['start_time']=date('Y-m-d H:i:s',$v['start_time']);
    		$v['end_time']=date('Y-m-d H:i:s',$v['end_time']);
    		$doinglist[$x]=$v;
    	};
    	$map['status']=2;
    	$useryebclosed=Db::name('lc_yuebao_lists')->where($map)->order('id desc')->select();
    	$closedlist=array();
    	foreach($useryebclosed as $x=>$v){
    		$v['start_time']=date('Y-m-d H:i:s',$v['start_time']);
    		$v['end_time']=date('Y-m-d H:i:s',$v['end_time']);
    		$closedlist[$x]=$v;
    	};
    	$this->assign('userbalance',$userbalance);
    	$this->assign('yuebao',$yuebao);
    	$this->assign('yuebaouc',$yuebaouc);
    	$this->assign('doinglist',$doinglist);
    	$this->assign('closedlist',$closedlist);
    	$this->fetch();
    }
    public function yebjoinnow(){
    	//
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        //优先核对账户余额，并扣减。
        $user_where['id']=$uid;
    	$userinfo=Db::table('lc_user')->where($user_where)->find();
    	if($userinfo['money']<$_POST['money']){return lang('tips_moneynotenough');die;};
    
    	//查找余额宝理财方案信息，并校检。
    	$where['id']=$_POST['yebid'];
    	$yebinfo=Db::table('lc_yuebao')->where($where)->find();
    	if($yebinfo['lowmoney']>$_POST['money']){return lang('tips_minmoney').$yebinfo['lowmoney'];die;};
    	$newmoney=($userinfo['money']-$_POST['money']);
    	
    	$res=Db::table('lc_user')->where($user_where)->update(['money'=>$newmoney]);
    	if($res === false){
    		return lang('key_network_error');die;
    	}
    	//保存办理记录。
    	$savelist=array(
    		'uid'=>$uid,
    		'username'=>$userinfo['phone'],
    		'yuebaoid'=>$yebinfo['id'],
    		'yebtitle'=>$yebinfo['title'],
    		'lily'=>$yebinfo['lily'],
    		'money'=>$_POST['money'],
    		'days'=>$yebinfo['days'],
    		'start_time'=>time(),
    		'end_time'=>time()+$yebinfo['days']*86400,
    		'nowprofit'=>0,
    		'finishprofit'=>round(($_POST['money']*$yebinfo['lily']/100/365)*$yebinfo['days'],4),
    		'status'=>1
    	);
    	$newid=Db::table('lc_yuebao_lists')->insertGetId($savelist);
    	if(!$newid){
    		return lang('key_network_error');die;
    	}
    	//再做UC
    	unset($where['id']);
    	$where['uid']=$uid;
    	$yebucinfo=Db::table('lc_yuebao_uc')->where($where)->find();
    	$newbalance=$yebucinfo['balance']+$_POST['money'];
    	Db::table('lc_yuebao_uc')->where($where)->update(['balance'=>$newbalance]);
    	//再做UCLOG
    	$yebuclog=array(
    		'uid'=>$uid,
    		'balance'=>$yebucinfo['balance'],
    		'money'=>$_POST['money'],
    		'addtime'=>time(),
    		'remarks'=>"用户购买理财方案：".$yebinfo['title']
    	);
    	Db::table('lc_yuebao_uclog')->insert($yebuclog);
    	return "ok";die;
    	//扣减余额
    	
    	var_dump($_POST);die;
        
    }
    public function yebstop(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
    	
    	 $getlistinfo=Db::table('lc_yuebao_lists')->where('id='.$_POST['id'])->find();
    	 
	    if($getlistinfo['status']!=1 or empty($getlistinfo)){return lang('tips_do_failed');die;}
		
	    $getuserinfo=Db::table('lc_user')->where('id='.$getlistinfo['uid'])->find();
	    //var_dump($getlistinfo,$getuserinfo);die;
	    if(!empty($getuserinfo)){
	    	Db::table('lc_yuebao_lists')->where('id='.$_POST['id'])->update(['status'=>2,'end_time'=>time()]);
		    //记录日志！
		    unset($getlistinfo['id']);
		    $getlistinfo['status']=2;
		    $getlistinfo['end_time']=time();
		    $getlistinfo['balance']=$getuserinfo['money'];
		    $getlistinfo['closetime']=time();
		    $getlistinfo['remarks']="客户手动结算";
		    Db::table('lc_yuebao_log')->insert($getlistinfo);
		    //更新用户余额
		    $newbalance=$getuserinfo['money']+$getlistinfo['nowprofit']+$getlistinfo['money'];
		    Db::table('lc_user')->where('id='.$getlistinfo['uid'])->update(['money'=>$newbalance]);
		    //更新UC
		    $where['uid']=$uid;
		    $yebucinfo=Db::table('lc_yuebao_uc')->where($where)->find();
    		$newbalance=$yebucinfo['balance']-$getlistinfo['money'];
    		Db::table('lc_yuebao_uc')->where($where)->update(['balance'=>$newbalance]);
    		//再做UCLOG
	    	$yebuclog=array(
	    		'uid'=>$uid,
	    		'balance'=>$yebucinfo['balance'],
	    		'money'=>$getlistinfo['money'],
	    		'addtime'=>time(),
	    		'remarks'=>"用户购买理财方案：".$getlistinfo['yebtitle']
	    	);
	    	Db::table('lc_yuebao_uclog')->insert($yebuclog);
	
		    return "ok";die;
	    	
	    }else{
	    	return lang('tips_do_failed');die;
	    }
	    
    }
    public function yebkeep(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
    	$getlistinfo=Db::table('lc_yuebao_lists')->where('id='.$_POST['id'])->find();
    	if($getlistinfo['status']==2){
    		return lang('tips_do_failed');die;
    	}elseif($getlistinfo['status']==1){
    		$getlistinfo['end_time']=$getlistinfo['end_time']+$getlistinfo['days']*86400;
    	}
    	unset($getlistinfo['id']);
    	Db::table('lc_yuebao_lists')->where('id='.$_POST['id'])->update(['end_time'=>$getlistinfo['end_time']]);
    	 return lang('tips_do_success');die;
    }
    
    public function exchange(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $this->user = Db::name('LcUser')->find($uid);
        $pro=Db::name('lc_product')->where('isdelete = 0')->select();
        $syswallets=Db::name('lc_wallet_user')->where('status = 1')->select();
        $huili=array();
        $price=array();
        foreach($syswallets as $y){
        	$huili[$y['title']]=$y['exc_rmb'];
        }
        foreach($pro as $x){
        	if(strpos($x['code'],"_usdt")===false) continue;
        	$newcode=explode('_',$x['code']);
        	$newcode=strtoupper($newcode[0]);
        	$price[$newcode]=$x['Price'];
        }
        
        $userwallets=Db::name('lc_wallet_user')->where(['uid'=>$uid,'status'=>1])->select();
        foreach($userwallets as $k=>$z){
        	$z['rmbval']=round($price[$z['title']]*$z['exc_rmb']*$z['exc_usdt']*$z['balance'],2);
        	$z['price']=$price[$z['title']];
        	$z['huli']=$huili[$z['title']];
        	$userwallets[$k]=$z;
        }
        $this->assign('userwallets',$userwallets);
        $this->assign('price',$price);
        $this->assign('huili',$huili);
    	$this->fetch();
    }
    
    public function exchange_record(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $list=Db::table('lc_exchange_list')->where(['uid'=>$uid])->order('id desc')->paginate(50);
        foreach($list as $k=>$x){
        	$x['time']=date('Y-m-d H:i:s',$x['addtime']);
        	$list[$k]=$x;
        }
        $this->assign('list',$list);
    	$this->fetch();
    }
    
    public function exchange_c2m(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        
        $getuserwalletinfo=Db::table('lc_wallet_user')->where(['id'=>$_POST['wid'],'title'=>$_POST['title']])->find();
        if(empty($getuserwalletinfo)){ return "false";die; };
        if($getuserwalletinfo['balance']<$_POST['paycoin']){ return "false";die; };
        
        $userinfo=Db::name('LcUser')->find($uid);
        //获取最新价格
        $procode=strtolower($_POST['title']).'_usdt';
        $getproinfo=Db::table('lc_product')->where(['code'=>$procode])->find();
        //获取平台汇率
        $getsyswalletinfo=Db::table('lc_wallet_list')->where(['title'=>$_POST['title']])->find();
        
        
        $getmoney=number_format(($_POST['paycoin']*($getsyswalletinfo['exc_rmb']*$getproinfo['Price'])),2);
        $getmoney=str_replace(',','',$getmoney);
        //var_dump($userinfo['money']+$getmoney);die;
        $saverecord=array(
        	'uid'=>$uid,	
        	'type'=>"c2m",
        	'bre_balance'=>$userinfo['money'],
        	'aft_balance'=>$userinfo['money']+$getmoney,
        	'bre_coin'=>$getuserwalletinfo['balance'],
        	'aft_coin'=>$getuserwalletinfo['balance']-$_POST['paycoin'],
        	'coin_title'=>$getuserwalletinfo['title'],
        	'paymoney'=>0,
        	'getmoney'=>$getmoney,
        	'paycoin'=>$_POST['paycoin'],
        	'getcoin'=>0,
        	'price'=>$getproinfo['Price'],
        	'huli'=>$getsyswalletinfo['exc_rmb'],
        	'addtime'=>time(),
        	'remarks'=>"用户前台自助兑换",
        	'status'=>1
        );
        
        $saveres=Db::table('lc_exchange_list')->insert($saverecord);
        //var_dump($saveres);die;
        if($saveres){
        	//减掉币种余额
        	Db::table('lc_wallet_user')->where(['id'=>$_POST['wid']])->update(['balance'=>$saverecord['aft_coin']]);
        	//扣减用户现金余额
        	Db::table('lc_user')->where(['id'=>$uid])->update(['money'=>round($saverecord['aft_balance'],2)]);
        	return"true";die;
        }else{
        	return"false";die;
        }
    }
    public function exchange_m2c(){
    	$uid = $this->app->session->get('uid');
        if(!$uid) $this->redirect('/index/login');
        $userinfo=Db::name('LcUser')->find($uid);
        if($userinfo['money']<$_POST['money']){ return "false";die; };
        $procode=strtolower($_POST['title']).'_usdt';
        $getproinfo=Db::table('lc_product')->where(['code'=>$procode])->find();
        $getsyswalletinfo=Db::table('lc_wallet_list')->where(['title'=>$_POST['title']])->find();
        $getuserwalletinfo=Db::table('lc_wallet_user')->where(['id'=>$_POST['wid'],'title'=>$_POST['title']])->find();
        if(empty($getuserwalletinfo)){ return "false";die; };
        $getcoin=number_format(($_POST['money']/($getsyswalletinfo['exc_rmb']*$getproinfo['Price'])),8);
        $saverecord=array(
        	'uid'=>$uid,	
        	'type'=>"m2c",
        	'bre_balance'=>$userinfo['money'],
        	'aft_balance'=>$userinfo['money']-$_POST['money'],
        	'bre_coin'=>$getuserwalletinfo['balance'],
        	'aft_coin'=>$getuserwalletinfo['balance']+$getcoin,
        	'coin_title'=>$getuserwalletinfo['title'],
        	'paymoney'=>$_POST['money'],
        	'getmoney'=>0,
        	'paycoin'=>0,
        	'getcoin'=>$getcoin,
        	'price'=>$getproinfo['Price'],
        	'huli'=>$getsyswalletinfo['exc_rmb'],
        	'addtime'=>time(),
        	'remarks'=>"用户前台自助兑换",
        	'status'=>1
        );
        
        $saveres=Db::table('lc_exchange_list')->insert($saverecord);
        //var_dump($saveres);die;
        if($saveres){
        	//增加币种余额
        	Db::table('lc_wallet_user')->where(['id'=>$_POST['wid']])->update(['balance'=>$saverecord['aft_coin']]);
        	//扣减用户现金余额
        	Db::table('lc_user')->where(['id'=>$uid])->update(['money'=>round($saverecord['aft_balance'],2)]);
        	return"true";die;
        }else{
        	return"false";die;
        }
        //var_dump($getuserwalletinfo);
       // var_dump($getcoin);die;
    	//$this->fetch();
    }
}
