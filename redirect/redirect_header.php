<?php
$REDIRECT_URL = file ('redirect/link.csv'); // Создаем массив ссылок
$countUrl =  count($REDIRECT_URL); 

//Делаем случайный выбор ссылки
if (rand(0, 100) <= $REDIRECT_URL[0]) {  // Если рандомный номер не превышает вероятностный процент, то перенаправление
	if  ($countUrl > 1){  // Если ссылки для редиректа есть
		$namberURL = rand(1, ($countUrl-1)); 
		$url = $REDIRECT_URL[$namberURL];

		//Функция редиректа 
		function redirect($url)
		{
			header('Location:'.$url, true, 302);
			echo "<script>window.location.replace('" . $url . "');</script>";
			echo 'Перенаправление… Перейдите по <a href="'.$url.'">ссылке</a>';
			exit();

		}
		redirect($url);
		} 
	}
?>