<?php
declare(strict_types = 1);
function dd($some)
{
    echo '<pre>';
    print_r($some);
    echo '</pre>';
}
function getArticles(): array
{
    return json_decode(file_get_contents('articles.json'),  true);
}
function getArticleList(): string
{
    $articles = getArticles();
    $link = '';
    foreach ($articles as $article) {
        $link .=  '<li class="nav-item"><a class="nav-link" href="index.php?id=' . $article['id'] . '">' . $article['title'] . '</a></li>';
    }

    return $link;
}
function getArticleById(int $id): array
{
    $articleList = getArticles();
    $currentArticle = [];
    if (array_key_exists($id, $articleList))
    {
        $currentArticle = $articleList[$id];
    }
    return $currentArticle;
}
function showArticle(): string
{
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $currentArticle = getArticleById($id);
        if (!empty($currentArticle)) {
            $str = '';
            $str .= '<h2>' . $currentArticle['title'] . '</h2>';
            $str .= '<img src="' . $currentArticle['image'] . '" alt="">';
            $str .= '<p>'.$currentArticle['content'].'</p>';
        }
        else{
            $str = 'net';
        }
    }else{
        $str = 'che';
    }
    return $str;
}
function login()
{
    if (!isset($_POST['btnLogin'])) {
        //echo showForm();
        include 'template/backend/partials/login.php';
    } else {
        if (checkLogin($_POST['username'], $_POST['password'])) {
            $_SESSION['user'] = 'admin';
            //echo 'Вы залогинелись';
            goUrl('admin.php');
        }else{
            goUrl('admin.php');
        };

    }
}

function checkLogin(string $login, string $password): bool
{
    if ($login == '123' and $password == '123') {
        return true;
    } else {
        return false;
    }
}



