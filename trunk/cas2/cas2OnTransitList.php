<?php
/**
 * OnTransit.php for plugin cas2
 *
 *
 */
  /* Permissions */
  //if (($RBAC_Response = $RBAC->userCanAccess("PM_CASES"))!=1) return $RBAC_Response;

  /* Includes */
  G::LoadClass('case');
  G::LoadClass('configuration');

  /* GET , POST & $_SESSION Vars */
  $conf = new Configurations();

  $sTypeList = 'to_do';

  $sUIDUserLogged = $_SESSION['USER_LOGGED'];

  /* Menues */
  $G_MAIN_MENU            = 'processmaker';
  $G_SUB_MENU             = 'cas2/menucas2';
  $G_ID_MENU_SELECTED     = 'ID_CAS2';
  $G_ID_SUB_MENU_SELECTED = 'ID_CAS2';

  $oCases = new Cases();
  list($Criteria,$xmlfile) = $oCases->getConditionCasesList( $sTypeList, $sUIDUserLogged);
  $xmlfile = 'cas2/cas2OnTransitList';
  /* Render page */

  //require_once ( 'classes/class.extendGulliver.php' );
  $G_PUBLISH = new Publisher;
  $G_PUBLISH->AddContent( 'propeltable', 'cas2/paged-table', 'cas2/cas2OnTransitList', $Criteria );
  G::RenderPage( "publish" );
