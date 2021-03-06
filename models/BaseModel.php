<?php

class BaseModel {

    protected $table;
    protected $pk;

    public static function __callStatic ($method, $arg) {
        $obj = new static;
        $result = call_user_func_array (array ($obj, $method), $arg);
        if (method_exists ($obj, $method))
            return $result;
        return $obj;
    }

    private function getAll() {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '`';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();  
    }

    private function getById( int $id ) {
        global $db;

        $sql = 'SELECT * FROM `auction`
        INNER JOIN `media` ON `auction` . `id` = `media` . `auction_id`
        WHERE `auction_id` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        return $pdo_statement->fetchObject();
    }

    private function deleteById( int $id ) {
        global $db;

        $sql = 'DELETE FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute( [ ':p_id' => $id ] );
    }

    public function delete () {
        $this->deleteById( $this->{$pk} );
    }
}