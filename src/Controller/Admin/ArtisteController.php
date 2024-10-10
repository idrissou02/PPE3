<?php

namespace App\Controller\Admin;

use App\Repository\ArtisteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
    #[Route('/admin/artistes', name: 'admin_artistes', methods:"GET")]
    public function listeArtistes(ArtisteRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $artistes=$paginator->paginate(
        $repo->listeArtistesComplete(),
        $request->query->getInt('page', 1), /*page number*/
        9 /*limit per page*/
        );
        return $this->render('admin/artiste/listeArtistes.html.twig', [
            'lesArtistes' => $artistes,
        ]);
    }

    #[Route('/admin/artistes/ajout', name: 'admin_artistes_ajout', methods:["GET","POST"])]
    public function ajoutArtiste(): Response
    {
        return $this->render('admin/artiste/listeArtistes.html.twig', [
            'lesArtistes' => $artistes,
        ]);
    }






}
