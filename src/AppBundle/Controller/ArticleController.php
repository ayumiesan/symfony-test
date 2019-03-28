<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use AppBundle\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ArticleController extends Controller
{
    /**
     * @Route("/", name="article_list")
     * @Method("GET")
     * @return Response
     */
    public function listAction(): Response
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('article/list.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/add", name="article_add")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ArticleRepository $repository */
            $repository = $this->getDoctrine()->getRepository(Article::class);
            $repository->save($article);

            return $this->redirectToRoute('article_list');
        }

        return $this->render('article/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
