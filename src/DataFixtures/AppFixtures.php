<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use App\Entity\Model;
use App\Entity\Brand;
use App\Entity\Type;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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
        $vehiclesPicturesPaths = [
            "/image/1.webp",
            "/image/2.webp",
            "/image/3.webp",
            "/image/4.webp",
        ];

        foreach ($brandsNames as $key => $brandName) {
            $brand = new Brand();
            $brand->setName($brandName);
            $manager->persist($brand);

            $model = new Model();
            $model->setBrand($brand);
            $model->setName($modelsNames[$key]);
            $manager->persist($model);

            $type = new Type();
            $type->setName($typesNames[$key]);
            $manager->persist(($type));

            $vehicle = new Vehicle();
            $vehicle->setCapacity(rand(1, 8));
            $vehicle->setPrice(rand(5000, 100000));
            $vehicle->setNumberPlate($vehiclesPlates[$key]);
            $vehicle->setYear(rand(1, 10));
            $vehicle->setNumberKilometers(rand(10000, 100000));
            $vehicle->setPicturePath($vehiclesPicturesPaths[$key]);
            $vehicle->setModel($model);
            $vehicle->setType($type);
            $manager->persist($vehicle);
        }

        $manager->flush();
    }
}
