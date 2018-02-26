<?php
class WFOrders_Detail_View extends Vtiger_Detail_View
{
    function process(Vtiger_Request $request)
    {
        $viewer = $this->getViewer($request);
        $singles = ['wforder_number'];
        $viewer->assign('SINGLE_FIELDS',$singles);
        parent::process($request); // TODO: Change the autogenerated stub
    }
}