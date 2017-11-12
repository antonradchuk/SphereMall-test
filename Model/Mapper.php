<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 00:51
 */

namespace Model;

use Library\DbConnection;

class Mapper
{
    public function save($object)
    {
        $pdo = DbConnection::getInstance()->getPdo();
        $sql = $sql = 'INSERT INTO feadback (first_name, second_name, email, message, image_path, image )
                VALUES (:first_name, :second_name, :email, :message, :image_path, :image )';
        $sth = $pdo->prepare($sql);

        $sth->execute([
            'first_name' => $object->getFirstName(),
            'second_name' => $object->getSecondName(),
            'email' => $object->getEmail(),
            'message' => $object->getMessage(),
            'image_path' => $object->getImagePath(),
            'image' => $object->getImage(),

        ]);

    }
}