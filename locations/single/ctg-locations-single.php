<?php 

global $post;
$id = get_post_meta($post->ID, '_ctg_location_id', true );
$owner_id = get_post_meta( $post->ID, '_ctg_owner_id', true );
$owner = new CTG_Members_Member($owner_id);
$location = new CTG_Locations_Location($id);
$tc_link = "";
$members = ctg_members_get_members_by_location_id($id);
$gm_api_key = get_option( 'ctg_gm_api_key' );
$maps_address = implode(
	"%20",
	array(
		str_replace( " ", "%20", $location->street_primary ),
		str_replace( " ", "%20", $location->street_secondary ),
		str_replace( " ", "%20", $location->city ),
		$location->state,
		$location->zip,
	)
);

if ( isset( $location->tc_link ) ) {
	$tc_link = $location->tc_link;
} else {
	$tc_link = "https://celebrationtitlegroup.titlecapture.com/login";
}

?>
<section>
	<div id="ctg-confetti-canvas-container">
		<canvas id="ctg-confetti-canvas"></canvas>
		<div id="ctg-confetti-text">
			<h1><?php echo "Welcome to {$location->location_name}"; ?></h1>
			<h2 class="ctg-confetti-text-rotation-heading" data-start-text="Where every " data-end-text=" is a Celebration" data-rotating-text="transaction, interaction, single action"></h2>
		</div>
	</div>
</section>
<section class="ctg-flex-container rowwrap jc-sa ai-c colgapm ctg-fullwidth ctg-padding-xl ctg-pos-rel">
	<div class="ctg-flex-item half ctg-padding-l ctg-content-card ctg-background-black">
		<div class="">
			<h1 class="ctg-scroll-based-heading ctg-color-white" data-text="What makes us different"></h1>
		</div>

		<div class="ctg-margin-l">
			<div class="">
				<p class="ctg-fontsize-l ctg-fontweight-light ctg-line-height-xl ctg-color-white">
					When it comes to title services, Celebration Title Group is the best in the business.
				</p>
				<p class="ctg-fontsize-l ctg-fontweight-light ctg-line-height-xl ctg-color-white">
					Our team has over a decade of experience doing business in title, and will make sure that you get to celebrate the big moments, and the little ones.
				</p>
				<p class="ctg-fontsize-l ctg-fontweight-light ctg-line-height-xl ctg-color-white">
					The title process is archaic; but it doesn&#8217;t have to be difficult or boring. We are devoted to making sure your transactions get to the closing table, and that you get to focus on the things that matter. We&#8217;ll handle the rest!
				</p>
				<p class="ctg-fontsize-l ctg-fontweight-light ctg-line-height-xl ctg-color-white">
					After we get you safely to the closing table, everyone is invited to celebrate the signing with our original Confetti Cannon Closing Experience™! (Don&#8217;t worry – we brought vacuums!)
				</p>
			</div>
		</div>
	</div>
	<div class="ctg-flex-item third ctg-margin-l ctg-headshot-card ctg-flex-container ai-c jc-c">
		<div class="ctg-flex-container colnowrap ai-c jc-c ctg-fullwidth ctg-anim float-infinite" style="">
			<div class="ctg-owner-headshot-wrapper">
				<div class="ctg-owner-headshot-container ctg-margin-m ctg-flex-item">
					<img decoding="async" width="250" height="250"
						 src="<?php echo $owner->headshot_url; ?>"
						 class="attachment-full size-full ctg-bs-m ctg-rounded-half ctg-owner-headshot" alt="" loading="lazy"
						 sizes="(max-width: 400px) 80vw, 200px" />
					<div class="ctg-flip-callout">
						<p>
							Celebrate with Us!
						</p>
					</div>
				</div>
			</div>
			<div class="ctg-flex-item ctg-flex-container colnowrap ctg-background-white ctg-content-card">
				<div class="ctg-flex-container colnowrap ai-c">
					<h2 class="ctg-text-center">
						<?php echo "{$owner->first_name} {$owner->last_name}";  ?>
					</h2>
				</div>

				<div class="ctg-flex-container colnowrap ai-c">
					<h3 class="ctg-text-center">
						<?php echo "{$owner->job_title}"; ?>
					</h3>
				</div>
				<div class="ctg-flex-container colnowrap ai-c jc-c ctg-fullwidth">
					<h6 class="ctg-text-center">Celebration Title Group</h6>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ctg-flex-container colnowrap jc-s ai-c colgapm ctg-fullwidth ctg-padding-xl ctg-pos-rel ctg-background-black">
	<div class="ctg-flex-item ctg-margin-l">
		<div class="ctg-color-white">
			<div class="ctg-color-white">
				<h1 class="ctg-scroll-based-heading ctg-color-white" data-text="Get an Estimate in Seconds"></h1>
			</div>
			<div class="ctg-padding-l ctg-fontsize-l ctg-fontweight-light ctg-max-l">
				<p>
					We have a service available to you completely for free that lets you pull an estimate for closing with us in just a few clicks. 
				</p>
				<p>
					We aim to make closing with us as simple and painless as possible, and part of that objective is making sure that there are no surprises (except for the celebration at the closing table)!
				</p>
			</div>
			<div class="ctg-fullwidth ctg-flex-container jc-c">
				<a href="<?php echo $tc_link; ?>"
				   class="ctg-button-tertiary ctg-margin-auto ctg-i-block">
					Open Closing Cost Calculator
				</a>
			</div>
		</div>
	</div>
	<div class="ctg-flex-item full ctg-fullwidth ctg-margin-xl">
		<div 
			 class="ctg-flex-container jc-c ai-c"
			 id="ctg-net-sheets-app-image-container"
			 >
			<img 
				 decoding="async" 
				 width="2796" 
				 height="883"
				 src="https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop.png"
				 class="ctg-pos-rel ctg-max-l" 
				 alt="Laptop Mockup of Closing Cost Calculator App" 
				 loading="lazy"
				 srcset="https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop.png 2796w, https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop-300x95.png 300w, https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop-1024x323.png 1024w, https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop-768x243.png 768w, https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop-1536x485.png 1536w, https://celebrationtitlegroup.com/wp-content/uploads/2021/06/Laptop-2048x647.png 2048w"
				 sizes="(max-width: 2796px) 100vw, 2796px"
				 id="ctg-net-sheets-app-image"
				 />
		</div>
	</div>
</section>

<section class="ctg-flex-container colnowrap ctg-padding-xl">
	<div class="ctg-flex-item ctg-margin-m">
		<div class="">
			<h3 class="ctg-scroll-based-heading" data-text="So What Do We Do?"></h3>
		</div>
		<div class="ctg-padding-m ctg-max-l ctg-margin-auto">
			<p class="ctg-text-center ctg-fontweight-light ctg-fontsize-l">
				A little bit of everything! Marketing assistance, educational content, co-branded marketing campaigns, and much, much more. Click through some of our perks here for more information.
			</p>
		</div>
	</div>

	<div class="ctg-flex-container rowwrap jc-se ai-c ctg-margin-m">
		<div class="ctg-flex-item quarter">
			<div class="ctg-expandable">
				<div class="ctg-expandable-heading ctg-background-black ctg-rounded-s">
					<h4 class="ctg-text-center">Title Insurance</h4>
				</div>

				<div class="ctg-expandable-content ctg-background-lightgrey" style="display:none;">
					<p class="ctg-fontweight-light">This insurance provides homebuyers and lenders with vital protection against losses from certain title issues including forgery, fraud, and liens – problems that might limit a homeowner’s use and enjoyment of their property.
					</p>
				</div>
			</div>
		</div>
		<div class="ctg-flex-item quarter">
			<div class="ctg-expandable">
				<div class="ctg-expandable-heading ctg-background-black ctg-rounded-s">
					<h4 class="ctg-text-center">Escrow Settlement</h4>
				</div>
				<div class="ctg-expandable-content ctg-background-lightgrey" style="display:none;">
					<p class="ctg-fontweight-light">To convey a property from a seller to a buyer, or encumber a property with a new mortgage, we provide escrow and settlement services as a neutral third party to the transaction.
					</p>
				</div>	
			</div>
		</div>
		<div class="ctg-flex-item quarter">
			<div class="ctg-expandable">
				<div class="ctg-expandable-heading ctg-background-black ctg-rounded-s">
					<h4 class="ctg-text-center">Operational Excellence</h4>
				</div>
				<div class="ctg-expandable-content ctg-background-lightgrey" style="display:none;">
					<p class="ctg-fontweight-light">We have a vast set of tools at our disposal to help us make your transactions go smoother, and to help maintain transaction transparency. We're strongly dedicated to making your closing as swift, safe, and secure as possible. We don't cut corners when it comes to celebrating!</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ( $members ) { ?>
<section class="ctg-flex-container jc-c ai-c colnowrap ctg-margin-l">
	<div class="ctg-margin-m">
		<h3 class="ctg-scrollable-text" data-scroll-text="Original. Celebration. Experience. "></h3>
	</div>
	<div class="">
		<h2 class="ctg-confetti-text-rotation-heading" 
			data-start-text="Meet Our " 
			data-end-text=" Team" 
			data-rotating-text="amazing, exuberant, talented, fantastic"></h2>
	</div>
	<div class="ctg-margin-m">
		<h3 class="ctg-scrollable-text" data-scroll-text="Original. Celebration. Experience."></h3>
	</div>
	<div class="ctg-member-contact-card-collection">
		<?php
	foreach( $members as $member ) { ?>

		<div class="ctg-member-contact-card-container">
			<div class="ctg-member-contact-card-headshot-container">
				<img decoding="async" 
					 width="150"
					 height="150"
					 src="<?php echo $member['headshot_url']; ?>"
					 class=""
					 alt="<?php echo "{$member['first_name']}'s Headshot"; ?>" 
					 loading="lazy"
					 />
			</div>
			<div class="ctg-member-contact-card-name-container">
				<h3 class="ctg-member-contact-card-name">
					<?php echo "{$member['first_name']} {$member['last_name']}" ?>
				</h3>
			</div>		
			<div class="ctg-member-contact-card-job-title-container">
				<h4 class="ctg-member-contact-card-job-title">
					<?php echo $member['job_title']; ?>
				</h4>
				<h5 class="ctg-member-contact-card-location-name">
					<?php echo $location->location_name; ?>
				</h5>
			</div>
			<div class="ctg-member-contact-card-email-container">
				<a 
				   class="ctg-member-contact-card-email" 
				   href="mailto:<?php echo $member['email']; ?>">
					Email Me
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
<section class="ctg-flex-container ctg-background-black ctg-color-white jc-se ai-c ctg-padding-xl">
	<div class="ctg-flex-item half">
		<div class="">
			<h2 class="">
				Celebrate With Us!</h2>
		</div>

		<div class="">
			<h3 class="ctg-color-white">
				<?php echo $location->location_name; ?></h3>
		</div>

		<div class="">
			<address class="ctg-fontweight-light ctg-fontsize-m">
				<?php echo $location->street_primary; ?><br>
				<?php echo $location->street_secondary ? "{$location->street_secondary}<br>" : ''; ?>
				<?php echo "{$location->city}, {$location->state} {$location->zip}"; ?><br>

				<a class="" 
				   href="tel:<?php echo preg_replace('/\(\)\-\s/', '', $location->phone ); ?>">
					<?php echo $location->phone; ?>
				</a><br>
				<a class="ctg-email-on-dark"
				   href="mailto:<?php echo $location->email; ?>" target="_blank"
				   rel="noopener noreferrer" data-auth="NotApplicable"
				   data-linkindex="0"><?php echo $location->email;?></a>
			</address>
		</div>
	</div>
	<div class="ctg-flex-item half">
		<div class="ctg-fullwidth">
			<?php if ($gm_api_key) { ?>
			<iframe loading="lazy"
					allowfullscreen
					src="https://maps.google.com/maps/embed/v1/place?key=<?php echo $gm_api_key; ?>&zoom=14&q=<?php echo $maps_address; ?>"
					width="400px"
					height="400px"
					referrerpolicy="no-referrer-when-downgrade"
					title="<?php echo $maps_address; ?>"
					aria-label="<?php echo $maps_address; ?>"
					style="filter:grayscale(100%);width:100%;max-height:50vh;min-height:200px;">
			</iframe>
			<?php } ?>
		</div>
	</div>
</section>

<?php 
