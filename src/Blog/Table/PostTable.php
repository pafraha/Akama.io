<?php
namespace App\Blog\Table;

class PostTable
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findPaginated(): array
    {
        $query = $this->pdo->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 10');
        return $query->fetchAll();
    }

    public function find(int  $id): \stdClass
    {
        $query = $this->pdo->prepare('SELECT * FROM posts WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch();
    }
}
