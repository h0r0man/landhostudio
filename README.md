# Land Ho

An official Land Ho WordPress theme

## To-do’s

- [x] base template for pages eg. legal stuff
- [x] hello template
- [ ] loading between the pages
- [ ] social metatags (try plugin?)
- [ ] sitemap plugin
- [ ] cache plugin

## Installation

1. Install [gulp](http://gulpjs.com)
2. Install [bower](https://bower.io/)
3. Navigate to the theme directory, then run `npm install` to download all the workflow automation development dependencies
4. Run `bower install` to download all the front-end dependencies
5. Build project assets running `gulp`
6. Open watch server with run `gulp watch`

## WordPress setup

    define('DISALLOW_FILE_EDIT', true);
    define('WP_POST_REVISIONS', 3);
    define('AUTOSAVE_INTERVAL', 600);
    define('EMPTY_TRASH_DAYS', 3);

    ## WordPress plugins

    1. [ACF Pro](https://www.advancedcustomfields.com/)
    2. [Soil](https://roots.io/plugins/soil/)
    3. [Post Types Order](https://wordpress.org/plugins/post-types-order/)
    4. [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)

## Increase Wordpress upload size

    # ./.htaccess
    php_value upload_max_filesize 128M
    php_value post_max_size 128M

## License

This theme is copyrighted. Non autorizated modification (any of modification of the source code inside this theme folder) of this theme is strongly prohibited.
