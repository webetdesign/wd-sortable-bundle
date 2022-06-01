# webetdesign/wd-sortable-bundle

Fork of PixSortableBeavior

## Requirement
- PHP ^8
- symfony ^5.4

## Installation
Add the repo to your composer.json

```json
"repositories": [
	 {
	   "type": "git",
	   "url": "https://github.com/webetdesign/wd-sortable-bundle.git"
	 }
],
```

And

```
composer require webetdesign/wd-sortable-bundle
```

Register the bundles in `config/bundles.php`

``` php 
return [
    ...
    WebEtDesign\SortableBundle\WDSortableBundle::class => ['all' => true]
    ...
];
```

## Usage
````yaml
# services/admin.yaml
my_admin:
    class: App\Admin\MyAdmin
    tags:
      - { name: sonata.admin, model_class: App\Entity\Class, controller: WebEtDesign\SortableBundle\Controller\SortableAdminController, manager_type: orm, group: group, label: label }
````
````php
# Sonata Admin Class
 $list
    ->add('position', 'actions', [
        'actions' => [
            'move' => [
                'template' => '@WDSortable/Default/_sort_drag_drop.html.twig',
            ]
        ]
    ])
````