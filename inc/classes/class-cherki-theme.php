<?php

/**
 *  Bootstrap the theme
 *  @package CherkiDev
 */

 namespace CHERKI_THEME\Inc;

use CHERKI_THEME\Inc\Traits\Singleton;

class CHERKI_THEME{
     use Singleton;

     protected function __construct()
     {
         //wp_die('hello and welcome');

         // load class
          $this->set_hooks();
     }

     protected function set_hooks(){
         // actions and filters

     }
 }