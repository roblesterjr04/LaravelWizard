<?php
	
namespace Lester\LaravelWizard\Contracts;

use Lester\LaravelWizard\Container;

trait TakesSteps
{
	protected $defaultView = 'wizard';
	
	protected $wizard = null;
	
	public function wizard(Container $wizard, $step = null)
	{
		$this->wizard = $this->wizard ?: $wizard;
		
	    try {
	        if (is_null($step)) {
	            $step = $this->wizard->firstOrLastProcessed();
	        } else {
	            $step = $this->wizard->getBySlug($step);
	        }
	    } catch (StepNotFoundException $e) {
	        abort(404);
	    }
	
	    return view($this->defaultView, compact('step'));
	}
	
	public function wizardPost(Container $wizard, Request $request, $step = null)
	{
		$this->wizard = $this->wizard ?: $wizard;
		
	    try {
	        $step = $this->wizard->getBySlug($step);
	    } catch (StepNotFoundException $e) {
	        abort(404);
	    }
	
	    $this->validate($request, $step->rules($request));
	    $step->process($request);
	
	    return redirect()->route('wizard.post', [$this->wizard->nextSlug()]);
	}
	
}