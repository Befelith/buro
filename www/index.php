<?php header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
</head>
<body>
<?php
echo "<a href='post_add.php?type=lost'>Потерял</a><br>";
echo "<a href='post_add.php?type=found'>Нашел</a><br>";

include_once("lib/database.php");

$db = new Database();

$db->connect();
$q = 'SELECT id_entry,category,region,city,title,date_entry FROM tbl_laf_items';
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

mysql_free_result($result);
$db->disconnect();



?>
</body>
</html>