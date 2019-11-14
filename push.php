<?php

$redis = new Redis();

$redis->connect('127.0.0.1',6379);

$password = '123456';

$redis->auth($password);

$arr = array('h'=>'hello','e','l','l','o','w','o','r','l','d');

foreach($arr as $k=>$v){

    $redis->rpush("mylist",$v);

}