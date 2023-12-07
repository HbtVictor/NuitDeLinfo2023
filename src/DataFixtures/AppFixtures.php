<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use App\Entity\User;
use Faker\Generator;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private Generator $faker;

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher){
        $this->faker = Factory::create("fr_FR");
        $this->hasher = $hasher;
    }
    

    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i < 20; $i++) { 
            $user = new User();
            $user->setPseudo($this->faker->name())
                 ->setEmail($this->faker->email())
                 ->setCreatedAt(new DateTimeImmutable());

            $hashPassword = $this->hasher->hashPassword(
                $user,
                'password'
            );
            $user->setPassword($hashPassword);
            $manager->persist($user);
        }

        for ($i=0; $i < 10; $i++) { 
            $post = new Post();
            $post->setSujet($this->faker->sentence(3, true))
                 ->setContenu($this->faker->paragraphs(3, true))
                 ->setAuteur($this->faker->randomDigit())
                 ->setCreatedAt(new DateTimeImmutable());
            $manager->persist($post);
        }

        $manager->flush();
    }
}
