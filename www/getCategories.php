<?php 
$categories = array(
    'documents'=>'Документы:Паспорт, ИНН, права, техпаспорт, сведетельство и т.д.',
    'pets'=>'Животные:',
    'technique'=>'Техника:Мобильные телефоны, фотоаппараты, ноутбуки, планшеты, дисковые накопители и т.д.',
    'clothes'=>'Одежда:',
    'keys'=>'Ключи:',
    'wallets'=>'Кошельки:',
    'jewelery'=>'Драгоценности:',
    'other'=>'Другое:');
foreach($categories as $key=>$value)
{

    list($main_title,$description) = explode(":",$value);
    if($description!="")
        echo '<option value="'.$main_title.'" title="'.$description.'">'.$main_title.'</option>';
    else
        echo '<option value="'.$main_title.'">'.$main_title.'</option>';
}
?>