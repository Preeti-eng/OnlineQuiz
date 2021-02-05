<?php
require_once "../Dbcon.php";
class category extends Dbcon
{
    public $conn;
    public $cat_name;
    public function __construct()
    {
        $dbcon=new Dbcon();
        $this->conn=$dbcon->createConnection();
    }
    public function addCategory($cat_name)
    {
        $sql = "INSERT INTO `category`(`cat_name`) VALUES ('$cat_name')";
        if ($this->conn->query($sql)) {
            return 1;
        }
        return 0;
    }
    public function getCat() 
    {
        $sql="SELECT * FROM `category`";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                $arr[]=$row;
            }
            return $arr;
        }
        return 0;
    }
    public function addQuestion($frm,$question,$oA,$oB,$oC,$oD,$answer)
    {
        $sql = "INSERT INTO `quest_ans`(`category`, `ques`, `oA`, `oB`, `oC`, `oD`, `correctAns`)
VALUES ('$frm','$question','$oA','$oB','$oC','$oD','$answer')";
        if ($this->conn->query($sql)) {
            return 1;
        }
        return 0;
    }
    public function showQuestion($frm)
    {
        $sql = "SELECT * FROM `quest_ans`  WHERE `category` = '$frm'";
        $data=$this->conn->query($sql);
        if ($data->num_rows>0) {
            $arr=array();
            while ($row=$data->fetch_assoc()) {
                $arr[]=$row;
            }
            return json_encode($arr);
        }
        return 0;
    }
}
?>