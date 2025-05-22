<?php

namespace app\akszadmin\model;

use think\Model;
use think\Db;

class Users extends Model
{
    protected $user_table = 'LcUser';
    protected $finance_table = 'LcFinance';


    /**
     * @description：添加流水
     * @date: 2020/5/12 0012
     * @param $uid
     * @param $money
     * @param $type
     * @param $reason
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function addFinance($uid,$money,$type,$reason){
        $user = Db::name($this->user_table)->find($uid);
        if($user['money']<0) return false;
        if(!$user) return false;
         $orderno=date('YmdHis').$uid.rand(11111,99999);
         $data = array(
            'uid'   =>  $uid,
            'money'   =>  $money,
            'type'   =>  $type,
            'reason'   =>  $reason,
            'before'    => $user['money'],
            'time'  => date('Y-m-d H:i:s') ,
          'orderid'=> substr($orderno,-7)
        );
        Db::startTrans();
        $re = Db::name($this->finance_table)->insert($data);
        if($re){
            Db::commit();
            return true;
        }else{
            Db::rollback();
            return false;
        }
    }
}
