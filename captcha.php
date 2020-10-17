<?php
	session_start();
	$img = imagecreatefromjpeg("captcha.jpg");
	$textcolor = imagecolorallocate($img, 0, 0, 0);
	function randomString($length){
		srand((double)microtime()*1000000);
		$str = "";
		$i = 0;
		$character = "qwertyuiopasdfghjklzxcvbnm1234567890";
		while($i <= $length){
			$number = rand() % 33;
			$tmp = substr($character, $number, 1);
			$str = $str . $tmp;
			$i++;
		}
		return $str;
	}
	$random_text = randomString(4);
	$_SESSION['captcha_text'] = $random_text;
	imagestring($img, 5, 14, 8, $random_text, $textcolor);
	header('Content-type: image/png');
	imagepng($img);
	imagedestroy($img);
?>