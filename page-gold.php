<?php
/* Template Name: 金トップページ */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php get_template_part( 'head2' ); ?>
	<!-- local css -->
	<link rel="stylesheet" type="text/css" href="../css/app.min.css">
	<link rel="stylesheet" type="text/css" href="../css/gold.min.css">
	<link rel="stylesheet" type="text/css" href="../css/result_child.min.css">
	<link rel="stylesheet" type="text/css" href="../css/gold_souba_10years.min.css">
	<link rel="stylesheet" href="../css/renew202404.css">
	<link rel="stylesheet" type="text/css" href="../css/shared.css">
	<link rel="stylesheet" type="text/css" href="../css/gold.css">
	<script src="../js/jquery-3.6.3.min.js"></script>
	<title>金・貴金属の高価買取 | 金・貴金属買取専門店のおたからや</title>

	<style>
		.flex__content .content__item {
			margin-bottom: 2em;
		}

		.flex__content .content__item .content--name {
			margin-top: 0.5em;
		}
	</style>

</head>

<?php wp_head(); ?>

<body id="gold">
	<?php get_header( 'common' ); ?>
	<div id="topic__path" class="topic__path">
		<ol class="topic__path--list">
			<li class="topic__path--item" itemprop="itemListElement" itemscope=""
				itemtype="https://schema.org/ListItem">
				<a itemprop="item" href="../">
					<span itemprop="name">收購專門店・OTAKARAYA首頁</span>
				</a>
				<meta itemprop="position" content="1">
			</li>
			<li class="topic__path--item"><span>黃金收購</span></li>
		</ol>
	</div>

	<div class="fv_img_wrap">
		<img class="is-pc" src="../images/gold/gold_TOP_PC.webp" alt="">
		<img class="is-sp" src="../images/gold/gold_TOP_SP.webp" alt="">
		<?php include __DIR__ . '/template-parts/fv_obi.php'; ?>
	</div>


	<?php get_template_part( 'template-parts/license' ); ?>
	<?php get_template_part( 'template-parts/shop-info' ); ?>

	<div class="renew_2024_fv_salespoint is-sp">
		<!--     ▼▼▼ top_h2_text▼▼▼     -->
		<h2 class="titleHeading top_h2_text">
			Visit a Specialized Purchase <span>Store Otakaraya</span> to<br>
			Sell and Appraise Your Gold.
		</h2>
		<!--     ▲▲▲ top_h2_text▲▲▲     -->
	</div>
	<!-- フッター固定ボタン -->
	<div class="renew_2024_fv_lead is-sp">
		Visit a <span>Specialized Purchase Store Otakaraya</span> to Sell and Appraise Your Gold.<br>
		Otakaraya has over 1,300 stores nationwide,<br>
		and at these locations, experienced professional appraisers will provide customers with a purchase price that
		they can be satisfied with
	</div>
	<main class="contents">
		<article class="contents__left">
			<!--     ▼▼▼おたからやセールスポイント▼▼▼     -->
			<section>
				<!--     ▼▼▼ top_h2_text▼▼▼     -->
				<div class="is-pc">
					<h2 class="titleHeading top_h2_text">
						Visit a Specialized Purchase <span>Store Otakaraya</span> to Sell and Appraise Your Gold.
					</h2>
				</div>
				<!--     ▲▲▲ top_h2_text▲▲▲     -->

				<div class="titleMain--lead is-pc">
					<p style="text-align: center; margin: 1rem;">
						Visit a <span>Specialized Purchase Store Otakaraya</span> to Sell and Appraise Your Gold.<br>
						Otakaraya has over 1,300 stores nationwide,<br>
						and at these locations, experienced professional appraisers<br>
						will provide customers with a purchase price that they can be satisfied with
					</p>
				</div>
			</section>
			<!--     ▲▲▲おたからやがセールスポイント▲▲▲     -->
			<p></p>
			<!-- バナー付CTA -->
			<section class="simple_cta_top">
				<?php get_template_part( 'template-parts/assessment_cta' ); ?>
				<!-- ビデオ通話査定CTA -->
			</section>

			<?php get_template_part( 'template-parts/purchase_market_reference' ); ?>
			<?php get_template_part( 'template-parts/calculation_tool' ); ?>
			<section></section>
			<?php /* get_template_part('template-parts/purchase_market_graph'); */ ?>
			<section class="rateSection">
				<div class="is-sp">
					<h3 class="renew_202404_calctool_title">
						Gold<br>
						Purchase Price<br>
						<span>Trend Graph</span>
						<img class="renew_2024_market_update_title graph_title_image"
							src="../images/gold/graph_title_image.png">
					</h3>
					<div class="renew_202404_graph_title_lead">
						We provide a graph showing the gold price (per gram) over different time periods.<br>
						In addition to today's price, you can also refer to movements over the past 6 months or 1 year.
					</div>
				</div>
				<div class="shop__detail--rateGraph">
					<h3 class="titleSub is-pc">Gold Purchase Price Trend Graph</h3>
					<p class="is-pc">
						We provide a graph showing the gold price (per gram) over different time periods.<br>
						In addition to today's price, you can also refer to movements over the past 6 months or 1 year.
					</p>
					<div class="rateGraph__wrap">
						<div class="rateGraph__inner--select form__wrap">
							<div class="price-chart-header form__liner">
								<select id="graph-select" class="form-control my-5">
									<option value="">select type</option>
									<optgroup label="gold">
										<option value="k24_ingot" selected="selected">Ingots (gold)</option>
										<option value="k24">K24</option>
										<option value="k23">K23</option>
										<option value="k22">K22</option>
										<option value="k21.6">K21.6</option>
										<option value="k20">K20</option>
										<option value="k18">K18</option>
										<option value="k14">K14</option>
										<option value="k12">K12</option>
										<option value="k10">K10</option>
										<option value="k9">K9</option>
										<option value="k8">K8</option>
										<option value="k5">K5</option>
									</optgroup>
									<optgroup label="platinum">
										<option value="pt_ingot">Ingots（platinum）</option>
										<option value="pt1000">Pt1000</option>
										<option value="pt950">Pt950</option>
										<option value="pt900">Pt900</option>
										<option value="pt850">Pt850</option>
										<option value="pt650">Pt650</option>
										<option value="pt500">Pt500</option>
										<option value="pt100">Pt100</option>
									</optgroup>
									<optgroup label="silver">
										<option value="sv_ingot">Ingots（silver）</option>
										<option value="sv1000">Sv1000</option>
										<option value="sv925">Sv925</option>
									</optgroup>
									<optgroup label="palladium">
										<option value="pd_ingot">Ingots（palladium）</option>
									</optgroup>
								</select>
							</div>
							<p id="price-chart-legend" class="chart-legend">Ingots (gold) (S$/g)</p>
						</div>
						<div class="flex flex--hasItem6">
							<ul class="flex__tab">
								<li class="tab__item active"><a>1 month</a></li>
								<li class="tab__item "><a>3 months</a></li>
								<li class="tab__item "><a>6 months</a></li>
								<li class="tab__item "><a>1 year</a></li>
								<li class="tab__item "><a>3 years</a></li>
								<li class="tab__item "><a>10 years</a></li>
								<li class="tab__item "><a>20 years</a></li>
								<li class="tab__item "><a>30 years</a></li>
								<li class="tab__item "><a>entire duration</a></li>
							</ul>
							<div class="flex__tabContents no_slider">
								<div class="flex__content active">
									<div class="">
										<canvas id="myChart1" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart2" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart3" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart4" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart5" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart6" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart7" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart8" class="price-chart-canvas"></canvas>
									</div>
								</div>
								<div class="flex__content ">
									<div class="">
										<canvas id="myChart9" class="price-chart-canvas"></canvas>
									</div>
								</div>
							</div>
						</div>
						<script defer="" src="../js/Chart.min.js"></script>
						<script defer="" src="../js/moment.min.js"></script>
						<script>
							let inittype = 'k24_ingot';
							var purity = "k24_ingot";
							var _pagetmpl = 'page-top.php';
						</script>


						<?php

						// REST APIエンドポイントのURL
						$api_url = 'https://www.otakaraya.jp/gold/wp-json/wp/v2/pages/21255/';

						// APIリクエストを実行
						$response = wp_remote_get( $api_url );

						// エラーチェック
						if ( is_wp_error( $response ) ) {
							$error_message = $response->get_error_message();
							echo "Something went wrong: $error_message";
							return;
						}

						$body = wp_remote_retrieve_body( $response );

						$data = json_decode( $body, true );

						?>

						<?php
						$price_gold_yd = (int) $data[ 'acf' ][ 'price_gold_yd' ];
						$price_pt_yd   = (int) $data[ 'acf' ][ 'price_pt_yd' ];
						$price_pd_yd   = (int) $data[ 'acf' ][ 'price_pd_yd' ];
						$price_sv_yd   = (int) $data[ 'acf' ][ 'price_sv_yd' ];
						$price_gold    = (int) $data[ 'acf' ][ 'price_gold' ];
						$price_pt      = (int) $data[ 'acf' ][ 'price_pt' ];
						$price_pd      = (int) $data[ 'acf' ][ 'price_pd' ];
						$price_sv      = (int) $data[ 'acf' ][ 'price_sv' ];
						$price_update  = $data[ 'acf' ][ 'price_update' ];
						$price_update  = DateTime::createFromFormat( 'Ymd', $price_update );
						$price_update  = $price_update->format( 'Y年n月j日' );

						// APIのURL
						$rate_api_url = "https://api.exchangerate-api.com/v4/latest/JPY";

						// APIから為替レートを取得
						$rate_response = file_get_contents( $rate_api_url );
						$rate_data     = json_decode( $rate_response, true );

						// JPYからHKDのレートを取得
						$exchange_rate_src = $rate_data[ 'rates' ][ 'SGD' ];
						$exchange_rate     = $exchange_rate_src * 0.919;
						$pt_exchange_rate  = $exchange_rate_src * 0.976;
						$gold_commission   = 40 * $exchange_rate_src;
						$pt1000_commission = 70 * $exchange_rate_src;
						$pt_commission     = 80 * $exchange_rate_src;
						$sv_commission     = 5 * $exchange_rate_src;

						// 各価格を香港ドルに変換
						$price_gold = (int) ( $price_gold * $exchange_rate );
						$price_pt   = (int) ( $price_pt * $pt_exchange_rate );
						$price_pd   = (int) ( $price_pd * $exchange_rate_src );
						$price_sv   = (int) ( $price_sv * $exchange_rate_src );
						?>
						<!-- <script defer="" src="../js/loadgraph_v4.js"> -->
						<script>
							( function ( $ ) {
								var canvases = document.getElementsByClassName( 'price-chart-canvas' );
								var the_canvas = canvases[ canvases.length - 1 ];
								var goldChart = myChart1 = myChart2 = myChart3 = myChart4 = myChart5 = myChart6 = myChart7 = myChart8 = myChart9 = null;

								$( function () {
									const calendarDraw2 = ( c ) => { // 過去の年度別の金買取相場(/souba/10years/)
										let _targetjson = "";
										switch ( c ) {
											case "k24_ingot":
												_targetjson = jsonret.data.k24_ingot.prices;
												break;
											case "pt_ingot":
												_targetjson = jsonret.data.pt_ingot.prices;
												break;
											case "sv_ingot":
												_targetjson = jsonret.data.sv_ingot.prices;
												break;
											case "pd_ingot":
												_targetjson = jsonret.data.pd_ingot.prices;
												break;
										}

										let yearArray = [];
										let _y = moment().format( "YYYY" );

										for ( let i = 0; i < 11; i++ ) {
											let _checkYear = _y - i;
											let _tmp = [];
											$.each( _targetjson, function ( index, value ) {
												let _pDate = moment( value.date );
												let _pPrice = value.price;
												if ( moment( _pDate ).isSame( _checkYear + "-01-01", "year" ) ) {
													_tmp.push( _pPrice );
												}
											} );
											yearArray[ _y - i ] = _tmp;
										}

										let _table = "";
										for ( let i = 0; i < 11; i++ ) {
											let _max = Math.max.apply( null, yearArray[ _y - i ] );
											let _min = Math.min.apply( null, yearArray[ _y - i ] );
											let sum = 0;

											yearArray[ _y - i ].forEach( function ( v ) {
												sum += Number( v );
											} );
											let _average = sum / yearArray[ _y - i ].length;
											_table += '<tr>';
											_table += '<th><span>' + ( _y - i ) + '<span>年</span></span></th>';
											_table += '<td><span>' + Number( _max ).toLocaleString() + '<span>S$</span></span></td>';
											_table += '<td><span>' + Number( _min ).toLocaleString() + '<span>S$</span></span></td>';
											_table += '<td><span>' + Number( Math.round( _average ) ).toLocaleString() + '<span>S$</span></span></td>';
											_table += '</tr>';
										}
										$( "#yearpriceload" ).html( _table );
									}const drawChart = ( pricesData, metal_type, exchange_rate_src ) => {
										var maxTicksLimitNum = 10;
										if ( $( ".rateGraph__inner--graph" ).width() < 640 ) {
											maxTicksLimitNum = 10;
										}
										var timestamp = ( new Date() ).getTime();
										var id = metal_type + timestamp;
										$( '#price-chart-last-update' ).text( moment( pricesData.header.last_modified.date ).format( "Y年M月D日 9:30" ) + '更新' );
										var limit = 10800;
										var labels = [],
											labels2 = [],
											labels3 = [],
											labels4 = [],
											labels5 = [],
											labels6 = [],
											labels7 = [],
											labels8 = [],
											labels9 = [];
										var prices = [],
											prices2 = [],
											prices3 = [],
											prices4 = [],
											prices5 = [],
											prices6 = [],
											prices7 = [],
											prices8 = [],
											prices9 = [];
										var metal = pricesData.data[ metal_type ];

										if ( metal_type.match( "k" ) ) {
											var bace_metal = pricesData.data[ 'k24_ingot' ];

										}
										if ( metal_type.match( "pt" ) ) {
											var bace_metal = pricesData.data[ 'pt_ingot' ];
										}
										if ( metal_type.match( "sv" ) ) {
											var bace_metal = pricesData.data[ 'sv_ingot' ];
										}
										if ( metal_type.match( "pd" ) ) {
											var bace_metal = pricesData.data[ 'pd_ingot' ];
										}
										if ( metal_type.match( "k" ) ) {
											var text = metal_type.replace( 'k', 'K' );
										}
										if ( metal_type.match( "pt" ) ) {
											var text = metal_type.replace( 'pt', 'Pt' );
										}
										if ( metal_type.match( "sv" ) ) {
											var text = metal_type.replace( 'sv', 'Sv' );
										}
										if ( metal_type.match( "sv" ) ) {
											var text = metal_type.replace( 'sv', 'Sv' );
										}
										if ( metal_type.match( "pt_ingot" ) ) {
											var text = "Ingots（platinum）";
										}
										if ( metal_type.match( "k24_ingot" ) ) {
											var text = "Ingots（gold）";
										}
										if ( metal_type.match( "sv_ingot" ) ) {
											var text = "Ingots （silver）";
										}
										if ( metal_type.match( "pd_ingot" ) ) {
											var text = "Ingots（palladium）";
										}

										$( '#price-chart-legend' ).text( text + " (S$/g)" );
										$( the_canvas ).siblings( '.price-chart-header .todays-price-subtitle' ).text( text + " 買取価格相場 推移グラフ" );

										function ChartDatePrice() {
											exchange_rate = exchange_rate_src * 0.919;
											pt_exchange_rate = exchange_rate_src * 0.976;
											gold_commission = 40 * exchange_rate_src;
											pt1000_commission = 70 * exchange_rate_src;
											pt_commission = 80 * exchange_rate_src;
											sv_commission = 5 * exchange_rate_src;
											bace_price = bace_metal[ i ].price;
											bace_price = Number( bace_price );
											var bace_metal_pd_ingot = pricesData.data.pd_ingot.prices[ i ].price;
											var plus_pt950 = bace_metal_pd_ingot * 0.02;
											var plus_pt900 = bace_metal_pd_ingot * 0.05;
											var plus_pt850 = bace_metal_pd_ingot * 0.08;
											if ( metal_type == "k24_ingot" ) {
												bace_price = Math.round( ( bace_price * exchange_rate ) * 100 ) / 100;
											}
											if ( metal_type == "k24" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.99 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k23" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.94 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k22" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.91 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k21.6" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.89 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k20" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.82 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k18" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.75 ) * 100 ) / 100;
											}
											if ( metal_type == "k17" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.66 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k14" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.57 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k12" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.48 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k10" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.40 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k9" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.36 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k8" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.30 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k7" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.25 - gold_commission ) * 100 ) / 100;
											}
											if ( metal_type == "k5" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.15 - gold_commission ) * 100 ) / 100;
											}

											if ( metal_type == "pt_ingot" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate ) * 100 ) / 100;
											}
											if ( metal_type == "pt1000" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.999 - pt1000_commission ) * 100 ) / 100;
											}
											if ( metal_type == "pt950" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.94 - pt_commission + plus_pt950 ) * 100 ) / 100;
											}
											if ( metal_type == "pt900" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.895 - pt_commission + plus_pt900 ) * 100 ) / 100;
											}
											if ( metal_type == "pt850" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.84 - pt_commission + plus_pt850 ) * 100 ) / 100;
											}
											if ( metal_type == "pt650" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.64 - pt_commission ) * 100 ) / 100;
											}
											if ( metal_type == "pt500" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.49 - pt_commission ) * 100 ) / 100;
											}
											if ( metal_type == "pt100" ) {
												bace_price = Math.round( ( bace_price * pt_exchange_rate * 0.08 - pt_commission ) * 100 ) / 100;
											}

											if ( metal_type == "sv_ingot" ) {
												bace_price = Math.round( ( bace_price * exchange_rate ) * 100 ) / 100;
											}
											if ( metal_type == "sv1000" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.99 - sv_commission ) * 100 ) / 100;
											}
											if ( metal_type == "sv925" ) {
												bace_price = Math.round( ( bace_price * exchange_rate * 0.91 - sv_commission ) * 100 ) / 100;
											}
											if ( metal_type == "pd_ingot" ) {
												bace_price = Math.round( ( bace_price * exchange_rate_src ) * 100 ) / 100;
											}
										}
										prices_bace = bace_metal.prices;
										prices_concat = prices_bace.concat();

										for ( i_date = 1; i_date < 10; i_date++ ) {

											if ( i_date == 1 ) { // 1ヶ月
												bace_metal = prices_concat.slice( 0, 22 ); // 30
												for ( i = 0; i < bace_metal.length; i++ ) {
													if ( !bace_metal[ i ] )
														continue;
													labels.push( moment( bace_metal[ i ].date ).format( "M/D" ) );

													ChartDatePrice()prices.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 2) { // 3ヶ月
												bace_metal = prices_concat.slice(0, 62); // 90
												for (i = 0; i < bace_metal.length; i++) {
													if (!bace_metal[i])
														continue;
													labels2.push(moment(bace_metal[i].date).format("M/D"));

													ChartDatePrice()

													prices2.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 3) { // 6ヶ月
												bace_metal = prices_concat.slice(0, 125); // 180
												for (i = 0; i < bace_metal.length; i++) {
													if (!bace_metal[i])
														continue;
													labels3.push(moment(bace_metal[i].date).format("M/D"));

													ChartDatePrice()

													prices3.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 4) { // 1年
												bace_metal = prices_concat.slice(0, 241); // 360
												for (i = 0; i < bace_metal.length; i++) {
													if (!bace_metal[i])
														continue;
													labels4.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices4.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 5) { // 3年
												bace_metal = prices_concat.slice(0, 712); // 1080
												for (i = 0; i < bace_metal.length; i++) {
													if (!bace_metal[i])
														continue;
													labels5.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices5.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 6) { // 10年
												bace_metal = prices_concat.slice(0, 2650); // 3600
												for (i = 0; i < bace_metal.length; i++) {
													// i = i + 5 ;

													if (!bace_metal[i])
														continue;

													var _fmt = (_pagetmpl == 'page-souba_10years.php') ? 'YYYY/M' : 'YYYY'; // 10年相場ページは日付フォーマットが異なる
													labels6.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices6.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}

											if (i_date == 7) { // 20年
												bace_metal = prices_concat.slice(0, 5100); // 7200
												for (i = 0; i < bace_metal.length; i++) {
													// 5件ごとスキップ
													// i = i + 5 ;
													if (!bace_metal[i])
														continue;
													labels7.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices7.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 8) { // 30年
												bace_metal = prices_concat.slice(0, 7400); // 10800
												for (i = 0; i < bace_metal.length; i++) {
													// 5件ごとスキップ
													// i = i + 5 ;

													if (!bace_metal[i])
														continue;
													labels8.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices8.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}
											if (i_date == 9) { // 全期間
												bace_metal = prices_concat;
												for (i = 0; i < bace_metal.length; i++) {
													// 5件ごとスキップ
													// i = i + 5 ;

													if (!bace_metal[i])
														continue;
													labels9.push(moment(bace_metal[i].date).format("YYYY/M/D"));

													ChartDatePrice()

													prices9.push(bace_price);
													if (i === limit) {
														break;
													}
												};
											}

										};

										labels6 = labels6.filter((_, index) => index % 10 === 0);
										prices6 = prices6.filter((_, index) => index % 10 === 0);
										labels7 = labels7.filter((_, index) => index % 20 === 0);
										prices7 = prices7.filter((_, index) => index % 20 === 0);
										labels8 = labels8.filter((_, index) => index % 30 === 0);
										prices8 = prices8.filter((_, index) => index % 30 === 0);
										labels9 = labels9.filter((_, index) => index % 40 === 0);
										prices9 = prices9.filter((_, index) => index % 40 === 0);
										only_once = 1;
										if (only_once == 1) {
											labels = labels.reverse();
											prices = prices.reverse();
											labels2 = labels2.reverse();
											prices2 = prices2.reverse();
											labels3 = labels3.reverse();
											prices3 = prices3.reverse();
											labels4 = labels4.reverse();
											prices4 = prices4.reverse();
											labels5 = labels5.reverse();
											prices5 = prices5.reverse();

											labels6 = labels6.reverse();
											prices6 = prices6.reverse();
											labels7 = labels7.reverse();
											prices7 = prices7.reverse();
											labels8 = labels8.reverse();
											prices8 = prices8.reverse();
											labels9 = labels9.reverse();
											prices9 = prices9.reverse();
											only_once == 0;
										}
										var maxPrice = Math.max.apply(null, prices);
										var minPrice = Math.min.apply(null, prices);
										var diff = maxPrice * 0.01; // 1%の差分を取得
										var suggestedMax = Math.round(maxPrice + diff); // maxPriceに1%の差分を追加して四捨五入
										var ctx = document.getElementById(id);
										if (goldChart != null) {
											goldChart.destroy()
										};
										if (myChart1 != null) {
											myChart1.destroy();
										}
										if (myChart2 != null) {
											myChart2.destroy();
										}
										if (myChart3 != null) {
											myChart3.destroy();
										}
										if (myChart4 != null) {
											myChart4.destroy();
										}
										if (myChart5 != null) {
											myChart5.destroy();
										}
										if (myChart6 != null) {
											myChart6.destroy();
										}
										if (myChart7 != null) {
											myChart7.destroy();
										}
										if (myChart8 != null) {
											myChart8.destroy();
										}
										if (myChart9 != null) {
											myChart9.destroy();
										}
										if ($("#simulation").width() < 640) {
											maxTicksLimitNum = 10;
										}

										myChart1 = new Chart("myChart1", { // 1ヶ月
											type: "line",
											data: {
												labels: labels,
												datasets: [{
													label: "",
													data: prices,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 3,
													hitRadius: 3
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxTicksLimit: 7,
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: maxTicksLimitNum,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart2 = new Chart("myChart2", { // 3ヶ月
											type: "line",
											data: {
												labels: labels2,
												datasets: [{
													label: "",
													data: prices2,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 2,
													hitRadius: 2
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															autoSkipPadding: 20,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333',
														},
													}]
												}
											}
										});
										myChart3 = new Chart("myChart3", { // 6ヶ月
											type: "line",
											data: {
												labels: labels3,
												datasets: [{
													label: "",
													data: prices3,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															autoSkipPadding: 20,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart4 = new Chart("myChart4", { // 1年
											type: "line",
											data: {
												labels: labels4,
												datasets: [{
													label: "",
													data: prices4,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															autoSkipPadding: 20,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart5 = new Chart("myChart5", { // 3年
											type: "line",
											data: {
												labels: labels5,
												datasets: [{
													label: "",
													data: prices5,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1,
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														yAlign: 'center',
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart6 = new Chart("myChart6", { // 10年
											type: "line",
											data: {
												labels: labels6,
												datasets: [{
													label: "",
													data: prices6,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {

												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},

													}]
												}
											}
										});

										myChart7 = new Chart("myChart7", { // 20年
											type: "line",
											data: {
												labels: labels7,
												datasets: [{
													label: "",
													data: prices7,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart8 = new Chart("myChart8", { // 30年
											type: "line",
											data: {
												labels: labels8,
												datasets: [{
													label: "",
													data: prices8,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
										myChart9 = new Chart("myChart9", { // 全期間
											type: "line",
											data: {
												labels: labels9,
												datasets: [{
													label: "",
													data: prices9,
													fill: false,
													backgroundColor: "#98883a",
													borderColor: "#98883a",
													lineTension: 0.1,
													borderWidth: 1,
													radius: 1,
													hitRadius: 1
												}],
											},
											options: {
												legend: {
													display: false,
												},
												tooltips: {
													callbacks: {
														label: function(tooltipItem, data) {
															var label = data.datasets[tooltipItem.datasetIndex].label || '';
															label = tooltipItem.yLabel.toLocaleString();
															return "S$" + label;
														}
													}
												},
												scales: {
													xAxes: [{
														gridLines: {
															color: "#f0f0f0",
														},
														ticks: {
															maxRotation: 45,
															autoSkip: true,
															maxTicksLimit: 7,
															fontSize: 12,
															fontColor: '#333'
														},
													}],
													yAxes: [{
														gridLines: {
															color: "#f6f6f6",
														},
														ticks: {
															// max: suggestedMax,
															callback: function(label, index, labels) {
																if (label == suggestedMax) {
																	return '';
																}
																return "S$ " + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
															},
															fontSize: 12,
															fontColor: '#333'
														},
													}]
												}
											}
										});
									}

									if (!!window.metalPricesData) {
										if ($("#simulation").width() < 640) {
											maxTicksLimitNum = 10;
										}
										drawChartSet(window.metalPricesData, inittype);

									} else {
										var time = moment().format('YYYYMMDDHHmm');
										$.ajax({
											method: 'get',
											url: '/rate_files_v2/crossdomain.php?url=https://www.otakaraya.jp/rate_files_v2/graph/graph-prices-full.json?time=' + time,
											contentType: 'application/json',
											dataType: 'json',
											success: function(ret) {
												window.metalPricesData = ret;
												drawChartSet(inittype);
												$('#graph-select').val(inittype);
												$('#graph-select').on('change', function() {
													var type = $(this).val();
													drawChartSet(type);
												});

												// 過去の年度別の金買取相場(/souba/10years/)
												setym = "2022-10";
												settype = "k24_ingot";
												jsonret = ret;
												window.metalPricesData = ret;
												calendarDraw2(settype);

											}
										});
									}

									const drawChartSet = (type) => {
										drawChart(window.metalPricesData, type, <?php echo $exchange_rate_src; ?>);
									}
								});
							})(jQuery);
						</script>
					</div>
				</div>
			</section>
			<!-- MOD_20240417 -->

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>
			<!-- ビデオ通話査定CTA -->

			<!-- MOD_20240417 -->

			<?php get_template_part( 'template-parts/gold_reference_purchase_prices' ); ?>

			<div class="is-pc">
				<section class="brandinfo_section gold_top_brandinfo_section">
					<div class="titleMain titleMain--wrapper" style="margin-bottom: 4rem;">
						<h2 class="titleMain--main">
							<span>Why Now is the Right Time to Sell Gold</span>
						</h2>
					</div>
					<div class="fshoplist-target__list brand_about_repeat_parent_wrap is-pc">
						<div class="fshoplist-target--ttl">
							<h3 class="titleSub">Three Important Points About Gold Purchase</h3>
						</div>
						<div class="fshoplist-target--item">
							<div class="horizonlist horizonnumblist">
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">Gold Purchase Price Trends</h4>
										<p>Gold prices change daily.The
											price per gram can fluctuate by
											several hundred yen in a single
											day, and the more gold you sell
											(heavier the item), the greater
											the impact of these price
											fluctuations.
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">Gold Purity</h4>
										<p>Gold is marked with its purity
											(content), such as 24K, 22K, or
											18K.The higher the number in the
											stamp, the rarer it is, and the
											higher its value as gold.
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">Gold Weight</h4>
										<p>
											Gold has a reference purchase
											price set per gram, so the
											appraisal value increases in
											proportion to the weight.At
											Otakaraya's appraisal, we
											measure the weight in 0.1-gram
											units and calculate the gold's
											value accurately.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="fshoplist-target__list brand_about_repeat_parent_wrap is-sp">
						<div class="fshoplist-target--ttl">
							<h3 class="titleSub">K24 買取の<br class="is-sp">
								重要な３つのポイント</h3>
						</div>
						<div class="fshoplist-target--item">
							<div class="horizonlist horizonnumblist">
								<div class="horizonlist--link">
									<div class="sp_text_wrap">
										<h4 class="titleH4 title--left">Gold Purchase Price Trends</h4>
									</div>
									<div class="horizonlist--text">
										<p>
											Gold prices change daily.The
											price per gram can fluctuate by
											several hundred yen in a single
											day, and the more gold you sell
											(heavier the item), the greater
											the impact of these price
											fluctuations.
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="sp_text_wrap">
										<h4 class="titleH4 title--left">Gold Purity</h4>
									</div>
									<div class="horizonlist--text">
										<p>Gold is marked with its purity (content),
											such as 24K, 22K, or 18K.
											The higher the number in the stamp,
											the rarer it is, and the higher
											its value as gold.
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="sp_text_wrap">
										<h4 class="titleH4 title--left">Gold Weight</h4>
									</div>
									<div class="horizonlist--text">
										<p>
											Gold has a reference purchase
											price set per gram, so the
											appraisal value increases in
											proportion to the weight. At
											Otakaraya's appraisal, we
											measure the weight in 0.1-gram
											units and calculate the gold's
											value accurately.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="brandinfo brandinfo_red_repeat">
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">
									Why Otakaraya Can Offer High-Price Gold Purchases
								</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									As a specialized purchase store,
									Otakaraya does not have retail stores to
									sell the items purchased from customers.
									The items we purchase are traded not
									only in Japan but also with corporations
									and businesses in 44 countries
									worldwide.<br />
									<br />
									By eliminating the costs associated with
									selling, we are able to offer high-price
									purchases unique to Otakaraya.
								</div>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">Gold Price Trends Over the Past 30 Years</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									Thirty years ago, in the 1990s, the
									price of gold was around 1,000–1,500 yen
									per gram, which was extremely low by
									today's standards.<br />
									<br />
									However, due to unstable social
									conditions such as the Lehman Brothers
									collapse and the COVID-19 crisis, gold's
									value as a "safe asset" increased, and
									its price soared.<br />
									<br />
									As of 2024, the price of gold has
									surpassed 10,000 yen per gram, reaching
									historic highs.
								</div>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">Tips for Selling Gold at a High Price</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									<br>
									The key to selling gold at a high price
									is "selling when the price of gold is
									high" and "selling to a specialized
									store that offers high purchase prices."
									Gold prices are currently soaring,
									making this the best time to sell. An
									important factor is choosing the right
									purchase store. For gold purchases,
									trust Otakaraya, known for high
									prices.<br />
									<br />
									With over 1,300 stores nationwide, our
									professional appraisers will offer you a
									purchase price that satisfies you.
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="is-sp">
				<div class="renew_202404_sellreason_titlebox">
					<h2 class="renew_202404_sellreason_title_h2">Why Now is the Right Time to Sell Gold</h2>
					<h3 class="renew_202404_sellreason_title_h3">Three Important Points About Gold Purchase</h3>
					<img class="renew_2024_sellreason_title_image" src="../images/gold/point_stars.png">
				</div>
				<section class="renew_202404_sellreason_section">
					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_1.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image01.jpg">
						<h2 class="renew_202404_sellreason_item_title">Gold Purchase Price Trends</h2>
						<div class="renew_202404_sellreason_item_story">
							Gold prices change daily. The price per gram can
							fluctuate by several hundred yen in a single
							day, and the more gold you sell (heavier the
							item), the greater the impact of these price
							fluctuations.
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->

					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_2.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image02.jpg">
						<h2 class="renew_202404_sellreason_item_title">Gold Purity</h2>
						<div class="renew_202404_sellreason_item_story">
							Gold is marked with its purity (content), such
							as 24K, 22K, or 18K. The higher the number in
							the stamp, the rarer it is, and the higher its
							value as gold.
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->

					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_3.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image03.jpg">
						<h2 class="renew_202404_sellreason_item_title">Gold Weight</h2>
						<div class="renew_202404_sellreason_item_story">
							Gold has a reference purchase price set per
							gram, so the appraisal value increases in
							proportion to the weight. At Otakaraya's
							appraisal, we measure the weight in 0.1-gram
							units and calculate the gold's value accurately.
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->
					<h3 class="renew_202404_sellreason_shutter_title">
						Why Otakaraya Can Offer High-Price Gold Purchases
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
							<span>As a specialized purchase store, Otakaraya
								does not have retail stores to sell the
								items purchased from customers.</span>The items we purchase are traded not only in
							Japan but also with corporations and businesses
							in 44 countries worldwide.
						</p>
						<p>
							<span>By eliminating the costs associated with
								selling</span>, we are able to offer high-price purchases
							unique to Otakaraya.
						</p>
					</div>
					<h3 class="renew_202404_sellreason_shutter_title">
						Gold Price Trends Over the Past 30 Years
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
							Thirty years ago,
							<span>in the 1990s, the price of gold was around
								1,000–1,500 yen per gram</span>, which was extremely low by today's standards.
						</p>
						<p>
							However, due to unstable social conditions such
							as the Lehman Brothers collapse and the COVID-19
							crisis, gold's value as a "safe asset"
							increased, and its price soared.
						</p>
						<p>
							<span>As of 2024, the price of gold has surpassed
								10,000 yen per gram, reaching historic
								highs.</span>
						</p>
					</div>
					<h3 class="renew_202404_sellreason_shutter_title">
						Tips for Selling Gold at a High Price
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
							<span>The key to selling gold at a high price is
								"selling when the price of gold is high" and
								"selling to a specialized store that offers
								high purchase prices."</span>
							Gold prices are currently soaring, making this
							the best time to sell. An important factor is
							choosing the right purchase store. For gold
							purchases, trust Otakaraya, known for high
							prices.
						</p>
						<p>
							With over 1,300 stores nationwide, our
							professional appraisers will offer you a
							purchase price that satisfies you.
						</p>
					</div>
				</section>
			</div>
			<!-- MOD_20240417 -->
			<?php get_template_part( 'template-parts/assessment_cta' ); ?>

			<!-- MOD_20240417 -->

			<section class="reason_section">
				<?php get_template_part( 'template-parts/otakaraya_sel' ); ?>
			</section>

			<!-- MOD_20240417 -->
			<section class="renew_2024_unknownok_section is-sp">
				<div class="renew_2024_unknownok_titlebox">
					<h2 class="renew_2024_unknownok_title">
						Don't worry if you're unsure of the purity of your
						gold items for purchase.
					</h2>
					<img class="renew_2024_unknownok_title_image"
						src="../images/gold/ok_photo_202404.png">
				</div>
				<div class="renew_2024_unknownok_item_titlebox first">
					About Gold Purity
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
						Gold grades, such as 24K or 18K, are marked using a
						unique system called the 24th part ratio. In
						addition to the 24th part ratio stamps, some items
						may also have a hallmark, which is a purity
						certification from a minting authority. Although the
						hallmark does not directly increase the value of the
						gold, it is important for ensuring safe
						transactions, as there are many different types of
						gold circulating in the market.
					</p>
					<p>
						Especially for overseas products, it can be
						difficult to determine gold purity from the stamp.
						Even items without stamps can be purchased, so feel
						free to consult with us.
					</p>
				</div>
				<div class="renew_2024_unknownok_item_titlebox">
					We Accurately Measure Unknown Precious Metal Purities
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
						If you're unsure of the purity or if there is no
						stamp, don't worry.<br />
						We can accurately measure the value of low-purity
						gold or alloys made of multiple metals in a short
						time, and offer an on-the-spot cash purchase.<br />
						Feel free to contact us, even if other stores have
						refused your items.
					</p>
				</div>
				<div class="renew_2024_unknownok_item_titlebox">
					We Assess the Value of Jewelry Stones and Design Along
					with Gold
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
						At Otakaraya, when purchasing gold items, we
						consider not only the value of the gold itself but
						also the value of the jewelry stones and the
						design.<br />
						As a specialized store that purchases a wide range
						of precious metals, Otakaraya offers high-value
						appraisals unique to us.
					</p>
				</div>
			</section>
			<section class="brandinfo_section gold_top_brandinfo_section is-pc">
				<div class="titleMain titleMain--wrapper" style="margin-bottom: 4rem;">
					<h2 class="titleMain--main">
						<span>Don't worry if you're unsure of the purity of
							your gold items for purchase.</span>
					</h2>
				</div>
				<div class="brandinfo brandinfo_red_repeat">
					<div class="brandinfo__main fshoplist-target__list">
						<div class="brandinfo__header fshoplist-target--ttl">
							<h3 class="brandinfo__header__title">About Gold Purity</h3>
						</div>
						<div class="fshoplist-target--item brandinfo__body no--image">
							<div class="brandinfo__body__text brandinfo__body__text--top">
								<p> Gold grades, such as 24K or 18K, are marked
									using a unique system called the 24th part
									ratio. In addition to the 24th part ratio
									stamps, some items may also have a hallmark,
									which is a purity certification from a
									minting authority. Although the hallmark
									does not directly increase the value of the
									gold, it is important for ensuring safe
									transactions, as there are many different
									types of gold circulating in the market.<br />
									<br />
									Especially for overseas products, it can be
									difficult to determine gold purity from the
									stamp. Even items without stamps can be
									purchased, so feel free to consult with us.
								</p>
							</div>
						</div>
					</div>
					<div class="brandinfo__main fshoplist-target__list">
						<div class="brandinfo__header fshoplist-target--ttl">
							<h3 class="brandinfo__header__title">
								We Accurately Measure Unknown Precious Metal
								Purities </h3>
						</div>
						<div class="fshoplist-target--item brandinfo__body no--image">
							<div class="brandinfo__body__text brandinfo__body__text--top">
								<p>
									If you're unsure of the purity or if there
									is no stamp, don't worry. We can accurately
									measure the value of low-purity gold or
									alloys made of multiple metals in a short
									time, and offer an on-the-spot cash
									purchase. Feel free to contact us, even if
									other stores have refused your items.</p>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">
									We Assess the Value of Jewelry Stones and
									Design Along with Gold
								</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									<p>
										At Otakaraya, when purchasing gold items, we
										consider not only the value of the gold
										itself but also the value of the jewelry
										stones and the design. As a specialized
										store that purchases a wide range of
										precious metals, Otakaraya offers high-value
										appraisals unique to us.
									</p>
								</div>
							</div>
						</div>
					</div>
			</section>
			<section class="renew_2024_top_gg_section is-sp" style="margin-top:0px !important;">
				<img class="renew_2024_top_gg_photo" src="../images/gold/photo_ito_sp.webp" alt="鑑定士の紹介">
				<div class="renew_2024_top_gg_profile_superbox">
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left"> 名前 </div>
						<div class="renew_2024_top_gg_profile_right"> Ito </div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">Hobbies</div>
						<div class="renew_2024_top_gg_profile_right">shopping</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">Favorite phrase</div>
						<div class="renew_2024_top_gg_profile_right">Walk the walk and talk the talk.</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">Favorite brand</div>
						<div class="renew_2024_top_gg_profile_right"> Harry Winston</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">Past purchase examples</div>
						<div class="renew_2024_top_gg_profile_right">Orin, ingots</div>
					</div>
					<div class="renew_2024_top_gg_storybox">
						At Otakaraya, when purchasing gold, we use today's
						reference purchase price for gold per gram and also
						consider factors such as design to offer high-value
						purchases. We have appraised over 10,000 items in
						the past, and many customers have been pleased with
						the amounts, often exceeding their expectations.
						Additionally, Otakaraya equips all of its stores
						with specific gravity scales, allowing us to
						accurately measure the gold content.
					</div>
					<div class="renew_2024_top_gg_storybox">
						Not only do we offer competitive prices, but we also
						strive to provide the highest level of customer
						service. We go beyond just valuing the items; we
						take the time to understand and respect each
						customer's feelings, ensuring they leave satisfied
						with our thorough explanations. We are dedicated to
						serving you with sincerity and care, and we look
						forward to your visit to Otakaraya.
					</div>
				</div>
			</section>
			<section class="is-pc">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>Introduction of Appraisers</span>
					</h2>
				</div>
				<div class="content-inner">
					<section id="shop-leader02">
						<div class="shop-leader_container bordersitecolor">
							<div class="shop-leader_inner bordersitecolor">
								<div class="shop-leader_profile relative">
									<div class="shop-leader_head absolute">
										<h2 class="is-pc bgsitecolor bordersitecolor relative">
											<span class="noto thin" style="font-size: 26px; font-family: serif;">
												Appraiser
											</span>
										</h2>
										<h2 class="is-sp bgsitecolor bordersitecolor relative">
											<span class="noto thin" style="margin:-1rem 0 0 0; font-size: 26px; font-family: serif;">
												Appraiser
											</span>
										</h2>
									</div>
									<div class="shop-leader_head_shadow absolute">
										<div class="relative"></div>
									</div>
									<div class="imgbox absolute"><img
											src="../images/gold/estimator_ito.webp" alt=""></div>
									<ul class="floatlist">
										<li class="shop-leader_name sitetextcolor" style="font-family: serif;">
											<span class="noto ja" style="font-weight: bold;">Ito</span>
										</li>
										<li class="shop-leader_info">
											<table>
												<tbody>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">Hobbies</span>
														</th>
														<td><span class="noto">shopping</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">Favorite phrase</span>
														</th>
														<td><span class="noto">Walk the walk and talk the talk.</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">Favorite brand</span>
														</th>
														<td><span class="noto">Harry Winston</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">Past purchase examples</span>
														</th>
														<td>
															<span class="noto">Orin,ingots</span>
														</td>
													</tr>
												</tbody>
											</table>
										</li>
									</ul>
								</div>
								<p class="shop-leader_text">
									<span class="noto">
										At Otakaraya, when purchasing gold, we use today's
										reference purchase price for gold per gram and also
										consider factors such as design to offer high-value
										purchases. We have appraised over 10,000 items in
										the past, and many customers have been pleased with
										the amounts, often exceeding their expectations.
										Additionally, Otakaraya equips all of its stores
										with specific gravity scales, allowing us to
										accurately measure the gold content.
										<br /><br />
										Not only do we offer competitive prices, but we also
										strive to provide the highest level of customer
										service. We go beyond just valuing the items; we
										take the time to understand and respect each
										customer's feelings, ensuring they leave satisfied
										with our thorough explanations. We are dedicated to
										serving you with sincerity and care, and we look
										forward to your visit to Otakaraya.
									</span>
								</p>
								<div class="shop-detail_button clearfix"> </div>
							</div>
						</div>
					</section>
				</div>
			</section>

			<!-- MOD_20240417 -->
			<div class="is-pc">
				<section>
					<div class="titleMain titleMain--wrapper">
						<h2 class="titleMain--main">
							<span>We will purchase</span> gold in any condition.
						</h2>
						<div class="titleMain--lead">
							<p>We are happy to purchase small amounts of
								gold, broken accessories, and more.
							</p>
						</div>
					</div>
					<div class="colBox colBox__col04 sp__col03">
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/04-1.webp" alt="Bent or torn gold"></p>
								<p class="is-sp"><img src="../images/gold/04-1.webp" alt="Bent or torn gold"></p>
							</div>
							<p class="text text--center">Bent or torn gold</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/07-1.webp" alt="Gold without a stamp"></p>
								<p class="is-sp"><img src="../images/gold/07-1.webp" alt="Gold without a stamp"></p>
							</div>
							<p class="text text--center">Gold without a stamp</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/02-1.webp" alt="Single earring or small amounts of gold"></p>
								<p class="is-sp"><img src="../images/gold/02-1.webp" alt="Single earring or small amounts of gold"></p>
							</div>
							<p class="text text--center">Single earring or small amounts of gold</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/03-1.webp" alt="Gold fittings from belts"></p>
								<p class="is-sp"><img src="../images/gold/03-1.webp" alt="Gold fittings from belts"></p>
							</div>
							<p class="text text--center">Gold fittings from belts</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/06-1.webp" alt="Industrial-grade gold"></p>
								<p class="is-sp"><img src="../images/gold/06-1.webp" alt="Industrial-grade gold"></p>
							</div>
							<p class="text text--center">Industrial-grade gold</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/08-1-1.webp" alt="Art value considered"></p>
								<p class="is-sp"><img src="../images/gold/08-1-1.webp" alt="Art value considered"></p>
							</div>
							<p class="text text--center">Art value considered</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/01-1.webp" alt="Antique value considered"></p>
								<p class="is-sp"><img src="../images/gold/01-1.webp" alt="Antique value considered"></p>
							</div>
							<p class="text text--center">Antique value considered</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/05-1-1.webp" alt="Gold teeth, gold dentures"></p>
								<p class="is-sp"><img src="../images/gold/05-1-1.webp" alt="Gold teeth, gold dentures"></p>
							</div>
							<p class="text text--center">Gold teeth, gold dentures</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc">
									<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp"
										alt="Rings with missing stones">
								</p>
								<p class="is-sp">
									<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp"
										alt="Rings with missing stones">
								</p>
							</div>
							<p class="text text--center">Rings with missing stones</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc">
									<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp"
										alt="Tarnished accessories">
								</p>
								<p class="is-sp">
									<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp"
										alt="Tarnished accessories">
								</p>
							</div>
							<p class="text text--center">Tarnished accessories</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp"
										alt="Pendant tops only"></p>
								<p class="is-sp"><img src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp"
										alt="Pendant tops only"></p>
							</div>
							<p class="text text--center">Pendant tops only</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp"
										alt="Brooches and gold parts"></p>
								<p class="is-sp"><img src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp"
										alt="Brooches and gold parts"></p>
							</div>
							<p class="text text--center">Brooches and gold parts</p>
						</div>
					</div>
				</section>
			</div>
			<div class="is-sp">
				<div class="renew_202404_statebad_titlebox">
					<h2 class="renew_202404_statebad_title_h2">
						We will purchase gold in any condition.
					</h2>
					<div class="renew_202404_statebad_title_lead">
						We are happy to purchase small amounts of gold,
						broken accessories, and more.
					</div>
				</div>
				<section class="renew_202404_statebad_section">
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/04-1.webp" alt="Bent or torn gold">
						</div>
						Bent or torn gold
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/07-1.webp" alt="Gold without a stamp">
						</div>
						Gold without a stamp
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/02-1.webp" alt="Single earring or small amounts of gold">
						</div>
						Single earring or small amounts of gold
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/03-1.webp" alt="Gold fittings from belts">
						</div>
						Gold fittings from belts
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/06-1.webp" alt="Industrial-grade gold">
						</div>
						Industrial-grade gold
					</div>
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/08-1-1.webp" alt="Art value considered">
						</div>
						Art value considered
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/01-1.webp" alt="Antique value considered">
						</div>
						Antique value considered
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/05-1-1.webp" alt="Gold teeth, gold dentures">
						</div>
						Gold teeth, gold dentures
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp" alt="Rings with missing stones">
						</div>
						Rings with missing stones
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp" alt="Tarnished accessories">
						</div>
						Tarnished accessories
					</div>
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img
								src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp" alt="Pendant tops only">
						</div>
						Pendant tops only
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img
								src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp" alt="Brooches and gold parts">
						</div>
						Brooches and gold parts
					</div>
				</section>
				<!-- renew_202404_statebad_section -->
			</div>

			<!-- MOD_20240417 -->
			<h2 class="renew_2024_titlesub follow is-sp">
				<div class="renew_2024_titlesub_topbar">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				Frequently Asked <span>Questions</span>
			</h2>
			<section class="faq_section renew_2024">
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						Frequently Asked <span>Questions</span>
					</h2>
				</div>
				<div class="qa__wrap js__more--3th">
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								How is the assessment of gold items from
								branded goods done?
							</dt>
							<dd class="qa__list__a">
								For branded rings, necklaces, and other
								items, we evaluate both the price of gold
								and the value as a brand. In some cases, the
								brand value may result in a price much
								higher than the value of the gold itself.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can Otakaraya purchase items with lower
								purity, such as K10?
							</dt>
							<dd class="qa__list__a">
								Yes, we can absolutely purchase them. For
								example, even if there is no stamp, as long
								as we can confirm that the item contains
								some gold, we will gladly purchase it.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								I have accessories, but the material is
								unknown.
							</dt>
							<dd class="qa__list__a">
								If you bring them in, we will verify the
								material on the spot. Please feel free to
								consult with us.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can you purchase small amounts of gold?
							</dt>
							<dd class="qa__list__a">
								Regardless of the amount, we are happy to
								assess and purchase your items. Even if
								you're unsure whether it's gold, we offer
								free appraisals, so please don't hesitate to
								contact us.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								I’m worried about neighbors noticing if I
								use the home visit service.
							</dt>
							<dd class="qa__list__a">
								When our appraisers visit your home by car,
								they will use a private vehicle without any
								company logos, so you can feel at ease.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can you purchase items without accessories?
							</dt>
							<dd class="qa__list__a">
								While having accessories is ideal, we are
								more than happy to assess and purchase items
								even without them.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Why is identification required?
							</dt>
							<dd class="qa__list__a">
								The identification of the seller is required
								by the Antique Dealer Law, and we are
								required to keep a record for that purpose.
								It will not be used for any other reasons.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Is it okay just to get an appraisal for gold
								and precious metals?
							</dt>
							<dd class="qa__list__a">
								Yes, of course, we are happy to provide
								appraisals even without any commitment to
								sell. <br />
								The items you bring in likely hold many
								memories—perhaps it's something you bought
								with your first bonus, a gift from your
								parents for your coming-of-age celebration,
								or a wedding gift from your grandmother.
								<br />
								Each item has its own story. <br />
								You might wonder, 'How much would something
								I have stored away be worth if I actually
								sold it?' <br />
								Otakaraya can help answer that question.
								<br />
								We offer various appraisal methods tailored
								to your needs, whether in-store or via home
								visits. <br />
								Please feel free to use our services and,
								after getting the appraisal result, discuss
								it with your family.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can Otakaraya purchase torn gold?
							</dt>
							<dd class="qa__list__a">
								We are happy to assess and purchase it.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Is there an appraisal fee (authentication
								fee) for gold and precious metals?
							</dt>
							<dd class="qa__list__a">
								For gold, precious metals, and other items,
								we do not charge any appraisal fees.<br />
								All appraisals are completely free of
								charge, so please do not worry about it.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Does the purchase price of an ingot differ
								depending on whether it has a stamp or not?
							</dt>
							<dd class="qa__list__a">
								The stamp is an important indication of the
								'brand and trust' of the ingot.
								Additionally, ingots are often engraved with
								a number to identify the original
								purchaser.<br />
								For items without these markings, we may
								unfortunately decline to purchase them. This
								is because, in recent years, there have been
								cases of ingots being smuggled into Japan
								from overseas, and criminals often melt and
								sell them to hide their origin.<br />
								While there are cases where we may refuse to
								buy, if there is proof of the purchase or a
								valid explanation that aligns with the
								item’s origin, we can still offer the same
								purchase price as a regular ingot. Please
								feel free to contact us for further
								inquiries.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Do the purchase prices differ between gold
								accessories and ingots?
							</dt>
							<dd class="qa__list__a">
								Yes, the purchase prices for accessories and
								ingots do differ.<br />
								First, ingots are typically made of pure
								gold (K24). There are various brands of
								ingots, and only globally recognized
								companies are allowed to stamp their logos
								on them. Ingots from highly trusted brands
								are traded at higher prices in the
								market.<br />
								Additionally, ingots are processed through
								various stages in a refinery to be turned
								into gold bars (bullion).<br />
								The processing fees for these stages are
								included in the purchase price, which is one
								of the reasons why there is a difference in
								price between accessories and ingots.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Will you buy a necklace with a broken chain?
							</dt>
							<dd class="qa__list__a">
								Yes, we will gladly purchase necklaces with
								broken chains. Most of these items can be
								easily repaired, so please feel free to
								bring them in.<br />
								If you attempt to fix them yourself with
								tools like pliers, it may damage the item
								and reduce its original value. We recommend
								bringing the item as-is and consulting with
								us.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Do scratches or dirt affect the purchase
								price?
							</dt>
							<dd class="qa__list__a">
								While it is always better to have items in
								clean condition, attempting to clean them
								yourself can sometimes cause scratches to
								spread, potentially reducing their value.<br />
								For dirt, using chemicals or harsh cleaning
								methods may cause the item to lose its
								original color, diminishing its quality.
								Therefore, it’s best not to try cleaning the
								item yourself.<br />
								If you are concerned about dirt, gently wipe
								it with a dry, soft cloth, or you may use a
								diluted mild detergent.<br />
								However, since proper care of gold and
								precious metals requires specialized
								knowledge, it's crucial to avoid doing
								anything that could affect the item's
								condition. If you're unsure about how to
								proceed, feel free to consult with one of
								our nearby stores or customer service.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can gold or precious metals without markings
								be appraised?
							</dt>
							<dd class="qa__list__a">
								Yes, we can buy them. <br />
								While most modern items have markings, older
								items or products made overseas often lack
								these markings. Some stores may not accept
								items without markings, but Otakaraya has a
								fluorescent X-ray analysis device. <br />
								This allows us to scientifically measure the
								gold or precious metal content, even if
								traditional methods cannot detect it.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								Can large and small gold coins, foreign gold
								coins, antique coins, and other coins be
								bought?
							</dt>
							<dd class="qa__list__a">
								Of course, we buy large and small gold coins
								issued during the Edo period, as well as old
								money (banknotes and coins), commonly known
								as antique coins. <br />
								Foreign gold coins, such as China's "Panda
								Gold Coin," America's "Eagle Gold Coin," and
								Canada's "Maple Leaf Gold Coin," are highly
								sought after worldwide. <br />
								These premium gold coins may be evaluated
								only based on the gold's quality and weight
								at other stores, but at Otakaraya, we
								evaluate their overall value and offer high
								purchase prices. <br />
								In addition to gold coins, we also buy
								silver coins, palladium, platinum coins,
								commemorative coins, and medals.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								How long does the "gold and precious metal
								appraisal" take?
							</dt>
							<dd class="qa__list__a">
								The time required for appraisal depends on
								the volume of the items, but it usually
								takes about 5 to 15 minutes. <br />
								If you can't visit the store or don't have a
								store nearby, you can also use our home
								visit appraisal service. Choose the
								appraisal method that best suits your
								lifestyle. We also accept consultations by
								phone or email. <br />
								Regardless of the appraisal method you
								choose, the appraised price offered will not
								change. <br />
								Additionally, all appraisal services are
								free of charge, so please feel assured.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								When is the best time to sell gold and
								precious metals? Is it true that the
								purchase price changes depending on the day?
							</dt>
							<dd class="qa__list__a">
								The market price is updated daily, so the
								purchase price can vary depending on the
								day. <br />
								The best time to sell is when the gold
								market is high or when the exchange rate is
								leaning towards a weaker yen. <br />
								Additionally, during times of global
								instability, the trust in paper currencies
								tends to decrease, which increases trust in
								gold, and as a result, the market price
								rises. <br />
								In recent years, the price of gold and
								precious metals has been on a long-term
								upward trend, so high purchase prices can be
								expected.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								How is the purchase price of gold and
								precious metals determined?
							</dt>
							<dd class="qa__list__a">
								The purchase price is determined based on
								three factors: the globally updated market
								price, the weight of the item, and the
								purity of the item (such as K24, K18).
								Additionally, a comprehensive evaluation of
								the design and brand is considered to
								finalize the purchase price. We aim to offer
								higher purchase prices compared to other
								companies.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								When is the best time to sell precious
								metals?
							</dt>
							<dd class="qa__list__a">
								The best time to sell precious metals can
								vary. Sometimes, the right time comes
								quickly, while in other cases, holding onto
								them for a longer period can increase their
								value. It's not always possible to say when
								the right time will be. If you plan to store
								them for the long term before selling, it is
								important to store them properly and perform
								regular maintenance to preserve their
								condition.
							</dd>
						</dl>
					</div>
				</div>
				<div class="btn__wrap btn__more js__more--btn3 gtm-more-qa">
					<span>View More</span>
				</div>
			</section>
			<div class="wd_spacer is-pc"></div>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>
		</article>
		<?php get_template_part( 'template-parts/side-menu' ); ?>
	</main>


	<?php get_footer( 'common' ); ?>
	<script src="../js/common.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/shared.js"></script>
	<script src="../js/breadlist.js"></script>
	<script src="../js/renew202404.js"></script>
	<script src="../js/vue.min.js"></script>
	<script src="../js/axios.min.js"></script>
	<script src="../js/japanese-holidays.min.js"></script>
	<script src="../js/price_load_ex_v2.js"></script>
	<script>
		//crossdomainのphpファイルのアップ先URL
		const crossdomain_file = "https://www.otakaraya.jp/rate_files_v2/crossdomain.php";
		//データを反映したいDOM要素のID
		const dom_id = ["#price", "#simulation", "#todayprice", "#gram_market_price"];
		Vue.use(PriceLoad, {
			_file: crossdomain_file,
			_dom: dom_id
		});
	</script>
	<script>
		$(window).on('load', function() {
			const moreNum31 = 3;
			$('.js__more--item31:nth-child(n + ' + (moreNum31 + 1) + ')').addClass('is-hidden').hide();
			$('.js__more--btn31').on('click', function() {
				const hiddenItems1 = $(this).prev('.js__more--31th').children('.js__more--item31.is-hidden');
				hiddenItems1.slice(0, moreNum31).removeClass('is-hidden').fadeIn(600); // フェードインしながら展開
				if (hiddenItems1.length <= moreNum31) $(this).fadeOut(); // すべて表示されたら非表示
			});
		});

		$(window).on('load', function() {
			const moreNum30 = 3;
			$('.js__more--item30:nth-child(n + ' + (moreNum30 + 1) + ')').addClass('is-hidden').hide();
			$('.js__more--btn30').on('click', function() {
				const hiddenItems2 = $(this).prev('.js__more--30th').children('.js__more--item30.is-hidden');
				hiddenItems2.slice(0, moreNum30).removeClass('is-hidden').fadeIn(600); // フェードインしながら展開
				if (hiddenItems2.length <= moreNum30) $(this).fadeOut(); // すべて表示されたら非表示
			});
		});

		$(function() {
			appear();
		})
		$(window).scroll(function() {
			appear();
		})

		function appear() {
			$(".renew_2024_market_countup").each(
				function() {
					var now_screen_h = $(window).height();
					var now_screen_w = $(window).width();
					var ap_position = $(this).offset().top;
					var gap = 0;
					if ($(this).hasClass("wd_appear2")) {
						gap += 80;
					} else if ($(this).hasClass("wd_appear3")) {
						gap += 160;
					}
					if ($(window).scrollTop() > ap_position - now_screen_h + gap) {

						if ($(this).hasClass("done") == false) {

							var price_text = $(this).text();
							var price_num = parseInt(price_text.replace(",", ""));
							//countupper( $(this) , price_num , 1000 ) ;
							$(this).text(Math.abs(price_num));

							$(this).addClass("done");

						}

					}
				}
			);
		}

		function countupper(obj, last, time) {
			if (last < 0) {
				last = last * -1;
			}
			$({
				countup: 0
			}).stop().animate({
				countup: last
			}, {
				progress: function() {
					obj.text(Math.floor(this.countup).toLocaleString());
				},
				duration: time
			});
		}

		jQuery(function() {
			jQuery(document).on('click', '.w_tab', function() {
				$('.w_tab, .w_unit').removeClass('active');
				$('#answer, .weight').val('');

				if ($(this).hasClass('w_gram')) {
					$('.w_gram').addClass('active');

				} else if ($(this).hasClass('w_oz')) {
					$('.w_oz').addClass('active');
					$('.w_oz .weight').prop('selectedIndex', 0);

				}
			});
		});



		function priceset() {
			// 読み込み時にselect二種類追加
			var k18val = jQuery('#k18val').text();
			k18val = k18val.replace(/,/g, '');

			var pt900 = jQuery('#pt900').text();
			var pt850 = jQuery('#pt850').text();
			pt900 = pt900.replace(/,/g, '');
			pt850 = pt850.replace(/,/g, '');
			pt900 = Math.round(pt900 / 2 + k18val / 2);
			pt850 = Math.round(pt850 / 2 + k18val / 2);

			var tool_bace_price = jQuery('#tool_bace_price').text();
			var pt_tool_bace_price = jQuery('#pt_tool_bace_price').text();
			var pd_tool_bace_price = jQuery('#pd_tool_bace_price').text();
			tool_bace_price = Number(tool_bace_price.replace(/,/g, ''));
			pt_tool_bace_price = Number(pt_tool_bace_price.replace(/,/g, ''));
			pd_tool_bace_price = Number(pd_tool_bace_price.replace(/,/g, ''));

			plus_pt950 = pd_tool_bace_price * 0.02;
			plus_pt900 = pd_tool_bace_price * 0.05;
			plus_pt850 = pd_tool_bace_price * 0.08;

			k24_price = Math.round(tool_bace_price * 0.99 - 40);
			k23_price = Math.round(tool_bace_price * 0.94 - 40);
			k22_price = Math.round(tool_bace_price * 0.91 - 40);
			k21_price = Math.round(tool_bace_price * 0.89 - 40);
			k20_price = Math.round(tool_bace_price * 0.82 - 40);
			k18_price = Math.round(tool_bace_price * 0.75);
			k14_price = Math.round(tool_bace_price * 0.57 - 40);
			k12_price = Math.round(tool_bace_price * 0.48 - 40);
			k10_price = Math.round(tool_bace_price * 0.40 - 40);
			k9_price = Math.round(tool_bace_price * 0.36 - 40);
			k8_price = Math.round(tool_bace_price * 0.30 - 40);
			k5_price = Math.round(tool_bace_price * 0.15 - 40);
			k7_price = Math.round(tool_bace_price * 0.25 - 40);
			k17_price = Math.round(tool_bace_price * 0.66 - 40);

			pt1000_price = Math.round(pt_tool_bace_price * 0.999 - 70);
			pt950_price = Math.round(pt_tool_bace_price * 0.94 - 80 + plus_pt950);
			pt900_price = Math.round(pt_tool_bace_price * 0.895 - 80 + plus_pt900);
			pt850_price = Math.round(pt_tool_bace_price * 0.84 - 80 + plus_pt850);
			pt650_price = Math.round(pt_tool_bace_price * 0.64 - 80);
			pt500_price = Math.round(pt_tool_bace_price * 0.49 - 80);
			pt100_price = Math.round(pt_tool_bace_price * 0.08 - 80);

			k18_half = k18_price / 2;
			pt900_half = pt900_price / 2;
			pt850_half = pt850_price / 2;
			k18_pt900_half = k18_half + pt900_half;
			k18_pt850_half = k18_half + pt850_half;

			var purity = 'gold-top';
		}


		jQuery(window).on("load", function() {
			setTimeout(() => {
				priceset();
			}, 2000);
		});

		//window.onload = priceset;
		document.addEventListener('DOMContentLoaded', function() {
			var select_state = document.getElementById("rateSimulation--select");
			jQuery(document).on('change', '#rateSimulation--select', function() {
				var text = jQuery('option:selected').val();
				multi();
			});

			jQuery(document).on('blur change', '.weight', function() {
				var text = jQuery(this).val() || jQuery('option:selected', '.weight').val();
				multi();
			});

			function multi() {
				var text = jQuery('#rateSimulation--select option:selected').val();
				var removed = text.replace(/,/g, '');
				var num = parseInt(removed, 10);
				var weight = jQuery(".weight").val() || jQuery('option:selected', '.weight').val();
				if (num) {
					if (weight) {
						var answer = num * weight;
						answer = Math.round(answer);
						answer = answer.toLocaleString();
						jQuery('#answer').val(answer);
					}
				}
				console.log(weight)
			}

			jQuery(function() {
				jQuery(document).on('mouseup keyup change', '.weight', function(e) {
					var month = parseInt(jQuery(this).val());
					var monthMax = parseInt(jQuery(this).attr('max'));
					var monthMin = parseInt(jQuery(this).attr('min'));
					if (month > monthMax) {
						jQuery(this).val(monthMax);
					}
					if (month < monthMin) {
						jQuery(this).val(monthMin);
					}
				});
			});
		});
		let cnt = document.getElementById('cat_list').childElementCount;
		if (cnt === 5) {
			let elements = document.querySelectorAll('.tab__item');
			let lastElement = elements[elements.length - 1];
			lastElement.classList.add('tab__item_others');
		}

		document.addEventListener('DOMContentLoaded', function() {
			const items = document.querySelectorAll('.latest_results_item');
			const loadMoreButton = document.querySelector('.js__more--btn10');
			let itemsToShow = 8;

			// 初期状態で8個表示
			function showItems() {
				items.forEach((item, index) => {
					if (index < itemsToShow) {
						item.style.display = 'block';
					} else {
						item.style.display = 'none';
					}
				});
			}

			// 最新結果が8個以下の場合、ボタンを非表示にする
			if (items.length <= 8) {
				loadMoreButton.style.display = 'none';
			} else {
				// ボタンクリック時にさらに8個表示
				loadMoreButton.addEventListener('click', function() {
					itemsToShow += 8;
					showItems();

					// すべて表示された場合、ボタンを非表示に
					if (itemsToShow >= items.length) {
						loadMoreButton.style.display = 'none';
					}
				});
			}

			// 初期表示を呼び出す
			showItems();
		});
		var itemCount = $('.latest_results_item').length;

		console.log(itemCount);

		// 要素の数が10個未満の場合に実行する処理
		if (itemCount < 11) {
			// ここに処理を記述
			console.log('latest_results_item のクラスが10個未満です');

			// 例えば、特定の要素にメッセージを追加する場合
			$('#message').text('There are less than 10 items.');
		}

		document.addEventListener('DOMContentLoaded', function() {
			const headers = document.querySelectorAll('.accordion-header');

			headers.forEach(header => {
				header.addEventListener('click', function() {
					const content = this.nextElementSibling;
					const icon = this.querySelector('.accordion-icon');

					if (content.classList.contains('open')) {
						// 閉じる
						content.style.maxHeight = null;
						content.classList.remove('open');
						icon.textContent = '＋'; // アイコンを「+」に
					} else {
						// 開く
						content.style.maxHeight = content.scrollHeight + 'px';
						content.classList.add('open');
						icon.textContent = '－'; // アイコンを「-」に
					}
				});
			});
		});
	</script>
</body>

</html>