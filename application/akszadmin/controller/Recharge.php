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
 * 充值管理
 * Class Item
 * @package app\akszadmin\controller
 */
class Recharge extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'LcRecharge';

    /**
     * 充值记录
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
        $this->title = '充值记录';
        $query = $this->_query($this->table)->alias('i')->field('i.*,u.phone,u.name');
        
         $query->join('lc_user u','i.uid=u.id')->equal('i.status#i_status')->like('i.orderid#i_orderid,i.type#i_type,u.phone#u_phone,u.name#u_name')->dateBetween('i.time#i_time')->order('i.id desc')->page();
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
        $this->type = Db::name($this->table)->field('type')->group('type')->select();
        $this->rejected = sprintf("%.2f",Db::name($this->table)->where("status = 2")->sum('money'));
        $this->finished = sprintf("%.2f",Db::name($this->table)->where("status = 1")->sum('money'));
        $this->reviewed = sprintf("%.2f",Db::name($this->table)->where("status = 0")->sum('money'));
    }
    public function edit()
    {
        $this->applyCsrfToken();
		if($this->request->isPost()) {
		   $id = $this->request->param('id');
		   $reaolae = $this->request->param('reaolae');
		   $this->_save($this->table, ['reaolae'=>$reaolae,'status' => '2','time2' => date('Y-m-d H:i:s')]);
		}else{
			$this->title = '拒绝充值';
			$id = $this->request->param('id');
			$recharge = Db::name($this->table)->find($id);
			if($recharge){
				$recharge['username'] = Db::name("LcUser")->where(['id'=>$recharge['uid']])->value('phone');
			}
			$this->_form($this->table, 'edit');
		}
    }  
    /**
     * 同意充值
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function agree()
    {
        $this->applyCsrfToken();
        $id = $this->request->param('id');
        $recharge = Db::name($this->table)->find($id);
        if($recharge&&$recharge['status'] == 0){
            $money = $recharge['money'] +  $recharge['send_money'];
            $uid = $recharge['uid'];
            $type = $recharge['type'];
            $SHUZI =  700000000 ;
            $SHUZI2 =  date('mdhis');
             $adddata['orderno']=  $SHUZI2 - $SHUZI;
            $orderno=date('YmdHis').$uid.rand(1111,9999);
                $finance['orderid'] =$adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] = $money ; 
                $finance['type'] =1;
                $finance['reason'] =  '通过'.$type . '奖励' . $money . '元';
                $finance['time'] = date('Y-m-d H:i:s',time());
                $finance['before'] = $money;
                $lcfinance  =   Db::name('lc_finance')->insert($finance);
            setNumber('LcUser', 'money', $money, 1, "id = $uid");
            $tid = Db::name('LcUser')->where('id', $uid)->value('top');
            if($tid) setRechargeRebate($tid, $money);
            if(getInfo('pay_bank_give') > 0 && $recharge['type'] == '银行入款'){
                $money =   $recharge['send_money'] + $money * getInfo('pay_bank_give') /100;
                $orderno=date('YmdHis').$uid.rand(1111,9999);
                $finance['orderid'] =$adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] = $money; 
                $finance['type'] =1;
                $finance['reason'] =  '通过'.$type . '奖励' . $money . '元';
                $finance['time'] = date('Y-m-d H:i:s',time());
                $finance['before'] = $money;
                $lcfinance  =   Db::name('lc_finance')->insert($finance);
                setNumber('LcUser', 'money', $money, 1, "id = $uid");
            }
            if(getInfo('gz_bankz') > 0 && $recharge['type'] == '公账入款'){
                $money = $recharge['send_money'] +  $money * getInfo('gz_bankz') /100;
                $orderno=date('YmdHis').$uid.rand(1111,9999);
                $finance['orderid'] =$adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] = $money; 
                $finance['type'] =1;
                $finance['reason'] =  '通过'.$type . '奖励' . $money . '元';
                $finance['time'] = date('Y-m-d H:i:s',time());
                $finance['before'] = $money;
                $lcfinance  =   Db::name('lc_finance')->insert($finance);
                setNumber('LcUser', 'money', $money, 1, "id = $uid");
            }
            if(getInfo('wx_bank_give') > 0 && $recharge['type'] == '微信转银行卡'){
                $money = $recharge['send_money'] + $money * getInfo('wx_bank_give') /100;
              $orderno=date('YmdHis').$uid.rand(1111,9999);
                $finance['orderid'] =$adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] = $money; 
                $finance['type'] =1;
                $finance['reason'] =  '通过'.$type . '奖励' . $money . '元';
                $finance['time'] = date('Y-m-d H:i:s',time());
                $finance['before'] = $money;
                $lcfinance  =   Db::name('lc_finance')->insert($finance);
                setNumber('LcUser', 'money', $money, 1, "id = $uid");
            }
            if(getInfo('alipay_bank_give') > 0 && $recharge['type'] == '支付宝转银行卡'){
                $money =  $recharge['send_money'] + $money * getInfo('alipay_bank_give') /100;
                //addFinance($uid, $money, 1, '通过'.$type . '奖励' . $money . '元');
                $orderno=date('YmdHis').$uid.rand(1111,9999);
                $finance['orderid'] =$adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] = $money; 
                $finance['type'] =1;
                $finance['reason'] =  '通过'.$type . '奖励' . $money . '元';
                $finance['time'] = date('Y-m-d H:i:s',time());
                $finance['before'] = $money;
                $lcfinance  =   Db::name('lc_finance')->insert($finance);
                setNumber('LcUser', 'money', $money, 1, "id = $uid");
            }
             $moneya =$recharge['chongzhiqian'] + $recharge['money'] +  $recharge['send_money'];
            $this->_save($this->table, ['status' => '1','time2' => date('Y-m-d H:i:s'),'dangqian' => $moneya]);
        }
    }
    
    /**
     * 增减余额
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function change(){
        if($this->app->request->isPost()){
            $data = $this->request->param();
            if(!$data['name']) $this->error("用户账号必填");
            if(!$data['money']) $this->error("增减金额必填");
            $uid = Db::name("LcUser")->where(['phone'=>$data['name']])->value('id');
             $before = Db::name("LcUser")->where(['phone'=>$data['name']])->value('money');
            if(!$uid) $this->error("暂无该用户");
           $SHUZI =  700000000 ;
            $SHUZI2 =  date('mdhis');
             $adddata['orderno']=  $SHUZI2 - $SHUZI;
           // addFinance($uid, $data['money'], $data['type'], $data['reason'],"orderid = $orderid");
                 $finance['orderid'] = $adddata['orderno']; 
                $finance['uid'] = $uid;
                $finance['money'] =$data['money']; 
                $finance['type'] = $data['type'];
                $finance['reason'] =  $data['reason'];
                
               $finance['time'] = date('Y-m-d H:i:s',time());
                 //$fitime = date('Y-m-d H:i:s',time());
                $finance['before'] = $before;
               
                    
              $lcfinance  =   Db::name('lc_finance')->insert($finance);
            setNumber('LcUser', 'money', $data['money'], $data['type'], "id = $uid");
            $this->success("操作成功");
        }
        $this->fetch('form');
    }

    /**
     * 拒绝充值
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function refuse()
    {
        $this->applyCsrfToken();
        $this->applyCsrfToken();
        $id = $this->request->param('id');
        $recharge = Db::name($this->table)->find($id);
         $moneya =$recharge['chongzhiqian'] ;
            $this->_save($this->table, ['status' => '2','time2' => date('Y-m-d H:i:s'),'dangqian' => $moneya]);
       
    }
    
    /**
     * 删除充值记录
     * @auth true
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function remove()
    {
        $this->applyCsrfToken();
        $this->_delete($this->table);
    }
}
