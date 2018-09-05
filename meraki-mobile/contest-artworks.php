<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='CONTEST';
    include 'header-up.php';
    include '../modul/imageModule.php';
    
 
?>
        <div class="mobile-content">
                    <?php
                        $contest = new setting();
                         $contest->idSetting = 'contestTitle';
                         $contest->selectSetting();
                    ?>
                    <p style="color: #f2b72d; text-align: center; font-size: 4vw;margin-bottom: 10px;"><b><?php echo $contest->settingDescription; ?></b></p>
                
                    <div class="text-contest">
                     <?php
                         $contest->idSetting = 'contestDescription';
                         $contest->selectSetting();
                    ?>
                    <?php echo $contest->settingDescription; ?>
                  </div>
          </div>
         <div class="mobile-content">
              <div class="the-head">
                                <b>SUBMITTED ARTWORKS</b>
                      </div>
                            <?php
    $image = new image();
    $image->imageType = "contest";
    $image->imageDescription = "no description";
    $rowsPerPage = 100;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
    $pageNum = $_GET['page'];
    }
    $sort = "DESC";
    $offset = ($pageNum - 1) * $rowsPerPage;
    $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);

                        for($i = 0; $i < count($imageView); $i++){    

                          if($i % 3 == 2){
                      ?>
                        <div class="the-picture-r" style="background-image: url(http://meraki.co.id/uploaded_images/contest/0/<?php echo $imageView[$i]->imageUrl; ?>);  background-size: cover;">
                            
                        </div>
                    <?php
                          }else{
                    ?>
                        <div class="the-picture" style="background-image: url(http://meraki.co.id/uploaded_images/contest/0/<?php echo $imageView[$i]->imageUrl; ?>);  background-size: cover;">
                            
                        </div>
                    <?php
                          }
                        }
                    ?>
                            
                        
                         <script type="text/javascript">
                            var divWidth = $('.the-picture').width(); 

                            $('.the-picture').height(divWidth);

                            var divWidth = $('.the-picture-r').width(); 

                            $('.the-picture-r').height(divWidth);
                            
                        </script>
                        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Contest"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Contest"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>