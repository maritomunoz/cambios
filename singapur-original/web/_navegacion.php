<div id="navegacion">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #ccc; margin-bottom:10px;">
  <tr>
	<td style="padding-left:5px; "> 
		<? 
        $links_navegacion = explode(",",$navegacion);
        for($i = 0;$i < count($links_navegacion);$i++){
            $valores_navegacion = explode("*",$links_navegacion[$i]);
            ?><a href="<? echo $valores_navegacion[1]; ?>"><? echo $valores_navegacion[0]; ?></a> >> <?
        }
        ?>
	</td>
	<td width="300" align="right" style="font-size:11px; font-weight:bold; padding-right:5px; padding-top:2px;"><?
	echo $_SESSION["sesionNombreUsuario"]; ?> <a href="sesion/cierraSesion.php" >(X) Salir</a>
&nbsp;</td>
  </tr>
</table>  
</div>