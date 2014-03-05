<?php
/**
 * ZEND GROUP
 *
 * @name        Module.php
 * @category
 * @package     SyntaxHighlight
 * @subpackage
 * @author      Thuy Dinh Xuan <thuydx@zendgroup.vn>
 * @link        http://zendgroup.vn
 * @copyright   Copyright (c) 2012-2013 ZEND GROUP. All rights reserved (http://www.zendgroup.vn)
 * @license     http://zendgroup.vn/license/
 * @version     $0.0.1$
 * Mar 6, 2014
 *
 * LICENSE
 *
 * This source file is copyrighted by ZEND GROUP, full details in LICENSE.txt.
 * It is also available through the Internet at this URL:
 * http://zendgroup.vn/license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the Internet, please send an email
 * to license@zendgroup.vn so we can send you a copy immediately.
 *
 */

namespace SyntaxHighlight;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use SyntaxHighlight\GeShi;
use Zend\View\Helper\AbstractHelper;

class Module extends AbstractHelper
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function getViewHelperConfig()
    {
    	return array('services' => array('highlight' => $this));
    }

    public function __invoke($source = null, $language = null, $path = null)
    {
        //echo '<pre>'; var_dump($source,$language,$path); die(' debug: ');
    	require_once __DIR__ . '/src/SyntaxHighlight/geshi.php';
    	$hightLight = new GeShi();

    	$hightLight->set_source($source);
    	$hightLight->set_language($language);
        $hightLight->enable_line_numbers(true);
        $hightLight->set_numbers_highlighting(true);
        $hightLight->set_methods_highlighting(true);
        $hightLight->enable_multiline_span(true);
        $hightLight->enable_inner_code_block(true);
        $hightLight->enable_highlighting(true);


    	return $hightLight->parse_code();
    }

}
