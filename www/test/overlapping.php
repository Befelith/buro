<?php header('Content-type: text/html; charset=utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Верстка от AD</title>
    <style type="text/css">
        .nav-pages {list-style-type:none;} /*-ul*/
        .nav-pages li {float:left;padding: 4px; margin: 5px;}
        .nav-color:link, .nav-color:visited {color: blue;}
        .nav-color:hover {color: red; }
        #page-navigation {border: 2px solid red; height:10%;overflow: hidden;min-width: 570px;min-height:50px;height:50px;width: 50%; margin: 0 auto;display: block;border: 1px solid #add8e6;} /*pagination div*/
        #page-navigation ul{width:400px;margin:0px auto;}
        html, body {margin:0;height:100%;}
        #wrapper {height:auto !important;height:100%;min-height:100%;min-width:800px;border: 1px solid #add8e6;}
        #header {height:200px;border: 1px solid #add8e6;}
        #left {float:left;width:200px;border: 1px solid #add8e6;}
        #right {float:right;width:200px;border: 1px solid #add8e6;}
        #center {margin:0 200px 0 200px;border: 1px solid #add8e6;}
        #spacer {height:100px;border: 1px solid #add8e6;}
        #footer {height:100px;margin-top:-100px;border: 1px solid #add8e6;}
        .clear {clear:both;}
    </style>
</head>
<body>
<div id='wrapper'>
    <div id='header'>
        <!-- Содержимое хэдэра -->
    </div>
    <div id='container'>
        <div id='left'>
            <!-- Содержимое левой колонки -->
        </div>
        <div id='right'>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <P>QWEEEEEEEEEEE</P>
            <!-- Содержимое правой колонки -->
        </div>
        <div id='center'>
            <P>QWEEEEEEEEEEE</P>
            <?php include_once("lib/main.php");?>
            <!-- Содержимое центральной колонки -->
        </div>
    </div>
    <div class='clear'></div>
    <div id='spacer'></div>
</div>
<div id='footer'>
    <!-- Содержимое футера -->
</div>
</body>
</html>