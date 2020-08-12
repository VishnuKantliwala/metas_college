
  <footer id="footer" class="footer bg-black-222" data-bg-img="images/footer-bg.png">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <?	
              $sqlLogo = $cn->selectdb("SELECT `logo_id`, `image_name` FROM  `tbl_logo` where logo_id=2" );
              if ($cn->numRows($sqlLogo) > 0) 
              {
                              $rowLogo = $cn->fetchAssoc($sqlLogo);
                              extract($rowLogo);
              }
            ?>
            <a href="Home/"><img class="mt-10 mb-15" src="logo/big_img/<?echo $image_name?>" alt="Metas college" /></a>
            <?
            $sqlAbt = $cn->selectdb("SELECT page_desc from tbl_page where page_id = 67");
            if( $cn->numRows($sqlAbt) > 0 )
            {
              while($rowAbt = $cn->fetchAssoc($sqlAbt))
              {
                extract($rowAbt);
            ?>
            <p class="font-16 mb-10"><?echo $page_desc ?></p>
            <a class="font-14" href="institute-details"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            <?
              }
            }
            
            ?>
            
          </div>
        </div>
        <?php
            $sql="SELECT blog_name,slug,bdate,blog_image,description FROM tbl_blog ORDER BY recordListingID LIMIT 3";
            $result = $cn->selectdb($sql);
            if($cn->numRows($result)>0)
            {
              
        ?>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
              <?
              while($row=$cn->fetchAssoc($result))
              {
                $href = "news/".urlencode($row['slug']);

              ?>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="<?php echo $row['blog_name'];?>" style="height:55px;width:90px;overflow:hidden;object-fit:cover" src="blog/big_img/<?php echo $row['blog_image'];?>"></a>
                <div class="post-right">
                
                  <h5 class="post-title mt-0 mb-5"><a href="<?echo $href?>"><?php echo substr($row['blog_name'],0,30);?></a></h5>
                  <p class="post-date mb-0 font-12"><?php echo date('d F Y', strtotime($row['bdate']));?></p>
                </div>
              </article>
              <?
              }
              ?>
             
            </div>
          </div>
        </div>
        <?
            }
        ?>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Useful Links</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="institute-details">Institute details</a></li>
              <li><a href="application-for-ug-pg-phd/1/">Application for UG/PG/PHD</a></li>
              <li><a href="research-and-development">Research and Development</a></li>
              <li><a href="students-corner">Student Corner</a></li>
              <li><a href="photo-gallery">Media Center</a></li>
            </ul>
          </div>
        </div>
        <?
        $sqlContact = $cn->selectdb("SELECT `con_id`, `maptag`, `contact_desc`, `email`, `contact_no`, `opening_hours`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords` FROM  `tbl_contact` where con_id=1" );
        //	echo $cn->numRows($sql2);
        if ($cn->numRows($sqlContact) > 0) 
        {
          $rowContact = $cn->fetchAssoc($sqlContact);
         extract($rowContact);
        }
        ?>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            <ul class="list-border">
              <li><a href="tel:<?echo $contact_no ?>"><?echo $contact_no ?></a></li>
              <li><a href="mailto:<?echo $email ?>"><?echo $email ?></a></li>
              <li><a href="javascript:void(0)" class="lineheight-20"><?echo strip_tags($contact_desc) ?></a></li>
            </ul>
            <ul class="styled-icons icon-dark mt-20">
              <?
                  $sql = $cn->selectdb("SELECT * from tbl_socialmedia order by recordListingID");
                  while($row = $cn->fetchAssoc($sql))
                  {
                      extract($row);
              ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="<?echo $link_url?>" data-bg-color="#3B5998"><i class="fa <?echo $description?>"></i></a></li>
              <?
                  }
              ?>
              
              
            </ul>
            
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">© Copyrights 2020 by <a href="http://icedinfotech.com/" style="color:#fff" target="_blank">ICED Infotech</a>. All Rights Reserved.</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="faqs">FAQ</a>
                </li>
                <li>|</li>
                <!-- <li>
                  <a href="#">Help Desk</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#">Support</a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper --> 

<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) --> 
<?
if($page_id == 1)
{
?>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script> 

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script> 

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script> 

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script> 


<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script> 

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script> 
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script> 
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script> 
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
<?
}
?>

</body>

</html>