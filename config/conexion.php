<?php
    class Conectar{
        protected $dbh;

        /* Conexion con la base de datos */
        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_webservice","root","");
                return $conectar;
            } catch (Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        /* Manejo de caracteres */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }