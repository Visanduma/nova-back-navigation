<p align="center">

<img src="https://github.com/Visanduma/nova-back-navigation/blob/42b5b5576f0761310dabbb8b358089785e43ceb7/resources/img/banner.png?raw=true" />

</p>

[![Latest Stable Version](http://poser.pugx.org/visanduma/nova-back-navigation/v)](https://packagist.org/packages/visanduma/nova-back-navigation) [![Total Downloads](http://poser.pugx.org/visanduma/nova-back-navigation/downloads)](https://packagist.org/packages/visanduma/nova-back-navigation) [![Latest Unstable Version](http://poser.pugx.org/visanduma/nova-back-navigation/v/unstable)](https://packagist.org/packages/visanduma/nova-back-navigation) [![License](http://poser.pugx.org/visanduma/nova-back-navigation/license)](https://packagist.org/packages/visanduma/nova-back-navigation) [![PHP Version Require](http://poser.pugx.org/visanduma/nova-back-navigation/require/php)](https://packagist.org/packages/visanduma/nova-back-navigation)

# Laravel Nova back navigation 

The missing back button of laravel nova 4

This back button uses javascript `history(-1)` method for navigation. Back button will be automatically attached to the default `Card` component.
so additional configuration needed

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

3) Great !. you are done



