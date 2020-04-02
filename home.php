<?php
$get_section = $db->select("home_section",array("language_id" => $siteLanguage));
$row_section = $get_section->fetch();
$count_section = $get_section->rowCount();
$section_heading = $row_section->section_heading;
$section_short_heading = $row_section->section_short_heading;
$get_slides = $db->query("select * from home_section_slider LIMIT 0,1");
$row_slides = $get_slides->fetch();
$slide_id = $row_slides->slide_id; 
$slide_image = $row_slides->slide_image; 
?>
<!-- start main -->
    <div id="demo1" class="main carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#demo1" data-slide-to="0" class="active"></li>
    <?php
    $count_slides = $db->count("home_section_slider");
    $i = 0;
    $get_slides = $db->query("select * from home_section_slider LIMIT 1,$count_slides");
    while($row_slides = $get_slides->fetch()){
    $i++;
    ?>
    <li data-target="#demo1" data-slide-to="<?php echo $i; ?>"></li>
    <?php } ?>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-caption">
        <h1><?php echo $section_heading; ?></h1>
        <h5><?php echo $section_short_heading; ?></h5>
        <div class="row">
        <div class="offset-md-3 col-md-5 col-12">
            <form action="" method="post">
                <div class="input-group space20">
                <input type="text" name="search_query" class="form-control" value="<?php echo @$_SESSION["search_query"]; ?>" placeholder="<?php echo $lang['search']['placeholder']; ?>">
                    <div class="input-group-append move-icon-up">
                    <button name="search" type="submit" class="search_button">
                    <img src="images/srch2.png" class="srch2">
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
       <?php
        $get_slides = $db->query("select * from home_section_slider LIMIT 0,1");
        while($row_slides = $get_slides->fetch()){
        $slide_image = $row_slides->slide_image;
    ?>
      <div class="carousel-item active">
        <img src="home_slider_images/<?php echo $slide_image; ?>">
      </div>
    <?php } ?>
    <?php
    $get_slides = $db->query("select * from home_section_slider LIMIT 1,$count_slides");
    while($row_slides = $get_slides->fetch()){
    $slide_image = $row_slides->slide_image;
    ?>
    <div class="carousel-item ">
       <img src="home_slider_images/<?php echo $slide_image; ?>" >
    </div>
    <?php } ?>
    </div>
     <a class="carousel-control-prev " href="#demo1" data-slide="prev" style="width: 6%; opacity: 1;">
        <i class="fa fa-arrow-circle-o-left fa-3x"></i>
      </a>
      <a class="carousel-control-next" href="#demo1" data-slide="next" style="width: 6%; opacity: 1;">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </a>
    </div>
    <!-- end main -->
    <!-- start market -->
    <div class="container mb-5 cards" style="max-width: 1360px !important;">
    <div class="row">
    <div class="col-md-12">
    <h1 class="mt-5 mb-1 <?=($lang_dir == "right" ? 'text-right':'')?>"><?php echo $lang['home']['cards']['title']; ?></h1>
    <p class="subHeading mb-4 <?=($lang_dir == "right" ? 'text-right':'')?>"><?php echo $lang['home']['cards']['desc']; ?></p>
    <div class="owl-carousel home-cards-carousel owl-theme"><!--- owl-carousel home-cards-carousel Starts --->
    <?php
        $get_cards = $db->select("home_cards",array("language_id" => $siteLanguage));
        while($row_cards = $get_cards->fetch()){
        $card_id = $row_cards->card_id;
        $card_title = $row_cards->card_title;
        $card_desc = $row_cards->card_desc;
        $card_image = $row_cards->card_image;
        $card_link = $row_cards->card_link;
     ?>
    <div class="card-box">
    <div>
    <a href="<?php echo $card_link; ?>" class="subcategory">
    <h4><small><?php echo $card_desc; ?></small><?php echo $card_title; ?></h4>
    <picture>
    <img src="card_images/<?php echo $card_image; ?>">
    </picture>
    </a>
    </div>
    </div>
    <?php } ?>
    </div><!--- owl-carousel home-cards-carousel Ends --->
    </div>
    </div>
    </div>
    <!-- start market -->
    <section class="market">
      <div class="container" style="max-width: 1360px !important;">
        <div class="row">
          <div class="col-md-12">
            <h2><?php echo $lang['home']['categories']['title']; ?></h2>
            <h4><?php echo $lang['home']['categories']['desc']; ?></h4>
            <div class="row space80">
              <?php
              $get_categories = $db->query("select * from categories where cat_featured='yes' ".($lang_dir == "right" ? 'order by 1 DESC LIMIT 4,4':' LIMIT 0,4')."");
              while($row_categories = $get_categories->fetch()){
              $cat_id = $row_categories->cat_id;
              $cat_image = $row_categories->cat_image;
              $cat_url = $row_categories->cat_url;
              $get_meta = $db->select("cats_meta",array("cat_id" => $cat_id, "language_id" => $siteLanguage));
              $row_meta = $get_meta->fetch();
              $cat_title = $row_meta->cat_title;
               ?>
              <div class="col-md-3 col-6">
                <a href="categories/<?php echo $cat_url; ?>">
                <div class="grn_box">
                  <img src="cat_images/<?php echo $cat_image; ?>" class="mx-auto d-block">
                  <p><?php echo $cat_title; ?></p>
                </div>
                </a>
              </div>
              <?php } ?>
            </div>
            <div class="space80 hidden-xs"></div>
            <div class="space20 visible-xs"></div>
            <div class="row space80">
             <?php
              $get_categories = $db->query("select * from categories where cat_featured='yes' ".($lang_dir == "right" ? 'order by 1 DESC LIMIT 0,4':' LIMIT 4,4')."");
              while($row_categories = $get_categories->fetch()){
              $cat_id = $row_categories->cat_id;
              $cat_image = $row_categories->cat_image;
              $cat_url = $row_categories->cat_url;
              $get_meta = $db->select("cats_meta",array("cat_id" => $cat_id, "language_id" => $siteLanguage));
              $row_meta = $get_meta->fetch();
              $cat_title = $row_meta->cat_title;
              ?>
              <div class="col-md-3 col-6">
                <a href="categories/<?php echo $cat_url; ?>">
                <div class="grn_box">
                  <img src="cat_images/<?php echo $cat_image; ?>" class="mx-auto d-block">
                  <p><?php echo $cat_title; ?></p>
                </div>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end market -->
    <!-- start timer -->
  <section class="timer">
  <div class="container" style="max-width: 1335px !important;">
    <div class="row">
      <?php
      $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 0,1");
      while($row_boxes = $get_boxes->fetch()){
      $box_id = $row_boxes->box_id;
      $box_title = $row_boxes->box_title;
      $box_desc = $row_boxes->box_desc;
      $box_image = $row_boxes->box_image; 
      ?>
      <div class="col-md-4 pad0">
          <div class="box">
              <h5>
                  <?php echo $box_title; ?>
              </h5>
              <p>
                  <?php echo $box_desc; ?>
              </p>
          </div>
      </div>
      <div class="col-md-4 pad0">
          <div class="blu_box">
              <img src="box_images/<?php echo $box_image; ?>" class="img-fluid mx-auto d-block">
          </div>
      </div>
      <?php } ?>
      <?php
          $get_boxes = $db->query("select * from section_boxes where language_id='$siteLanguage' LIMIT 1,100");
          while($row_boxes = $get_boxes->fetch()){
          $box_id = $row_boxes->box_id;
          $box_title = $row_boxes->box_title;
          $box_desc = $row_boxes->box_desc;
          $box_image = $row_boxes->box_image; 
      ?>
          <div class="col-md-4 pad0">
              <div class="box">
                  <h5>
                      <?php echo $box_title; ?>
                  </h5>
                  <p>
                      <?php echo $box_desc; ?>
                  </p>
              </div>
          </div>
          <div class="col-md-4 pad0">
              <div class="blu_box1">
                  <img src="box_images/<?php echo $box_image; ?>" class="img-fluid mx-auto d-block">
              </div>
          </div>
          <?php } ?>
    </div>
  </div>
</section>
<!-- end timer -->
<!-- start top -->
<section class="top">
  <div class="container" style="max-width: 1360px !important;">
    <div class="row">
      <div class="col-md-12">
          <h1 class="text-center"><?php echo $lang['home']['proposals']['title']; ?></h1>
          <h4 class="text-center"><?php echo $lang['home']['proposals']['desc']; ?></h4>
          <div class="owl-carousel home-featured-carousel owl-theme mt-5">
              <?php
              $get_proposals = $db->query("select * from proposals where proposal_featured='yes' AND proposal_status='active' LIMIT 0,15");
              while($row_proposals = $get_proposals->fetch()){
              $proposal_id = $row_proposals->proposal_id;
              $proposal_title = $row_proposals->proposal_title;
              $proposal_price = $row_proposals->proposal_price;
              if($proposal_price == 0){
              $get_p_1 = $db->select("proposal_packages",array("proposal_id" => $proposal_id,"package_name" => "Basic"));
              $proposal_price = $get_p_1->fetch()->price;
              }
              $proposal_img1 = $row_proposals->proposal_img1;
              $proposal_video = $row_proposals->proposal_video;
              $proposal_seller_id = $row_proposals->proposal_seller_id;
              $proposal_rating = $row_proposals->proposal_rating;
              $proposal_url = $row_proposals->proposal_url;
              $proposal_featured = $row_proposals->proposal_featured;
              $proposal_enable_referrals = $row_proposals->proposal_enable_referrals;
              $proposal_referral_money = $row_proposals->proposal_referral_money;
              if(empty($proposal_video)){
              $video_class = "";
              }else{
              $video_class = "video-img";
              }
              $get_seller = $db->select("sellers",array("seller_id" => $proposal_seller_id));
              $row_seller = $get_seller->fetch();
              $seller_user_name = $row_seller->seller_user_name;
              $seller_image = $row_seller->seller_image;
              $seller_level = $row_seller->seller_level;
              $seller_status = $row_seller->seller_status;
              if(empty($seller_image)){
              $seller_image = "empty-image.png";
              }
              // Select Proposal Seller Level
              @$seller_level = $db->select("seller_levels_meta",array("level_id"=>$seller_level,"language_id"=>$siteLanguage))->fetch()->title;
              $proposal_reviews = array();
              $select_buyer_reviews = $db->select("buyer_reviews",array("proposal_id" => $proposal_id));
              $count_reviews = $select_buyer_reviews->rowCount();
              while($row_buyer_reviews = $select_buyer_reviews->fetch()){
                  $proposal_buyer_rating = $row_buyer_reviews->buyer_rating;
                  array_push($proposal_reviews,$proposal_buyer_rating);
              }
              $total = array_sum($proposal_reviews);
              @$average_rating = $total/count($proposal_reviews);
          ?>
      <?php require("includes/proposals.php"); ?>
      <?php } ?>
      </div>
      </div>
    </div>
  </div>
</section>