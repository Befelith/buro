<?php
include_once("lib/database.php");
include_once("main_table.php");
include_once("lib/pagination.php");
include_once("lib/my_functions.php");

$db = new Database();
$db->connect();


$multiple_get_params = array(
//    'cat'=>'',
//    'region'=>'',
//    'city'=>''

);

// Добавляет все get параметры к запросу
function addGetParameters($query)
{
    global $multiple_get_params;
//where_is_set ??
    if(isset($_GET['ptype']))
    {
        $multiple_get_params['ptype'] = defender_xss($_GET['ptype']);;
        if($multiple_get_params['ptype'] == 'all')
            $query .=" AND ptype LIKE '%' ";
        elseif($multiple_get_params['ptype'] == 'lost')
            $query.=" AND ptype='lost'";
        else
            $query.=" AND ptype='found'";
    }
    if(isset($_GET["cat"]))
    {
        $multiple_get_params['cat'] = defender_xss($_GET["cat"]);//decode
        if($multiple_get_params['cat']!="all")
            $query .=" AND category='{$multiple_get_params['cat']}' ";
        else
            $query .=" AND category LIKE '%' ";
    }
    if(isset($_GET["region"]))
    {
        $multiple_get_params['region'] = defender_xss($_GET["region"]);
        if($multiple_get_params['region']!="all")
            $query .=" AND region='{$multiple_get_params['region']}' ";
        else
            $query .=" AND region LIKE '%' ";
    }
    if(isset($_GET["city"]))
    {
        $multiple_get_params['city'] =defender_xss( $_GET["city"]);
        $query .=" AND city='{$multiple_get_params['city']}' ";
    }

    return $query;
}

$rowsPerPage = 10;
//старт индекс без get и не отдельный итем
if($_GET['page']==NULL && !isset($_GET['id']))
{
    $main_query = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items WHERE person LIKE '%' "; //WHERE category='$cur_cat' WHERE person LIKE '%'

    $main_query=addGetParameters($main_query);
    $main_query.=" ORDER BY date_entry DESC LIMIT 0,$rowsPerPage";
}

if($_GET['page']!=NULL)
{
    //текущая страница
    $currentPage = intval(defender_xss($_GET['page']));
    //стартовый индекс для запроса в БД
    $limitStartIndex = ($currentPage."0")-$rowsPerPage; //For $rowsPerPage = 10;
    //$limitStartIndex = ($currentPage."0")*2-$rowsPerPage; //$rowsPerPage = 20;
    $main_query = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items WHERE person LIKE '%' ";

    $main_query=addGetParameters($main_query);

    $main_query.=" ORDER BY date_entry DESC LIMIT $limitStartIndex,$rowsPerPage";

}


if(isset($_GET['id']) && $_GET['id']!=NULL)
{
    $id= defender_xss($_GET['id']);
    //var_dump($id);
    $id = (int)$id;
    //var_dump($id);
    if($id>0)
    {
        $main_query = 'SELECT * from tbl_laf_items WHERE id_entry='.$id;
    }
}

$result = $db->executeQueryUTF($main_query);


if(!isset($_GET['id']))
{
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
    $currentPage = intval(defender_xss($_GET['page']));

    //Pagination output here
    if($totalPages>1)
    echo pageNavigator($totalPages,$currentPage);

    echo '<pre>';
    var_dump(urlencode("Животные"));
    echo '</pre>';
}
function postOutput($label,$desc)
{
    $output="";
    $output.="<tr>";
    $output.="<th align='left' valign='top'>$label</th>";
    $output.="<td>$desc</td>";
    $output.="</tr>";
    return $output;
}
if(isset($_GET['id']) && $_GET['id']!=NULL)
{
    if ( mysql_num_rows( $result ) == 1 )
    {
        $title="HELLO";
        $image = mysql_fetch_array($result);
//        $output.="<h1>{$image['title']}</h1>";
        echo "<h1 align='center' style='font-family: sans-serif;'>{$image['title']}</h1>";
        $post_date = array();
        $post_date=explode("<br>",today_date($image['date_entry']));
        echo "<p align='center'>Добавлено: ".$post_date[0]." в ".$post_date[1]."</p>";
        echo "<div id='item_details'>";
//        echo '<div style='float:left;'><img src="'.$image['photo_link'].'" alt="opa" /></div>'."<br>";
        if($image['photo_link']!=NULL)
            echo "<div id='item_details_image' style='float: left;'><img src='{$image['photo_link']}' alt='opa'/></div>";
        else
            echo "<div id='item_details_image' style='float: left;'><img src='/images/no_image.png' alt='opa'/></div>";

        $output.="<table id='item_details_table' cellspacing='20'>";

        $output.=postOutput("Категория:",$image['category']);
        $output.=postOutput("Место:",$image['region'].", ".$image['city']);
        $output.=postOutput("Описание:",$image['description']);
        $output.=postOutput("Email:",$image['email']);

        if($image['phone']!=NULL)
            $output.=postOutput("Телефон:",$image['phone']);
        if($image['icq']!=NULL)
            $output.=postOutput("ICQ",$image['icq']);
        if($image['skype']!=NULL)
            $output.=postOutput("Skype:",$image['skype']);
        $output.="</table>";
        echo $output;
        echo "</div>";
    }
}

mysql_free_result($result);
$db->disconnect();


?>