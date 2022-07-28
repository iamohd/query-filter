<?php

namespace Smartisan\QueryFilter\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smartisan\QueryFilter\Tests\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
