<?php

class login extends God
{


    public function getUser($user,$password)
    {
        $sql = "SELECT * FROM user WHERE user_pass='$password' AND user_email='$user'";
        $result = $this->_db->query($sql);
        return $result;
    }
    public function updateUser($id,$acceso)
    {
        $sql = "UPDATE  user set user_acceso='$acceso' WHERE user_cod='$id'";
        $result = $this->_db->query($sql);
        return $result;
    }

}