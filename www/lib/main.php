<?php


include_once("lib/database.php");
include_once("lib/main_table.php");
include_once("lib/pagination.php");

$db = new Database();
$db->connect();

//Setting Rows Per Page
$rowsPerPage = 10;
//старт индекс без get
if($_GET['page']==NULL)
    $q = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items ORDER BY date_entry DESC LIMIT 0,$rowsPerPage";

//передаем номер страницы из запроса
if($_GET['page']!=NULL)
{
    //текущая страница
    $currentPage = intval($_GET['page']);
    //стартовый индекс для запроса в БД
    $limitStartIndex = ($currentPage."0")-$rowsPerPage; //For $rowsPerPage = 10;
    //$limitStartIndex = ($currentPage."0")*2-$rowsPerPage; //$rowsPerPage = 20;
    $q = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items ORDER BY date_entry DESC LIMIT $limitStartIndex,$rowsPerPage";
}

$result = $db->executeQueryUTF($q);

//вывод таблицы
echo createMainTable($result);

// количество строк в таблице
$qRowsCount = 'SELECT COUNT(*) FROM tbl_laf_items';
$count = $db->executeQueryUTF($qRowsCount);
$totalRowsCount = mysql_fetch_array($count,MYSQL_NUM);

// общее количество страниц
$totalPages = $totalRowsCount[0] / $rowsPerPage;
// округление до большего
$totalPages = ceil($totalPages);
//текущая страница
$currentPage = intval($_GET['page']);

//Pagination output here
echo pageNavigator($totalPages,$currentPage);



mysql_free_result($result);
$db->disconnect();


?>