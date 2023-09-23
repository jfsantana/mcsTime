
<script language="javascript">
    $(function(){
           $('#tabla6').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
          
      });
    function filtrar(){
      var estatus=  $("#estatus_s").val();
        
        //alert(estatus);
        eval("document.location='emisolicitudes.php?filtro="+estatus+"'");	
        
    }

    function filtrarAprobaciones(){
      var estatus=  $("#estatus_s").val();
        
        //alert(estatus);
        eval("document.location='aprobaciones.php?filtro="+estatus+"'");	
        
    }
     function modificar_solicitud(n_control){  
         //alert(n_control);
            eval("document.location='../funciones/llamaSolicitud.php?ncontrol="+n_control+"'");	
        }
    function crear_solicitud(){ 
        
            eval("document.location='emisor.php'");	
        }
        function ver_planilla(n_control){  
         //alert(n_control);
       //     eval("document.location='../funciones/llamaSolicitud.php?ncontrol="+n_control+"'");	
        window.open("../funciones/llamaPlanilla.php?ncontrol="+n_control, "Planilla Solicitud" , "width=+screen.width,height=+screen.height,scrollbars=YES")	
    }

    function ver_planilla_Incidencia(incidencia_codigo){  
         //alert(n_control);
       //     eval("document.location='../funciones/llamaSolicitud.php?ncontrol="+n_control+"'");	
        window.open("../funciones/llamaPlanillaVerificador.php?ncontrol="+n_control, "Planilla Solicitud" , "width=+screen.width,height=+screen.height,scrollbars=YES")	
    }

    function aprobar_solicitud(n_control){  
         //alert(n_control);
            eval("document.location='../funciones/llamaAprobador.php?ncontrol="+n_control+"'");	
    }

    function verificar_solicitud(n_control){  
         //alert(n_control);
            eval("document.location='../funciones/llamaVerificador.php?ncontrol="+n_control+"'");	
    }

</script>    

<!-- **************** PARA IMPRIMIR  ***********************-->
<script type="text/javascript">
    function printDiv(nombreDiv) {
        var contenido= document.getElementById(nombreDiv).innerHTML;
        var contenidoOriginal= document.body.innerHTML;

        document.body.innerHTML = contenido;

        window.print();

        document.body.innerHTML = contenidoOriginal;
    }

</script>


<script type="text/javascript">
    function atras(){    
        setTimeout(window.close, 0);
    }
</script>