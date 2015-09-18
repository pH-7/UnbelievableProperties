<?php
class Library
{
	public static function hashTag($iId)
	{
	    $sId = static::intToChar($iId);
	    if (empty($_SESSION['hash_tag'])) {
	        $_SESSION['hash_tag'] = substr($sId,3) . substr(uniqid(),8);
	    }
	
	    return $_SESSION['hash_tag'];	
	}
	
	public static function intToChar($iInt)
	{
		$iInt = (int) $iInt;
		$sSearch = array(10,20,40,80,1,2,3,4,5,6,7,8,9,0);
		$sReplace = array('o','m','w','q','a','b','c','d','e','f','g','h','i','z');
		return str_replace($sSearch, $sReplace, $iInt);
	}
	
	public static function escape($sString)
	{
		return htmlspecialchars($sString, ENT_QUOTES, 'utf-8');
	}

    /**
     * Get IP address.
     *
     * @static
     * @return string IP address. If the IP format is invalid, returns '0.0.0.0'
     */
    public static function getPublicIp()
    {
        $sIp = ''; // Default IP address value.
        $aVars = array('HTTP_CLIENT_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR');

        foreach ($aVars as $sVar) {
            if (!empty($_SERVER[$sVar])) {
                $sIp = $_SERVER[$sVar];
                break;
            }
        }
        unset($aVars);
        $sIp = preg_match('/^[a-z0-9:.]{7,}$/', $sIp) ? $sIp : '127.0.0.1';
        if (static::isPrivateIp($sIp)) {
			if ($sIp = @file_get_contents('http://ipecho.net/plain')) {
			    $sIp = trim($sIp);
			} else {
				$sIp = '127.0.0.1';
			}
		}
		return $sIp;
    }
    
    final public static function isPrivateIp($sIp)
    {
		return !filter_var($sIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE |  FILTER_FLAG_NO_RES_RANGE);
	}
}
