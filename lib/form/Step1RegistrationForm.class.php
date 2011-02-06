<?php
class Step1RegistrationForm  extends sfGuardUserForm
{
  public function configure()
  {
        unset(
            $this['is_active'],
            $this['is_super_admin'],
            $this['updated_at'],
            $this['groups_list'],
            $this['permissions_list'],
            $this['last_login'],
            $this['created_at'],
            $this['salt'],
            $this['algorithm']
            );

    $this->setWidgets(array(
      'username' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword(),
      'password_again' => new sfWidgetFormInputPassword(),
      'agreement' => new sfWidgetFormInputCheckbox(),
      'not_ill' => new sfWidgetFormInputCheckbox(),
      ));
    $this->widgetSchema->setNameFormat('registration[%s]');
    $this->setValidators(array(
      'username'    => new sfValidatorString(array('max_length' => 50)),
      'password' => new sfValidatorString(array('max_length' => 50)),
      'password_again' => new sfValidatorString(array('max_length' => 50)),
      'agreement' => new sfValidatorBoolean(array('required' => true)),
      'not_ill' => new sfValidatorBoolean(array('required' => true)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorSchemaCompare('password', '==', 'password_again',
            array(),
            array('invalid' => 'Passwords must be same')),
        new sfValidatorDoctrineUnique(
            array('model' => 'sfGuardUser', 'column' => array('username')),
            array('invalid'=>'Ooops, this user name is not avaible')),
      ))
    );
  }
}