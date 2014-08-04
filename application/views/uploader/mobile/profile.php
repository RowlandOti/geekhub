<body class="home">
<!-- Home -->
<div data-role="page" id="profile">
<!--<div data-role="header">
    <h1>Profile</h1>-->
    <!--<a href="#" data-role="button" data-icon="home">Home</a>-->
    <!--<a href="./" data-icon="back" data-iconpos="left" data-direction="reverse" class="ui-btn-right">Back</a>--> <!--</div>-->
  <!-- end header -->
  <nav data-role="navbar">
    <ul>
      <li><a rel="external" href="home" data-rel="dialog" data-icon="home">Home</a></li>
      <li><a rel="external" href="email" data-rel="dialog" data-icon="grid">Email</a></li>
      <li><a rel="external" href="phonebook" data-rel="dialog" data-icon="search">Phonebook</a></li>
      <li><a rel="external" href="calendar" data-rel="dialog" data-icon="star">Calendar</a></li>
    </ul>
  </nav>
  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><a rel="external" href="mynews"><i class="icon-doc"></i> My News</a></li>
      <li><a rel="external" href="myfiles"><i class="icon-calendar"></i> My Files</a></li>
      <li><a rel="external" href="mysales"><i class="icon-calendar"></i> My Sales</a></li>
      <li><a rel="external" href="myevents"><i class="icon-calendar"></i> My Events</a></li>
      <li><a rel="external" href="mysettings"><i class="icon-football"></i> Settings</a></li>
    </ul>
    <div data-role="footer" data-position="fixed">
<h4><a href="<?php echo site_url();?>profile/logout">Logout</a></h4>
</div>
  </div>
  <!-- end content --> 
</div>
<!-- end page --> 