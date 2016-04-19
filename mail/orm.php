<?php 

require_once "config.php"; 
class Orm
{
    protected $conexion;
    protected $db;
    
    public function orm()
    {
        $this->conexion = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        if ($this->conexion == 0) die("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db(DB_NAME, $this->conexion);
        if ($this->db == 0) die("Lo sentimos, no se ha podido conectar con la base datos: " . DB_NAME);
 
        return true;
    }

    public function executeSql($sql){
        $query = mysql_query($sql,$this->conexion);
        if(!$query){ 
          echo 'MySQL Error: ' . mysql_error();
          exit;
        }
        return $query;
    }
    
    public function last_id() {
        return mysql_insert_id();
    }

    public function fetch_array($result){
        return mysql_fetch_array($result);
    }

    public function num_rows($result){
        return mysql_num_rows($result);
    }

    public function result_free($result){
        mysql_free_result($result);
    }
    public function close()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }
    }

}

?>