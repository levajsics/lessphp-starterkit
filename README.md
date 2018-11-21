# lessphp-starterkit

This is a small li'l starter kit for compiling LESS CSS files on your server using [lessphp](http://leafo.net/lessphp/), and also caching the compiled results.

## Here's how you use it

1. Add all your `.less` files to the same directory `style.php` is located
2. Link to the style.php file in your HTML, e.g. `<link rel="stylesheet" href="/less/style.php">`
3. Make sure the cache folder `lessphp/cache` is writeable

## Resources

The lessphp compiler lives at http://leafo.net/lessphp/
