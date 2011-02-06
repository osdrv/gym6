<?php

/**
 * workout actions.
 *
 * @package    gym6
 * @subpackage workout
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class workoutActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('workout', 'current');
  }
  public function executeCurrent(sfWebRequest $request)
  {

  }
  public function executeNomoney(sfWebRequest $request)
  {

  }
  public function executeEndoftrial(sfWebRequest $request)
  {

  }

}
