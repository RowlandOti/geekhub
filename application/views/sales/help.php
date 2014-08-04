 <!DOCTYPE html> 

<html> 

<head> 

  <meta name=viewport content="user-scalable=no,width=device-width" />

  <link rel=stylesheet href=jquery.mobile/jquery.mobile.css />

  <script src=jquery.js></script>

  <script src=jquery.mobile/jquery.mobile.js></script>

</head> 


<body> 


<div data-role=page id=home>

  <div data-role=header>

    <h1>Home</h1>

  </div>


  <div data-role=content>

    <p> Window content </p>  

    <ul data-role=listview data-inset=true>

      <li data-role=list-divider data-icon=arrow-d>

        <a href=#> List 1 </a></li>

      <li> Element 1.1 </li>

      <li> Element 1.2 </li>

      <li> Element 1.3 </li>

      <li> Element 1.4 </li>

      <li> Element 1.5 </li>

      <li data-role=list-divider data-icon=arrow-d>

        <a href=#> List 2 </a></li>

      <li> Element 2.1 </li>

      <li> Element 2.2 </li>

      <li> Element 2.3 </li>

      <li> Element 2.4 </li>

      <li> Element 2.5 </li>

      <li data-role=list-divider data-icon=arrow-d>

        <a href=#> List 3 </a></li>

      <li> Element 3.1 </li>

      <li> Element 3.2 </li>

      <li> Element 3.3 </li>

      <li> Element 3.4 </li>

      <li> Element 3.5 </li>

    </ul>

  </div>

</div>


</body>

</html>


<script>


$("li:not(:jqmData(role=list-divider))").hide ();


$("li:jqmData(role=list-divider)").bind ("vclick", function (event)

{

  $(this).nextUntil ("li:jqmData(role=list-divider)").toggle ();

  var $span = $(this).find ("span.ui-icon");

  if ($span.hasClass ("ui-icon-arrow-d")) 

  {

    $span.removeClass ("ui-icon-arrow-d");

    $span.addClass ("ui-icon-arrow-u");

  }

  else 

  {

    $span.removeClass ("ui-icon-arrow-u");

    $span.addClass ("ui-icon-arrow-d");

  }

});


</script>