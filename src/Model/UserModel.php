<?php

namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\User;

class UserModel extends AbstractModel
{

    public function AddUser(User $user)
    {
        $sql = 'INSERT INTO user (nickname, email, password, createdAt)
        VALUES (?, ?, ?, NOW())';

        $values = [
            $user->getNickname(),
            $user->getEmail(),
            $user->getPassword()
        ];

        return $this->db->insert($sql, $values);
    }

    public function getUserByEmail(string $email)
    {
        $sql = 'SELECT * 
            FROM user
            WHERE email = ?';

        $result = $this->db->getOneResult($sql, [$email]);

        if (!$result) {
            return null;
        }

        return new User($result);
    }
}
