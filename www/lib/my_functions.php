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
function today_date($full_date)
{
    list($date,$time) = explode(" ",$full_date);
    list($year,$month,$day) = explode("-",$date);
    list($hour,$minute) = explode(":",$time);

    if($date==date("Y-m-d"))
        $result = "Сегодня"."<br>".$hour.":".$minute;
    elseif((date("d")-$day)==1)
        $result = "Вчера"."<br>".$hour.":".$minute;
    else
        $result = $day."-".$month."-".$year."<br>".$hour.":".$minute;

    return $result;
}
?>
