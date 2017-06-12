<script>
$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true
   },
   username: {
            required: true
            },
    },
       messages:
    {
            password:{
                      required: "<?=$site_lang['login_enterpassword']?>"
                     },
            username: "<?=$site_lang['login_enterusername']?>",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    $("#btn-login").attr('disabled',true);	
	
   $.ajax({
    
   type : 'POST',
   url  : 'loginprocess.php',
   data : data,
 //  alert(data);
   beforeSend: function()
   {
	   
    $("#error").fadeOut();
    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; <?=$site_lang['login_progress']?>');
	
   },
   success :  function(response)
      {      
     if(response=="1"){
         
      $("#btn-login").html('<img src="<?=$img?>/btn-ajax-loader.gif" /> &nbsp; <?=$site_lang['login_sucesslogin']?>');
      setTimeout(' window.location.href = "dashboard.php"; ',4000);
	  
     }
     else if(response=="2"){
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?=$site_lang['login_errorloginmisseddata']?> !</div>');
           $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; <?=$site_lang['login_button']?>');
         });
     $("#btn-login").removeAttr('disabled','disabled');
	 }
     else if(response=="0"){
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?=$site_lang['login_errorloginuserorpass']?> !</div>');
           $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; <?=$site_lang['login_button']?>');
         });
     $("#btn-login").removeAttr('disabled','disabled');
	 }	 
	//alert(response);
     }
   });
    return false;
  }
    /* login submit */
});
</script>