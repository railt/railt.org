<?php

use Github\Client;
use App\Entity\Source\Type;
use Illuminate\Database\Seeder;

/**
 * Class LoadSources
 */
class LoadSources extends Seeder
{
    private const USER = 'railt';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getRepositories() as $repo) {
            \DB::table('sources')->insert($repo);
        }
    }

    /**
     * @return iterable
     */
    private function getRepositories(): iterable
    {
        yield ['user' => self::USER, 'name' => 'docs', 'path' => '/ru', 'type' => Type::DOCUMENTATION];
        yield ['user' => self::USER, 'name' => 'docs', 'path' => '/en', 'type' => Type::DOCUMENTATION];

        $github = $this->container->make(Client::class);
        $repos = $github->user()->repositories(self::USER);

        foreach ($repos as $repo) {
            if ($repo['name'] === 'docs') {
                continue;
            }

            yield [
                'user'   => self::USER,
                'name'   => $repo['name'],
                'branch' => $repo['default_branch'],
                'type'   => $this->type($repo['name']),
            ];
        }
    }

    /**
     * @param string $name
     * @return string
     */
    private function type(string $name): string
    {
        switch ($name) {
            case 'symfony-bundle':
            case 'laravel-provider':
                return Type::PACKAGE;
            case 'reflection':
            case 'sdl':
            case 'storage':
            case 'io':
            case 'http':
            case 'events':
            case 'container':
            case 'compiler':
            case 'webonyx-adapter':
            case 'youshido-adapter':
                return Type::COMPONENT;
        }

        return Type::COMMON;
    }
}
