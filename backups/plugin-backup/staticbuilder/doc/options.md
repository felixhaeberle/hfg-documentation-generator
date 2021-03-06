Kirby StaticBuilder options
===========================


StaticBuilder offers a handful of options so that you can tweak the result, depending on your taste or your technical requirements. Need to export a documentation that can be shared as a folder of files (rather than hosted on a web server)? That’s doable. Only export part of a website? Sure.


## Option defaults

```php
c::set([
    // Extension is disabled by default!
    'staticbuilder' => false,

    // Pages will we written to: [project_root]/[outputdir]/[page_url][extension]
    // Example with default settings: [project_root]/static/parent-page/child-page/index.html
    'staticbuilder.outputdir' => 'static',
    'staticbuilder.extension' => '/index.html',

    // Lets you provide an absolute base URL, such as '/' or 'https//domain.tld/'
    // If false, we will try to write relative URLs instead
    'staticbuilder.baseurl' => false,

    // Should we add the extension to URLs in the HTML?
    'staticbuilder.uglyurls' => false,

    // Files and folders to copy into the static build folder
    'staticbuilder.assets' => ['assets', 'content', 'thumbs'],

    // Lets you provide a function for including/excluding pages
    'staticbuilder.filter' => null,

    // Do not copy files from the page's content folder
    'staticbuilder.withfiles' => false
]);
```

## Option details

### `staticbuilder.outputdir`

The default value, `'static'`, means we will ouptut the static build in `[yourproject]/static`.

DANGER: the contents of this folder will be *deleted* before each build! If you choose a different folder name or path, make sure it doesn’t match an existing folder like `kirby`, `site`, `thumbs`, etc.

There are a few restrictions in place:

1. Absolute paths (`/var/www/static` or `C:\static-site`) are forbidden.
2. PHP and your local web server (Apache/MAMP/WAMP/etc.) must have permissions to write to that folder.

### `staticbuilder.extension`

Extension for pages. Defaults to adding a `/index.html` suffix.

```php
c::set('staticbuilder.extension', '/index.html'); // my/page/index.html
c::set('staticbuilder.extension', '.html');       // my/page.html
```

### `staticbuilder.baseurl`

This overrides Kirby’s default `'url'` option.

```php
// Works well for hosting on a domain or subdomain
c::set('staticbuilder.baseurl', '/');

// If hosting in a subfolder
c::set('staticbuilder.baseurl', '/something');

// You can provide a full URL if you want, but that will
// probably make it harder to test the result locally
c::set('staticbuilder.baseurl', 'http://mysite.com');
```

```php
// Change all URLs to fully relative
c::set('staticbuilder.baseurl', './');
```

Then URLs from page A to page B should look like `./../../other-section/page-b`.

WARNING: relative URLs are only computed for URLs generated by Kirby, using the `$page->url()`, `$file->url()`, `$thumb->url()` etc. methods, or the `url('some/path')` method. If you have hardcoded URLs in your templates or in your content, they will not be modified!

### `staticbuilder.uglyurls`

Should we include the full filename in page URLs or not? (Defaults to false.)

```php
// Page URL might look like:
//   /my/page
c::set('staticbuilder.uglyurls', false);

// Page URL might look like:
//   /my/page.html (default)
//   /my/page/index.html (custom extension config)
c::set('staticbuilder.uglyurls', true);
```

### `staticbuilder.assets`

A list of static files or folders to copy in the `static` directory.

```php
c::set('staticbuilder.assets', [
    // Copy the full 'assets' folder
    'assets',
    // Thumbs too
    'thumbs',
    // Use key=>value syntax to change the destination
    'assets/images/favicon.ico' => 'favicon.ico',
    // Getting a file from outside the main project dir
    '../server/static-htaccess.conf' => '.htaccess'
]);
```

Note: `*` or other wildcards are not supported. You need explicit paths to existing files or folders.

### `staticbuilder.filter`

With this option you can provide a PHP callback that gets each Page object as its only parameter, and which should return `true` for pages to build and `false` for pages to exclude.

Optionally, this callback can return an array with a boolean value and a message explaining why a page was filtered in or out.

This example filters out pages that do not match the specified template names:

```php
c::set('staticbuilder.filter', function($page){
    $template = $page->intendedTemplate();
    $allowed = ['page', 'post', 'blog', 'error', 'home'];
    if (in_array($template, $allowed)) {
        return true;
    } else {
        return [false, "Template '$template' excluded from static build"];
    }
});
```

The default filter excludes folders that don’t have a text file, and folders that only contain [Kirby Modules](https://github.com/getkirby-plugins/modules-plugin). You can reuse this default filter in your code:

```php
c::set('staticbuilder.filter', function($page) {
    // Check our custom logic for articles
    if ($page->intendedTemplate() == 'article' && !$page->isPublished()) {
        return [false, 'Unpublished articles are excluded from static build'];
    }
    // And fall back to the default logic for other pages
    return KirbyStaticBuilder\Plugin::defaultFilter($page);
});
```

### `staticbuilder.withfiles`

Should we copy page files in their parent’s target directory? (Defaults to false.)

```php
// Copy a page’s files (images, documents etc.), e.g.
// content/1-my/3-page/image.jpg -> static/my/page/image.jpg
// content/1-my/3-page/doc.pdf   -> static/my/page/doc.pdf
c::set('staticbuilder.withfiles', true);
```

Note that for multilingual sites this would copy the files for each language (if you have 3 languages, each file gets copied to 3 different locations).

You can also specify a filter function to specify which files should get copied over:

```php
c::set('staticbuilder.withfiles', function($file) {
    // Only copy page files smaller than 250kB
    return $file->size() < 256000;
});
```

We’re using Kirby’s [`$files->filter()` method](https://getkirby.com/docs/cheatsheet/files/filter). See also [the available file methods](https://getkirby.com/docs/cheatsheet#file).
