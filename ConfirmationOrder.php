<?php
session_start();
    if(isset($_SESSION["id"]))
        include_once "HeaderAfter.php";
    else
        include_once "HeaderBefore.php";
?>
<div class="container">
<center>
<h2>
<div class='alert alert-success'> Your Order No Is : <?php echo($_SESSION["max"]); ?> </div>
<p></p>
<hr/>
 

<?php
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;   
		//html PNG location prefix
		$PNG_WEB_DIR = 'temp/';
		include "QRcode/qrlib.php";    
		//ofcourse we need rights to create temp dir
		if (!file_exists($PNG_TEMP_DIR))
			mkdir($PNG_TEMP_DIR);
		$filename = $PNG_TEMP_DIR.'test.png';
		$errorCorrectionLevel = 'H';
		$matrixPointSize = 8; 
			// user data
			$filename = $PNG_TEMP_DIR.'test'.md5($_SESSION["max"].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
			QRcode::png($_SESSION["max"], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
		//display generated file
		echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
?>

</h2>
</center>
</div>


<?php
include_once "Footer.php";
?>