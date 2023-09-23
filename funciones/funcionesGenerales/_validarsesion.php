    
<?php
    
    if ( !isset( $_SESSION ) ) {
        session_start();  
     
    }
    
    
    if ( !isset( $_SESSION["usuario"] ))  {  
        echo "<script> eval('document.location=\"../../index.php\"');</script>";
        exit;
    
        
    }
    else{
        if ($_SESSION["usuario"]==""){
            echo "<script> eval('document.location=\"../../index.php\"');</script>";
            exit;    
        }   
    }
    

?>