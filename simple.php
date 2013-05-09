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
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;


$xml = new SimpleXMLElement($xmlstr);

echo $xml->movie[0]->plot;

//var_dump($xml->movie[0]->plot);
//var_dump($xml->movie->plot );


//var_dump($xml->movie->{"great-lines"}->line );

//$test = "PHP solves all my web problems";
//
//if( $xml->movie->{"great-lines"}->line === $test)
//{
//    echo "free beer \n";
//}
//else
//{
//    echo "you suck \n";
//}



//foreach($xml->movie->characters->character as $actors)
//{
//    var_dump((string) $actors->actor);
//}

