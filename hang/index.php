<?php 
session_start();
require_once("class/main.php");
?>
<!doctype html>
<html>
<head>
<title>Hangman game</title>
<link type="text/css" rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="scripts/easyjs.js"></script>
<link rel="shortcut icon" href="http://mehdix.co.uk/img/logo.ico" type="image/x-icon" />
</head>
<body>
<h3>Zagrajmy w WISIELCA</h3>
<hr />
<div class='life_bar'><img <?php echo "src='media/".$_SESSION['number_wong_guess'].".png' width='100px' "; ?> ><br />
	<div class='life_lost' <?php echo "style='width:$ll%'"; ?> ></div>
	<div class='life_have'></div>
</div>

<?php 
if($result== -1){
	echo "Nie udało się uratować ludzika, słowo to: ".$gword_name; 
}elseif($result== 1){
	echo "Gratulacje, uratowałeś ludzika :) "; 
}else{
	echo "Próbuj dalej... ";
}
?>
<div class="input_area">
<?php


for($i=0; $i<$word_size; $i++){
	$g="";
	if(isset($guessed_char)){
		if(in_array($word_chars[$i], $guessed_char)){
			$g=$word_chars[$i];
		}else{
		}
	}
	echo "<input type='text' value='$g' size='1' name='$i'  maxlength='1' class='inguess' readonly />";
}
?>
</div>
<div class="keyboard">
<?php


$alphas = range('A', 'Z');
foreach($alphas as $char){
$dbl = "";
	if(isset($_POST['guess_it'])){
		if(in_array($char, $guessed_char)){
			$dbl="disabled"; 
		}else{
			$dbl=""; 
		}
	}
	if($result== -1 || $result== 1) $dbl="disabled";
	echo "<span><form  action='#' method='post'>
	<input type='hidden' value='$char' name='guess'  />
	<input type='submit' value='$char' name='guess_it' class='buttkey' $dbl />
	</form></span>";
}

// nowa gra	
if(isset($_POST['reset_game'])){
	session_destroy();
	echo "<meta http-equiv='refresh' content='0'>";
}
?>
<br /><br />
	<form action="#" method="post">
		<input type="submit" value=" Start again " name="reset_game" class="reset_button" />
	</form>
</div>
<a href="http://www.code-guru.pl" target="_blank"> ? </a>
</body>
</html>
