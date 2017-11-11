<?php

$config['socket_type'] = 'tcp'; //`tcp` or `unix`
$config['socket'] = '/var/run/redis.sock'; // in case of `unix` socket type
$config['host'] = '192.168.150.12';
$config['password'] = NULL;
$config['port'] = 6379;
$config['timeout'] = 0;