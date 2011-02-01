<?php
class Step1RegistrationForm  extends BaseRegistrationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword(),
      'password_again' => new sfWidgetFormInputPassword(),
      'agreement' => new sfWidgetFormInputCheckbox(array('value_attribute_value'=>1)),
      'not_ill' => new sfWidgetFormInputCheckbox(),
      ));
    $this->widgetSchema->setNameFormat('registration[%s]');
    $this->setValidators(array(
      'name'    => new sfValidatorString(array('max_length' => 50)),
      'password' => new sfValidatorString(array('max_length' => 50)),
      'password_again' => new sfValidatorString(array('max_length' => 50)),
      'agreement' => new sfValidatorBoolean(),
    ));
    $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('password', '==', 'password_again'));
  }
}