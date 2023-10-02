<?php

namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\Model;
use App\Entity\Brand;
use App\Entity\Type;

use App\Form\VehicleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiclesController extends AbstractController
{
    #[Route('/', name: 'app_vehicles')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $vehicles = $entityManager->getRepository(Vehicle::class)->findAll();

        return $this->render('vehicles/index.html.twig', [
            'controller_name' => 'VehiclesController',
            'vehicles' => $vehicles,
        ]);
    }
    /*
     * Recherche
     *
    #[Route('/vehicles/by_type_date/{startDate}/{endDate}/{typeId}', name: 'app_vehicles_by_type_date')]
    public function listByTypeDate(
        EntityManagerInterface $entityManager,
        string $startDate,
        string $endDate,
        int $typeId,
    ): Response
    {
        $vehicles = $entityManager->createQuery(
            'SELECT v FROM App\Entity\Vehicle v'
        )->getResult();

        return $this->render('vehicles/index.html.twig', [
            'controller_name' => 'VehiclesController',
            'vehicles' => $vehicles,
        ]);
    }
    */
    #[Route('/vehicle/details/{id}', name: 'details_vehicle')]
    public function detailsVehicle(EntityManagerInterface $entityManager, int $id): Response
    {
        $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);

        return $this->render('vehicles/details.html.twig', [
            'controller_name' => 'detailsVehicle',
            'vehicle' => $vehicle,
        ]);
    }
    #[Route('/vehicle/edit/{id?}', name: 'edit_vehicle')]
    public function editVehicle(Request $request, EntityManagerInterface $entityManager, ?int $id): Response
    {
        if ($id != null) {
            $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);
        } else {
            $vehicle = new Vehicle();
        }

        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle = $form->getData();

            $entityManager->persist($vehicle);
            $entityManager->flush();

            return $this->redirectToRoute("details_vehicle", ["id"=>$vehicle->getId()]);
        }

        return $this->render('vehicles/edit.html.twig', [
            'controller_name' => 'editVehicle',
            'form' => $form,
        ]);
    }
}
