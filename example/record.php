&lt;?php

32

    session_start();

        if(!isset($_SESSION[&#39;username&#39;]))
         {
             header(&quot;Location:loginmanager.php&quot;);
         }

          echo &quot;&lt;b&gt;Welcome to Meha Hospital Manager&lt;/b&gt; &quot; . $_SESSION[&#39;username&#39;];

          echo &quot;&lt;br&gt;Click &lt;a style=&#39;color:red;&#39; href=&#39;logoutmanager.php&#39;&gt; Logout Manager&lt;/a&gt;
to logout&quot;;
  ?&gt;
&lt;?php

            $conn = mysqli_connect(&quot;localhost&quot;, &quot;root&quot;,&quot;&quot;,&quot;mehahospital&quot;);

            //check connection
            if ($conn-&gt;connect_error)
            {die(&quot;Connection Failed: &quot;. $conn-&gt;connect_error);}

            $sql = &quot;SELECT testerID, testerusername, testerpassword, testername, testcentre
FROM recordtester&quot;;
            $result = $conn-&gt;query($sql);

            if ($result-&gt;num_rows &gt; 0) {
            // output data of each row
            while($row = $result-&gt;fetch_assoc()) {
            echo &quot;&lt;tbody&gt;

33

            &lt;tr&gt;
            &lt;td&gt;&quot; . $row[&quot;testerID&quot;]. &quot;&lt;/td&gt;
            &lt;td&gt;&quot; . $row[&quot;testerusername&quot;] . &quot;&lt;/td&gt;
            &lt;td&gt;&quot; . $row[&quot;testerpassword&quot;]. &quot;&lt;/td&gt;
            &lt;td&gt;&quot; . $row[&quot;testername&quot;]. &quot;&lt;/td&gt;
            &lt;td&gt;&quot; . $row[&quot;testcentre&quot;]. &quot;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;/tbody&gt;&quot;;
            }

            echo &quot;&lt;/table&gt;&quot;;
            } else { echo &quot;0 results&quot;; }
            $conn-&gt;close();

            ?&gt;
