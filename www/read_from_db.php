<?php
//header('Content-type: image/jpeg');

//1 открываем соедениние
$link = mysql_connect('localhost','root') or die('Failed connection'. mysql_error());

//2 - выбираем БД
mysql_select_db("buro_nahodok_db") or die('Не удалось выбрать базу');

//3 - пишем сам запрос 
$query = 'SELECT * from tbl_laf_items';

//4 - выполняем запрос
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());


//echo "<pre>".var_dump(mysql_fetch_array($result))."</pre>";
//echo print_r(mysql_fetch_array($result));


echo "<table style=\"border:3px solid #cef;border-collapse: collapse;\">";
$odd_counter=0;
while($line = mysql_fetch_array($result,MYSQL_ASSOC))
{
		$odd_counter++;
	echo "<tr>\n";
	 foreach($line as $key=>$value)
	{

		//if($line['PICTURE']==null)
		//if($str)
		
		if($odd_counter%2!=0)
		{
			if($key!='PICTURE' and $key!='TITLE')
				echo '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.$value.'</td>';
			if($key=='TITLE') 
				echo '<td style=" border: 2px solid #cefn;background-color: #def;padding:10px;" align="center"><a href="image.php?id='.$line["ID"].'">'.$value.'</a></td>';
			if($key=='PICTURE')
				echo '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
		}
		else
		{
			if($key!='PICTURE' and $key!='TITLE')
				echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.$value.'</td>';
			if($key=='TITLE')
				echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center"><a href="image.php?id='.$line["ID"].'">'.$value.'</a></td>';
			if($key=='PICTURE')
				echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
		}
		//if($key=='PICTURE')
			//echo '<td style=" border: 2px solid green;background-image:url(data:image/jpeg;base64,'.base64_encode($value).');background-repeat: no-repeat; ">'.$value.'</td>';
		//else
		// echo '<td style=" border: 2px solid green;background-image:url(data:image/jpeg;base64,'.base64_encode($str).');background-repeat: no-repeat; ">'.$str.'</td>';
		//echo '<td style=" border: 2px solid green;background-image:url(data:image/jpeg;base64,'.base64_encode($str).');background-repeat: no-repeat;width:500px;height:500px; ">'.$str.'</td>';
	 }
	 //echo '<td style=" border: 2px solid green;background-image:url(data:image/jpeg;base64,'.base64_encode($line['PICTURE']).');background-repeat: no-repeat;width:500px;height:500px; ">'.'</td>';
	 
	echo "</tr>\n";
}
echo "</table>";

		mysql_free_result($result);
		mysql_close($link);


?>