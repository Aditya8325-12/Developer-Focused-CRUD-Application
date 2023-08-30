<?php


class dbconnecation_class
{

    protected $table_name;
    protected $connection;
    protected $database_name;


    // connect to the database 
    function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "");
        if ($this->connection->errno) {
            die("database not connected " . $this->connection->error);
        }
    }

    //  set the database name 
    function set_data_base($dbname)
    {
        $this->database_name = $dbname;
        $selectQuery = "USE " . mysqli_real_escape_string($this->connection, $dbname);
        if (mysqli_query($this->connection, $selectQuery)) {
        }
    }



    //  set the table name 
    function set_the_table_name($name)
    {
        $this->table_name = $name;
    }


    //  get the table name
    function get_the_table_name()
    {
        return $this->table_name;
    }


    // send the query to the database
    function send_query($query)
    {
        if ($this->connection->query($query)) {
            return true;
        }

    }
    
    // geting the result of the query   
    function get_the_query_result($query)
    {
        $result = null;
        $data = null;
        $result = $this->connection->query($query);
        while ($value = mysqli_fetch_assoc($result)) {
            $data[] = $value;
        }
        return $data;
    }


}

?>