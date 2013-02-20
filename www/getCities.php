<?php	
	if(isset($_POST['cityId'])){
       $id = $_POST['cityId'];
	   
	   if(file_exists("ua-cities.xml"))
       {
        $xml = simplexml_load_file("ua-cities.xml");
		//echo '<option value="Выбрать">'."Выбрать".'</option>';
        foreach($xml->region as $region)
		{
			if($region["name"]==$_POST['cityId'])
			foreach($region->city as $city)
				$rows[] = $city["name"];
		}
				//echo '<option value="'.$city["name"].'">'.$city["name"].'</option>';
   
        }
					
       echo json_encode($rows);
}
// Получаем результат выборки из базы и выводим на 
//страницу с помощью jQuery (в примере в блок <div id="res">):

?>