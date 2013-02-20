$(document).ready (function(){
// Принимаем значение и отправляем на обработку
		$("#region").change(function(){
	   var id = $(this).val();
	   $.ajax({
		  type: 'POST',
		  url: "getCities.php",
		  data: {cityId : id},
		  error: function(req, text, error) {
			  alert('Ошибка AJAX: ' + text + ' | ' + error);
		  },
		  success: function (data) {
			  showCities(data);
		  },
		  dataType: "json"
	  });
	});
	// Получаем результат выборки из базы и выводим на 
	//страницу с помощью jQuery
	function showCities(data){
	   $('#city').find('option').remove().end().append('<option value="Выбрать">Выбрать</option>').val('Выбрать');
	   for(var value in data)
	   {
		$("#city").append("<option value=\"" + data[value][0] + "\">" + data[value][0] + "</option>");
	   }

	   	
}
});