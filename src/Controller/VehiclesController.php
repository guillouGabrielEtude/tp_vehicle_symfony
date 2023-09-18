<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\Model;
use App\Entity\Brand;
use App\Entity\Type;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiclesController extends AbstractController
{
    #[Route('/vehicles', name: 'app_vehicles')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $vehicles = $entityManager->getRepository(Vehicle::class)->findAll();

        return $this->render('vehicles/index.html.twig', [
            'controller_name' => 'VehiclesController',
            "vehicles" => $vehicles,
        ]);
    }
    #[Route('/vehicles/{id}', name: 'app_vehicle')]
    public function vehicle(EntityManagerInterface $entityManager, int $id): Response
    {
        $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);

        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehiclesController',
            "vehicle" => $vehicle,
        ]);
    }
}
