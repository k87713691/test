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

namespace app\agent\controller;

use library\Controller;
// use library\service\AdminService;
// use library\service\MenuService;
use library\tools\Data;
use think\Console;
use think\Db;
use think\exception\HttpResponseException;

/**
 * 系统公共操作
 * Class Index
 * @package app\agent\controller
 */
class Index extends Controller
{

    /**
     * 显示后台首页
     * @throws \ReflectionException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $this->title = '代理商管理后台';
        $this->checkuser();
        
        
        $this->fetch();
      
    }

    public function user(){
    	//var_dump($_SERVER);die;
    	$this->checkuser();

        
        $this->title = '会员列表';
        //
        $query = $this->_query('lc_user')->alias('u')->field('u.*,m.name as m_name')->where('phone = '.$_SESSION['fw']['user']['phone']);
        $query->join('lc_user_member m','u.member=m.id')->equal('u.auth#u_auth,u.clock#u_clock,u.member#u_member')->like('u.ip#i_orderid,u.phone#u_phone,u.name#u_name,u.ip#u_ip')->dateBetween('u.time#u_time')->order('u.id desc')->page();
        $this->fetch();
    	
    }
    
    public function checkuser(){
    	// $auth = AdminService::instance()->apply(true);
     //   if(!$auth->isLogin()) $this->redirect('@agent/login');
    	if($this->app->session->get('user.authorize')<5 or empty($_SESSION['fw']['user'])) $this->redirect('@agent/login/out');
    	return true;
    }
    
    

}
