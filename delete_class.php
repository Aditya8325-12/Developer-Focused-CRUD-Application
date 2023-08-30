<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'create_table_class.php';

class delete_class extends create_table_class
{

    function delete_table_form()
    {
        $column_name = self::Column_name();
        $str2 = '<input type="hidden"  id="' . $column_name[0] . '"  >';
        return $str2;
    }

    function delete_value($query)
    {
        $this->connection->query($query);
        if ($this->connection->query($query)) {
            return "ok";
        } else {
            return $query;
        }
    }

}

?>