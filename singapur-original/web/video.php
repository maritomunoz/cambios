<? 
require("inc/incluidos.php");
require ("hd.php");

$idRecurso = $_REQUEST["idRecurso"];
$video = getRecurso($idRecurso);
?>

<body>


<div id="principal">
<? require("topMenu.php"); ?>
	
    <div id="lateralIzq">
    <? 
		require("menuleft.php");
	?>
    </div> <!--lateralIzq-->
    
    
    
    <div id="lateralDer">
		<? 		
		require("menuright.php");
	?>
    
    </div><!--lateralDer-->
    
    
    
	<div id="columnaCentro">
    	<p class="titulo_curso">Video - <? echo $video["nombreRecurso"] ?></p>
        <hr /><br>

        
       <!-- <video width="320" height="240" controls>
          <source src="videos/Actividad_Virtual_1ro.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>-->
		<div id='my-video'></div>
		<script type='text/javascript'>
            jwplayer('my-video').setup({
                file: '<? echo $video["urlRecurso"] ?>',
                width: '320',
                height: '240'
            });
        </script>
        <br><br>
		<?  boton("Volver","history.go(-1)"); ?>
			
    </div> <!--columnaCentro-->

	<? 
    	
		require("pie.php");
		
    ?> 
 
</div><!--principal--> 
</body>
</html>
