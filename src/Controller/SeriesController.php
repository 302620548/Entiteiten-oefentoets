<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/")
     * @Route("/genre"),
     */
    public function index(GenreRepository $genreRepository): Response
    {
        $genres =  $genreRepository->findAll();

        return $this->render('series/index.html.twig', [
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/series/{id}", methods={"GET"})
     */
    public function series(GenreRepository $genreRepository, int $id): Response
    {
        $genre = $genreRepository->find($id);
        $series = $genre->getSeries();

        return $this->render('series/series.html.twig', [
            'series' => $series
        ]);
    }
}
