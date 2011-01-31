<?php
class Step4RegistrationForm  extends BaseRegistrationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword(),
      'password_again' => new sfWidgetFormInputPassword(),
      'agreement' => new sfWidgetFormInputCheckbox(),
      'not_ill' => new sfWidgetFormInputCheckbox(),
      ));   
  }
}