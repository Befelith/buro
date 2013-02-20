<?php	

	$msg="";
	if(isset($_POST['text']))
	{
		$trimmed = trim($_POST['text']);
		$text = preg_replace('/\s\s+/', ' ',$trimmed);
		
		
		if(mb_strlen($text,'utf-8')<4 and $_POST['id']=='titleInput') $msg="Заголовок не может быть короче 4 знаков";
		if($text=="" and $_POST['id']=='titleInput') $msg="Заголовок не может быть пустым";
		
		if(mb_strlen($text,'utf-8')<2 and $_POST['id']=='personInput') $msg="Не может быть короче 2 букв";
		if($text=="" and $_POST['id']=='personInput') $msg="Пожалуйста,укажите имя";
		
		if(!filter_var($text,FILTER_VALIDATE_EMAIL) and $_POST['id']=='emailInput') $msg="E-mail введен не правильно!";
		if($text=="" and $_POST['id']=='emailInput') $msg="Пожалуйста,укажите email";
			
		if($text=="" and $_POST['id']=='category') $msg="Пожалуйста,укажите категорию";
		if($text=="Выбрать" and $_POST['id']=='category') $msg="Пожалуйста,укажите категорию";
		
		if($text=="" and $_POST['id']=='region') $msg="Пожалуйста,укажите регион";
		if($text=="Выбрать" and $_POST['id']=='region') $msg="Пожалуйста,укажите регион";
		
		if($text=="" and $_POST['id']=='city') $msg="Пожалуйста,укажите город";
		if($text=="Выбрать" and $_POST['id']=='city') $msg="Пожалуйста,укажите город";
		
		if(mb_strlen($text,'utf-8')<12 and $_POST['id']=='description') $msg="Не может быть короче 12 букв";
		if($text=="" and $_POST['id']=='description') $msg="Пожалуйста,укажите подробности";
		
		if($text=="unchecked" and $_POST['id']=='termsCB') $msg="Поле обязательно для заполнения";
		
		
		echo json_encode($msg);
	}
	
	if(isset($_POST['image']))
	{
		$img = $_POST['image'];
		
		if(intval($img)>(2048 * 1024))
			$msg = "Размер файла не должен превышать 2МБ";
			
		echo json_encode($msg);
	}
	
?>