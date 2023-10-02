<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Form\SearchVehicleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /*
     * Recherche
     *
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SearchVehicleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            return $this->redirectToRoute("app_vehicles_by_type_date", [
                'startDate' => $search['dateStart']->format('Y-m-d'),
                'endDate' => $search['dateEnd']->format('Y-m-d'),
                'typeId' => $search['type']->getId(),
            ]);
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form
        ]);
    }
    */
}
