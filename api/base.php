<?php
session_start();
date_default_timezone_set("Asia/Taipei");
class DB
{
    protected $table;
    protected $dns = "mysql:host=localhost;charset=utf8;dbname=db0301";
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dns, 'root', '');
    }

    public function all(...$arg)
    {
        $sql = "select * from `$this->table` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->arr2arr($arg[0]);
                $sql .= " where " . join("&&", $tmp);
            } else {
                $sql .= $arg[0];
            }
            if (isset($arg[1])) {
                $sql .= $arg[1];
            }
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "select * from $this->table";
        if (is_array($id)) {
            $tmp = $this->arr2arr($id);
            $sql .= " where " . join("&&", $tmp);
        } else {
            $sql .= " where `id`=" . $id;
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($id)
    {
        $sql = "delete from $this->table";
        if (is_array($id)) {
            $tmp = $this->arr2arr($id);
            $sql .= " where " . join("&&", $tmp);
        } else {
            $sql .= " where `id`=" . $id;
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    public function save($arr)
    {
        if (isset($arr['id'])) {
            $id = $arr['id'];
            unset($arr['id']);
            $tmp = $this->arr2arr($arr);
            $sql = "UPDATE `$this->table` SET " . join(",", $tmp) . " where `id`=" . $id;
        } else {
            $keys=array_keys($arr);
            $sql="INSERT INTO `$this->table`(`".join("`,`",$keys)."`) VALUES ('".join("','",$arr)."')";
        }
        return $this->pdo->exec($sql);
    }

    private function arr2arr($arr)
    {
        foreach ($arr as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    public function count(...$arg){
        return $this->math('count',...$arg);
    }
    public function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }
    public function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }
    public function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }
    public function avg($col,...$arg){
        return $this->math('avg',$col,...$arg);
    }

    private function math($math,...$arg){
        switch ($math) {
            case 'count':
                $sql="select count(*) from $this->table";
                if(isset($arg[0])){
                    $con=$arg[0];
                }
                break;
            
            default:
            $sql="select $math(`$arg[0]`) from `$this->table`";
            if(isset($arg[1])){
                $con=$arg[1];
            }
                break;
        }
        if(isset($con)){
            if(is_array($con)){
                $tmp=$this->arr2arr($con);
                $sql.=" where ".join("&&",$tmp);
            }else{
                $sql.=$con;
            }
        }
        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}
function dd($arr){
echo"<pre>";
print_r($arr);
echo"</pre>";
}

function to($url){
header("location:$url");
}

function q($sql){
    $dns = "mysql:host=localhost;charset=utf8;dbname=db0301";
    $pdo=new PDO($dns,'root','');
    $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
$Trailer=new Db('trailer');
$Movie=new Db('movie');
