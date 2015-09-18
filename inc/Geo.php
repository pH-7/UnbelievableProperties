<?php
/**
 * @title            Ip localization Class
 *
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / Framework / Geo / Ip
 * @version          1.0
 */

use GeoIp2\Database\Reader;

class Geo
{

    /**
     * Static Class.
     *
     * @access private
     */
    private function __construct() {}

    /**
     * Get Country ISO Code (e.g., en, it, es, ru, fr, ...).
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return string Country Code.
     */
    public static function getCountryCode($sIpAddress = null)
    {
        return static::get($sIpAddress)->country->isoCode;
    }

    /**
     * Get Zip Code (postal code).
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return integer Zip Code.
     */
    public static function getZipCode($sIpAddress = null)
    {
        return static::get($sIpAddress)->postal->code;
    }

    /**
     * Get Latitude.
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return float Latitude.
     */
    public static function getLatitude($sIpAddress = null)
    {
        return static::get($sIpAddress)->location->latitude;
    }

    /**
     * Get Longitude.
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return float Longitude.
     */
    public static function getLongitude($sIpAddress = null)
    {
        return static::get($sIpAddress)->location->longitude;
    }

    /**
     * Get Country Name.
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return string Country Name.
     */
    public static function getCountry($sIpAddress = null)
    {
        // Encode to UTF8 for Latin and other characters of the GeoIP database are displayed correctly.
        return utf8_encode(static::get($sIpAddress)->country->name);
    }

    /**
     * Get City Name.
     *
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default is NULL
     * @return string City Name.
     */
    public static function getCity($sIpAddress = null)
    {
		if (Library::getPublicIp() == '87.198.161.74') { // MaxMind don't return any city from my company IP
		    return 'Dublin';
		}
		    
        // Encode to UTF8 for Latin and other characters of the GeoIP database are displayed correctly.
        return utf8_encode(static::get($sIpAddress)->city->name);
    }

    /**
     * Get Geo Ip Data Information.
     *
     * @access protected
     * @param string $sIpAddress Specify an IP address. If NULL, it will address the current customer who visits the site. Default: NULL
     * @return object
     */
    protected static function get($sIpAddress = null)
    {
        $sIpAddr = (!empty($sIpAddress) ? $sIpAddress : Library::getPublicIp());
        if ($sIpAddr == '127.0.0.1') {
            // Set a valid IP address, if it's the invalid local one
            $sIpAddr = '128.101.101.101';
        }

        $oReader = new Reader(__DIR__ . '/GeoLite2-City.mmdb');
        return @$oReader->city( $sIpAddr );
    }

    /**
     * Block cloning.
     *
     * @access private
     */
    private function __clone() {}

}
