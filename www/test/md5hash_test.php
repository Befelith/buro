<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 20.02.13
 * Time: 15:09
 * To change this template use File | Settings | File Templates.
 */

    echo $_SERVER['REMOTE_ADDR']."<br>";
echo microtime()."<br>";
    echo md5(date("m-d H:i:s").microtime().$_SERVER['REMOTE_ADDR']).".jpg"."<br>";

?>