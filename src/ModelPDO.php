<?php


namespace App;


use PDO;

class ModelPDO
{
    private $pdo;

    public function __construct()
    {
        $host = "localhost";
        $user = "admin";
        $pass = "admin";
        $db = "1135";
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }
    public function getAll()
    {
         $data = $this->pdo->query('SELECT * FROM Articles')->fetchAll();
         var_dump($data);
    }

    public function getArticles(): array
    {
        return $this->database->getArticles();
    }

    public function getArticlesById(int $id): array
    {
        $articleList = $this->getArticles();
        $curentArticle = [];
        foreach ($articleList as $ar)
        {
            if (array_key_exists($id, $articleList))
            {
                $curentArticle = $articleList[$id];
            }
            return $curentArticle;
        }
    }

    public function saveArticles($articles)
    {
        $fp = fopen('articles.json', 'w');
        fwrite($fp, json_encode($articles));
        fclose($fp);
    }
}