<?php
if (function_exists("call_ms_function_ver")) {
    $version = 1;
    if (call_ms_function_ver(__FILE__, $version)) {
        //already ran
        print "\e[33mSKIPPING: " . __FILE__ . "<br />\n\e[0m";
        return;
    }
}
print "\e[32mRUNNING: " . __FILE__ . "<br />\n\e[0m";
require_once 'include/utils/utils.php';
require_once 'include/utils/CommonUtils.php';

require_once 'includes/Loader.php';
vimport('includes.runtime.EntryPoint');
$Vtiger_Utils_Log = true;

$module = Vtiger_Module_Model::getInstance('WFInventory');

foreach(['status','condition','comment'] as $fieldname) {
  $field = Vtiger_Field::getInstance($fieldname, $module);
  if($field) {
    Vtiger_Utils::ExecuteQuery("UPDATE `vtiger_field` SET presence = 1 WHERE `fieldid` = $field->id");
  }
}

$create = [
  'WFInventory' => [
    'LBL_WFINVENTORY_INFORMATION' => [
      'LBL_WFINVENTORY_ORDER' => [
        'name' => 'order_id',
        'table' => 'vtiger_wfinventory',
        'column' => 'order_id',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 10,
        'typeofdata' => 'V~M',
        'sequence' => 2,
        'setRelatedModules' => ['Orders'],
      ],
      'LBL_WFINVENTORY_INVENTORY_NUMBER' => [
        'name' => 'inventory_number',
        'table' => 'vtiger_wfinventory',
        'column' => 'inventory_number',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~M',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_TAG_COLOR' => [
        'name' => 'tag_color',
        'table' => 'vtiger_wfinventory',
        'column' => 'tag_color',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 16,
        'typeofdata' => 'V~M',
        'sequence' => 4,
        'setPicklistValues' => ['Blue','Green','Multi','None','Orange','Red','White','Yellow'],
      ],
      'LBL_WFINVENTORY_ARTICLE' => [
        'name' => 'article',
        'table' => 'vtiger_wfinventory',
        'column' => 'article',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 10,
        'typeofdata' => 'V~M',
        'sequence' => 5,
        'setRelatedModules' => ['WFArticles'],
      ],
      'LBL_WFINVENTORY_CATEGORY' => [
        'name' => 'category',
        'table' => 'vtiger_wfinventory',
        'column' => 'category',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 2,
        'typeofdata' => 'V~M',
        'sequence' => 6,
      ],
      'LBL_WFINVENTORY_TYPE' => [
        'name' => 'type',
        'table' => 'vtiger_wfinventory',
        'column' => 'type',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 2,
        'typeofdata' => 'V~M',
        'sequence' => 7,
      ],
      'LBL_WFINVENTORY_DESCRIPTION' => [
        'name' => 'description',
        'table' => 'vtiger_crmentity',
        'column' => 'description',
        'columntype' => 'TEXT',
        'uitype' => 19,
        'typeofdata' => 'V~O',
        'sequence' => 8,
      ],
      'LBL_WFINVENTORY_READER_DESCRIPTION' => [
        'name' => 'reader_description',
        'table' => 'vtiger_wfinventory',
        'column' => 'reader_description',
        'columntype' => 'TEXT',
        'uitype' => 19,
        'typeofdata' => 'V~O',
        'sequence' => 9,
      ],
      'LBL_WFINVENTORY_LAST_DATE_IN' => [
        'name' => 'date_in',
        'table' => 'vtiger_wfinventory',
        'column' => 'date_in',
        'columntype' => 'DATE',
        'uitype' => 5,
        'typeofdata' => 'D~O',
        'sequence' => 10,
      ],
      'LBL_WFINVENTORY_LAST_DATE_OUT' => [
        'name' => 'date_out',
        'table' => 'vtiger_wfinventory',
        'column' => 'date_out',
        'columntype' => 'DATE',
        'uitype' => 5,
        'typeofdata' => 'D~O',
        'sequence' => 11,
      ],
      'LBL_WFINVENTORY_AGENTID' => [
        'name' => 'agentid',
        'table' => 'vtiger_crmentity',
        'column' => 'agentid',
        'uitype' => 1002,
        'typeofdata' => 'I~M',
        'columntype' => 'INT(11)',
        'sequence' => 11,
      ],
    ],
    'LBL_WFINVENTORY_DETAILS' => [
      'LBL_WFINVENTORY_MANUFACTURER' => [
        'name' => 'manufacturer',
        'table' => 'vtiger_wfinventory',
        'column' => 'manufacturer',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_MANUFACTURER_PART_NUM' => [
        'name' => 'manufacturer_part_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'manufacturer_part_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_VENDOR' => [
        'name' => 'vendor',
        'table' => 'vtiger_wfinventory',
        'column' => 'vendor',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_VENDOR_PART_NUM' => [
        'name' => 'vendor_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'vendor_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
      ],
      'LBL_WFINVENTORY_PART_NUM' => [
        'name' => 'part_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'part_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 5,
      ],
      'LBL_WFINVENTORY_SERIAL_NUM' => [
        'name' => 'serial_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'serial_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 6,
      ],
      'LBL_WFINVENTORY_SYSTEM_NUM' => [
        'name' => 'system_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'system_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 7,
      ],
      'LBL_WFINVENTORY_SECONDARY_NUM' => [
        'name' => 'secondary_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'secondary_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 8,
      ],
      'LBL_WFINVENTORY_MODEL_NUM' => [
        'name' => 'model_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'model_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 9,
      ],
      'LBL_WFINVENTORY_BILL_OF_LADING' => [
        'name' => 'bill_of_lading',
        'table' => 'vtiger_wfinventory',
        'column' => 'bill_of_lading',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 10,
      ],
      'LBL_WFINVENTORY_RECEIVING_NUM' => [
        'name' => 'receiving_num',
        'table' => 'vtiger_wfinventory',
        'column' => 'receiving_num',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 12,
      ],
      'LBL_WFINVENTORY_WFCONDITIONS' => [
        'name' => 'wfcondition',
        'table' => 'vtiger_wfinventory',
        'column' => 'wfcondition',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 10,
        'typeofdata' => 'V~O',
        'sequence' => 13,
        'setRelatedModules' => ['WFConditions'],
      ],
      'LBL_WFINVENTORY_WFSTATUS' => [
        'name' => 'wfstatus',
        'table' => 'vtiger_wfinventory',
        'column' => 'wfstatus',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 10,
        'typeofdata' => 'V~O',
        'sequence' => 14,
        'setRelatedModules' => ['WFStatus'],
      ],
    ],
    'LBL_WFINVENTORY_UNITS_OF_MEASURE' => [
      'LBL_WFINVENTORY_WIDTH' => [
        'name' => 'width',
        'table' => 'vtiger_wfinventory',
        'column' => 'width',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_DEPTH' => [
        'name' => 'depth',
        'table' => 'vtiger_wfinventory',
        'column' => 'depth',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_HEIGHT' => [
        'name' => 'height',
        'table' => 'vtiger_wfinventory',
        'column' => 'height',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_SQ_FT' => [
        'name' => 'sq_ft',
        'table' => 'vtiger_wfinventory',
        'column' => 'sq_ft',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 4,
      ],
      'LBL_WFINVENTORY_CU_FT' => [
        'name' => 'cu_ft',
        'table' => 'vtiger_wfinventory',
        'column' => 'cu_ft',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 5,
      ],
      'LBL_WFINVENTORY_WEIGHT' => [
        'name' => 'weight',
        'table' => 'vtiger_wfinventory',
        'column' => 'weight',
        'columntype' => 'INT(11)',
        'uitype' => 1,
        'typeofdata' => 'N~O~MIN=0',
        'sequence' => 6,
      ],
    ],
    'LBL_WFINVENTORY_INVENTORY_ATTRIBUTES' => [
      'LBL_WFINVENTORY_ATTRIBUTE_1' => [
        'name' => 'attribute_1',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_1',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'columntype' => 'VARCHAR(255)',
        'sequence' => 1,
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_2' => [
        'name' => 'attribute_2',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_2',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_3' => [
        'name' => 'attribute_3',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_3',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_4' => [
        'name' => 'attribute_4',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_4',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_5' => [
        'name' => 'attribute_5',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_5',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 5,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_6' => [
        'name' => 'attribute_6',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_6',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 6,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_7' => [
        'name' => 'attribute_7',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_7',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 7,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
      'LBL_WFINVENTORY_ATTRIBUTE_8' => [
        'name' => 'attribute_8',
        'table' => 'vtiger_wfinventory',
        'column' => 'attribute_8',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 8,
        'columntype' => 'VARCHAR(255)',
        'summaryfield' => 1,
        'displaytype' => 1,
      ],
    ],
    'LBL_WFINVENTORY_PHYSICAL_LOCATION' => [
      'LBL_WFINVENTORY_BUILDING' => [
        'name' => 'building',
        'table' => 'vtiger_wfinventory',
        'column' => 'building',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_DEPARTMENT' => [
        'name' => 'department',
        'table' => 'vtiger_wfinventory',
        'column' => 'department',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_FLOOR' => [
        'name' => 'floor',
        'table' => 'vtiger_wfinventory',
        'column' => 'floor',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_OFFICE' => [
        'name' => 'office',
        'table' => 'vtiger_wfinventory',
        'column' => 'office',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
      ],
      'LBL_WFINVENTORY_ROOM' => [
        'name' => 'room',
        'table' => 'vtiger_wfinventory',
        'column' => 'room',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 5,
      ],
      'LBL_WFINVENTORY_SITE' => [
        'name' => 'site',
        'table' => 'vtiger_wfinventory',
        'column' => 'site',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 6,
      ],
      'LBL_WFINVENTORY_STORE' => [
        'name' => 'store',
        'table' => 'vtiger_wfinventory',
        'column' => 'store',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 7,
      ],
    ],
    'LBL_WFINVENTORY_FINISH_DETAILS' => [
      'LBL_WFINVENTORY_COLOR' => [
        'name' => 'color',
        'table' => 'vtiger_wfinventory',
        'column' => 'color',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_COLOR_CODE' => [
        'name' => 'color_code',
        'table' => 'vtiger_wfinventory',
        'column' => 'color_code',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_FABRIC' => [
        'name' => 'fabric',
        'table' => 'vtiger_wfinventory',
        'column' => 'fabric',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_FABRIC_COLOR' => [
        'name' => 'fabric_color',
        'table' => 'vtiger_wfinventory',
        'column' => 'fabric_color',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
      ],
      'LBL_WFINVENTORY_FINISH' => [
        'name' => 'finish',
        'table' => 'vtiger_wfinventory',
        'column' => 'finish',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 5,
      ],
      'LBL_WFINVENTORY_FINISH_COLOR' => [
        'name' => 'finish_color',
        'table' => 'vtiger_wfinventory',
        'column' => 'finish_color',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 6,
      ],
      'LBL_WFINVENTORY_MATERIAL' => [
        'name' => 'material',
        'table' => 'vtiger_wfinventory',
        'column' => 'material',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 7,
      ],
      'LBL_WFINVENTORY_MATERIAL_COLOR' => [
        'name' => 'material_color',
        'table' => 'vtiger_wfinventory',
        'column' => 'material_color',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 8,
      ],
      'LBL_WFINVENTORY_LOCKED' => [
        'name' => 'wfinventory_locked',
        'table' => 'vtiger_wfinventory',
        'column' => 'wfinventory_locked',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 16,
        'typeofdata' => 'V~O',
        'sequence' => 9,
        'setPicklistValues' => ['Yes','No'],
      ],
    ],
    'LBL_WFINVENTORY_PURCHASE_DETAILS' => [
      'LBL_WFINVENTORY_DESIGNER' => [
        'name' => 'designer',
        'table' => 'vtiger_wfinventory',
        'column' => 'designer',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_END_USER' => [
        'name' => 'end_user',
        'table' => 'vtiger_wfinventory',
        'column' => 'end_user',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_PRICE' => [
        'name' => 'price',
        'table' => 'vtiger_wfinventory',
        'column' => 'price',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_YEAR' => [
        'name' => 'year',
        'table' => 'vtiger_wfinventory',
        'column' => 'year',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
      ],
      'LBL_WFINVENTORY_DESTINATION' => [
        'name' => 'destination',
        'table' => 'vtiger_wfinventory',
        'column' => 'destination',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 5,
      ],
    ],
    'LBL_WFINVENTORY_WAREHOUSE_DETAILS' => [
      'LBL_WFINVENTORY_INSTALLED_BY' => [
        'name' => 'installed_by',
        'table' => 'vtiger_wfinventory',
        'column' => 'installed_by',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 1,
      ],
      'LBL_WFINVENTORY_INSPECTED_BY' => [
        'name' => 'inspected_by',
        'table' => 'vtiger_wfinventory',
        'column' => 'inspected_by',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 2,
      ],
      'LBL_WFINVENTORY_ASSEMBLED_BY' => [
        'name' => 'assembled_by',
        'table' => 'vtiger_wfinventory',
        'column' => 'assembled_by',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 3,
      ],
      'LBL_WFINVENTORY_VAULTED_BY' => [
        'name' => 'vaulted_by',
        'table' => 'vtiger_wfinventory',
        'column' => 'vaulted_by',
        'columntype' => 'VARCHAR(100)',
        'uitype' => 1,
        'typeofdata' => 'V~O',
        'sequence' => 4,
      ],
    ],
  ],
];

multicreate($create);

$module = Vtiger_Module_Model::getInstance('WFInventory');

$update = [
  'LBL_WFINVENTORY_INFORMATION' => [
    'wfaccount' => 1,
    'agentid' => 12,
    'assigned_user_id' => 13,
  ],
  'LBL_WFINVENTORY_DETAILS' => [
    'costcenter' => 11,
  ],
];
foreach($update as $blockLabel=>$fields) {
  $block = Vtiger_Block::getInstance($blockLabel,$module);
  foreach($fields as $fieldname=>$seq) {
    $field = Vtiger_Field::getInstance($fieldname, $module);
    Vtiger_Utils::ExecuteQuery("UPDATE `vtiger_field` SET `sequence`=$seq, `block`=$block->id WHERE `fieldid`=$field->id;");
  }
}

$blocks = [
  'LBL_WFINVENTORY_INFORMATION' => 1,
  'LBL_WFINVENTORY_DETAILS' => 2,
  'LBL_WFINVENTORY_UNITS_OF_MEASURE' => 3,
  'LBL_WFINVENTORY_INVENTORY_ATTRIBUTES' => 4,
  'LBL_WFINVENTORY_PHYSICAL_LOCATION' => 6,
  'LBL_WFINVENTORY_FINISH_DETAILS' => 7,
  'LBL_WFINVENTORY_PURCHASE_DETAILS' => 8,
  'LBL_WFINVENTORY_WAREHOUSE_DETAILS' => 9,
];

foreach($blocks as $blockLabel=>$seq) {
  $block = Vtiger_Block::getInstance($blockLabel,$module);
  $block->updateSequence($seq);
}