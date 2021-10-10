<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $password_hashed =  $this->passwordEncoder->encodePassword($user,"123456");
        $user->setUsername("walid");
        $user->setEmail("walid@email.com");
        $user->setPassword($password_hashed);
        $manager->persist($user);

        $manager->flush();
    }
}
