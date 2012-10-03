<?php

namespace Moneybird;

require_once dirname(__FILE__) . '/../ApiConnector.php';

/**
 * Test class for ApiConnector.
 * Generated by PHPUnit on 2012-01-22 at 16:17:08.
 */
class ApiConnectorTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var ApiConnector
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		
	}

	/**
	 * @covers Moneybird\ApiConnector::autoload
	 */
	public function testAutoload() {
		include ('./config.php');
		if (class_exists('Moneybird\Contact_Array', false)) {
			$this->fail('Class Moneybird\Contact_Array already loaded');
		}
		ApiConnector::autoload('Moneybird\Contact_Array');
		if (!class_exists('Moneybird\Contact_Array', false)) {
			$this->fail('Class Moneybird\Contact_Array failed to load');
		}
	}
	
	/**
	 * @covers Moneybird\ApiConnector::autoload
	 */
	public function testAutoloadNotExistingClass() {
		include ('./config.php');
		ApiConnector::autoload('NotExistingClass');
		ApiConnector::autoload('Moneybird\NotExistingClass');
	}
	
	/**
	 * @covers Moneybird\ApiConnector::getCurrentSession
	 */
	public function testGetCurrentSession() {
		include ('./config.php');
		$transport = getTransport($config);	
		
		$mapper = new XmlMapper();
		$this->object = new ApiConnector($config['clientname'], $transport, $mapper);
		
		$this->assertInstanceOf('Moneybird\CurrentSession', $this->object->getCurrentSession());
	}

	/**
	 * @covers Moneybird\ApiConnector::requestsLeft
	 */
	public function testRequestsLeft() {
		include ('./config.php');
		$transport = getTransport($config);	
		$mapper = new XmlMapper();
		try {
			$this->object = new ApiConnector($config['clientname'], $transport, $mapper);
		} catch (ForBiddenException $e) {
		}
		$this->assertGreaterThan(0, $this->object->requestsLeft());
	}

	/**
	 * @covers Moneybird\ApiConnector::save
	 *
	public function testSave() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}
	
	/**
	 * @covers Moneybird\ApiConnector::save
	 *
	public function testSaveErrors() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers Moneybird\ApiConnector::delete
	 *
	public function testDelete() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers Moneybird\ApiConnector::getPdf
	 *
	public function testGetPdf() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers Moneybird\ApiConnector::getErrorMessages
	 *
	public function testGetErrorMessages() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}
	/**/
}

?>
