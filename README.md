[![License](https://poser.pugx.org/wodrow/yii2wlog/license)](https://packagist.org/packages/wodrow/yii2wlog)
[![Total Downloads](https://poser.pugx.org/wodrow/yii2wlog/downloads)](https://packagist.org/packages/wodrow/yii2wlog)
[![Latest Stable Version](https://poser.pugx.org/wodrow/yii2wlog/version)](https://packagist.org/packages/wodrow/yii2wlog)
[![Latest Unstable Version](https://poser.pugx.org/wodrow/yii2wlog/v/unstable)](//packagist.org/packages/wodrow/yii2wlog)


# yii2wlog
yii2 wodrow log component

## Install

```html
composer require wodrow/yii2wlog "dev-master" -vv

yii migrate --migrationPath=@mdm/admin/migrations
```

````php
'components' => [
    ...
    'wlog' => [
        'class' => \wodrow\yii2wlog\Wlog::class,
    ],
    ...
],
'bootstrap' => [..., 'wlog'],
````
