<?php 

function randomString($length = 8)
{
    $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function putDelete(string $name)
{
    $lines = file('php://input');
    $keyLinePrefix = 'Content-Disposition: form-data; name="';

    $REQUEST = [];
    $findLineNum = null;

    foreach($lines as $num => $line)
    {
        if(strpos($line, $keyLinePrefix) !== false)
        {
            if($findLineNum)
                break;
            if($name !== substr($line, 38, -3))
                continue;
            $findLineNum = $num;
        } 
        else if($findLineNum)
        {
            $REQUEST[] = $line;
        }
    }

    array_shift($REQUEST);
    array_pop($REQUEST);

    return mb_substr(implode('', $REQUEST), 0, -2, 'UTF-8');
}