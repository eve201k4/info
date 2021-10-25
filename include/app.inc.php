<?
session_start();
$host = $_SERVER['HTTP_HOST'];
$self = $_SERVER['PHP_SELF'];

	define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"]);
	//define("WEB_URL",$host);
if ($_SERVER["SERVER_NAME"] == "www.cool93.net" || $_SERVER["SERVER_NAME"] == "cool93.net") {
	define("WEB_URL","http://www.cool93.net/");
	define("_WEB_URL","http://www.cool93.net/");
} elseif ($_SERVER["SERVER_NAME"] == "www.coolism.net" || $_SERVER["SERVER_NAME"] == "coolism.net") {
	define("WEB_URL","http://www.coolism.net/");
	define("_WEB_URL","http://www.coolism.net/");
} else {
    define("WEB_URL","http://localhost");
	define("_WEB_URL","http://localhost");
}
	define("INCLUDE_PATH",ROOT_PATH . "include/");
	define("WEB_PATH",WEB_URL );
	define("ROOT_URL",WEB_URL );
	define("WEB_IMAGE_URL",WEB_URL . "theme/images/");
	define("UPLOAD_URL",WEB_URL . "images/");
	define("WEB_JS_URL",WEB_URL . "js/");
	define("WEB_CSS_URL",WEB_URL . "css/");
	define("WEB_SWF_URL",WEB_URL . "swf/");
	define("WEB_XML_URL",WEB_URL . "xml/");
	define("WEB_MAXADD_URL",WEB_URL . "event/maxaddress/");
	define("WEB_COOKIE_URL",".cool93.net");


$rememberme=$_COOKIE["login"];
if($_COOKIE["mid"]!=''){
		$remember_username93=$_COOKIE["email"];
		$remember_idno=$_COOKIE["idno"];
		$remember_mid=$_COOKIE["mid"];
		$remember_avatar=$_COOKIE["avatar"];
}else{
		$remember_username93=$_SESSION["email"];
		$remember_idno=$_SESSION["idno"];
		$remember_mid=$_SESSION["mid"];
		$remember_avatar=$_SESSION["avatar"];
}

$timestamp=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));





		function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
		}

		$url_coolupdate="http://www.cool93.net";




			function ranDomStr($length){
			$str2ran = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
			$str_result = ""; 
			while(strlen($str_result)<$length){  
				$str_result .= substr($str2ran,(rand()%strlen($str2ran)),1); 
			}
			return($str_result);
			}





//--------------  SET  TEMPLATE  GENERAL-----------------//

function blog_login($mmid,$img_path){
			global $db,$coolurls,$tpl;
			$pro_u="SELECT * FROM user_profiles left join  user_avatar on user_profiles.user_id=user_avatar.user_id WHERE user_profiles.user_id = '$mmid'";
			$pro_u1=&$db->Execute($pro_u);
			$pro_u2=$pro_u1->FetchRow();
			$coolurls=curPageURL();

		//	$pro_u_gift1="SELECT * FROM cool_gift WHERE user_id = '$mmid'";
		//	$pro_u1_gift1=&$db->Execute($pro_u_gift1);
		//	$chk_user_gift1=&$pro_u1_gift1->NumRows();

		/*		if($chk_user_gift1 == "0"){
						$fields['user_id'] = $mmid;
						$fields['point_gift'] = '0';
						$fields['point_send'] = '93';
						$fields['time_gift'] = date('Y-m-d H:i:s');
						$fields['time_month'] = date('Y-m-d H:i:s');
						$db->insertDB("cool_gift",$fields);
				} 

			$pro_u_gift="SELECT * FROM cool_gift WHERE user_id = '$mmid'";
			$pro_u1_gift=&$db->Execute($pro_u_gift);
			$pro_u2_gift=$pro_u1_gift->FetchRow();
			$chk_user_gift=&$pro_u1_gift->NumRows();
*/
					if($mmid!=''){
					$tpl->newBlock("LOGIN");
					}else{
					$tpl->newBlock("NONLOGIN");
					}

					if($pro_u2_gift['point_gift']!=''){
						$point_gift = $pro_u2_gift['point_gift'];
					}else{
						$point_gift = 0;
					}

					if($pro_u2_gift['point_send']!=''){
						$point_send = $pro_u2_gift['point_send'];
					}else{
						$point_send = 0;
					}

					$tpl->assign("ID_USER",$pro_u2['idno']);
					$tpl->assign("NAME_USER",$pro_u2['nickname']);
					$tpl->assignGlobal("POINT_USER",$pro_u2['point']);
					$tpl->assignGlobal("POINT_USER_GIFT",$point_gift);
					$tpl->assignGlobal("POINT_USER_SEND",$point_send);
					$tpl->assign("AVATAR_PATH",$pro_u2['nickname']);
					//$tpl->assign("AVATAR_PROFILE",$pro_u2['avatar_img']);

				if($pro_u2['avatar_img'] != ''){
					$tpl->assign("AVATAR_PROFILE",$pro_u2['avatar_img']);
				} else {
					$tpl->assign("AVATAR_PROFILE","blank_man.jpg");
				}

					$tpl->assign("URLS",$coolurls);
					$tpl->assign("WEB_IMAGE_PATH",$img_path);
					$tpl->gotoBlock( "_ROOT" );

/*
				$objDB_2 = new dbConnect("cool93");
				$db_2 =& $objDB_2->getConnections();
				$sql = " SELECT * "
						.	" FROM `cool_ads` "
						.	" WHERE `ads_active` = '1' ";
	if ($rs =& $db_2->Execute($sql)) {
		while($result=$rs->FetchRow()){
			$ads_file = $result['ads_file'];
			$adstype = $result['adsgroup_type'];
			$adsname = $result['ads_name'];
			$ads_Sdate = $result['ads_sdate'];
			$ads_Edate = $result['ads_edate'];
			$date_today = date('Y-m-d');
						
				if($adsname == "HEADDER594x86" && $date_today >= $ads_Sdate &&  $date_today <= $ads_Edate ){
			  		if( strtolower(substr($ads_file,(strlen($ads_file)-3),3)) == "jpg"){
						$show_banner = '<img alt="" src="'.WEB_URL.'./../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" height="86" width="594"> ';
						//$show_banner .= '<br><img src="'.WEB_URL.'./theme/images/topbanner_02.jpg" width="594" height="22" />';
			   		}elseif( strtolower(substr($ads_file,(strlen($ads_file)-3),3)) == "gif"){
						$show_banner = '<img alt="" src="'.WEB_URL.'./../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" height="86" width="594"> ';
						//$show_banner .= '<br><img src="'.WEB_URL.'./theme/images/topbanner_02.jpg" width="594" height="22" />';
			   		}elseif( strtolower(substr($ads_file,(strlen($ads_file)-3),3)) == "swf" ||  strtolower(substr($ads_file,(strlen($ads_file)-3),3)) == "flv" ){
						/*$show_banner = '<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,65,0" height="86" width="594" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">'
                .'<param value="'.WEB_URL.'./../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" name="movie"></param>'
               // .'<param value="transparent" name="wmode"></param>'
                .'<param value="high" name="quality"></param>'
               .' <param value="0" name="menu"></param>'
			   .'<embed src="'.WEB_URL.'./../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" width="594" height="86" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>'
                .'</object>';*/
/*
$show_banner = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="600" height="90">'
  .'<param name="movie" value="'.WEB_URL.'./../../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" />'
  .'<param name="quality" value="high" />'
  .'<param name="wmode" value="transparent" />'
 .' <embed src="'.WEB_URL.'./../../images/banner_file/'.strtolower($adstype).'/'.$ads_file.'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="600" height="90"></embed>'
.'</object>';
						$show_banner .= '<br><img src="'.WEB_URL.'./theme/images/topbanner_02.jpg" width="635" height="22" />';
					 }
				}
			}
							$tpl->assignGlobal("HEADER_BANNER",$show_banner);
	}
//$tpl->assignGlobal("HEADER_BANNER",$sql);
$db_2->close();
*/
}

			function default_temp($path){
			global $tpl;
				$tpl->assignInclude("HEADER",$path."template/index/header2.tpl");
				$tpl->assignInclude("NONLOGIN",$path."template/index/nonlogin.tpl");
				$tpl->assignInclude("LOGIN",$path."template/index/login_complete.tpl");
				$tpl->assignInclude("FOOTER",$path."template/index/footer2.tpl");
			}



function updateuserpoint($pointcashs,$remember_mids,$activeuser){
	global	$db,$totalpoint,$activeuser;
/*
	$g_point="select * from user_profiles where user_id='$remember_mids'";
	$g_point1=&$db->Execute($g_point);
	$g_point2=$g_point1->FetchRow();
	$totalpoint=($g_point2['point']+$pointcashs);

	$update_point = "update user_profiles set point='$totalpoint' where user_id='$remember_mids'";
	$db->Execute($update_point);
*/
		if($activeuser=='1'){
			$update_active = "insert into active_member (user_id,act_point)value('$remember_mids','$activeuser')";
			$db->Execute($update_active);
		}
}


function Log_login($remember_mids,$activeuser){
	//global	$db;

		$objDB = new dbConnect("systemmember");
		$db =& $objDB->getConnections();

		$ip = (getenv(HTTP_X_FORWARDED_FOR)) ? getenv(HTTP_X_FORWARDED_FOR) : getenv(REMOTE_ADDR);

		//echo "ip = ".$ip."<br>";
		//echo "remember_mids = ".$remember_mids."<br>";

		if($activeuser=='1' && $remember_mids != ""){
			$update_active = "INSERT INTO `systemmember`.`log_login` (`id_log` ,`user_id` ,`ip` ,`time` )VALUES (NULL , '$remember_mids', '$ip', NOW( ) );";
			$db->Execute($update_active);
		}

}

?>
