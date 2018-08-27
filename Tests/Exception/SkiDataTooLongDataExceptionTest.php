<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Tests\Exception;

use PHPUnit_Framework_TestCase;
use WBW\Library\SkiData\Exception\SkiDataTooLongDataException;

/**
 * SkiData too long data exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Exception
 * @final
 */
final class SkiDataTooLongDataExceptionTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $ex = new SkiDataTooLongDataException("", 0);

        $res = "The data \"\" exceeds the length \"0\" allowed";
        $this->assertEquals($res, $ex->getMessage());
    }

}
