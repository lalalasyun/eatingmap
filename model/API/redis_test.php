<?php
    $redis = new Redis();
    $redis->connect('localhost', 6379);
    $redis->set('mail', 'value', 60 * 5);
    echo $redis->get('id');
     
    $redis->close();
?>