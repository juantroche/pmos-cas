<?php
/**
 * class.cas2.php
 *  
 */

G::LoadClass ( "wsBase" );   

class cas2Class extends PMPlugin  {

    function __construct (  ) {
        set_include_path(
            PATH_PLUGINS . 'cas2' . PATH_SEPARATOR .
            get_include_path()
        );
    }

    function setup()
    {
    }

    function metodillo()
    {
        $sSQL = "SELECT * FROM PM_PARAMETERS WHERE PRM_ID = 'CAS_URL' ";
        $aResSQL = executeQuery($sSQL);
        if ( count($aResSQL) ) {
            $sURL = $aResSQL[1]['PRM_VALUE'];
            $sURI = $aResSQL[1]['PRM_VALUE_2'];

            $res = false;
            $RBAC = RBAC::getSingleton();
            $RBAC->initRBAC();

            require_once 'CAS-1.2.2/CAS.php';
            phpCAS::client(CAS_VERSION_2_0, $sURL, 443, $sURI, false);
            phpCAS::setNoCasServerValidation();
            phpCAS::forceAuthentication();

            if ( phpCAS::isAuthenticated() == true ) {
                $sCasUser = phpCAS::getUser();
                $sSQL = "SELECT USR_UID FROM USERS WHERE USR_USERNAME = '$sCasUser' ";
                $aResSQL = executeQuery($sSQL);
                if ( count($aResSQL) ) {
                    $nUserId = $aResSQL[1]['USR_UID'];
                    $RBAC->singleSignOn = true;
                    $RBAC->userObj->fields['USR_UID'] = $nUserId;
                    $RBAC->userObj->fields['USR_USERNAME'] = $sCasUser;

                    $res = true;
                } else {
                    $res = false;
                }
            } else {
                $res = false;
            }
        } else  {
            $res = false;
        }
        return $res;
    }

}

