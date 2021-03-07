<?php
session_start();

if(isset($_SESSION[&#39;username&#39;]))
                              
 {
    header(&quot;Location:generatemanager.php&quot;);
 }

if(isset($_POST[&#39;login&#39;]))
{
     $user = $_POST[&#39;managerusername&#39;];
     $pass = $_POST[&#39;managerpass&#39;];

      if($user == $_POST[&#39;managerusername&#39;] &amp;&amp; $_POST[&#39;managerpass&#39;])
         {

          $_SESSION[&#39;username&#39;]=$user;

20

         echo &#39;&lt;script type=&quot;text/javascript&quot;&gt;
window.open(&quot;generatemanager.php&quot;,&quot;_self&quot;);&lt;/script&gt;&#39;;

        }

        else
        {
            echo &quot;invalid UserName or Password&quot;;
        }
}
?&gt;

&lt;?php

$username = $_POST[&quot;managerusername&quot;];
$password = $_POST[&quot;managerpass&quot;];

//1. create connection
$conn = new mysqli(&quot;localhost&quot;, &quot;root&quot;, &quot;&quot;, &quot;mehahospital&quot;);

//2. check connection

if ($conn -&gt; connect_error){

  die(&quot;Connection failed:&quot; . $conn -&gt; connect_error);
}

echo &quot;connected successfully to DB server&quot;;

21

//3. prepare query and execute

$sql = &quot;INSERT INTO manager (username, password) values(&#39;$username&#39;, &#39;$password&#39;)&quot;;

if ($conn-&gt;query($sql) === TRUE) {
    echo &quot; and manager is added&quot;;
} else {
    echo &quot;Error: &quot; . $sql . &quot;&lt;br&gt;&quot; . $conn-&gt;error;
}

$conn -&gt; close();

?>
