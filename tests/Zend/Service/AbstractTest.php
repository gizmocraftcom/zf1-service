<?php
/**
 * Zend Framework
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
 * @package    Zend_Service
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * @category   Zend
 * @package    Zend_Service
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
#[Group('Zend_Service')]
class Zend_Service_AbstractTest extends TestCase
{
    public function testGetHttpClientCreatesDefaultClient()
    {
        $client = Zend_Service_Abstract::getHttpClient();
        $this->assertInstanceOf('Zend_Http_Client', $client);
        $this->assertSame($client, Zend_Service_Abstract::getHttpClient());
    }

    public function testSetHttpClientReplacesSharedClient()
    {
        $client = new Zend_Http_Client();
        Zend_Service_Abstract::setHttpClient($client);
        $this->assertSame($client, Zend_Service_Abstract::getHttpClient());
    }

    public function testServiceExceptionIsZendException()
    {
        $this->assertInstanceOf('Zend_Exception', new Zend_Service_Exception('x'));
    }
}
