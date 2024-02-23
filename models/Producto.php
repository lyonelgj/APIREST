<?php
    class Producto extends Conectar{
        /**
        * Obtiene todos los productos de la base de datos.
        *
        * @return array Devuelve un array con todos los productos.
        */
        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            /* PDO::FETCH_ASSOC -> Para que no se duplique */
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        /**
        * Inserta un nuevo producto en la base de datos.
        *
        * @param string $produc_nom El nombre del producto a insertar.
        * @param int $cat_id El ID de la categoría del producto.
        *
        * @return bool Devuelve true si la inserción fue exitosa, false en caso contrario.
        */
        public function insert_producto($produc_nom, $cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO `tm_producto` (produc_id, produc_nom, cat_id) VALUES (NULL,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $produc_nom);
            $sql->bindValue(2, $cat_id);
            $sql->execute();
            /* PDO::FETCH_ASSOC -> Para que no se duplique */
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        
    }

?>