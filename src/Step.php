<?php

namespace Lester\LaravelWizard;

use Illuminate\Http\Request;

abstract class Step
{

    /**
     * @deprecated since 1.1.0 $label will be no more static
     */
    public $label;

    /**
     * @deprecated from 1.1.0 $slug will be no more static
     */
    public $slug;

    /**
     * @deprecated from 1.1.0 $view will be no more static
     */
    public $view;
    public $number;
    public $key;
    public $index;
    protected $wizard;

    public function __construct(int $number, $key, int $index, Wizard $wizard)
    {
        $this->number = $number;
        $this->key = $key;
        $this->index = $index;
        $this->wizard = $wizard;
    }

    abstract public function process(Request $request);

    public function rules(Request $request = null): array
    {
        return [];
    }

    public function saveProgress(Request $request, array $additionalData = [])
    {
        $wizardData = $this->wizard->data();
        $wizardData[$this->slug] = $request->except('step', '_token');
        $wizardData = array_merge($wizardData, $additionalData);

        $this->wizard->data($wizardData);
    }
    
    public function data($key = null)
    {
	    $wizardData = $this->wizard->data();
	    $stepData = isset($wizardData[$this->slug]) ? $wizardData[$this->slug] : [];
	    
	    if ($key === null) return $wizardData[$this->slug];
	    
	    return isset($stepData[$key]) ? $stepData[$key] : false;
    }

}