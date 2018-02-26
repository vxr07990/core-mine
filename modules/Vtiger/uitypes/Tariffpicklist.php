<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Vtiger_Tariffpicklist_UIType extends Vtiger_Base_UIType
{

    /**
     * Function to get the Template name for the current UI Type object
     * @return <String> - Template Name
     */
    public function getTemplateName()
    {
        return 'uitypes/TariffPicklist.tpl';
    }
    
    public function getTariffDisplay($agentId)
    {
        return $this->getDisplayValue($agentId);
    }
    
    /**
     * Function to get the Display Value, for the current field type with given DB Insert Value
     * @param <Object> $value
     * @return <Object>
     */
    public function getDisplayValue($value)
    {
        return self::getDisplayValueStatic($value);
    }
    public static function getDisplayValueStatic($value)
    {
        if ($value == '' || $value == 0) {
            return;
        }
        $interstateTariff = Vtiger_Record_Model::getInstanceById($value, 'TariffManager');
        $localTariff = Vtiger_Record_Model::getInstanceById($value, 'Tariffs');
        $displayValue = $interstateTariff->get('tariffmanagername') ? $interstateTariff->get('tariffmanagername'):$localTariff->get('tariff_name');
        return $displayValue;
    }
}