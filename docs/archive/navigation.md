---
title: Navigation
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

# Navigation {#navigation}

The navigation menu in the left-hand sidebar is defined using an array in `navigation.php`. Nested pages can be added by using the `children` associative array.

```php
<?php
// navigation.php

return [
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Customizing Your Site' => 'docs/customizing-your-site',
            'Navigation' => 'docs/navigation',
            'Algolia DocSearch' => 'docs/algolia-docsearch',
            'Custom 404 Page' => 'docs/custom-404-page',
        ],
    ],
<<<<<<< HEAD
    'Jigsaw Docs' => 'https://jigsaw.tighten.co/project_docs/installation',
=======
    'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
>>>>>>> ad700fc8 (.)
];

// config.php
'navigation' => require_once('navigation.php'),

// blade files
$page->navigation
```
### Versione HEAD


## Collegamenti tra versioni di navigation.md
<<<<<<< HEAD
* [navigation.md](../../../Gdpr/project_docs/navigation.md)
* [navigation.md](../../../Xot/project_docs/navigation.md)
* [navigation.md](../../../UI/project_docs/navigation.md)
* [navigation.md](../../../Cms/project_docs/blocks/navigation.md)
* [navigation.md](../../../Cms/project_docs/navigation.md)
* [navigation.md](../../../Cms/project_docs/components/navigation.md)
=======
* [navigation.md](../../../Gdpr/docs/navigation.md)
* [navigation.md](../../../Xot/docs/navigation.md)
* [navigation.md](../../../UI/docs/navigation.md)
* [navigation.md](../../../Cms/docs/blocks/navigation.md)
* [navigation.md](../../../Cms/docs/navigation.md)
* [navigation.md](../../../Cms/docs/components/navigation.md)
>>>>>>> ad700fc8 (.)


### Versione Incoming


---

