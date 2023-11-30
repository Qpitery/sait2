<?php


namespace App;


class Model
{

    public function getArticles(): array
    {
        return json_decode(file_get_contents(filename: 'db/articles.json'), associative: true);
    }


    public function getArticleById(int $id): array
    {
        $articleList = $this->getArticles();
        $curentArticle = [];
        if (array_key_exists($id, $articleList)) {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }

}