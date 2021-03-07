<?php

if(isset($_POST[&#39;login&#39;])){
  // form handling
  $username = $_POST[&#39;usernametype&#39;];
  $password =  $_POST[&#39;passwordtype&#39;];
  $email = $_POST[&#39;emailtype&#39;];
  $fullname = $_POST[&#39;fullnametype&#39;];
  $usertypes = $_POST[&#39;usertype&#39;];


}

// 1. DB Server connection
  $con = mysqli_connect(&#39;localhost&#39;, &#39;root&#39;, &#39;&#39;, &#39;mehahospital&#39;);
// check the connection
if($con-&gt;connect_error)
    die(&quot; DB Connection failed &quot; . $con-&gt;connect_error);

//Check existing user
$query =&quot;SELECT * FROM signupuser WHERE username=&#39;$username&#39;;&quot;;
$result = mysqli_query($con,$query);
 if(mysqli_num_rows($result)&gt;0){
     echo &#39;&lt;script&gt;alert(&quot;Userename already exist.&quot;);window.location = &quot;index.php&quot;;&lt;/script&gt;&#39;;

}else{
  // Insert the values into database table users
  $sqlQuery = &quot;INSERT INTO signupuser VALUES ( &#39;$username&#39;,
&#39;$password&#39;,&#39;$email&#39;,&#39;$fullname&#39;, &#39;$usertypes&#39;)&quot;;

  // Execute the query
  if ($con-&gt;query($sqlQuery) == TRUE ) {
    echo &#39;&lt;script&gt;alert(&quot;Sign up successful&quot;);window.location = &quot;index.php&quot;;&lt;/script&gt;&#39;;
  }
  else {
    echo &quot;&lt;script&gt;alert(&#39;sign up failed&#39;);&lt;/script&gt;&quot;;
  }

19

}

// Close DB connection
$con-&gt;close();

?&gt;
