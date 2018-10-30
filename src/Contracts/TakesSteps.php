<?php
	
namespace Lester\LaravelWizard\Contracts;

trait TakesSteps
{
	protected $defaultView = 'wizard';
	
	public function wizard($step = null)
	{
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
	
	public function wizardPost(Request $request, $step = null)
	{
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