<?php
    include("../class/class_candidatos_dal.php");
    $candidatos_ref=new candidatos_dal;

    $nom=strtoupper($_POST["f_nom"]);
    $ape=strtoupper($_POST["f_ape"]);
    $con=$_POST["f_pwd"];
    $rfc=strtoupper($_POST["f_rfc"]);
    $gen=$_POST["f_gen"];
    //$cur=$_POST["f_curri"];
    $are=$_POST["areade"];
    
    if (isset($_POST["f_suscri"])){
        $sus=$_POST["f_suscri"];
    }
    else{
        $sus="N";
    }
    
    /*
    echo $nom.'<br>';
    echo $ape.'<br>';
    echo $con.'<br>';
    echo $rfc.'<br>';
    echo $gen.'<br>';
    echo $cur.'<br>';
    echo $are.'<br>';
    echo $sus.'<br>';
    */
/*beign file 1*/    
// Check if file was uploaded without errors
if ($_FILES['f_curri']['name'] != null) {

    if(isset($_FILES["f_curri"]) && $_FILES["f_curri"]["error"] == 0){
        $valid_extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'); // valid extensions
        $path = '../uploads/'; // upload directory
        $img = $_FILES["f_curri"]["name"]; //stores the original filename from the client
        $tmp = $_FILES["f_curri"]["tmp_name"]; //stores the name of the designated temporary file
        $filesize = $_FILES["f_curri"]["size"];//get size in bytes of archivo,ja
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));// get uploaded file's extension
        //$final_image = rand(1000,1000000).$img;// can upload same image using rand function
        $final_file = $rfc.'.'.$ext;//nombre final de la imagen para subir
        $path = $path.$final_file;//coloca nombre de archivo
        //$maxsize = .5 * 1024 * 1024;
        $maxsize = 4 * 1024 * 1024;


    }
 else{
        echo "Error: No existe o esta dañado:" . $_FILES["f_curr"]["error"];//stores any error code resulting from the transfer
    }
  }
  else{
    $final_file=null;
  }
/*end imagen 1*/   



     $obj_candidato= new candidatos($rfc,$nom,$ape,$con,$gen,$final_file,$are,$sus,null);
     if ($candidatos_ref->insertar_candidato($obj_candidato)==1){

        if ($_FILES['f_curri']['name'] != null) {
            if(move_uploaded_file($tmp,$path)){
                echo 'Curriculum cargado';  
                
              }
              else{
                print "Error: Algo inesperado ocurrio al mover el archivo 1 a la trayectoria física, vuelva a intentar";
            }
          }



        echo "Candidato Registrado";
     }
     else{
        echo "No se logró ingresar al candidato";
     }
?>