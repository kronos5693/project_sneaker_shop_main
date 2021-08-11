<?php
class db
{

    protected $connection;

    public function __construct()
    {
        $this->connection = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
    
        if ($this->connection->connect_errno) {
            echo "Hubo un error de conexion" . $this->connection->connect_error;
            exit();
        }
        $this->connection;
    }

    public function query($query)
    {
        return $this->connection->query($query);
    }
    
    public function prepare($query)
    {
        return $this->connection->prepare($query);
    }


    public function close()
    {
        return $this->connection->close();
    }
}
?>