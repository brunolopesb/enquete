<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require __DIR__.'/vendor/autoload.php';
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1,  user-scalable=no">
<style>
.container{-moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
</style>
</head>
<body style="background-color:#f6f6f6;">

<!-- ENQUETE -->  
<div class="container" style="background-color:#fff; max-width: 400px; margin:100px auto; padding:30px;">
<div class="row">
<div class="col-sm-12">
   
<form>
<h4>Qual é o melhor time? </h4>
<span class="border-bottom" style="display:block; margin-top:20px; margin-bottom:40px;"></span>


<div class="form-group clearfix">

<div class="icheck-success d-inline" style="padding-bottom:8px;">
  <input class="icheck-primary d-inline" type="radio" name="opcao" id="radioSuccess1" value="1">
  <label class="form-check-label" for="radioSuccess1">
    <b>Flamengo</b>  

  </label>
</div>
<br><br>

<div class="icheck-success d-inline" style="padding-bottom:8px;">
  <input class="form-check-input" type="radio" name="opcao" id="radioSuccess2" value="2">
  <label class="form-check-label" for="radioSuccess2">
  <b>Barcelona</b>
  </label>
</div>
<br><br>

<div class="icheck-success d-inline" style="padding-bottom:8px;">
  <input class="form-check-input" type="radio" name="opcao" id="radioSuccess3" value="3">
  <label class="form-check-label" for="radioSuccess3"> 
    <b>Liverpool</b>  
  </label>
</div>

</div>

<br>
<div id="resultados"></div>
<br>

<button type="button" id="gravarEnquete" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Votar</button>
</form>
<br>

<div id="msg"></div>

</div>
</div><!-- ROW -->
</div><!-- CONTAINER -->

<script type="text/javascript">
$(function(){

    $("#gravarEnquete").click(function(){ 

        var um   = $('#radioSuccess1').prop("checked");
        var dois = $('#radioSuccess2').prop("checked");
        var tres = $('#radioSuccess3').prop("checked");

        var opcao = $("input[name='opcao']:checked").val();

    if(um == '' && dois == '' && tres == ''){
    	return(
    		Swal.fire(
           'Erro!',
           'Você deve selecionar uma opção para votar',
           'error'
                  )
);
  }  
            $.ajax({      
            //url: "classes/gravarEnquete.php?acao=clicar&opcao="+opcao,
            url: "classes/gravarEnq.php?acao=clicar&opcao="+opcao,
            dataType: "html",
            type: "POST",
            
            beforeSend: function () { 
            $('#gravarEnquete').attr('disabled', true); 
            $("#gravarEnquete").html('<div class="spinner-border" style="font-size:10px; height:20px; width:20px;" role="status"><span class="sr-only">Loading...</span></div>&nbsp;Votar');
            },
            
            success: function(result){
            $('#gravarEnquete').attr('disabled', false);
            $("#gravarEnquete").html('<i class="fas fa-arrow-alt-circle-up"></i>&nbsp;Votar');
            $('#msg').html(result);
            
            setTimeout(function(){
              $('#msg').fadeOut();
            },1500),
            $('#msg').fadeIn();
            
    		    $('#teste').html(result);
    	      },
          error: function(result){
            $('#resultados').html("ERRO");            
          }
        });
   });    
}); 
</script>

<script type="text/javascript">
$(document).ready(function() {
  $("#resultados").html("carregando...");
  $.ajax({
    	url: "classes/listarEnquete.php",
    	success: function(result){
    		$("#resultados").html(result);
    	}
    });
});

  $("#gravarEnquete").click(function(){ 
    setTimeout(function(){
      $.ajax({
    	url: "classes/listarEnquete.php",

    	success: function(result){
    		$("#resultados").html(result);
    	}
    });
  },1500);
});
</script> 




