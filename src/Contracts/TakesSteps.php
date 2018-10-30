<?php
	
namespace Lester\LaravelWizard\Contracts;

use Lester\LaravelWizard\Container;
use Illuminate\Http\Request;

trait TakesSteps
{
	protected $wizard = null;
	
	public function wizard(Container $wizard, $step = null)
	{
		$this->wizard = $this->wizard ?: $wizard;
		$this->wizard->initWithSteps($this->steps);
		
	    try {
	        if (is_null($step)) {
	            $step = $this->wizard->firstOrLastProcessed();
	        } else {
	            $step = $this->wizard->getBySlug($step);
	        }
	    } catch (StepNotFoundException $e) {
	        abort(404);
	    }
	
	    return view(config('wizard.view'), compact('step'));
	}
	
	public function wizardPost(Container $wizard, Request $request, $step = null)
	{
		$this->wizard = $this->wizard ?: $wizard;
		$this->wizard->initWithSteps($this->steps);
		
	    try {
	        $step = $this->wizard->getBySlug($step);
	    } catch (StepNotFoundException $e) {
	        abort(404);
	    }
	
	    $this->validate($request, $step->rules($request));
	    $step->process($request);
	
	    return redirect()->route(config('wizard.routing.get'), [$this->wizard->nextSlug()]);
	}
	
}