<?php header('Content-type: text/html; charset=utf-8');?>
<html>
<?
include_once("lib/database.php");
include_once("lib/my_functions.php");

$title="Бюро находок в Украине";
$description ="";
if(isset($_GET['id']) && $_GET['id']!=NULL)
{
    $db = new Database();
    $db->connect();
    $id= defender_xss($_GET['id']);
    $id = (int)$id;
    if($id>0)
    {
        $main_query = 'SELECT * from tbl_laf_items WHERE id_entry='.$id;
    }
    $result = $db->executeQueryUTF($main_query);
    if ( mysql_num_rows( $result ) == 1 )
    {
        $item = mysql_fetch_array($result);
        $title=$item['title'];
        if(mb_strlen(($item['description']),'utf-8')>=156)
        {
            $description=mb_substr($item['description'],0,156,'utf-8');
        }
        else
            $description=$item['description'];
    }
}
if(isset($_GET['ptype'])&& $_GET['ptype']!="all")
{
    $cur_type=defender_xss($_GET['ptype']);
    if($cur_type=='lost') $title="Потери";
    if($cur_type=='found') $title="Находки";

}
if(isset($_GET['cat'])&& $_GET['cat']!="all")
    $title.=" | ".defender_xss($_GET['cat']);

if(isset($_GET['region']) && $_GET['region']!="all")
    $title.=" | ".defender_xss($_GET['region']);
if(isset($_GET['city'])&& $_GET['city']!="all")
    $title.=" | ".defender_xss($_GET['city']);

?>

<meta name="description" content="<?echo $description;?>" />
<title><? echo $title; ?></title>

<head>
    <script src="jquery-1.9.0.min.js"></script>
<!--    <script src="ajax-filters.js"></script>-->
    <script src="ajaxCities.js"></script>
    <style type="text/css">
        #wrapper
        {
            margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
            min-width: 980px;
            max-width: 1200px;
        }

        html, body {margin:0;height:100%;}

        #header {
            position:relative;
            /*width:980px;*/
            height:200px;
            border: 1px solid #E5E5E5;/*#add8e6;*/
            margin: 0 auto;
        }
        #top_section
        {
            position: relative;
            height: 120px;
            border: 1px solid #E5E5E5;
            background: url("images/body-bg.jpg");
            /*background: url(images/body-bg.jpg);*/
            /*background: #efe;*/
        }
        #logo{width: 30%;height:120px;position: absolute; left:0px;color:white;background: url(images/logo_blue.png) no-repeat center;}
        #menu {width: 70%;height:120px;position: absolute; right:0px;}
        #menu ul{list-style-type: none;}
        #menu ul li{color: white;float:left;font-size: 18px;margin:5px;position: relative;left:20%;}
        #menu ul li a:link, #menu li a:visited {background: #5FAAE3;color: white;text-decoration: none;display: inline-block;width: 90px;height: 70px;line-height: 70px;text-align: center;

            /*font-family: 'Open Sans';*/
            font-family: sans-serif;
            font-weight: 600;
        }
        #menu ul li a:hover{background: #6fbec6;text-align: center;}
            /*#header_image {position:absolute;left:50%;width:900px;height:500px;border: 1px solid #add8e6;background:url(images/header_487.png) no-repeat;}*/

        #functionality
        {
            position: relative;
            border: 1px solid #E5E5E5;
            margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
            /*width: 980px; *//*можно везде поставить auto!*/
            height: 200px;
            background-color: #fafafa;
            /*background-color: #ff8850;*//* reactor*/
            /*background-color: #f4964e;;*/
            /*border-top: 2px solid #f4964e;;*/
            /*border-bottom: 2px solid #f4964e;;*/
            /*margin-top: 3px;*/
            /*margin-bottom: 3px;*/

        }
        #choice_wrap
        {
            position: relative;
            /*border: 1px solid blue;*/
            margin: 0 auto; /*это чтоб центрировать контент при превышении max-width*/
            width: 900px; /*можно везде поставить auto!*/
            height: 100px;
            /*background:url(images/iam.png) no-repeat;*/
            background-position:top;
            /*background-color: #eacea9;*/
        }
        .button_found
        {
            position:absolute;
            top:20px;
            left:250px;
            border: none;
            float: none;
            display: block;
            width: 100px;
            padding: 8px 16px !important;
            background:#a8dbc6; /*#5FAAE3;*/
            color: #fff !important;
            font: 600 19px/32px 'Open Sans', sans-serif;
            text-align: center;
            text-decoration: none;
            border: 10px solid #ebebe9;
        }
        .button_lost
        {
            position:absolute;
            top:20px;
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
            border: 10px solid #ebebe9;
        }

            /*#left {float:left;width:200px;border: 1px solid #add8e6;}*/
            /*#right {float:right;width:200px;border: 1px solid #add8e6;}*/
        #center {
            margin: 0 auto;
            border: 1px solid #E5E5E5;
            min-width: 570px;

            /*width: 980px;*/
            /*background-color: #f4964e;*/
        }
        #spacer {height:100px;border: 1px solid #add8e6;}
        #footer {height:100px;margin-top:-100px;border: 1px solid #add8e6;}
        .clear {clear:both;}



        .main-table
        {
            /*position: relative;*//*added*/
            /*left: 15%;*//*added*/
            /*height:90%;*/
            width: 80%; /*was 80%*/
            table-layout:fixed;
            margin: 0 auto;
            /*display: block;*/
            word-wrap: break-word;
            border:1px solid #E5E5E5;
            border-collapse: separate;
            border-spacing: 0px 10px;

        }
        #item_details{display: inline-block;width: 100%;background: #fafafa;}
        #item_details_table
        {
            /*table-layout:fixed;*/
            margin: 10px;
            /*display: block;*/
            word-wrap: break-word;
            border:1px solid #E5E5E5;
            /*border-collapse: separate;*/
            /*border-spacing: 0px 10px;*/
        }
        #item_details_image
        {
            border:1px solid #E5E5E5;
            padding: 10px;
            margin: 10px;
        }
        .date_width { width: 100px; }

        .cat_width { width: 200px;}


            /*.td_even{background-color: #F0F0F0;padding:10px;border-bottom: 1px solid #6fbec6;border-top: 10px solid white;}*/
            /*.td_even a{text-decoration: none;}*/
            /*.td_even a:link,.td_even a:visited{color: #2e6dca;font-weight: bold;}*/

            /*.td_odd{background-color: #F0F0F0;padding:10px;border-bottom: 1px solid #6fbec6;border-bottom: 1px solid #6fbec6;border-top: 10px solid white;}*/
            /*.td_odd a{text-decoration: none;}*/
            /*.td_odd a:link,.td_odd a:visited{color: #2e6dca;font-weight: bold;}*/
        .main-table td{background-color: #F0F0F0;padding:10px; border-bottom: 1px solid #6fbec6;border-top: 8px solid white;height: 80px;}
        .main-table td a{text-decoration: none;}
        .main-table td a:link,.td_even a:visited{color: #2e6dca;font-weight: bold;}
        .main-table tr:hover td{border: 1px solid #6fbec6;} /*for all td's in a row*/
        .main-table th {
            background: #a2a2a6; /* Цвет фона */
            text-align: center; /* Выравнивание по левому краю */
            color:white;
            border-right: 1px solid white;
            font-family: 'Open Sans';
            font-family: sans-serif;
            padding: 10px;
            height: 90px;
        }

        .nav-pages {list-style-type:none;} /*-ul*/
        .nav-pages li {float:left;padding: 4px; margin: 5px;}
        .nav-color:link, .nav-color:visited {color: blue;}
        .nav-color:hover {color: red; }
        #page-navigation {border: 2px solid red; height:10%;overflow: hidden;min-width: 570px;min-height:50px;height:50px;width: 50%; margin: 0 auto;display: block;} /*pagination div*/
        #page-navigation ul{width:500px;margin:0px auto;}

        #search_bar{padding: 40px 10px 10px;}
        #nav_form:first-child{margin-left: 10%;}
        .wrap_sel
        {
            display: inline-block;
            /*width: 100px;*/
            height:40px;
            border: 1px solid green;
            float: left;
            margin-right: 10px;
            padding-left: 10px;
            text-align: left;
            background:#6fbec6; /*#5FAAE3;*/
            color: #fff !important;
            font-family: sans-serif;
            font-weight: 600;
            font-size: 14px;
        }
        .wrap_sel select{height: 30px;margin:5px;/*background-color: #6fbec6;border: 1px solid white;color: #fff;*/}
        .submit_go
        {
            height: 42px;
            width: 70px;
            text-align: center;
            background:#E55E48;
            color: #fff !important;
            font-family: sans-serif;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid #ff5241;;
        }
        /*.submit_go:hover{background: green;}*/
        #nav_form input[type="submit"]:hover{background: #5FAAE3;}
        .border_radius{ -moz-border-radius: 20px;-webkit-border-radius: 20px;-khtml-border-radius: 20px;border-radius: 3px;}
        /*.wrap_sel{height: 30px;margin-top: 10px;}*/


    </style>

    <script>
        function encodeInput(form)
        {
            //form.elements["cat"].value = encodeURIComponent(form.elements["cat"].value);
            var e = document.getElementById('category_select');
            e.options[e.selectedIndex].value= encodeURIComponent(e.options[e.selectedIndex].value);
            //in form:  onsubmit="encodeInput(this)"
        }
    </script>

</head>
<body>
<div id='wrapper'>
    <div id='top_section'>
        <div id='logo'>

        </div>
        <div id='menu'>
            <ul>
                <li><a href='http://buro/index.php'>Главная</a></li>
                <li><a href='/index.php?ptype=lost'>Потери</a></li>
                <li><a href='/index.php?ptype=found'>Находки</a></li>
                <li><a href='#'>О нас</a></li>
            </ul>
        </div>
    </div>
    <!--    <div id='header'>-->
    <!--    </div>-->
    <div id="functionality">

        <div id='choice_wrap'>
            <a href='post_add.php?ptype=found' class="button_found">Нашел</a>
            <a href='post_add.php?ptype=lost' class="button_lost">Потерял</a>
        </div>

        <div id='search_bar'>
        <form action="index.php" method="GET" id="nav_form">
            <div class="wrap_sel border_radius">
                <label for='category_select'>Категория:</label>
                <select id='category_select' name="cat">
                    <option value="all">Все</option>
                    <?php
                    include_once("getCategories.php");
                    ?>
                </select>

            </div>
            <div class="wrap_sel border_radius">
                <label for="region_select">Область:</label>
                <select id="region_select" name="region">
                    <option value="all">Все</option>
                    <?php
                    include_once("getRegions.php");
                    ?>
                </select>
            </div>
            <div class="wrap_sel border_radius">
                <label for="ptype_select">Тип:</label>
                <select name="ptype" id="ptype_select">
                    <option value="all">Все</option>
                    <option value="lost">Потери</option>
                    <option value="found">Находки</option>
                </select>
            </div>

<!--            <select id="city" name="city" style="visibility: hidden">-->
<!--                <option value="Сначала выберите область">Сначала выберите область</option>-->
<!--            </select>-->
            <input class="submit_go border_radius" type="submit" value="Вперед">
        </form>
        </div>

    </div>

    <!--        <div id='left'>-->
    <!--            <p>Left Column</p>-->
    <!--        </div>-->
    <!--        <div id='right'>-->
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
        <?php include_once("main.php");?>
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
