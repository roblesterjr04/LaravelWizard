# Laravel Step Wizard


[![Latest Stable Version](https://poser.pugx.org/rob-lester-jr04/laravel-wizard/v/stable?format=flat-square)](https://packagist.org/packages/rob-lester-jr04/laravel-wizard)
[![Latest Unstable Version](https://poser.pugx.org/rob-lester-jr04/laravel-wizard/v/unstable?format=flat-square)](https://packagist.org/packages/rob-lester-jr04/laravel-wizard)


simple laravel step-by-step wizard

## Required

```
php ^7.0
laravel ^5.5
```

## Install

#### Require the package

```bash
$ composer require rob-lester-jr04/laravel-wizard
```

#### Create a controller

```bash
$ php artisan make:controller WizardController
```

We used `WizardController` as an example, you can choose what you need to for your project.

#### Include the wizard trait on the controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lester\LaravelWizard\Contracts\TakesSteps;

class WizardController extends Controller
{
	use TakesSteps;
	
	//
}
```



## Example/How

Still under development..........

## License

Laravel wizard is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)