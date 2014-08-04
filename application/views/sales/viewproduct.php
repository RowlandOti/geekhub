<?php foreach ($images as $image):?>
<h1><?php echo $image['a_name'];?></h1>
<h1><?php echo $image['a_details'];?></h1>
<?php echo '<img src ="'. base_url().'images1/'.$image['a_photo'].'" >";
 endforeach; ?>