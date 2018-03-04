<?php
/*
V5.20dev  ??-???-2014  (c) 2000-2014 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license.
  Whenever there is any discrepancy between the two licenses,
  the BSD license will take precedence.
Set tabs to 4 for best viewing.

  Latest version is available at http://adodb.sourceforge.net

  Microsoft Visual FoxPro data driver. Requires ODBC. Works only on MS Windows.
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();
include(ADODB_DIR."/drivers/adodb-db2.inc.php");


if (!defined('ADODB_DB2OCI')){
define('ADODB_DB2OCI',1);


function _colontrack($p)
{
global $_COLONARR,$_COLONSZ;
	$v = (integer) substr($p,1);
	if ($v > $_COLONSZ) return $p;
	$_COLONARR[] = $v;
	return '?';
}

function _colonscope($sql,$arr)
{
global $_COLONARR,$_COLONSZ;

	$_COLONARR = array();
	$_COLONSZ = sizeof($arr);

	$sql2 = preg_replace("/(:[0-9]+)/e","_colontrack('\\1')",$sql);

	if (empty($_COLONARR)) return array($sql,$arr);

	foreach($_COLONARR as $k => $v) {
		$arr2[] = $arr[$v];
	}

	return array($sql2,$arr2);
}

class ADODB_db2oci extends ADODB_db2 {
	var $databaseType = "db2oci";
	var $sysTimeStamp = 'sysdate';
	var $sysDate = 'trunc(sysdate)';

	function _Execute($sql, $inputarr = false)
	{
		if ($inputarr) list($sql,$inputarr) = _colonscope($sql, $inputarr);
		return parent::_Execute($sql, $inputarr);
	}
};


class  ADORecordSet_db2oci extends ADORecordSet_odbc {

	var $databaseType = "db2oci";

	function __construct($id,$mode=false)
	{
		return parent::__construct($id,$mode);
	}
}

} //define
