<?php

function createMainTable($result)
{
    $output_table="";

    $output_table.= "<table class='main-table'>";
    $odd_counter=0;
    $output_table.= "<tr>";
    $output_table.= "<th>Заголовок</th>";
    $output_table.= "<th class='date_width'>Добавлено</th>";
    $output_table.= "<th class='cat_width'>Категория</th>";
    $output_table.= "</tr>";
    while($line = mysql_fetch_array($result,MYSQL_ASSOC))
    {
        $output_table.= "<tr>";
        $output_table.= '<td class="td_even" align="left"><a href="index.php?id='.$line["id_entry"].'">'.$line['title'].'</a>'.'<br>'.'<small>'.$line['region'].', '.$line['city'].'</small>'.'</td>';
        $output_table.= '<td class="td_even date_width" align="center">'.today_date($line['date_entry']).'</td>';
        $output_table.= '<td class="td_even cat_width" align="center">'.$line['category'].'</td>';



            //$output_table.='<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.'<img src="'.$line['photo_link'].'" alt="opa" width="50px" height="50px"/>'.'</td>';


//        foreach($line as $key=>$value)
//        {
//            if($odd_counter%2!=0)
//            {
////                if($key!='photo_link' and $key!='title' and $key!='id_entry' and $key!='region')
////                    $output_table.= '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.$value.'</td>';
////                if($key=='title')
////                    $output_table.= '<td style=" border: 2px solid #cefn;background-color: #def;padding:10px;" align="center"><a href="item.php?id='.$line["id_entry"].'">'.$value.'</a></td>';
////                if($key=='photo_link')
////                    $output_table.='<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
//
//                if($key=='region')
//                    $output_table.= '<td style=" border: 2px solid #cef;background-color: #def;padding:10px;" align="center">'.$value.'<br>'.$line['city'].'</td>';
//               // if($key=='region')
//            }
//            else
//            {
//                if($key!='photo_link' and $key!='title'and $key!='id_entry' and $key!='region')
//                    $output_table.= '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.$value.'</td>';
//                if($key=='title')
//                    $output_table.= '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center"><a href="item.php?id='.$line["id_entry"].'">'.$value.'</a></td>';
//                if($key=='photo_link')
//                    $output_table.= '<td style=" border: 2px solid #cef;background-color: #efe;padding:10px;" align="center">'.'<img src="'.$value.'" alt="opa" width="50px" height="50px"/>'.'</td>';
//            }
//
//        }

        $output_table.= "</tr>\n";
    }
    $output_table.= "</table>";


    return $output_table;
}
?>