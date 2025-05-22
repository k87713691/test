<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://demo.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )s
// +----------------------------------------------------------------------
// | gitee 代码仓库3：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库3：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\akszadmin\controller;

use library\Controller;
use think\Db;

/**
 * 持仓管理
 * Class Item
 * @package app\akszadmin\controller
 */
class Order extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'LcOrder';

    /**
     * 持仓列表
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
        $this->title = '持仓列表';
		$this->type = $this->request->param('type');
		         $this->sele = Db::table('lc_selects')->select();//一键控制

        $query = $this->_query($this->table)->alias('i')->field('i.*,u.phone,u.name as u_name');
        $query->leftjoin('lc_user u','i.uid=u.id')->like('u.phone#u_phone,u.name#u_name')->dateBetween('i.time#i_time')->order('i.id desc')->page();
    }
  
  
  
           public function xy_setup($param1)
    {
        switch ($param1) {
            case 2:
                Db::table('lc_selects')->where('id', $param1)->update(['select' => "selected"]);
                Db::table('lc_selects')
                    ->where('id', '<>', $param1)
                    ->update(['select' => null]);
                Db::table('lc_risk')->where('id', 1)->update(['wenyin' => "", 'wenshu' => "00:00-23:59" ]);
                echo('<script>alert("成功");window.location.href="/akszadmin.html#/akszadmin/order/index.html?spm=m-109-111-116"</script>');
                
                break; 
            case 3:
                Db::table('lc_selects')->where('id', $param1)->update(['select' => "selected"]);
                Db::table('lc_selects')
                    ->where('id', '<>', $param1)
                    ->update(['select' => null]);
                Db::table('lc_risk')->where('id', 1)->update(['wenshu' => "", 'wenyin' => "00:00-23:59"]);
                echo('<script>alert("成功");window.location.href="/akszadmin.html#/akszadmin/order/index.html?spm=m-109-111-116"</script>');
                break;
            default:
                Db::table('lc_selects')->where('id', $param1)->update(['select' => "selected", 'kongzhi' => "0"]);
                Db::table('lc_selects')
                    ->where('id', '<>', $param1)
                    ->update(['select' => null]);
               Db::table('lc_risk')->where('id', 1)->update(['wenshu' => "", 'wenyin' => "", 'kongzhi' => "0"]);

                echo('<script>alert("成功");window.location.href="/akszadmin.html#/akszadmin/order/index.html?spm=m-109-111-116"</script>');
                break;
        }
    }
  
    /**
     * 编辑持仓
     * @auth true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function edit()
    {
        $this->title = '查看';
        $this->_form($this->table, 'form');
    }
	 public function edits()
    {
		if($this->app->request->isPost()){
			$param = $this->app->request->param();
			 

			$id=$param['id'];
			 $moneyuser = Db::name('LcUser')->find($param['uid']);
			 if ($param['ploss'] > 0 ) {
			     $ploss = $param['ploss'] * 2;
			     
			       $momeya = $moneyuser['money'] - $ploss;
			    
			 }
			 $ploss = $param['ploss'] * 2;
             $momeya = $moneyuser['money'] + $ploss;
             
			if($param['pid']){
				$title=Db::name('LcProduct')->where(['id'=>$param['pid']])->value('title');
			};
			
			$datac['uid']=$param['uid'];
			$datac['pid']=$param['pid'];
			$datac['ptitle']=$title;
			$datac['ostyle']=$param['ostyle'];
			$datac['buyprice']=$param['buyprice'];
			$datac['sellprice']=$param['sellprice'];
			$datac['ploss']=$param['ploss'];
			$datac['buytime']=strtotime($param['buytime']);
			$datac['selltime']=strtotime($param['selltime']);
			$datac['is_win']=$param['is_win'];
			$tosave=array(
    		'money'=>$momeya ,
    	 
     
    	);
			 
			$res = Db::name('lc_user')->where('id = '.$param['uid'])->update($tosave);
            $this->_save($this->table, $datac);
		}
        $this->title = '编辑订单信息';
		$this->goods = Db::name('LcProduct')->field("id,title")->order("sort asc,id desc")->select();
        $this->_form($this->table, 'edits');
    }

    /**
     * 改平仓
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function gaipingcang()
    {
        // $this->applyCsrfToken();
        $id = $this->request->param('id');
        $sellprice = $this->request->param('sellprice');

        $this->_save($this->table, ['sellprice' => $sellprice]);
    }
	
	/*单控操作*/
	public function dankong(){
		  $id = $this->request->param('oid');
          $kong_type = $this->request->param('kong_type');
          if($kong_type==3 ){
              $risk = Db::name('LcRisk')->find();
              $this->_save($this->table, ['kong_type' => $kong_type,'endloss'=>$risk['qybl']]);	
          }else if($kong_type==4){
              $risk = Db::name('LcRisk')->find();
              $this->_save($this->table, ['kong_type' => $kong_type,'lossrate'=>$risk['qkbl']]);	
          }else{
		      $this->_save($this->table, ['kong_type' => $kong_type]);	
          }
	}
	
	public function remove()
    {
        if (in_array('10000', explode(',', $this->request->post('id')))) {
            $this->error('系统超级账号禁止删除！');
        }
   
        $this->_delete($this->table);
    }
}
