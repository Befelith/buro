<?php	
header('Content-type: text/html; charset=utf-8');
include_once("lib/database.php");
include_once("lib/imageResizer.php");
	$error='0';
	if(isset($_POST['title']))
	{
		$title = preg_replace('/\s\s+/', ' ',trim($_POST['title']));
		if(mb_strlen($title,'utf-8')<4)
		$error='1';
	}
	if(isset($_POST['category']))
	{
		$category = $_POST['category'];
		if($category=="Выбрать")
			$error='1';
	}
	if(isset($_POST['region']))
	{
		$region = $_POST['region'];
		if($region=="Выбрать")
			$error='1';		
	}
	if(isset($_POST['city']))
	{
		$city = $_POST['city'];
		if($city=="Выбрать")
		$error='1';
	}
	if(isset($_POST['description']))
	{
		$description = preg_replace('/\s\s+/', ' ',trim($_POST['description']));
		if(mb_strlen($description,'utf-8')<12)
		$error='1';
	}
	if(isset($_POST['person']))
	{
		$person = preg_replace('/\s\s+/', ' ',trim($_POST['person']));
		if(mb_strlen($person,'utf-8')<2)
		$error='1';
		
	}
	if(isset($_POST['email']))
	{
		$email = preg_replace('/\s\s+/', ' ',trim($_POST['email']));
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		$error='1';
	}
	if(isset($_POST['phone']))
	{
		$phone = $_POST['phone'];
	}
	if(isset($_POST['icq']))
	{
		$icq = preg_replace('/\s\s+/', ' ',trim($_POST['icq']));
		if(mb_strlen($icq,'utf-8')>10)
		$error='1';
	}
	if(isset($_POST['skype']))
	{
		$skype = preg_replace('/\s\s+/', ' ',trim($_POST['skype']));
		if(mb_strlen($icq,'utf-8')>32)
		$error='1';
	}
	if(isset($_POST['terms']))
	{
		$terms = $_POST['terms'];
		if($terms!="yes")
		$error='1';

	}
	
	$current_date = date("Y-m-d H:i:s"); //date('d-m-Y H:i');
	$item_type = $_POST['item_type'];

    //echo "<pre>".var_dump($_FILES)."</pre>";


	if($_FILES['userImage']['size']!=0)
	{
        $test_value=10;
        $another_test_value="Hello github";
		$max_image_size = 2048 * 1024; //2mb
		$uploaded_file = $_FILES['userImage']['tmp_name'];
		$image_type = $_FILES['userImage']['type'];
		$tmp_image_size = $_FILES['userImage']['size'];//filesize($tmp_image)
        $dest_filename = "uploads/". $_FILES['userImage']['name'];
        $resizer = new ImageResizer();
        $photo_link = $resizer->resize($max_image_size,$uploaded_file,$image_type,$tmp_image_size);

	}
//
//
        $db = new Database();
        $db->connect();
		$query = "INSERT INTO tbl_laf_items(item_type,category,region,city,title,description,person,email,phone,icq,skype,photo_link,date_entry)
									values('$item_type','$category','$region','$city','$title','$description','$person','$email','$phone','$icq','$skype','$photo_link','$current_date')";

        $db->executeQueryUTF($query);
        $db->disconnect();
		
	
	
?>