
<!DOCTYPE html>
<html>
	<head>
		
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Buyrentkenya.com mobile version" />
<meta http-equiv="content-language" content="en" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex,nofollow">

<title>Buyrentkenya.com - Mobile</title>

<link rel="shortcut icon" href="http://www.buyrentkenya.com/fav.ico" />		
		<link type="text/css" href="http://www.buyrentkenya.com/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link type="text/css" href="css/mobile-custom.css" rel="stylesheet" media="screen">
				
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://www.buyrentkenya.com/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://www.buyrentkenya.com/bootstrap/js/bootstrap-button.js"></script>
<script type="text/javascript" src="http://www.buyrentkenya.com/bootstrap/js/bootstrap-alert.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30875919-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>		<script type="text/javascript" src="http://www.buyrentkenya.com/js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$("#stf-form").validate(
					{	
					 	highlight: function(label) {
   					 		$(label).closest('.control-group').addClass('error');
  					 	},
  					 	unhighlight: function(label){
  					 		$(label).closest('.control-group').addClass('success');
  					 	},
  					 	errorPlacement: function(error, element) {
						   error.appendTo(element.parents(".controls").children(".help-block"));
						},
					   	errorElement: "em",
					   	
					   	submitHandler: function(form) {
					      	$('#send-button').button('loading');
					      	
					     	$.post('ajax_email_stf.php', {
							    	nom: $('#nom').val(),
							    	email: $('#email').val(),
							    	nomamis: $('#nomamis').val(),
							    	emailamis: $('#emailamis').val(),
							    	commentaires: $('#commentaires').val(),
							    	formcode: $('#formcode').val(),
							    	formtoken: $('#formtoken').val(),
							    	id_record: $('#id_record').val()
								}, function(d){
							    	// Here we handle the response from the script
							    	if(d.result == true)
							    	{
							    		$('#sendmail-result').html('<div class="alert alert-success fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>'+d.message+'</strong></div>');
							    	}
							    	else
							    	{
							    		if(d.error == 2)
							    		{
							    			$('#formtoken').val(d.token);
							    		}
							    		$('#sendmail-result').html('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">&times;</a><strong>'+d.message+'</strong><br /><small>error #'+d.error+'</small></div>');
							    	}
							    	
							    	$('#send-button').button('reset');
								},
								"json");
							
							return false;
					    }
  					}
				);
			});
		</script>
		
	</head>
	<body>
		<div class="container-fluid container-center property-details">
			
			
<div class="row-fluid post-spacer">

	<div class="span12 text-center">

		<a href="http://m.buyrentkenya.com/"><img src="images/logo.jpg"></a>

	</div>

</div>



			
			<div class="row-fluid post-spacer">
  				<div class="span12 text-center">
  					<a href="javascript:history.back()" class="btn btn-large btn-block">Back</a>
  				</div>
			</div>
  				
			
			<div class="row-fluid">
				<div class="span12 text-center">
					<div class="well well-small">
						<span class="price">30,000 Kshs</span><br />
						<span class="type">Commercial Space</span><br />
						<span class="default-txt"></span><br />
						<span class="default-txt">Nairobi CBD</span><br />
						<span class="default-txt">BRK-R15121</span>
					</div>
				</div>
			</div>
			
			<div class="row-fluid">
				<div class="span12 text-center">
					
					<form id="stf-form" action="ajax_email_stf.php" method="post">
						<fieldset>
							
							<legend>
								Email property to a friend
							</legend>
							
							<div id="sendmail-result"></div>
							
							<div class="alert alert-warning">
								<strong>All fields are mandatory</strong>
							</div>
							
							<div class="control-group">
								<label for="nom">Your name</label>
								<div class="controls">
									<input type="text" id="nom" name="nom" class="add-on-gap required">
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="control-group">
								<label for="email">Your email</label>
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-envelope"></i></span>
										<input type="text" id="email" name="email" class="required email">
									</div>
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="control-group">
								<label for="nomamis">Your friend's name</label>
								<div class="controls">
									<input type="text" id="nomamis" name="nomamis" class="add-on-gap required">
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="control-group">
								<label for="emailamis">Your friend's email</label>
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on"><i class="icon-envelope"></i></span>
										<input type="text" id="emailamis" name="emailamis" class="required email">
									</div>
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="control-group">
								<label for="commentaires">Message</label>
								<div class="controls">
									<textarea rows="4" id="commentaires" name="commentaires" class="add-on-gap required"></textarea>
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="ghost">
								<input type="text" id="formcode" name="formcode" value="">
								<input type="hidden" id="formtoken" name="formtoken" value="c4e8e0dbbbcf5b8ee8de6e825f6eb91a">
								<input type="hidden" id="id_record" name="id_record" value="15121">
							</div>
							
							<div class="pre-spacer">
								<input type="submit" id="send-button" class="btn btn-large btn-block" value="Send" data-loading-text="Sending...">
							</div>
							
						</fieldset>
					</form>
					
				</div>
			</div>
			

		</div>
	</body>
</html>