<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 10.04.13
 * Time: 16:01
 * To change this template use File | Settings | File Templates.
 */
function strip_slashes_recursive( $variable )
{
    if ( is_string( $variable ) )
        return stripslashes( $variable ) ;
    if ( is_array( $variable ) )
        foreach( $variable as $i => $value )
            $variable[ $i ] = strip_slashes_recursive( $value ) ;

    return $variable ;
}
function defender_xss($input_text)
{
    $filter = array("<",">","'",'"',"=","/","\\","(",")",";","input", "union", "script", "select", "update", "script", "www", "http");
    $output_text = str_replace($filter,"",$input_text);
    $output_text=strip_slashes_recursive($output_text);
    return $output_text;
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
