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
        /*
        $brandsNames = [
            "Citroen",
            "reno",
            "ford",
            "jagoire",
        ];
        $modelsNames = [
            "cabriollet",
            "104",
            "fourgonette",
            "coccinel",
        ];
        $typesNames = [
            "tipique",
            "tipage",
            "fortement typer",
            "atipique"
        ];
        $vehiclesPlates = [
            "lmq sjnvmls fjnv",
            "kjs nkjfknv jvsf",
            "kjs bvfksbs kvbk",
            "kcj kvjsskj fcks",
        ];
        $brands = [];
        $models = [];
        $types = [];
        $vehicles = [];

        foreach ($brandsNames as $key => $brandName) {
            $brand = new Brand();
            $brand->setName($brandName);
            $brands[] = $brand;
            $entityManager->persist($brand);

            $model = new Model();
            $model->setBrand($brand);
            $model->setName($modelsNames[$key]);
            $models[] = $model;
            $entityManager->persist($model);

            $type = new Type();
            $type->setName($typesNames[$key]);
            $types[] = $type;
            $entityManager->persist(($type));

            $vehicle = new Vehicle();
            $vehicle->setCapacity(rand(1, 8));
            $vehicle->setPrice(rand(5000, 100000));
            $vehicle->setNumberPlate($vehiclesPlates[$key]);
            $vehicle->setYear(rand(1, 10));
            $vehicle->setNumberKilometers(rand(10000, 100000));
            $vehicle->setModel($model);
            $vehicle->setType($type);
            $vehicles[] = $vehicle;
            $entityManager->persist($vehicle);
        }

        $entityManager->flush();
        */

        $vehicles = $entityManager->getRepository(Vehicle::class)->findAll();
        $brands = $entityManager->getRepository(Brand::class)->findAll();
        $models = $entityManager->getRepository(Model::class)->findAll();
        $types = $entityManager->getRepository(Type::class)->findAll();

        return $this->render('vehicles/index.html.twig', [
            'controller_name' => 'VehiclesController',
            "vehicles" => $vehicles,
            "brands" => $brands,
            "models" => $models,
            "types" => $types,
        ]);
    }
}
