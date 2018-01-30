<?php

/**
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * © 2017 All rights reserved.
 */

namespace WBW\Library\SkiData\Tests\Parser;

use DateTime;
use Exception;
use PHPUnit_Framework_TestCase;
use WBW\Library\SkiData\Entity\SkiDataStartRecordFormatEntity;
use WBW\Library\SkiData\Exception\SkiDataTooLongDataException;
use WBW\Library\SkiData\Parser\SkiDataStartRecordFormatParser;

/**
 * SkiData start record format parser test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Parser
 * @final
 */
final class SkiDataStartRecordFormatParserTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests teh __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new SkiDataStartRecordFormatParser();

        $this->assertEquals(null, $obj->getStartRecordFormat());

        $res = new SkiDataStartRecordFormatEntity();
        $obj->setStartRecordFormat($res);
        $this->assertEquals($res, $obj->getStartRecordFormat());
    }

    /**
     * Tests the parseEntity() method.
     *
     * @return void
     */
    public function testParseEntity() {

        $obj = new SkiDataStartRecordFormatEntity();
        $obj->setVersionRecordStructure(190000);
        $obj->setFacilityNumber(202747);
        $obj->setDateFile(new DateTime("2017-09-21 16:10:00"));
        $obj->setNumberRecords(18);
        $obj->setCurrency("EUR");

        $res = '190000;0202747;20170921;00018;"EUR"';
        $this->assertEquals($res, (new SkiDataStartRecordFormatParser())->parseEntity($obj));

        try {
            $obj->setVersionRecordStructure(2000000);
            (new SkiDataStartRecordFormatParser())->parseEntity($obj);
        } catch (Exception $ex) {

            $this->assertInstanceOf(SkiDataTooLongDataException::class, $ex);
            $this->assertEquals("The data \"2000000\" exceeds the length \"6\" allowed", $ex->getMessage());
        }

        try {
            $obj->setVersionRecordStructure(190000);
            $obj->setCurrency("Exception");
            (new SkiDataStartRecordFormatParser())->parseEntity($obj);
        } catch (Exception $ex) {

            $this->assertInstanceOf(SkiDataTooLongDataException::class, $ex);
            $this->assertEquals("The data \"Exception\" exceeds the length \"6\" allowed", $ex->getMessage());
        }
    }

    /**
     * Tests the parseLine() method.
     *
     * @return void
     */
    public function testParseLine() {

        $res = '190000;0202747;20170921;00018;"EUR"';

        $obj = (new SkiDataStartRecordFormatParser())->parseLine($res);
        $this->assertEquals(190000, $obj->getVersionRecordStructure());
        $this->assertEquals(202747, $obj->getFacilityNumber());
        $this->assertEquals(new DateTime("2017-09-21 00:00:00"), $obj->getDateFile());
        $this->assertEquals(18, $obj->getNumberRecords());
        $this->assertEquals("EUR", $obj->getCurrency());
    }

}
