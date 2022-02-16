<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academy;

use DB;

class AcademyController extends Controller
{
	function index()
	{
		$rules = (new Academy())->getRuleHome();

		$ranks = (new Academy())->getRank();

		$rights = (new Academy())->getRight();

		$threeMonthsAgo = date('Ymd', strtotime(date('Ymd').' -90 day'));

		$champion = (new Academy())->getChampionInfo($threeMonthsAgo);

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

		$yourselPoint = (new Academy())->getYourselfPoint($threeMonthsAgo, $yourselfID);

		$yourselCom = (new Academy())->getYourselfCom($threeMonthsAgo, $yourselfID);

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

		$arrRankPoint = (new Academy())->getRankPoint();

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

		$offlineEvent = (new Academy())->getOfflineEvent();

		$onlineEvent = (new Academy())->getOnlineEvent();

		$lession = (new Academy())->getLession();

		$sectionInLession = (new Academy())->getAllSection();

		$qa = (new Academy())->getAllQA();

		$incentives = (new Academy())->getAllIncentive($yourRankID);

		return view("academy.index", compact(
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
			'offlineEvent', 
			'onlineEvent', 
			'lession', 
			'sectionInLession', 
			'qa', 
			'yourRankID',
			'incentives'));
	}

	//=======================================================================================================

	function checkAID()
	{
		if(auth()->user()->account_id != "affiliateteam") {
			abort(404);
		}
	}

	function adminRank()
	{
		$this->checkAID();
		$ranks = (new Academy())->getRank();
		return view("academy.admin.academy_rank", compact('ranks'));
	}

	function getRankById(Request $request){
		$this->checkAID();
		$rankId = $request->rankId;
		$rank = (new Academy())->getRankById($rankId);
		return json_encode($rank);
	}

	function updatetRank(Request $request)
	{
		$this->checkAID();
		$id = $request->id;
		$name = $request->name;
		$point = $request->point;
		if(!empty($_FILES['icon']['name'])) {
			if (move_uploaded_file($_FILES['icon']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['icon']['name'])) {
				$icon = $_FILES['icon']['name'];
				$data = array(
					"NAME" => $name, 
					"POINT" => $point, 
					"ICON" => $icon);
				$update = (new Academy())->updateRank($id, $data);
				return json_encode("Cập nhật thành công!");
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		} else {
			$data = array("NAME" => $name, "POINT" => $point);
			$update = (new Academy())->updateRank($id, $data);
			return json_encode("Cập nhật thành công!");
		}

	}

	function insertRank(Request $request)
	{
		$this->checkAID();
		$maxID = (new Academy())->getRankMaxId();

		$name = $request->name;
		$point = $request->point;
		if(!empty($_FILES['icon']['name'])) {
			if (move_uploaded_file($_FILES['icon']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['icon']['name'])) {
				$icon = $_FILES['icon']['name'];
				$data = array(
					"ID" => ($maxID + 1), 
					"NAME" => $name, 
					"POINT" => $point, 
					"ICON" => $icon);
				$insert = (new Academy())->insertRank($data);
				return json_encode("Thêm mới thành công!");
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		} else {
			$data = array(
				"ID" => ($maxID + 1), 
				"NAME" => $name, 
				"POINT" => $point);
			$insert = (new Academy())->insertRank($data);
			return json_encode("Thêm mới thành công!");
		}
	}

	//==============================================================================================================

	function adminOnlineEvent()
	{
		$this->checkAID();
		$onlineEvents = (new Academy())->getOnlineEvent();
		return view("academy.admin.academy_online_event", compact('onlineEvents'));
	}

	function getOnlineEventById(Request $request){
		$this->checkAID();
		$onlineEventId = $request->onlineEventId;
		$onlineEvent = (new Academy())->getOnlineEventById($onlineEventId);
		return json_encode($onlineEvent);
	}

	function updatetOnlineEvent(Request $request)
	{
		$this->checkAID();
		$id = $request->id;
		$event_name = $request->event_name;
		$event_link = $request->event_link;
		if(!empty($_FILES['event_banner']['name'])) {
			if (move_uploaded_file($_FILES['event_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_banner']['name'])) {
				$event_banner = $_FILES['event_banner']['name'];
				$data = array(
					"EVENT_NAME" => $event_name, 
					"EVENT_LINK" => $event_link, 
					"EVENT_BANNER" => $event_banner);
				$update = (new Academy())->updateOnlineEvent($id, $data);
				return json_encode("Cập nhật thành công!");
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		} else {
			$data = array("EVENT_NAME" => $event_name, "EVENT_LINK" => $event_link);
			$update = (new Academy())->updateOnlineEvent($id, $data);
			return json_encode("Cập nhật thành công!");
		}

	}

	function insertOnlineEvent(Request $request)
	{
		$this->checkAID();
		$maxID = (new Academy())->getOnlineEventMaxId();

		$event_name = $request->event_name;
		$event_link = $request->event_link;

		if(!empty($_FILES['event_banner']['name'])) {
			if (move_uploaded_file($_FILES['event_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_banner']['name'])) {
				$event_banner = $_FILES['event_banner']['name'];
				$data = array(
					"ID" => ($maxID + 1), 
					"EVENT_NAME" => $event_name, 
					"EVENT_LINK" => $event_link, 
					"EVENT_BANNER" => $event_banner);
				$insert = (new Academy())->insertOnlineEvent($data);
				return json_encode("Thêm mới thành công!");
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		} else {
			$data = array(
				"ID" => ($maxID + 1), 
				"EVENT_NAME" => $event_name, 
				"EVENT_LINK" => $event_link);
			$insert = (new Academy())->insertOnlineEvent($data);
			return json_encode("Thêm mới thành công!");
		}
	}

	function deleteOnlineEvent(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$query = (new Academy())->deleteOnlineEvent($id);

		return json_encode($query);
	}

	//=============================================================================================================

	function adminOfflineEvent()
	{
		$this->checkAID();
		$offlineEvents = (new Academy())->getOfflineEvent();
		return view("academy.admin.academy_offline_event", compact('offlineEvents'));
	}

	function getOfflineEventById(Request $request){
		$this->checkAID();
		$offlineEventId = $request->offlineEventId;
		$offlineEvent = (new Academy())->getOfflineEventById($offlineEventId);
		return json_encode($offlineEvent);
	}

	function updateOfflineEvent(Request $request)
	{
		$this->checkAID();
		$id = $request->id;
		$event_name = $request->event_name;
		$event_place = $request->event_place;
		$event_time = $request->event_time;
		$event_url = $request->event_url;
		if(!empty($_FILES['event_link_banner']['name'])) {
			if (move_uploaded_file($_FILES['event_link_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_link_banner']['name'])) {
				$event_link_banner = $_FILES['event_link_banner']['name'];
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		}
		if(!empty($_FILES['event_link_content']['name'])) {
			if (move_uploaded_file($_FILES['event_link_content']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_link_content']['name'])) {
				$event_link_content = $_FILES['event_link_content']['name'];
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		}
		if(!empty($_FILES['event_banner_mobile']['name'])) {
			if (move_uploaded_file($_FILES['event_banner_mobile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_banner_mobile']['name'])) {
				$event_banner_mobile = $_FILES['event_banner_mobile']['name'];
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		}

		if(isset($event_link_banner)) {
			if(isset($event_link_content)) {
				$data = array(
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_BANNER" => $event_link_banner, 
					"EVENT_LINK_CONTENT" => $event_link_content,
					"EVENT_URL" => $event_url
				);
			} else {
				$data = array(
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_BANNER" => $event_link_banner,
					"EVENT_URL" => $event_url
				);
			}
		} else {
			if(isset($event_link_content)) {
				$data = array(
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_CONTENT" => $event_link_content,
					"EVENT_URL" => $event_url
				);
			} else {
				$data = array(
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time,
					"EVENT_URL" => $event_url
				);
			}
		}
		if(isset($event_banner_mobile)) {
			$data["EVENT_BANNER_MOBILE"] = $event_banner_mobile;
		}
		$update = (new Academy())->updateOfflineEvent($id, $data);
		return json_encode("Cập nhật thành công!");
	}

	function insertOfflineEvent(Request $request)
	{
		$this->checkAID();
		$maxID = (new Academy())->getOfflineEventMaxId();

		$event_name = $request->event_name;
		$event_place = $request->event_place;
		$event_time = $request->event_time;
		$event_url = $request->event_url;
		if(!empty($_FILES['event_link_banner']['name'])) {
			if (move_uploaded_file($_FILES['event_link_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_link_banner']['name'])) {
				$event_link_banner = $_FILES['event_link_banner']['name'];
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		}
		if(!empty($_FILES['event_link_content']['name'])) {
			if (move_uploaded_file($_FILES['event_link_content']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_link_content']['name'])) {
				$event_link_content = $_FILES['event_link_content']['name'];
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		}
		if(!empty($_FILES['event_banner_mobile']['name'])) {
			if (move_uploaded_file($_FILES['event_banner_mobile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['event_banner_mobile']['name'])) {
				$event_banner_mobile = $_FILES['event_banner_mobile']['name'];
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		}

		if(isset($event_link_banner)) {
			if(isset($event_link_content)) {
				$data = array(
					"ID" => ($maxID + 1),
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_BANNER" => $event_link_banner, 
					"EVENT_LINK_CONTENT" => $event_link_content,
					"EVENT_URL" => $event_url
				);
			} else {
				$data = array(
					"ID" => ($maxID + 1),
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_BANNER" => $event_link_banner,
					"EVENT_URL" => $event_url
				);
			}
		} else {
			if(isset($event_link_content)) {
				$data = array(
					"ID" => ($maxID + 1),
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time, 
					"EVENT_LINK_CONTENT" => $event_link_content,
					"EVENT_URL" => $event_url
				);
			} else {
				$data = array(
					"ID" => ($maxID + 1),
					"EVENT_NAME" => $event_name, 
					"EVENT_PLACE" => $event_place, 
					"EVENT_TIME" => $event_time,
					"EVENT_URL" => $event_url
				);
			}
		}
		if(isset($event_banner_mobile)) {
			$data["EVENT_BANNER_MOBILE"] = $event_banner_mobile;
		}
		$update = (new Academy())->insertOfflineEvent($data);
		return json_encode("Thêm mới thành công!");
	}

	function deleteOfflineEvent(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$query = (new Academy())->deleteOfflineEvent($id);

		return json_encode($query);
	}

	//===========================================================================================================

	function adminSection()
	{
		$this->checkAID();
		$arrLesson = (new Academy())->getLession();

		$data = (new Academy())->getSection($arrLesson);

		return view("academy.admin.academy_section", compact('data', 'arrLesson'));
	}

	function getSectionById(Request $request){
		$this->checkAID();
		$sectionId = $request->sectionId;
		$section = (new Academy())->getSectionById($sectionId);
		return json_encode($section);
	}

	function updateSection(Request $request){
		$this->checkAID();
		$id = $request->id;
		$section_name = $request->section_name;
		$lession_id = $request->lession_id;
		$section_video = $request->section_video;
		$section_pdf = $request->section_pdf;
		$section_ppt = $request->section_ppt;

		$data = array(
			"LESSION_ID" => $lession_id,
			"SECTION_NAME" => $section_name,
			"SECTION_VIDEO" => $section_video,
			"SECTION_PDF" => $section_pdf,
			"SECTION_PPT" => $section_ppt
		);

		$update = (new Academy())->updateSection($id, $data);
		return json_encode("Cập nhật thành công!");
	}

	function insertSection(Request $request){
		$this->checkAID();
		$maxID = (new Academy())->getSectionMaxId();

		$section_name = $request->section_name;
		$lession_id = $request->lession_id;
		$section_video = $request->section_video;
		$section_pdf = $request->section_pdf;
		$section_ppt = $request->section_ppt;

		$data = array(
			"ID" => ($maxID + 1),
			"LESSION_ID" => $lession_id,
			"SECTION_NAME" => $section_name,
			"SECTION_VIDEO" => $section_video,
			"SECTION_PDF" => $section_pdf,
			"SECTION_PPT" => $section_ppt
		);

		$update = (new Academy())->insertSection($data);
		return json_encode("Thêm thành công!");
	}

	function deleteSection(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$delete = (new Academy())->deleteSection($id);

		return json_encode($delete);
	}

	//===========================================================================================================

	function adminQA()
	{
		$this->checkAID();
		$arrRank = (new Academy())->getRank();

		$data = (new Academy())->getQA($arrRank);

		return view("academy.admin.academy_qa", compact('data', 'arrRank'));
	}

	function getqaById(Request $request){
		$this->checkAID();
		$qaId = $request->qaId;
		$qa = (new Academy())->getQAById($qaId);
		return json_encode($qa);
	}

	function updateQA(Request $request){
		$this->checkAID();
		$id = $request->id;
		$qa_question = $request->qa_question;
		$qa_answer = $request->qa_answer;
		$rank_id = $request->rank_id;

		$data = array(
			"QA_QUESTION" => $qa_question,
			"QA_ANSWER" => $qa_answer,
			"RANK_ID" => $rank_id
		);

		$update = (new Academy())->updateQA($id, $data);
		return json_encode("Cập nhật thành công!");
	}

	function insertQA(Request $request){
		$this->checkAID();
		$maxID = (new Academy())->getQAMaxId();

		$qa_question = $request->qa_question;
		$qa_answer = $request->qa_answer;
		$rank_id = $request->rank_id;

		$data = array(
			"ID" => ($maxID + 1),
			"QA_QUESTION" => $qa_question,
			"QA_ANSWER" => $qa_answer,
			"RANK_ID" => $rank_id
		);

		$insert = (new Academy())->insertQA($data);
		return json_encode("Thêm mới thành công!");
	}

	function deleteQA(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$delete = (new Academy())->deleteQA($id);

		return json_encode($delete);
	}

	//=========================================================================================================

	function adminIncentive()
	{
		$this->checkAID();
		$arrRank = (new Academy())->getRank();

		$data = (new Academy())->getIncentive();

		return view("academy.admin.academy_incentive", compact('data', 'arrRank'));
	}

	function getIncentiveById(Request $request){
		$this->checkAID();
		$incentiveId = $request->incentiveId;
		$incentive = (new Academy())->getIncentiveById($incentiveId);

		return json_encode($incentive);
	}

	function updateIncentive(Request $request)
	{
		$this->checkAID();
		$id = $request->id;
		$incentive_name = $request->incentive_name;
		$incentive_link = $request->incentive_link;
		$rank_id = $request->rank_id;
		if(!empty($_FILES['incentive_banner']['name'])) {
			if (move_uploaded_file($_FILES['incentive_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['incentive_banner']['name'])) {
				$incentive_banner = $_FILES['incentive_banner']['name'];
				$data = array(
					"INCENTIVE_BANNER" => $incentive_banner,
					"INCENTIVE_LINK" => $incentive_link, 
					"RANK_ID" => $rank_id,
					"INCENTIVE_NAME" => $incentive_name
				);
				$update = (new Academy())->updateIncentive($id, $data);
				return json_encode("Cập nhật thành công!");
			} else {
				return json_encode("Cập nhật thất bại!");
			}
		} else {
			$data = array(
				"INCENTIVE_LINK" => $incentive_link, 
				"RANK_ID" => $rank_id,
				"INCENTIVE_NAME" => $incentive_name
			);
			$update = (new Academy())->updateIncentive($id, $data);
			return json_encode("Cập nhật thành công!");
		}
	}

	function insertIncentive(Request $request)
	{
		$this->checkAID();
		$maxID = (new Academy())->getIncentiveMaxId();

		$incentive_name = $request->incentive_name;
		$incentive_link = $request->incentive_link;
		$rank_id = $request->rank_id;

		if(!empty($_FILES['incentive_banner']['name'])) {
			if (move_uploaded_file($_FILES['incentive_banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/academy/' . $_FILES['incentive_banner']['name'])) {
				$incentive_banner = $_FILES['incentive_banner']['name'];
				$data = array(
					"ID" => ($maxID + 1),
					"INCENTIVE_BANNER" => $incentive_banner,
					"INCENTIVE_LINK" => $incentive_link, 
					"RANK_ID" => $rank_id,
					"INCENTIVE_NAME" => $incentive_name
				);
				$insert = (new Academy())->insertIncentive($data);
				return json_encode("Thêm mới thành công!");
			} else {
				return json_encode("Thêm mới thất bại!");
			}
		} else {
			$data = array(
				"ID" => ($maxID + 1),
				"INCENTIVE_LINK" => $incentive_link, 
				"RANK_ID" => $rank_id,
				"INCENTIVE_NAME" => $incentive_name
			);
			$insert = (new Academy())->insertIncentive($data);
			return json_encode("Thêm mới thành công!");
		}
	}

	function deleteIncentive(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$delete = (new Academy())->deleteIncentive($id);

		return json_encode($delete);
	}

	//=========================================================================================================

	function adminRight()
	{
		$this->checkAID();
		$rules = (new Academy())->getRule();

		$ranks = (new Academy())->getRank();

		$rights = (new Academy())->getRight();

		return view('academy.admin.academy_right', compact('rules', 'ranks', 'rights'));
	}

	function updateRightValue(Request $request)
	{
		$this->checkAID();
		$rank_id = $request->rank_id;
		$right_id = $request->right_id;
		$value = $request->value;

		$update = (new Academy())->updateRule($right_id, $rank_id, $value);

		return json_encode("Thay đổi trạng thái thành công");
	}

	function adminDashboard()
	{
		$this->checkAID();
		return view('academy.admin.index');
	}

	//===========================================================================================

	function adminBonus()
	{
		$this->checkAID();
		$arrRank = (new Academy())->getRank();

		$data = (new Academy())->getBonus();

		return view("academy.admin.academy_bonus", compact('data', 'arrRank'));
	}

	function getBonusById(Request $request){
		$this->checkAID();
		$bonusId = $request->bonusId;
		$bonus = (new Academy())->getBonusById($bonusId);

		return json_encode($bonus);
	}

	function updateBonus(Request $request){
		$this->checkAID();
		$id = $request->id;
		$bonus_name = $request->bonus_name;

		$data = array(
			"NAME" => $bonus_name
		);

		$update = (new Academy())->updateBonus($id, $data);
		return json_encode("Cập nhật thành công!");
	}

	function insertBonus(Request $request){
		$this->checkAID();
		$maxID = (new Academy())->getBonusMaxId();

		$bonus_name = $request->bonus_name;

		$data = array(
			"ID" => ($maxID + 1),
			"NAME" => $bonus_name
		);

		$insert = (new Academy())->insertBonus($data, $maxID + 1);

		return json_encode("Thêm mới thành công!");
	}

	function deleteBonus(Request $request)
	{
		$this->checkAID();
		$id = $request->id;

		$delete = (new Academy())->deleteBonus($id);

		return json_encode($delete);
	}
}
