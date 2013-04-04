$(document).ready(function(){

    $('#category_select').change(function(){
        //alert("");
     var selected_category =  $(this).val();
//    alert(selected_category );

       $.get(
           "index.php",
           {
               category:selected_category
           },
           onAjaxSuccess
       );
        function onAjaxSuccess(data)
        {
            // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
            alert(data);
           $('#footer').append(data);
        }
//        $.ajax({
//            type: "GET",
//            url: "index.php",
//            data:"category="+selected_category
//        });

    });
});
