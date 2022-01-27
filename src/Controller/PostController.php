<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_index_user", methods={"GET"})
     */
    public function index(PostRepository $postRepository, CommentRepository $commentRepository): Response
    {
        return $this->render('user/post/index.html.twig', [
            'posts' => $postRepository->findAll(),
            'comments' => $commentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="comment_show_user", methods={"GET"})
     */
    public function show(Comment $comment): Response
    {
        return $this->render('user/comment/show.html.twig', [
            'comment' => $comment,
        ]);
    }
}
