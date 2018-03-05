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
use PHPUnit_Framework_TestCase;
use WBW\Library\SkiData\Entity\SkiDataUser;
use WBW\Library\SkiData\Parser\SkiDataUserParser;

/**
 * SkidData user parser test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Parser
 * @final
 */
final class SkidDataUserParserTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the parseEntity() method.
     *
     * @return void
     */
    public function testParseEntity() {

        $obj = new SkiDataUser();
        $obj->setUserNumber(987654321);
        $obj->setCustomerNumber(123456789);
        $obj->setTitle("title");
        $obj->setSurname("surname");
        $obj->setFirstname("firstname");
        $obj->setDateBirth(new DateTime("2017-09-20 11:50:00"));
        $obj->setParkingSpace("12345");
        $obj->setRemarks("remarks");
        $obj->setDatetimeLastModification(new DateTime("2017-09-21 11:55:00"));
        $obj->setDeletedRecord(false);
        $obj->setIdentificationNumber("identificationNumber");
        $obj->setCheckLicensePlate(false);
        $obj->setPassageLicensePlatePermitted(true);
        $obj->setExcessTimesCreditCard(true);
        $obj->setCreditCardNumber("creditCardNumber");
        $obj->setExpiryDate(null);
        $obj->setRemarks2("remarks2");
        $obj->setRemarks3("remarks3");
        $obj->setDivision("division");
        $obj->setEmail("email");
        $obj->setGroupCounting(true);
        $obj->setETicketTypeP(1);
        $obj->setETicketEmailTelephone("eTicketEmailTelephone");
        $obj->setETicketAuthentication(1);
        $obj->setETicketServiceTyp(3);
        $obj->setETicketServiceArt(2);

        $res = '987654321;123456789;"title";"surname";"firstname";20170920;"12345";"remarks";20170921 115500;0;"identificationNumber";0;1;1;"creditCardNumber";;"remarks2";"remarks3";"division";"email";1;1;"eTicketEmailTelephone";1;3;2';
        $this->assertEquals($res, (new SkiDataUserParser())->parseEntity($obj));
    }

    /**
     * Tests the parseLine() method.
     *
     * @retrun void
     */
    public function testParseLine() {

        $obj = '987654321;123456789;"title";"surname";"firstname";20170920;"12345";"remarks";20170921 115500;0;"identificationNumber";0;1;1;"creditCardNumber";;"remarks2";"remarks3";"division";"email";1;1;"eTicketEmailTelephone";1;3;2';

        $res = (new SkiDataUserParser())->parseLine($obj);
        $this->assertEquals(987654321, $res->getUserNumber());
        $this->assertEquals(123456789, $res->getCustomerNumber());
        $this->assertEquals("title", $res->getTitle());
        $this->assertEquals("surname", $res->getSurname());
        $this->assertEquals("firstname", $res->getFirstname());
        $this->assertEquals(new DateTime("2017-09-20 00:00:00"), $res->getDateBirth());
        $this->assertEquals("12345", $res->getParkingSpace());
        $this->assertEquals("remarks", $res->getRemarks());
        $this->assertEquals(new DateTime("2017-09-21 11:55:00"), $res->getDatetimeLastModification());
        $this->assertEquals(false, $res->getDeletedRecord());
        $this->assertEquals("identificationNumber", $res->getIdentificationNumber());
        $this->assertEquals(false, $res->getCheckLicensePlate());
        $this->assertEquals(true, $res->getPassageLicensePlatePermitted());
        $this->assertEquals(true, $res->getExcessTimesCreditCard());
        $this->assertEquals("creditCardNumber", $res->getCreditCardNumber());
        $this->assertEquals(null, $res->getExpiryDate());
        $this->assertEquals("remarks2", $res->getRemarks2());
        $this->assertEquals("remarks3", $res->getRemarks3());
        $this->assertEquals("division", $res->getDivision());
        $this->assertEquals("email", $res->getEmail());
        $this->assertEquals(true, $res->getGroupCounting());
        $this->assertEquals(1, $res->getETicketTypeP());
        $this->assertEquals("eTicketEmailTelephone", $res->getETicketEmailTelephone());
        $this->assertEquals(1, $res->getETicketAuthentication());
        $this->assertEquals(3, $res->getETicketServiceTyp());
        $this->assertEquals(2, $res->getEticketServiceArt());
    }

}
