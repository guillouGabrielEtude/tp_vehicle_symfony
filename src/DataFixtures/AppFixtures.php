<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Option;
use App\Entity\State;
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
        $vehicles = [
            'models' => [
                'names' => [
                    "cabriollet",
                    "104",
                    "fourgonette",
                    "coccinel",
                ],
            ],
            'brands' => [
                'names' => [
                    "Citroen",
                    "reno",
                    "ford",
                    "jagoire",
                ]
            ],
            'types' => [
                'names' => [
                    "tipique",
                    "tipage",
                    "fortement typer",
                    "atipique"
                ],
            ],
            'vehicles' => [
                'plates' => [
                    "lmq sjnvmls fjnv",
                    "kjs nkjfknv jvsf",
                    "kjs bvfksbs kvbk",
                    "kcj kvjsskj fcks",
                    "cqd qdqdcqc qdcd",
                ],
                'picturesPaths' => [
                    "/image/1.webp",
                    "/image/2.webp",
                    "/image/3.webp",
                    "/image/4.webp",
                    "/image/1.webp",
                ],
                'capacity' => [
                    4,
                    5,
                    6,
                    8,
                    10,
                ],
                'prices' => [
                    5000,
                    10000,
                    7000,
                    3000,
                    1000000,
                ],
                'years' => [
                    4,
                    5,
                    6,
                    8,
                    3,
                ],
                'numberKilometers' => [
                    10000,
                    100000,
                    50000,
                    6000,
                    500,
                ],
            ],
            'options' => [
                'names' => [
                    'volan cuir',
                    'mode course',
                    'automatique',
                    'porte lunette',
                    'rétro en or'
                ]
            ],
            'states' => [
                'status' => [
                    'confirmée',
                    'en attente',
                    'en attente',
                    'annulée',
                    'disponible',
                ],
            ],
            'reservations' => [
                'references' => [
                    "aaa",
                    "bbb",
                    'ccc',
                ],
                'dateStart' => [
                    '2023-10-2',
                    '2023-10-20',
                    '2024-10-2',
                ],
                'dateEnd' => [
                    '2024-10-2',
                    '2024-10-20',
                    '2025-10-2',
                ],
                'numberRentalDay' => [
                    365,
                    365,
                    365,
                ],
                'dateEnd' => [
                    10000,
                    50000,
                    60000,
                ],
            ],
            'customers' => [
                'lastNames' => [
                    'Jean',
                    'Eude',
                    'Morice',
                    'Jertrude',
                    'Jisel'
                ],
                'firstNames' => [
                    'Le borgne',
                    'de la cours',
                    'guillerais',
                    'de lafon',
                    'menard',
                ],
                'address' => [
                    '2 rue des pomier',
                    '52 quai albert goupil',
                    '3 rue de la tours',
                    '10 avenue pompier',
                    '5 avenue henri'
                ],
                'postCodes' => [
                    '53000',
                    '10000',
                    '35000',
                    '65000',
                    '60000',
                ],
                'city' => [
                    'Laval',
                    'Paris',
                    'Lion',
                    'Nante',
                    'Tour',
                ],
                'emails' => [
                    'admin@admin.com',
                    'client@client.com',
                    'aaa@aaa.com',
                    'bbb@bbb.com',
                    'ccc@ccc.vom',
                ],
                'phones' => [
                    '07.05.05.26.18',
                    '06.18.65.14.65',
                    '02.45.68.95.32',
                    '04.16,63,81,43',
                    '09.45.36.85.74',
                ],
                'drivingLicenses' => [
                    'slkfnqmsljf',
                    'k<wkbfk<bkj',
                    'kskqhbvkssq',
                    'qsnvfsfqflj',
                    'slkffhvfshk',
                ],
                'passwords' => [
                    'password',
                    'password',
                    'password1',
                    'password2',
                    'password3',
                ],
            ],
        ];

        for ($i = 0; $i < 4; $i++) {
            $brand = new Brand();
            $brand->setName($vehicles['brands']['names'][$i]);
            $manager->persist($brand);

            $model = new Model();
            $model->setBrand($brand);
            $model->setName($vehicles['models']['names'][$i]);
            $manager->persist($model);

            $type = new Type();
            $type->setName($vehicles['types']['names'][$i]);
            $manager->persist(($type));

            $option = new Option();
            $option->setName($vehicles['options']['name'][$i]);
            $manager->persist($option);

            $vehicle = new Vehicle();
            $vehicle->setCapacity($vehicles['vehicles']['capacity'][$i]);
            $vehicle->setPrice($vehicles['vehicles']['prices'][$i]);
            $vehicle->setNumberPlate($vehicles['vehicles']['plates'][$i]);
            $vehicle->setYear($vehicles['vehicles']['years'][$i]);
            $vehicle->setNumberKilometers($vehicles['vehicles']['numberKilometers'][$i]);
            $vehicle->setPicturePath($vehicles['vehicles']['picturesPaths'][$i]);
            $vehicle->setModel($model);
            $vehicle->addOption($option);
            $manager->persist($vehicle);

            $state = new State();
            $state->setStatus($vehicles['states']['status'][$i]);
            $manager->persist($state);

            $customer = new Customer();
            $customer->setLastName($vehicles['customers']['lastNames'][$i]);
            $customer->setFirstName($vehicles['customers']['firstNames'][$i]);
            $customer->setAddress($vehicles['customers']['address'][$i]);
            $customer->setPostCode($vehicles['customers']['postCodes'][$i]);
            $customer->setCity($vehicles['customers']['city'][$i]);
            $customer->setEmail($vehicles['customers']['emails'][$i]);
            $customer->setPhone($vehicles['customers']['phones'][$i]);
            $customer->setDrivingLicense($vehicles['customers']['drivingLicenses'][$i]);
            $customer->setPassword($vehicles['customers']['passwords'][$i]);
        }

        $manager->flush();
    }
}
