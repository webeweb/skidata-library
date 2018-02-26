<?php

/**
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Tests\Parser;

use DateTime;
use PHPUnit_Framework_TestCase;
use WBW\Library\SkiData\Entity\SkiDataCard;
use WBW\Library\SkiData\Parser\SkiDataCardParser;

/**
 * SkiData card parser test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Parser
 * @final
 */
final class SkiDataCardParserTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the parseEntity() method.
     *
     * @return void
     */
    public function testParseEntity() {

        $obj = new SkiDataCard();
        $obj->setTicketNumber("ticketNumber");
        $obj->setUserNumber(987654321);
        $obj->setArticleNumber(321);
        $obj->setValidFrom(new DateTime("2017-09-20 08:00:00"));
        $obj->setExpires(new DateTime("2017-09-21 08:00:00"));
        $obj->setBlocked(true);
        $obj->setBlockedDate(null);
        $obj->setProductionState(2);
        $obj->setReasonProduction(0);
        $obj->setProductionCounter(3412);
        $obj->setNeutral(false);
        $obj->setRetainTicketEntry(false);
        $obj->setEntryBarrierClosed(true);
        $obj->setExitBarrierClosed(true);
        $obj->setRetainTicketExit(false);
        $obj->setDisplayText(true);
        $obj->setDisplayText1("displayText1");
        $obj->setDisplayText2("displayText2");
        $obj->setPersonnalNo(9876);
        $obj->setResidualValue(123456789012);
        $obj->setSerialNumberKeyCardSwatch("serialNumberKeyCard");
        $obj->setCurrencyResidualValue("3.0");
        $obj->setTicketType(3);
        $obj->setTicketSubType("ticke");
        $obj->setSerialNo("serialNo");
        $obj->setSuspendPeriodFrom(null);
        $obj->setSuspendPeriodUntil(new DateTime("2017-09-22 08:00:00"));
        $obj->setUseValidCarParks(true);
        $obj->setProductionFacilityNumber(1234567);

        $res = '"ticketNumber";987654321;321;20170920;20170921;1;;2;0;3412;0;0;1;1;0;1;"displayText1";"displayText2";9876;123456789012;"serialNumberKeyCard";"3.0";3;"ticke";"serialNo";;20170922;1;1234567';
        $this->assertEquals($res, (new SkiDataCardParser())->parseEntity($obj));
    }

    /**
     * Tests the parseLine() method.
     *
     * @return void
     */
    public function testParseLine() {

        $obj = '"ticketNumber";987654321;321;20170920;20170921;1;;2;0;3412;0;0;1;1;0;1;"displayText1";"displayText2";9876;123456789012;"serialNumberKeyCard";"3.0";3;"ticke";"serialNo";;20170922;1;1234567';

        $res = (new SkiDataCardParser())->parseLine($obj);
        $this->assertEquals("ticketNumber", $res->getTicketNumber());
        $this->assertEquals(987654321, $res->getUserNumber());
        $this->assertEquals(321, $res->getArticleNumber());
        $this->assertEquals(new DateTime("2017-09-20 00:00:00"), $res->getValidFrom());
        $this->assertEquals(new DateTime("2017-09-21 00:00:00"), $res->getExpires());
        $this->assertEquals(true, $res->getBlocked());
        $this->assertEquals(null, $res->getBlockedDate());
        $this->assertEquals(2, $res->getProductionState());
        $this->assertEquals(0, $res->getReasonProduction());
        $this->assertEquals(3412, $res->getProductionCounter());
        $this->assertEquals(false, $res->getNeutral());
        $this->assertEquals(false, $res->getRetainTicketEntry());
        $this->assertEquals(true, $res->getEntryBarrierClosed());
        $this->assertEquals(true, $res->getExitBarrierClosed());
        $this->assertEquals(false, $res->getRetainTicketExit());
        $this->assertEquals(true, $res->getDisplayText());
        $this->assertEquals("displayText1", $res->getDisplayText1());
        $this->assertEquals("displayText2", $res->getDisplayText2());
        $this->assertEquals(9876, $res->getPersonnalNo());
        $this->assertEquals(123456789012, $res->getResidualValue());
        $this->assertEquals("serialNumberKeyCard", $res->getSerialNumberKeyCardSwatch());
        $this->assertEquals("3.0", $res->getCurrencyResidualValue());
        $this->assertEquals(3, $res->getTicketType());
        $this->assertEquals("ticke", $res->getTicketSubType());
        $this->assertEquals("serialNo", $res->getSerialNo());
        $this->assertEquals(null, $res->getSuspendPeriodFrom());
        $this->assertEquals(new DateTime("2017-09-22 00:00:00"), $res->getSuspendPeriodUntil());
        $this->assertEquals(true, $res->getUseValidCarParks());
        $this->assertEquals(1234567, $res->getProductionFacilityNumber());
    }

}
