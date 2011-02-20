<?php

require_once '/home/smallkaa/projects/symfony-1.4.6/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      if (function_exists('date_default_timezone_set'))
      {
        date_default_timezone_set(@date_default_timezone_get());
      }
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfFacebookConnectPlugin');
  }
}
