<?

require("inc/incluidos.php");

/* Registra Acceso a mis mensajes */
$idUsuario = $_SESSION["sesionIdUsuario"];
registraAcceso($idUsuario, 3, 'NULL');

$idPerfil = getIdPerfilUsuario($idUsuario);




?>

<h3>
	Mensajes Recibidos 
	<?
	$num = getMensajesSinLeerUsuario($idUsuario);
	if ($num > 0){
		echo "(".$num.")";
	}
	?>
</h3>
<table width="100%" border="0" cellspacing="2" class="tablesorter">
	
	<tr class="ui-state-active" >
		<th>&nbsp;</th>
		<th>&nbsp;De</th>
		<?
		// Si el usuario tiene perfil de coordinador grl (idPefil=9) 
	   if($idPerfil == 9){ 
	   ?>
	   <th>&nbsp;Para</th>
	   <?
	   }
	   ?>
		<th>&nbsp;Asunto</th>
		<th>&nbsp;Fecha</th>
	</tr>
	
	
	<?
	// Si el usuario tiene perfil de coordinador (idPefil=3), 
	// puede acceder a los mensajes hechos a los tutores adem�s de los propios
	
		$res = getMensajesUsuario($idUsuario); 
	
	
	
	
	if (mysql_num_rows($res) > 0 ){
		while($row = mysql_fetch_array($res)){
			switch(getTipoUsuario($row["deMensaje"])){
				case "Empleado Klein":
				$datosDeUsuario = getNombreFotoUsuarioEmpleadoKlein($row["deMensaje"]);
				
				$texto_de = $datosDeUsuario["nombre"]." ".$datosDeUsuario["apellidoPaterno"];
				break;
				case "Profesor":
				$datosDeUsuario = getNombreFotoUsuarioProfesor($row["deMensaje"]);
				$datosDeUsuario = getDatosProfesor2($row["deMensaje"]);
				$texto_de = $datosDeUsuario["nombreParaMostrar"];
				break;
				
				}
			switch(getTipoUsuario($row["paraMensaje"])){
				case "Empleado Klein":
				$datosParaUsuario = getNombreFotoUsuarioEmpleadoKlein($row["paraMensaje"]);
				$texto_para = $datosDeUsuario["nombre"]." ".$datosDeUsuario["apellidoPaterno"];
				break;
				case "Profesor":
				$datosParaUsuario = getDatosProfesor2($row["paraMensaje"]);
				$texto_para = $datosDeUsuario["nombreParaMostrar"];
				break;
				
				}
			
			
				
			
			if ($row["estadoMensaje"] == 0){
				$estilo = 'style="font-weight: bold;"';
			}
			else{
				$estilo = "";	
			}
	
	?>
	<tr <? echo $estilo;?>>
		<td align="center">
			<img src="<? echo "subir/fotos_perfil/th_".$datosDeUsuario["imagenUsuario"];?>" />
		</td>
		<td>
			<?
			echo $texto_de;
			?> 
		</td>
		<?
		if($idPerfil == 9){
		?>
		<td>
			<?
			
			echo $texto_para; 
			?> 
		</td>
		<?
		}
		?>
		<td>
			<a href="mensaje.php?idMensaje=<? echo $row["idMensaje"];?>">
			<? if($row["asuntoMensaje"]!= ''){
            	echo $row["asuntoMensaje"];
			}else {
				echo "menasje sin asunto";
			}?>
            </a>
		</td>
		<td>
			<? cambiaf_a_normal($row["fechaMensaje"]); ?>
		</td>
	</tr>
	
<? 
		}// while
	
	}
	else{ //mysql_num_rows < 0
?>
		
	<tr class="style6">
		<td colspan="5">Usted no tiene mensajes en su bandeja.</td>
	</tr>			
<?
	}
	 
	 ?>
	 
</table>