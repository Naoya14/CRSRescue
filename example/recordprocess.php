<?php

  $conn = mysqli_connect(&quot;localhost&quot;, &quot;root&quot;, &quot;&quot;, &quot;mehahospital&quot;);

  // insert
  if (isset($_POST[&#39;login&#39;])) {
    $testerusername = $_POST[&#39;testerusername&#39;];
    $testerpass = $_POST[&#39;password&#39;];
    $testername = $_POST[&#39;testername&#39;];
    $testcentre = $_POST[&#39;testcentre&#39;];

34

    //generate MaterialID
    $SQLlast = &quot;SELECT testerID from recordtester order by testerID desc limit 1;&quot;;
    $lastResult = mysqli_query($conn, $SQLlast);
    if (mysqli_num_rows($lastResult) == 0) {
      $id = &quot;T1&quot;;
    }
    else {
      $lastRow = $lastResult-&gt;fetch_assoc();
      $num = ltrim((string)$lastRow[&#39;testerID&#39;], &#39;T&#39;);
      $num = (int)$num + 1;
      $id = &#39;T&#39;.$num;
    }
    $sql = &quot;INSERT into recordtester values (&#39;$id&#39;,&#39;$testerusername&#39;,&#39;$testerpass&#39;, &#39;$testername&#39;,
&#39;$testcentre&#39;);&quot;;
    $result = mysqli_query($conn, $sql);

  }

  //back to main page
  header(&#39;location: recordtester.php&#39;);
?>
