<?php
// Call UNL_Common_CollegesTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "UNL_Common_CollegesTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'UNL/Common/Colleges.php';

/**
 * Test class for UNL_Common_Colleges.
 * Generated by PHPUnit_Util_Skeleton on 2007-04-17 at 10:32:07.
 */
class UNL_Common_CollegesTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("UNL_Common_CollegesTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
    }

    /**
     * @todo Implement testGetAllColleges().
     */
    public function testGetAllColleges() {
        // Remove the following line when you implement this test.
        $this->markTestIncomplete(
          "This test has not been implemented yet."
        );
    }
}

// Call UNL_Common_CollegesTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "UNL_Common_CollegesTest::main") {
    UNL_Common_CollegesTest::main();
}
?>
