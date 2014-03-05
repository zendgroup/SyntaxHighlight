<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
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
