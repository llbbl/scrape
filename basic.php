<?php
/**
 * Created by JetBrains PhpStorm.
 * User: logan
 * Date: 5/9/13
 * Time: 3:53 PM
 * To change this template use File | Settings | File Templates.
 */


$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<example>
<data>Hello World</data>
</example>
XML;



libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadXML($xmlstr);

var_dump($dom->textContent);



$result = $dom->getElementsByTagName('data');

foreach($result as $row)
{
    var_dump($row->nodeValue);
}
