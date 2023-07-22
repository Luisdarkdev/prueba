<?php

class Libros extends God
{


    public function getLibros()
    {
        $sql = "SELECT * FROM libros";
        $result = $this->_db->query($sql);
        return $result;
    }

    public function InsertLibro($nombre,$user_cod)
    {
        $sql = "INSERT INTO libros(libro_name,libro_user)VALUES('$nombre','$user_cod')";
        $result = $this->_db->query($sql);
        return $result;
    }
    public function updateLibro($id,$nombre)
    {
        $sql = "UPDATE libros SET libro_name='$nombre' WHERE libro_cod='$id'";
        $result = $this->_db->query($sql);
        return $result;
    }
    public function getLibroById($codi)
    {
        $sql = "SELECT * FROM libros WHERE libro_cod='$codi' LIMIT 1";
        $result = $this->_db->query($sql);
        return $result;
    }
    public function getLibroByName($nombre,$user)
    {
        $sql = "SELECT * FROM libros WHERE libro_name='$nombre' and libro_user='$user' LIMIT 1";
        $result = $this->_db->query($sql);
        return $result;
    }
    public function deleteLibro($codi)
    {
        $result = $this->_db->query("DELETE FROM libros WHERE libro_cod='$codi'");
        return $result;
    }



}