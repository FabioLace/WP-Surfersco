# Surfers Co.
![WordPress](https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white)
![Bedrock](https://img.shields.io/badge/bedrock-525DDC?style=for-the-badge)
![Sage](https://img.shields.io/badge/sage-525DDC?style=for-the-badge)
![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)
![SASS](https://img.shields.io/badge/SASS-hotpink.svg?style=for-the-badge&logo=SASS&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

This demo project is developed with [Bedrock](https://roots.io/bedrock/) and [Sage](https://roots.io/bedrock/), two powerful tools for creating advanced WordPress sites. Inspired by the PSD "Surfers Co." by Luis Costa (original available [here](https://shibbythemes.com/psd-freebies/surfersco-psd-template/?utm_source=dribbble)), you are free to use this project but don't take it seriously: it's just a demo.

## Plugins
* Advanced Custom Fields Pro
* Gravity Forms
* WooCommerce
* Yoast SEO

 _In order to use plugins, you have to activate them from CMS after the initial setup. Don't worry: I've written fallback dummy stuffs so you'll see something at least._
 
 _Plugins are installed, updated or removed as `composer` packages from the root folder. You can find the packages at [Wordpress Packagist](https://wpackagist.org/)._ 

## Dependencies
* Material Design Icons
* Popper
* Bootstrap
* jQuery

_From the package.json of the surfersco theme._

## Guide
* After you've cloned the repository, create your .env file and customize it as you please. Take a look to the .env.example as reference. You can find `WP_HOME='http://surfersco.test'`, that's because I use [Valet](https://laravel.com/docs/11.x/valet) as PHP development environment, not XAMPP or MAMPP. And no, I'm not using MacOS but a GNU/Linux distro.
* Create the project table in your database using MySQL directly with your terminal or your favourite client.
* Since we are using Bedrock and Sage, they're quite similar to [Laravel](https://laravel.com/docs/11.x), a famous and powerful PHP framework. Everything is managed with `composer ` and `npm` (or `yarn`).
* Now, you think you can launch `composer install` from your folder, don't you? Well, you should pay attention to the composer.json. Here you can find some Wordpress plugin among other stuff and they require a specific enviromental variable. The URL for the ACF package as a variable inside it with the licence key of the plugin, same as Gravityforms. Now you have 2 options:
    * If you have the licence keys, store them into GF_KEY and ACF_PRO_KEY variables in your .env file.
    * Remove ACF and GravityForms with `composer remove advanced-custom-fields/advanced-custom-fields-pro gravityforms/gravityforms wpackagist-plugin/acf-gravityforms-add-on`
* NOW you can finally launch `composer install`
* Move into the surfersco theme folder with `cd web\app\themes\surfersco` and run these commands:
```sh
composer install
npm install
npm run build
```
* Open the link of your WP_HOME and follow the classic Worpress config procedure.