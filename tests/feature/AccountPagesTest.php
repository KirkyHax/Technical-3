<?php

use App\Database\Seeds\DatabaseSeeder;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class AccountPagesTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate   = true;
    protected $refresh   = true;
    protected $namespace = 'App';
    protected $seed      = DatabaseSeeder::class;

    public function testOverviewDisplaysDatabaseTotals(): void
    {
        $result = $this->get('/');

        $result->assertOK();
        $result->assertSee('Your account data now persists.');
        $result->assertSee('Customer accounts');
        $result->assertSee('User accounts');
    }

    public function testCustomerAccountsDisplaysModelRecords(): void
    {
        $result = $this->get('/customer-accounts');

        $result->assertOK();
        $result->assertSee('Carlo Villanueva');
        $result->assertSee('andrea.santos@example.com');
        $result->assertSee('CustomerModel');
    }

    public function testUserAccountsDisplaysModelRecords(): void
    {
        $result = $this->get('/user-accounts');

        $result->assertOK();
        $result->assertSee('Enzo Aquino');
        $result->assertSee('@admin.kaye');
        $result->assertSee('UserModel');
    }

    public function testNewAccountFormsAreAvailable(): void
    {
        $this->get('/customers/new')
            ->assertOK()
            ->assertSee('Create a new customer');

        $this->get('/users/new')
            ->assertOK()
            ->assertSee('Create a new user');
    }

    public function testCustomerCreateRejectsInvalidEmail(): void
    {
        $result = $this->post('/customers', [
            'full_name' => 'Sample Customer',
            'email'     => 'not-an-email',
            'phone'     => '09123456789',
        ]);

        $result->assertRedirect();
        $this->dontSeeInDatabase('customers', ['full_name' => 'Sample Customer']);
    }

    public function testUserCreateRejectsDuplicateUsername(): void
    {
        $result = $this->post('/users', [
            'username'  => 'admin.kaye',
            'full_name' => 'Another Administrator',
        ]);

        $result->assertRedirect();
        $this->assertSame(1, $this->db->table('users')->where('username', 'admin.kaye')->countAllResults());
    }
}
