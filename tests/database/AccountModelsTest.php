<?php

use App\Database\Seeds\DatabaseSeeder;
use App\Models\CustomerModel;
use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * @internal
 */
final class AccountModelsTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate   = true;
    protected $refresh   = true;
    protected $namespace = 'App';
    protected $seed      = DatabaseSeeder::class;

    public function testCustomerModelReturnsSeededRows(): void
    {
        $customers = (new CustomerModel())
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $this->assertCount(6, $customers);
        $this->assertSame('Carlo Villanueva', $customers[0]['full_name']);
        $this->assertArrayHasKey('email', $customers[0]);
        $this->assertArrayHasKey('phone', $customers[0]);
    }

    public function testUserModelReturnsSeededRows(): void
    {
        $users = (new UserModel())
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $this->assertCount(6, $users);
        $this->assertSame('support.enzo', $users[0]['username']);
        $this->assertArrayHasKey('full_name', $users[0]);
        $this->assertArrayHasKey('avatar', $users[0]);
    }
}
