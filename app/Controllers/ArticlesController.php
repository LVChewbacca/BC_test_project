<?php

namespace Wiki_418\Controllers;

class ArticlesController extends AbstractController
{
    public function newsAction()
    {
        /** @var \Wiki_418\Models\Articles $articles */
        $articles = $this->container->get('model.articles');

        $listOfArticles = $articles->getArticles();

        $templateVariables = ['news' => $listOfArticles];
        $template = 'articles.view.php';

        return $this->render($template, $templateVariables);
    }

    public function singleNewsArticle($id)
    {
        /** @var \Wiki_418\Models\Articles $articles */
        $articles = $this->container->get('model.singleArticle');

        $listOfArticles = $articles->getSingleArticle($id);
        $listOfComments = $articles->getComments($id);

        $templateVariables = ['news' => $listOfArticles, 'comments' => $listOfComments];
        $template = 'single.article.view.php';

        return $this->render($template, $templateVariables);
    }


}
