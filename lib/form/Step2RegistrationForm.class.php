<?php
class Step2RegistrationForm  extends BaseRegistrationForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'reminder' => new sfWidgetFormInputCheckbox(array('default' => true)),
      'email_address' => new sfWidgetFormInputText(),
      'phone' => new sfWidgetFormInputText(),
      'post2tw' => new sfWidgetFormInputCheckbox(),
      'post2fb' => new sfWidgetFormInputCheckbox(),
      ));
    $this->widgetSchema->setNameFormat('registration[%s]');
    $this->setValidators(array(
      'email_address'    => new sfValidatorEmail(),
      'phone' => new sfValidatorBoolean(array('required' => false)),
      'reminder' => new sfValidatorPass(),
      'post2tw' => new sfValidatorPass(),
      'post2fb' => new sfValidatorPass(),
    ));

    $this->validatorSchema->setPostValidator
        (
        new sfValidatorDoctrineUnique
        (
            array('model' => 'sfGuardUser', 'column' => array('email_address')),
            array('invalid'=>'Ooops, already know this email')
        )
        );
  }
  public function getModelName()
  {
    return 'sfGuardUser';
  }
}