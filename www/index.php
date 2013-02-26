<?php header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
    <style type="text/css">
    .nav-pages {list-style-type:none;}
    .nav-pages li {float:left;padding: 4px; margin: 5px;}
    .nav-color:link, .nav-color:visited {
        color: blue;
    }
    .nav-color:hover {
        color: red;
    }
    #page-navigation
    {
        border: 2px solid #add8e6;
        width: 20%;
        height: 10%;

    }

    </style>
</head>
<body>
<?php
echo "<a href='post_add.php?type=lost'>Потерял</a><br>";
echo "<a href='post_add.php?type=found'>Нашел</a><br>";

include_once("lib/database.php");

$db = new Database();

$db->connect();
//var_dump($_GET['page']);
if($_GET['page']==NULL)
    $q = 'SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items ORDER BY date_entry DESC LIMIT 0,10';
if($_GET['page']!=NULL)
{
    $currentPage = $_GET['page'];
    $limitStartIndex = ($currentPage."0")-10;
    $q = "SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items ORDER BY date_entry DESC LIMIT $limitStartIndex,10";
}

$result = $db->executeQueryUTF($q);

echo "<table style=\"border:3px solid #cef;border-collapse: collapse;\">";
$odd_counter=0;
while($line = mysql_fetch_array($result,MYSQL_ASSOC))
{
    $odd_counter++;
    echo "<tr>\n";
    foreach($line as $key=>$value)
    {
        if($odd_counter%2!=0)
        {
             if($key!='photo_link' and $key!='title' and $key!='id_entry')
                echo '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.$value.'</td>';
            if($key=='title')
                 echo '<td style=" border: 2px solid #cefn;background-color: #def;padding:10px;" align="center"><a href="image.php?id='.$line["id_entry"].'">'.$value.'</a></td>';
            if($key=='photo_link')
                echo '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
        }
        else
        {
            if($key!='photo_link' and $key!='title'and $key!='id_entry')
                echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.$value.'</td>';
            if($key=='title')
                echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center"><a href="image.php?id='.$line["id_entry"].'">'.$value.'</a></td>';
            if($key=='photo_link')
                echo '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
        }

    }

    echo "</tr>\n";
}
echo "</table>";

$qRowsCount = 'SELECT COUNT(*) FROM tbl_laf_items';
$count = $db->executeQueryUTF($qRowsCount);
$totalRowsCount = mysql_fetch_array($count,MYSQL_NUM);
$rowsPerPage = 10;
$totalPages = $totalRowsCount[0] / $rowsPerPage;
$totalPages = round($totalPages);
//echo $totalPages;

if($totalPages >= 1)
{
    //echo "Current Page is: ".$_GET['page'];
    echo $totalPages. '!!!!!!';
    $currentPage = $_GET['page'];
    $nextPage = $currentPage+1;
    $prevPage = $currentPage-1;
    echo '<div id="page-navigation">';
    echo '<ul class="nav-pages">';
    if($prevPage > 0)
        echo "<li><a class='nav-color' href='/index.php?page=$prevPage'> Туда </a> </li>";
    else
        echo "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> Туда </a> </li>";

    for($i=1;$i<=$totalPages;$i++)
    {
        if($currentPage==NULL) $currentPage=1;
        if($i != $currentPage)
            echo "<li><a class='nav-color' href='/index.php?page=$i'> $i </a> </li>";
        if($i == $currentPage)
            echo "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> $i </a> </li>";
    }

    if(($totalPages-$nextPage) >= 0)
        echo "<li><a class='nav-color' href='/index.php?page=$nextPage'> Сюда </a> </li>";
    else
        echo "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> Сюда </a> </li>";
    echo '</ul>';
    echo '</div>';
}

mysql_free_result($result);
$db->disconnect();



?>
</body>
</html>