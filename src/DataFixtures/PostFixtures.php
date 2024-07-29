<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i =0; $i < 150; $i++){
            $post = new Post();
            $post->setTitle($faker->words(4, true))
                 ->setContent($faker->realText(2000))
                 ->setState(mt_rand(0,2) === 1 ? Post::STATES[0]: Post::STATES[1]);
                 $manager->persist($post);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
