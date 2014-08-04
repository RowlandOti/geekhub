


<body> 


<div data-role=page id=home>

  <div data-role=header>

    <h1>Home</h1>

  </div>


  <div data-role=content>

    <ul id=list1 data-role=listview data-inset=true>

      <li data-role=list-divider>Static list</li>

      <li>

        <img src=images/html.jpg />

        <h1> HTML & CSS</h1>

        <p> Eric Sarrion</p>

      </li>

      <li>

        <img src="images/j2ee.jpg" />

        <h3>J2EE</h3>

        <p> Eric Sarrion</p>

      </li>

    </ul>

  </div>

</div>


</body>

</html>


<script>


var html = "";

html += "<ul id=list2 data-role=listview data-inset=true>";

html +=   "<li data-role=list-divider>Dynamic list</li>";

html +=   "<li>";

html +=     "<img src=images/jquery.jpg />";

html +=     "<h3>JQuery & jQuery UI</h3>";

html +=     "<p> Eric Sarrion</p>";

html +=   "</li>";

html += "</ul>";


$("#home div:jqmData(role=content)").append (html);


</script>