<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 20.02.13
 * Time: 12:35
 * To change this template use File | Settings | File Templates.
 */
class Database
{
    var $database_name;
    var $database_user;
    var $database_pwd;
    var $database_host;
    var $database_link;

    function Database()
    {
        $this->database_name = "buro_nahodok_db";
        $this->database_host = "localhost";
        $this->database_user = "root";
        $this->database_pwd = "";
    }

    function setDBName($db_name)
    {
        $this->database_name=$db_name;
    }

    function setHost($host)
    {
        $this->database_host = $host;
    }

    function setUser($user)
    {
        $this->database_user = $user;
    }

    function setPwd($pwd)
    {
        $this->database_pwd = $pwd;
    }

    function connect()
    {
        //1 открываем соедениние
        $this->database_link = mysql_connect($this->database_host,$this->database_user);
        //2 - выбираем БД
        mysql_select_db($this->database_name) or die ("Oops...MySQL connection failed. ". $this->database_name);
    }
    function disconnect()
    {
        if(isset($this->database_link))
            mysql_close($this->database_link);
        else
            mysql_close();
    }


    function executeQueryUTF($query)
    {
        //mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $connection);
        // в какой кодировке получать данные от клиента
        @mysql_query('set character_set_client="utf8"');

        // в какой кодировке получать данные от БД для вывода клиенту
        @mysql_query('set character_set_results="utf8"');

        // кодировка в которой будут посылаться служебные команды для сервера
        @mysql_query('set collation_connection="utf8_general_ci"');

        $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

        return $result;
    }



}

?>