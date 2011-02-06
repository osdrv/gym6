<?php
require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');
class sfGuardAuthActions extends BasesfGuardAuthActions
{
    public function executePassword($request)
    {
        return $this->renderText('Here is a password reminder.');
    }
    public function executeSignin($request)
    {
        $this->setTemplate(sfConfig::get('sf_app_module_dir').DIRECTORY_SEPARATOR.'demo/templates/index');//TODO
        parent::executeSignin($request);
    }

}