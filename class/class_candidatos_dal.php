<?php
    include("class_candidatos.php");
    include("class_db.php");

    class candidatos_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_rfc($rfc){
            $rfc=$this->db_conn->real_escape_string($rfc);
            $sql="select * from candidatos where rfc='$rfc'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_rfc=mysqli_num_rows($result);
            $obj_det=null;
            if($total_rfc==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new candidatos(
                    $renglon["rfc"],
                    $renglon["nombre"],
                    $renglon["apellido"],
                    $renglon["contrasena"],
                    $renglon["genero"],
                    $renglon["curriculum"],
                    $renglon["area_interes"],
                    $renglon["subscribcion"],
                    $renglon["fecha_registro"]);
            }

            return $obj_det;
        }

        function lista_candidatos(){
            $sql="select * from candidatos;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_rfc=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_rfc>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                    $obj_det= new candidatos(
                        $renglon["rfc"],
                        $renglon["nombre"],
                        $renglon["apellido"],
                        $renglon["contrasena"],
                        $renglon["genero"],
                        $renglon["curriculum"],
                        $renglon["area_interes"],
                        $renglon["subscribcion"],
                        $renglon["fecha_registro"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_candidato($rfc){
            $rfc=$this->db_conn->real_escape_string($rfc);
            $sql = "select count(*) from candidatos";
            $sql.=" where rfc='$rfc'";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_candidato($obj){
            
            $fecha=date("Y-m-d H:i:s");
            $sql="insert into candidatos(";
            $sql.="rfc,";
            $sql.="nombre,";
            $sql.="apellido,";
            $sql.="contrasena,";
            $sql.="genero,";
            $sql.="curriculum,";
            $sql.="area_interes,";                                                
            $sql.="subscribcion,";                                                
            $sql.="fecha_registro)";            
            $sql.=" values (";
            $sql.="'".$obj->getRfc()."',";    
            $sql.="'".$obj->getNombre()."',";
            $sql.="'".$obj->getApellido()."',";
            $sql.="'".$obj->getContrasena()."',";
            $sql.="'".$obj->getGenero()."',";
            $sql.="'".$obj->getCurriculum()."',";
            $sql.="'".$obj->getAreaInteres()."',";
            $sql.="'".$obj->getSubscribcion()."',";                                            
            $sql.="'".$fecha."'";
            $sql.=")";

            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }
            unset($obj);
            return $insertado;
        }//end function        

        function borra_candidato($rfc){
            $rfc=$this->db_conn->real_escape_string($rfc);
            $sql="delete from candidatos where rfc='$rfc'";
            //echo $sql;return;
            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
                if(mysqli_affected_rows($this->db_conn)==1){
                    $borrado=1;
                }
                else{
                    $borrado=0;
                }

                unset($obj);
                return $borrado;
        }

        function actualiza_candidato($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update candidatos set ";
                    $sql .= "nombre="."'".$obj->getNombre()."',";
                    $sql .= "apellido="."'".$obj->getApellido()."',";
                    $sql .= "contrasena="."'".$obj->getContrasena()."',";
                    $sql .= "genero="."'".$obj->getGenero()."',";
                    $sql .= "curriculum="."'".$obj->getCurriculum()."',";
                    $sql .= "area_interes="."'".$obj->getAreaInteres()."',";
                    $sql .= "subscribcion="."'".$obj->getSubscribcion()."'";
                    $sql .= " where RFC = '".$obj->getRfc()."'";
            
             
            
                    //echo $sql;//exit;
                    
                    $this->set_sql($sql);
                    $this->db_conn->set_charset("utf8");
                    
                    mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            
             
            
                    if(mysqli_affected_rows($this->db_conn)==1) {
                        $actualizado=1;
                    }else{
                        $actualizado=0;
                    }
                    unset($obj);
                    return $actualizado;
                }
    }//end class
?>