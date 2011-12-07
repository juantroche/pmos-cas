<?php
G::LoadClass('plugin');

class cas2Plugin extends PMPlugin
{
  function cas2Plugin($sNamespace, $sFilename = null) {
       $res = parent::PMPlugin($sNamespace, $sFilename);
       $this->sFriendlyName = 'CAS Plugin';
       $this->sDescription  = 'CAS Plugin';
       $this->sPluginFolder = 'cas2';
       $this->sSetupPage    = 'cas2';
       $this->iVersion      = 0.06;
       //$this->iPMVersion    = 2425;
       $this->aWorkspaces   = null;
       //$this->aWorkspaces = array('os');

       //SSO CAS
       define("PM_SINGLE_SIGN_ON", "cas2");
       $this->registerTrigger( PM_SINGLE_SIGN_ON, "metodillo" );

       return $res;
  }

  function setup() {
    //$this->registerMenu( 'processmaker', 'menucas2OnTransit.php');
    $this->registerPmFunction();
  }

  function install() {
  }
}

$oPluginRegistry =& PMPluginRegistry::getSingleton();
$oPluginRegistry->registerPlugin('cas2', __FILE__);
