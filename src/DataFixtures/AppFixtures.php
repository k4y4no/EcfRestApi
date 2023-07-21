<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\Car;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Twig\Node\SetNode;

class AppFixtures extends Fixture
{
    private $faker;
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->faker = Factory::create('fr_FR');
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {

        $currendtDate = new DateTime('now');

        for ($i = 0; $i < 4; $i++) {
            $activity = new Activity();
            $activity->setTitle($this->faker->word())
                ->setDescription($this->faker->sentence())
                ->setLogo('https://www.shutterstock.com/image-vector/wrench-screwdriver-icon-isolated-on-600w-180405908.jpg');
            // ->setNote($this->faker->image(null, 360, 360, 'animals', true))
            // ->setIdManager($userAdmin);

            $manager->persist($activity);
        }


        $userAdmin = new User();
        $userAdmin->setEmail('admin@guinea.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->userPasswordHasher->hashPassword($userAdmin, 'password'));
        // $product = new Product();
        $manager->persist($userAdmin);


        $user = new User();
        $user->setEmail('user@guinea.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
        // $product = new Product();
        $manager->persist($user);

        $userModo = new User();
        $userModo->setEmail('modo@guinea.com')
            ->setRoles(['ROLE_MODO'])
            ->setPassword($this->userPasswordHasher->hashPassword($userModo, 'password'));
        // $product = new Product();
        $manager->persist($userModo);

        $carsBrand = ['Renault', 'Peugeot', 'Ford', 'Mercedes', 'Citroen', 'Fiat', 'Suzuki'];
        $yearRand = rand(1990, 2015);
        $currendtDate = new DateTime('now');
        $idseller = [$user, $userAdmin, $userModo];

        $carspix = [
            'https://t4.ftcdn.net/jpg/00/71/38/07/240_F_71380767_7076UV0TZxZ0p34sHF7y13kjzGIwJvoH.jpg',
            'https://t4.ftcdn.net/jpg/00/58/87/17/240_F_58871737_dryKwXlGDoaJRv8qlpEvvoSBXQ55yP9R.jpg',
            'https://t4.ftcdn.net/jpg/01/82/78/07/240_F_182780786_rD4gvH1cAwmQ2uqeyDogUOgTcSiFspsa.jpg',
            'https://t3.ftcdn.net/jpg/03/89/37/68/240_F_389376832_DzMVS7vo8kI7oKRA0NTfvfNRBCrlCa2G.jpg',
            'https://t4.ftcdn.net/jpg/00/13/66/51/240_F_13665157_poQLEY6FFRRPZRFWLpd6AjZKlisUjyrO.jpg',
            'https://t4.ftcdn.net/jpg/00/87/14/91/240_F_87149180_nxrTEdtpeX09WIgsG6hQmi6IZ7mrKymy.jpg',
            'https://t4.ftcdn.net/jpg/01/03/93/55/240_F_103935517_foihLi0AvH8yqztQMUIx1HFoxgR1wXSR.jpg',
            'https://t3.ftcdn.net/jpg/02/16/60/42/240_F_216604244_fBZDQ1wUvq2NsyIFBTwTggfKmBZUNqCt.jpg',
            'https://t4.ftcdn.net/jpg/02/14/20/53/240_F_214205389_ByF4ryTFbqDlWp0CSCIzKia5nPnoxqnz.jpg',
            'https://t4.ftcdn.net/jpg/03/03/30/09/240_F_303300982_MCK0FwiS0eCvVzvtA4AwI50ulEQs9oyM.jpg',
            'https://t4.ftcdn.net/jpg/02/08/74/75/240_F_208747516_rX1r04ATrM2u6aoN1OICB9yyroU9dgUL.jpg',
            'https://t3.ftcdn.net/jpg/01/28/64/34/240_F_128643483_jFFpJrwkk4O7ku94e1ulWQwfYz2fNWXw.jpg',
            'https://t3.ftcdn.net/jpg/00/52/47/36/240_F_52473636_dbhPcCbJjUtPDBVnkvUO0M9NKJ9BJlEn.jpg',
            'https://t3.ftcdn.net/jpg/01/29/43/16/240_F_129431665_HIqONZxjrNXmVLisYXkdbcc3FjEOwZs4.jpg',
            'https://t4.ftcdn.net/jpg/02/54/41/19/240_F_254411986_oSlhdKKrTXXWJZSKlcpNsyMBecxnW74A.jpg',
            'https://t4.ftcdn.net/jpg/04/37/37/79/240_F_437377992_coDmNDCnG8JC2y9y7sq2L0BuHzNS9sVc.jpg',
            'https://t3.ftcdn.net/jpg/02/16/72/56/240_F_216725667_yUoZOraKR7FVLI1ThPWX1kMUQBSCxQzl.jpg',
            'https://t4.ftcdn.net/jpg/03/10/45/31/240_F_310453127_w5sncsq2G8xCZOgmOXZSwz1ZcyZsGMg3.jpg',
            'https://t3.ftcdn.net/jpg/01/23/52/24/240_F_123522495_QOa4PW8CqjakqWtWuP1UhdnBXpsjSAvi.jpg',
            'https://t3.ftcdn.net/jpg/02/86/19/36/240_F_286193638_USHmxfYGy83NXENzuk1IkBZBMXEinMi7.jpg',

        ];
        for ($i = 0; $i < 20; $i++) {
            $x = array_rand($carsBrand);
            $y = $carsBrand[$x];

            $u = array_rand($idseller);
            $z = $idseller[$u];

            $car = new Car();
            $car->setBrand($y)
                ->setModel('model ' . $i)
                ->setKm($this->faker->randomNumber(5, false))
                ->setPrice($this->faker->randomNumber(5, false))
                ->setDateCar($yearRand)
                ->setPicture($carspix[$i])
                ->setDescription($this->faker->sentence(3))
                ->setIdSeller($z);
            // ->setPicture($faker->imageUrl(360, 360, 'animals', true, 'dogs', true));

            $manager->persist($car);
        }

        $manager->flush();
    }
}
