<?php
function pageNavigator($totalPages,$currentPage)
{
    global $multiple_get_params;
    $addedGetParameters="";
    $my_counter=0;
    if(count($multiple_get_params)>0)
    {
        foreach($multiple_get_params as $key=>$value)
        {
            $addedGetParameters.="&".$key."=".$value;
//            $my_counter++;
//            if($my_counter!=count($multiple_get_params))
//                $addedGetParameters.=$key."=".$value."&";
//            elseif($my_counter!=count($multiple_get_params) AND isset($_GET['page']))
//                $addedGetParameters.=$key."=".$value."&";
//            else
//                $addedGetParameters.=$key."=".$value;
        }
    }

    if($totalPages >= 1)
    {
        //echo "Current Page is: ".$_GET['page'];
        //echo $totalPages. '!!!!!!';


        if($currentPage==NULL) $currentPage=1;
        $output="";
        $nextPage = $currentPage+1;
        $prevPage = $currentPage-1;
        $output.= '<div id="page-navigation">';
        $output.= '<ul class="nav-pages">';
        // формируем ссылку на предыдущую страницу
        if($prevPage > 0)
            $output.= "<li><a class='nav-color' href='/index.php?page={$prevPage}{$addedGetParameters}'>&larr;Туда </a> </li>";
        else
            $output.= "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> &larr;Туда </a> </li>";//если на первой странице

        for($i=1;$i<=$totalPages;$i++)
        {
            if($currentPage==NULL) $currentPage=1;
            if($i != $currentPage)
                $output.= "<li><a class='nav-color' href='/index.php?page={$i}{$addedGetParameters}'> $i </a> </li>";
            if($i == $currentPage)
                $output.= "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> $i </a> </li>"; // текущая страница

        }

        // формируем ссылку на следующую страницу
        if(($totalPages-$nextPage) >= 0)
            $output.= "<li><a class='nav-color' href='/index.php?page={$nextPage}{$addedGetParameters}'> Сюда &rarr;</a> </li>";
        else
            $output.= "<li><a style='background: #add8e6; padding:2px 6px 2px 6px; color:white;'> Сюда &rarr;</a> </li>"; // если на последней странице
        $output.= '</ul>';
        $output.= '</div>';
    }

    return $output;
}

?>