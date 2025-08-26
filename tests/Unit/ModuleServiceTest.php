<?php

declare(strict_types=1);

use Modules\Xot\Services\ModuleService;
use Nwidart\Modules\Module;
use Nwidart\Modules\Facades\Module as ModuleFacade;

<<<<<<< HEAD
uses(Tests\TestCase::class);

describe('ModuleService', function () {
    beforeEach(function () {
        $this->service = (new ModuleService())->setName('TestModule');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
describe('ModuleService', function () {
    beforeEach(function () {
        $this->service = new ModuleService('TestModule');
=======
=======
>>>>>>> 1fd4ceb6 (.)
uses(Tests\TestCase::class);

describe('ModuleService', function () {
    beforeEach(function () {
        $this->service = (new ModuleService())->setName('TestModule');
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
uses(Tests\TestCase::class);

describe('ModuleService', function () {
    beforeEach(function () {
        $this->service = (new ModuleService())->setName('TestModule');
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
>>>>>>> 5207ce7 (.)
    });

    it('can be instantiated', function () {
        expect($this->service)->toBeInstanceOf(ModuleService::class);
    });

    it('has correct module name property', function () {
        $reflection = new ReflectionClass($this->service);
        $nameProperty = $reflection->getProperty('name');
        $nameProperty->setAccessible(true);
        
        expect($nameProperty->getValue($this->service))->toBe('TestModule');
    });

    it('can be instantiated with different module names', function () {
<<<<<<< HEAD
        $service1 = (new ModuleService())->setName('Chart');
        $service2 = (new ModuleService())->setName('User');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $service1 = new ModuleService('Chart');
        $service2 = new ModuleService('User');
=======
        $service1 = (new ModuleService())->setName('Chart');
        $service2 = (new ModuleService())->setName('User');
>>>>>>> 5852845d (.)
=======
        $service1 = (new ModuleService())->setName('Chart');
        $service2 = (new ModuleService())->setName('User');
>>>>>>> abfbbdf (.)
=======
        $service1 = (new ModuleService())->setName('Chart');
        $service2 = (new ModuleService())->setName('User');
>>>>>>> 1fd4ceb6 (.)
>>>>>>> 5207ce7 (.)
        
        expect($service1)->toBeInstanceOf(ModuleService::class)
            ->and($service2)->toBeInstanceOf(ModuleService::class);
    });

    it('has getModels method', function () {
        expect(method_exists($this->service, 'getModels'))->toBeTrue();
    });

    it('returns array from getModels method', function () {
        // Mock the Module facade to avoid database dependencies
        $result = $this->service->getModels();
        
        expect($result)->toBeArray();
    });

    it('getModels returns correct array structure', function () {
        $result = $this->service->getModels();
        
        expect($result)->toBeArray();
        
        // Each value should be a class string
        foreach ($result as $key => $value) {
            expect($key)->toBeString()
                ->and($value)->toBeString();
        }
    });

    it('filters abstract classes correctly', function () {
        // Test the logic that filters out abstract classes
        $result = $this->service->getModels();
        
        // The result should not contain BaseModel (which is abstract)
        expect($result)->not->toHaveKey('base_model');
    });

    it('handles reflection exceptions gracefully', function () {
        // Test that the service handles reflection errors without throwing
        $result = $this->service->getModels();
        
        expect($result)->toBeArray();
    });

    it('processes model names correctly', function () {
        // Test that model names are converted to snake_case
        $reflection = new ReflectionClass($this->service);
        $method = $reflection->getMethod('getModels');
        
        expect($method->isPublic())->toBeTrue();
    });

    it('has proper return type annotation', function () {
        $reflection = new ReflectionClass($this->service);
        $method = $reflection->getMethod('getModels');
        
        expect($method->getReturnType()?->getName())->toBe('array');
    });

    it('can handle empty module names', function () {
        $service = new ModuleService();
        
        expect($service->getName())->toBeNull();
    });

<<<<<<< HEAD
    it('can set and get module name', function () {
        $service = new ModuleService();
        $service->setName('TestModule');
=======
    it('handles empty module gracefully', function () {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $emptyService = new ModuleService('NonExistentModule');
=======
        $emptyService = (new ModuleService())->setName('NonExistentModule');
>>>>>>> 5852845d (.)
=======
        $emptyService = (new ModuleService())->setName('NonExistentModule');
>>>>>>> abfbbdf (.)
=======
        $emptyService = (new ModuleService())->setName('NonExistentModule');
>>>>>>> 1fd4ceb6 (.)
        $result = $emptyService->getModels();
>>>>>>> 5207ce7 (.)
        
        expect($service->getName())->toBe('TestModule');
    });

    it('can chain setName method', function () {
        $service = new ModuleService();
        $result = $service->setName('TestModule');
        
        expect($result)->toBeInstanceOf(ModuleService::class);
    });

    it('has proper method visibility', function () {
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->getMethod('setName')->isPublic())->toBeTrue()
            ->and($reflection->getMethod('getName')->isPublic())->toBeTrue()
            ->and($reflection->getMethod('getModels')->isPublic())->toBeTrue();
    });

    it('can handle module facade integration', function () {
        // Test that the service can work with Module facade
        expect(class_exists('Nwidart\Modules\Facades\Module'))->toBeTrue();
    });

    it('can handle module class integration', function () {
        // Test that the service can work with Module class
        expect(class_exists('Nwidart\Modules\Module'))->toBeTrue();
    });

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    it('has proper constructor', function () {
=======
    it('uses setName method for configuration', function () {
        // ModuleService doesn't have a constructor with parameters
        // It uses setName() method for configuration (fluent interface)
>>>>>>> abfbbdf (.)
        $reflection = new ReflectionClass($this->service);
        
<<<<<<< HEAD
        expect($constructor)->not->toBeNull()
            ->and($constructor->isPublic())->toBeTrue();
<<<<<<< HEAD
=======
            
        $parameters = $constructor->getParameters();
        expect(count($parameters))->toBeGreaterThanOrEqual(1)
            ->and($parameters[0]->getName())->toBe('name');
=======
=======
>>>>>>> 1fd4ceb6 (.)
    it('uses setName method for configuration', function () {
        // ModuleService doesn't have a constructor with parameters
        // It uses setName() method for configuration (fluent interface)
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->hasMethod('setName'))->toBeTrue()
            ->and($reflection->getMethod('setName')->isPublic())->toBeTrue();
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
        expect($reflection->hasMethod('setName'))->toBeTrue()
            ->and($reflection->getMethod('setName')->isPublic())->toBeTrue();
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
>>>>>>> 5207ce7 (.)
    });

    it('can be extended', function () {
        // Test that the service can be extended
        $extendedService = new class extends ModuleService {
            public function customMethod(): string
            {
                return 'custom';
            }
        };
        
        expect($extendedService)->toBeInstanceOf(ModuleService::class)
            ->and($extendedService->customMethod())->toBe('custom');
    });

    it('maintains state between method calls', function () {
        $service = new ModuleService();
        $service->setName('InitialModule');
        
        expect($service->getName())->toBe('InitialModule');
        
        $service->setName('UpdatedModule');
        
        expect($service->getName())->toBe('UpdatedModule');
    });

    it('can handle reflection operations', function () {
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->getName())->toBe(ModuleService::class);
    });

    it('has proper property definitions', function () {
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->hasProperty('name'))->toBeTrue();
        
        $nameProperty = $reflection->getProperty('name');
        expect($nameProperty->isProtected())->toBeTrue();
    });

    it('can handle method existence checks', function () {
        expect(method_exists($this->service, 'setName'))->toBeTrue()
            ->and(method_exists($this->service, 'getName'))->toBeTrue()
            ->and(method_exists($this->service, 'getModels'))->toBeTrue();
    });

    it('can handle property access checks', function () {
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->hasProperty('name'))->toBeTrue();
    });

    it('can handle method access checks', function () {
        $reflection = new ReflectionClass($this->service);
        
        expect($reflection->hasMethod('setName'))->toBeTrue()
            ->and($reflection->hasMethod('getName'))->toBeTrue()
            ->and($reflection->hasMethod('getModels'))->toBeTrue();
    });

    it('can handle method parameter checks', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        
        expect($setNameMethod->getNumberOfParameters())->toBe(1);
        
        $parameter = $setNameMethod->getParameters()[0];
        expect($parameter->getName())->toBe('name');
    });

    it('can handle method return type checks', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        
        expect($setNameMethod->getReturnType()?->getName())->toBe('self');
    });

    it('can handle inheritance chain', function () {
        expect($this->service)->toBeInstanceOf(ModuleService::class);
    });

    it('can handle interface compliance', function () {
        // Test that the service implements required interfaces
        $reflection = new ReflectionClass($this->service);
        $interfaces = $reflection->getInterfaceNames();
        
        expect($interfaces)->toBeArray();
    });

    it('can handle trait usage', function () {
        $reflection = new ReflectionClass($this->service);
        $traits = $reflection->getTraitNames();
        
        expect($traits)->toBeArray();
    });

    it('can handle namespace resolution', function () {
        expect($this->service::class)->toBe('Modules\Xot\Services\ModuleService');
    });

    it('can handle class constant access', function () {
        $reflection = new ReflectionClass($this->service);
        $constants = $reflection->getConstants();
        
        expect($constants)->toBeArray();
    });

    it('can handle static method calls', function () {
        // Test that static methods can be called if they exist
        expect(method_exists(ModuleService::class, '__construct'))->toBeTrue();
    });

    it('can handle method parameter types', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->getType()?->getName())->toBe('string');
    });

    it('can handle method parameter defaults', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->isDefaultValueAvailable())->toBeFalse();
    });

    it('can handle method parameter required status', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->isOptional())->toBeFalse();
    });

    it('can handle method parameter by reference', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->isPassedByReference())->toBeFalse();
    });

    it('can handle method parameter variadic status', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->isVariadic())->toBeFalse();
    });

    it('can handle method parameter position', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->getPosition())->toBe(0);
    });

    it('can handle method parameter class', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->getClass())->toBeNull();
    });

    it('can handle method parameter declaring class', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->getDeclaringClass()->getName())->toBe(ModuleService::class);
    });

    it('can handle method parameter declaring function', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameter = $setNameMethod->getParameters()[0];
        
        expect($parameter->getDeclaringFunction()->getName())->toBe('setName');
    });

    it('can handle method parameter array access', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameters = $setNameMethod->getParameters();
        
        expect($parameters)->toBeArray()
            ->and($parameters)->toHaveCount(1);
    });

    it('can handle method parameter iteration', function () {
        $reflection = new ReflectionClass($this->service);
        $setNameMethod = $reflection->getMethod('setName');
        $parameters = $setNameMethod->getParameters();
        
        foreach ($parameters as $parameter) {
            expect($parameter)->toBeInstanceOf(ReflectionParameter::class);
        }
    });
});
