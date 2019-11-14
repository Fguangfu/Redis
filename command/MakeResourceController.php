<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ResourceMakeCommand;
use Illuminate\Console\GeneratorCommand;

/*
 * 创建一个资源路由
 * @auth jackie <2019.07.17>
 */
class MakeResourceController extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:resource-controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a New Resource Controller Class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ResourceController';


    /**
     * 模板文件目录
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub()
    {
        return resource_path('stubs/resourceController.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Controllers';
    }
}
