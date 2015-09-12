EasyFormBundle
==========

A Symfony2 Bundle provide some extra form type.


Install
-------
1. Add EasyFormBundle in your composer.json
2. Enable the Bundle
3. Use the registered types

### 1. Add EasyFormBundle in your composer.json

Add EasyFormBundle in your composer.json:

```js
{
    "require": {
        "xiidea/easy-form-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update xiidea/easy-form-bundle
```

Composer will install the bundle to your project's `vendor/xiidea` directory.

### 2. Enable the Bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Xiidea\EasyFormBundle\XiideaEasyFormBundle(),
    );
}
```
### 3. Use the registered types.

Now you can use the registered types in ordinary way. currently available types are:

- hidden_entity

 you can add a **"hidden_entity"** field to the form as follow:
 
```php

    $builder
            ->add('fieldName', 'hidden_entity', array(
                'class' => 'Acme\DemoBundle\Entity\YourEntity'
            ));
```