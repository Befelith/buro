<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 10.04.13
 * Time: 16:01
 * To change this template use File | Settings | File Templates.
 */
function tagCleaner($var)
{
    $var = str_replace('"',"",$var);
    $var = str_replace("'","",$var);

    $var = strip_tags($var);
    return $var;
}
?>
