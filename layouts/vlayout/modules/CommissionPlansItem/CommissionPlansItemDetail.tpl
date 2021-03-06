{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/
-->*}
{strip}
{if $IS_ACTIVE_COMMISSIONPLANSITEM}
	{if $COMMISSIONPLANITEMS_LIST && $COMMISSIONPLANITEMS_LIST|@count gt 0}
		{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
		<table class="table table-bordered equalSplit detailview-table">
			<thead>
			<tr>
				<th class="blockHeader" colspan="4">
					<img class="cursorPointer alignMiddle blockToggle {if !($IS_HIDDEN)} hide {/if} "
						 src="{vimage_path('arrowRight.png')}" data-mode="hide" >{* Block-ID workaround *}
					<img class="cursorPointer alignMiddle blockToggle {if ($IS_HIDDEN)} hide {/if}"
						 src="{vimage_path('arrowDown.png')}" data-mode="show" >
					&nbsp;&nbsp;{vtranslate('CommissionPlansItem', 'CommissionPlansItem')}
				</th>
			</tr>
			</thead>
			{foreach key=RECORD_INDEX item=CURRENT_RECORD from=$COMMISSIONPLANITEMS_LIST}
				{assign var=RECORD_COUNT value=$RECORD_INDEX+1}
				<tbody {if $IS_HIDDEN} class="hide" {/if}>
				{assign var=COUNTER value=0}
				<tr class="fieldLabel" colspan="4">
					<td colspan="4" class="blockHeader" style="background-color:#E8E8E8;">
						<span class="{$GUEST_MODULE}Title"><strong>&nbsp;&nbsp;&nbsp;{$CURRENT_RECORD['commissiontype']}</strong></span>
					</td>
				</tr>
				<tr>
					{foreach item=FIELD_MODEL key=FIELD_NAME from=$COMMISSIONPLANITEMS_BLOCK_FIELDS}
					{assign var=CUSTOM_FIELD_NAME value=$FIELD_NAME|cat:"_"|cat:$RECORD_COUNT}
					{assign var=FIELD_MODEL value=$FIELD_MODEL->set('fieldvalue',$CURRENT_RECORD[$FIELD_NAME])}
					{assign var=FIELD_MODEL value=$FIELD_MODEL->set('name',$CUSTOM_FIELD_NAME)}
					{assign var=FIELD_MODEL value=$FIELD_MODEL->set('noncustomname',$FIELD_NAME)}
				{if !$FIELD_MODEL->isViewableInDetailView()}
					{continue}
				{/if}
					{if $FIELD_MODEL->get('uitype') eq "83"}
						{foreach item=tax key=count from=$TAXCLASS_DETAILS}
							{if $tax.check_value eq 1}
							{if $COUNTER eq 2}
							</tr><tr>
							{assign var="COUNTER" value=1}
							{else}
							{assign var="COUNTER" value=$COUNTER+1}
							{/if}
							<td class="fieldLabel {$WIDTHTYPE}">
								<label class='muted pull-right marginRight10px'>{vtranslate($tax.taxlabel, $GUEST_MODULE)}(%)</label>
							</td>
							<td class="fieldValue {$WIDTHTYPE}">
								 <span class="value">
									 {$tax.percentage}
								 </span>
							</td>
							{/if}
						{/foreach}
					{elseif $FIELD_MODEL->get('uitype') eq "69" || $FIELD_MODEL->get('uitype') eq "105"}
						{if $COUNTER neq 0}
							{if $COUNTER eq 2}
							</tr><tr>
							{assign var=COUNTER value=0}
							{/if}
						{/if}
						<td class="fieldLabel {$WIDTHTYPE}"><label class="muted pull-right marginRight10px">{vtranslate($FIELD_MODEL->get('label'),$GUEST_MODULE)}</label></td>
						<td class="fieldValue {$WIDTHTYPE}">
							<div id="imageContainer" width="300" height="200">
								{foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
									{if !empty($IMAGE_INFO.path) && !empty({$IMAGE_INFO.orgname})}
										<img src="{$IMAGE_INFO.path}_{$IMAGE_INFO.orgname}" width="300" height="200">
									{/if}
								{/foreach}
							</div>
						</td>
						{assign var=COUNTER value=$COUNTER+1}
					{else}
						{if $FIELD_MODEL->get('uitype') eq "20" or $FIELD_MODEL->get('uitype') eq "19"}
							{if $COUNTER eq '1'}
							<td class="{$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td></tr><tr>
							{assign var=COUNTER value=0}
							{/if}
						{/if}
						{if $COUNTER eq 2}
							</tr><tr>
							{assign var=COUNTER value=1}
							{else}
							{assign var=COUNTER value=$COUNTER+1}
						{/if}
						<td class="fieldLabel {$WIDTHTYPE}" id="{${$GUEST_MODULE}}_detailView_fieldLabel_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->getName() eq 'description' or $FIELD_MODEL->get('uitype') eq '69'} style='width:8%'{/if}>
							<label class="muted pull-right marginRight10px">
								{vtranslate($FIELD_MODEL->get('label'),$GUEST_MODULE)}
								{if ($FIELD_MODEL->get('uitype') eq '72') && ($FIELD_MODEL->getName() eq 'unit_price')}
									({$BASE_CURRENCY_SYMBOL})
								{/if}
							</label>
						</td>
						<td class="fieldValue {$WIDTHTYPE}" id="{${$GUEST_MODULE}}_detailView_fieldValue_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->get('uitype') eq '19' or $FIELD_MODEL->get('uitype') eq '20'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}>
							 <span class="value" data-field-type="{$FIELD_MODEL->getFieldDataType()}" {if $FIELD_MODEL->get('uitype') eq '19' or $FIELD_MODEL->get('uitype') eq '20' or $FIELD_MODEL->get('uitype') eq '21'} style="white-space:normal;" {/if}>
								{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getDetailViewTemplateName(),${$GUEST_MODULE}) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=${$GUEST_MODULE} RECORD=$RECORD}
							 </span>
						</td>
					{/if}

					{if $COMMISSIONPLANITEMS_BLOCK_FIELDS|@count eq 1 and $FIELD_MODEL->get('uitype') neq "19" and $FIELD_MODEL->get('uitype') neq "20" and $FIELD_MODEL->get('uitype') neq "30" and $FIELD_MODEL->get('name') neq "recurringtype" and $FIELD_MODEL->get('uitype') neq "69" and $FIELD_MODEL->get('uitype') neq "105"}
						<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
					{/if}
					{/foreach}
					{* adding additional column for odd number of fields in a block *}
					{if $COMMISSIONPLANITEMS_BLOCK_FIELDS|@end eq true and $COMMISSIONPLANITEMS_BLOCK_FIELDS|@count neq 1 and $COUNTER eq 1}
						<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
					{/if}
				</tr>
				</tbody>
			{/foreach}
		</table>
	{/if}
	<br>
{/if}
{/strip}
