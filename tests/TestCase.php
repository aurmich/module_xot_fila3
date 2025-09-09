<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
<<<<<<< HEAD
    // use DatabaseMigrations;
=======
    //use DatabaseMigrations;
>>>>>>> ad700fc8 (.)

    // =============================================================================
    // SHARED TEST HELPER FUNCTIONS (DRY Pattern)
    // =============================================================================
    // Queste funzioni erano duplicate in molti file di test
    // Centralizzate qui per manutenibilità e coerenza
    // =============================================================================

    /**
     * Generate a unique email for testing to prevent database conflicts.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> ad700fc8 (.)
     */
    protected static function generateUniqueEmail(): string
    {
        $faker = fake();
<<<<<<< HEAD

=======
>>>>>>> ad700fc8 (.)
        return $faker->unique()->safeEmail();
    }

    /**
     * Get the configured User class via XotData (correct architecture pattern).
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> ad700fc8 (.)
     */
    protected static function getUserClass(): string
    {
        return XotData::make()->getUserClass();
    }

    /**
     * Create a test user via XotData pattern with proper architecture.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> ad700fc8 (.)
     */
    protected static function createTestUser(array $attributes = []): UserContract
    {
        $userClass = static::getUserClass();
        $defaultData = [
            'email' => static::generateUniqueEmail(),
            'password' => Hash::make('password123'),
            'name' => fake()->name(),
        ];
<<<<<<< HEAD

        $userData = array_merge($defaultData, $attributes);

        /** @var UserContract&\Illuminate\Database\Eloquent\Model $user */
        $user = $userClass::factory()->create($userData);

=======
        
        $userData = array_merge($defaultData, $attributes);
        
        /** @var UserContract&\Illuminate\Database\Eloquent\Model $user */
        $user = $userClass::factory()->create($userData);
        
>>>>>>> ad700fc8 (.)
        return $user;
    }

    /**
     * Mock XotData for widget testing (Gold Standard Pattern).
<<<<<<< HEAD
     *
     * Prevents "Class not found" errors and provides consistent behavior
     * across all widget tests.
=======
     * 
     * Prevents "Class not found" errors and provides consistent behavior
     * across all widget tests.
     *
     * @return void
>>>>>>> ad700fc8 (.)
     */
    protected static function mockXotData(): void
    {
        $mockXotData = \Mockery::mock(\Modules\Xot\Datas\XotData::class)->makePartial();
<<<<<<< HEAD

        // Mock dei metodi critici con fallback sicuri
        $mockXotData->shouldReceive('getUserClass')
            ->andReturn(\Modules\SaluteOra\Models\User::class);

        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('patient')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\PatientResource');

        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('doctor')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\DoctorResource');

        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with(\Mockery::any())
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');

        $mockXotData->shouldReceive('make')
            ->andReturn($mockXotData);

=======
        
        // Mock dei metodi critici con fallback sicuri
        $mockXotData->shouldReceive('getUserClass')
            ->andReturn(\Modules\SaluteOra\Models\User::class);
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('patient')
            ->andReturn('\\Modules\\User\\Filament\\Resources\\PatientResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with('doctor')  
            ->andReturn('\\Modules\\User\\Filament\\Resources\\DoctorResource');
            
        $mockXotData->shouldReceive('getUserResourceClassByType')
            ->with(\Mockery::any())
            ->andReturn('\\Modules\\User\\Filament\\Resources\\UserResource');
            
        $mockXotData->shouldReceive('make')
            ->andReturn($mockXotData);
        
>>>>>>> ad700fc8 (.)
        // ✅ CRITICO: Bind nel container per risoluzione automatica
        app()->instance(\Modules\Xot\Datas\XotData::class, $mockXotData);
    }

    /**
     * Create test user with specific type for multi-type testing.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param string $type
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> ad700fc8 (.)
     */
    protected static function createTestUserWithType(string $type, array $attributes = []): UserContract
    {
        $attributes['type'] = $type;
<<<<<<< HEAD

=======
>>>>>>> ad700fc8 (.)
        return static::createTestUser($attributes);
    }

    /**
     * Generate test data array with common fields.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $overrides
=======
     * @param array<string, mixed> $overrides
>>>>>>> ad700fc8 (.)
     * @return array<string, mixed>
     */
    protected static function generateTestData(array $overrides = []): array
    {
        $defaultData = [
            'name' => fake()->name(),
            'email' => static::generateUniqueEmail(),
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
<<<<<<< HEAD

=======
        
>>>>>>> ad700fc8 (.)
        return array_merge($defaultData, $overrides);
    }

    /**
     * Assert that user is authenticated with correct type.
<<<<<<< HEAD
=======
     *
     * @param string|null $expectedType
     * @return void
>>>>>>> ad700fc8 (.)
     */
    protected function assertUserAuthenticated(?string $expectedType = null): void
    {
        $this->assertAuthenticated();
<<<<<<< HEAD

=======
        
>>>>>>> ad700fc8 (.)
        if ($expectedType !== null) {
            /** @var UserContract|null $user */
            $user = auth()->user();
            $this->assertNotNull($user);
<<<<<<< HEAD

=======
            
>>>>>>> ad700fc8 (.)
            if ($user && method_exists($user, 'type')) {
                $this->assertEquals($expectedType, $user->type ?? null);
            }
        }
    }
}
