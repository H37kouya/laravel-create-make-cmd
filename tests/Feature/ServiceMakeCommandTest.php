<?php

namespace Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceMakeCommandTest extends TestCase
{
    protected $_filesystem;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_filesystem = new Filesystem;
    }

    /**
     * make:serviceのテスト.
     *
     * @return void
     */
    public function testMakeServiceSuccess()
    {
        $this->deleteFile(app_path('Services/TestService.php'));

        $this->artisan('make:service', ['name' => 'TestService'])
            ->expectsOutput('Service created successfully.')
            ->assertExitCode(0);

        $this->assertTrue($this->_filesystem->exists(app_path('Services/TestService.php')));
    }

    /**
     * make:serviceのテスト.
     *
     * @return void
     */
    public function testMakeServiceExistedFile()
    {
        $this->deleteFile(app_path('Services/TestService.php'));

        $this->artisan('make:service', ['name' => 'TestService'])
            ->expectsOutput('Service created successfully.')
            ->assertExitCode(0);

        $this->artisan('make:service', ['name' => 'TestService'])
            ->expectsOutput('Service already exists!')
            ->assertExitCode(0);
    }


    /**
     * make:serviceのテスト.
     *
     * @return void
     */
    public function testMakeServiceNestSuceess()
    {
        $this->deleteFile(app_path('Services/Tests/TestService.php'));

        $this->artisan('make:service', ['name' => 'Tests/TestService'])
            ->expectsOutput('Service created successfully.')
            ->assertExitCode(0);
    }

    /**
     * @after
     */
    public function tearDownSomeFixtures()
    {
        $this->deleteFile(app_path('Services/TestService.php'));
        $this->deleteFile(app_path('Services/Tests/TestService.php'));
        $this->_filesystem->deleteDirectory(app_path('Services/Tests'));
    }

    /**
     * ファイルを削除する
     *
     * @param string $path
     * @return void
     */
    protected function deleteFile(string $path)
    {
        if ($this->_filesystem->exists($path)) {
            $this->_filesystem->delete($path);
        }
    }
}
