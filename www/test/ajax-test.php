<?php	
	if(isset($_POST['jsonData']))
	{
		$obj = $_POST['jsonData'];
		$decoded = json_decode($obj);
		$title = preg_replace('/\s\s+/', ' ',trim($decoded->title));
		$category = $decoded->category;
		$region = $decoded->region;
		$city = $decoded->city;
		$description = preg_replace('/\s\s+/', ' ',trim($decoded->description));
		$person = preg_replace('/\s\s+/', ' ',trim($decoded->person));
		$email = preg_replace('/\s\s+/', ' ',trim($decoded->email));
		$icq = $decoded->icq;
		$skype = $decoded->skype;
		$terms = $decoded->terms;
		$result = array();
			
			if($title=="")
				$result['title']="Заголовок не может быть пустым";
			elseif(mb_strlen($title,'utf-8')<4)
				$result['title']="Заголовок не может быть короче 4 знаков";
			else
				$result['title']="OK";
				
			if($category=="Выбрать") $result['category']="Пожалуйста,укажите категорию";
			else $result['category']="OK";
			
			if($region=="Выбрать") $result['region']="Пожалуйста,укажите регион";
			else $result['region']="OK";
			
			if($city=="Выбрать") $result['city']="Пожалуйста,укажите город";
			else $city['region']="OK";
			
			
			if($description=="")
				$result['description']="Описание не может быть пустым";
			elseif(mb_strlen($description,'utf-8')<12)
				$result['description']="Описание не может быть короче 12 знаков";
			else
				$result['description']="OK";
			
			if($person=="")
				$result['person']="Пожалуйста,укажите имя";
			elseif(mb_strlen($person,'utf-8')<2)
				$result['person']="Не может быть короче 2 букв";
			else
				$result['person']="OK";
				
			if($email=="")
				$result['email']="Укажите контактный e-mail";
			elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
				$result['email']="E-mail введен не правильно!";
			else
				$result['email']="OK";
				
			if($terms=="on") $result['terms']="Поле обязательно для заполнения";
			else $result['terms']="OK";
			
			if($result['title']=="OK" and $result['category']=="OK")
				$result['saved']="OK";
 		
		if(isset($_FILES))
		{
			$max_image_size = 2048 * 1024; //2mb
			$tmp_image = $_FILES['userImage']['tmp_name'];
			$tmp_image_size = $_FILES['userImage']['size'];//filesize($tmp_image)
			$result['image']="File: ".$tmp_image." Size:".$tmp_image_size;
		}
		//echo json_encode($msg);
		echo json_encode($result);
	}
	
?>