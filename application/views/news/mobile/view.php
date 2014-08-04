<body>
    <div data-role="page" id="news_article">
        <div data-role="header">
            <h1><?php echo $title; ?></h1><a href="./" data-icon="back" data-iconpos="left" data-direction="reverse" class="ui-btn-right">Back</a>
        </div>
        <div data-role="content">
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=305382892902636";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            <?php echo $mobinewsitem; ?>
        </div><!-- /content -->
    </div>
     <div data-role="footer">
<h4>Footer of view = news</h4>
</div>
