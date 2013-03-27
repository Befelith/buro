<?php header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
    <style type="text/css">
     #wrapper
     {
            margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
            min-width: 980px;
            max-width: 1400px;
     }

     html, body {margin:0;height:100%;}

     /*http://www.templatemonster.com/ru/demo/42626.html сделать хедер как здесь*/
     #header {
         position:relative;
         width:980px;
         height:500px;
         /*border: 1px solid #add8e6;*/

         background:url(images/header_487.png) no-repeat;
         background-color: #f4964e;
         background-position:center;
         margin: 0 auto;
     }
     /*#header_image {position:absolute;left:50%;width:900px;height:500px;border: 1px solid #add8e6;background:url(images/header_487.png) no-repeat;}*/
     #slogan{position:absolute;top:350px;left:50px;width: 400px; height: 100px;background-image: url(images/slogan_bg.png);}
     #menu_div{position:absolute;top:10px;left:50px;width: 880px; height: 60px;background-image: url(images/slogan_bg.png);}
     #menu li{color: white;float:left;font-size: 18px;margin:5px;}
     #menu li a:link, #menu li a:visited {color: white;text-decoration: none;}
     #menu li:visited{color: white;}
     #functionality
     {
         position: relative;
         /*border: 1px solid blue;*/
         margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
         width: 980px; /*можно везде поставить auto!*/
         height: 200px;
         /*background-color: #ff8850;*//* reactor*/
         background-color: #f4964e;;
         border-top: 2px solid #f4964e;;
         border-bottom: 2px solid #f4964e;;
         /*margin-top: 3px;*/
         /*margin-bottom: 3px;*/

     }
     #choice_wrap
     {
         position: relative;
         /*border: 1px solid blue;*/
         margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
         width: 900px; /*можно везде поставить auto!*/
         height: 200px;
         background:url(images/iam.png) no-repeat;
         background-position:top;
         background-color: #eacea9;
     }
     .button_found
     {
         position:absolute;
         top:130px;
         left:250px;
         border: none;
         float: none;
         display: block;
         width: 100px;
         padding: 8px 16px !important;
         background: #5FAAE3;
         color: #fff !important;
         font: 600 19px/32px 'Open Sans', sans-serif;
         text-align: center;
         text-decoration: none;
     }
     .button_lost
     {
         position:absolute;
         top:130px;
         right:250px;
         border: none;
         float: none;
         display: block;
         width: 100px;
         padding: 8px 16px !important;
         background: #E55E48;
         color: #fff !important;
         font: 600 19px/32px 'Open Sans', sans-serif;
         text-align: center;
         text-decoration: none;
     }

     /*#left {float:left;width:200px;border: 1px solid #add8e6;}*/
     /*#right {float:right;width:200px;border: 1px solid #add8e6;}*/
     #center {margin: 0 auto;border: 1px solid #add8e6;min-width: 570px;width: 980px;background-color: #f4964e;}
     #spacer {height:100px;border: 1px solid #add8e6;}
     #footer {height:100px;margin-top:-100px;border: 1px solid #add8e6;}
     .clear {clear:both;}



     .main-table
     {
         height:90%;
         table-layout:fixed;
         width: 92%;
         margin: 0 auto;
         display: block;
         word-wrap: break-word;
     }
     .date_width { width: 100px; }
     .cat_width { width: 200px; }
     .td_even{border: 2px solid #cef;background-color: #efe;padding:10px;}
     .td_odd{border: 2px solid #cef;background-color: #def;padding:10px;}
     .nav-pages {list-style-type:none;} /*-ul*/
     .nav-pages li {float:left;padding: 4px; margin: 5px;}
     .nav-color:link, .nav-color:visited {color: blue;}
     .nav-color:hover {color: red; }
     #page-navigation {border: 2px solid red; height:10%;overflow: hidden;min-width: 570px;min-height:50px;height:50px;width: 50%; margin: 0 auto;display: block;} /*pagination div*/
     #page-navigation ul{width:400px;margin:0px auto;}

    </style>
</head>
<body>
<div id='wrapper'>
    <div id='header'>
        <!-- Содержимое хэдэра -->
        <div id='menu_div'>
            <ul id='menu'>
                <li><a href='http://buro/index.php'>Главная</a></li>
                <li><a href='#'>Потери</a></li>
                <li><a href='#'>Находки</a></li>
                <li><a href='#'>О нас</a></li>
            </ul>
        </div>
            <div id='slogan'>
                <p style='color: white; font-size: 35px; text-align: center;'>Бюро находок<br><a style="font-size: 15px;">Единственное, чего нельзя найти, - это потерянного времени.</a></p>
            </div>


    </div>
    <div id="functionality">
        <!--Управление-->
        <div id='choice_wrap'>
            <a href='post_add.php?type=found' class="button_found">Нашел</a>
            <a href='post_add.php?type=lost' class="button_lost">Потерял</a>
        </div>
    </div>

<!--        <div id='left'>-->
<!--            <!-- Содержимое левой колонки -->
<!--            <p>Left Column</p>-->
<!--        </div>-->
<!--        <div id='right'>-->
<!--            <!-- Содержимое правой колонки -->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--            <p>Right Column</p>-->
<!--        </div>-->
        <div id='center'>
            <!-- Содержимое центральной колонки -->
            <?php include_once("lib/main.php");?>
            <p>Center div</p>
        </div>

    <div class='clear'></div>
    <div id='spacer'></div>
</div>
<div id='footer'>
    <!-- Содержимое футера -->
</div>
</body>
</html>