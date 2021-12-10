<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MtsController extends AbstractController
{
    
    /**
     * @Route("/mts", methods={"GET","HEAD"})
     */
    public function index(): Response
    {
        return $this->render('PlumbInstall/index.html.twig', [
            'controller_name' => 'PlumbController',
        ]);
    }

    /**
     * @Route("/mts/recent", methods={"GET","HEAD"})
     */
    public function recent(): Response
    {
        // как-то получить наиболее свежие статьи (например, сделать запрос к базе данных)
        $articles = ['статья номер 1', 'статья номер 2', 'статья номер 3'];

        return $this->render('mts/_recent_articles.html.twig', [
            'articles' => $articles
        ]);
    }


    /**
         * @Route("/mts/{page}", name="mts_list", requirements={"page"="\d+"})
         */
        public function list(int $page = 1): Response
        {
            //$page = 2; 
            $name_post = $page;
            $posts = ['post  номер 11', 'post  номер 12', 'post номер 13'];
            return $this->render('mts/_posts.html.twig', [
                'posts' => $posts,
                'name_post' => $name_post
            ]);
        }

    /**
     * @Route("/mts/{slug}", name="mts_show", requirements={"slug"="\D+"})
     */
    public function show(string $slug): Response
    {
       // $slug = 'my';
        $name_post = $slug; 
        $posts = ['show номер 1', 'show номер 2', 'show номер 3'];

        return $this->render('mts/_posts.html.twig', [
            'posts' => $posts,
            'name_post' => $name_post
        ]);
    }

    
}
