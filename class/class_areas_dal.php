<?php
    include("class_areas.php");
    include("class_db.php");

    class areas_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }


        function lista_areas(){
            $sql="select * from areas;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_rfc=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_rfc>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                    $obj_det= new areas(
                        $renglon["id_area"],
                        $renglon["area_des"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

  }//end class
?>