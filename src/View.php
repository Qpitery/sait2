<?php


namespace App;


class View
{
    public $loader;
    public $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('template/frontend/');
        $this->twig = new \Twig\Environment($this->loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);
    }

public function showArticleList($articles)
{
    echo $this->twig->render('article-list.twig', ['articles' => $articles, 'title'=>'Новости']);
}
public function showSingleArticle($article)
{
    echo $this->twig->render('single-article.twig', ['article' => $article, 'title'=>'Одна новость']);
}
}