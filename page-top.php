<?php
/* Template Name: トップページ */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php get_template_part( 'head2' ); ?>
	<!-- local css -->
	<link rel="stylesheet" type="text/css" href="css/app.min.css">
	<link rel="stylesheet" type="text/css" href="css/shared.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<script src="js/jquery-3.6.3.min.js"></script>

	<title><?php the_title() ?></title>
	<meta name="description"
		content="買取専門店のおたからや。最短5分で査定、出張費無料です。金・プラチナ・貴金属・ダイヤモンド・ブランド品・時計・バッグ・切手・古銭・着物・鉄道模型など、他社圧倒の高額買取金額で幅広く買取させていただきます。">
	<link rel="canonical" href="https://www.otakaraya.jp/">
	<meta property="og:locale" content="ja_JP">
	<meta property="og:type" content="website">
	<meta property="og:title" content="買取専門店のおたからや - 最短5分で査定、出張費無料">
	<meta property="og:description"
		content="買取専門店のおたからや。最短5分で査定、出張費無料です。金・プラチナ・貴金属・ダイヤモンド・ブランド品・時計・バッグ・切手・古銭・着物・鉄道模型など、他社圧倒の高額買取金額で幅広く買取させていただきます。">
	<meta property="og:url" content="https://www.otakaraya.jp/">
	<meta property="og:site_name" content="金・貴金属ブランド買取のおたからや">

</head>


<?php wp_head(); ?>

<body id="mock_app">

	<?php get_header( 'common' ); ?>



	<div class="fv_img_wrap">
		<img class="is-pc" src="images/index/OTAKARAYA_top_PC_EN.webp" alt="High-price purchases at Otakaraya">
		<img class="is-sp" src="images/index/OTAKARAYA_top_SP_EN.webp" alt="High-price purchases at Otakaraya">
	</div>

	<?php get_template_part( 'template-parts/license' ); ?>
	<?php get_template_part( 'template-parts/shop-info' ); ?>

	<main class="contents">
		<article class="contents__left">
			<section class="products_area handling_products_section">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>OTAKARAYA</span> 收購商品
					</h2>
					<h3 class="titleMain--lead">
						<p>我們的收購範圍涵蓋各類商品</p>
					</h3>
				</div>

				<div class="products_area_content_wrap products_area_top_content_wrap">
					<a href="/gold/">
						<div class="products_area_top_content_img_wrap">
							<img src="images/index/products_img1@2x.webp" alt="黃金・金條收購">
						</div>
						<p class="products_area_text">黃金・金條收購</p>
					</a>
					<a href="/jewelry/">
						<div class="products_area_top_content_img_wrap">
							<img src="images/index/products_img3@2x.webp" alt="鑽石・珠寶收購">
						</div>
						<p class="products_area_text">鑽石・珠寶收購</p>
					</a>
					<a href="/brand/">
						<div class="products_area_top_content_img_wrap">
							<img src="images/index/products_img4@2x.webp" alt="包包・精品收購">
						</div>
						<p class="products_area_text">包包・精品收購</p>
					</a>
					<a href="/watch/">
						<div class="products_area_top_content_img_wrap">
							<img src="images/index/products_img5@2x.webp" alt="手錶收購">
						</div>
						<p class="products_area_text">手錶收購</p>
					</a>
			</section>
			<!-- おたからやの取り扱い商品 -->

			<!-- おたからやの取扱ブランド -->

			<section class="products_area handling_brand_section">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>Otakaraya</span> 收購品牌
					</h2>
					<h3 class="titleMain--lead">
						<p>我們收購各種精品。以下為部分品牌介紹</p>
					</h3>
				</div>

				<div class="products_area_content_wrap products_area_bottom_content_wrap">
					<a href="/brand-tokei/rolex/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img1@4x.webp" alt="勞力士 Rolex 收購">
						</div>
						<p class="products_area_text">勞力士 Rolex 收購</p>
					</a>
					<a href="/brand-tokei/patekphilippe/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img2@4x.webp" alt="百達翡麗 Patek Philippe 收購">
						</div>
						<p class="products_area_text">百達翡麗 Patek Philippe 收購</p>
					</a>
					<a href="/brand-tokei/audemarspiguet/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img3@4x.webp" alt="愛彼 Audemars Piguet 收購">
						</div>
						<p class="products_area_text">愛彼 Audemars Piguet 收購</p>
					</a>
					<a href="/brand-tokei/vacheronconstantin/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img4@4x.webp" alt="江詩丹頓 Vacheron Constantin 收購">
						</div>
						<p class="products_area_text">江詩丹頓 Vacheron Constantin 收購</p>
					</a>
					<a href="/brand-tokei/lange-soehne/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img5@4x.webp" alt="朗格 A. Lange & Söhne 收購">
						</div>
						<p class="products_area_text">朗格 A. Lange & Söhne 收購</p>
					</a>
					<a href="/brand-tokei/omega/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img6@4x.webp" alt="歐米茄 Omega 收購">
						</div>
						<p class="products_area_text">歐米茄 Omega 收購</p>
					</a>
					<a href="/brand-tokei/iwc/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img7@4x.webp" alt="萬國 IWC 收購">
						</div>
						<p class="products_area_text">萬國 IWC 收購</p>
					</a>
					<a href="/brand/cartier/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img8@4x.webp" alt="卡地亞 Cartier 收購">
						</div>
						<p class="products_area_text">卡地亞 Cartier 收購</p>
					</a>
					<a href="/brand/louis-vuitton/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img9@4x.webp" alt="Louis Vuitton（路易威登）">
						</div>
						<p class="products_area_text">Louis Vuitton（路易威登）</p>
					</a>
					<a href="/brand/hermes/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img10@4x.webp" alt="Hermes 愛馬仕收購">
						</div>
						<p class="products_area_text">Hermes 愛馬仕收購</p>
					</a>
					<a href="/brand/chanel/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img11@4x.webp" alt="Chanel 香奈兒收購">
						</div>
						<p class="products_area_text">Chanel 香奈兒收購</p>
					</a>
					<a href="/brand/dior/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img12@4x.webp" alt="Christian Dior Purchase">
						</div>
						<p class="products_area_text">Christian Dior Purchase</p>
					</a>
					<a href="/brand/celine/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img13@4x.webp" alt="Celine Purchase">
						</div>
						<p class="products_area_text">Celine Purchase</p>
					</a>
					<a href="/brand/fendi/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img14@4x.webp" alt="Fendi Purchase">
						</div>
						<p class="products_area_text">Fendi Purchase</p>
					</a>
					<a href="/brand/gucci/">
						<div class="products_area_img_wrap">
							<img src="images/index/handling_brand_img15@4x.webp" alt="Gucci Purchase">
						</div>
						<p class="products_area_text">Gucci Purchase</p>
					</a>
				</div>
			</section>
			<!-- おたからやの取り扱いブランド -->

			<!-- ctaセクション -->
			<div class="cta_band_img_area">
				<img class="is-pc" style="width: 100%;"
					src="images/index/Now_is_the_time_to_sell_if_you're_unsure_PC.webp" alt="今が売り時">
				<img class="is-sp" style="width: 100%;"
					src="images/index/Now_is_the_time_to_sell_if_you're_unsure_SP.webp" alt="今が売り時">
			</div>
			<!-- ctaセクション -->

			<!--     ▼▼▼おたからやが選ばれる理由▼▼▼     -->
			<section class="reason_section">
				<?php get_template_part( 'template-parts/otakaraya_sel' ); ?>
			</section>
			<!--     ▲▲▲おたからやが選ばれる理由▲▲▲     -->

			<!-- ctaセクション -->
			<div class="cta_band_img_area">
				<img class="is-pc" style="width: 100%;"
					src="images/index/Now_is_the_time_to_sell_if_you're_unsure_PC.webp" alt="今が売り時">
				<img class="is-sp" style="width: 100%;"
					src="images/index/Now_is_the_time_to_sell_if_you're_unsure_SP.webp" alt="今が売り時">
			</div>
			<!-- ctaセクション -->

			<!--     ▼▼▼ 地域・社会活動への取り組み ▼▼▼     -->
			<section class="csr_section">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						地區・社會活動參與
					</h2>
				</div>
				<div class="csr_section_content">
					<img class="is-pc head_img" src="images/index/E-fran_Children's_Cafeteria_PC.webp">
					<img class="is-sp head_img" src="images/index/2024_おたからやトップ_英語版1129.webp">

					<div class="dining_room_area">
						<div class="dining_room_area_ttl">
							<p>透過E-fran兒童餐廳提供餐食援助</p>
						</div>
						<div class="dining_room_area_read">
							<p>E-fran兒童餐廳在日本每週提供兩次(每週150份)、在菲律賓每週一次(100份)營養餐點或便當的援助活動。<br>
								另外,在日本國內我們參與地區活動貢獻社會,在菲律賓則舉辦聖誕節等活動,發送禮物給孩子們。
							</p>
						</div>

						<div class="dining_room_img_area">
							<div class="dining_room_img_area_wrap dining_room_img_area_wrap1">
								<img src="images/index/top_page_link_menu4.webp" alt="菲律賓餐食分發活動">
								<p class="dining_room_img_area_ttl">菲律賓餐食分發活動</p>
								<p class="dining_room_img_area_text">
									在菲律賓,大多數出生在貧困家庭的孩子們,被迫一生都處於貧困狀態。.依家庭狀況,有些孩子必須送到孤兒院,或是成為街頭兒童每天支撐家計。我們每週為住在菲律賓宿霧島約100位貧困兒童,發放營養的手工餐點,希望能讓他們身心都更健康。
								</p>
							</div>
							<div class="dining_room_img_area_wrap dining_room_img_area_wrap2">
								<img src="images/index/top_page_link_menu5.webp" alt="日本國內餐食分發活動">
								<p class="dining_room_img_area_ttl">日本國內餐食分發活動</p>
								<p class="dining_room_img_area_text">我們主要在神奈川縣橫濱市的5個地點:「橫濱橋通商店街
									美味食堂」、「生活創造空間西(Guts・Beat西)」、「曹洞宗青木山本覺寺」、「課後日間服務/交流廣場」、「零食店社區咖啡廳
									兒童之店」,每月共8次為兒童發放營養餐點。</p>
							</div>
							<div class="dining_room_img_area_wrap dining_room_img_area_wrap3">
								<img src="images/index/top_page_link_menu2.webp" alt="緊急援助活動">
								<p class="dining_room_img_area_ttl">緊急援助活動</p>
								<p class="dining_room_img_area_text">
									2021年的颱風和2023年的大規模火災在菲律賓造成巨大損失。.在許多人陷入困境時,我們進行了發放現有食物給受災者的活動。.目前面臨的問題是無法讓所有人都獲得這些物資。
									.E-fran會全力提供支援,讓更多人能收到物資。</p>
							</div>
							<div class="dining_room_img_area_wrap dining_room_img_area_wrap4">
								<img src="images/index/top_page_link_menu3.webp" alt="社區貢獻活動">
								<p class="dining_room_img_area_ttl">社區貢獻活動</p>
								<p class="dining_room_img_area_text">
									在西區民生委員兒童委員協議會的邀請下，我們開始了社區貢獻活動。.這是讓更多人認識「E-fran兒童餐廳」的機會,也是與社區居民交流,讓E-fran股份有限公司能為社區盡一份心力的機會。.我們致力於成為深耕在地的企業，並希望透過活動促進社區居民的幸福生活。
								</p>
							</div>
						</div>

						<div class="btn__wrap btn__red">
							<a href="https://e-fran.jp/contributions/ef-cafe.php">請點擊此處查看詳情</a>
						</div>
					</div>
				</div>
				<div class="colBox">
					<div class="col">
						<a href="https://e-fran.jp/contributions/animal.php" class="img__link">
							<div class="img">
								<img src="images/index/Official_Supporter_of_AniDone.webp" alt="支持動物福利團體">
							</div>
							<p class="csr_section_ttl">支持動物福利團體</p>
							<p class="csr_section_text">我們將部分收益捐贈給「公益社團法人 Animal Donation」，為動物福利盡一份心力。</p>
						</a>
					</div>
					<div class="col">
						<a href="https://e-fran.jp/contributions/backpack.php" class="img__link">
							<div class="img" style="border: 1px solid #eac588;">
								<img src="images/index/Memories_of_Schoolbags_Gift_Program.webp"
									alt="透過「珍愛書包捐贈計畫」，提供自立支援。">
							</div>
							<p class="csr_section_ttl">透過「珍愛書包捐贈計畫」，提供自立支援。</p>
							<p class="csr_section_text">作為社會責任的一部分，E-Fran有限公司將不再使用的書包捐贈給阿富汗兒童。</p>
						</a>
					</div>
					<div class="col">
						<a href="https://e-fran.jp/contributions/food_drive.php" class="img__link">
							<div class="img">
								<img src="images/index/Food_Drive_Drop-off_Box.webp" alt="設置食品募捐箱">
							</div>
							<p class="csr_section_ttl">設置食品募捐箱</p>
							<p class="csr_section_text">E-Fran 作為聯合國永續發展目標（SDGs） 倡議的一部分，為了減少食品浪費等社會問題，已在辦公室內設置了食品募捐箱。.
							</p>
						</a>
					</div>
				</div>
			</section>
			<!--     ▲▲▲ 地域・社会活動への取り組み ▲▲▲     -->
		</article>
	</main>

	<?php get_footer( 'common' ); ?>

	<script src="js/common.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/shared.js"></script>
	<script src="js/breadlist.js"></script>
	<script type="text/javascript" src="js/index_1.js" id="swv-js"></script>
	<script>
		document.querySelectorAll( '.accordion-toggle' ).forEach( function ( button ) {
			button.addEventListener( 'click', function () {
				this.parentElement.classList.add( 'active' );
				this.classList.add( 'hide' );
			} );
		} );
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
</body>

</html>