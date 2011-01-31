<?php
abstract class BaseRegistrationForm extends BaseForm
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
    ));

//    $this->setValidators(array(
//      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
//    ));

    parent::setup();
  }

}
