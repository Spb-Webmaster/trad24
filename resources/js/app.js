/* npm install*/
/* composer install*/
/* npm i sass*/
/* https://fontsource.org/docs/getting-started/variable */
/* https://fancyapps.com/fancybox/getting-started/ установка fancybox5  npm install --save @fancyapps/ui */
/* composer require rap2hpoutre/fast-excel установка fast-excel*/
/* composer require intervention/image (установка intervention) + composer require intervention/image-laravel */
/* composer require spatie/laravel-honeypot - анти спам (@honeypot) https://codebrisk.com/blog/laravel-honeypot-prevent-spam-submitted-through-forms
composer require barryvdh/laravel-debugbar --dev
* php artisan lang:publish
composer require "maatwebsite/excel:^3.1"
npm i imask
npm i slick
npm i jquery
очереди - https://phpqa.ru/post/ocheredi-v-laravel
* */

//import './bootstrap';
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// IMask to add input masks support
import IMask from 'imask';
window.IMask = IMask;

//import 'imagesLoaded/imagesLoaded'; // Пока удалил.

import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import './ckeditor5/ckeditor5';
import 'slick-carousel/slick/slick';
import './ui/jquery-ui.min';
import './chosen/chosen.jquery';


import './script';
import './fancybox';

