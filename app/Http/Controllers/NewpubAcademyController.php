<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academy;

use DB;

class NewpubAcademyController extends Controller
{
	function index()
	{
		$rules = Academy::getRuleHome();

		$ranks = Academy::getRank();

		$rights = Academy::getRight();

		$threeMonthsAgo = date('Ymd', strtotime(date('Ymd').' -90 day'));

		$champion = Academy::getChampionInfo($threeMonthsAgo);

		foreach ($champion as $c) {
			$championName = $c->acc_id;
			$sum_of_1 = $c->sum_of_1;
			break;
		}

		$fakeName[0] = "handoivodoi";
		$fakeName[1] = "chandoiditu";
		$fakeName[2] = "haohanchanchinh";
		$fakeName[3] = "tuongcuopmientay";
		$fakeName[4] = "deptrailamtai";
		$fakeName[5] = "somidongthung";
		$fakeName[6] = "thichlachem";
		$fakeName[7] = "chaunhuanphat";
		$fakeName[8] = "nhanchungsong";
		$fakeName[9] = $championName;
		for($n = 0; $n < count($fakeName); $n++) {
			$nameHide = substr($fakeName[$n], 0, 3);
			for($m = 3; $m < strlen($championName); $m++) {
				$nameHide .= "*";
			}
			$fakeName[$n] = $nameHide;
		}

		$top10[0] = number_format($sum_of_1/1000, 0, ",", ".");
		$top10[1] = number_format(($sum_of_1 * 1.2 + 117)/1000, 0, ",", ".");
		$top10[2] = number_format(($sum_of_1 * 1.6 + 119)/1000, 0, ",", ".");
		$top10[3] = number_format(($sum_of_1 * 1.95 + 215)/1000, 0, ",", ".");
		$top10[4] = number_format(($sum_of_1 * 2.573 + 295)/1000, 0, ",", ".");
		$top10[5] = number_format(($sum_of_1 * 3.573 + 457)/1000, 0, ",", ".");
		$top10[6] = number_format(($sum_of_1 * 4.573 + 657)/1000, 0, ",", ".");
		$top10[7] = number_format(($sum_of_1 * 5.573 + 753)/1000, 0, ",", ".");
		$top10[8] = number_format(($sum_of_1 * 6.573 + 857)/1000, 0, ",", ".");
		$top10[9] = number_format(($sum_of_1 * 7.573 + 1200)/1000, 0, ",", ".");

		$yourselfID = auth()->user()->account_id;

		$yourselPoint = Academy::getYourselfPoint($threeMonthsAgo, $yourselfID);

		$yourselCom = Academy::getYourselfCom($threeMonthsAgo, $yourselfID);

		if($yourselPoint == null) {
			$yourselPoint = 0;
		} else {
			$yourselPoint = $yourselPoint->sum_of_1;
		}

		if($yourselCom == null) {
			$yourselCom = 0;
		} else {
			$yourselCom = $yourselCom->sum_of_1;
		}

		$yourselPoint = $yourselPoint/1000;

		$yourselCom = number_format($yourselCom, 0, ',', '.');

		$arrRankPoint = Academy::getRankPoint();

		foreach($arrRankPoint as $k => $p){
			if((int)($yourselPoint) >= (int)($arrRankPoint[count($arrRankPoint) - 1]->point)) {
				$startPoint = $arrRankPoint[count($arrRankPoint) - 2]->point;
				$endPoint = $arrRankPoint[count($arrRankPoint) - 1]->point;
				$yourRank = $arrRankPoint[count($arrRankPoint) - 1]->name;
				$yourIcon = $arrRankPoint[count($arrRankPoint) - 1]->icon;
				$yourRankID = $arrRankPoint[count($arrRankPoint) - 1]->id;
			}
			if((int)($yourselPoint) < (int)($p->point)){
				if($k == 1) {
					$startPoint = 0;
					$endPoint = $p->point;
					$yourRank = $arrRankPoint[0]->name;
					$yourIcon = $arrRankPoint[0]->icon;
					$yourRankID = $arrRankPoint[0]->id;
				} else {
					if((int)($yourselPoint) > (int)($arrRankPoint[$k - 1]->point)){
						$startPoint = $arrRankPoint[$k - 1]->point;
						$endPoint = $p->point;
						$yourRank = $arrRankPoint[$k - 1]->name;
						$yourIcon = $arrRankPoint[$k - 1]->icon;
						$yourRankID = $arrRankPoint[$k - 1]->id;
					}
				}
			}
		}

		if($startPoint) {
			$startPoint = number_format($startPoint, 0, ',', '.');
		}
		if($endPoint) {
			$endPoint = number_format($endPoint, 0, ',', '.');
		}

		$yourselPoint = number_format($yourselPoint, 0, ',', '.');

		$offlineEvents = Academy::getOfflineEvent();

		$onlineEvents = Academy::getOnlineEvent();

		$lessions = Academy::getLession();

		$sectionsInLession = Academy::getAllSection();

		$qas = Academy::getAllQA();

		$incentives = Academy::getAllIncentive($yourRankID);

		$newbieVideos = Academy::getNewbieVideo();

		return view("newpub_academy.index", compact(
			'rules', 
			'ranks', 
			'rights', 
			'top10', 
			'fakeName', 
			'yourselPoint', 
			'yourselCom', 
			'startPoint', 
			'endPoint', 
			'yourRank', 
			'yourIcon', 
			'offlineEvents', 
			'onlineEvents', 
			'lessions', 
			'sectionsInLession', 
			'qas', 
			'yourRankID',
			'incentives',
			'newbieVideos'
		));
	}
}