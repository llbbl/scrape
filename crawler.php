<?php

// has db username + password
include '../db.php';

try{
    $pdo = new PDO('mysql:127.0.0.1;port=3306;dbname=scraper', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "err ". $e->getMessage();
}


while( $task = GetTask($pdo) ){

    //var_dump($task);


    $html = file_get_contents($task->site);

    if($html)
    {



        libxml_use_internal_errors(true);

        $doc = new DOMDocument();
        $doc->loadHTML($html);

        libxml_clear_errors();

        $xpath = new DOMXPath($doc);

        $links = $xpath->query("//a/@href");

        $pattern = '/^http:\/\/www.meetup.com\/austinphp/';

        foreach($links as $a)
        {
            if(preg_match($pattern, $a->value))
            {
//            var_dump($a->value);

                //$sql = "select count(id) from checked where site='$a->value'";
                $checked = $pdo->query("select count(id) from checked where site='$a->value'")->fetchColumn();
                $inTasks = $pdo->query("select count(id) from tasks where site='$a->value'")->fetchColumn();

                if((int) $checked === 0 && (int) $inTasks === 0)
                {
//                    var_dump($checked); die();

                    $pdo->query("INSERT INTO tasks (site) VALUES ('".$a->value."')");
                }


            }
        }


        $pdo->beginTransaction();

        $pdo->query("delete from tasks where id=".$task->id);
        $pdo->query("insert into checked (site) values('".$task->site."')");

        $pdo->commit();

    }


}



function GetTask(PDO $pdo)
{

    $query = $pdo->query("select * from tasks limit 1;");

    return $query->fetchObject();
}