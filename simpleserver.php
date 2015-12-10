<?php
header("Access-Control-Allow-Origin: *");

$apiKey = '941d558c-76a3-4e0a-b90a-1c59c34623cd';

if (isset($_REQUEST['action'])) {
	session_start();
    switch ($_REQUEST['action']) {
        case 'CreatePost':
            getGameData();
            break;
		case 'Update':
            updatePost();
            break;
		case 'getSummonerData':
            getSummonerData($_REQUEST['summonerName']);
            break;
    }
}

function getGameData() {
	$summonerName = 'skyman12';
 
	// get the basic summoner info
	$result = 'https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' . $summonerName . '?api_key=' . $GLOBALS['apiKey'];
	$summoner = curl_get_contents($result);
	// $summoner = json_decode(curl_get_contents($result))->$summonerName;
	echo $summoner;
}

function getSummonerData($summonerName) {
	// get the basic summoner info
	$result = 'https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' . $summonerName . '?api_key=' . $GLOBALS['apiKey'];
	$summoner = curl_get_contents($result);
	echo $summoner;
}

function curl_get_contents($url)
{
  $ch = curl_init($url);
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

?>