<?php
    class Categoria extends Conectar{
    /**
    * Obtiene todas las categorías activas de la base de datos.
    *
    * @return array Devuelve un array con todas las categorías activas.
    */
    public function get_categoria(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_categoria WHERE est=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una categoría específica por su ID.
     *
     * @param int $cat_id El ID de la categoría a buscar.
     * @return array Devuelve un array con la categoría encontrada.
     */
    public function get_categoria_x_id($cat_id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_categoria WHERE est=1 AND cat_id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta una nueva categoría en la base de datos.
     *
     * @param string $cat_nom El nombre de la categoría a insertar.
     * @param string $cat_obs La observación de la categoría a insertar.
     * @return bool Devuelve true si la inserción fue exitosa, false en caso contrario.
     */
    public function insert_categoria($cat_nom, $cat_obs){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO tm_categoria(cat_id,cat_nom,cat_obs,est) VALUES (NULL,?,?,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
     /**
     * Actualiza una categoría existente en la base de datos.
     *
     * @param int $cat_id El ID de la categoría a actualizar.
     * @param string $cat_nom El nuevo nombre de la categoría.
     * @param string $cat_obs La nueva observación de la categoría.
     * @return bool Devuelve true si la actualización fue exitosa, false en caso contrario.
     */
    public function update_categoria($cat_id, $cat_nom, $cat_obs){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_categoria set cat_nom = ?, cat_obs = ? WHERE cat_id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Elimina una categoría de la base de datos (cambia su estado a inactivo).
     *
     * @param int $cat_id El ID de la categoría a eliminar.
     * @return bool Devuelve true si la eliminación fue exitosa, false en caso contrario.
     */
    public function delete_categoria($cat_id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_categoria set est = '0' WHERE cat_id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>