<?php 
$categories = array('Документы','Животные','Мобильная техника','Драгоценности','Другое');
echo '<option value="Выбрать">'.'Выбрать'.'</option>';
foreach($categories as $category)
echo '<option value="'.$category.'">'.$category.'</option>';
?>