<?php
/**
 * Class    DeviceDetection
 * @package zetsoft\service\mobile
 *
 * @author DilshodKhudoyarov
 *
 * Class file hamma device informatsiyalani chiqarib beradi
 */

namespace zetsoft\service\App\eyuf;
namespace zetsoft\service\mobile;
use zetsoft\system\Az;
use zetsoft\system\kernels\ZFrame;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;
use DeviceDetector\Parser\Bot AS BotParser;

class DeviceDetection extends ZFrame
{
    #region Test
    public function test_case() {
        $this->detect_all_infoTest();
       //$this->checking_is_user_botTest();
       //$this->get_clientTest();
       //$this->get_osTest();
       //$this->get_devicenameTest();
       //$this->get_brandnameTest();
       //$this->get_modelTest();
    }
    #endregion

    public function get_clientTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->get_client($userAgent);
        vd($result);
    }

    public function get_client($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $clientInfo = $dd->getClient(); // holds information about browser, feed reader, media player, ...
            vdd($clientInfo);
        }
    }

    public function get_osTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->get_os($userAgent);
        vd($result);
    }

    public function get_os($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $osInfo = $dd->getOs();
            vdd($osInfo);
        }
    }

    public function get_devicenameTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->get_devicename($userAgent);
        vd($result);
    }

    public function get_devicename($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $device = $dd->getDeviceName();
            vdd($device);
        }
    }

    public function get_brandnameTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->get_brandname($userAgent);
        vd($result);
    }

    public function get_brandname($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $brand = $dd->getBrandName();
            vdd($brand);
        }
    }

    public function get_modelTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->get_model($userAgent);
        vd($result);
    }

    public function get_model($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $model = $dd->getModel();
            vdd($model);
        }
    }

    public function checking_is_user_botTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->checking_is_user_bot($userAgent);
        vd($result);
    }

    public function checking_is_user_bot($userAgent) {

        //$userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $botParser = new BotParser();
        $botParser->setUserAgent($userAgent);

// OPTIONAL: discard bot information. parse() will then return true instead of information
        $botParser->discardDetails();

        $result = $botParser->parse();

        if (!is_null($result)) {
            // do not do anything if a bot is detected
            return;
        }
        // handle non-bot requests
    }

    public function detect_all_infoTest() {
        $userAgent = 'enter a useragent you want to parse here!';
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $result = Az::$app->mobile->deviceDetection->detect_all_info($userAgent);
        vd($result);
    }

    public function detect_all_info($userAgent) {

        DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);
        // $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);

        $dd->parse();

        if ($dd->isBot()) {
            // handle bots,spiders,crawlers,...
            $botInfo = $dd->getBot();
            vdd($botInfo);
        } else {
            $clientInfo = $dd->getClient(); // holds information about browser, feed reader, media player, ...
            $osInfo = $dd->getOs();
            $device = $dd->getDeviceName();
            $brand = $dd->getBrandName();
            $model = $dd->getModel();
            vdd($clientInfo,$osInfo,$device,$brand,$model);
        }
    }
}