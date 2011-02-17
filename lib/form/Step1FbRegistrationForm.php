<?php
class Step1FbRegistrationForm  extends sfGuardUserForm
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
      'fbname' => new sfWidgetFormInputHidden(),
      'fbid' => new sfWidgetFormInputHidden(),
      'agreement' => new sfWidgetFormInputCheckbox(),
      'not_ill' => new sfWidgetFormInputCheckbox(),
      ));
    $this->widgetSchema->setNameFormat('registration[%s]');
    $this->setValidators(array(
      'fbname' => new sfValidatorString(array('max_length' => 255)),
      'fbid' => new sfValidatorString(array('max_length' => 255)),
      'agreement' => new sfValidatorBoolean(array('required' => true)),
      'not_ill' => new sfValidatorBoolean(array('required' => true)),
    ));
  }
}