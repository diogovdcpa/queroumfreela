<!-- start footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-12">
      <h3 data-toggle="collapse" data-target="#collapsecategories"><?php echo $lang['categories']; ?></h3>
      <ul class="collapse show list-unstyled" id="collapsecategories">
      <?php
      $get_footer_links = $db->query("select * from footer_links where link_section='categories' AND language_id='$siteLanguage'  LIMIT 0,4");
      while($row_footer_links = $get_footer_links->fetch()){
      $link_id = $row_footer_links->link_id;
      $link_title = $row_footer_links->link_title;
      $link_url = $row_footer_links->link_url;
      ?>
      <li class="list-unstyled-item"><a href="<?php echo $link_url; ?>"><?php echo $link_title; ?></a></li>
      <?php } ?>
      </ul>
      </div>
      <div class="col-md-2 col-12">
        <h3 class="h3Border" data-toggle="collapse" data-target="#collapseabout"><?php echo $lang['about']; ?></h3>
        <ul class="collapse show list-unstyled" id="collapseabout">
        <?php
        $get_footer_links = $db->select("footer_links",array("link_section" => "about","language_id" => $siteLanguage));
        while($row_footer_links = $get_footer_links->fetch()){
        $link_id = $row_footer_links->link_id;
        $icon_class = $row_footer_links->icon_class;
        $link_title = $row_footer_links->link_title;
        $link_url = $row_footer_links->link_url;
        ?>
        <li class="list-unstyled-item"><a href="<?php echo $link_url; ?>"><i class="fa <?= $icon_class; ?>"></i> <?php echo $link_title; ?></a></li>
        <?php } ?>
        </ul>
      </div>
      <div class="col-md-3 col-12">
        <h3 class="h3Border" data-toggle="collapse" data-target="#collapsecategories2"><?php echo $lang['categories']; ?></h3>
        <ul class="collapse show list-unstyled" id="collapsecategories2">
        <?php
        $get_footer_links = $db->query("select * from footer_links where link_section='categories' AND language_id='$siteLanguage' LIMIT 4,400");
        while($row_footer_links = $get_footer_links->fetch()){
        $link_id = $row_footer_links->link_id;
        $link_title = $row_footer_links->link_title;
        $link_url = $row_footer_links->link_url;
        ?>
          <li class="list-unstyled-item"><a href="<?php echo $link_url; ?>"><?php echo $link_title; ?></a></li>
        <?php } ?>
        </ul>
      </div>
      <div class="col-md-4 col-12">
        <h3 class="h3Border" data-toggle="collapse" data-target="#collapsefindusOn"><?php echo $lang['find_us_on']; ?></h3>
        <div class="collapse show" id="collapsefindusOn">
          <ul class="list-inline social_icon">
          <?php
          $get_footer_links = $db->select("footer_links",array("link_section" => "follow","language_id" => $siteLanguage));
          while($row_footer_links = $get_footer_links->fetch()){
          $link_id = $row_footer_links->link_id;
          $icon_class = $row_footer_links->icon_class;
          $link_url = $row_footer_links->link_url;
          ?>
          <li class="list-inline-item"><a href="<?php echo $link_url; ?>"><i class="fa <?= $icon_class; ?>"></i></a></li>
          <?php } ?>
          </ul>
          <div class="form-group mt-1">
          <select id="languageSelect" class="form-control">
          <?php 
          $get_languages = $db->select("languages");
          while($row_languages = $get_languages->fetch()){
          $id = $row_languages->id;
          $title = $row_languages->title;
          $image = $row_languages->image;
          ?>
          <option data-image="<?php echo $site_url; ?>/languages/images/<?php echo $image; ?>" data-url="<?php echo "$site_url/change_language?id=$id"; ?>" <?php if($id == $_SESSION["siteLanguage"]){ echo "selected"; } ?>>
          <?php echo $title; ?>
          </option>
          <?php } ?>
          </select>
          </div>
          <h5><?php echo $lang['mobile_apps']; ?></h5>
          <img src="<?php echo $site_url; ?>/images/google.png" class="pic">
          <img src="<?php echo $site_url; ?>/images/app.png" class="pic1">
        </div>
      </div>
    </div>
  </div>
  <br>
</footer>
<!-- end footer -->
<section class="post_footer">
<?php echo $db->select("general_settings")->fetch()->site_copyright; ?>
</section>

<?php if(!isset($_COOKIE['close_cookie'])){ ?>
<section class="clearfix cookies_footer row animated slideInLeft">
<div class="col-md-4">
<img src="<?php echo $site_url; ?>/images/cookie.png" class="img-fluid" alt="">
</div>
<div class="col-md-8">
<div class="float-right close btn btn-sm"><i class="fa fa-times"></i></div>
<h4 class="mt-0 mt-lg-2 <?=($lang_dir == "right" ? 'text-right':'')?>"><?php echo $lang["cookie_box"]['title']; ?></h4>
<p class="mb-1 "><?php echo str_replace('{link}',"$site_url/terms_and_conditions",$lang["cookie_box"]['desc']); ?></p>
<a href="#" class="btn btn-success btn-sm"><?php echo $lang["cookie_box"]['button']; ?></a>
</div>
</section>
<?php } ?>

<section class="messagePopup animated slideInRight"></section>
<link rel="stylesheet" href="<?php echo $site_url; ?>/styles/msdropdown.css"/>
<?php require("footerJs.php"); ?>