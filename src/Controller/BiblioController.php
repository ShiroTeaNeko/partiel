<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BiblioController extends AbstractController
{
    /**
     * @Route("/biblio", name="biblio")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Artist::class);

        $artists = $repo->findAll();
        return $this->render('biblio/index.html.twig', [
            'controller_name' => 'BiblioController',
            'artists' => $artists
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        $repo = $this->getDoctrine()->getRepository(Album::class);

        $albums = $repo->findAll();

        return $this->render('biblio/home.html.twig', [
            'controller_name' => 'BiblioController',
            'albums' => $albums
        ]);
    }

    /**
     * @Route("/album/{id}", name="biblio_show")
     */
    public function show($id){
        $repo = $this->getDoctrine()->getRepository(Album::class);

        $album = $repo->find($id);
        return $this->render('biblio/show.html.twig', [
            'album' => $album,
        ]);
    }

    /**
     * @Route("/artist/{id}", name="artist_show")
     */
    public function showArt($id){
        $repo = $this->getDoctrine()->getRepository(Artist::class);

        $artist = $repo->find($id);
        return $this->render('biblio/showArt.html.twig', [
            'artist' => $artist,
        ]);
    }
}
