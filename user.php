<?php
require_once "Dbcon.php";
class user extends Dbcon
{
    public $conn;
    public $name;
    public $email;
    public $contact;
    public $password;
    public $is_admin;
    public function __construct()
    {
        $dbcon=new Dbcon();
        $this->conn=$dbcon->createConnection();
    }
    public function userSignup($name, $email, $contact, $password)
    {
        $sql = "INSERT INTO `user`(`name`, `email`, `contact`, `password`, `is_admin`)
VALUES ('$name','$email','$contact','$password',0)";
        if ($this->conn->query($sql)) {
            return 1;
        }
        return 0;
    }
    public function login($email, $password)
    {
        $sql="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr =array();
            while ($row=$data->fetch_assoc()) {
                $arr = $row;
            }
            return $arr;
        }
        return 0;
    }
}
?>