<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\CompanyController;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;

class CompanyApiTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_destroy_returns_no_content_if_deleted()
    {
        $repo = Mockery::mock(CompanyRepository::class);
        $repo->shouldReceive('delete')->with('321')->andReturn(true);

        $controller = new CompanyController($repo);
        $response = $controller->destroy('321');

        $this->assertEquals(204, $response->getStatusCode());
    }

    public function test_destroy_returns_422_if_not_inactive()
    {
        $repo = Mockery::mock(CompanyRepository::class);
        $repo->shouldReceive('delete')->with('321')->andReturn(false);

        $controller = new CompanyController($repo);
        $response = $controller->destroy('321');

        $this->assertEquals(422, $response->getStatusCode());
    }
}