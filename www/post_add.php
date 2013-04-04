<?php header('Content-type: text/html; charset=utf-8');?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="jquery-1.9.0.min.js"></script><!--http://code.jquery.com/jquery-latest.js-->
	<script src="ajaxCities.js"></script>
	<script src="charCounter.js"></script>
	<script src="ajax-form-validation.js"></script>
	<script src="validation_by_submit.js"></script>
	<style type="text/css">
	select{display:block;}
	#formWrapper { border: 2px solid orange;width:1000px;height:800px;}
	.asterisk { color:red;font-size:95%;padding-right:10px;}
	.clr{clear:both;}
	#termsCB{margin-left:300px;}
	.submitButton{height:40px;margin:20px 0 0 350px;float:left;}
	.fleft{float:left;}
	.inputLabel{border:none; display:block; font-size:95%; font-weight:700;  padding:0 0 1px; width: 30%;  text-align: right;}
	.inputBlockSeparator{margin:10px 0 10px 0;}
	
	.showError{padding:0px;border:1px solid black;}
	.errorDiv{padding:5px; margin-left:10px;}
	</style>
	
	</head>
        <body>
		<div>UHAHAHA</div>
            <div id="formWrapper">
                <form enctype="multipart/form-data" id="myForm" action="confirm_page.php" method="post">
					
					<input type="hidden" name="item_type" value="<? echo $_GET['type']; ?>" />
					<!--------------------Заголовок-------------------->
					<div class="inputBlockSeparator">
                        <label class="fleft inputLabel">Заголовок<span class="asterisk">*</span></label>
                        <input type="text" name="title" id="titleInput" class="fleft validateInput finVal" maxlength="70" size="50px">
                        <div class="fleft errorDiv" id="titleError"></div>
                        <!--<span class="counter"></span>-->
                        <div class="counter clr" style="margin-left:30%;"></div>
					</div>
					<div class="clr"></div>	
					
					<!--------------------Категория-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Категория<span class="asterisk">*</span></label>
					<select id="category"  name="category" class="fleft validateSelect finVal">
                    <option value="Выбрать">Выбрать</option>
					<?php
						include_once("getCategories.php");
					?>
					</select>
					<div class="fleft errorDiv" id="categoryError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Регион-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Регион<span class="asterisk">*</span></label>
					<select id="region"  name="region" class="fleft validateSelect finVal">
                    <option value="Выбрать">Выбрать</option>
					<?php
						include_once("getRegions.php");
                    ?>
					</select>
					<div class="fleft  errorDiv" id="regionError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Город-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Город<span class="asterisk">*</span></label>
					<select id="city" name="city" class="fleft validateSelect finVal">
						<option value="Выбрать">Выбрать</option>
					</select>
					<div class="fleft  errorDiv" id="cityError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Описание-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Описание<span class="asterisk">*</span></label>
					<textarea  class="fleft validateInput finVal" id="description" name="description"  maxlength="2000" height="340px" width="400px" rows="10" cols="39"></textarea>
					<div class="fleft errorDiv" id="descriptionError"></div>
					<div class="counter clr" style="margin-left:30%;"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Картинка-------------------->
					<div class="inputBlockSeparator">
					<input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
					<label class="fleft inputLabel">Картинка<span class="asterisk"></span></label>
					<input name="userImage" class="fleft" id="imageInput" type="file" accept="image/x-png, image/gif, image/jpeg" value=""></input>
					<div class="fleft errorDiv" id="imageError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Контактное лицо-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Контактное лицо<span class="asterisk">*</span></label>
					<input id="personInput" type="text" name="person" class="fleft validateInput finVal" maxlength="60" size="30px"></input>
					<div class="fleft errorDiv" id="personError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------E-mail-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">E-mail<span class="asterisk">*</span></label>
					<input id="emailInput" type="text" name="email" class="fleft validateInput finVal" maxlength="60" size="30px"></input>
					<div class="fleft errorDiv" id="emailError"></div>
					</div>
					<div class="clr"></div>
					
					<!--------------------Номер телефона-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Номер телефона<span class="asterisk"></span></label>
					<input type="text" name="phone"  class="finVal" maxlength="60" size="30px"></input>
					</div>
					<div class="clr"></div>
					
					<!--------------------ICQ-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">ICQ<span class="asterisk"></span></label>
					<input type="text" name="icq"  class="finVal" maxlength="10" size="30px"></input>
					</div>
					<div class="clr"></div>
					
					<!--------------------Skype-------------------->
					<div class="inputBlockSeparator">
					<label class="fleft inputLabel">Skype<span class="asterisk"></span></label>
					<input type="text" name="skype" class="finVal" maxlength="32" size="30px"></input>
					</div>
					<div class="clr"></div>
					
					<!--------------------Правила-------------------->
					<input type="checkbox" name="terms" class="fleft validateSelect finVal" id="termsCB" value="yes"></input>
					<label for="termsCB" class="fleft">С <a href="#">правилами</a> ознакомлен</label>
					<div class="fleft errorDiv" id="termsError"></div>
					<div class="clr"></div>
					
					<!--------------------Опубликовать-------------------->
					<input class="submitButton" id="submit" type="submit" value="Опубликовать">
					<!--<input type="button" value="Test" id="test">-->
					
				</form>
            </div>
			
			
			
        </body>
    
</html>