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


$xml = new SimpleXMLElement($xmlstr);

echo $xml->data;

