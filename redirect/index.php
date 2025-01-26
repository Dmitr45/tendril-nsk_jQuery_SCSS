<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<title>Настройка редиректа</title>
</head>

<body>

<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	define("W", $_POST['w%']);
	define("URL_PLUS1", $_POST['url_plus1']);
	define("URL_PLUS2", $_POST['url_plus2']);
	define("URL_PLUS3", $_POST['url_plus3']);


//Если отправлена форма, перезаписываем файл	
	$fd=fopen("link.csv","w");  //Открывем  и очищаем
	if  (W <= 100 ) {fwrite($fd, W."\n");} else {fwrite($fd, "50"."\n");}; 
	if  (URL_PLUS1 !="") fwrite($fd, URL_PLUS1."\n"); 
	if  (URL_PLUS2 !="") fwrite($fd, URL_PLUS2."\n"); 
	if  (URL_PLUS3 !="") fwrite($fd, URL_PLUS3."\n"); 
	
	fclose($fd); 

	}
?>

<div class="redirect_setting login-page">
  <div class="redirect_setting form">
	<div class="redirect_setting_info">
			<?php
			$REDIRECT_URL = file ('link.csv'); // Создаем массив ссылок
			$countUrl =  count($REDIRECT_URL); 
			echo  ('В файле ' . $countUrl-1 . ' url для перенаправления<br>'); 

			for ( $i=1; $i < ($countUrl); $i++) {
				echo '№'.($i).') '.$REDIRECT_URL[$i].'<br>';
			}
			echo ('Вероятность перенаправления '.$REDIRECT_URL[0].'%');
			?>
		</div>	
  </div>
</div>


<div class="redirect_setting login-page">
  <div class="redirect_setting form">
    <form class="redirect_setting login-form" action="index.php" method="post">
	<input  type="number" min="0" max="100" name="w%" value="<?php echo intval($REDIRECT_URL[0]);?>" style="width: 100px; padding-left: 43px"><lable style="width: 259px; padding-right: 70px">%, перенаправления на url</lable></lable><br>
	<lable>URL1:</lable><input class="redirect_setting_input" type="url" name="url_plus1" value="<?php if ($countUrl>1) {echo $REDIRECT_URL[1];}?>" ><br>
	<lable>URL2:</lable><input class="redirect_setting_input" type="url" name="url_plus2" value="<?php if ($countUrl>2) {echo $REDIRECT_URL[2];}?>" ><br>
	<lable>URL3:</lable><input class="redirect_setting_input" type="url" name="url_plus3" value="<?php if ($countUrl>3) {echo $REDIRECT_URL[3];}?>" ><br>
    <button class="redirect_setting" type="submit">ПЕРЕЗАПИСАТЬ ФАЙЛ</button></button>
    </form>
  </div>
</div>



</body>
</html>