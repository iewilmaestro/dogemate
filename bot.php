<?php
error_reporting(0);
system("rm -rv .session");
system("mkdir .session");
function col($str,$color){
$war=array('ht'=>"\033[0;30m",'p'=>"\033[1;37m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'hp'=>"\033[0;30m\33[37;1m",'ss'=>"\033[0;30m",'rg'=>"\033[102m\033[1;34m");return $war[$color].$str."\033[0m";}
function get($url, $ua){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
	curl_setopt($ch, CURLOPT_COOKIEJAR, ".session/cfg");
	curl_setopt($ch, CURLOPT_COOKIEFILE, ".session/cfg");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}
function post($url, $ua, $data){
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, ".session/cfg");
        curl_setopt($ch, CURLOPT_COOKIEFILE, ".session/cfg");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
}
function explod($hasil,$exp1,$exp2,$exp3){
	$hasil2 = explode($exp1,$hasil)[$exp3];
	$hasil1 = explode($exp2,$hasil2)[0];
	return $hasil1;}
function bn(){
	echo col('Script by ','h')."iewil".$n2;
	}
function c(){system('clear');}$n = "\n";$n2 = "\n\n";$t = "\t";$r="\r                                                              \r";
c();
echo $n;
$user=readline('Input User-agent: ');
echo$n;
$cookie=readline('Input Cookie: ');
c();
bn();
$ua = array();
$ua[]="cookie: ".$cookie;
$ua[]="user-agent: ".$user;

$r1 = get('https://dogemate.com/dashboard', $ua);

$us = explod($r1,'<span class="mr-2 d-none d-lg-inline small">','</span>',1);
$bal = explod($r1,'<i class="far fa-money-bill-alt mx-2 mobile-none"></i>','</span>',1);
if($us){
echo col("Login as ","h").col("=> ","m").col($us,"p").$n;
echo col("Balance ","h").col("=> ","m").col($bal,"p").$n2;
}else{
	echo col("Failed Login!, Update Wallet and Cookie","rr").$n;
	exit;
	}
while(true){
sleep(1);
$r2 = get('https://dogemate.com/ptc', $ua);
$link = explod($r2,"https://dogemate.com/ptc/link/","'",1);
if($link == ""){
	echo col("Not Have Enough Active PTC Ads","rr").col("","hp").$n;
	exit;}

$r3 = get('https://dogemate.com/ptc/link/'.$link, $ua);

$tmr = explod($r3,'var timer = ',';',1);
$link2 = explod($r3,'<form action="','" id="ptcview" method="post" accept-charset="utf-8">',1);
$token = explod($r3,'input type="hidden" name="csrf_dms" value="','"',1);
$img1 = explod($r3,"https://dogemate.com/assets/icons/crypto/icon/",".png", 1);
$img2 = explod($r3,"https://dogemate.com/assets/icons/crypto/icon/",".png", 2);
$img3 = explod($r3,"https://dogemate.com/assets/icons/crypto/icon/",".png", 3);
$img4 = explod($r3,"https://dogemate.com/assets/icons/crypto/icon/",".png", 4);

$cap = array($img1, $img2, $img3, $img4);
foreach(array_unique($cap) as $v){ if($v != "" ){$captcha = $v; }}

for($x=$tmr; $x>-1; $x--){
	echo$r;
	echo "View Vidio in ".$x." Seconds";
	sleep(1);
	}
	echo$r;
	
$data = "csrf_dms=".$token."&crypto_icon_response=".$captcha."&dms_pot=";
$r4 = post($link2, $ua, $data);
$hasil7 = explod($r4,"ToastrMsg('","',",1);
echo col("Trying bypass ","k");
sleep(2);
//$r5 = get('https://dogemate.com/ptc', $ua);
if($hasil7 == ""){
	echo$r;
	echo col("Failed bypass","rr").col("","hp");
	sleep(2);
	echo$r;
	}
	else{
		echo$r;
		echo col("Success Bypass","rg").col("","hp");
		sleep(2);
		echo$r;
		echo col($hasil7,"h").$n;}
}

	
	
	
	
	
