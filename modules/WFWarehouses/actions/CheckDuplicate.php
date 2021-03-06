<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class WFWarehouses_CheckDuplicate_Action extends Vtiger_Action_Controller
{
    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    public function process(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();
        $fields = $request->get('fields');
        $record = $request->get('record');

        if ($record) {
            $recordModel = Vtiger_Record_Model::getInstanceById($record, $moduleName);
        } else {
            $recordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
        }

        $recordModel->set('fields', $fields);

        // $recordModel->checkDuplicate() true IFF there is a duplicate and not the same record crmid BY agency
        if (!$recordModel->checkDuplicate()) {
            //so NO duplicate exists
            $result = array('success'=>false);
        } else {
            //so at least one duplicate exists -> with same agentid.
            $result = array('success'=>true, 'message'=>vtranslate('LBL_DUPLICATES_EXIST', $moduleName));
        }
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }
}
