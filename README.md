# Laravel Nova back navigation 

The missing back button for laravel nova

This back button uses javascript `history(-1)` method for navigation. Back button will be automatically attached to the default `Card` component.
so additional configration needed

### Installation

1) Run command 
```
composer require visanduma/nova-back-navigation
```
 
2) Register tool with `NovaServiceProvider`

```
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
