<?php
//���ӱ��ص� Redis ����
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('123456');//��Ȩ
//���� redis �ַ�������
$redis->set("name", "fgf");
// ��ȡ�洢�����ݲ����
echo $redis->get("name");
