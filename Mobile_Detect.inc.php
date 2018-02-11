<?php
/*chunkName for not mobile version.*/
$fullTpl=isset($fullTpl)?$fullTpl:'';
/*chunkName for mobile version: phone and tablet both*/
$mobileTpl=isset($mobileTpl)?$mobileTpl:'';
/*chunkName for mobile phone version.*/
$phoneTpl=isset($phoneTpl)?$phoneTpl:$mobileTpl;
/*chunkName for mobile tablet version*/
$tabletTpl=isset($tabletTpl)?$tabletTpl:$mobileTpl;

$agents=array();
$agents['full']="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36";
$agents['phone']="Mozilla/5.0 (iPhone; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.25 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";
$agents['tablet']="Mozilla/5.0 (iPad; CPU OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/30.0.1599.12 Mobile/11A465 Safari/8536.25";

require_once "Mobile-Detect/Mobile_Detect.php";
$detect = new Mobile_Detect;

if(!empty($_POST['user_agent'])){
	$nua=$_POST['user_agent'];
	$nisMobile=false;
	$nisTablet=false;
	if($nua=="mobile") $nua="phone";
	if($nua=="full"){}
	elseif($nua=="tablet"){
		$nisMobile=true;
		$nisTablet=true;
	}
	elseif($nua=="phone"){
		$nisMobile=true;
		$nisTablet=false;
	}
	else{
		$nua="full";
	}
	if($detect->isMobile()!=$nisMobile || $detect->isTablet()!=$nisTablet){
		$detect->setUserAgent($agents[$nua]);
	}
}

if(!$detect->isMobile()){
	if(!empty($fullTpl))return $modx->getChunk($fullTpl);
	else return '';
}
else{
	if($detect->isTablet()){
		if(!empty($tabletTpl))return $modx->getChunk($tabletTpl);
		else return '';
	}
	else{
		if(!empty($phoneTpl))return $modx->getChunk($phoneTpl);
		else return '';
	}
}