<?php
require_once('./line_class.php');
$channelAccessToken = 'qTUqjN7AF75WZ1J2c2Ko0v4i31O6/LQpbcDBWuXCeXIpmpstbgSUmjIQ6aV5Oig9oV8jRe88/7eqtJnAfNMwgGA2gS/NEnLOrLpAoKFbJM3fWcsrUAO3ZIaG+Sbrf48hUUpRhhqj5d8H18uqdA+bwQdB04t89/1O/w1cDnyilFU='; //Channel access token
$channelSecret = 'b2fc02897081519edbc1bc1733d2432f';//Channel secret
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$replyToken = $client->parseEvents()[0]['replyToken'];
$message 	= $client->parseEvents()[0]['message'];
$msg_type = $message['type'];
$botname = "KerangAjaib"; //Nama bot
function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}
function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Bisa jadi',
		'Mungkin',
		'Tentu tidak',
		'Coba tanya lagi'
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}
if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} else {}
if(isset($balas)){
    $client->replyMessage($balas); 
    $result =  json_encode($balas);
    file_put_contents($botname.'.json',$result);
}
