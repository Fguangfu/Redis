<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ResourceMakeCommand;
use Illuminate\Console\GeneratorCommand;

/*
 * 创建一个自定义模型
 * @auth jackie <2019.07.17>
 */
class MakeModel extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:make-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a New Model Class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'MakeModel';


    /**
     * 模板文件目录
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub()
    {
        return resource_path('stubs/model.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Models';
    }
}
