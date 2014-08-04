<div class="section">  
<?php foreach($files as $file): ?>  
  

    <span><?php echo $file->name?></span>  
    <div style="float: right;">  
        <span><a href="<?php echo base_url();?>files/<?php echo $file->name?>">View</a></span>  
        <span><a href="<?php echo site_url("profile/deleteFile/".$file->id);?>">Delete</a></span>  

    </div>   
       
 
<?php endforeach; ?>   

<?php foreach($news as $newsarticle): ?>  
  
  
    <span><?php echo $newsarticle->title?></span>  
    <div style="float: left;">  
        <span><a href="<?php echo site_url();?>news/view/<?php echo $newsarticle->slug?>">View</a></span>  
        <span><a href="<?php echo site_url("profile/deleteNews/".$newsarticle->id);?>">Delete</a></span>  

    </div>   
       
 
 
<?php endforeach; ?>   
</div> 


