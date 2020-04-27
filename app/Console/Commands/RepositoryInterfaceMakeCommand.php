<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Filesystem\Filesystem;

class RepositoryInterfaceMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repositoryInterface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository Interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Interface';

    /**
     * Indicates whether the command should be shown in the Artisan command list.
     *
     * @var bool
     */
    protected $hidden = true;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
    }

    /**
    * 生成に使うスタブファイルを取得する
    *
    * @return string
    */
    protected function getStub()
    {
        return __DIR__.'/stubs/repositoryInterface.stub';
    }

    /**
     * クラスのデフォルトの名前空間を取得する
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }
}
