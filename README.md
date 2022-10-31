<p align="center">

<img src="https://github.com/Visanduma/nova-back-navigation/blob/c0602f0eb87062482531d126bd3bef097427da69/resources/img/banner.png?raw=true" />

</p>

[![Latest Stable Version](http://poser.pugx.org/visanduma/nova-back-navigation/v)](https://packagist.org/packages/visanduma/nova-back-navigation) [![Total Downloads](http://poser.pugx.org/visanduma/nova-back-navigation/downloads)](https://packagist.org/packages/visanduma/nova-back-navigation) [![Latest Unstable Version](http://poser.pugx.org/visanduma/nova-back-navigation/v/unstable)](https://packagist.org/packages/visanduma/nova-back-navigation) [![License](http://poser.pugx.org/visanduma/nova-back-navigation/license)](https://packagist.org/packages/visanduma/nova-back-navigation) [![PHP Version Require](http://poser.pugx.org/visanduma/nova-back-navigation/require/php)](https://packagist.org/packages/visanduma/nova-back-navigation)

# Laravel Nova back navigation 

The missing *Back button* of laravel nova 4

This back button uses javascript `history.back()` method for navigation. Back button will be automatically attached to the default `Card` component.
so additional configuration not needed

![screenshot](/resources/img/sc-1.png)


### Installation

1) Run command 
```
composer require visanduma/nova-back-navigation
```
 
2) Register tool with `NovaServiceProvider`

```
use Visanduma\NovaBackNavigation\NovaBackNavigation;

class NovaServiceProvider extends NovaApplicationServiceProvider
{

public function tools()
    {
        return [
            ..
            new NovaBackNavigation(),
        ];
    }
    
```

3) Publish language & config files (optional)

```
php artisan vendor:publish --provider="Visanduma\NovaBackNavigation\ToolServiceProvider"
```

4) Great !. you are done


### Configure any urls to show the back button

``` php
<?php

// config for nova back button

return [
    /*
    Enable back button for following routes
    */
    'enabled_urls' => [

        "nova/resources/*/*",

    ]
];

```



