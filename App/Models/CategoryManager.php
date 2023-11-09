<?php

declare (strict_types=1);

namespace App\Models;

use PDO;

/**
 * CategoryManger handles CRUD operations of categories
 */
class CategoryManager extends \Core\DatabaseConnection
{

    public int $id;
    public string $name;

    /**
     * Get all categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, ArticleManager::class);
    }

    /**
     * Get a category by ID
     *
     * @param int $id
     * @return object|false
     */
    public function getById(int $id): object|false
    {
        $sql = "SELECT * FROM category WHERE id =:id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CategoryManager::class);
        return $stmt->fetch();
    }

    /**
     * Add a new category
     *
     * @param string $category
     * @return bool
     */
    public function add(string $category): bool
    {
        $sql = "INSERT INTO category (name) VALUES ( :name);";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Update a category
     *
     * @return bool
     */
    public function update(): bool
    {
        $sql = "UPDATE category SET name =:name
                WHERE id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Delete a category
     *
     * @return bool
     */
    public function delete(): bool
    {
        $sql = "DELETE FROM category WHERE id =:id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        return $stmt->rowCount() > 0;
    }
}