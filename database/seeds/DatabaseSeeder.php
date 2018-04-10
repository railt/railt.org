<?php

use App\Entity\Documentation;
use App\Entity\Menu;
use App\Entity\User;
use App\Entity\User\Ability;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var EntityManagerInterface $em */
        $em = $this->container->make(EntityManagerInterface::class);

        foreach ($this->entities() as $entity) {
            $em->persist($entity);
        }

        $em->flush();
    }

    /**
     * @return iterable
     */
    private function entities(): iterable
    {
        yield from $this->users();
    }

    /**
     * @return iterable
     */
    private function users(): iterable
    {
        $user = new User('admin', 'admin');

        foreach (Ability::crud(Documentation::class) as $ability) {
            $user->addAbility($ability);
        }

        foreach (Ability::crud(Menu::class) as $ability) {
            $user->addAbility($ability);
        }

        foreach (Ability::crud(User::class) as $ability) {
            $user->addAbility($ability);
        }

        yield $user;
    }
}
