<?php
class Step1RegistrationForm  extends BaseRegistrationForm
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
    $this->widgetSchema->setNameFormat('registration[%s]');
    $this->setValidators(array(
      'name'    => new sfValidatorString(array('max_length' => 50)),
      'password' => new sfValidatorString(array('max_length' => 50)),
      'password_again' => new sfValidatorString(array('max_length' => 50)),
      'agreement' => new sfValidatorBoolean(array('required' => true)),
      'not_ill' => new sfValidatorBoolean(array('required' => true)),
    ));
    $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('password', '==', 'password_again',
    array(),
    array('invalid' => 'Passwords must be same')));
  }
}