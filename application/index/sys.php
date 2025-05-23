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

use library\File;
use think\Db;
use think\Request;
use think\facade\Session;

if (!function_exists('isLogin')) {
    /**
     * @description：判断是否登录
     * @date: 2020/5/13 0013
     * @return bool
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    function isLogin()
    {
        $uid = Session::get('uid');
        if(!$uid) return false;
        $user = Db::name('LcUser')->find($uid);
        if(!$user||!$user['clock']) return false;
        $data = ['logintime' => time(),'id'=>$uid];
        Db::name('LcUser')->update($data);
        return true;
    }
}

/**
 * @description：手机号验证
 * @date: 2020/5/14 0014
 * @param $phone
 * @return bool
 */
function isMobile($phone){
    if(preg_match("/^1[3456789]{1}\d{9}$/",$phone)) return true;
    return false;
}
function isAlphaNum($phone){
    if(preg_match("/^[A-Za-z0-9]+$/",$phone)) return true;
    return false;
}

/**
 * @description：IP查询
 * @date: 2020/5/14 0014
 * @param string $ip
 * @return array|bool|string
 */
function GetIpLookup($ip = ''){
    if(empty($ip)){
        return '';
    }
    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
    $ip=json_decode(file_get_contents($url));
    if((string)$ip->code=='1'){
        return false;
    }
    $data = (array)$ip->data;
    return $data;
}

/**
 * @description：添加流水
 * @date: 2020/5/13 0013
 * @param $uid
 * @param $money
 * @param $type
 * @param $reason
 * @return bool
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function addFinance($uid,$money,$type,$reason){
    $user = Db::name('LcUser')->find($uid);
    if(!$user) return false;
    if($user['money']<0) return false;
    $data = array(
        'uid'   =>  $uid,
        'money'   =>  $money,
        'type'   =>  $type,
        'reason'   =>  $reason,
        'before'    => $user['money'],
        'time'  => date('Y-m-d H:i:s')
    );
    Db::startTrans();
    $re = Db::name('LcFinance')->insert($data);
    if($re){
        Db::commit();
        return true;
    }else{
        Db::rollback();
        return false;
    }
}

/**
 * @description：
 * @date: 2020/5/14 0014
 * @param $str
 * @param $type
 * @return bool
 */
function judge($str, $type)
{
    $char = '';
    if ($type == 'int') {
        $char = '/^\\d*$/';
    }
    else if ($type == 'email') {
        $char = '/([\\w\\-]+\\@[\\w\\-]+\\.[\\w\\-]+)/';
    }
    else if ($type == 'idcard') {
        $char = '/[0-9]{17}([0-9]|X)/';
    }
    else if ($type == 'name') {
        $char = '/^[\\x{4e00}-\\x{9fa5}]+[·•]?[\\x{4e00}-\\x{9fa5}]+$/u';
    }
    else if ($type == 'phone') {
        $char = '/^1[3456789]{1}\\d{9}$/';
    }
    else if ($type == 'tel') {
        $char = '/(^(\\d{3,4}-)?\\d{7,8})$/';
    }
    else if ($type == 'date') {
        $char = '/^\\d{4}[\\-](0?[1-9]|1[012])[\\-](0?[1-9]|[12][0-9]|3[01])?$/';
    }
    else if ($type == 'time') {
        $char = '/^\\d{4}[\\-](0?[1-9]|1[012])[\\-](0?[1-9]|[12][0-9]|3[01])(\\s+(0?[0-9]|1[0-9]|2[0-3])\\:(0?[0-9]|[1-5][0-9])\\:(0?[0-9]|[1-5][0-9]))?$/';
    }
    else if ($type == 'exist') {
    }
    else {
        return false;
    }
    if (preg_match($char, $str)) {
        return true;
    }
    return false;
}

/**
 * @description：设置
 * @date: 2020/5/13 0013
 * @param $database
 * @param $field
 * @param $value
 * @param int $type
 * @param string $where
 * @return int|true
 * @throws \think\Exception
 */
function setNumber($database, $field, $value, $type = 1, $where = '')
{
    if ($type != 1) {
        $re = Db::name($database)->where($where)->setDec($field, $value);
    }
    else {
        $re = Db::name($database)->where($where)->setInc($field, $value);
    }
    return $re;
}

/**
 * @description：脱敏
 * @date: 2020/5/14 0014
 * @param $string
 * @param int $start
 * @param int $length
 * @param string $re
 * @return bool|string
 */
function dataDesensitization($string, $start = 0, $length = 0, $re = '*')
{
    if (empty($string)) {
        return false;
    }
    $strarr = array();
    $mb_strlen = mb_strlen($string);
    while ($mb_strlen) {
        $strarr[] = mb_substr($string, 0, 1, 'utf8');
        $string = mb_substr($string, 1, $mb_strlen, 'utf8');
        $mb_strlen = mb_strlen($string);
    }
    $strlen = count($strarr);
    $begin = $start >= 0 ? $start : ($strlen - abs($start));
    $end = $last = $strlen - 1;
    if ($length > 0) {
        $end = $begin + $length - 1;
    } elseif ($length < 0) {
        $end -= abs($length);
    }
    for ($i = $begin; $i <= $end; $i++) {
        $strarr[$i] = $re;
    }
    if ($begin >= $end || $begin >= $last || $end > $last) return false;
    return implode('', $strarr);
}

/**
 * @description：投资状态
 * @date: 2020/5/14 0014
 * @param $id
 * @return string
 */
function getInvestStatus($id)
{
    $invest = Db::name('LcInvestList')->where("status = 0 AND iid = $id")->count();
    if (0 < $invest) {
        return '未完成';
    }
    return '已完成';
}

/**
 * @description：身份认证
 * @date: 2020/5/14 0014
 * @param $id_card
 * @param $name
 * @param $app_code
 * @return array
 */
function idCardAuth($id_card,$name){
    $host = 'http://idcard.market.alicloudapi.com';
    $path = '/lianzhuo/idcard';
    $method = 'GET';
    $appcode = getInfo('linetoken');
    $headers = array();
    array_push($headers, 'Authorization:APPCODE ' . $appcode);
    $querys = 'cardno=' . $id_card . '&name=' . $name;
    $url = $host . $path . '?' . $querys;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos('$' . $host, 'https://')) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $re = curl_exec($curl);
    $resp = json_decode($re, true);
    if ($resp['resp']['code'] == '5') return ['code'=>0,'msg'=>'姓名和身份证号码不匹配'];
    if ($resp['resp']['code'] == '14') return ['code'=>0,'msg'=>'无此身份证号码'];
    if ($resp['resp']['code'] == '96') return ['code'=>0,'msg'=>'交易失败，请稍后重试'];
    if ($resp['resp']['code'] != '0') return ['code'=>0,'msg'=>'网络繁忙，请稍后重试！'];
    return ['code'=>1,'msg'=>'认证成功'];
}

/**
 * @description：银行卡认证
 * @date: 2020/5/14 0014
 * @param $name
 * @param $account
 * @param $id_card
 * @return array
 */
function bankAuth($name,$account,$id_card){
    $host = 'http://lundroid.market.alicloudapi.com';
    $path = '/lianzhuo/verifi';
    $method = 'GET';
    $appcode = getInfo('banktoken');
    $headers = array();
    array_push($headers, 'Authorization:APPCODE ' . $appcode);
    $querys = 'acct_name=' . $name . '&acct_pan=' . $account . '&cert_id=' . $id_card;
    $url = $host . $path . '?' . $querys;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos('$' . $host, 'https://')) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    header('Content-type:text/html; charset=utf-8');
    $re = curl_exec($curl);
    $res = json_decode($re, true);
    if($res['resp']['code'] == 0 && $res['resp']['desc'] == 'OK') return ['code'=>1,'bank'=>$res['data']['bank_name']];
    return ['code'=>0,'msg'=>'银行卡认证失败'];
}

/**
 * Describe:会员等级
 * DateTime: 2020/5/13 23:49
 * @param $member
 * @return mixed|string
 */
function getUserMember($member)
{
    $member = Db::name('LcUserMember')->where("id = {$member}")->value('name');
    return $member?$member:'普通會員';
}

/**
 * @description：获取支付方式
 * @date: 2020/5/14 0014
 * @param $pay
 * @return string
 */
function getPayName($pay)
{
    switch ($pay) {
        case 'wechat':
            return '微信扫码';
        case 'alipay':
            return '支付宝扫码';
        case 'bank':
            return '银行入款';
        case 'gz_bank':
            return '公账入款';
        case 'alipay_bank':
            return '支付宝转银行卡';
        case 'wx_bank':
            return '微信转银行卡';
        case 'online_wechat':
            return '微信在线支付';
        case 'online_alipay':
            return '支付宝在线支付';
        case 'wechat_scan':
            return '微信在线扫码支付';
        default:
    }
    return '未知支付';
}

function gotoWechatPay($money){
    $status = getInfo('qr_wechat_statustz');
    $wxlianjie = getInfo('qr_wechattzlj');
    if($status == 1){
        $url = $wxlianjie;
    }
    else{
        $url = "/index/User/scan?type=wechat&money=".$money;//扫码链接
    }
    header("Location:".$url);
}

function gotoAlipay($money){
    $status = getInfo('qr_alipay_statustz');
    $zfblianjie = getInfo('qr_alipaytzlj');

    if($status == 1){
        $url = $zfblianjie;
    }
    else{
        $url = "/index/User/scan?type=alipay&money=".$money;//扫码链接
    }
    header("Location:".$url);
}

/**
 * Describe: 理财开关
 * DateTime: 2020/5/13 22:44
 * @param $uid
 * @return int
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getlcopen(){
    $lcopen =0;
    $uid = Session::get('uid');
    if (!empty($uid)){
        $user = Db::name('LcUser')->where("id = $uid")->find();
        if (getInfo('qdlcopen') == 0){
            $lcopen = 1;
        }else{
            if ($user['qdnum'] >= getInfo('qdnum') || $user['top'] > 0) {
                $lcopen = 1;
            }else{
                $lcopen = 0;
            }
        }
    }
    return $lcopen;
}

/**
 * @description：获取网站配置
 * @date: 2020/5/14 0014
 * @param $value
 * @return mixed
 */
function getInfo($value){
    return Db::name('LcInfo')->where('id',1)->value($value);
}

/**
 * @description：获取奖励配置
 * @date: 2020/5/14 0014
 * @param $value
 * @return mixed
 */
function getReward($value){
    return Db::name('LcReward')->where('id',1)->value($value);
}

/**
 * @description：项目进度
 * @date: 2020/5/14 0014
 * @param $id
 * @return float|int|mixed
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getProjectPercent($id){
    $item = Db::name('LcItem')->find($id);
    if($item['auto']>0){
        $xc=diffBetweenTwoDays($item['time'],date('Y-m-d H:i:s'));
        if($xc>$item['auto']){
            $total=100;
        }else{
            $total= round($xc/$item['auto']*100);
        }
    }else{
        $pid = $item['id'];
        $percent = $item['percent'];
        $investMoney = Db::name('LcInvest')->where('pid', $pid)->sum('money');
        $actual = $investMoney / ($item['total'] * 10000) * 100;
        $total = $actual + $percent;
    }
    if (100 < $total) return 100;
    return $total;
}

function diffBetweenTwoDays ($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);
    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}

/**
 * @description：
 * @date: 2020/5/14 0014
 * @param $money
 * @param $rate
 * @param $day
 * @return float
 */
function getFuliIncome($money, $rate, $day)
{
    $sum = $money;
    $i = 0;
    while ($i < $day) {
        $sum = $sum + $sum * $rate / 100;
        ++$i;
    }
    return round($sum - $money, 2);
}

/**
 * @description：
 * @date: 2020/5/14 0014
 * @param $pid
 * @return float|int
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getProjectSurplus($pid)
{
    $percent = getProjectPercent($pid);
    $total = Db::name('LcItem')->where('id', $pid)->value('total');
    $surplus = (100 - $percent) * $total * 100;
    if ($surplus < 0) return 0;
    return $surplus;
}

function getProfit($day_income,$cost){
    return number_format($day_income-$cost, 8, '.', '');
}

function getMinerPercent($total,$stock){
    return round(($total-$stock)/$total*100,2);
}

/**
 * @description：奖励设置
 * @date: 2020/5/14 0014
 * @param $uid
 * @param $money
 * @throws \think\Exception
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function setInvestReward_old($uid, $money )
{
    $reward = Db::name('LcReward')->find(1);
    $top1 = round($reward['invest1'] * $money / 100, 2);
    $top2 = round($reward['invest2'] * $money / 100, 2);
    $top3 = round($reward['invest3'] * $money / 100, 2);
    $t1 = Db::name('LcUser')->where(['id'=>$uid])->value('top') ?: 0;
    $t2 = Db::name('LcUser')->where(['id'=>$t1])->value('top') ?: 0;
    $t3 = Db::name('LcUser')->where(['id'=>$t2])->value('top') ?: 0;
    if (0 < $top1 && !empty($t1)) {
        addFinance($t1, $top1, 1, '推荐会员投资' . $money . '元奖励' . $top1 . '元！');
        setNumber('LcUser', 'money', $top1, 1, "id = $t1");
        setNumber('LcUser', 'income', $top1, 1, "id = $t1");
    }
    if (0 < $top2 && !empty($t2)) {
        addFinance($t2, $top2, 1, '二级推荐会员投资' . $money . '元奖励' . $top2 . '元！');
        setNumber('LcUser', 'money', $top2, 1, "id = $t2");
        setNumber('LcUser', 'income', $top2, 1, "id = $t2");
    }
    if (0 < $top3 && !empty($t3)) {
        addFinance($t3, $top3, 1, '三级推荐会员投资' . $money . '元奖励' . $top3 . '元！');
        setNumber('LcUser', 'money', $top3, 1, "id = $t3");
        setNumber('LcUser', 'income', $top3, 1, "id = $t3");
    }
}


function setUserMember($uid, $value)
{
    $member = Db::name('LcUserMember')->where("value <= '{$value}'")->order('value desc')->find();
    if(empty($member)){
        $mid = 0;
    }else{
        $mid = $member['id'];
    }
    Db::name('LcUser')->where("id = {$uid}")->update(array('member' => $mid));
    return $mid;
}

function getUserField($uid, $field)
{
    return Db::name('LcUser')->where(['id'=>$uid])->value($field);
}

function getUserPhone($uid)
{
    return Db::name('LcUser')->where(['id'=>$uid])->value('phone');
}

/**
 * @description：
 * @date: 2020/5/14 0014
 * @param $uid
 * @param $money
 * @param $id
 * @throws \think\Exception
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function setInvestReward($uid, $money,$id)
{
    $reward =  Db::name("LcItem")->find($id);
    $top1 = round($reward['invest1'] * $money / 100, 2);
    $top2 = round($reward['invest2'] * $money / 100, 2);
    $top3 = round($reward['invest3'] * $money / 100, 2);
    /*$red1 = round($reward['red1'], 2);
    $red2 = round($reward['red2'], 2);
    $red3 = round($reward['red3'], 2);*/
    $t1 = getUserField($uid, 'top') ?: 0;
    $t2 = getUserField($t1, 'top') ?: 0;
    $t3 = getUserField($t2, 'top') ?: 0;
    if (0 < $top1 && !empty($t1)) {
        addFinance($t1,$top1,1,'推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励' . $top1 . '元！');
        setNumber('LcUser', 'money', $top1, 1, 'id=\'' . $t1 . '\'');
        setNumber('LcUser', 'income', $top1, 1, 'id=\'' . $t1 . '\'');
    }

    if (0 < $top2 && !empty($t2)) {
        addFinance($t2, $top2,1, '二级推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励' . $top2 . '元！');
        setNumber('LcUser', 'money', $top2, 1, 'id=\'' . $t2 . '\'');
        setNumber('LcUser', 'income', $top2, 1, 'id=\'' . $t2 . '\'');
    }

    if (0 < $top3 && !empty($t3)) {
        addFinance($t3, $top3,1, '三级推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励' . $top3 . '元！');
        setNumber('LcUser', 'money', $top3, 1, 'id=\'' . $t3 . '\'');
        setNumber('LcUser', 'income', $top3, 1, 'id=\'' . $t3 . '\'');
    }
    //以下为红包奖励
/*    if (0 < $red1 && !empty($t1)) {
        addFinance($t1, $red1, 1, '推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励红包' . $red1 . '元！');
        setNumber('user', 'money', $red1, 1, 'id=\'' . $t1 . '\'');
        setNumber('user', 'income', $red1, 1, 'id=\'' . $t1 . '\'');
    }

    if (0 < $red2 && !empty($t2)) {
        addFinance($t2, $red2, 1, '二级推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励红包' . $red2 . '元！');
        setNumber('user', 'money', $red2, 1, 'id=\'' . $t2 . '\'');
        setNumber('user', 'income', $red2, 1, 'id=\'' . $t2 . '\'');
    }
    if (0 < $red3 && !empty($t3)) {
        addFinance($t3, $red3, 1, '三级推荐会员(' . getUserPhone($uid) . ')投资' . $money . '元奖励红包' . $red3 . '元！');
        setNumber('user', 'money', $red3, 1, 'id=\'' . $t3 . '\'');
        setNumber('user', 'income', $red3, 1, 'id=\'' . $t3 . '\'');
    }*/
}

/**
 * @description：
 * @date: 2020/5/14 0014
 * @param $id
 * @param $money
 * @param $uid
 * @return bool
 * @throws \think\Exception
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function getInvestList($id, $money, $uid)
{
    $item = Db::name('LcItem')->where(['id'=>$id])->find();
    $title = $item['title'];
    $type = $item['type'];
    $day = $item['day'];
    $jfbl = $item['jfbl'];
    $rate = $item['rate'];
    $mid = Db::name('LcUser')->where(['id'=>$uid])->value('member');
    $member = Db::name('LcUserMember')->where("id = $mid")->find();
    if (!empty($member) && 0 < $member['rate']) {
        $rate += $member['rate'] ?: 0;
    }
    /*if (date('Y-m-d H:i:s') <= $item['jiaxitime']) {
        $rate += $item['jiaxi'] ?: 0;
    }*/
    //赠送抽奖次数
    if ($item['prize'] == 1) {
        $num = intval($money / $item['min']);
        setNumber('LcUser', 'prize', $num, 1, "id = $uid");
    }
    //赠送积分
    if ($item['integral'] == 1) {
        setNumber('LcUser', 'integral', intval($money)*intval($jfbl), 1, "id = $uid");
    }
    $res=Db::name('LcInvest')->order("id desc")->find();
    if($res['number']){
        $number=  date('ymd').sprintf("%05d", substr($res['number'],-5)+1);
    }else{
        $number= date('ymd').'01000';
    }
    $invest = array('uid' => $uid,'number'=>$number ,'pid' => $id, 'title' => $title, 'money' => $money, 'day' => $day, 'rate' => $rate, 'type1' => $type, 'type2' => getprojecttype($type), 'status' => 0, 'time' => date('Y-m-d H:i:s'),'time2'=>date('Y-m-d H:i:s', strtotime('+' . $item['day'] . ' day')));
    setNumber('LcUser', 'value', $money, 1, "id = $uid");
    setUserMember($uid, Db::name('LcUser')->where(['id'=>$uid])->value('value'));
    setInvestReward($uid, $money,$id);
    $iid = Db::name('LcInvest')->insertGetId($invest);
    if (!empty($iid)) {
        if ($type == 1) {
            $base = 1;
        }
        else if ($type == 2) {
            $base = 7;
        }
        else if ($type == 3) {
            $base = 30;
        }
        else if ($type == 4) {
            $base = 1;
        }
        else if ($type == 5) {
            $base = $day;
        }
        elseif ($type == 6) {
            $base = 1;

        }else{
            $base = 0;
        }
        $day2 = $day / $base;
        $bool = false;
        $money2 = $money;
        $i = 1;
        while($i <= $day2){
            $time1 = $i * $base;
            $data = array('uid' => $uid, 'iid' => $iid, 'num' => $i, 'title' => $title, 'money1' => round($money * $rate / 100 * $base, 2), 'money2' => 0, 'time1' => $type == 6?$item['fixedtime']:date('Y-m-d H:i:s', strtotime('+' . $time1 . ' day')), 'time2' => '0000-00-00 00:00:00', 'pay1' => $money * $rate / 100 * $base, 'pay2' => 0, 'status' => 0);
            if($type == 4){
                $data['money1'] = $money2 - $money + round($money2 * $rate / 100 * $base, 2);
                $data['money2'] = $money;
                $data['pay1'] = 0;
                $money2 += round($money2 * $rate / 100 * $base, 2);
            }
            if($i == $day2){
                $data['pay1'] += $money;
                $data['money2'] += $money;
            }
            if($i == $day2 && $type == 4) {
                $data['pay1'] = $money + $data['money1'];
                $data['money2'] = $money;
            }
            if(Db::name('LcInvestList')->insertGetId($data)){
                $bool = true;
            }
            ++$i;
        }
        return $bool;
    }
    return false;
}

function getMallInvestList($id, $money, $uid,$tran_type)
{
    $item = Db::name('LcMall')->where(['id'=>$id])->find();
    $title = $item['title'];
    $day = $item['day'];
    $profit = $item['day_income']-$item['cost'];

    $res=Db::name('LcMallInvest')->order("id desc")->find();
    if($res['number']){
        $number=  date('ymd').sprintf("%05d", substr($res['number'],-5)+1);
    }else{
        $number= date('ymd').'01000';
    }

    $invest = array(
        'uid' => $uid,
        'pid' => $id,
        'number' => $number,
        'title' => $title,
        'money' => $money,
        'num' => $money/$item['min'],
        'day' => $day,
        'day_income' => $item['day_income'],
        'cost' => $item['cost'],
        'profit' => $profit,
        'type' => $tran_type,
        'status' => 0,
        'time' => date('Y-m-d H:i:s'),
        'time2'=> date('Y-m-d H:i:s', strtotime('+' . $item['day'] . ' day')),
    );
    $iid = Db::name('LcMallInvest')->insertGetId($invest);
    if (!empty($iid)) {
        $base = 1;
        $day2 = $day / $base;
        $bool = false;
        $i = 1;
        while($i <= $day2){
            $time1 = $i * $base;
            $data = array(
                'uid' => $uid,
                'iid' => $iid,
                'num' => $i,
                'title' => $title,
                'money1' => $profit,
                'money2' => 0,
                'time1' => date('Y-m-d H:i:s', strtotime('+' . $time1 . ' day')),
                'time2' => '0000-00-00 00:00:00',
                'pay1' => $profit,
                'pay2' => 0,
                'tran_type' => $tran_type,
                'status' => 0
            );
            if($i == $day2){
                $data['money2'] += $money;
            }
            if(Db::name('LcMallInvestList')->insertGetId($data)){
                $bool = true;
            }
            ++$i;
        }
        return $bool;
    }
    return false;
}

/**
 * @description：获取项目类型
 * @date: 2020/5/14 0014
 * @param $pid
 * @return string
 */
function getProjectType($pid)
{
    $str = '到期还本还息';
    switch ($pid) {
        case 1:
            $str = '按日付收益，保证金到期全额返还';
            break;
        case 2:
            $str = '每周返息,到期还本';
            break;

        case 3:
            $str = '每月返息,到期还本';
            break;

        case 4:
            $str = '每日复利,保本保息';
            break;

        case 5:
            $str = '到期还本还息';
            break;
        case 6:
            $str = '当天投资,当天还本付息';
            break;
    }
    return $str;
}

function getItemField($id, $field)
{
    return Db::name('LcItem')->where(['id'=>$id])->value($field);
}

function getMallItemField($id, $field)
{
    return Db::name('LcMall')->where(['id'=>$id])->value($field);
}

function getInvestMoney($id)
{
    return Db::name('LcInvestList')->where("iid = '$id' AND pay1 <> 0")->sum('money1');
}

/**
 * @description：通用跳转
 * @date: 2020/5/14 0014
 * @param $msg
 * @param int $time
 * @param string $url
 */
function msg($msg, $time = 2, $url = '')
{
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,target-densitydpi = medium-dpi">
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "微软雅黑"; color: #333; font-size: 16px; }
    </style>
</head>
<body>
<div style="width: 100%;height: 1000px;position: fixed;top: 0;left: 0;background-color: rgba(0,0,0,0.35);">
    <div style="width: 320px;height: 180px;border-radius:3px;overflow:hidden;margin: auto;position: fixed;top: 0;left: 0;right: 0;bottom: 0;background-color: #fff;box-shadow: 0 0 15px #999;">
        <div style="width: 100%;height:50px;line-height: 50px;background-color: #cfcfcf;">
            <label style="margin-left:10px;color:#666;">温馨提示</label>
            <label style="font-size: 12px;color:#888;float:right;display: block;margin-right: 10px;"><b id="wait">' . $time . '</b>秒后跳转</label>

            <div style="clear:both;"></div>
        </div>
        <div style="padding: 25px 10px;line-height: 30px;">
            <p style="background: url(\'/static/theme/index/img/success.png\') no-repeat 0 -2px;;height: 32px;padding-left: 40px;">' . $msg . '</p>
            <p style="text-align: right;margin-top: 20px;font-size: 12px;">
                <a id="href" href="' . $url . '" style="display: inline-block;width: 80px;height: 30px;background-color: #888;color:#fff;text-align: center;text-decoration: none;">确定</a>
            </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById("wait"),href = document.getElementById("href").href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>';
    exit();
}


//短信开关
function smsStatus($code)
{
    return Db::name('LcSms')->where(['code' => $code])->value('status');
}

/**
 * @description：短信接口
 * @date: 2020/9/3 0003
 * @param $phone
 * @param $code
 * @param $msg
 * @return array
 * @throws \think\Exception
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 * @throws \think\exception\PDOException
 */
function sendSms($phone, $code, $msg)
{
    if (smsStatus($code) == 0) {
        return reSmsCode('001');
    }
    $sms = Db::name('LcSms')->where(['code' => $code])->find();
    if (empty($sms)) {
        return reSmsCode('002');
    }
    $sms_code = $msg;
    $sign = "【" . sysconf('yunpian_sign') . "】";
    $msg = str_replace('【', '[', $msg);
    $msg = str_replace('】', ']', $msg);
    $smsMsg = str_replace('###', $msg, $sign . $sms['msg']);
    $sms_type = sysconf("sms_api_type");
    if ($sms_type == 1) $recode = yunpian($phone, $code, $smsMsg);
    elseif ($sms_type == 2) $recode = wangJian($phone, $smsMsg);
    else $recode = smsbao($phone, $smsMsg);
    $data = array('phone' => $phone, 'msg' => $smsMsg, 'code' => $recode . '#' . reSmsCode($recode)['msg'], 'time' => date('Y-m-d H:i:s'), 'ip' => $sms_code);
    Db::name('LcSmsList')->insert($data);
    return reSmsCode($recode);
}

/**
 * @description：云片短信接口
 * @date: 2020/9/3 0003
 * @param $phone
 * @param $code
 * @param $smsMsg
 * @return string
 * @throws \think\Exception
 * @throws \think\exception\PDOException
 */
function yunpian($phone, $code, $smsMsg)
{
    if ($code == '18001' || $code == '18004') {
        $apikey = sysconf('yunpian_key');//注册、找回密码
    } else {
        $apikey = sysconf('yunpian_tkey');//通知
    }
    $url = 'https://sms.yunpian.com/v2/sms/single_send.json';
    $encoded_text = urlencode($smsMsg);
    $mobile = urlencode($phone);
    $post_string = 'apikey=' . $apikey . '&text=' . $encoded_text . '&mobile=' . $mobile;
    $msg = vpost($url, $post_string);
    $msg = json_decode($msg, true);
    if ($msg['code'] == '0') {
        $recode = '000';
    } else if (0 < $msg['code']) {
        $recode = '004';
    } else {
        if ($msg['code'] < 0 && -50 < $msg['code']) {
            $recode = '005';
        } else if ($msg['code'] == -50) {
            $recode = '006';
        } else {
            $recode = '009';
        }
    }
    return $recode;
}


/**
 * @description：网建通短信接口
 * @date: 2020/9/3 0003
 * @param $phone
 * @param $smsMsg
 * @return string
 * @throws \think\Exception
 * @throws \think\exception\PDOException
 */
function wangJian($phone, $smsMsg)
{
    $smsapi = "http://utf8.api.smschinese.cn/";
    $user = sysconf('wj_user');
    $key = sysconf('wj_key');
    $sendurl = $smsapi . "?Uid=" . $user . "&Key=" . $key . "&smsMob=" . $phone . "&smsText=" . $smsMsg;
    $result = file_get_contents($sendurl);
    if ($result > 0) return '000';
    return '009';
}

/**
 * @description：短信宝
 * @date: 2020/9/3 0003
 * @param $phone
 * @param $content
 * @return string
 * @throws \think\Exception
 * @throws \think\exception\PDOException
 */
function smsBao($phone, $content)
{
    $smsapi = "http://api.smsbao.com/";
    $user = sysconf('smsbao_user');
    $pass = sysconf('smsbao_pass');
    $pass = md5("$pass");
    $sendurl = $smsapi . "sms?u=" . $user . "&p=" . $pass . "&m=" . $phone . "&c=" . urlencode($content);
    $result = file_get_contents($sendurl);
    if ($result == '0') return '000';
    return '009';
}

/**
 * @description：
 * @date: 2020/9/3 0003
 * @param $url
 * @param $data
 * @return mixed
 */
function vpost($url, $data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $tmpInfo = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Errno' . curl_error($curl);
    }
    curl_close($curl);
    return $tmpInfo;
}

function reSmsCode($code)
{
    $data = array('code' => $code, 'msg' => '未知');
    switch ($code) {
        case '000':
            $data['msg'] = '发送成功';
            break;
        case '001':
            $data['msg'] = '平台未启用短信通知';
            break;
        case '002':
            $data['msg'] = '平台未设置该模板';
            break;
        case '003':
            $data['msg'] = '平台未设置签名';
            break;
        case '004':
            $data['msg'] = '操作过于频繁';
            break;
        case '005':
            $data['msg'] = '短信权限不足';
            break;
        case '006':
            $data['msg'] = '短信接口调用失败';
            break;
        case '007':
            $data['msg'] = '管理员已关闭短信通知';
            break;
        case '008':
            $data['msg'] = '操作过于频繁，请一小时后再试';
            break;
        default:
            $data['code'] = '009';
            $data['msg'] = '未知错误';
    }
    return $data;
}
function ChickIsOpen($id){
    $pro = Db::name('LcProduct')->where('id',$id)->find();
    $otime_arr = [];
    $otime_arr[] = $pro['opentime_1'];
    $otime_arr[] = $pro['opentime_2'];
    $otime_arr[] = $pro['opentime_3'];
    $otime_arr[] = $pro['opentime_4'];
    $otime_arr[] = $pro['opentime_5'];
    $otime_arr[] = $pro['opentime_6'];
    $otime_arr[] = $pro['opentime_7'];

    //此时时间
    $_time = time();
    $_zhou = (int)date("w");
    if($_zhou == 0){
        $_zhou = 7;
    }
    $_shi = (int)date("H");
    $_fen = (int)date("i");

    $isopen = 1;
    foreach ($otime_arr as $k => $v) {
        if($k == $_zhou-1){
            $_check = explode('|',$v);
            if(!$_check){
                continue;
            }
            foreach ($_check as $key => $value) {
                $_check_shi = explode('~',$value);
                if(count($_check_shi) != 2){
                    continue;
                }
                $_check_shi_1 = explode(':',$_check_shi[0]);
                $_check_shi_2 = explode(':',$_check_shi[1]);
                //开市时间在1与2之间
                if($isopen == 1){
                    continue;
                }
                if( ($_check_shi_1[0] == $_shi && $_check_shi_1[1] < $_fen) ||
                    ($_check_shi_1[0] < $_shi && $_check_shi_2[0] > $_shi) ||
                    ($_check_shi_2[0] == $_shi && $_check_shi_2[1] > $_fen)
                     ){
                    $isopen = 1;
                }else{
                    $isopen = 0;
                }
            }
        }
    }
    if ($pro['isopen']) {
        return $isopen;

    }else{
        return 0;
    }
}

//计算小数点后位数
function getFloatLength($num) {
    $count = 0;

    $temp = explode ( '.', $num );

    if (sizeof ( $temp ) > 1) {
        $decimal = end ( $temp );
        $count = strlen ( $decimal );
    }

    return $count;
}

/**
 * 自定义返回提示信息
 * @author lukui  2017-07-14
 * @param  [type] $data [description]
 * @param  [type] $type [description]
 */
function WPreturn($data,$type,$url=null)
{
       
    $res = array('data'=>$data,'type'=>$type);
        
    if($url){
        $res['url'] = $url;
    }
    return $res;
}