<html>
<head>
    <title>ITX.WEB.ID</title>
    <base href="<?php echo base_url(); ?>" />
	<link type="text/css" rel="stylesheet" href="cssjs/flick/jquery-ui-1.8.2.custom.css" />
    <link type="text/css" rel="stylesheet" href="cssjs/styles.css" />
</head>
<body>
<script type="text/javascript" >
$( function() {
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });

    $.ajax({
        url: 'index.php/book_con/readBook',
        dataType: 'json',
        success: function( response ) {
            $( '#readTemp' ).render( response ).appendTo( "#tabel" );
        }
    });

    $.ajax({
        url: 'index.php/book_con/readMember',
        dataType: 'json',
        success: function( response ) {
            $( '#readTemp2' ).render( response ).appendTo( "#tabel2" );
        }
    });

});
</script>
<center><h2> Book & Member List</h2></center>
<div id="tabs">

    <ul>
        <li><a href="#read">Book List</a></li>
		<li><a href="#read2">Member List</a></li>
    </ul>

    <div id="read">
        <table id="tabel"></table>
    </div>

	<div id="read2">
        <table id="tabel2"></table>
    </div>

</div>

<script type="text/javascript" src="cssjs/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="cssjs/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="cssjs/jquery-templ.js"></script>

<script type="text/template" id="readTemp">
    <tr>
        <td>${id}</td>
        <td>${title}</td>
        <td>${author}</td>
    </tr>

</script>

<script type="text/template" id="readTemp2">
    <tr>
        <td>${no}</td>
        <td>${name}</td>
        <td>${address}</td>
    </tr>

</script>

<script type="text/javascript" src="cssjs/all.js"></script>
</body>
</html>