<?php

/**
 * https://github.com/prasad83/Zend-Gdata-Contacts
 * @author prasad
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage Contacts
 */
require_once 'Zend/Gdata/Feed.php';

class Zend_Gdata_Contacts_ListFeed extends Zend_Gdata_Feed
{
    protected $_entryClassName = 'Zend_Gdata_Contacts_ListEntry';
    
    protected $_feedClassName = 'Zend_Gdata_Contacts_ListFeed';
    
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(Zend_Gdata_Contacts::$namespaces);
        parent::__construct($element);
    }
}
