<?php header('Content-type: text/html; charset=utf-8');

/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 26.03.13
 * Time: 18:36
 * To change this template use File | Settings | File Templates.
 */
function tagCleaner($var)
{
    $var = str_replace("'","",$var);
    $var = stripslashes($var);
    //$var = stripcslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}
$text = $_POST['mytext'];
echo tagCleaner($text);
?>