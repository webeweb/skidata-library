<?php

/*
 * This file is part of the core-library package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Tests\Exception;

use WBW\Library\SkiData\Tests\AbstractTestCase;
use WBW\Library\SkiData\Exception\TooLongDataException;

/**
 * Too long data exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Exception
 */
class TooLongDataExceptionTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $ex = new TooLongDataException("", 0);

        $res = 'The data "" exceeds the length "0" allowed';
        $this->assertEquals($res, $ex->getMessage());
    }
}
