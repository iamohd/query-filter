<?php

namespace Smartisan\QueryFilter\Tests\Feature;

use Illuminate\Http\Request;
use Smartisan\QueryFilter\Tests\Filters\UserFilter;
use Smartisan\QueryFilter\Tests\Models\User;
use Smartisan\QueryFilter\Tests\TestCase;

class QueryFilterTest extends TestCase
{
    /** @test */
    public function it_can_filter_eloquent_via_url_query()
    {
        User::factory(1)->create(['name' => 'Alessia Rush']);
        User::factory(1)->create(['name' => 'Shannon Preece']);
        User::factory(1)->create(['name' => 'Adeel Monroe']);
        User::factory(1)->create(['name' => 'Claude Osborne']);

        $request = Request::create('/users', 'GET', ['name' => 'Adeel']);

        $users = User::filter(new UserFilter($request))->get();

        $this->assertCount(1, $users);
        $this->assertEquals('Adeel Monroe', $users->first()->name);
    }

    /** @test */
    public function it_can_filter_eloquent_via_snake_case_url_query()
    {
        User::factory(1)->create(['name' => 'Alessia Rush']);
        User::factory(1)->create(['name' => 'Shannon Preece']);
        User::factory(1)->create(['name' => 'Adeel Monroe']);
        User::factory(1)->create(['name' => 'Claude Osborne']);

        $request = Request::create('/users', 'GET', ['full_name' => 'Adeel']);

        $users = User::filter(new UserFilter($request))->get();

        $this->assertCount(1, $users);
        $this->assertEquals('Adeel Monroe', $users->first()->name);
    }
}
