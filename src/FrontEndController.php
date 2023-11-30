<?php

namespace App;

use App\Model;
use App\Models\ArticleModel;

class FrontEndController
{
    public $model;
    public $view;

public function __construct()
{
    $this->model = new ArticleModel();
    $this->model->setTable('Articles  ');
    $this->view = new View();
}



    public function articleList()
    {
        $articles = $this->model->getArticles();

        $this->view->showArticleList($articles);
    }

    public function singleArticle($id)
    {
        $article = $this->model->getArticleById((int)$id);
        $this->view->showSingleArticle($article);
    }
}