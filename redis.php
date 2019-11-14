<?php
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('123456');//授权
//设置 redis 字符串数据
$redis->set("name", "fgf");
// 获取存储的数据并输出
echo $redis->get("name");
