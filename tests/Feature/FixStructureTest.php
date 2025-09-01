<?php

namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
>>>>>>> e697a77b (.)
=======
use Illuminate\Support\Facades\File;
>>>>>>> 89d0c8f4 (.)
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Test per verificare il corretto funzionamento dello script fix_structure.sh.
 */
class FixStructureTest extends TestCase
{
    private string $testDir;

    protected function setUp(): void
    {
        parent::setUp();

        // Creiamo una directory temporanea per i test
<<<<<<< HEAD
<<<<<<< HEAD
        $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
=======
        $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
>>>>>>> e697a77b (.)
=======
        $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
>>>>>>> 89d0c8f4 (.)
        mkdir($this->testDir, 0755, true);

        // Impostiamo la directory di lavoro
        chdir($this->testDir);
    }

    protected function tearDown(): void
    {
        // Puliamo la directory di test
        $this->rrmdir($this->testDir);

        parent::tearDown();
    }

    /**
     * Funzione ricorsiva per eliminare una directory con tutti i suoi contenuti.
     */
    private function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
<<<<<<< HEAD
<<<<<<< HEAD
                if ($object != '.' && $object != '..') {
                    if (is_dir($dir.DIRECTORY_SEPARATOR.$object) && ! is_link($dir.'/'.$object)) {
                        $this->rrmdir($dir.DIRECTORY_SEPARATOR.$object);
                    } else {
                        unlink($dir.DIRECTORY_SEPARATOR.$object);
=======
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                        $this->rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    } else {
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
>>>>>>> e697a77b (.)
=======
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                        $this->rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    } else {
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
>>>>>>> 89d0c8f4 (.)
                    }
                }
            }
            rmdir($dir);
        }
    }

    #[Test]
<<<<<<< HEAD
<<<<<<< HEAD
    public function test_move_to_app_functionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir.'/Actions', 0755, true);
        file_put_contents($this->testDir.'/Actions/test.php', '<?php echo "test";');
=======
    public function testMoveToAppFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Actions', 0755, true);
        file_put_contents($this->testDir . '/Actions/test.php', '<?php echo "test";');
>>>>>>> e697a77b (.)
=======
    public function testMoveToAppFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Actions', 0755, true);
        file_put_contents($this->testDir . '/Actions/test.php', '<?php echo "test";');
>>>>>>> 89d0c8f4 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> 89d0c8f4 (.)

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
        $this->assertDirectoryExists($this->testDir . '/app/Actions');
        $this->assertFileExists($this->testDir . '/app/Actions/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Actions');
    }

    #[Test]
    public function testRenameToLowerFunctionality(): void
    {
        // Creiamo una struttura di directory di test
<<<<<<< HEAD
        mkdir($this->testDir.'/Config', 0755, true);
        file_put_contents($this->testDir.'/Config/test.php', '<?php echo "test";');
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
        $this->assertDirectoryExists($this->testDir . '/app/Actions');
        $this->assertFileExists($this->testDir . '/app/Actions/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Actions');
    }

    #[Test]
    public function testRenameToLowerFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Config', 0755, true);
        file_put_contents($this->testDir . '/Config/test.php', '<?php echo "test";');
>>>>>>> e697a77b (.)
=======
        mkdir($this->testDir . '/Config', 0755, true);
        file_put_contents($this->testDir . '/Config/test.php', '<?php echo "test";');
>>>>>>> 89d0c8f4 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> 89d0c8f4 (.)

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
        $this->assertDirectoryExists($this->testDir . '/config');
        $this->assertFileExists($this->testDir . '/config/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Config');
    }

    #[Test]
    public function testMoveConfigFunctionality(): void
    {
        // Creiamo una struttura di directory di test con entrambe le versioni
        mkdir($this->testDir . '/Config', 0755, true);
        file_put_contents($this->testDir . '/Config/main.php', '<?php echo "main";');

<<<<<<< HEAD
        mkdir($this->testDir.'/config', 0755, true);
        file_put_contents($this->testDir.'/config/secondary.php', '<?php echo "secondary";');
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
        $this->assertDirectoryExists($this->testDir . '/config');
        $this->assertFileExists($this->testDir . '/config/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Config');
    }

    #[Test]
    public function testMoveConfigFunctionality(): void
    {
        // Creiamo una struttura di directory di test con entrambe le versioni
        mkdir($this->testDir . '/Config', 0755, true);
        file_put_contents($this->testDir . '/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir . '/config', 0755, true);
        file_put_contents($this->testDir . '/config/secondary.php', '<?php echo "secondary";');
>>>>>>> e697a77b (.)
=======
        mkdir($this->testDir . '/config', 0755, true);
        file_put_contents($this->testDir . '/config/secondary.php', '<?php echo "secondary";');
>>>>>>> 89d0c8f4 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> 89d0c8f4 (.)

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
<<<<<<< HEAD
        $this->assertDirectoryExists($this->testDir.'/config');
        $this->assertFileExists($this->testDir.'/config/main.php');
        $this->assertFileExists($this->testDir.'/config/secondary.php');
        $this->assertDirectoryDoesNotExist($this->testDir.'/Config');
        $this->assertDirectoryExists($this->testDir.'/config_old');
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
=======
>>>>>>> 89d0c8f4 (.)
        $this->assertDirectoryExists($this->testDir . '/config');
        $this->assertFileExists($this->testDir . '/config/main.php');
        $this->assertFileExists($this->testDir . '/config/secondary.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Config');
        $this->assertDirectoryExists($this->testDir . '/config_old');
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
    }
}
