<?php
declare (strict_types=1);

namespace App\Models;

use Core\DatabaseConnection;
use PDO;

/**
 * UserManager handles the adding and update of the user as well as login
 */
class UserManager extends DatabaseConnection
{

    /**
     * Get all users
     *
     * @return array
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM user";

        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, UserManager::class);
    }

    /**
     * Add a new user
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function addMember(string $name, string $email, string $password): bool
    {
        $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Update user role
     *
     * @param int $id
     * @param string $role
     * @return bool
     */
    public function updateRole(int $id, string $role): bool
    {
        $sql = "UPDATE user SET role =:role
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * User login
     *
     * @param string $email
     * @param string $password
     * @return object|false
     */
    public function login(string $email, string $password): object|bool
    {
        $sql = "SELECT * FROM user WHERE email =:email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, UserManager::class);
        $user = $stmt->fetch();

        if (!$user) {
            return false;
        }

        $hashed_password = $user->password;
        $authenticated = password_verify($password, $hashed_password);

        return ($authenticated ? $user : false);
    }
}
