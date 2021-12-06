<?php

// Function for performing cURL request
function fetchPage($url)
{
	$ch = curl_init(); // initialize curl object
	curl_setopt($ch, CURLOPT_URL, $url); // set url
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // receive server response
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // disable SSL verification (THIS IS NOT PROPER/SAFE)
	$result = curl_exec($ch); // execute curl, fetch webpage content
	$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); // receive http response status
	$err = curl_error($ch);
	curl_close($ch);  // close curl
    ini_set('max_execution_time', 0);
	$pageData = array();
	$pageData['result'] = $result;
	$pageData['httpstatus'] = $httpstatus;
	$pageData['error'] = $err;

	return $pageData; // return array
}

// Function for fetching new URL
function getNewUrl()
{
	$baseurl = "https://istudent.uitm.edu.my/nsp/examttable";
	$dir = "/JWP_CURRENT_B/index.html";

	// need to fetch the new redirected url first, this is because the url will change each semester
	$pageData = fetchPage($baseurl.$dir);

	// use regex to to parse html and get the new redirected url
	$patern = '#window.location="..([\w\W]*?)";#';
	preg_match_all($patern, $pageData['result'], $parsed);
	$newdir = implode(str_replace(['window.location="..','";','index.html'], "", $parsed[0]),"");

	// new url
	$newbaseurl = $baseurl.$newdir;

	return $newbaseurl;
}

// strpos for array
// thanks to: http://my1.php.net/manual/en/function.strpos.php#102773
function strpos_array($haystack, $needles)
{
    if ( is_array($needles) )
    {
	    foreach ($needles as $str)
	    {
	    	if($str != "")
	    	{
	    		if ( is_array($str) )
		        {
		            $pos = strpos_array($haystack, $str);
		        }
		        else
		        {
		            $pos = strpos($haystack, $str);
		        }
		        if ($pos !== FALSE)
		        {
		            return $pos;
		        }
	    	}
	    }
    }
    else
    {
       return strpos($haystack, $needles);
    }
}

function scrapTimetable($urlprog, $codeprog)
{
    include("connection.php");
    
    $pageData = null;

	if($pageData == null)
	{
		$newbaseurl = getNewUrl();

		// fetch the timetable
		$pageDataNew = fetchPage($newbaseurl."/".$urlprog);

		$pageData = $pageDataNew['result'];

	}

	// use regex to to parse html, get the table
	$patern = '#<TABLE([\w\W]*?)<\/TABLE>#';
	preg_match_all($patern, $pageData, $parsed);

	// to store exam data
	$examarray = array();
	$counti = 0;

	for($x=0;$x<count($parsed[0]);$x++)
	{
		$trpatern = "#<TR>([\w\W]*?)</TR>#";
	    preg_match_all($trpatern, $parsed[0][$x], $trparsed);

	    for($i=1;$i<count($trparsed[0]);$i++)
	    {
	        $tdpatern = "#<TD([\w\W]*?)</TD>#";
	        preg_match_all($tdpatern, $trparsed[0][$i], $tdparsed);

			for($j=0;$j<count($tdparsed[0]);$j++)
			{
				// check if not contain any exam, skip
				if (strpos($tdparsed[0][$j], '&nbsp;') !== false)
				{
				    //do nothing
				}
				else
				{
						$apatern = "#<A([\w\W]*?)</A>#";
	        			preg_match_all($apatern, $tdparsed[0][$j], $aparsed);
                        
                        $examarray[$counti]['programme'] = $codeprog;
	        			$examarray[$counti]['subject'] = strip_tags($aparsed[0][3]);

	        			// split the details string
	        			$detailsarr = explode(", ",strip_tags($aparsed[0][2]));
	        			$examarray[$counti]['details']['week'] = str_replace("Wk ", "", $detailsarr[1]);
	        			$examarray[$counti]['details']['date'] = date('Y/m/d',strtotime($detailsarr[2]));
                        $startTime = strtok($detailsarr[0], "-");
                        $endTime = substr($detailsarr[0], strpos($detailsarr[0], "-") + 1); 
	        			$examarray[$counti]['details']['time_start'] = date('H:i', strtotime($startTime));
                        $examarray[$counti]['details']['time_end'] =  date('H:i', strtotime($endTime));
                        
	        			include_once("connection.php");
                        
                        $sql = "INSERT INTO timetable(subjectCode, programmeCode, week, date, timeStart, timeEnd) VALUES ('".$examarray[$counti]['subject']."', '".$examarray[$counti]['programme']."', '".$examarray[$counti]['details']['week']."', '".$examarray[$counti]['details']['date']."', '".$examarray[$counti]['details']['time_start']."', '".$examarray[$counti]['details']['time_end']."')";
                    
                        $query = mysqli_query($connect, $sql);
                        
                        if(!$query)
                        {
                            echo "Fail Index " . $counti . "<br>";
                        }
                    
                        $counti++;
				}

			}
		}
	}

	// return JSON
	return $examarray;
    
}

$urlProgramme = array();
// --- List all Programmes ---
// usage: api.php?option=listprogrammes
if($_GET['option'] == "listprogrammes")
{
	
	$newbaseurl = getNewUrl();

	// fetch list of Programmes
	$pageData = fetchPage($newbaseurl."/list.html");

	// use regex to to parse html
	$patern = '#<UL>([\w\W]*?)</UL>#';
	preg_match_all($patern, $pageData['result'], $parsed);

	$paternli = '#<A([\w\W]*?)<\/A>#';
	preg_match_all($paternli, $parsed[0][0], $parsed);

	$progarray = array();

	for($i=0;$i<count($parsed[0]);$i++)
	{
		// check if not contain programmes code, skip
		if (strpos($parsed[0][$i], '<A NAME="') !== false)
		{
		    //do nothing
		}
		else
		{
			$paternhref = '#"([\w\W]*?)"#';
			preg_match_all($paternhref, $parsed[0][$i], $linkparsed);

			$progarray[$i]['code'] = strip_tags($parsed[0][$i]);
			$progarray[$i]['url'] = str_replace('"', '', $linkparsed[0][0]);
		}
	}

	// return list in JSON
	$jsonprog = json_encode($progarray);
	echo $jsonprog;

}

// --- List all Courses ---
// usage: api.php?option=listcourses
if($_GET['option'] == "listcourses")
{

	$newbaseurl = getNewUrl();

	// fetch list of Courses
	$pageData = fetchPage($newbaseurl."/list.html");

	// use regex to to parse html
	$patern = '#<UL>([\w\W]*?)</UL>#';
	preg_match_all($patern, $pageData['result'], $parsed);

	$paternli = '#<A([\w\W]*?)<\/A>#';
	preg_match_all($paternli, $parsed[0][1], $parsed);

	$coursearray = array();

	for($i=0;$i<count($parsed[0]);$i++)
	{
		// check if not contain courses code, skip
		if (strpos($parsed[0][$i], '<A NAME="') !== false)
		{
		    //do nothing
		}
		else
		{
			$paternhref = '#"([\w\W]*?)"#';
			preg_match_all($paternhref, $parsed[0][$i], $linkparsed);

			$coursearray[$i] = strip_tags($parsed[0][$i]);
		}
	}

	// return list in JSON
	$jsoncourse = json_encode($coursearray);
	echo $jsoncourse;

}

// --- Fetch Timetable ---
if($_GET['option'] == "timetable")
{   
    include_once("connection.php");
    
    $trunc = mysqli_query($connect, "TRUNCATE TABLE timetable");
    $altr = mysqli_query($connect, "ALTER TABLE timetable AUTO_INCREMENT = 1");
    
	$arrTimetable = array();
    
    $newbaseurl = getNewUrl();

	// fetch list of Programmes
	$pageData = fetchPage($newbaseurl."/list.html");

	// use regex to to parse html
	$patern = '#<UL>([\w\W]*?)</UL>#';
	preg_match_all($patern, $pageData['result'], $parsed);

	$paternli = '#<A([\w\W]*?)<\/A>#';
	preg_match_all($paternli, $parsed[0][0], $parsed);

	$progarr = array();
    $urlProgramme = array();
    $codeProgramme = array();

	for($i=0;$i<count($parsed[0]);$i++)
	{
		// check if not contain programmes code, skip
		if (strpos($parsed[0][$i], '<A NAME="') !== false)
		{
		    //do nothing
		}
		else
		{
			$paternhref = '#"([\w\W]*?)"#';
			preg_match_all($paternhref, $parsed[0][$i], $linkparsed);

			$progarr[$i]['code'] = strip_tags($parsed[0][$i]);
			$progarr[$i]['url'] = str_replace('"', '', $linkparsed[0][0]);
            $codeProgramme[$i] = $progarr[$i]['code'];
            $urlProgramme[$i] = $progarr[$i]['url'];
        
		}
	}
    
    foreach(array_combine($urlProgramme, $codeProgramme) as $url => $code)
    {
        $arrTimetable[] = json_encode(scrapTimetable($url, $code));
    }

    print_r($arrTimetable);
}



?>