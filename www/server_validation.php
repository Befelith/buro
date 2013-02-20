<?php	
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>"; 
	
	$responseCodes = array();
	
	if(isset($_POST['title']) && $_POST['title']!="" &&strlen($_POST['title'])>=6)
	{
		$title = $_POST['title'];
	}
	else
	{
		 echo "Вы ввели не корректные данные в поле \"Заголовок\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
 	
	if(isset($_POST['category']) && $_POST['category']!="Выбрать")
	{
	   $category = $_POST['category'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Категория\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
	if(isset($_POST['region']) && $_POST['region']!="Выбрать")
	{
	   $region = $_POST['region'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Область\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
	if(isset($_POST['city']) && $_POST['city']!="Выбрать")
	{
	   $city = $_POST['city'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Город\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
	if(isset($_POST['description']) && $_POST['description']!="")
	{
	   $description = $_POST['description'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Описание\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
	if(isset($_POST['person']) && $_POST['person']!="")
	{
	   $person = $_POST['person'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Контактное лицо\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
	//$email_filter='joe@example.com';
	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
	   $email= $_POST['email'];
	}
	else
	{
	   echo "Вы ввели не корректные данные в поле \"E-mail\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	
 	if(isset($_POST['phone']))
	{
	   $phone = $_POST['phone'];
	}
	else
	{
		$phone="";
	}
	
	if(isset($_POST['icq']))
	{
	   $icq = $_POST['icq'];
	}
	else
	{
		$icq="";
	}
	
	if(isset($_POST['skype']))
	{
	   $skype = $_POST['skype'];
	}
	else
	{
		$skype="";
	} 
	if(isset($_POST['checkTerms'])){
        $terms = $_POST['checkTerms'];
    }
	else
	{
	   echo "Вы ввели не корректные данные в поле \"Правила\"";
		echo "<center><input name='back' type='button' value='Вернуться'
		onclick= 'javascript:history.back()'></center>";
	}
	if(($title) and ($category) and ($region) and ($city) and ($description) and ($person) and($email) and ($terms))
	{
		echo "Complete!";
	}

?>