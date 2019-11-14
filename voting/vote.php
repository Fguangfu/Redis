<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('123456');
$redis->select(1);//选择数据库1

//计算每个用户的总票数
$uid = intval($_GET['uid']);
//$uid = mt_rand(1,3);//随机指定投票人员，方便进行压力测试
echo $redis->incr($uid);
$voteid = $redis->incr('global_voteid');
$redis->set('vote:' . $voteid . ':uid', $uid);
$ip = $_SERVER['REMOTE_ADDR'];
$redis->set('vote:' . $voteid . ':ip', $ip);
$redis->set('vote:' . $voteid . ':time', time());