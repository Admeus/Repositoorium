<?php
	$myName = "Ainar Kiison";
	$fullTimeNow = date("d.m.Y H:i:s");
	//<p>Lehe avamise hetkel oli: 31.01.<strong>31.01.2020 11:32:07</strong></p>
	$timeHTML = "Lehe avamise hetkel oli: <strong>" .$fullTimeNow."</strong></p> \n";
	$hourNow = date("H");
	$partOfDay = "Mingi hägune aeg";
	
	if($hourNow < 10){
		$partOfDay = "hommik";
	}
	if($hourNow > 10 and $hourNow < 18){
		$partOfDay = "aeg aktiivselt tegutseda";
	}
	$partOfDayHTML = "<p>Käes on ".$partOfDay."!\n";
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2020-1-27");
	$semesterEnd = new DateTime("2020-6-22");
	$semesterDuration = $semesterStart->diff($semesterEnd);
	//echo $semesterDuration;
	//var_dump ($semesterDuration);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart->diff($today);
	//<p>Semester on hoos: <meter min="0" max="147" value="4"></meter>.</p>
	$semesterProgressHTML = '<p>Semester on hoos: <meter min="0" max="';                //max=" 
	$semesterProgressHTML .= $semesterDuration->format("%r%a");
	$semesterProgressHTML .='" value="';
	$semesterProgressHTML .= $fromSemesterStart->format("%r%a");
	$semesterProgressHTML .='"></meter>.</p>'."\n";
	//loen etteantud kataloogist pilte
	$pildidDir = "../../pildid";
	$photoTypesAllowed = ["image/jpeg","image/png"];
	$photoList = [];
	//$allFiles = scandir($pildidDir);
	$allFiles = array_slice(scandir($pildidDir), 2);
	//var_dump($allFiles);                                                         // .on juurde lisamine
	foreach($allFiles as $file){
		$fileInfo = getimagesize($pildidDir .$file);
		if(in_array($fileInfo ["mime"], $photoTypesAllowed) == true){
		array_push($photoList, $file);
		}
	}
	$photoCount = count($photoList);
	$photoNum = mt_rand(0,$photoCount -1);
	$randomImageHTML = '<img src="'.$pildidDir .$photoList[$photoNum] .'" alt="juhupilthaapsalust">' ."\n";
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Veebirakendused ja nende loomine 2020</title>
</head>
<body>
	<h1><?php echo $myName; ?></h1>
	<p>See leht on valminud õppetöö raames!</p>
	<?php
		echo $timeHTML;
		echo $partOfDayHTML;
		echo $semesterProgressHTML
		?>
</body>
</html>