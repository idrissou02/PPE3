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
    #[Route('/artistes', name: 'artistes', methods: 'GET')]
    public function ListeArtistes(ArtisteRepository $repo)
    {
        $artistes=$repo->listeArtistesComplete();
        return $this->render('artiste/listeArtistes.html.twig', [
        'lesArtistes' => $artistes
        ]);
    }

    #[Route("/artiste/{id}", name: 'ficheArtiste', methods: 'GET')]
    public function FicheArtiste(Artiste $artiste)
    {
        return $this->render('artiste/ficheArtiste.html.twig', [
        'LeArtiste' => $artiste
        ]);
    }
}


    
