<?php
use App\LichSuAdmin;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload
function pushChangeBook()
{
	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webapp-77e52-firebase-adminsdk-9jhj1-0fdbddb1c7.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $db = $firebase->getDatabase();
    $reference = $db->getReference('Notification/Admin/Book/Change');
    $date = date('Y-d-m H:i:s');
    $postRef = $reference->push([
        'message'=>'Có thay đổi',
        'time'=>$date,
    ]);
    return $postRef->getKey();
}
function pushNotificationAdmin()
{
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webapp-77e52-firebase-adminsdk-9jhj1-0fdbddb1c7.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $db = $firebase->getDatabase();
    $reference = $db->getReference('Notification/Admin/Book/New');
    $date = date('Y-d-m H:i:s');
    $postRef = $reference->push([
        'message'=>'Có lịch đặt xe mới',
        'time'=>$date,
    ]);
    return $postRef->getKey();
}
function History($data)
{
	$history = LichSuAdmin::create([
        'id_admin' => $data[0],
        'action' => $data[1],
        'link' => $data[2],
    ]);
    return $history;
}
function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}
function Substr_pd($str, $length, $minword = 3)
{
	$sub = '';
	$len = 0;
	foreach (explode(' ', $str) as $word)
	{
	    $part = (($sub != '') ? ' ' : '') . $word;
	    $sub .= $part;
	    $len += strlen($part);
	    if (strlen($word) > $minword && strlen($sub) >= $length)
	    {
	      break;
	    }
	 }
	    return $sub . (($len < strlen($str)) ? '...' : '');
}
function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
			 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
			 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
			 'ae'=>'ǽ',
			 'AE'=>'Ǽ',
			 'c'=>'ć|ç|ĉ|ċ|č',
			 'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
			 'd'=>'đ|ď',
			 'D'=>'Đ|Ď',
			 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
			 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
			 'f'=>'ƒ',
			 'F'=>'',
			 'g'=>'ĝ|ğ|ġ|ģ',
			 'G'=>'Ĝ|Ğ|Ġ|Ģ',
			 'h'=>'ĥ|ħ',
			 'H'=>'Ĥ|Ħ',
			 'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
			 'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
			 'ij'=>'ĳ',	  
			 'IJ'=>'Ĳ',
			 'j'=>'ĵ',	  
			 'J'=>'Ĵ',
			 'k'=>'ķ',	  
			 'K'=>'Ķ',
			 'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
			 'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
			 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
			 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
			 'Oe'=>'œ',
			 'OE'=>'Œ',
			 'n'=>'ñ|ń|ņ|ň|ŉ',
			 'N'=>'Ñ|Ń|Ņ|Ň',
			 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
			 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
			 's'=>'ŕ|ŗ|ř',
			 'R'=>'Ŕ|Ŗ|Ř',
			 's'=>'ß|ſ|ś|ŝ|ş|š',
			 'S'=>'Ś|Ŝ|Ş|Š',
			 't'=>'ţ|ť|ŧ',
			 'T'=>'Ţ|Ť|Ŧ',
			 'w'=>'ŵ',
			 'W'=>'Ŵ',
			 'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
			 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
			 'z'=>'ź|ż|ž',
			 'Z'=>'Ź|Ż|Ž'
			 );
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

function arrayMaps($array,$name1,$name2)
{
	$return=[];
	if (is_array($array)) {
		if (!empty($array)) {
			foreach ($array as $key => $value) {
				$return[$value[$name1]] = $value[$name2];
			}
		}
	}
	return $return;
}

function imageResize($src, $dst, $x, $y){

	$dst = $dst.basename($src);

	if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

	$type = strtolower(substr(strrchr($src,"."),1));
	if($type == 'jpeg') $type = 'jpg';
	switch($type){
	case 'bmp': $source = imagecreatefromwbmp($src); break;
	case 'gif': $source = imagecreatefromgif($src); break;
	case 'jpg': $source = imagecreatefromjpeg($src); break;
	case 'png': $source = imagecreatefrompng($src); break;
	default : return "Unsupported picture type!";
	}

	// resize
	$ratio_thumb=$x/$y; // ratio thumb

	list($xx, $yy) = getimagesize($src); // original size
	$ratio_original=$xx/$yy; // ratio original

	if ($ratio_original>=$ratio_thumb) {
		$yo=$yy; 
		$xo=ceil(($yo*$x)/$y);
		$xo_ini=ceil(($xx-$xo)/2);
		$xy_ini=0;
	} else {
		$xo=$xx; 
		$yo=ceil(($xo*$y)/$x);
		$xy_ini=ceil(($yy-$yo)/2);
		$xo_ini=0;
	}

	$thumb = imagecreatetruecolor($x, $y);

	// preserve transparency
	if($type == "gif" or $type == "png"){
		imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
		imagealphablending($thumb, false);
		imagesavealpha($thumb, true);
	}

	imagecopyresampled($thumb, $source, 0, 0, $xo_ini, $xy_ini, $x, $y, $xo, $yo);

	/*
	 * $thumb  : image output
	 * $source : image input
	 * tọa độ x điểm nguồn 
	 * tọa độ y điểm nguồn 
	 * tọa độ x điểm đích 
	 * tọa độ y điểm đích 
	 * $x : width image output
	 * $y : height image output
	 * $xo  : width image input
	 * $yo  : height image input
	 */

	switch($type){
	case 'bmp': imagewbmp($thumb, $dst); break;
	case 'gif': imagegif($thumb, $dst); break;
	case 'jpg': imagejpeg($thumb, $dst); break;
	case 'png': imagepng($thumb, $dst); break;
	}

	return $dst;
}
function imageResizeByTmp($src, $dst, $x, $y, $ext)
{

	if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

	$type = $ext;
	if($type == 'jpeg') $type = 'jpg';
	switch($type){
	case 'bmp': $source = imagecreatefromwbmp($src); break;
	case 'gif': $source = imagecreatefromgif($src); break;
	case 'jpg': $source = imagecreatefromjpeg($src); break;
	case 'png': $source = imagecreatefrompng($src); break;
	default : return "Unsupported picture type!";
	}

	// resize
	$ratio_thumb=$x/$y; // ratio thumb

	list($xx, $yy) = getimagesize($src); // original size
	$ratio_original=$xx/$yy; // ratio original

	if ($ratio_original>=$ratio_thumb) {
		$yo=$yy; 
		$xo=ceil(($yo*$x)/$y);
		$xo_ini=ceil(($xx-$xo)/2);
		$xy_ini=0;
	} else {
		$xo=$xx; 
		$yo=ceil(($xo*$y)/$x);
		$xy_ini=ceil(($yy-$yo)/2);
		$xo_ini=0;
	}

	$thumb = imagecreatetruecolor($x, $y);

	// preserve transparency
	if($type == "gif" or $type == "png"){
		imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
		imagealphablending($thumb, false);
		imagesavealpha($thumb, true);
	}

	imagecopyresampled($thumb, $source, 0, 0, $xo_ini, $xy_ini, $x, $y, $xo, $yo);

	/*
	 * $thumb  : image output
	 * $source : image input
	 * tọa độ x điểm nguồn 
	 * tọa độ y điểm nguồn 
	 * tọa độ x điểm đích 
	 * tọa độ y điểm đích 
	 * $x : width image output
	 * $y : height image output
	 * $xo  : width image input
	 * $yo  : height image input
	 */

	switch($type){
	case 'bmp': imagewbmp($thumb, $dst); break;
	case 'gif': imagegif($thumb, $dst); break;
	case 'jpg': imagejpeg($thumb, $dst); break;
	case 'png': imagepng($thumb, $dst); break;
	}

	@ImageDestroy($thumb); 
	@ImageDestroy($source);
  
	return $dst;	
}

function getImageFullUrl($imageUrl)
{
	return (substr($imageUrl, 0, strlen('http')) == 'http') ? $imageUrl : url('').$imageUrl;
}

/**
 * @param $user_agent null
 * @return string
 */
?>