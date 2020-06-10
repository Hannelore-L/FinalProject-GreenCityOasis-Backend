<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
//use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(1, 'main_users', function ($i) {
            $user = new User();
            $user->setEmail(sprintf('test@example.com', $i));
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'authenticate'));
            $user->setRoles([""]);
            $user->setUserCityId(1);
            $user->setUserCountryId(1);
            $user->setUserFirstName("Test");
            $user->setUserLastName("nr 1");
            $user->setUsername("ImATest");
            $user->setUserRegkey("test");


            return $user;
        });

        $manager->flush();
    }
}

