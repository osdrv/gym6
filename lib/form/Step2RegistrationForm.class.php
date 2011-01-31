<?php
class Step2RegistrationForm  extends BaseRegistrationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'reminder' => new sfWidgetFormInputCheckbox(),
      'email' => new sfWidgetFormInputText(),
      'phone' => new sfWidgetFormInputText(),
      'post2tw' => new sfWidgetFormInputCheckbox(),
      'post2fb' => new sfWidgetFormInputCheckbox(),
      ));
  }
}