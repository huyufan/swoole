<?php
$serv=new swoole_server("127.0.0.1",9501);
$serv->on('connect',function($serv,$fd){
   echo "Client:Connect.\n"; 
});

$serv->on('receive',function($serv,$fd,$from_id,$data){
    swoole_timer_tick(1000, function ($timer_id) {
    echo "tick-2000ms\n";
});
    $serv->send($fd,"Server: ".$data);
});

$serv->on('close',function($serv,$fd){
   echo "Server:Close.\n"; 
});

$serv->start();