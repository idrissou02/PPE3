<?php

namespace App\Controller;
use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
    #[Route('/admin/artistes', name: 'admin_artistes', methods:"GET")]
    public function listeArtistes(ArtisteRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $artistes=$paginator->paginate(
        $repo->listeArtistesCompletePaginee(),
        $request->query->getInt('page', 1), /*page number*/
        9 /*limit per page*/
        );
        return $this->render('artiste/listeArtistes.html.twig', [
            'lesArtistes' => $artistes,
        ]);
    }

    #[Route('/artistes/{id}', name: 'ficheArtiste', methods:"GET")]
    public function ficheArtiste(Artiste $artiste): Response
    {
        return $this->render('artiste/ficheArtiste.html.twig', [
            'leArtiste' => $artiste,
        ]);
    }
}


    
