<?php

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
=======
use function Pest\Laravel\{artisan, assertDatabaseHas};
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
>>>>>>> e697a77b (.)
=======
use function Pest\Laravel\{artisan, assertDatabaseHas};
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
>>>>>>> 89d0c8f4 (.)

uses(\Modules\Xot\Tests\TestCase::class);

beforeEach(function () {
    // Create a temporary directory for testing
<<<<<<< HEAD
<<<<<<< HEAD
    $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
    mkdir($this->testDir, 0755, true);

=======
    $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
    mkdir($this->testDir, 0755, true);
    
>>>>>>> e697a77b (.)
=======
    $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
    mkdir($this->testDir, 0755, true);
    
>>>>>>> 89d0c8f4 (.)
    // Set the working directory
    chdir($this->testDir);
});

afterEach(function () {
    // Clean up the test directory
    $this->rrmdir($this->testDir);
});

// Recursive function to remove a directory and its contents
<<<<<<< HEAD
<<<<<<< HEAD
function rrmdir($dir)
{
=======
function rrmdir($dir) {
>>>>>>> 89d0c8f4 (.)
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                    rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                } else {
<<<<<<< HEAD
                    unlink($dir.DIRECTORY_SEPARATOR.$object);
=======
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                    rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                } else {
                    unlink($dir. DIRECTORY_SEPARATOR .$object);
>>>>>>> e697a77b (.)
=======
                    unlink($dir. DIRECTORY_SEPARATOR .$object);
>>>>>>> 89d0c8f4 (.)
                }
            }
        }
        rmdir($dir);
    }
}

test('creates necessary directories and files', function () {
    // Run the command
    $this->artisan('xot:fix-structure')
<<<<<<< HEAD
<<<<<<< HEAD
        ->assertExitCode(0);
=======
         ->assertExitCode(0);
>>>>>>> e697a77b (.)
=======
         ->assertExitCode(0);
>>>>>>> 89d0c8f4 (.)

    // Check if directories were created
    $directories = [
        'app/Models',
        'app/Http/Controllers',
        'app/Http/Requests',
        'app/Http/Resources',
        'app/Http/Middleware',
        'app/Providers',
        'database/migrations',
        'database/seeders',
        'database/factories',
        'resources/views',
        'routes',
        'tests/Feature',
        'tests/Unit',
    ];

    foreach ($directories as $directory) {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertDirectoryExists($this->testDir.'/'.$directory);
=======
        $this->assertDirectoryExists($this->testDir . '/' . $directory);
>>>>>>> e697a77b (.)
=======
        $this->assertDirectoryExists($this->testDir . '/' . $directory);
>>>>>>> 89d0c8f4 (.)
    }

    // Check if .gitkeep files were created in empty directories
    $gitkeepFiles = [
        'app/Models/.gitkeep',
        'app/Http/Controllers/.gitkeep',
        'app/Http/Requests/.gitkeep',
        'app/Http/Resources/.gitkeep',
        'database/seeders/.gitkeep',
        'resources/views/.gitkeep',
    ];

    foreach ($gitkeepFiles as $file) {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertFileExists($this->testDir.'/'.$file);
=======
        $this->assertFileExists($this->testDir . '/' . $file);
>>>>>>> e697a77b (.)
=======
        $this->assertFileExists($this->testDir . '/' . $file);
>>>>>>> 89d0c8f4 (.)
    }
});

test('does not overwrite existing files', function () {
    // Create a test file that should not be overwritten
    $testContent = 'Test content';
<<<<<<< HEAD
<<<<<<< HEAD
    $testFile = $this->testDir.'/routes/web.php';
=======
    $testFile = $this->testDir . '/routes/web.php';
>>>>>>> e697a77b (.)
=======
    $testFile = $this->testDir . '/routes/web.php';
>>>>>>> 89d0c8f4 (.)
    file_put_contents($testFile, $testContent);

    // Run the command
    $this->artisan('xot:fix-structure')
<<<<<<< HEAD
<<<<<<< HEAD
        ->assertExitCode(0);
=======
         ->assertExitCode(0);
>>>>>>> e697a77b (.)
=======
         ->assertExitCode(0);
>>>>>>> 89d0c8f4 (.)

    // Verify the file was not overwritten
    $this->assertStringEqualsFile($testFile, $testContent);
});

test('handles errors gracefully', function () {
    // Make a directory non-writable to test error handling
<<<<<<< HEAD
<<<<<<< HEAD
    $nonWritableDir = $this->testDir.'/app';
=======
    $nonWritableDir = $this->testDir . '/app';
>>>>>>> e697a77b (.)
=======
    $nonWritableDir = $this->testDir . '/app';
>>>>>>> 89d0c8f4 (.)
    chmod($nonWritableDir, 0555);

    // Run the command and expect an error
    $this->artisan('xot:fix-structure')
<<<<<<< HEAD
<<<<<<< HEAD
        ->assertExitCode(1);
=======
         ->assertExitCode(1);
>>>>>>> e697a77b (.)
=======
         ->assertExitCode(1);
>>>>>>> 89d0c8f4 (.)

    // Restore permissions
    chmod($nonWritableDir, 0755);
});
