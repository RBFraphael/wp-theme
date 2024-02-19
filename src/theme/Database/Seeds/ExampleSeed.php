<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ExampleSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'john@doe.com',
                'phone' => '123-456-7890'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@doe.com',
                'phone' => '098-765-4321'
            ]
        ];

        \WpTheme\Database\Models\Example::insert($data);
    }
}
