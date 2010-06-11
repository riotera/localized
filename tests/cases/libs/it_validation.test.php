<?php
/**
 * Italian Localized Validation class test case
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.ItValidation');

/**
 * ItValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class ItValidationTestCase extends CakeTestCase {

/**
 * test the phone method of ItValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(ItValidation::phone('347/1233456'));
		$this->assertFalse(ItValidation::phone('02+343536'));
	}

/**
 * test the postal method of ItValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(ItValidation::postal('10096'));
		$this->assertFalse(ItValidation::postal('1046'));
	}

/**
 * test the Codice Fiscale for Italy
 *
 * @return void
 * @access public
 */
	function testCf() {
		$this->assertTrue(ItValidation::cf('JLTRSS68A41Z114A'));
		$this->assertTrue(ItValidation::cf('RSSMRA50A01F205R'));
		$this->assertTrue(ItValidation::cf('TRVMRA30T31L736B'));
		$this->assertTrue(ItValidation::cf('spsNTN55a01F839q'));
		
		$this->assertFalse(ItValidation::cf('MSSRNL30T31L736B'));
		$this->assertFalse(ItValidation::cf('spsNTN55a01F839r'));
		$this->assertFalse(ItValidation::cf('JLTRSSG8A41Z114A'));
		$this->assertFalse(ItValidation::cf('Fail'));
	}
	
/**
 * test the Codice Fiscale for Italy
 *
 * @return void
 * @access public
 */
	function testIban() {
		$this->assertTrue(ItValidation::iban('IT60Q0123412345000000753XYZ'));
		$this->assertTrue(ItValidation::iban('IT59F0529673970CC0000033409'));
		$this->assertTrue(ItValidation::iban('IT96R0123454321000000012345'));
		$this->assertTrue(ItValidation::iban('IT37S0637071221000011223344'));
		
		$this->assertFalse(ItValidation::iban('IT63Q0123412345000000753XYZ'));
		$this->assertFalse(ItValidation::iban('IT60Q0123412345 000000753XYZ'));
		$this->assertFalse(ItValidation::iban('IT60Q0123412345000000753XYz'));
		$this->assertFalse(ItValidation::iban('IT60Q01234N2345000000753XYz'));
	}
}
?>