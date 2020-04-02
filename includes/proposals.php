<div class="proposal-card-base mp-proposal-card"><!--- proposal-card-base mp-proposal-card Starts --->

	<a href="<?php echo $site_url; ?>/proposals/<?php echo $seller_user_name; ?>/<?php echo $proposal_url; ?>">

	<img src="<?php echo $site_url; ?>/proposals/proposal_files/<?php echo $proposal_img1; ?>" class="img-fluid">

	</a>

	<div class="proposal-card-caption"><!--- proposal-card-caption Starts --->

	<div class="proposal-seller-info"><!--- gig-seller-info Starts --->

	<span class="fit-avatar s24">

	<img src="<?php echo $site_url; ?>/user_images/<?php echo $seller_image; ?>" class="rounded-circle" width="32" height="32">

	</span>

	<div class="seller-info-wrapper">

	    <a href="<?php echo $site_url; ?>/<?php echo $seller_user_name; ?>" class="seller-name"><?php echo $seller_user_name; ?></a>

	    <div class="gig-seller-tooltip">
	    
	    <?php echo $seller_level; ?>

	    </div>

	</div>

	</div><!--- gig-seller-info Ends --->

	<a href="<?php echo $site_url; ?>/proposals/<?php echo $seller_user_name; ?>/<?php echo $proposal_url; ?>" class="proposal-link-main js-proposal-card-imp-data">

	<h3><?php echo $proposal_title; ?></h3>

	</a>

	<div class="rating-badges-container">

	<span class="proposal-rating">

	<svg class="fit-svg-icon full_star" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path></svg>

	<span>

	<strong><?php if($proposal_rating == "0"){ echo "0.0"; }else{ printf("%.1f", $average_rating); } ?></strong>

	(<?php echo $count_reviews; ?>)

	</span>

	</span>

	</div>

	<?php if($seller_status == "online"){ ?>

	<div class="is-online float-right">

	<i class="fa fa-circle"></i> <?= $lang['proposals']['online']; ?>

	</div>

	<?php } ?>

	</div><!--- proposal-card-caption Ends --->

	<footer class="proposal-card-footer"><!--- proposal-card-footer Starts --->

	<div class="proposal-fav">
	
	<?php if($proposal_enable_referrals == "yes" & $enable_referrals == "yes"){ ?>

	<?php if(isset($_SESSION['seller_user_name'])){ ?>
	
	<?php if($proposal_seller_id != $login_seller_id){ ?>

	<a class="icn-list proposal-offer" data-id="<?php echo $proposal_id; ?>">

	<?php require_once("$dir/images/affiliate.svg"); ?>
		
	</a>

	<?php } ?>

	<?php }else{ ?>

	<a class="icn-list" data-toggle="modal" data-target="#login-modal">

	<?php require_once("$dir/images/affiliate.svg"); ?>

	</a>

	<?php } ?>

	<?php } ?>

	<?php if(isset($_SESSION['seller_user_name'])){ ?>

	<?php if($proposal_seller_id != $login_seller_id){ ?>

	<i data-id="<?php echo $proposal_id; ?>" href="#" class="fa fa-heart <?php echo $show_favorite_class; ?>" data-toggle="tooltip" data-placement="top" title="Favorite"></i>

	<?php } ?>

	<?php }else{ ?>

	<a href="#" data-toggle="modal" data-target="#login-modal">
	
	<i class="fa fa-heart dil1" data-toggle="tooltip" data-placement="top" title="Favorite"></i>
	
	</a>
	
	<?php } ?>
	
	</div>

	<div class="proposal-price">

	<a><small><?= $lang['proposals']['starting_at']; ?></small><?= $s_currency; ?><?= $proposal_price; ?></a>

	</div>

	</footer><!--- proposal-card-footer Ends --->

	</div><!--- proposal-card-base mp-proposal-card Ends --->