# PHP-Dynamic-Autoloader
PHP Dynamic Autoloader

The purpose of creating this class is to provide dynamic autoloading for PHP classes with or without namespaces.

Simply, `DynamicAutoloader` searches for a class inside a bunch of paths and includes the class if exists.

###Usage

1. Set paths as an array:   

```php
$loader = new DynamicAutoloader([
	__DIR__ . DIRECTORY_SEPARATOR .'Model',
	__DIR__ . DIRECTORY_SEPARATOR .'Entities',
	__DIR__ . DIRECTORY_SEPARATOR .'Classes',
	...
]);
```

2. Set paths using `PATH_SEPARATOR`:   

```php
set_include_path(
	__DIR__ . DIRECTORY_SEPARATOR . 'Model'. PATH_SEPARATOR,
	__DIR__ . DIRECTORY_SEPARATOR . 'Entities'. PATH_SEPARATOR,
	__DIR__ . DIRECTORY_SEPARATOR . 'Classes',
);
$loader = new DynamicAutoloader(get_include_path());
```
