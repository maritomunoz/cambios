<?
$idCursoCap = $_SESSION["sesionIdCurso"];
$nombreCurso = getNombreCortoCurso($idCursoCap);


?>
            <div class="titulo_div">Informaci�n de Sesi�n</div>
            <div class="info_div">
            <p align="center">Usted est� navegando en: </p>
            <p align="center"><b><? echo $nombreCurso; ?></b></p>
			<p align="center">
            <? if(!esClProfesor($idUsuario)){ ?>
                <a href="fichaDocente.php">
                	<img  border="0" src="<? echo "subir/fotos_perfil/th_".$_SESSION["sesionImagenUsuario"];?>" onerror="this.src='img/nophotoMini.jpg'"/>
                    
               		<br />
					<? echo $_SESSION["sesionNombreUsuario"]; ?>
				</a>
                <? } else {?>
                <a href="fichaDocenteCl.php">
                	<img  border="0" src="<? echo "subir/fotos_perfil/th_".$_SESSION["sesionImagenUsuario"];?>" onerror="this.src='img/nophotoMini.jpg'" />
                    
               		<br />
					<? echo $_SESSION["sesionNombreUsuario"]; ?>
				</a>
                <? } ?>
              </p>  
            </div>   
            <div class="info_div"><p align="center">
            	<img src="img/mail.png" width="16" height="16" /><a href="bandeja.php?mostrar=recibidos"> <? echo getMensajesSinLeerUsuario($_SESSION["sesionIdUsuario"]);?> Mensajes </a><br/>
				<img src="img/postit.jpg" width="16" height="16" /><a href="notificacionResumen.php"> <? echo getNotificacionesSinLeer($_SESSION["sesionIdUsuario"]);?> Notificaciones </a>
            </div> 
            <div class="info_div"></div> 
            <div class="info_div"><p align="center"><a href="sesion/cierraSesion.php">Cerrar Sesi�n</a></p></div>      
    
        
        