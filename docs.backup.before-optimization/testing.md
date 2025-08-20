# Testing

## Configurazione Base

### PHPUnit
```xml
<!-- phpunit.xml -->
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="./vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
>
    <testsuites>
        <testsuite name="Unit">
            <directory suffix="Test.php">./tests/Unit</directory>
        </testsuite>
        <testsuite name="Feature">
            <directory suffix="Test.php">./tests/Feature</directory>
        </testsuite>
    </testsuites>
    <coverage processUncoveredFiles="true">
        <include>
            <directory suffix=".php">./app</directory>
        </include>
    </coverage>
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_DRIVER" value="array"/>
        <env name="MAIL_MAILER" value="array"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="TELESCOPE_ENABLED" value="false"/>
    </php>
</phpunit>
```

## Test Base

### Test Unitario
```php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user_can_be_created()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@example.com', $user->email);
    }
}
```

### Test di Feature
```php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    public function test_can_create_user()
    {
        $response = $this->postJson('/api/users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201)
                ->assertJson([
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                ]);
    }
}
```

## Best Practices

### 1. Struttura
- Organizzare per dominio
- Separare unit e feature
- Documentare i test
- Gestire le dipendenze

### 2. Performance
- Ottimizzare i test
- Utilizzare i database
- Implementare il caching
- Monitorare i test

### 3. Sicurezza
- Validare i dati
- Proteggere i test
- Implementare il logging
- Gestire i fallimenti

### 4. Manutenzione
- Monitorare i test
- Gestire le versioni
- Implementare alerting
- Documentare i test

## Esempi di Utilizzo

### Test di API
```php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class ApiTest extends TestCase
{
    public function test_can_get_users()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                ->assertJsonCount(3)
                ->assertJsonStructure([
                    '*' => ['id', 'name', 'email', 'created_at']
                ]);
    }
}
```

### Test di Autenticazione
```php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure(['token']);
    }
}
```

## Strumenti Utili

### Comandi Artisan
```bash
# Creare un test
php artisan make:test UserTest

# Eseguire i test
php artisan test

# Eseguire un test specifico
php artisan test --filter=UserTest
```

### Factory
```php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ];
    }
}
```

## Gestione degli Errori

### Errori di Test
```php
try {
    $response = $this->postJson('/api/users', [
        'name' => 'Test User',
    ]);
} catch (\Exception $e) {
    $this->fail('Test fallito: ' . $e->getMessage());
}
```

### Logging
```php
use Illuminate\Support\Facades\Log;

public function test_with_logging()
{
    Log::info('Inizio test', [
        'test' => $this->getName(),
    ]);

    // Logica del test

    Log::info('Test completato', [
        'test' => $this->getName(),
    ]);
}
```

## Test Avanzati

### Test con Mock
```php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\PaymentService;
use Mockery;

class PaymentTest extends TestCase
{
    public function test_payment_processing()
    {
        $paymentService = Mockery::mock(PaymentService::class);
        $paymentService->shouldReceive('process')
                      ->once()
                      ->andReturn(true);

        $result = $paymentService->process(100);

        $this->assertTrue($result);
    }
}
```

### Test con Database
```php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_data()
    {
        $this->postJson('/api/data', [
            'name' => 'Test Data',
        ]);

        $this->assertDatabaseHas('data', [
            'name' => 'Test Data',
        ]);
    }
}
``` 