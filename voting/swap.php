<?php
//连接数据库
$pdo = new PDO('mysql:host=39.98.81.13;dbname=try', 'try', 'yn3emW6ksYhwwseh');
$pdo->query('set names utf8');

//连接redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('123456');
$redis->select(1);//选择数据库1
$time = time() + 3600;//时间设置到一小时后
//死循环
while ($time > time()) {
    $vid = $redis->get('global_voteid');//自增长的主键
    $last = $redis->get('last');//最近一次插入mysql的投票主键
    //如果没有插入数据库，刚开始的肯定为true
    if (!$last) {
        $last = 0;//设置为0
    }
    //如果所有的数据都被插入到MySQL中
    if ($vid == $last) {
        echo "wait\n";//输出等待
    } else {
        //进行插入到数据库操作
        $sql = 'insert into vote(vid,uid,ip,time) values';
        for ($i = $vid; $i > $last; $i--) {
            $k1 = 'vote:' . $i . ':uid';
            $k2 = 'vote:' . $i . ':ip';
            $k3 = 'vote:' . $i . ':time';
            $row = $redis->mget([$k1, $k2, $k3]);
            $sql .= "($i,$row[0],'$row[1]',$row[2]),";
            $redis->delete($k1, $k2, $k3);
        }
        $sql = substr($sql, 0, -1);
        $pdo->exec($sql);
        $redis->set('last', $vid);//设置插入的主键位置
        echo 'OK';
    }
    sleep(20);//每隔20秒执行循环
}