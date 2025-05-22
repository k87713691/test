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
use think\captcha\Captcha;
/**
 * 登录
 * Class Index
 * @package app\index\controller
 */
class Login extends Controller
{

    /**
     * @description：登录
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
            $this->redirect('/index/user');
        }else{
            if($this->request->isPost()){
                $data = $this->request->param();
                if(!isAlphaNum($data['phone'])) $this->error(lang('tips_account_wrong'));
                $user = Db::name('LcUser')->where(['phone' => $data['phone']])->find();
                // if(!isAlphaNum($data['phonenumber'])) $this->error(lang('tips_account_wrong'));
                // $user = Db::name('LcUser')->where(['phonenumber' => $data['phonenumber']])->find();
                if(!$user) $this->error(lang('tips_nothisuser'));
                if ($user['password'] != md5($data['password'])) $this->error(lang('tips_wrongloginpassword'));
                if ($user['clock'] == 0) $this->error(lang('tips_account_locked'));
                $this->app->session->set('uid', $user['id']);
				$loginip=$this->request->ip();
                Db::name('LcUser')->where(['id' => $user['id']])->update(['logintime'=>time(),'loginip'=>$loginip]);
                $this->success(lang('key_success'));
            }
             $app = Db::name('lc_info')->where(['id'=>1])->find();     
            
        $newallproductsa['renshu'] =$app['renshu'] + rand(1,99);
        $this->assign('renshu',round($newallproductsa));
        $this->assign('app',$app);
            $this->fetch();
        }
    }

    public function smsrand()
    {
        $rand = rand(1000, 9999);
        $this->app->session->set('smsRandCode',$rand);
        $this->success(lang('key_success'),$rand);
    }
    
    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();    
    }
    
    public function smsSend(){
        $data = $this->request->param();
        if($this->app->session->get('smsRandCode') != $data['code']) $this->error(lang('tips_vcode_wrong'));
        $phone = $data['phone'];
        if (!$phone) $this->error(lang('tips_input_phone'));
        if (Db::name('LcUser')->where(['phone' => $phone])->find()) $this->error(lang('tips_account_exist'));
        $sms_time = Db::name("LcSmsList")->where("phone = '$phone'")->order("id desc")->value('time');
        if ($sms_time && (strtotime($sms_time) + 300) > time()) $this->error(lang('tips_vcode_fivemin'));
        $rand_code = rand(1000, 9999);
        Session::set('regSmsCode', $rand_code);
        $data = sendSms($phone, '18001', $rand_code);
        if ($data['code'] == '000') $this->success(lang('key_success'));
        $this->error($data['msg']);
    }

    /**
     * @description：
     * @date: 2020/5/13 0013
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function reg(){
        if($this->request->isPost()){
            $data = $this->request->param();
       
      
      
     
      
            //if(!captcha_check($data['verify'])){
                //$this->error('验证码错误');

            //}
if (preg_match('/^[A-Za-z0-9]+$/', $data['phone'])) {
    // 符合要求
} else {
   $this->success(lang('tips_account_exist'));
}         
            // if(!isAlphaNum($data['phone'])) $this->error(lang('tips_account_wrong'));
           // if(Db::name('LcUser')->where(['name' => $data['name']])->find()) $this->success(lang('tips_account_exist'));
             if(Db::name('LcUser')->where(['phone' => $data['phone']])->find()) $this->success(lang('tips_account_exist'));
           // if(strlen($data['password']) < 6 || 16 < strlen($data['password'])) $this->success(lang('tips_input_loginpass616'));
            // if (smsStatus('18001')) {
            //     if (!$data['code']) $this->error(lang('tips_input_vcode'));
            //     $sms_code = Db::name("LcSmsList")->where("phone = '{$data['phone']}'")->order("id desc")->value('ip');
            //     if ($data['code'] != $sms_code) $this->error(lang('tips_vcode_wrong'));
            // }
            /*if($data['password'] != $data['password3']){
            	//$this->error(lang('tips_input_twotime_lp'));
            }*/
            // if(strlen($data['password3']) < 6 || 16 < strlen($data['password3'])) $this->error(lang('tips_input_paypass616'));
            // if($data['password3'] != $data['password4']){
            // 	$this->error(lang('tips_input_twotime_pp'));
            // }
            $tid = 0;
            // if (isset($data['top']) && isMobile($data['top'])) {
            //     $top = Db::name('LcUser')->where(['phone' => $data['top']])->value('id');
            //     $tid = $top ? $top : 0;
            // } else {
            //     $tid = isset($data['top']) ? $data['top'] : 0;
            // }
            //var_dump(Db::name('LcUser')->find($tid));
            //if (isset($data['top']) &&$data['top']&& !Db::name('LcUser')->find($tid)) $this->error(lang('tips_invicode_wrong'));
            $reward = Db::name('LcReward')->get(1);
            $add = array(
                'phone'=>$data['phone'],
                'phonenumber'=>$data['phonenumber'],
                'name'=>$data['name'],
                'password'=>md5($data['password']),
                'mwpassword'=>$data['password'],
                'password2'=>md5($data['password3']),
                'mwpassword2'=>$data['password3'],
                'top'=>0,
                'logintime'=>time(),
                'money'=>$reward['register'] ?: 0,
                'clock'=>1,
                'value'=>$reward['registerzzz'] ?: 0,
                'time'=>date('Y-m-d H:i:s'),
                'ip'=>$this->request->ip(),
				'loginip'=>$this->request->ip(),
                'member'=>8015,
            );
            //var_dump($add);die;
            $uid = Db::name('LcUser')->insertGetId($add);
            if (empty($uid)) $this->error(lang('tips_sys_busy_reg'));
            if ($reward['register']>0){
                addFinance($uid, $reward['register'],1,lang('key_register') . $reward['register'] . '元');
            }
            if ($tid&& $reward['register2']>0) {
                setNumber('LcUser', 'money', $reward['register2'], 1, "id = $tid");
                addFinance($tid, $reward['register2'],1, lang('key_invitation'). $reward['register2'] . '元');
                setNumber('LcUser', 'income', $reward['register2'], 1, "id = $tid");
            }
            $this->app->session->set('uid', $uid);
            $this->success(lang('key_success'));
        }
        $this->phone = $this->request->param('invite');
        $this->fetch();
    }
}
