<?php
if (class_exists("areas")!=true){
    class areas{
        protected $id_area;
        protected $area_des;

        public function __construct(
            $id_area=NULL,
            $area_des=NULL
            )
            {
                $this->id_area=$id_area;
                $this->area_des=$area_des;
            }
        
        /**
         * Get the value of rfc
         */
        public function getID_area()
        {
                return $this->id_area;
        }

        /**
         * Get the value of nombre
         */
        public function getArea_des()
        {
                return $this->area_des;
        }


    }//class
}//if exists
?>