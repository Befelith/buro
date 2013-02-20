$(document).ready (function(){
	// Принимаем значение и отправляем на обработку
	var currentId="";
	$('.validateInput').keyup (function() { //for all inputs
	currentId= $(this).attr('id');
	
	var textLenght = $(this).val();
		$.ajax({
			type:'POST',
			url:"ajax-validation.php",
			data:{text:textLenght,id:currentId},
			success: function(data){ validateInput(data); },
			dataType:"json"
		});
	
	});
	
	$('.validateSelect').change (function() { //for all selects
	currentId= $(this).attr('id');
	var textLenght = $(this).val();

	if($(this).is(':checkbox:not(:checked)') )
		textLenght="unchecked";
	
		$.ajax({
			type:'POST',
			url:"ajax-validation.php",
			data:{text:textLenght,id:currentId},
			success: function(data){ validateSelect(data); },
			dataType:"json"
		});
	
	});
	
	$('#emailInput').blur(function(){
	currentId= $(this).attr('id');
	var textLenght = $(this).val();
		$.ajax({
				type:'POST',
				url:"ajax-validation.php",
				data:{text:textLenght,id:currentId},
				success: function(data){ validateEmail(data); },
				dataType:"json"
			});
	
	});
	$('#imageInput').on('change',function(){
	
	
		var file = this.files[0];
		//alert(file.size+" "+ file.name+" "+file.type);
		$.ajax({
			type:'POST',
			url:"ajax-validation.php",
			data:{image:file.size},
			success:function(data){validateImage(data);},
			dataType:"json"
		});
	
	});
	function validateImage(data)
	{
		$("#imageError").addClass("showError");
			$("#imageError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#imageError").removeClass("showError");
	}
	function validateEmail(data)
	{
		if(currentId=="emailInput")
		{
			$("#emailError").addClass("showError");
			$("#emailError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#emailError").removeClass("showError");
		}
	}
	function validateInput(data)
	{
		//alert(data[0].msg);
		//alert(currentId);
			//$("#titleError").html(data[0].msg);
			//alert(data);
		if(currentId=="titleInput")
		{
			$("#titleError").addClass("showError");
			$("#titleError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			
			if(data=="") $("#titleError").removeClass("showError");
		}
		if(currentId=="personInput")
		{
			$("#personError").addClass("showError");
			$("#personError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#personError").removeClass("showError");
		}
		if(currentId=="emailInput")
		{
			$("#emailError").addClass("showError");
			$("#emailError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#emailError").removeClass("showError");
		}
		
		if(currentId=="description")
		{
			$("#descriptionError").addClass("showError");
			$("#descriptionError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#descriptionError").removeClass("showError");
		}
		
		
		
	}
	function validateSelect(data)
	{
		if(currentId=="category") // надо делать на блуре
		{
			$("#categoryError").addClass("showError");
			$("#categoryError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#categoryError").removeClass("showError");
		}
		
		if(currentId=="region") // надо делать на блуре
		{
			$("#regionError").addClass("showError");
			$("#regionError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#regionError").removeClass("showError");
		}
		
		if(currentId=="city") // надо делать на блуре
		{
			$("#cityError").addClass("showError");
			$("#cityError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#cityError").removeClass("showError");
		}
		
		if(currentId=="termsCB")
		{
			$("#termsError").addClass("showError");
			$("#termsError").html('<small style="color:red;"><span style="vertical-align:middle;">'+data+'</span></small>');
			if(data=="") $("#termsError").removeClass("showError");
		}
	}
});
	