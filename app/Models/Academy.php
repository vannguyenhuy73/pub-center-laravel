<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
  static function getLession()
  {
    return DB::table("TACADEMY_LESSION")->get();
  }

  //==========================================================================================================

  static function getRank()
  {
    return DB::table('TRANK')->offset(1)->limit(50)->get();
  }

  function getRankById($rankId)
  {
    return DB::table('TRANK')->where('ID', '=', $rankId)->first();
  }

  function updateRank($rankId, $data)
  {
    return DB::table("TRANK")->where("ID", '=', $rankId)->update($data);
  }

  function getRankMaxId()
  {
    if(DB::table('TRANK')->select("ID")->orderBy('ID', 'DESC')->first()) {
      return DB::table('TRANK')->select("ID")->orderBy('ID', 'DESC')->first()->id;
    } else {
      return 0;
    }
  }

  function insertRank($data)
  {
    return DB::table("TRANK")->insert($data);
  }

    //====================================================================================================================

  static function getOnlineEvent()
  {
    return DB::table('TACADEMY_ONLINE_EVENT')->get();
  }

  function getOnlineEventById($onlineEventId)
  {
    return DB::table('TACADEMY_ONLINE_EVENT')->where('ID', '=', $onlineEventId)->first();
  }

  function updateOnlineEvent($onlineEventId, $data)
  {
    return DB::table("TACADEMY_ONLINE_EVENT")->where("ID", '=', $onlineEventId)->update($data);
  }

  function getOnlineEventMaxId()
  {
    if(DB::table('TACADEMY_ONLINE_EVENT')->select("ID")->orderBy('ID', 'DESC')->first()) {
      return DB::table('TACADEMY_ONLINE_EVENT')->select("ID")->orderBy('ID', 'DESC')->first()->id;
    } else {
      return 0;
    }
  }

  function insertOnlineEvent($data)
  {
    return DB::table("TACADEMY_ONLINE_EVENT")->insert($data);
  }

  function deleteOnlineEvent($onlineEventId)
  {
    return DB::table("TACADEMY_ONLINE_EVENT")->where("ID", '=', $onlineEventId)->delete();
  }

    //=================================================================================================================

  static function getOfflineEvent()
  {
    return DB::table('TACADEMY_OFFLINE_EVENT')->get();
  }

  function getOfflineEventById($offlineEventId)
  {
    return DB::table('TACADEMY_OFFLINE_EVENT')->where('ID', '=', $offlineEventId)->first();
  }

  function updateOfflineEvent($offlineEventId, $data)
  {
    return DB::table("TACADEMY_OFFLINE_EVENT")->where("ID", '=', $offlineEventId)->update($data);
  }

  function getOfflineEventMaxId()
  {
    if(DB::table('TACADEMY_OFFLINE_EVENT')->select("ID")->orderBy('ID', 'DESC')->first()) {
      return DB::table('TACADEMY_OFFLINE_EVENT')->select("ID")->orderBy('ID', 'DESC')->first()->id;
    } else {
      return 0;
    }
  }

  function insertOfflineEvent($data)
  {
    return DB::table("TACADEMY_OFFLINE_EVENT")->insert($data);
  }

  function deleteOfflineEvent($offlineEventId)
  {
    return DB::table("TACADEMY_OFFLINE_EVENT")->where("ID", '=', $offlineEventId)->delete();
  }

    //=================================================================================================================

  function getSection($arrLesson)
  {
    foreach($arrLesson as $key => $les){
     $data[$key] = DB::table("TACADEMY_SECTION_IN_LESSION")->where("LESSION_ID", "=", $les->id)->orderBy('ID', 'ASC')->get();
   }

   return $data;
 }

 static function getAllSection()
 {
  return DB::table('TACADEMY_SECTION_IN_LESSION')->orderBy('ID', 'ASC')->get();
}

function getSectionById($sectionId)
{
 return DB::table('TACADEMY_SECTION_IN_LESSION')->join('TACADEMY_LESSION', 'TACADEMY_LESSION.ID', '=', 'TACADEMY_SECTION_IN_LESSION.LESSION_ID')->select('TACADEMY_SECTION_IN_LESSION.ID AS ID', 'TACADEMY_LESSION.LESSION_NAME AS LESSION_NAME', 'TACADEMY_SECTION_IN_LESSION.SECTION_NAME', 'TACADEMY_SECTION_IN_LESSION.SECTION_VIDEO', 'TACADEMY_SECTION_IN_LESSION.SECTION_PDF', 'TACADEMY_SECTION_IN_LESSION.SECTION_PPT', 'TACADEMY_SECTION_IN_LESSION.LESSION_ID')->where('TACADEMY_SECTION_IN_LESSION.ID', '=', $sectionId)->first();
}

function updateSection($sectionId, $data)
{
 return DB::table('TACADEMY_SECTION_IN_LESSION')->where('ID', '=', $sectionId)->update($data);
}

function getSectionMaxId()
{
  if(DB::table('TACADEMY_SECTION_IN_LESSION')->select("ID")->orderBy('ID', 'DESC')->first()) {
    return DB::table('TACADEMY_SECTION_IN_LESSION')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    return 0;
  }
}

function insertSection($data)
{
 return DB::table('TACADEMY_SECTION_IN_LESSION')->insert($data);
}

function deleteSection($sectionId)
{
 return DB::table('TACADEMY_SECTION_IN_LESSION')->where("ID", '=', $sectionId)->delete();
}

    //=================================================================================================================

function getQA($arrRank)
{
  foreach($arrRank as $key => $rank){
   $data[$key] = DB::table("TACADEMY_QA")->where("RANK_ID", "=", $rank->id)->orderBy('ID', 'ASC')->get();
 }

 return $data;
}

static function getAllQA()
{
  return DB::table('TACADEMY_QA')->join('TRANK', 'TRANK.ID' , '=', 'TACADEMY_QA.RANK_ID')
  ->select('TACADEMY_QA.QA_QUESTION', 'TACADEMY_QA.QA_ANSWER', 'TRANK.NAME AS rank', 'TACADEMY_QA.RANK_ID AS rank_id')->get();
}

function getQAById($qaId)
{
 return DB::table('TACADEMY_QA')->join('TRANK', 'TRANK.ID', '=', 'TACADEMY_QA.RANK_ID')->select('TACADEMY_QA.ID AS ID', 'TACADEMY_QA.QA_QUESTION AS QA_QUESTION', 'TACADEMY_QA.QA_ANSWER AS QA_ANSWER', 'TRANK.NAME AS RANK_NANE', 'TACADEMY_QA.RANK_ID AS RANK_ID')->where('TACADEMY_QA.ID', '=', $qaId)->first();
}

function updateQA($qaId, $data)
{
 return DB::table('TACADEMY_QA')->where('ID', '=', $qaId)->update($data);
}

function getQAMaxId()
{
  if(DB::table('TACADEMY_QA')->select("ID")->orderBy('ID', 'DESC')->first()) {
    return DB::table('TACADEMY_QA')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    return 0;
  }
}

function insertQA($data)
{
 return DB::table('TACADEMY_QA')->insert($data);
}

function deleteQA($qaId)
{
 return DB::table('TACADEMY_QA')->where("ID", '=', $qaId)->delete();
}

    //=================================================================================================================

function getIncentive()
{
  return DB::table("TACADEMY_INCENTIVE")->join('TRANK', 'TRANK.ID', '=', 'TACADEMY_INCENTIVE.RANK_ID')->select('TACADEMY_INCENTIVE.*', 'TRANK.NAME AS RANK_NAME')->orderBy('TACADEMY_INCENTIVE.ID', 'ASC')->get();
}

static function getAllIncentive($yourRankID)
{
  return DB::table('TACADEMY_INCENTIVE')->where('RANK_ID', '=', $yourRankID)->get();
}

function getIncentiveById($incentiveId)
{
 return DB::table('TACADEMY_INCENTIVE')->join('TRANK', 'TRANK.ID', '=', 'TACADEMY_INCENTIVE.RANK_ID')->select('TACADEMY_INCENTIVE.*', 'TRANK.NAME AS RANK_NAME')->where('TACADEMY_INCENTIVE.ID', '=', $incentiveId)->first();
}

function updateIncentive($incentiveId, $data)
{
 return DB::table("TACADEMY_INCENTIVE")->where("ID", '=', $incentiveId)->update($data);
}

function getIncentiveMaxId()
{
  if(DB::table('TACADEMY_INCENTIVE')->select("ID")->orderBy('ID', 'DESC')->first()) {
    return DB::table('TACADEMY_INCENTIVE')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    return 0;
  }
}

function insertIncentive($data)
{
 return DB::table("TACADEMY_INCENTIVE")->insert($data);
}

function deleteIncentive($incentiveId)
{
 return DB::table('TACADEMY_INCENTIVE')->where("ID", '=', $incentiveId)->delete();
}

    //====================================================================================================================

function getBonus()
{
  return DB::table("TRIGHT_RANK")->orderBy('TRIGHT_RANK.ID', 'ASC')->get();
}

function getBonusById($bonustId)
{
  return DB::table('TRIGHT_RANK')->where('ID', '=', $bonustId)->first();
}

function updateBonus($bonusId, $data)
{
 return DB::table('TRIGHT_RANK')->where('ID', '=', $bonusId)->update($data);
}

function getRuleMaxId()
{
  if(DB::table('TRANK_WITH_RIGHT')->select("ID")->orderBy('ID', 'DESC')->first()) {
    return DB::table('TRANK_WITH_RIGHT')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    return 0;
  }
}

function insertBonus($data, $bonusId)
{
  $loop = DB::table('TRANK')->offset(1)->limit(50)->get();
  $arr = array();

  foreach ($loop as $l) {
    array_push($arr, $l->id);
  }

  for ($i = 0; $i < count($arr) ; $i++) {
    $cId = self::getRuleMaxId();
    if(DB::table('TRANK_WITH_RIGHT')->select("ID")->orderBy('ID', 'DESC')->first()) {
    $cId = DB::table('TRANK_WITH_RIGHT')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    $cId = 0;
  }
    $dt = array("ID" => ($cId + 1000), "ID_RIGHT_RANK" => $bonusId, "ID_NAME_RANK" => $arr[$i], "VALUES" => "FALSE");
    DB::table('TRANK_WITH_RIGHT')->insert($dt);
  }

  return DB::table('TRIGHT_RANK')->insert($data);
}

function getBonusMaxId()
{
  if(DB::table('TRIGHT_RANK')->select("ID")->orderBy('ID', 'DESC')->first()) {
    return DB::table('TRIGHT_RANK')->select("ID")->orderBy('ID', 'DESC')->first()->id;
  } else {
    return 0;
  }
}
function deleteBonus($bonusId)
{
  DB::table('TRANK_WITH_RIGHT')->where("ID_RIGHT_RANK", '=', $bonusId)->delete();
 return DB::table('TRIGHT_RANK')->where("ID", '=', $bonusId)->delete();
}

//====================================================================================================================

function getRule()
{
 return DB::table('TRANK_WITH_RIGHT')
 ->join('TRANK', 'TRANK.ID', '=', 'TRANK_WITH_RIGHT.ID_NAME_RANK')
 ->join('TRIGHT_RANK', 'TRIGHT_RANK.ID', '=', 'TRANK_WITH_RIGHT.ID_RIGHT_RANK')
 ->select('TRANK_WITH_RIGHT.*', 'TRIGHT_RANK.NAME AS RIGHT_NAME', 'TRANK.NAME AS RANK_NAME')
 ->orderBy('TRANK_WITH_RIGHT.ID', 'ASC')
 ->get();
}

function updateRule($right_id, $rank_id, $value)
{
 DB::table('TRANK_WITH_RIGHT')
 ->where("ID_RIGHT_RANK", '=', $right_id)
 ->where('ID_NAME_RANK', '=', $rank_id)
 ->update(['VALUES' => $value]);
}

    //=======================================================================================================

static function getRight()
{
 return DB::table('TRIGHT_RANK')->orderBy('ID', 'ASC')->get();
}

    //=======================================================================================================

static function getRuleHome()
{
  return DB::table('TRANK_WITH_RIGHT')
  ->join('TRANK', 'ID_NAME_RANK', '=', 'TRANK.ID')
  ->join('TRIGHT_RANK', 'ID_RIGHT_RANK', '=', 'TRIGHT_RANK.ID')
  ->select('TRANK_WITH_RIGHT.ID as ID', 'TRANK.NAME AS RANK', 'TRIGHT_RANK.NAME AS RIGHT', 'TRANK_WITH_RIGHT.VALUES AS VALUE')
  ->orderBy('ID', 'ASC')
  ->get();
}

    //======================================================================================================

static function getChampionInfo($threeMonthsAgo)
{
  return DB::table('TTRANSLOG')->join('TAFFILIATE', 'TTRANSLOG.AFFILIATE_ID', '=', 'TAFFILIATE.AFFILIATE_ID')->join('TACCOUNT', 'TAFFILIATE.ACCOUNT_ID', '=', 'TACCOUNT.ACCOUNT_ID')
  ->select('TAFFILIATE.ACCOUNT_ID AS ACC_ID', DB::raw('SUM(TTRANSLOG.COMMISSION) AS sum_of_1'))
  ->where('YYYYMMDD', '>=', $threeMonthsAgo)
  ->where('STAT', '=', '210')
  ->groupBy('TAFFILIATE.ACCOUNT_ID')
  ->orderBy('sum_of_1', 'DESC')
  ->take(2)
  ->get();
}

static function getYourselfPoint($threeMonthsAgo, $yourselfID)
{
  return DB::table('TTRANSLOG')->join('TAFFILIATE', 'TTRANSLOG.AFFILIATE_ID', '=', 'TAFFILIATE.AFFILIATE_ID')->join('TACCOUNT', 'TAFFILIATE.ACCOUNT_ID', '=', 'TACCOUNT.ACCOUNT_ID')
  ->select('TAFFILIATE.ACCOUNT_ID AS ACC_ID', DB::raw('SUM(TTRANSLOG.COMMISSION) AS sum_of_1'))
  ->where('YYYYMMDD', '>=', $threeMonthsAgo)
  ->where('TAFFILIATE.DELETE_FLAG', '!=', 'Y')
  ->where('STAT', '=', '210')
  ->where('TAFFILIATE.ACCOUNT_ID', '=', $yourselfID)
  ->groupBy('TAFFILIATE.ACCOUNT_ID')
  ->orderBy('sum_of_1', 'DESC')
  ->first();
}

static function getYourselfCom($threeMonthsAgo, $yourselfID)
{
  return DB::table('TTRANSLOG')->join('TAFFILIATE', 'TTRANSLOG.AFFILIATE_ID', '=', 'TAFFILIATE.AFFILIATE_ID')->join('TACCOUNT', 'TAFFILIATE.ACCOUNT_ID', '=', 'TACCOUNT.ACCOUNT_ID')
  ->select('TAFFILIATE.ACCOUNT_ID AS ACC_ID', DB::raw('SUM(TTRANSLOG.COMMISSION) AS sum_of_1'))
  ->where('YYYYMMDD', '>=', $threeMonthsAgo)
  ->where('TAFFILIATE.DELETE_FLAG', '!=', 'Y')
  ->where('STAT', '!=', '210')
  ->where('STAT', '!=', '310')
  ->where('STAT', '!=', '300')
  ->where('TAFFILIATE.ACCOUNT_ID', '=', $yourselfID)
  ->groupBy('TAFFILIATE.ACCOUNT_ID')
  ->orderBy('sum_of_1', 'DESC')
  ->first();
}

static function getRankPoint()
{
  return DB::table('TRANK')->select('NAME', 'POINT', 'ICON', 'ID')->offset(1)->limit(10)->get();
}

static function getNewbieVideo()
{
  return DB::table('TACADEMY_NEWBIE_VIDEO')
  ->select('NEWBIE_VIDEO_BANNER', 'NEWBIE_VIDEO_LINK', 'NEWBIE_VIDEO_TITLE')
  ->where('NEWBIE_VIDEO_STATUS', '=', 'ACTIVE')
  ->orderBy('NEWBIE_VIDEO_ORDER', 'ASC')
  ->get();
}
}