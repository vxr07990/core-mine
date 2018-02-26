<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Settings_EmailTemplates_Record_Model extends Settings_Vtiger_Record_Model
{
    public function getId()
    {
        return $this->get('templateid');
    }

    public function getName()
    {
        return $this->get('templatename');
    }

    public static function getInstance()
    {
        return new self();
    }
}