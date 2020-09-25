<?php
/* --------------------------------------------------------
-------------------Double_0_negative mod time--------------
-----------------------OH YEA-----------------------------
*/
$result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "habot");


while($row = mysql_fetch_array($result))
{
	$boton = $row['enabled'];
	$botauto = $row['autorespond'];
	$botaway = $row['away'];
       $botversion = $row['version'];
	
}


if (preg_match("#^(/bot\s+?)#i", $message,$matches))
	{
		if (substr($message, 5, 1) == 1)
			{
				$variable = substr($message, 7,1);
				if (substr($message, 7,1)==1)
					{
						$message = strftime("Is online at %b %d %Y %X") . ' - System version '. $botversion . ' - [url=http://hackers-alliance.com/aboutbot.php]View the changlog[/url]';
					}else
					{
							$message = strftime("Is offline at %b %d %Y %X"). ' - System version '. $botversion . ' - [url=http://hackers-alliance.com/aboutbot.php]View the changlog[/url]';
;
					}
	
				$this->vbulletin->db->query("UPDATE " . TABLE_PREFIX . "habot SET enabled='{$variable}'");
				$this->vbulletin->userinfo['userid'] = 64;
				$this->me = true;
				
			}
		if (substr($message, 5, 1) == 2)
			{
				$variable = substr($message, 7,1);
				if (substr($message, 7,1)==1)
					{
						$message = strftime("Auto response enabled at %X");
					}else
					{
							$message = strftime("Auto response disabled at %X");
					}
			
				$this->vbulletin->db->query("UPDATE " . TABLE_PREFIX . "habot SET autorespond='{$variable}'");
				$this->vbulletin->userinfo['userid'] = 64;
				$this->me = true;
				
			}	
		if (substr($message, 5, 1) == 3)
			{
				$variable = substr($message, 7,1);
				if (substr($message, 7,1)==1)
					{
						$message = strftime("Away messages enabled at %X");
					}else
					{
							$message = strftime("Away messages disabled %X");
					}
			
				$this->vbulletin->db->query("UPDATE " . TABLE_PREFIX . "habot SET away='{$variable}'");
				$this->vbulletin->userinfo['userid'] = 64;
				$this->me = true;
				
			}		
	}


if ($boton == 1)
{



/*------------String Replace -------------*/


$message = str_ireplace("{userid}",$this->vbulletin->userinfo['userid'],$message);
$message = str_ireplace("{username}",$this->vbulletin->userinfo['username'],$message);

$message = str_ireplace("{posts}",$this->vbulletin->userinfo['posts'],$message);
$message = str_ireplace("{words}",$this->vbulletin->userinfo['word_count'],$message);

$message = str_ireplace("{totalpost}",$totalpost,$message);

if ($message == 'server info'){
$loadresult = @exec('uptime');
preg_match("/averages?: ([0-9\.]+),[\s]+([0-9\.]+),[\s]+([0-9\.]+)/",$loadresult,$avgs);
$uptime = explode(' up ', $loadresult);
$uptime = explode(',', $uptime[1]);
$uptime = $uptime[0].', '.$uptime[1];
$data1 = $avgs[1];
$data2 = $avgs[2];
$data3 = $avgs[3];
$serverup= "$uptime";

$t = time();
$messagec = 'load avg: '.$data1. ' , '.$data2.' , '.$data3. ' uptime: '.$serverup;
$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, 64, '{$t}' , '{$messagec}' , '1', '-1')");
}





/*

$usernamea = $this->vbulleting->userinfo['username']; 
if ($result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "infernousermessages WHERE to='{$usernamea}' AND sent='0'"))
{
while($row = mysql_fetch_array($result))
{
$messagea = $row['message'];
$froma = $row['from'];

$messageb = $usernamea . ': the user '. $froma . ' left a message from you. '. $messagea;
$id = $row['id'];
$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, 64, '{$t}' , '{$messageb}' , '1', '-1')");
$this->vbulletin->db->query("UPDATE " . TABLE_PREFIX . "SET sent='1' WHERE id='{$id}");


}
}
*/


if ($message == "@bot Generate sentence")
		{
$file1 = "words.txt";
$lines = file($file1);
foreach($lines as $line_num => $line)
{
//echo "$line_num $line";
}


$string =  $line[5];

$t = time();
$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, 64, '{$t}' , '{$string}' , '0', '-1')");
}

if (preg_match("#^(/ha\s+?)#i", $message, $matches))
		{


$this->me = true;
			
$message = substr($message, 3);
if ($this->vbulletin->userinfo['userid'] == 21)
{
$message = "is not allowed to use this command";
}else{
$this->vbulletin->userinfo['userid'] = 64;
}
}

if (preg_match("#^(/htb\s+?)#i", $message, $matches))
		{
$this->vbulletin->userinfo['userid'] = 64;

			
$message = substr($message, 4);


}
/*

if (preg_match("#^(/bing\s+?)#i", $message, $matches))
{
$lookup = substr($message, 6);
$google = $this->vbulletin->userinfo['username'] .  ' ran a Bing Search: [url=http://www.bing.com/search?q='. $lookup . ']'. $lookup . '[/url]';

$message = $google;
$this->vbulletin->userinfo['userid'] = 64;

$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL,' . $vbulletin->userinfo['userid'] . ', $t , 'ghhhhhhhhhhhhhhhhhhh' , '0', '-1')");

}

if (preg_match("#^(/Yahoo\s+?)#i", $message, $matches))
{
$lookup = substr($message, 7);
$google = $this->vbulletin->userinfo['username'] .  ' ran a Yahoo Search: [url=http://search.yahoo.com/search?p='. $lookup . ']'. $lookup . '[/url]';

$message = $google;
$this->vbulletin->userinfo['userid'] = 64;


}

*/

if (preg_match("#^(/google\s+?)#i", $message, $matches))
{
$lookup = substr($message, 8);
$google = $this->vbulletin->userinfo['username'] .  ' ran a Google Search: [url=http://google.com/search?q='. $lookup . ']'. $lookup . '[/url]';

$message = $google;
$this->vbulletin->userinfo['userid'] = 64;


}
if (preg_match("#^(/search\s+?)#i", $message, $matches))
{
$lookup = substr($message, 8);
$google = $this->vbulletin->userinfo['username'] .  ' ran a search on "' . $lookup . '". Results:  [url=http://google.com/search?q='. $lookup . ']Google[/url] |'. ' [url=http://search.yahoo.com/search?p='. $lookup . ']Yahoo [/url] |'. '[url=http://www.bing.com/search?q='. $lookup . '] Bing[/url]';

$message = $google;
$this->vbulletin->userinfo['userid'] = 64;


}

if ($botaway == 1)     ////////////////Check to see if away messages are on///////////////
{


if (preg_match("#^(/away\s+?)#i", $message, $matches))
{ 

$amessage = substr($message, 5);
$auser = $this->vbulletin->userinfo['username'];
$message = 'The user ' . $auser. ' is [b]'. $amessage .'[/b]';
$amessage = mysql_real_escape_string($amessage);
$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoaway (user, message) VALUES ('{$auser}','{$amessage}')");
$this->vbulletin->userinfo['userid'] = 64;
}

if (preg_match("#^(where is\s+?)#i", $message, $matches))
{ 
$auser = substr($message, 9);


$loopcount = 0;
 $result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "user WHERE username LIKE '%{$auser}%'");
while($row = mysql_fetch_array($result))
{
	$awayuser = $row['username'];
	$loopcount++;
}


$result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "infernoaway WHERE user LIKE '%{$awayuser}%' ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
{
	$amessage = $row['message'];
	$awayuser = $row['user'];
	
}



if ($amessage == "")
{

$awaymess = "The user [b]" . $auser. "[/b] is not valid or has not set their away message";

}

else 
	{

	$awaymess = "[color=#888]The user " . $awayuser . ' is ' . $amessage . "[/color]";
	}

	if ($loopcount > 1)
		{
	
		$awaymess = "I found more than one user. Please be more specific";
	
		}
	$t = time();
	$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, 64, '{$t}' , '{$awaymess}' , '1', '-1')");

		$message = 'where is ' . $auser;

}
}


if ($botauto == 1)//Custom Bot Talk -------------------------------------------------
{
$lowerstr = addslashes(strtolower($message));
$result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "habottalk WHERE input LIKE '{$lowerstr}' ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
{
	$output = $row['output'];
}


if (isset($output))
	{
	$t = time();
        $t = $t + 1;
	$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernoshout (`sid`, `s_user`, `s_time`, `s_shout`, `s_me`, `s_private`) VALUES (NULL, 64, '{$t}' , '{$output}' , '0', '-1')");

	}

//End Bot Talk --------------------------------------------------------

//Set Custom bot sayings ----------------------------------------------
if (preg_match("#^(/input\s+?)#i", $message, $matches))
{
$message = addslashes($message);
$outputpos = strpos($message, "/output");
$outputpos = $outputpos - 8;
$input = substr($message, 7, $outputpos);
$outputpos = strpos($message, "/output");
$outputpos = $outputpos + 7;
$output = substr($message, $outputpos);

$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "habottalk (`input`,`output`) VALUES ('{$input}', '{$output}')");
$message = 'updated';
}


//END Custom Bot Sayings -----------------------------------------------

}

 $buser = $this->vbulletin->userinfo['username'];



 $result = $this->vbulletin->db->query("select * from " . TABLE_PREFIX . "infernowordban WHERE user='{$buser}' LIMIT 1");

while($row = mysql_fetch_array($result))
{
	$cuser = $row['user'];
	
}
if ($cuser != "")
{
$posa = strpos($message, 'fuck');
$posb = strpos($message, 'shit');
$posc = strpos($message, 'bitch');
$posd = strpos($message, 'piss');
$pose = strpos($message, 'ass');
$posf = strpos($message, 'whore');
$posf = strpos($message, 'bastard');
if ($posa === false and $posb === false and $posc === false and $posd === false and $pose === false and $posf === false)
{

}else
{
$message = 'The limited user '. $buser . ' attempted to say disallowed word';
$this->vbulletin->userinfo['userid'] = 64;
$me = 1;
}
}
  
if (preg_match("#^(/limit\s+?)#i", $message, $matches))
{

$auser = substr($message, 6);

$this->vbulletin->db->query("INSERT INTO " . TABLE_PREFIX . "infernobanword (`user`) VALUES ('{$auser}'");
$me = 1;
$message = "has limited the user ". $auser;
}




	}
?>
