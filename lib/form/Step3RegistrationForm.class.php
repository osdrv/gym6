<?php
class Step3RegistrationForm  extends BaseRegistrationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'length' => new sfWidgetFormInputCheckbox(),
      ));
  }
}