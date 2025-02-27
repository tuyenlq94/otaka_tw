<?php
/* Template Name: ブランドトップページ */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link
		href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@400;700&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="../css/lye5orr.css">
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/common.min.css">
	<link rel="stylesheet" type="text/css" href="../css/parts.min.css">
	<!-- local css -->
	<link rel="stylesheet" type="text/css" href="../css/shared.css">
	<link rel="stylesheet" type="text/css" href="../css/brand.min.css">
	<link rel="stylesheet" type="text/css" href="../css/renew2024_3.css">
	<link rel="stylesheet" type="text/css" href="../css/wardog.css">
	<script src="../js/jquery-3.6.3.min.js"></script>
	<title><?php echo get_the_title(); ?></title>
	<meta name="description"
		content="ChanelやHermès、ルイヴィトンなどのブランド品の高価買取は全国1,300店舗の「おたからや」！バック・財布・アクセサリー等幅広い品目の商品を高価買取いたします。査定額に絶対の自信！無料査定・出張買取も承ります。">
	<link rel="canonical" href="/">
	<meta property="og:locale" content="ja_JP">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo get_the_title(); ?>">
	<meta property="og:description"
		content="ChanelやHermès、ルイヴィトンなどのブランド品の高価買取は全国1,300店舗の「おたからや」！バック・財布・アクセサリー等幅広い品目の商品を高価買取いたします。査定額に絶対の自信！無料査定・出張買取も承ります。">
	<meta property="og:url" content="/">
	<meta property="og:site_name" content="ブランド買取専門店のおたからや">
	<link rel="apple-touch-icon" href="../images/common/cropped-fav_512x512-180x180.png">
</head>

<?php get_template_part( 'head2' ); ?>

<style>
	a.img__link .img::before,
	a.img__link .img::after {
		content: none;
	}

	a.img__link {
		pointer-events: none;
	}
</style>

<body id="brand">

	<?php get_header( 'common' ); ?>

	<div id="topic__path" class="topic__path">
		<ol class="topic__path--list">
			<li class="topic__path--item" itemprop="itemListElement" itemscope=""
				itemtype="https://schema.org/ListItem">
				<a itemprop="item" href="/">
					<span itemprop="name">Specialized Purchase Store Otakaraya Top</span>
				</a>
				<meta itemprop="position" content="1">
			</li>
			<li class="topic__path--item" itemprop="itemListElement" itemscope=""
				itemtype="https://schema.org/ListItem">
				<span itemprop="name">High-Price Purchases for Branded Items</span>
				<meta itemprop="position" content="2">
			</li>
		</ol>
	</div>
	<div class="fv_img_wrap">
		<img class="is-pc" src="../images/brand/EN_2024_brand_TOP_PC.webp" alt="">
		<img class="is-sp" src="../images/brand/EN_2024_brand_TOP_SP.webp" alt="">
		<?php include __DIR__ . '/template-parts/fv_obi.php'; ?>
	</div>

	<?php get_template_part( 'template-parts/license' ); ?>
	<?php get_template_part( 'template-parts/shop-info' ); ?>

	<main class="contents">
		<article class="contents__left">
			<section class="is-pc">
				<!--     ▼▼▼ top_h2_text▼▼▼     -->
				<h2 class="titleHeading top_h2_text">
					Visit a <span>Specialized Purchase Store</span> Otakaraya <br />
					to Sell and Appraise Your Brand Items. </h2>
				<!--     ▲▲▲ top_h2_text▲▲▲     -->

				<div class="titleMain--lead">
					Hermès, Chanel, Louis Vuitton, and other international brands are covered, including bags, wallets,
					accessories, watches, and a wide range of items such as rings, necklaces, bracelets, and
					earrings.<br />
					At Otakaraya, our experienced appraisers accurately assess the value of branded items, ensuring a
					reliable and trustworthy service at over 1,300 locations nationwide.
				</div>
			</section>
			<div class="renew_2024_brand_titlebox is-sp">
				<h2 class="titleHeading top_h2_text">
					Store Otakaraya to Sell and <br />
					Appraise Your Brand Items.
				</h2>
				<!--     ▲▲▲ top_h2_text▲▲▲     -->

				<div class="renew_2024_brand_title_lead">
					<p>
						Hermès, Chanel, Louis Vuitton, and other international brands are covered, including bags,
						wallets, accessories, watches, and a wide range of items such as rings, necklaces, bracelets,
						and earrings.<br />
						At Otakaraya, our experienced appraisers accurately assess the value of branded items, ensuring
						a reliable and trustworthy service at over 1,300 locations nationwide.
					</p>
				</div>
			</div>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>

			<section class="is-pc">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>Specialized Purchase</span> Store Otakaraya
					</h2>
				</div>
				<div class="expensive_purchase_brand_repeat">
					<div class="expensive_purchase_brand_itemwrap"> <a href="./hermes/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/en_birkin.webp"
									alt="Hermez Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Hermez Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./chanel/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/matelasse.webp"
									alt="Chanel 香奈兒收購"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Chanel 香奈兒收購 </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./louis-vuitton/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/monogram.webp"
									alt="Louis Vuitton（路易威登）"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Louis Vuitton（路易威登） </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./harrywinston/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/lily.webp"
									alt="Harry Winston Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Harry Winston Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./vancleefarpels/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/alhambra.webp"
									alt="Van Cleef & Arpels Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Van Cleef & Arpels Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./tiffany/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/tsmile.webp"
									alt="Tiffany Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Tiffany Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./cartier/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/lovering.webp"
									alt="卡地亞 Cartier 收購"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> 卡地亞 Cartier 收購 </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./bvlgari/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/bzeroone.webp"
									alt="Bulgari Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Bulgari Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./gucci/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/ggmarmont.webp"
									alt="Gucci Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Gucci Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./dior/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/ladydior.webp"
									alt="Dior Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Dior Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./prada/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/saffiano.webp"
									alt="Prada Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Prada Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./chopard/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img
									src="../images/brand/happydiamond.webp" alt="Chopard Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Chopard Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_item_dummy"></div>
					<div class="expensive_purchase_brand_item_dummy"></div>
					<div class="expensive_purchase_brand_item_dummy"></div>
				</div>
			</section>
			<!-- <section class="is-pc">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main"> <span>Specialized Purchase</span> Store Otakaraya</h2>
				</div>
				<div class="expensive_purchase_brand_repeat">
					<div class="expensive_purchase_brand_itemwrap"> <a href="./hermes/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/en_birkin.webp" alt="Hermez Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Hermez Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./chanel/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/matelasse.webp" alt="Chanel 香奈兒收購"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Chanel 香奈兒收購 </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./louis-vuitton/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/monogram.webp" alt="Louis Vuitton（路易威登）"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Louis Vuitton（路易威登） </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./harrywinston/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/lily.webp" alt="Harry Winston Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Harry Winston Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./vancleefarpels/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/alhambra.webp" alt="Van Cleef & Arpels Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Van Cleef & Arpels Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./tiffany/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/tsmile.webp" alt="Tiffany Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Tiffany Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./cartier/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/lovering.webp" alt="卡地亞 Cartier 收購"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> 卡地亞 Cartier 收購 </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./bvlgari/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/bzeroone.webp" alt="Bulgari Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Bulgari Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./gucci/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/ggmarmont.webp" alt="Gucci Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Gucci Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./dior/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/ladydior.webp" alt="Dior Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Dior Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./prada/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/saffiano.webp" alt="Prada Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Prada Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_itemwrap"> <a href="./chopard/" class="img__link">
							<div class="expensive_purchase_brand_itembox img"> <img src="../images/brand/happydiamond.webp" alt="Chopard Purchase"> </div>
							<h3 class="expensive_purchase_brand_item_h4"> Chopard Purchase </h3>
						</a> </div>
					<div class="expensive_purchase_brand_item_dummy"></div>
					<div class="expensive_purchase_brand_item_dummy"></div>
					<div class="expensive_purchase_brand_item_dummy"></div>
				</div>
				<div class="expensive_purchase_brand_link btn__wrap btn__red"> <a href="../brand/brand_list.html">Other Purchase Brand List</a> </div>
			</section> -->
			<div class="renew_2024_expensive_purchase_brand_repeat is-sp">
				<div class="renew_2024_expensive_purchase_superbox">
					<h2 class="titleHeading"><span>Specialized Purchase</span> Store Otakaraya</h2>
					<!-- １行-->
					<div class="renew_2024_expensive_purchase_contentsbox">
						<div class="renew_2024_expensive_purchase_contentsbox_flex">
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./hermes/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/en_birkin.webp" alt="Hermez Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Hermez Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./chanel/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/matelasse.webp" alt="Chanel 香奈兒收購"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Chanel 香奈兒收購
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./louis-vuitton/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/monogram.webp" alt="Louis Vuitton（路易威登）"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Louis Vuitton（路易威登）
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./harrywinston/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/lily.webp" alt="Harry Winston Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Harry Winston Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./vancleefarpels/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/alhambra.webp" alt="Van Cleef & Arpels Purchase">
										</div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Van Cleef & Arpels Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./tiffany/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/tsmile.webp" alt="Tiffany Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Tiffany Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./cartier/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/lovering.webp" alt="卡地亞 Cartier 收購"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">卡地亞 Cartier 收購
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./bvlgari/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/bzeroone.webp" alt="Bulgari Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Bulgari Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./gucci/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/ggmarmont.webp" alt="Gucci Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Gucci Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./dior/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/ladydior.webp" alt="Dior Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Dior Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./prada/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/saffiano.webp" alt="Prada Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Prada Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
							<div class="renew_2024_expensive_purchase_itembox_wrap"> <a href="./chopard/"
									class="img__link">
									<div class="renew_2024_expensive_purchase_itembox">
										<div class="renew_2024_expensive_purchase_item_image"> <img
												src="../images/brand/happydiamond.webp" alt="Chopard Purchase"> </div>
										<h3 class="renew_2024_expensive_purchase_item_brand">Chopard Purchase
											<div class="renew_2024_expensive_purchase_item_arrow">
												<div></div>
											</div>
										</h3>
									</div>
								</a> </div>
						</div>
						<div class="btn__wrap btn__red"> <a href="./brand_list/" class="gtm-list-brand-all">Other
								Purchase Brand List</a> </div>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/assessment_cta' ); ?>

			<section>
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>Reference Purchase Prices</span> for Brand Items
					</h2>
					<div class="titleMain--lead">
						<p></p>
					</div>
				</div>
				<div class="flex flex--hasItem4">
					<!-- タブメニュー -->
					<ul class="flex__tab">
						<!-- タブ部分 -->
						<li class="tab__item active"> <a> Louis Vuitton </a> </li>
						<li class="tab__item "> <a> Hermès </a> </li>
						<li class="tab__item "> <a> Chanel </a> </li>
						<li class="tab__item "> <a> Others </a> </li>
					</ul>

					<!-- スライダー部分 -->
					<div class="flex__tabContents no_slider">
						<div class="flex__content active flex_content_wrap">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52339/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/0d706217fe3dc0164f211f4966e2ec88-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram deauvilleMINI shoulder bag M45528 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton Monogram deauvilleMINI shoulder bag
												M45528</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">187,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52340/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/ede4fe21ef52470b785232855bb40615-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram deauville handbag M47270 收購參考價格"></p>
											<p class="content--name">Louis Vuitton Monogram deauville handbag M47270</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">93,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52341/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/0a22ef77b9da7e1ba187b0f59c52af6b-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Damier deauville handbag Ｎ47272 收購參考價格"></p>
											<p class="content--name">Louis Vuitton Damier deauville handbag Ｎ47272</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">63,800<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52342/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/f4f68587f57520dc7072f094cd380d10-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton epi deauville handbag 收購參考價格"></p>
											<p class="content--name">Louis Vuitton epi deauville handbag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">60,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52343/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/285e245fa7e085337ec56368ffb8cec7-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram deauville handbag M42228 收購參考價格"></p>
											<p class="content--name">Louis Vuitton Monogram deauville handbag M42228</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">39,600<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/vanity/52335/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/369f3c8951bf7bf635073bc8b9591a80-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram reverse vanityNVPM vanity bag M45165 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton Monogram reverse vanityNVPM vanity
												bag M45165</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">279,400<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a
										href="../brand/result/louis-vuitton/deauville-louis-vuitton/52344/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/100f701f50758a0e238d41c9c301a987-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Damier deauville handbag  N47272 收購參考價格"></p>
											<p class="content--name">Louis Vuitton Damier deauville handbag N47272</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">23,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/vanity/52336/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/98d312968fec0a4ed7e498fbc20fec15-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram Ink vanityPM vanity bag M57118 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton Monogram Ink vanityPM vanity bag
												M57118</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">146,300<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/vanity/52337/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/4946bd028173004be04b9abb3c0840b4-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram bowling・vanity handbag M47270 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton Monogram bowling・vanity handbag
												M47270</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">72,600<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/vanity/52338/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/3428ceffb66a4cc1a3a12249434ca3dd-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton Monogram Amfer Three vanity star shoulder bag M47275 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton Monogram Amfer Three vanity star
												shoulder bag M47275</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">46,200<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52235/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/9cecdda4808720085f4857745ab21aaf-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton epi Painted Dots twist shoulder bag M21695 收購參考價格">
											</p>
											<p class="content--name">Louis Vuitton epi Painted Dots twist shoulder bag
												M21695</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">397,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52236/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/0887991f1a6e78b45421192698f0d6fa-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton epi twistMM shoulder bag M57517 收購參考價格"></p>
											<p class="content--name">Louis Vuitton epi twistMM shoulder bag M57517</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">394,900<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52237/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/169d489933acbba63e44161764a214d0-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton twist one handlePM M57093 收購參考價格"></p>
											<p class="content--name">Louis Vuitton twist one handlePM M57093</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">348,700<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52238/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/2ea4bbf0ec9ec0577e5c2d0a7cf9cec4-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton high end twist one handleBB M59090 收購參考價格"></p>
											<p class="content--name">Louis Vuitton high end twist one handleBB M59090
											</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">280,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52239/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/c9bbb721cee18fce00fc557564f14743-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton twist one handle M57214 收購參考價格"></p>
											<p class="content--name">Louis Vuitton twist one handle M57214</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">243,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/louis-vuitton/twist/52240/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/3d9a136a813def87cafe0602cfd4e348-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Louis Vuitton epi twistPM shoulder bag M50332 收購參考價格"></p>
											<p class="content--name">Louis Vuitton epi twistPM shoulder bag M50332</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">242,000<span>円</span></p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and
								accessories.
							</div>
						</div>
						<div class="flex__content  flex_content_wrap">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52212/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/73257361d43c669bb4b16fbab24dcb6c-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet black gold metal fittings U engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet black gold metal fittings U
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">737,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52213/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/6626829c3c7a1c896b4672c83d98eb59-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet bordeaux silver metal fittings □M engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet bordeaux silver metal fittings
												M engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">698,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52215/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/c54aff440bacbe396733d7e4abcd3b56-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet green silver metal fittings C engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet green silver metal fittings C
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">685,300<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52216/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/fca9637672b76b921fb35726df1bf0bd-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet to go black silver metal fittings U engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet to go black silver metal
												fittings U engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">ASK</p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52217/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/4ddb5548cea22d1aae3ca8a7b9cad78a-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet long to go B engraved 收購參考價格"></p>
											<p class="content--name">Hermès Kelly wallet long to go B engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">632,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52219/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/fd914f9ea94dfa2f9415fedd71d4c60f-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet long to go U engraved 收購參考價格"></p>
											<p class="content--name">Hermès Kelly wallet long to go U engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">556,600<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52222/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/46cefd061375097dcff9f4f55c38abcc-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet to go beige silver metal fittings U engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet to go beige silver metal
												fittings U engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">528,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52223/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/37dc46ae9bad0527603dfb05fe9eb781-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet B engraved 收購參考價格"></p>
											<p class="content--name">Hermès Kelly wallet B engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">350,900<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52227/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/9f45ae8f256490c16b22fbebd5034461-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet Y engraved 收購參考價格"></p>
											<p class="content--name">Hermès Kelly wallet Y engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">303,600<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52230/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/30ed8cd9756ab16cad8cde19bc607543-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet red gold metal fittings X engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet red gold metal fittings X
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">287,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52231/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/da20a9399acde97661b7b1ea58dd3e8d-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet greige silver metal fittings R engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet greige silver metal fittings R
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">235,400<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/ostrich/52232/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/8d49c9d0d71b3f73064ce34967b89d23-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet gray gold metal fittings T engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet gray gold metal fittings T
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">232,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-wallet/52234/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/149a1a5c48d4a74d8af5052464299e4c-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly wallet yellow silver metal fittings O engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly wallet yellow silver metal fittings O
												engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">132,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-sports/52187/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/ef2fc256d10c0adce7529b0f0ba95d29-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly sportsPM shoulder bag S engraved 收購參考價格"></p>
											<p class="content--name">Hermès Kelly sportsPM shoulder bag S engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">1,146,200<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-sports/52188/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/76feb528e87e5bff87b526b0c39be479-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly sportsGM shoulder bag black gold metal fittings X engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly sportsGM shoulder bag black gold metal
												fittings X engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">772,200<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/hermes/kelly-sports/52189/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/7a5c0755b921814fb02f6d1c79239768-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Hermès Kelly sportsPM shoulder bag brown gold metal fittings T engraved 收購參考價格">
											</p>
											<p class="content--name">Hermès Kelly sportsPM shoulder bag brown gold metal
												fittings T engraved</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">727,100<span>円</span></p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and
								accessories.
							</div>
						</div>
						<div class="flex__content  flex_content_wrap">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52403/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/fb0cbb7277f1751cd0baa7ad98580226-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel Matelasse wild stitch shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel Matelasse wild stitch shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">551,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52404/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/326b2fab1f2df74b2211709eded12d3c-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch handbag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch handbag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">396,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52488/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/3d7f28db91a6d3e7d887ade4439f38f6-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag black silver metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch shoulder bag black silver metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">386,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52489/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/3cfaab11a2f49cf7f72221eb4ad45f02-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch handbag black gold metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch handbag black gold metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">309,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52496/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/8413e4dac82a08dd3b290c8c979daf76-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag black gold metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch shoulder bag black gold metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">301,400<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52498/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/28b0668cfa3fcf5d77e6233cbd057a9e-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">279,400<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52500/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/9c0907e31609567743a57b50d7a56f03-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch chain shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch chain shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">276,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52501/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/ffc55e015f2e961598f6dc755822c39c-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">266,200<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52502/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/c35acc9a9c6542b91109bc529ace50ef-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch handbag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch handbag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">254,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52503/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/ab39f8a921718c914cc3358d9e92d929-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag beige gold metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch shoulder bag beige gold metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">225,500<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52504/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/610cf5d63b439f75d66ce6fd9fc42f7f-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">ASK</p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52505/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/4999ab75eb70b054685cf158375d46ae-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag black silver metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch shoulder bag black silver metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">209,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52506/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/fc710870c2f3fb2c0c5b76b4e3c2b5af-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch tote bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch tote bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">198,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52507/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/4d40dd304c88302564c63f2542414e6f-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch shoulder bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">196,900<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52517/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/ab8adb32dda5496bd197cb485c72e9e9-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch tote bag 收購參考價格"></p>
											<p class="content--name">Chanel wild stitch tote bag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">188,100<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/chanel/wildstitch/52518/"
										class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/f73aa156424fcfbf913a51c3f5e91148-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chanel wild stitch shoulder bag white gold metal fittings 收購參考價格">
											</p>
											<p class="content--name">Chanel wild stitch shoulder bag white gold metal
												fittings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">ASK</p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and
								accessories.
							</div>
						</div>
						<div class="flex__content  flex_content_wrap">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item"> <a href="../brand/result/else-top/37383/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/05313354cec29f8dbac5db142aaa9cc6-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Damiani Belle epoque necklace WG diamond 收購參考價格"></p>
											<p class="content--name">Damiani Belle epoque necklace WG diamond</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">408,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/37389/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/fd9ad28aa9a7ff79d0042853fdd25fa4-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Damiani Belle epoque necklace YG diamond 收購參考價格"></p>
											<p class="content--name">Damiani Belle epoque necklace YG diamond</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">378,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/37254/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/68dfd2e64ba293d23d188e396e49fbbe-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Graff Mini Butterfly Silhouette necklace 收購參考價格"></p>
											<p class="content--name">Graff Mini Butterfly Silhouette necklace</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">275,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/43148/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/aa489e56ffd75cf1307856c1e35ec6b3_03.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Dior Lady Dior leather black handbag 收購參考價格"></p>
											<p class="content--name">Dior Lady Dior leather black handbag</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">256,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/16967/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/2972-1.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Loewe puzzle small sand classic calf beige handbag 收購參考價格"></p>
											<p class="content--name">Loewe puzzle small sand classic calf beige handbag
											</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">161,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/16964/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/2944-1.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Loewe hammock bag leather canvas off white handbag 收購參考價格"></p>
											<p class="content--name">Loewe hammock bag leather canvas off white handbag
											</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">119,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/43210/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/20220418-217-1.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Boucheron quatre matching rings 收購參考價格"></p>
											<p class="content--name">Boucheron quatre matching rings</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">254,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/43209/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/20220218-11-1.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Boucheron quatre radiant リング 收購參考價格"></p>
											<p class="content--name">Boucheron quatre radiant ring</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">264,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/16403/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/20220418-1771_02.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Piaget rose diamond necklace 收購參考價格"></p>
											<p class="content--name">Piaget rose diamond necklace</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">506,000<span>円</span></p>
									</div>
								</li>
								<li class="content__item"> <a href="../brand/result/else-top/16346/" class="img__link">
										<div class="content_item_wrap">
											<p class="content__image img"> <img width="300" height="300"
													src="../images/brand/20220218-157_02.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Chopard happy diamond necklace 收購參考價格"></p>
											<p class="content--name">Chopard happy diamond necklace</p>
										</div>
									</a>
									<div class="content__text">
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">212,000<span>円</span></p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and
								accessories.
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>


			<div class="renew_2024_brand_enchant_title is-sp">
				<h2 class="titleHeading">
					Brand Items with <span>Enhanced Purchase Offers</span>
				</h2>
			</div>
			<section class="is-pc">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleHeading">
						Brand Items with <span>Enhanced Purchase Offers</span>
					</h2>
				</div>
				<div class="enhanced_purchaceitems_repeat_box">
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/bag.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/477_440_440-1.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Bag Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/wallet.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage" src="../images/brand/350-1.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Wallet Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/jewelry.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/e18dc60eec8c61e518b6ebc301c4fc18.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Jewelry Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/apparel.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/77ec6c8b0c0df04c50f47d28da41a96e.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Apparel Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/shoes.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/M0iioUqInMl2CKp8-1.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Brand Shoes Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand/goods.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/12a4b9ab44ed6fb297887b573fc5d0ac_02.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">Accessories Purchase</h3>
					</div>
					<div class="enhanced_purchaceitems_itembox"><a href="../brand-tokei/index.html" class="img__link">
							<div class="enhanced_purchaceitems_itemimgwrap img">
								<p><img class="enhanced_purchaceitems_itemimage"
										src="../images/brand/2f2dacfc364ac5ecdcf8b67d903e4afa.webp"></p>
							</div>
						</a>
						<h3 class="enhanced_purchaceitems_itemtitle">手錶收購</h3>
					</div>
				</div>
			</section>
			<section>
				<div class="renew_2024_enhanced_purchaceitems_box is-sp">
					<div class="renew_2024_enhanced_purchaceitems_repeat_box">
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/bag.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/477_440_440-1.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Bag</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/wallet.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/350-1.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Wallet</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/jewelry.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/e18dc60eec8c61e518b6ebc301c4fc18.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Jewelry</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/apparel.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/77ec6c8b0c0df04c50f47d28da41a96e.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Apparel</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/shoes.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/M0iioUqInMl2CKp8-1.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Brand Shoes</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand/goods.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/12a4b9ab44ed6fb297887b573fc5d0ac_02.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Small items</h3>
						</div>
						<div class="renew_2024_enhanced_purchaceitems_itembox"> <a href="../brand-tokei/index.html">
								<div class="renew_2024_enhanced_purchaceitems_itemimgwrap img"> <img
										class="renew_2024_enhanced_purchaceitems_itemimage"
										src="../images/brand/2f2dacfc364ac5ecdcf8b67d903e4afa.webp">
									<div class="renew_2024_expensive_purchase_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
							<h3 class="renew_2024_enhanced_purchaceitems_itemtitle">Clock</h3>
						</div>
					</div>
				</div>
			</section>

			<div class="renew_2024_enhance_model_title is-sp">
				<h2 class="titleHeading" style="color:white;">
					Brand Items' Model with
				</h2>
			</div>
			<section class="enhanced_additional_wrap">
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleHeading">
						Brand Items' Model with <span>Enhanced Purchase Offers</span>
					</h2>
				</div>
				<div class="enhanced_additional_tabbox">
					<div class="enhanced_additional_tabitem wd_active">
						<div class="enhanced_additional_tabitem_inner">Hermès</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
					<div class="enhanced_additional_tabitem">
						<div class="enhanced_additional_tabitem_inner">Chanel</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
					<div class="enhanced_additional_tabitem">
						<div class="enhanced_additional_tabitem_inner">Louis Vuitton</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
					<div class="enhanced_additional_tabitem">
						<div class="enhanced_additional_tabitem_inner">Van Cleef & Arpels</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
					<div class="enhanced_additional_tabitem">
						<div class="enhanced_additional_tabitem_inner">Tiffany</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
					<div class="enhanced_additional_tabitem">
						<div class="enhanced_additional_tabitem_inner">Others</div>
						<div class="enhanced_additional_tabitem_circle">
							<div class="enhanced_additional_tabitem_arrow"></div>
						</div>
					</div>
				</div>
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/birkin/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/2798_440_440-1.webp">
								</div>
								<div class="wd_contents3_item_name">Purchase Birkin</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/kelly/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/f8247c092dad25f12c03dbe04d7a4a94-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Kelly</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/picotin/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/b95287bc96f9e4a8a1d81d8999480fc5.jpg"></div>
								<div class="wd_contents3_item_name">Purchase Picotin Lock</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/evelyne/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/232-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Evelyne</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/alebag/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/69c708710dec52cc715855ff5b46f8a6-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase herbag</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/herline/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/0408-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Her Line</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/fourre-tout/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/4253-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Fourre-tout</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/garden-party/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/b7a75b61ebd700852ded0d77fa21ba00.webp"></div>
								<div class="wd_contents3_item_name">Purchase Garden Party</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/constance/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/92-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Constance</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/hermes/beant/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/0955-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Bearn</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/chanel/matelasse/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/3810_440_440_03.webp"></div>
								<div class="wd_contents3_item_name">Purchase Matelasse</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/chanel/cambon/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/f2a562998d0c5459b5d134d3061b2b89-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase cambonline</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/chanel/boy-chanel/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/4d510fa1579fb82b7b09efa36f5d2f94.webp"></div>
								<div class="wd_contents3_item_name">Purchase Boy Chanel</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/chanel/newtravel/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/1518_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase NewTravel</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/chanel/camellia/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/4433_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Camelia</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/result/chanel/hukkokutote/"
								class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/8e4fbff81fb83c0afa0c965893047123-1_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Revival tote</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/keepall/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/450755c8e296ac1da7ba181cfd7c5b36_03.webp"></div>
								<div class="wd_contents3_item_name">Purchase Keepall</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/alma/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/30abaf399626a2b9a57fabef8fc9aa97_03.webp"></div>
								<div class="wd_contents3_item_name">Purchase Alma</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/onthego/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/2134_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase On the go</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="brand/louis-vuitton/neverfull/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/2482_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Never Full</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/capucines/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/0361_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Capucines</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/speedy/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/1309_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Speedy</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/louis-vuitton/pochette-accessoires/"
								class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/2439_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Pochette-Accessoires</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/vancleefarpels/alhambra/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/20220418-2273-1.webp"></div>
								<div class="wd_contents3_item_name">Purchase Alhambra</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/vancleefarpels/perlee/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/e9cfd75529105e774933c52194669493.webp"></div>
								<div class="wd_contents3_item_name">Purchase Perlee</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/tiffany/by-the-yard/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/46d00bf385babb467f9aad34694c0ea7.webp"></div>
								<div class="wd_contents3_item_name">Purchase By The Yard</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/tiffany/hardwear/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/1e9ce44083a3cf473e477367b41e8e97.webp"></div>
								<div class="wd_contents3_item_name">Purchase HardWear</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/tiffany/open-heart/" class="img__link">
								<div class="wd_contents3_item_image img"><img
										src="../images/brand/aa1be126ce759d6d4618e6e474da00b8.webp"></div>
								<div class="wd_contents3_item_name">Purchase Open Heart</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/result/tiffany/atlas/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/22_02.webp"></div>
								<div class="wd_contents3_item_name">Purchase Atlas</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
				<div class="enhanced_additional_contents_superbox">
					<div class="enhanced_additional_contentsbox"><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/cartier/trinity/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/20220318-67-1.webp">
								</div>
								<div class="wd_contents3_item_name">Purchase Trinity</div>
							</a></div>
						<!-- wd_contents_itembox --><!-- wd_contents_itembox -->
						<div class="wd_contents3_itembox"><a href="../brand/bvlgari/b-zero1/" class="img__link">
								<div class="wd_contents3_item_image img"><img src="../images/brand/20220418-66_02.webp">
								</div>
								<div class="wd_contents3_item_name">Purchase B-zero1</div>
							</a></div>
						<!-- wd_contents_itembox -->
						<div class="enhanced_additional_repeater02_dummy"></div>
						<div class="enhanced_additional_repeater02_dummy"></div>
					</div>
					<!-- enhanced_additional_contentsbox -->
				</div>
				<!-- enhanced_additional_contents_superbox -->
			</section>
			<h2 class="renew_2024_titlesub">
				<div class="renew_2024_titlesub_topbar">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				Reasons Why Now Is the Right Time to Sell Brand Items
			</h2>
			<section style="margin-top:0px !important">
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">The Price of Brand Items Has Increased</h3>
					<div class="wd_brandinfo_story">In recent years, factors such as rising raw material costs, changes
						in global circumstances, and a weaker yen have led many brands to raise their retail prices.<br>
						<br>
						This increase in retail prices directly correlates to an increase in purchase prices, making now
						a great time to sell brand items.
					</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Additionally, as items age, their purchase price tends to decrease.
					</h3>
					<div class="wd_brandinfo_story">Generally, the value of brand items tends to decrease over time.
						Therefore, it is recommended to sell them while their value is still high.<br>
						<br>
						If you are thinking about selling brand items, please consult with Otakaraya.
					</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">The demand for second-hand brand items has increased</h3>
					<div class="wd_brandinfo_story">In recent years, the global demand for second-hand brand bags has
						been rising. Japanese second-hand items, in particular, are especially popular overseas.<br />
						With the rise in the retail prices of new brand items due to inflation, the demand for
						second-hand brand items has increased.</div>
				</div>
			</section>
			<h2 class="renew_2024_titlesub">
				<div class="renew_2024_titlesub_topbar">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				Characteristics of Brand Items that Sell for a High Price
			</h2>
			<section style="margin-top:0px !important">
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Popular Classic Models</h3>
					<div class="wd_brandinfo_story">Classic models are loved regardless of trends or era, so they have a
						stable demand. As a result, classic models are highly popular in the second-hand market, and
						when submitted for appraisal, they are likely to fetch a high price.</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Limited Edition Models or Colors with Rarity</h3>
					<div class="wd_brandinfo_story">Limited edition models, special colors, and collaboration items that
						have a limited production run are highly valuable due to their rarity. When these items are hard
						to find, the demand in the second-hand market increases, making them more likely to be bought at
						a high price.</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Good Condition with Few Scratches or Signs of Use</h3>
					<div class="wd_brandinfo_story">The condition of the item significantly affects its appraisal price.
						Items with few scratches, no stains, and minimal signs of use are more likely to be sold at a
						high price. Be careful with the condition of your brand items during use and storage to prevent
						damage.</div>
				</div>
			</section>
			<h2 class="renew_2024_titlesub">
				<div class="renew_2024_titlesub_topbar">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				Tips for Selling Brand Items at a High Price
			</h2>
			<section style="margin-top:0px !important">
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Perform Simple Maintenance</h3>
					<div class="wd_brandinfo_story">Before the appraisal, do some basic cleaning, such as removing
						dirt.<br>
						<br>
						However, depending on how it's done, cleaning might cause damage, so be sure to use methods that
						are suitable for the material of the item, and only clean within a safe range.
					</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Include Accessories with the Item</h3>
					<div class="wd_brandinfo_story">If you have any accessories that came with the brand item when
						purchased, such as the box, bag, warranty, or guarantee card, be sure to include them when you
						submit the item for appraisal.<br>
						<br>
						At Otakaraya, it is possible to offer high-value purchases even without the accessories, and
						they are not required.
					</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Submitting multiple brand items for appraisal at the same time.</h3>
					<div class="wd_brandinfo_story">At Otakaraya, the purchase price increases with "simultaneous
						appraisal," where multiple brand items are appraised together. If you have unwanted items, such
						as bags and necklaces, rings and earrings, please bring them together.</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Taking advantage of campaigns to increase the appraisal value</h3>
					<div class="wd_brandinfo_story">It is also recommended to take advantage of campaigns that increase
						the appraisal value.<br>
						<br>
						At Otakaraya, we conduct a variety of exclusive purchase campaigns.<br />
						By actively using campaigns that match the items you're selling, you can achieve a higher
						purchase price.
					</div>
				</div>
				<div class="wd_brandinfo_item">
					<h3 class="wd_brandinfo_title">Submit your items for appraisal to Otakaraya</h3>
					<div class="wd_brandinfo_story">Otakaraya, a specialized purchase store, handles a wide range of
						items. It is staffed with experienced appraisers, and has a strong track record of high-value
						purchases.<br>
						<br>
						If you have unwanted brand items, bring them to Otakaraya.
					</div>
				</div>
			</section>

			<section class="reason_section">
				<?php get_template_part( 'template-parts/otakaraya_sel' ); ?>
			</section>

			<!-- reason_section    -->


			<?php get_template_part( 'template-parts/assessment_cta' ); ?>

			<!-- assessment_cta    -->

			<section class="state_bad_purchase">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">We purchase brand items in any condition.</h2>
					<div class="titleMain--lead">
						<p>We are happy to buy items with damages.</p>
					</div>
				</div>
				<div class="colBox colBox__col04 sp__col03">
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/yogore_beta-1.webp" alt="scratches"></p>
						</div>
						<p class="text text--center">scratches</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/hason-1.webp" alt="tears"></p>
						</div>
						<p class="text text--center">tears</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/hurui_design-1.webp" alt="old designs"></p>
						</div>
						<p class="text text--center">old designs</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/yabure-1.webp" alt="dirt"></p>
						</div>
						<p class="text text--center">dirt</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/kadosure-1.webp" alt="corner scuffing"></p>
						</div>
						<p class="text text--center">corner scuffing</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/hiyake-1.webp" alt="sun damage"></p>
						</div>
						<p class="text text--center">sun damage</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/huzokuhin-1.webp" alt="missing accessories"></p>
						</div>
						<p class="text text--center">missing accessories</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/sabi-1.webp" alt="rust"></p>
						</div>
						<p class="text text--center">rust</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/831ccd57c832dbc9f80649d253aebaa5.webp" alt="cracked leather">
							</p>
						</div>
						<p class="text text--center">cracked leather</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/40652420a4303af82cf6795a82b97e6b.webp" alt="ink stains"></p>
						</div>
						<p class="text text--center">ink stains</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/e71016dd6f2f0f35db2ffcb2d0d09203.webp"
									alt="internal discoloration"></p>
						</div>
						<p class="text text--center">internal discoloration</p>
					</div>
					<div class="col">
						<div class="img">
							<p><img src="../images/brand/984200ea113b94d27d2ad9b86085a99d.webp"
									alt="dirt on untreated leather"></p>
						</div>
						<p class="text text--center">dirt on untreated leather</p>
					</div>
				</div>
			</section>
			<a href="/watch/">
				<img class="bar_brandwatch_purchase is-pc" src="../images/brand/ENbrand_watch_bnr.webp" alt="名牌手錶">
				<img class="bar_brandwatch_purchase is-sp" src="../images/brand/EN_brand_watch_bnr_sp.webp" alt="名牌手錶">
			</a>
			<section class="otakaraya_purchase_goods">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">Search from Otakaraya's Purchase Items</h2>
				</div>
				<div class="colBox colBox__col04 sp__col03">
					<div class="col"> <a href="https://www.otakaraya.jp/gold/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/1_kin.webp" alt="Gold Purchase"></p>
							</div>
							<p class="text text--center">Gold Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/platinum/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/2_pt.webp" alt="Precious Metals & Platinum Purchase"></p>
							</div>
							<p class="text text--center">Precious Metals & Platinum Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/daiya/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/3_daiya.webp" alt="鑽石・珠寶收購"></p>
							</div>
							<p class="text text--center">鑽石・珠寶收購</p>
						</a> </div>
					<div class="col"> <a href="../brand-tokei/index.html" class="img__link">
							<div class="img">
								<p><img src="../images/brand/4_tokei.webp" alt="Brand 手錶收購"></p>
							</div>
							<p class="text text--center">Brand 手錶收購</p>
						</a> </div>
					<div class="col"> <a href="/brand-tokei/rolex/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/17_rolex.webp" alt="勞力士 Rolex 收購"></p>
							</div>
							<p class="text text--center">勞力士 Rolex 收購</p>
						</a> </div>
					<div class="col"> <a href="/brand-tokei/omega/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/18_omega.webp" alt="歐米茄 Omega 收購"></p>
							</div>
							<p class="text text--center">歐米茄 Omega 收購</p>
						</a> </div>
					<div class="col"> <a href="./" class="img__link">
							<div class="img">
								<p><img src="../images/brand/5_brand.webp" alt="Brand Item Purchase"></p>
							</div>
							<p class="text text--center">Brand Item Purchase</p>
						</a> </div>
					<div class="col"> <a href="./hermes/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/19_hermes.webp" alt="Hermes 愛馬仕收購"></p>
							</div>
							<p class="text text--center">Hermes 愛馬仕收購</p>
						</a> </div>
					<div class="col"> <a href="./chanel/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/20_chanel.webp" alt="Chanel 香奈兒收購"></p>
							</div>
							<p class="text text--center">Chanel 香奈兒收購</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/kitte/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/6_kitte_hagaki.webp" alt="Stamp Purchase"></p>
							</div>
							<p class="text text--center">Stamp Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/gakki/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/21_gakki.webp" alt="Musical Instrument Purchase"></p>
							</div>
							<p class="text text--center">Musical Instrument Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/gold/oban-koban/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/22_koban.webp" alt="Gold Coin Purchase"></p>
							</div>
							<p class="text text--center">Gold Coin Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/gold/kinka-ginka/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/7_kinka_ginka.webp"
										alt="Gold & Silver Coin, Commemorative Coin Purchase"></p>
							</div>
							<p class="text text--center">Gold & Silver Coin, Commemorative Coin Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/tableware02/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/11_brand_syokki.webp" alt="Brand Tableware Purchase"></p>
							</div>
							<p class="text text--center">Brand Tableware Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/order_medal/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/9_kunsyo_medaru.webp" alt="Medal & Decoration Purchase">
								</p>
							</div>
							<p class="text text--center">Medal & Decoration Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/kosen-sihei/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/8_kosen.webp" alt="Old Coins & Banknotes Purchase"></p>
							</div>
							<p class="text text--center">Old Coins & Banknotes Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/antique/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/23_kottou.webp" alt="Antique Purchase"></p>
							</div>
							<p class="text text--center">Antique Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/kimono2/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/14_kimono.webp" alt="Kimono Purchase"></p>
							</div>
							<p class="text text--center">Kimono Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/picture02/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/15_kaiga.webp"
										alt="Painting, Hanging Scrolls, and Artworks Purchase"></p>
							</div>
							<p class="text text--center">Painting, Hanging Scrolls, and Artworks Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/camera02/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/10_kamera.webp" alt="Camera Purchase"></p>
							</div>
							<p class="text text--center">Camera Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/g-ticket/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/24_kinken.webp"
										alt="Gift Certificate & Telephone Card Purchase"></p>
							</div>
							<p class="text text--center">Gift Certificate & Telephone Card Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/gunsouhin/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/25_gunpuku.webp"
										alt="Military Uniform & Military Gear Purchase"></p>
							</div>
							<p class="text text--center">Military Uniform & Military Gear Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/liquor/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/26_yousyu.webp" alt="Wine Purchase"></p>
							</div>
							<p class="text text--center">Wine Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/hobby/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/27_hobby.webp" alt="Hobby & Model Train Purchase"></p>
							</div>
							<p class="text text--center">Hobby & Model Train Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/item/mobile/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/28_sumaho.webp" alt="Smartphone & Mobile Phone Purchase">
								</p>
							</div>
							<p class="text text--center">Smartphone & Mobile Phone Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/minicar/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/29_minicar.webp" alt="Miniature Car Model Purchase"></p>
							</div>
							<p class="text text--center">Miniature Car Model Purchase</p>
						</a> </div>
					<div class="col"> <a href="https://www.otakaraya.jp/kouboku/" class="img__link">
							<div class="img">
								<p><img src="../images/brand/kouboku_33.000000.webp" alt="Aromatic Tree Purchase"></p>
							</div>
							<p class="text text--center">Aromatic Tree Purchase</p>
						</a> </div>
				</div>
			</section>
			<section class="faq_wrap">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main"> <span>Frequently Asked Questions</span><br />
						About Brand Item Purchase</h2>
					<div class="titleMain--lead">
						<p></p>
					</div>
				</div>
				<div class="qa__wrap js__more--3th">
					<!-- もっと見るなし -->

					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Is it okay outside the Tokyo metropolitan area?</dt>
							<dd class="qa__list__a">Specialized appraisers will visit anywhere in Japan.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I sell a watch if the battery is dead?</dt>
							<dd class="qa__list__a">Yes, you can. We have successfully purchased both automatic and
								battery-operated watches that have stopped working.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I sell it for more than the original price?</dt>
							<dd class="qa__list__a">For some items, we may offer a purchase price higher than the
								original price. However, many branded products tend to lose value over time. If you no
								longer plan to use the item, it is recommended to sell it sooner.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Is it possible to cancel an item I requested an appraisal for?</dt>
							<dd class="qa__list__a">Yes, it is possible. However, please note that returns cannot be
								accepted after the purchase has been completed.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Do you offer mail-in purchases?</dt>
							<dd class="qa__list__a">We do not offer mail-in purchases. The purchase methods available
								are 'home visit purchase' or 'in-store purchase'.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can you purchase brands not listed on the website?</dt>
							<dd class="qa__list__a">Yes, we can purchase items from brands not listed on the website.
								Feel free to contact us, even if it's just one item.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can you buy items that were bought a long time ago or are in poor
								condition?</dt>
							<dd class="qa__list__a">Yes, we can. We have a track record of purchasing items that were
								previously rejected by other companies due to reasons such as 'old', 'dirty', or 'sun
								damage'. Please feel free to contact us.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Is an ID required?</dt>
							<dd class="qa__list__a">Yes, it is required as per the regulations of the Antiquities Dealer
								Law for identity verification. Rest assured, it will not be used for any other purposes.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">How long does it take for an in-store appraisal?</dt>
							<dd class="qa__list__a">For a single item, the appraisal typically takes around 5 to 15
								minutes, depending on the item and quantity. If the store is busy, there may be a wait,
								so we recommend making a reservation in advance.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I make a reservation for in-store purchases?</dt>
							<dd class="qa__list__a">Yes, reservations are possible. Feel free to contact us.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">What is the minimum age for purchasing?</dt>
							<dd class="qa__list__a">Anyone aged 20 or older can apply. Customers aged 18 or 19 will need
								to provide a consent form or power of attorney. We cannot process requests from
								customers under 18.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can vintage items like jewelry and bags be purchased?</dt>
							<dd class="qa__list__a">We may decline items with difficult-to-repair damage, such as
								scratches or stains. However, some items may still be eligible for high-value purchases,
								so please consult us for more details.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Should I clean items with scratches or stains before bringing them
								in?</dt>
							<dd class="qa__list__a">Cleaning may negatively affect the appraisal value depending on the
								method used. Please bring the item in as-is.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">How is the appraisal amount determined?</dt>
							<dd class="qa__list__a">The appraisal is based on factors such as the item’s market value,
								design, size, and condition. You can refer to the listed purchase prices for famous
								brands at the top of the page for guidance.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can the appraisal amount over the phone differ from the purchase
								price?</dt>
							<dd class="qa__list__a">When appraising over the phone, the estimate is based on the
								information you provide. The final appraisal may vary once the item is physically
								assessed. For an accurate price, we recommend using "home visit purchase" or "in-store
								purchase."</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I request an appraisal without deciding whether to sell?</dt>
							<dd class="qa__list__a">Yes, you can. We offer free appraisals, so feel free to consult us.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I get an appraisal for just one item?</dt>
							<dd class="qa__list__a">Yes, appraisals are available for a single item. If you bring in
								multiple items, we also offer convenient bulk appraisals.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Why do brand items retain their value and sell for high prices?</dt>
							<dd class="qa__list__a">This is because the supply is unable to keep up with the high
								demand. Even though brands have a relatively large circulation compared to other brand
								items, the excessive demand often makes them difficult to obtain, naturally increasing
								their price and significantly influencing the appraisal value.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">How much can I sell a brand item for?</dt>
							<dd class="qa__list__a">While the price can fluctuate based on the latest market trends,
								brand items generally have very high asset value, meaning their prices are less likely
								to drop.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">When is the best time to sell a brand item?</dt>
							<dd class="qa__list__a">The best time to sell a brand item can vary. It could be a good time
								immediately or after waiting for the value to increase over time. It’s not always clear
								when the ideal selling moment is. If you plan to store the item long-term before
								selling, it's important to keep it in good condition and periodically maintain it using
								proper storage methods.</dd>
						</dl>
					</div>
				</div>
				<div class="btn__wrap btn__more js__more--btn3 gtm-more-qa"> <span>View More</span> </div>
			</section>
			<div class="titleMain titleMain--wrapper">
				<h2 class="titleMain--main"> <span>Introduction of Appraisers</span> </h2>
			</div>
			<div class="content-inner">
				<section id="shop-leader02">
					<div class="shop-leader_container bordersitecolor">
						<div class="shop-leader_inner bordersitecolor">
							<div class="shop-leader_profile relative">
								<div class="shop-leader_head absolute">
									<h2 class="is-pc bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="font-size: 26px; font-family: serif;">Appraiser</span></h2>
									<h2 class="is-sp bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="margin:-1rem 0 0 0; font-size: 26px; font-family: serif;">Appraiser</span>
									</h2>
								</div>
								<div class="shop-leader_head_shadow absolute">
									<div class="relative"></div>
								</div>
								<div class="imgbox absolute"><img
										src="../images/brand/25bd634c4c9a33639e17210a92b9927c.webp" alt=""></div>
								<ul class="floatlist">
									<li class="shop-leader_name sitetextcolor" style="font-family: serif;"> <span
											class="noto ja" style="font-weight: bold;"> Shimodate</span><br>
										<span class="noto light en"></span>
									</li>
									<li class="shop-leader_info">
										<table>
											<tbody>
												<tr>
													<th class="sitetextcolor"> <span class="noto">Hobby: </span> </th>
													<td><span class="noto">Watching baseball</span></td>
												</tr>
												<tr>
													<th class="sitetextcolor"> <span class="noto">Favorite phrase:
														</span> </th>
													<td><span class="noto">Single-minded effort</span></td>
												</tr>
												<tr>
													<th class="sitetextcolor"> <span class="noto">Favorite brand:
														</span> </th>
													<td><span class="noto">Hermes</span></td>
												</tr>
												<tr>
													<th class="sitetextcolor"> <span class="noto">Past purchase
															examples: </span> </th>
													<td><span class="noto">Birkin Himalayan</span></td>
												</tr>
											</tbody>
										</table>
									</li>
								</ul>
							</div>
							<p class="shop-leader_text"> <span class="noto">Otakaraya conducts the appraisal of
									thousands of brand items every day. Currently, Otakaraya has international sales
									channels, allowing for purchases based on global standards. Due to the weak yen,
									Otakaraya can now offer higher prices by selling abroad compared to before. We are
									confident that our customers will be satisfied, so please feel free to use
									Otakaraya's services.<br>
									<br>
									At Otakaraya, we purchase not only brand-new and unused items but also those
									purchased years ago, as well as items with damage or wear. In fact, there have been
									many instances where items purchased more than 10 years ago were bought back at a
									higher price than their original purchase price. If you have items lying around at
									home, feel free to consult with us.</span> </p>
							<div class="shop-detail_button clearfix"> </div>
						</div>
					</div>
				</section>
			</div>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>


		</article>
		<!-- end content left -->

		<?php get_template_part( 'template-parts/side-menu' ); ?>

	</main>


	<?php get_footer( 'common' ); ?>

	<script src="../js/common.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/shared.js"></script>
	<script src="../js/breadlist.js"></script>
	<script type="text/javascript" src="../js/index_1.js" id="swv-js"></script>
	<script>
		$( window ).on( 'load', function () {
			const moreNum2 = 2; // 1回あたり16個表示
			$( '.js__more--item2:nth-child(n + ' + ( moreNum2 + 1 ) + ')' ).addClass( 'is-hidden' ).hide();
			$( '.js__more--btn2' ).on( 'click', function () {
				const hiddenItems = $( this ).prev( '.js__more--2th' ).children( '.js__more--item2.is-hidden' );
				hiddenItems.slice( 0, moreNum2 ).removeClass( 'is-hidden' ).fadeIn( 600 ); // フェードインしながら展開
				if ( hiddenItems.length <= moreNum2 ) $( this ).fadeOut(); // すべて表示されたら非表示
			} );
		} );
		$( window ).on( 'load', function () {
			const moreNum5 = 5; // 1回あたり16個表示
			$( '.js__more--item3:nth-child(n + ' + ( moreNum5 + 1 ) + ')' ).addClass( 'is-hidden' ).hide();
			$( '.js__more--btn3' ).on( 'click', function () {
				const hiddenItems = $( this ).prev( '.js__more--3th' ).children( '.js__more--item3.is-hidden' );
				hiddenItems.slice( 0, moreNum5 ).removeClass( 'is-hidden' ).fadeIn( 600 ); // フェードインしながら展開
				if ( hiddenItems.length <= moreNum5 ) $( this ).fadeOut(); // すべて表示されたら非表示
			} );
		} );

		$( function () {

			$( ".enhanced_additional_contents_superbox" ).eq( 0 ).show();

			$( ".enhanced_additional_tabitem" ).click(
				function () {
					if ( $( this ).hasClass( "wd_active" ) == false ) {
						var tab_max = $( ".enhanced_additional_tabitem" ).length;
						var tab_i = $( ".enhanced_additional_tabitem" ).index( this );
						for ( var temp_i = 0; temp_i < tab_max; temp_i++ ) {
							if ( temp_i == tab_i ) {
								$( ".enhanced_additional_tabitem" ).eq( temp_i ).addClass( "wd_active" );
								$( ".enhanced_additional_contents_superbox" ).eq( temp_i ).fadeIn( 200 );
							} else {
								$( ".enhanced_additional_tabitem" ).eq( temp_i ).removeClass( "wd_active" );
								$( ".enhanced_additional_contents_superbox" ).eq( temp_i ).hide();
							}
						}
					}
				}
			);
		} )
	</script>
	<script>
		document.addEventListener( 'DOMContentLoaded', function () {
			const items = document.querySelectorAll( '.latest_results_item' );
			const loadMoreButton = document.querySelector( '.js__more--btn10' );
			let itemsToShow = 8;

			// 初期状態で8個表示
			function showItems() {
				items.forEach( ( item, index ) => {
					if ( index < itemsToShow ) {
						item.style.display = 'block';
					} else {
						item.style.display = 'none';
					}
				} );
			}

			// 最新結果が8個以下の場合、ボタンを非表示にする
			if ( items.length <= 8 ) {
				loadMoreButton.style.display = 'none';
			} else {
				// ボタンクリック時にさらに8個表示
				loadMoreButton.addEventListener( 'click', function () {
					itemsToShow += 8;
					showItems();

					// すべて表示された場合、ボタンを非表示に
					if ( itemsToShow >= items.length ) {
						loadMoreButton.style.display = 'none';
					}
				} );
			}

			// 初期表示を呼び出す
			showItems();
		} );
	</script>
	<script>
		/*メインビジュアルユニット1*/
		$( "#slide01" ).slick( {
			asNavFor: "#thumbs01",
			prevArrow: '<img src="/app/wp-content/themes/otakaraya/assets/img/common/slide_prev_white01.png" class="slide-arrow prev-arrow">',
			nextArrow: '<img src="/app/wp-content/themes/otakaraya/assets/img/common/slide_next_white01.png" class="slide-arrow next-arrow">',
			autoplay: true,
			autoplaySpeed: 5000,
			responsive: [ {
				breakpoint: 768, // 399px以下のサイズに適用
				settings: {
					arrows: false,
				},
			}, ],
		} )$( "#thumbs01" ).slick( {
			//ここにオプション
			asNavFor: "#slide01",
			slidesToShow: 4,
		} );
		$( "#thumbs01 .slick-slide" ).on( "click", function () {
			let index = $( this ).attr( "data-slick-index" )$( "#slide01" ).slick( "slickGoTo", index )})
		/* parts-flex */

		/* スライダー(PC,SP両方) */
		let sliders = ["flex-slider1", "flex-slider2", "flex-slider3", "flex-slider4", "flex-slider5"];
		sliders.forEach((slider) => {
			let elem = document.getElementById(slider);
			var slideCount = $(elem).children('.content__item').length;
			let slidesToShow = Math.min(slideCount, 4);
			if (slideCount < 5) {
				if (elem) {
					$(elem).slick({
						arrows: true, // 矢印あり
						dots: true, // ドットあり
						appendArrows: $("." + slider + '--arrow'),
						appendDots: $("." + slider + '--dot'),
						// speed: 1000,
						//autoplay: true,
						//autoplaySpeed: 5000,
						centerMode: false,
						responsive: [{
							breakpoint: 9999,
							settings: {
								slidesToShow: slidesToShow,
								slidesToScroll: slidesToShow,
								variableWidth: true,
							}
						}, {
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
								centerMode: true,
								variableWidth: true,
							}
						}]
					});
				}
			} else {
				if (elem) {
					$(elem).slick({
						arrows: true, // 矢印あり
						dots: true, // ドットあり
						appendArrows: $("." + slider + '--arrow'),
						appendDots: $("." + slider + '--dot'),
						autoplay: true,
						autoplaySpeed: 5000,
						centerMode: false,
						responsive: [{
							breakpoint: 9999,
							settings: {
								slidesToShow: 4,
								slidesToScroll: 4,
								variableWidth: true,
							}
						}, {
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
								centerMode: true,
								variableWidth: true,
							}
						}]
					});
				}
			}
		});

		/* スライダー(SPのみ) */
		function checkBreakPoint() {
			let slidersScOnly = ["numbox-slider-sp1", "flex-slider-sp1", "flex-slider-sp2"];
			let windowW = document.body.clientWidth;

			slidersScOnly.forEach((slider) => {
				let elem = document.getElementById(slider);
				if (elem) {
					if (windowW <= 767) {
						if (!elem.classList.contains("slick-initialized")) {
							$(elem).not('.slick-initialized').slick({
								arrows: true, // 矢印あり
								dots: true, // ドットあり
								appendArrows: $("." + slider + '--arrow'),
								appendDots: $("." + slider + '--dot'),
								autoplay: true,
								autoplaySpeed: 5000,
								slidesToShow: 1,
								slidesToScroll: 1,
								centerMode: true,
								variableWidth: true,
							})
						}
					} else {
						if (elem.classList.contains("slick-initialized")) {
							$(elem).slick('unslick');
						}
					}
				}
			});
		}

		jQuery(window).on('resize load', function() {
			checkBreakPoint();
		});

		checkBreakPoint();

		function checkBreakPoint2() {
			let slidersScOnly = ["columnbox01"];
			let windowW = document.body.clientWidth;

			slidersScOnly.forEach((slider) => {
				let elem = document.getElementById(slider);
				if (elem) {
					if (windowW <= 767) {
						if (!elem.classList.contains("slick-initialized")) {
							$(elem).not('.slick-initialized').slick({
								arrows: true, // 矢印あり
								dots: true, // ドットあり
								appendArrows: $("." + slider + '--arrow'),
								appendDots: $("." + slider + '--dot'),
								autoplay: true,
								autoplaySpeed: 5000,
								// speed: 1000,
								slidesToShow: 1,
								slidesToScroll: 1,
								centerMode: true,
								variableWidth: true,
							})
						}
					} else {
						if (elem.classList.contains("slick-initialized")) {
							$(elem).slick('unslick');
						}
					}
				}
			});
		}

		jQuery(window).on('resize load', function() {
			checkBreakPoint2();
		});

		checkBreakPoint2();

		// ドキュメントが準備完了時に以下のコードを実行
		$(function() {
			// HTML内のクラスが'dateString'である要素の内容を取得し、変数gold_Containerに格納
			var gold_Container = $('.gold_Container').html();

			// クラスが'gold_Container2'である要素に変数gold_Containerの内容を挿入
			$('.gold_Container2').html(gold_Container);
		});

		function checkBreakPoint2() {
			let slidersScOnly = ["columnbox_slid"];
			let windowW = document.body.clientWidth;

			slidersScOnly.forEach((slider) => {
				let elem = document.getElementById(slider);
				if (elem) {
					if (windowW <= 1024) {
						if (!elem.classList.contains("slick-initialized")) {
							$(elem).not('.slick-initialized').slick({
								arrows: false,
								dots: true,
								appendArrows: $("." + slider + '--arrow'),
								appendDots: $("." + slider + '--dot'),
								autoplay: true,
								autoplaySpeed: 5000,
								slidesToShow: 1,
								slidesToScroll: 1,
								centerMode: true,
								variableWidth: true,
							})
						}
					} else {
						if (elem.classList.contains("slick-initialized")) {
							$(elem).slick('unslick');
						}
					}
				}
			});
		}

		jQuery(window).on('resize load', function() {
			checkBreakPoint2();
		});

		checkBreakPoint2();
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const searchInput = document.getElementById('search_brand');
			const searchButton = document.getElementById('search_button');
			const activeTitle = document.getElementById('active_title');
			const brandItems = document.querySelectorAll('.list_katakana_brand_item_wrap');
			const noResults = document.querySelectorAll('.list_katakana_brand_none');

			// ひらがなをカタカナに変換する関数
			function hiraganaToKatakana(str) {
				return str.replace(/[\u3041-\u3096]/g, function(match) {
					return String.fromCharCode(match.charCodeAt(0) + 0x60);
				});
			}

			function performSearch() {
				let searchQuery = searchInput.value.trim().toLowerCase(); // 検索キーワードを小文字に変換

				// 検索が空白の場合は全て非表示にし、何も表示しない
				if (searchQuery === "") {
					// タブの選択状態を更新
					$("#brand_tabs .list_katakana_brand_tabbox").removeClass("wd_active");
					brandItems.forEach(item => item.style.display = 'none');
					noResults.forEach(el => el.style.display = 'none');
					activeTitle.textContent = '検索結果：';
					return;
				}

				searchQuery = hiraganaToKatakana(searchQuery); // ひらがなをカタカナに変換

				// 検索結果に基づいてフィルタリング
				let hasResults = false;
				brandItems.forEach(item => {
					const brandName = item.querySelector('.list_katakana_brand_en').textContent.toLowerCase(); // 英語名を小文字に変換
					const brandKana = hiraganaToKatakana(item.querySelector('.list_katakana_brand_kana').textContent); // カタカナ名をひらがな変換後と比較

					if (brandName.includes(searchQuery) || brandKana.includes(searchQuery)) {
						item.style.display = 'block'; // 該当する場合表示
						hasResults = true;
					} else {
						item.style.display = 'none'; // 該当しない場合非表示
					}
				});

				// 検索結果がない場合の表示処理
				if (hasResults) {
					noResults.forEach(el => el.style.display = 'none');
				} else {
					noResults.forEach(el => el.style.display = 'block');
				}

				// 検索キーワードをタイトルに反映
				activeTitle.textContent = searchQuery ? `検索結果：${searchInput.value}` : '検索結果';
			}

			// 検索ボタンクリックイベント
			searchButton.addEventListener('click', performSearch);

			// Enterキーで検索をトリガー
			searchInput.addEventListener('keydown', function(event) {
				if (event.key === 'Enter') {
					event.preventDefault();
					performSearch();
				}
			});
		});
	</script>
	<script>
		$(function() {
			// カタカナ行の定義
			const kanaGroups = {
				"ア": ["ア", "イ", "ウ", "エ", "オ"],
				"カ": ["カ", "キ", "ク", "ケ", "コ", "ガ", "ギ", "グ", "ゲ", "ゴ"],
				"サ": ["サ", "シ", "ス", "セ", "ソ", "サ", "ジ", "ズ", "ゼ", "ゾ"],
				"タ": ["タ", "チ", "ツ", "テ", "ト", "ダ", "ヂ", "ヅ", "デ", "ド"],
				"ナ": ["ナ", "ニ", "ヌ", "ネ", "ノ"],
				"ハ": ["ハ", "ヒ", "フ", "ヘ", "ホ", "バ", "ビ", "ブ", "ベ", "ボ"],
				"マ": ["マ", "ミ", "ム", "メ", "モ"],
				"ヤ": ["ヤ", "ユ", "ヨ"],
				"ラ": ["ラ", "リ", "ル", "レ", "ロ"],
				"ワ": ["ワ", "ヲ", "ン"]
			};

			// 初期表示でア行を表示
			showBrandsByGroup("ア");

			// タブクリックイベント
			$("#brand_tabs .list_katakana_brand_tabbox").click(function() {
				const group = $(this).data("group");

				// タブの選択状態を更新
				$("#brand_tabs .list_katakana_brand_tabbox").removeClass("wd_active");
				$(this).addClass("wd_active");

				// タイトルの更新
				// $("#active_title").text(`${group}行`);
				$("#active_title").text(``);

				// 選択されたグループのブランドを表示
				showBrandsByGroup(group);
			});

			// グループに基づいてブランドを表示
			function showBrandsByGroup(group) {
				// 全てのブランドアイテムを非表示
				$(".list_katakana_brand_item_wrap").hide();

				// 該当するグループの文字リストを取得
				const validChars = kanaGroups[group] || [];

				// 有効な文字で始まるブランドを表示
				$(".list_katakana_brand_item_wrap").each(function() {
					const brandGroup = $(this).data("group");
					if (validChars.includes(brandGroup)) {
						$(this).show(); // 一致するブランドを表示
					}
				});

				// ブランドがない場合の表示処理
				if ($(".list_katakana_brand_item_wrap:visible").length === 0) {
					$(".list_katakana_brand_none").show(); // ブランドがない場合のメッセージ
				} else {
					$(".list_katakana_brand_none").hide(); // ブランドがある場合
				}
			}
		});
	</script>
</body>

</html>