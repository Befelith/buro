$(document).ready (function(){
	

	/* $("#myForm").submit( function(event,data){
		event.preventDefault();
	
	}); */
	 
	 $('#test').click(function() {
	 
		var successFlag=true;
		var obj={};
		$('.finVal').each(function(){
			
			obj[$(this).attr('name')]= $(this).val();
			
			if($(this).is(':checked'))
				obj[$(this).attr('name')]="OK";
				//alert($(this).attr('name'));
				//obj[$(this).attr('name')]= "checked";
		});
		//alert(obj.checkTerms);
		
		var jsonEncoded = JSON.stringify(obj);//$.toJSON(obj)
		$.post("ajax-test.php", {jsonData:jsonEncoded})
		.done(function(data) { validateAll(data);
		})
		.fail(function() { alert("error"); });
		//.always(function() { alert("finished"); });
	});
	
	function validateAll(data)
	{
		var parsedData = jQuery.parseJSON(data);
		var resString="";
		
		for(var val in parsedData)
		{
			resString+=val+":"+parsedData[val]+"\n";
			if(parsedData[val]!="OK")
			{
				$("#"+val+"Error").addClass("showError");
				$("#"+val+"Error").html('<small style="color:red;"><span style="vertical-align:middle;">'+parsedData[val]+'</span></small>');
				if(parsedData[val]=="OK") $("#"+val+"Error").removeClass("showError");
				successFlag=false;
			}
		}
	}
	
});
	