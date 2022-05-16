<?php

class Horse extends BaseModel {
    function createHorse($horse) {
        global $db;

        $sql = "INSERT INTO `auction` (`name`, `age`, `mother`, `father`, `color`, `discipline`, `gender`, `description`, `pedigree`, `height`, `owner`)
                VALUES (:name, :age, :mother, :father, :color, :discipline, :gender, :description, :pedigree, :height, :owner)";

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':name' => $this->name,
                ':age' => $this->age,
                ':mother' => $this->mother,
                ':father' => $this->father,
                ':color' => $this->color,
                ':discipline' => $this->discipline,
                ':gender' => $this->gender,
                ':description' => $this->description,
                ':pedigree' => $this->pedigree,
                ':height' => $this->height,
                ':owner' => $this->owner,
            ]
        );

        return $db->lastInsertId();
    }

    function updateHorse(int $id) {
        global $db;
        var_dump($id);
    
        $sql = "UPDATE auction 
                SET name = :name, 
                age = :age,
                mother = :mother,
                father = :father,
                color = :color,
                discipline = :discipline,
                gender = :gender,
                description = :description,
                pedigree = :pedigree,
                height = :height,
                owner = :owner,
                WHERE id = :id";
    
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute( 
            [
                ':name' => $this->name,
                ':age' => $this->age,
                ':mother' => $this->mother,
                ':father' => $this->father,
                ':color' => $this->color,
                ':discipline' => $this->discipline,
                ':gender' => $this->gender,
                ':description' => $this->description,
                ':pedigree' => $this->pedigree,
                ':height' => $this->height,
                ':owner' => $this->owner,
                ':id' => $id,
            ]
         );
    }

    public static function deleteHorse(int $id){
        print_r($id);
        global $db;

        $sql = "DELETE FROM auction WHERE id = '$id'";
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute( [ '$id' => $id ] );
    }
}