<?php

class ArticulosModel {

    private function getDB() {
        $db = new PDO('mysql:host=localhost;'.'dbname=FOIndumentaria;charset=utf8', 'root', '');
        return $db;
    }
    
    function getArticulos() {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos");
        $query->execute();
        $articulos = $query->fetchAll(PDO::FETCH_OBJ);
        return $articulos;
    }
    
    function getArticulosPorCat($id_categoria) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos WHERE id_categoria = ?");
        $query->execute([$id_categoria]);
        $articulos = $query->fetchAll(PDO::FETCH_OBJ);
        return $articulos;
    }

    function getArticulo($id) {
        $db = $this->getDB();
        $query = $db->prepare("SELECT * FROM articulos WHERE id = ?");
        $query->execute([$id]);
        $articulo = $query->fetch(PDO::FETCH_OBJ);
        return $articulo;
    }

    function insertArticulo($nombre, $precio, $id_categoria) {
        $db = $this->getDB();
        $query = $db->prepare("INSERT INTO articulos (nombre, precio, id_categoria) VALUES (?, ?, ?)");
        $query->execute([$nombre, $precio, $id_categoria]);
        return $db->lastInsertId();
    }
    
    function deleteArticulo($id) {
        $db = $this->getDB();
        $query = $db->prepare("DELETE FROM articulos WHERE id = ?");
        $query->execute([$id]);
    }

    function updateArticulo($nombre,$precio,$categoria,$id) {
        $db = $this->getDB();
        $query = $db->prepare("UPDATE articulos SET nombre=?, precio=?, id_categoria=? WHERE id=?");
        $query->execute([$nombre,$precio,$categoria,$id]);
    }

}





?>