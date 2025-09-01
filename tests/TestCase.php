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
<<<<<<< HEAD
    // use DatabaseMigrations;
=======
    //use DatabaseMigrations;
>>>>>>> e697a77b (.)
=======
    //use DatabaseMigrations;
>>>>>>> 89d0c8f4 (.)

    // =============================================================================
    // SHARED TEST HELPER FUNCTIONS (DRY Pattern)
    // =============================================================================
    // Queste funzioni erano duplicate in molti file di test
    // Centralizzate qui per manutenibilità e coerenza
    // =============================================================================

    /**
     * Generate a unique email for testing to prevent database conflicts.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> e697a77b (.)
=======
     *
     * @return string
>>>>>>> 89d0c8f4 (.)
     */
    protected static function generateUniqueEmail(): string
    {
        $faker = fake();
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return $faker->unique()->safeEmail();
    }

    /**
     * Get the configured User class via XotData (correct architecture pattern).
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> e697a77b (.)
=======
     *
     * @return string
>>>>>>> 89d0c8f4 (.)
     */
    protected static function getUserClass(): string
    {
        return XotData::make()->getUserClass();
    }

    /**
     * Create a test user via XotData pattern with proper architecture.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> e697a77b (.)
=======
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
        $userData = array_merge($defaultData, $attributes);
        
        /** @var UserContract&\Illuminate\Database\Eloquent\Model $user */
        $user = $userClass::factory()->create($userData);
<<<<<<< HEAD

=======
        
        $userData = array_merge($defaultData, $attributes);
        
        /** @var UserContract&\Illuminate\Database\Eloquent\Model $user */
        $user = $userClass::factory()->create($userData);
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return $user;
    }

    /**
     * Mock XotData for widget testing (Gold Standard Pattern).
<<<<<<< HEAD
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
>>>>>>> e697a77b (.)
=======
     * 
     * Prevents "Class not found" errors and provides consistent behavior
     * across all widget tests.
     *
     * @return void
>>>>>>> 89d0c8f4 (.)
     */
    protected static function mockXotData(): void
    {
        $mockXotData = \Mockery::mock(\Modules\Xot\Datas\XotData::class)->makePartial();
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD

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
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        // ✅ CRITICO: Bind nel container per risoluzione automatica
        app()->instance(\Modules\Xot\Datas\XotData::class, $mockXotData);
    }

    /**
     * Create test user with specific type for multi-type testing.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param string $type
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> e697a77b (.)
=======
     * @param string $type
     * @param array<string, mixed> $attributes
     * @return UserContract
>>>>>>> 89d0c8f4 (.)
     */
    protected static function createTestUserWithType(string $type, array $attributes = []): UserContract
    {
        $attributes['type'] = $type;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return static::createTestUser($attributes);
    }

    /**
     * Generate test data array with common fields.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $overrides
=======
     * @param array<string, mixed> $overrides
>>>>>>> e697a77b (.)
=======
     * @param array<string, mixed> $overrides
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        return array_merge($defaultData, $overrides);
    }

    /**
     * Assert that user is authenticated with correct type.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @param string|null $expectedType
     * @return void
>>>>>>> e697a77b (.)
=======
     *
     * @param string|null $expectedType
     * @return void
>>>>>>> 89d0c8f4 (.)
     */
    protected function assertUserAuthenticated(?string $expectedType = null): void
    {
        $this->assertAuthenticated();
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        if ($expectedType !== null) {
            /** @var UserContract|null $user */
            $user = auth()->user();
            $this->assertNotNull($user);
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            if ($user && method_exists($user, 'type')) {
                $this->assertEquals($expectedType, $user->type ?? null);
            }
        }
    }
}
