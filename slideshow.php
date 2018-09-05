
<div class="jumbotron masthead">
  <?php
    $image = new image();
    $image->imageHeaderId = "0";
    $image->imageType = "slideshow";
    $rowsPerPage = 14;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
      $pageNum = $_GET['page'];
    }
    $sort = "DESC";
    $offset = ($pageNum - 1) * $rowsPerPage;
    $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);

     $hover = new image();
    
    $hover->imageType = "slideshow-hover";

    for($i = 0; $i < count($imageView); $i++){    

  ?>
    <div class="splash"> 
      <div class="slide" onclick="location.href='<?php echo $imageView[$i]->imageDescription;?>';" style="background-position: center center;background-image: url(uploaded_images/slideshow/<?php echo $imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>); background-size:100% 100%;"></div>
   
    </div>
    
  <?php
    }
  ?>
   <div class="list-bulat">
      <div id="banner-pagination" >
        <ul>
  <?php
    for($i = 0; $i < count($imageView); $i++){   
  ?>
          <li><a href="##" rel="<?php echo $i; ?>"><img src="images/slidedot.png" height="10" alt="slide"></a></li>
  <?php
    }
  ?>
        </ul>
      </div>
   </div>
  
</div> 
<script type="text/javascript"> 
$(document).ready(function () 
  { 
    var showCaseItems = $('.show-case-item').hide(); 
    var splashes = $('.splash').hide(); splashes.eq(0).show(); 
    showCaseItems.eq(0).show(); 
    var prevIndex = -1; 
    var nextIndex = 0; 
    var currentIndex = 0; 
    var variabel = 1; var slidecount = <?php echo count($imageView); ?>; 
    $('#banner-pagination li a').click(function () 
    {
      nextIndex = parseInt($(this).attr('rel')); 
      variabel = nextIndex; if (nextIndex != currentIndex) 
      { 
        $('#banner-pagination li a').html('<img src=images/slidedot.png alt="slide"/>'); 
        $(this).html('<img src=images/slidedot-active.png alt="slide"/>'); 
        currentIndex = nextIndex; 
        if (prevIndex < 0) prevIndex = 0; 
        splashes.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 500, function () {  
          $(this).hide(); 
        }); 
        splashes.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 500, function () { }); 
        showCaseItems.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 500, function () {  
          $(this).hide();  
          showCaseItems.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 200, function () { }); 
        }); 
        prevIndex = nextIndex; 
      } 
      return false; 
    }); 
    setInterval(function(){ nextIndex = variabel % slidecount;  if (nextIndex != currentIndex) { 
      $('#banner-pagination li a').html('<img src=images/slidedot.png alt="slide"/>'); 
      $(this).html('<img src=images/slidedot-active.png alt="slide"/>'); 
      currentIndex = nextIndex; 
      if (prevIndex < 0) prevIndex = 0; splashes.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 1000, function () {  
        $(this).hide(); 
      }); 
      splashes.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 1000, function () { }); 
      showCaseItems.eq(prevIndex).css({ opacity: 1 }).animate({ opacity: 0 }, 1000, function () {  $(this).hide();  
        showCaseItems.eq(nextIndex).show().css({ opacity: 0 }).animate({ opacity: 1 }, 700, function () { }); }); 
      prevIndex = nextIndex; 
    } 
    variabel++; return false; },5000); 
  });
</script>
 