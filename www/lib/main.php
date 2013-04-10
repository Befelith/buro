<?php


include_once("lib/database.php");
include_once("lib/main_table.php");
include_once("lib/pagination.php");
include_once("lib/tag_cleaner.php");
$db = new Database();
$db->connect();


$multiple_get_params = array(
//    'cat'=>'',
//    'region'=>'',
//    'city'=>''

);


function addGetParameters($query)
{
    global $multiple_get_params;

    if(isset($_GET['ptype']))
    {
        $multiple_get_params['ptype'] = tagCleaner($_GET['ptype']);;
        if($multiple_get_params['ptype'] == 'all')
            $query .=" AND ptype LIKE '%' ";
        elseif($multiple_get_params['ptype'] == 'lost')
            $query.=" AND ptype='lost'";
        else
            $query.=" AND ptype='found'";
    }
    if(isset($_GET["cat"]))
    {
        $multiple_get_params['cat'] = tagCleaner($_GET["cat"]);//decode
        if($multiple_get_params['cat']!="all")
            $query .=" AND category='{$multiple_get_params['cat']}' ";
        else
            $query .=" AND category LIKE '%' ";
    }
    if(isset($_GET["region"]))
    {
        $multiple_get_params['region'] = tagCleaner($_GET["region"]);
        if($multiple_get_params['region']!="all")
            $query .=" AND region='{$multiple_get_params['region']}' ";
        else
            $query .=" AND region LIKE '%' ";
    }
    if(isset($_GET["city"]))
    {
        $multiple_get_params['city'] =tagCleaner( $_GET["city"]);
        $query .=" AND city='{$multiple_get_params['city']}' ";
    }

    return $query;
}
$rowsPerPage = 10;
//старт индекс без get
if($_GET['page']==NULL)
{
    $main_query = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items WHERE person LIKE '%' "; //WHERE category='$cur_cat' WHERE person LIKE '%'

    $main_query=addGetParameters($main_query);
    $main_query.=" ORDER BY date_entry DESC LIMIT 0,$rowsPerPage";
}
//if(isset($_GET["cat"]))
//    $main_query = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items WHERE category='$cur_cat' ORDER BY date_entry DESC LIMIT 0,$rowsPerPage ";

if($_GET['page']!=NULL)
{
    //текущая страница
    $currentPage = intval($_GET['page']);
    //стартовый индекс для запроса в БД
    $limitStartIndex = ($currentPage."0")-$rowsPerPage; //For $rowsPerPage = 10;
    //$limitStartIndex = ($currentPage."0")*2-$rowsPerPage; //$rowsPerPage = 20;
    $main_query = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items WHERE person LIKE '%' ";

    $main_query=addGetParameters($main_query);

    $main_query.=" ORDER BY date_entry DESC LIMIT $limitStartIndex,$rowsPerPage";

}

$result = $db->executeQueryUTF($main_query);

//вывод таблицы
echo createMainTable($result);

// количество строк в таблице
$main_query_rows_count = "SELECT COUNT(*) FROM tbl_laf_items WHERE person LIKE '%' ";
$main_query_rows_count = addGetParameters($main_query_rows_count);

$count = $db->executeQueryUTF($main_query_rows_count);

$totalRowsCount = mysql_fetch_array($count,MYSQL_NUM);

// общее количество страниц
$totalPages = $totalRowsCount[0] / $rowsPerPage;
// округление до большего
$totalPages = ceil($totalPages);
//текущая страница
$currentPage = intval($_GET['page']);

//Pagination output here
echo pageNavigator($totalPages,$currentPage);

echo '<pre>';
var_dump(urlencode("Животные"));
echo '</pre>';



mysql_free_result($result);
$db->disconnect();


?>