<?php

// TODO 这些参数根据实际情况赋值
$app_key = '';
$app_secret = '';

$timestamp = $_POST['timestamp'];
$order_id = $_POST['orderId'];
$sign = $_POST['sign'];
$user_id = $_POST['userId'];
$prize_flag = $_POST['prizeFlag'];
$score = $_POST['score'];

// 时效性验证
if (time() * 1000 - $timestamp > 300000) {
	$arr = array('code' => '-1', 'msg' => '时效性验证失败', 'orderId' => $order_id);
	echo json_encode($arr);
	exit();
}

// 签名验证
$str = $timestamp . $prize_flag . $order_id . $app_key . $app_secret;
if (empty($sign) || md5($str) != $sign) {
	$arr = array('code' => '-1', 'msg' => '签名验证失败', 'orderId' => $order_id);
	echo json_encode($arr);
	exit();
}


// TODO 给用户发放奖励的业务逻辑


$arr = array('code' => '0', 'msg' => '成功', 'orderId' => $order_id);
echo json_encode($arr);
?>
