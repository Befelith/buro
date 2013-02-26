$(document) .ready(function()
	{
		var successFlag=true;
		
		$("#myForm").submit( function(event){
			
			var obj={};
			//var file = $('#imageInput').files[0];
			$('.finVal').each(function(){
					var str = $.trim($(this).val());
					var text = str.replace(/\s+/g,' ');
					
					if($(this).attr('name')=='title')
					{
						if(text=="") obj[$(this).attr('name')] = "Заголовок не может быть пустым";
						else if(text.length<4) obj[$(this).attr('name')] = "Заголовок не может быть короче 4 знаков";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='category')
					{
						if(text=="Выбрать") obj[$(this).attr('name')] = "Пожалуйста, укажите категорию";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='region')
					{
						if(text=="Выбрать") obj[$(this).attr('name')] = "Пожалуйста, укажите регион";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='city')
					{
						if(text=="Выбрать") obj[$(this).attr('name')] = "Пожалуйста, укажите город";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='description')
					{
                        if(text=="") obj[$(this).attr('name')] = "Описание не может быть пустым";
						else if(text.length<12) obj[$(this).attr('name')] = "Описание не может быть короче 12 знаков";
						else obj[$(this).attr('name')]="OK";
					}
					
					if($(this).attr('name')=='userImage')
					{
						if($('#imageInput').files[0].size >2097152) obj[$(this).attr('name')] = "Размер файла не может превышать 2МБ";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='person')
					{
						if(text=="") obj[$(this).attr('name')] = "Пожалуйста, укажите имя контактного лица";
						else if(text.length<2) obj[$(this).attr('name')] = "Минимум 2 буквы";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='email')
					{
						if(text=="") obj[$(this).attr('name')] = "Укажите контактный e-mail";
						else if(!IsEmail(text)) obj[$(this).attr('name')] = "E-mail введен не правильно!";
						else obj[$(this).attr('name')]="OK";
					}
					if($(this).attr('name')=='terms')
					{
						if($(this).is(':checkbox:not(:checked)')) obj[$(this).attr('name')] = "Поле обязательно для заполнения";
						else obj[$(this).attr('name')]="OK";
					}
				
				
			});
			validateAll(obj);
			if(!successFlag)
			{
				event.preventDefault();
			}
			else
			return true;
	
		});
		function IsEmail(email) 
		{
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}
		function validateAll(data)
		{
			//var parsedData = jQuery.parseJSON(data);
			parsedData=data;
			var resString="";
			successFlag=true;
			for(var val in parsedData)
			{
				if(parsedData[val]!="OK")
				{
					
					$("#"+val+"Error").addClass("showError");
					$("#"+val+"Error").html('<small style="color:red;"><span style="vertical-align:middle;">'+parsedData[val]+'</span></small>');
					if(parsedData[val]=="OK") $("#"+val+"Error").removeClass("showError");
					successFlag=false;
				}
				resString+=val+":"+parsedData[val]+" flag: "+successFlag+"\n";
			}
			//alert(resString);
			// if(parsedData.saved=="OK")
			// {
				// $('#myForm').html("<div id='message'></div><div id='moo'>OKDA</div>");  
				// $('#message').html("<h2>Contact Form Submitted!</h2>")  
				// .append("<p>We will be in touch soon.</p>") ; 
			// }
			//if(successFlag)
				//$(this).unbind('submit').submit();
			
			return successFlag;
		}
	});	 