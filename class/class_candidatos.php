<?php
if (class_exists("candidatos")!=true){
    class candidatos{
        protected $rfc;
        protected $nombre;
        protected $apellido;
        protected $contrasena;
        protected $genero;
        protected $curriculum;
        protected $area_interes;
        protected $subscribcion;
        protected $fecha_registro;

        public function __construct(
            $rfc=NULL,
            $nombre=NULL,
            $apellido=NULL,
            $contrasena=NULL,
            $genero=NULL,
            $curriculum=NULL,
            $area_interes=NULL,
            $subscribcion=NULL,
            $fecha_registro =NULL)
            {
                $this->rfc=$rfc;
                $this->nombre=$nombre;
                $this->apellido=$apellido;
                $this->contrasena=$contrasena;
                $this->genero=$genero;
                $this->curriculum=$curriculum;
                $this->area_interes=$area_interes;
                $this->subscribcion=$subscribcion;
                $this->fecha_registro=$fecha_registro;
            }
        
        /**
         * Get the value of rfc
         */
        public function getRfc()
        {
                return $this->rfc;
        }

        /**
         * Set the value of rfc
         */
        public function setRfc($rfc)
        {
                $this->rfc = $rfc;

                return $this;
        }

        /**
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         */
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of contrasena
         */
        public function getContrasena()
        {
                return $this->contrasena;
        }

        /**
         * Set the value of contrasena
         */
        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

        /**
         * Get the value of genero
         */
        public function getGenero()
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         */
        public function setGenero($genero)
        {
                $this->genero = $genero;

                return $this;
        }

        /**
         * Get the value of curriculum
         */
        public function getCurriculum()
        {
                return $this->curriculum;
        }

        /**
         * Set the value of curriculum
         */
        public function setCurriculum($curriculum)
        {
                $this->curriculum = $curriculum;

                return $this;
        }

        /**
         * Get the value of area_interes
         */
        public function getAreaInteres()
        {
                return $this->area_interes;
        }

        /**
         * Set the value of area_interes
         */
        public function setAreaInteres($area_interes)
        {
                $this->area_interes = $area_interes;

                return $this;
        }

        /**
         * Get the value of subscribcion
         */
        public function getSubscribcion()
        {
                return $this->subscribcion;
        }

        /**
         * Set the value of subscribcion
         */
        public function setSubscribcion($subscribcion)
        {
                $this->subscribcion = $subscribcion;

                return $this;
        }

        /**
         * Get the value of fecha_registro
         */
        public function getFechaRegistro()
        {
                return $this->fecha_registro;
        }

        /**
         * Set the value of fecha_registro
         */
        public function setFechaRegistro($fecha_registro)
        {
                $this->fecha_registro = $fecha_registro;

                return $this;
        }

    }//class
}//if exists
?>