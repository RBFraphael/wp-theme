# Wordpress Starter Theme

An easy to use, with a robust file hierarchy, theme boilerplate for Wordpress projects.

![Theme Screenshot](screenshot.png)

## 1. Installing

The first thing you need to do is to clone the repository. After that, run ```npm install``` (or ```yarn install```) and ```composer install``` to install all dependencies. If you already haven't Composer installed, check out the [official download page](https://getcomposer.org/download/).

## 2. Rebranding

After installing all Composer and NPM dependencies, run ```npm run rebrand``` (or ```yarn rebrand```) to run the rebrand script, that will replace all resources (like constant prefixes, function prefixes, class names, text domain, theme name, theme description etc) to your own. This script will ask you some questions, and you need to input your own strings. See the summary below for more information.

| Question | Description | Original value | Example value |
| --- | --- | --- | --- |
| Project name | Your theme's name | Starter Theme | My Wordpress Theme |
| Project description | Your theme's description | An easy to use and easy to understand Wordpress starter theme | Lorem ipsum dolor sit amet, consectetur adipiscing elit. |
| Main class | The main class used to initialize your theme. Can be located at ```/includes/classes/class.main.php``` and is used on ```functions.php``` | StarterTheme | MyTheme |
| Constant prefix | This is the prefix used on constant variables to prevent conflicts with other themes or plugins. | STARTERTHEME | MYTHEME |
| Function prefix | This is the prefix used on helper methods, that are open - not contained inside a class -, to prevent conflicts with other themes or plugins. | mytheme | jd |
| Text domain | Your theme's textdomain. *Note:* Place your language files (.mo and .pot files) on a new folder called ```lang```. | starter-theme | mytheme |
| Author name | Your name, or the name of your company, or the name of your dog. You decide. | RBFraphael | John Doe |
| Author URL | Your website URL, or any URL that shows the author, like you social profile, your company's website, a link to a photo of your dog... You decide too. | https://github.com/rbfraphael | https://johndoe.com |
| Git repository | Your theme's repository. Not necessary to be a Git. Just a link where you can find your source code. | https://github.com/rbfraphael/starter-theme | https://github.com/johndoe/my-theme |

You can check this rebranding process at ```/build/rebrand.js```.

## 3. Developing

At this point, the only thing you need to do is to create something awesome. The next steps, you can check some features of this theme, like built-in resources, node scripts and the file structure.

### 3.1. Built-in assets

This theme comes with some useful front-end resources to help you developing your theme.

- [Animate CSS](https://animate.style/)
- [Animate On Scroll](https://michalsnik.github.io/aos/)
- [BarbaJS](https://barba.js.org/)
- [Bootstrap 5](https://getbootstrap.com/)
- [FontAwesome 6](https://fontawesome.com/)
- [jQuery](https://jquery.com/)
- [Lazyload](https://www.andreaverlicchi.eu/vanilla-lazyload/)
- [Rellax](https://dixonandmoe.com/rellax/)
- [Slick Carousel](https://kenwheeler.github.io/slick/)

Also, you can add whatever you want.

### 3.2. Built-in plugins and PHP features

At Wordpress level, this theme includes some useful plugins to help you creating powerful admin panels. The built-in plugins are:

- [Advanced Custom Fields FREE](https://www.advancedcustomfields.com/)
- [ACF Font Awesome](https://br.wordpress.org/plugins/advanced-custom-fields-font-awesome/)
- Pro Features for ACF - My own plugin, that includes some features on ACF free.

As PHP features, this theme comes with:

- [ACF Builder](https://github.com/StoutLogic/acf-builder)
- [Simple HTML DOM](https://simplehtmldom.sourceforge.io/)

#### 3.2.1. ACF Builder

While using ACF to manage custom fields, this theme uses [ACF Builder](https://github.com/StoutLogic/acf-builder) to manage your fields in an easy way, and to prevent database oversizing with unnecessary fields information. You can manage your fields directly from your code. Needs help? [Here](https://github.com/Log1x/acf-builder-cheatsheet) you can find a very powerful documentation on how to use ACF builder.

### 3.3. File Structure

```
.
├── assets/ - Here we go!
│   ├── dist/ - The release static files (CSS, JS, images and fonts) comes here
│   └── src/ - Your favorite place for front end
│       ├── fonts/ - Put your font files here (.ttf, .otf etc)
│       ├── img/ - Put your image files here (.png, .jpg, .jpeg, .gif, .bmp etc)
│       ├── js/ - Here is where child cries and mom won't see
│       │   ├── admin/ - Put admin features - like button events, warnings etc - here
│       │   │   └── admin.js - Dumbledore
│       │   └── theme/ - Here is where you will create magic
│       │       ├── components/ - Keep JS files of components - like header and footer - here
│       │       │   └── blocks/ - Using Gutenberg, you may want to use JS on your blocks. Put those JS files here
│       │       ├── CoreFeatures.js - Initialization of some built-in features of this theme
│       │       └── theme.js - Hogwarts
│       ├── scss/ - Things need to look fine
│       │   ├── admin/ - To not conflict theme's CSS with admin's CSS, put your admin styling here
│       │   │   ├── admin.scss - ( ͡° ͜ʖ ͡°)
│       │   │   ├── _bootstrap.scss - You can filter what Bootstrap features will be available on admin
│       │   │   └── _variables-override.scss - To customize bootstrap without editing original files
│       │   └── theme/ - To not conflict theme's CSS with admin's CSS, put your theme styling here
│       │       ├── components/ - Header, footer, Gutenberg blocks...
│       │       ├── helpers/ - Some global available helpers, like mixins
│       │       ├── _bootstrap.scss - Same as admin. You can define what you want from Bootstrap
│       │       ├── theme.scss - •ᴗ•
│       │       └── _variables-override.scss - Same as admin. You can customize Bootstrap without editing original files
│       └── webfonts/ - Put webfonts (.woff, .woff2 etc) here
├── build/ - For node use only. You can ignore this folder
├── includes/ - All your PHP logic goes here
│   ├── classes/ - Classes (~‾▿‾)~
│   │   ├── callbacks/ - Callback classes for blocks, rest api, shortcodes and whatever you want to callback
│   │   │   ├── callbacks.blocks.php
│   │   │   ├── callbacks.restapi.php
│   │   │   └── callbacks.shortcodes.php
│   │   ├── providers/ - Providers are classes that initialize or declare new functionalities, like post types, taxonomies, Gutenberg blocks, actions, shortcodes...
│   │   │   ├── provider.actions.php
│   │   │   ├── provider.adminassets.php
│   │   │   ├── provider.assets.php
│   │   │   ├── provider.blocks.php
│   │   │   ├── provider.customactions.php
│   │   │   ├── provider.customfilters.php
│   │   │   ├── provider.fields.php
│   │   │   ├── provider.filters.php
│   │   │   ├── provider.optionspages.php
│   │   │   ├── provider.posttypes.php
│   │   │   ├── provider.restapi.php
│   │   │   ├── provider.shortcodes.php
│   │   │   ├── provider.sidebars.php
│   │   │   └── provider.taxonomies.php
│   │   └── class.main.php - Define actions, filters and his bindings to providers methods
│   ├── helpers/ - PHP helpers adds public functions to help your development workflow
│   │   ├── simple_html_dom-1.9.1.php
│   │   └── utils.php
│   ├── plugins/ - Wordpress plugins bundled with this theme
│   │   ├── advanced-custom-fields/
│   │   ├── advanced-custom-fields-font-awesome/
│   │   └── pro-features-for-acf/
│   └── bootstrap.php - Isn't the CSS framework.
├── lang/ - Store your language files (.pot and .mo files) here
├── node_modules/ - A brick made by the heaviest metal in the world
├── templates/ - Template files with HTML code
│   ├── blocks/ - Templates for Gutenberg blocks
│   │   └── container.php
│   ├── partials/ - Template parts
│   │   ├── drawer.php
│   │   ├── loader.php
│   │   ├── site-footer.php
│   │   └── site-header.php
│   ├── shortcodes/ - Templates for shortcodes
│   │   └── example.php
│   ├── full-width-no-title.php - An included page template
│   ├── full-width.php - An included page template
│   ├── no-template.php - An included page template
│   ├── no-title.php - An included page template
├── vendor/ - Composer dependencies lands here
├── .purgecssignore - If you're facing some CSS issue, put the selector here, and the purgecss will keep your selector on final CSS files
├── 404.php - Wordpress native 404 page template file
├── archive.php - Wordpress native archive page template file
├── attachment.php - Wordpress native attachment page template file
├── author.php - Wordpress native author page template file
├── category.php - Wordpress native category template file
├── composer.json - You know what this file is
├── date.php - Wordpress native date archive page template file
├── footer.php - Wordpress native footer template file
├── front-page.php - Wordpress native front page template file
├── functions.php - If you work with Wordpress, you know what this file is
├── gulpfile.js - Gulp configuration file
├── header.php - Wordpress native header template file
├── home.php - Wordpress native blog page template file
├── index.php - Wordpress native default template file
├── LICENSE - The GPL v3
├── package.json - Seriously?
├── page.php - Wordpress native page template file
├── README.md - You're reading this file
├── screenshot.png - The screenshot shown on the "Appearance" page of wp-admin
├── search.php - Wordpress native search results page template file
├── single.php - Wordpress native post template file
├── style.css - Wordpress native stylesheet, with your theme information
├── tag.php - Wordpress native tag page template file
└── taxonomy.php - Wordpress native taxonomy page template file
```

### 3.4. Node scripts

There are some NodeJS scripts, that you can run using ```npm run {script}``` (or ```yarn {script}```).

| Script      | Action      |
| ----------- | ----------- |
| **css**     | Use SASS to build CSS styles, and output them to ```assets/dist/css``` |
| **fonts**   | Copy ```assets/src/fonts``` and ```assets/src/webfonts``` to ```assets/dist/fonts``` and ```assets/dist/webfonts```, resectively |
| **img**     | Use imagemin to optimize all images in ```assets/src/img``` and output them to ```assets/dist/img``` |
| **js**      | Use Babel/babelify and browserify to build ```assets/src/js/admin/admin.js``` and ```assets/src/js/theme/theme.js```, and output them to ```assets/dist/js``` |
| **build**   | Run all scripts that build static assets (```css```, ```fonts, ```img``` and ```js```) |
| **watch**   | Watch all pertinent files that can trigger a "rebuild" |
| **dev**     | Run ```build``` script, then ```watch``` |
| **zip**     | Create a deployable ZIP file, that you can install in Wordpress through *Appearance > Themes* in WP Admin, running the script located at ```build/release.zip``` |
| **dist**    | Run ```build``` script, then ```zip``` |
| **rebrand** | Run the rebrand script, located at ```build/rebrand.js``` |