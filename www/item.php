<?php
include_once("lib/database.php");
include_once("lib/tag_cleaner.php");

if(isset($_GET['id']))//call this by http://buro-nahodok.in.ua/image_output/item.php?id=5
{
    $db = new Database();
    $db->connect();
		//1 открываем соедениние
	$link = mysql_connect('localhost','root') or die('Failed connection'. mysql_error());
	//echo "Connected successfull";

	//2 - выбираем БД
	mysql_select_db("buro_nahodok_db") or die('Не удалось выбрать базу');

    $id= tagCleaner($_GET['id']);
    var_dump($id);
	$id = (int)$id;
    var_dump($id);


	//$id=5;
	if($id>0)
		{
			//3 - пишем сам запрос 
		$query = 'SELECT * from tbl_laf_items WHERE id_entry='.$id;
		//echo "<pre>";
		//var_dump($query);
		//echo "</pre>";
		//4 - выполняем запрос
		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		if ( mysql_num_rows( $result ) == 1 ) 
		{
			$image = mysql_fetch_array($result);
			//header("Content-type: image/*");
            echo "<HTML>";
            echo "<HEAD>";
            echo "<TITLE>".$image['title']."</TITLE>";
            echo "</HEAD>";
            echo "<body>";
			echo '<div><img src="'.$image['photo_link'].'" alt="opa" /></div>'."<br>";
			echo $image['title']."<br>";
			echo $image['description']."<br>";
            echo "</body>";
            echo "</html>";
			// echo "<pre>";
			// var_dump($image);
			// echo "</pre>";
			//header("Content-type: image/jpeg");
			
			//echo $image['picture_link'];
			
		}
	}
}

?>