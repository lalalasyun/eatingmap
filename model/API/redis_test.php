<?php
    $redis = new Redis();
    $redis->connect('localhost', 6379);
    echo $redis->get('id');
     
    $redis->close();
?>