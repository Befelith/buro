<?php header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
    <style type="text/css">
    .nav-pages {list-style-type:none;} /*-ul*/
    .nav-pages li {float:left;padding: 4px; margin: 5px;}
    .nav-color:link, .nav-color:visited {color: blue;}
    .nav-color:hover {color: red; }
    #page-navigation {border: 2px solid red; height:10%;overflow: hidden;min-width: 800px;min-height:50px;height:50px;width: 50%; margin: 0 auto;display: block;} /*pagination div*/
    #page-navigation ul{width:400px;margin:0px auto;}

    /*.main-table-wrapper{width: 50%;height: 50%;min-width: 800px; margin: 0 auto;border: 1px solid black;display: block;}*/
    .main-table{width: 100%;height:100%;}
    #wrapper {
        margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
        min-width: 980px;
        max-width: 1500px;
    }


    html, body {margin:0;height:100%;}
    /*#wrapper {height:auto !important;height:100%;min-height:100%;min-width:800px;}*/
    #header {height:200px;border: 1px solid #add8e6;}
    #functionality{height:100px;border: 1px solid #add8e6;}
    #left {float:left;width:200px;border: 1px solid #add8e6;}
    #right {float:right;width:200px;border: 1px solid #add8e6;}
    #center {margin:0 200px 0 200px;border: 1px solid #add8e6;min-width: 560px;}
    #spacer {height:100px;border: 1px solid #add8e6;}
    #footer {height:100px;margin-top:-100px;border: 1px solid #add8e6;}
    .clear {clear:both;}

    </style>
</head>
<body>
<div id='wrapper'>
    <div id='header'>
        <!-- Содержимое хэдэра -->
        <p>header here</p>
    </div>
    <div id="functionality">
        <!--Управление-->
        <p>Functional here</p>
    </div>
<!--    <div id='container'>-->
        <p>Container</p>
        <div id='left'>
            <!-- Содержимое левой колонки -->
            <p>Left Column</p>
        </div>
        <div id='right'>
            <!-- Содержимое правой колонки -->
            <p>Right Column</p>
        </div>
        <div id='center'>
            <!-- Содержимое центральной колонки -->
            <?php include_once("lib/main.php");?>
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