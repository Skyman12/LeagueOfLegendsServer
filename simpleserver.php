<?php
header("Access-Control-Allow-Origin: *");

$apiKey = '941d558c-76a3-4e0a-b90a-1c59c34623cd';

if (isset($_REQUEST['action'])) {
	session_start();
    switch ($_REQUEST['action']) {
		case 'getSummonerData':
            getSummonerData($_REQUEST['summonerName']);
            break;
		case 'getRankedStatsData':
            getRankedStatsData($_REQUEST['summonerId']);
            break;
    }
}

function getSummonerData($summonerName) {
	// get the basic summoner info
	$result = 'https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' . $summonerName . '?api_key=' . $GLOBALS['apiKey'];
	$summoner = curl_get_contents($result);
	echo $summoner;
}

function getRankedStatsData($summonerId) {
	$result = 'https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/' . $summonerId . '/ranked?api_key=' . $GLOBALS['apiKey'];
	$rankedStatsData = curl_get_contents($result);
	echo $rankedStatsData;
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