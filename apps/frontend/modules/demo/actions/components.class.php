<?php
require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/actions/components.class.php');
class demoComponents extends sfGuardAuthComponents
{
  public function executeSignin_form()
  {
//    if(!$this->getContext()->getRequest()->isMethod('post'))
     {
        $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
        $this->form = new $class();
    }
    $request = $this->getContext()->getRequest();
    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('signin'));
    }
  }
}