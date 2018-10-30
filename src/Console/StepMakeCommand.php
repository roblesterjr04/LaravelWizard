<?php

namespace Lester\LaravelWizard\Console;

use Illuminate\Console\GeneratorCommand;

class StepMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:step';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Wizard step class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Step';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return;
        }
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/step.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Steps';
    }

}
