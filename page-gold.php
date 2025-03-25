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
			想高價放售・鑑定評估黃金就來的OTAKARAYA！
		</h2>
		<!--     ▲▲▲ top_h2_text▲▲▲     -->
	</div>
	<!-- フッター固定ボタン -->
	<div class="renew_2024_fv_lead is-sp">
		OTAKARAYA在全國擁有約1,200間店舖，由經驗豐富的專業鑑定師為您提供滿意的收購價格。
	</div>
	<main class="contents">
		<article class="contents__left">
			<!--     ▼▼▼おたからやセールスポイント▼▼▼     -->
			<section>
				<!--     ▼▼▼ top_h2_text▼▼▼     -->
				<div class="is-pc">
					<h2 class="titleHeading top_h2_text">
						想高價放售・鑑定評估黃金就來的OTAKARAYA！
					</h2>
				</div>
				<!--     ▲▲▲ top_h2_text▲▲▲     -->

				<div class="titleMain--lead is-pc">
					<p style="text-align: center; margin: 1rem;">
						OTAKARAYA在全國擁有約1,200間店舖，由經驗豐富的專業鑑定師為您提供滿意的收購價格。
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
						我們展示了不同時期的黃金行情（每克）的趨勢圖。<br>
						除了今日的行情，您也可以參考6個月或1年的波動情況。
					</div>
				</div>
				<div class="shop__detail--rateGraph">
					<h3 class="titleSub is-pc">黃金收購行情趨勢圖</h3>
					<p class="is-pc">
						我們展示了不同時期的黃金行情（每克）的趨勢圖。<br>
						除了今日的行情，您也可以參考6個月或1年的波動情況。
					</p>
					<div class="rateGraph__wrap">
						<div class="rateGraph__inner--select form__wrap">
							<div class="price-chart-header form__liner">
								<select id="graph-select" class="form-control my-5">
									<option value="">選擇類型</option>
									<optgroup label="gold">
										<option value="k24_ingot" selected="selected">金條</option>
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
							<p id="price-chart-legend" class="chart-legend">金條 (S$/g)</p>
						</div>
						<div class="flex flex--hasItem6">
							<ul class="flex__tab">
								<li class="tab__item active"><a>1個月</a></li>
								<li class="tab__item "><a>3個月</a></li>
								<li class="tab__item "><a>6個月</a></li>
								<li class="tab__item "><a>1年</a></li>
								<li class="tab__item "><a>3年</a></li>
								<li class="tab__item "><a>10年</a></li>
								<li class="tab__item "><a>20年</a></li>
								<li class="tab__item "><a>30年</a></li>
								<li class="tab__item "><a>整個期間</a></li>
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

													ChartDatePrice()prices.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 2 ) { // 3ヶ月
												bace_metal = prices_concat.slice( 0, 62 ); // 90
												for ( i = 0; i < bace_metal.length; i++ ) {
													if ( !bace_metal[ i ] )
														continue;
													labels2.push( moment( bace_metal[ i ].date ).format( "M/D" ) );

													ChartDatePrice()prices2.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 3 ) { // 6ヶ月
												bace_metal = prices_concat.slice( 0, 125 ); // 180
												for ( i = 0; i < bace_metal.length; i++ ) {
													if ( !bace_metal[ i ] )
														continue;
													labels3.push( moment( bace_metal[ i ].date ).format( "M/D" ) );

													ChartDatePrice()prices3.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 4 ) { // 1年
												bace_metal = prices_concat.slice( 0, 241 ); // 360
												for ( i = 0; i < bace_metal.length; i++ ) {
													if ( !bace_metal[ i ] )
														continue;
													labels4.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices4.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 5 ) { // 3年
												bace_metal = prices_concat.slice( 0, 712 ); // 1080
												for ( i = 0; i < bace_metal.length; i++ ) {
													if ( !bace_metal[ i ] )
														continue;
													labels5.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices5.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 6 ) { // 10年
												bace_metal = prices_concat.slice( 0, 2650 ); // 3600
												for ( i = 0; i < bace_metal.length; i++ ) {
													// i = i + 5 ;

													if ( !bace_metal[ i ] )
														continue;

													var _fmt = ( _pagetmpl == 'page-souba_10years.php' ) ? 'YYYY/M' : 'YYYY'; // 10年相場ページは日付フォーマットが異なる
													labels6.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices6.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}

											if ( i_date == 7 ) { // 20年
												bace_metal = prices_concat.slice( 0, 5100 ); // 7200
												for ( i = 0; i < bace_metal.length; i++ ) {
													// 5件ごとスキップ
													// i = i + 5 ;
													if ( !bace_metal[ i ] )
														continue;
													labels7.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices7.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 8 ) { // 30年
												bace_metal = prices_concat.slice( 0, 7400 ); // 10800
												for ( i = 0; i < bace_metal.length; i++ ) {
													// 5件ごとスキップ
													// i = i + 5 ;

													if ( !bace_metal[ i ] )
														continue;
													labels8.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices8.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}
											if ( i_date == 9 ) { // 全期間
												bace_metal = prices_concat;
												for ( i = 0; i < bace_metal.length; i++ ) {
													// 5件ごとスキップ
													// i = i + 5 ;

													if ( !bace_metal[ i ] )
														continue;
													labels9.push( moment( bace_metal[ i ].date ).format( "YYYY/M/D" ) );

													ChartDatePrice()prices9.push( bace_price );
													if ( i === limit ) {
														break;
													}
												};
											}

										};

										labels6 = labels6.filter( ( _, index ) => index % 10 === 0 );
										prices6 = prices6.filter( ( _, index ) => index % 10 === 0 );
										labels7 = labels7.filter( ( _, index ) => index % 20 === 0 );
										prices7 = prices7.filter( ( _, index ) => index % 20 === 0 );
										labels8 = labels8.filter( ( _, index ) => index % 30 === 0 );
										prices8 = prices8.filter( ( _, index ) => index % 30 === 0 );
										labels9 = labels9.filter( ( _, index ) => index % 40 === 0 );
										prices9 = prices9.filter( ( _, index ) => index % 40 === 0 );
										only_once = 1;
										if ( only_once == 1 ) {
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
										var maxPrice = Math.max.apply( null, prices );
										var minPrice = Math.min.apply( null, prices );
										var diff = maxPrice * 0.01; // 1%の差分を取得
										var suggestedMax = Math.round( maxPrice + diff ); // maxPriceに1%の差分を追加して四捨五入
										var ctx = document.getElementById( id );
										if ( goldChart != null ) {
											goldChart.destroy()};
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
							<span>為什麼現在是賣黃金的最佳時機</span>
						</h2>
					</div>
					<div class="fshoplist-target__list brand_about_repeat_parent_wrap is-pc">
						<div class="fshoplist-target--ttl">
							<h3 class="titleSub">黃金收購的三大關鍵要點</h3>
						</div>
						<div class="fshoplist-target--item">
							<div class="horizonlist horizonnumblist">
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">黃金的收購價格行情</h4>
										<p>黃金的價格每天都在變動。每克幾百日元以上的價格在一天內變動是很常見的，賣出金額越大（越重），價格波動的影響也會越大。
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">黃金的純度</h4>
										<p>黃金的純度（含量）會根據24K、22K、18K等標準來標註。
										標註的數字越大，越稀有，黃金的價值也越高。
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="horizonlist--text">
										<h4 class="titleH4 title--left">黃金的重量</h4>
										<p>
										黃金的收購價格是按每克計算的，重量越大，收購價格越高。
										在OTAKARAYA的鑑定中，我們會以0.1克為單位測量重量，並準確計算黃金的價值。
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
										<h4 class="titleH4 title--left">黃金的收購價格行情</h4>
									</div>
									<div class="horizonlist--text">
										<p>
										黃金的價格每天都在變動。每克幾百日元以上的價格在一天內變動是很常見的，賣出金額越大（越重），價格波動的影響也會越大。
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="sp_text_wrap">
										<h4 class="titleH4 title--left">黃金的純度</h4>
									</div>
									<div class="horizonlist--text">
										<p>黃金的純度（含量）會根據24K、22K、18K等標準來標註。
標註的數字越大，越稀有，黃金的價值也越高。
										</p>
									</div>
								</div>
								<div class="horizonlist--link">
									<div class="sp_text_wrap">
										<h4 class="titleH4 title--left">黃金的重量</h4>
									</div>
									<div class="horizonlist--text">
										<p>
											黃金的收購價格是按每克計算的，重量越大，收購價格越高。
在OTAKARAYA的鑑定中，我們會以0.1克為單位測量重量，並準確計算黃金的價值。
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
									為什麼OTAKARAYA能夠提供高價收購黃金
								</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
								作為專業收購店，OTAKARAYA不會在門市中銷售收購的物品。
								收購的物品不僅在日本，還與世界44個國家的企業和商家進行交易。<br />
									<br />
									透過不進行銷售所產生的成本，可以將其轉嫁到收購金額上，
使OTAKARAYA能夠提供獨有的高價收購。
								</div>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">過去30年黃金的市場價格變化</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									30年前的1990年代，黃金的價格大約在每克1,000至1,500日元之間，當時的價格低得驚人。<br />
									<br />
									然而，受到雷曼危機和新冠疫情等不穩定社會情況的影響，黃金作為“安全資產”的價值逐漸提升，價格也隨之飆升。<br />
									<br />
									至2024年，黃金的價格已經超過每克1萬日元，達到了歷史新高。
								</div>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">高價賣出黃金的訣竅</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									<br>
									高價賣出黃金的訣竅是
「在黃金價格高的時候賣出」以及「選擇能夠高價收購的專門店」。<br />
									<br />
									目前黃金價格非常高漲，現在可以說是最佳的出售時機。
選擇買取專門店是非常重要，若是要賣黃金，高價收購就交給OTAKARAYA。
我們全國擁有超過1,200間門市，
由專業的鑑定師為您提供令人滿意的收購價格。
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="is-sp">
				<div class="renew_202404_sellreason_titlebox">
					<h2 class="renew_202404_sellreason_title_h2">為什麼現在是賣黃金的最佳時機</h2>
					<h3 class="renew_202404_sellreason_title_h3">黃金收購的三大關鍵要點</h3>
					<img class="renew_2024_sellreason_title_image" src="../images/gold/point_stars.png">
				</div>
				<section class="renew_202404_sellreason_section">
					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_1.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image01.jpg">
						<h2 class="renew_202404_sellreason_item_title">黃金的收購價格行情</h2>
						<div class="renew_202404_sellreason_item_story">
						黃金的價格每天都在變動。每克幾百日元以上的價格在一天內變動是很常見的，賣出金額越大（越重），價格波動的影響也會越大。
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->

					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_2.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image02.jpg">
						<h2 class="renew_202404_sellreason_item_title">黃金的純度</h2>
						<div class="renew_202404_sellreason_item_story">
						黃金的純度（含量）會根據24K、22K、18K等標準來標註。
						標註的數字越大，越稀有，黃金的價值也越高。
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->

					<div class="renew_202404_sellreason_item"> <img class="renew_202404_sellreason_item_icon" src="../images/gold/point_3.webp"> <img class="renew_202404_sellreason_item_img" src="../images/gold/point_image03.jpg">
						<h2 class="renew_202404_sellreason_item_title">黃金的重量</h2>
						<div class="renew_202404_sellreason_item_story">
						黃金的收購價格是按每克計算的，重量越大，收購價格越高。
						在OTAKARAYA的鑑定中，我們會以0.1克為單位測量重量，並準確計算黃金的價值。
						</div>
					</div>
					<!-- renew_202404_sellreason_item -->
					<h3 class="renew_202404_sellreason_shutter_title">
						為什麼OTAKARAYA能夠提供高價收購黃金
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
							<span>作為專業收購店，OTAKARAYA不會在門市中銷售收購的物品。</span>收購的物品不僅在日本，還與世界44個國家的企業和商家進行交易。
						</p>
						<p>
						透過不進行銷售所產生的成本，可以將其轉嫁到收購金額上，
						使OTAKARAYA能夠提供獨有的高價收購。
						</p>
					</div>
					<h3 class="renew_202404_sellreason_shutter_title">
						過去30年黃金的市場價格變化
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
						30年前的1990年代，黃金的價格大約在每克1,000至1,500日元之間，當時的價格低得驚人。
						</p>
						<p>
						然而，受到雷曼危機和新冠疫情等不穩定社會情況的影響，黃金作為“安全資產”的價值逐漸提升，價格也隨之飆升。
						</p>
						<p>
							<span>至2024年，黃金的價格已經超過每克1萬日元，達到了歷史新高。</span>
						</p>
					</div>
					<h3 class="renew_202404_sellreason_shutter_title">
					高價賣出黃金的訣竅
						<div class="renew_202404_sellreason_shutter_circle">
							<div class="renew_202404_sellreason_shutter_arrow"></div>
						</div>
					</h3>
					<div class="renew_202404_sellreason_shutter_story">
						<p>
							<span>高價賣出黃金的訣竅是</span>
							「在黃金價格高的時候賣出」以及「選擇能夠高價收購的專門店」。
						</p>
						<p>
						目前黃金價格非常高漲，現在可以說是最佳的出售時機。
選擇買取專門店是非常重要，若是要賣黃金，高價收購就交給OTAKARAYA。
我們全國擁有超過1,200間門市，
由專業的鑑定師為您提供令人滿意的收購價格。
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
					不清楚金製品的純度也可安心出售
					</h2>
					<img class="renew_2024_unknownok_title_image"
						src="../images/gold/ok_photo_202404.png">
				</div>
				<div class="renew_2024_unknownok_item_titlebox first">
					About 黃金的純度
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
					黃金的等級會以24分率這種特有的表示方式標示，例如24K或18K等。除了24分率的刻印，還有些情況會有由日本造幣局提供的成色證明，
					稱為「鑑證印記」（Hallmark）。「鑑證印記」本身不會直接提高黃金的價值，
但因為市面上有很多不同的黃金種類，
它是為了讓交易更加安全的重要依據。
					</p>
					<p>
					特別是外國產品，有時刻印難以顯示黃金的等級，從而增加判斷的難度。
					即使沒有刻印的金製品，也可以進行收購，歡迎隨時諮詢。
					</p>
				</div>
				<div class="renew_2024_unknownok_item_titlebox">
				我們能準確測定純度不明的貴金屬
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
					無論是「不清楚純度」或「沒有刻印」的黃金製品，您都可以放心。<br />
					即使是低純度的金或是合金，我們也能在短時間內準確測量其價值，並當場提供現金收購服務。<br />
					即使在其他店鋪被拒收的物品，也可以隨時向我們諮詢。
					</p>
				</div>
				<div class="renew_2024_unknownok_item_titlebox">
				我們會鑑定飾品的寶石和設計價值
					<div class="renew_2024_unknownok_item_title_circle">
						<div class="renew_2024_unknownok_item_title_arrow"></div>
					</div>
				</div>
				<div class="renew_2024_unknownok_item_storybox">
					<p>
					在OTAKARAYA，我們收購金製品時，不僅考慮到金本身的價值，還會綜合考慮飾品上的寶石價值和設計感。<br />
					作為專門廣泛收購貴金屬的專門店，我們會為您提供最高的收購價格。
					</p>
				</div>
			</section>
			<section class="brandinfo_section gold_top_brandinfo_section is-pc">
				<div class="titleMain titleMain--wrapper" style="margin-bottom: 4rem;">
					<h2 class="titleMain--main">
						<span>不清楚金製品的純度也可安心出售</span>
					</h2>
				</div>
				<div class="brandinfo brandinfo_red_repeat">
					<div class="brandinfo__main fshoplist-target__list">
						<div class="brandinfo__header fshoplist-target--ttl">
							<h3 class="brandinfo__header__title">關於黃金的成色</h3>
						</div>
						<div class="fshoplist-target--item brandinfo__body no--image">
							<div class="brandinfo__body__text brandinfo__body__text--top">
								<p> 黃金的等級會以24分率這種特有的表示方式標示，例如24K或18K等。除了24分率的刻印，還有些情況會有由日本造幣局提供的成色證明，
								稱為「鑑證印記」（Hallmark）。「鑑證印記」本身不會直接提高黃金的價值，
但因為市面上有很多不同的黃金種類，
它是為了讓交易更加安全的重要依據。<br />
									<br />
									特別是外國產品，有時刻印難以顯示黃金的等級，從而增加判斷的難度。即使沒有刻印的金製品，也可以進行收購，歡迎隨時諮詢。
								</p>
							</div>
						</div>
					</div>
					<div class="brandinfo__main fshoplist-target__list">
						<div class="brandinfo__header fshoplist-target--ttl">
							<h3 class="brandinfo__header__title">
							即使是低純度的金或是合金，我們也能在短時間內準確測量其價值，並當場提供現金收購服務。</h3>
						</div>
						<div class="fshoplist-target--item brandinfo__body no--image">
							<div class="brandinfo__body__text brandinfo__body__text--top">
								<p>
								無論是「不清楚純度」或「沒有刻印」的黃金製品，您都可以放心。即使是低純度的金或是合金，我們也能在短時間內準確測量其價值，並當場提供現金收購服務。即使在其他店鋪被拒收的物品，也可以隨時向我們諮詢。</p>
							</div>
						</div>
						<div class="brandinfo__main fshoplist-target__list">
							<div class="brandinfo__header fshoplist-target--ttl">
								<h3 class="brandinfo__header__title">
								我們會鑑定飾品的寶石和設計價值
								</h3>
							</div>
							<div class="fshoplist-target--item brandinfo__body no--image">
								<div class="brandinfo__body__text brandinfo__body__text--top">
									<p>
									在OTAKARAYA，我們收購金製品時，不僅考慮到金本身的價值，還會綜合考慮飾品上的寶石價值和設計感。作為專門廣泛收購貴金屬的專門店，我們會為您提供最高的收購價格。
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
						<div class="renew_2024_top_gg_profile_left">趣味</div>
						<div class="renew_2024_top_gg_profile_right">擦皮鞋</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">喜歡的詞語:</div>
						<div class="renew_2024_top_gg_profile_right">Walk the walk and talk the talk.</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">喜歡的品牌：</div>
						<div class="renew_2024_top_gg_profile_right"> Harry Winston</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">過去的收購品例：</div>
						<div class="renew_2024_top_gg_profile_right">佛鈴、金條</div>
					</div>
					<div class="renew_2024_top_gg_storybox">
					在OTAKARAYA進行黃金收購時，我們會以當日黃金每克的收購參考價為基礎，並額外考慮設計美感等因素，提供高價收購服務。我們曾經進行過超過一萬件物品的鑑定，
					許多客戶都表示收購金額遠超預期，感到非常滿意。此外，OTAKARAYA的所有門市均配備了測量儀器，能夠精確測量黃金的含金量。
					</div>
					<div class="renew_2024_top_gg_storybox">
					金額當然重要，我們也致力於提供最高水準的服務，確保每位顧客都能感受到我們的熱情款待。我們不僅僅關注商品，更重視每位顧客的心情，會耐心解釋，讓您滿意地離開。我們將誠心誠意地為您服務，期待您使用OTAKARAYA的收購服務。
					</div>
				</div>
			</section>
			<section class="is-pc">
				<div class="titleMain titleMain--wrapper">
					<h2 class="titleMain--main">
						<span>鑑定師介紹</span>
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
											估價師
											</span>
										</h2>
										<h2 class="is-sp bgsitecolor bordersitecolor relative">
											<span class="noto thin" style="margin:-1rem 0 0 0; font-size: 26px; font-family: serif;">
											估價師
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
															<span class="noto">趣味：</span>
														</th>
														<td><span class="noto">擦皮鞋</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">喜歡的詞語:</span>
														</th>
														<td><span class="noto">勇猛果敢</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">喜歡的品牌：</span>
														</th>
														<td><span class="noto">Berluti（伯魯提）</span></td>
													</tr>
													<tr>
														<th class="sitetextcolor">
															<span class="noto">過去的收購品例：</span>
														</th>
														<td>
															<span class="noto">佛鈴、金條</span>
														</td>
													</tr>
												</tbody>
											</table>
										</li>
									</ul>
								</div>
								<p class="shop-leader_text">
									<span class="noto">
										在OTAKARAYA進行黃金收購時，我們會以當日黃金每克的收購參考價為基礎，並額外考慮設計美感等因素，提供高價收購服務。我們曾經進行過超過一萬件物品的鑑定，
許多客戶都表示收購金額遠超預期，感到非常滿意。此外，OTAKARAYA的所有門市均配備了測量儀器，能夠精確測量黃金的含金量。
										<br /><br />
										金額當然重要，我們也致力於提供最高水準的服務，確保每位顧客都能感受到我們的熱情款待。我們不僅僅關注商品，更重視每位顧客的心情，會耐心解釋，讓您滿意地離開。我們將誠心誠意地為您服務，期待您使用OTAKARAYA的收購服務。
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
							無論什麼狀態的黃金，我們都可以收購。
						</h2>
						<div class="titleMain--lead">
							<p>少量黃金或損壞的飾品，我們也會非常樂意收購。
							</p>
						</div>
					</div>
					<div class="colBox colBox__col04 sp__col03">
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/04-1.webp" alt="彎曲或破損的黃金"></p>
								<p class="is-sp"><img src="../images/gold/04-1.webp" alt="彎曲或破損的黃金"></p>
							</div>
							<p class="text text--center">彎曲或破損的黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/07-1.webp" alt="無刻印的黃金"></p>
								<p class="is-sp"><img src="../images/gold/07-1.webp" alt="無刻印的黃金"></p>
							</div>
							<p class="text text--center">無刻印的黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/02-1.webp" alt="單隻耳環等少量黃金"></p>
								<p class="is-sp"><img src="../images/gold/02-1.webp" alt="單隻耳環等少量黃金"></p>
							</div>
							<p class="text text--center">單隻耳環等少量黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/03-1.webp" alt="皮帶的金扣"></p>
								<p class="is-sp"><img src="../images/gold/03-1.webp" alt="皮帶的金扣"></p>
							</div>
							<p class="text text--center">皮帶的金扣</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/06-1.webp" alt="工業用黃金"></p>
								<p class="is-sp"><img src="../images/gold/06-1.webp" alt="工業用黃金"></p>
							</div>
							<p class="text text--center">工業用黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/08-1-1.webp" alt="具有藝術品價值的黃金"></p>
								<p class="is-sp"><img src="../images/gold/08-1-1.webp" alt="具有藝術品價值的黃金"></p>
							</div>
							<p class="text text--center">具有藝術品價值的黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/01-1.webp" alt="考慮古董價值的黃金"></p>
								<p class="is-sp"><img src="../images/gold/01-1.webp" alt="考慮古董價值的黃金"></p>
							</div>
							<p class="text text--center">考慮古董價值的黃金</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/05-1-1.webp" alt="金牙、含有金的假牙"></p>
								<p class="is-sp"><img src="../images/gold/05-1-1.webp" alt="金牙、含有金的假牙"></p>
							</div>
							<p class="text text--center">金牙、含有金的假牙</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc">
									<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp"
										alt="鑽石脫落的戒指">
								</p>
								<p class="is-sp">
									<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp"
										alt="鑽石脫落的戒指">
								</p>
							</div>
							<p class="text text--center">鑽石脫落的戒指</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc">
									<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp"
										alt="變黑的飾品">
								</p>
								<p class="is-sp">
									<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp"
										alt="變黑的飾品">
								</p>
							</div>
							<p class="text text--center">變黑的飾品</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp"
										alt="只有吊墜部分"></p>
								<p class="is-sp"><img src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp"
										alt="只有吊墜部分"></p>
							</div>
							<p class="text text--center">只有吊墜部分</p>
						</div>
						<div class="col">
							<div class="img">
								<p class="is-pc"><img src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp"
										alt="胸針等飾品的金屬部分"></p>
								<p class="is-sp"><img src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp"
										alt="胸針等飾品的金屬部分"></p>
							</div>
							<p class="text text--center">胸針等飾品的金屬部分</p>
						</div>
					</div>
				</section>
			</div>
			<div class="is-sp">
				<div class="renew_202404_statebad_titlebox">
					<h2 class="renew_202404_statebad_title_h2">
						無論什麼狀態的黃金，我們都可以收購。
					</h2>
					<div class="renew_202404_statebad_title_lead">
						少量黃金或損壞的飾品，我們也會非常樂意收購。
					</div>
				</div>
				<section class="renew_202404_statebad_section">
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/04-1.webp" alt="彎曲或破損的黃金">
						</div>
						彎曲或破損的黃金
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/07-1.webp" alt="無刻印的黃金">
						</div>
						無刻印的黃金
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/02-1.webp" alt="單隻耳環等少量黃金">
						</div>
						單隻耳環等少量黃金
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/03-1.webp" alt="皮帶的金扣">
						</div>
						皮帶的金扣
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/06-1.webp" alt="工業用黃金">
						</div>
						工業用黃金
					</div>
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/08-1-1.webp" alt="具有藝術品價值的黃金">
						</div>
						具有藝術品價值的黃金
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/01-1.webp" alt="考慮古董價值的黃金">
						</div>
						考慮古董價值的黃金
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/05-1-1.webp" alt="金牙、含有金的假牙">
						</div>
						金牙、含有金的假牙
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/7f88058f04264c8f8733783d51428759.webp" alt="鑽石脫落的戒指">
						</div>
						鑽石脫落的戒指
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img src="../images/gold/ec85d0541b60c1f7ba605bfca95b13d0.webp" alt="變黑的飾品">
						</div>
						變黑的飾品
					</div>
					<div class="renew_202404_statebad_itembox long">
						<div class="renew_202404_statebad_image">
							<img
								src="../images/gold/38480b4ef7005b09bd7ed1a3e9dc1e52.webp" alt="只有吊墜部分">
						</div>
						只有吊墜部分
					</div>
					<div class="renew_202404_statebad_itembox">
						<div class="renew_202404_statebad_image">
							<img
								src="../images/gold/f540432c0d452207e8eb30d72179e8ea.webp" alt="胸針等飾品的金屬部分">
						</div>
						胸針等飾品的金屬部分
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
				常見問題
			</h2>
			<section class="faq_section renew_2024">
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						常見問題
					</h2>
				</div>
				<div class="qa__wrap js__more--3th">
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
								你們怎樣鑑定品牌的黃金製品？
							</dt>
							<dd class="qa__list__a">
							品牌戒指或項鍊等商品，會根據黃金的價格以及品牌的價值進行評估。
							有時品牌價值可能遠高於黃金的價格。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							10K等低純度的黃金也可以收購嗎？
							</dt>
							<dd class="qa__list__a">
							當然可以收購。即使是沒有刻印的物品，只要確認含有少量黃金，我們都會收購。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							我有飾品，但不確定材料是什麼。
							</dt>
							<dd class="qa__list__a">
							歡迎攜帶過來，我們會當場確認材料。隨時諮詢我們。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							少量黃金也可以收購嗎？
							</dt>
							<dd class="qa__list__a">
							不論數量多少，我們都樂意進行鑑定及收購。
							如果不確定是否為黃金，我們也提供免費鑑定，歡迎隨時與我們聯絡。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							如果我選擇到府收購，但擔心鄰居發現怎麼辦？
							</dt>
							<dd class="qa__list__a">
							當鑑定師駕車到客戶家中時，會使用沒有公司名稱的私家車，請放心。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							沒有附屬品也可以收購嗎？
							</dt>
							<dd class="qa__list__a">
							雖然最理想是有附屬品，但即使沒有附屬品，我們也會樂意進行鑑定和收購。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							為什麼需要提供身分證明？
							</dt>
							<dd class="qa__list__a">
							根據《古物營業法》要求，
對賣方的身份進行確認是必要的，並會作記錄之用。
除此之外，不會將資料用於其他目的。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							只來鑑定黃金和貴金屬可以嗎？
							</dt>
							<dd class="qa__list__a">
							當然可以，我們很高興為您提供評估服務。我們相信您所帶來物品承載著許多美好回憶。
例如，是您用第一次獎金購買的物品、父母在成年禮時贈送的禮物，
或者是祖母送的結婚禮物等。每件物品都有其背後的故事。
大家或許都曾想過「這些放在抽屜裡的物品，賣掉能值多少錢？」
而解答這些疑問，正是OTAKARAYA的便利之處。我們提供多種評估方式，無論是到店還是上門，都能根據客人的需求量身打造。 歡迎隨時利用我們的服務，並且可以與家人一起討論評估結果，看看是否對您有幫助。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							破損的金飾也可以收購嗎？
							</dt>
							<dd class="qa__list__a">
							我們很樂意進行評估及收購。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							是否需要支付黃金及貴金屬的鑑定費？
							</dt>
							<dd class="qa__list__a">
							黃金及貴金屬，還有其他物品的評估，一律免費，
							不會收取任何費用，請放心。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							刻印與否會影響金條的收購價格？
							</dt>
							<dd class="qa__list__a">
							刻印是金條「品牌與信任」的重要證明，金條上通常會刻有編號，
以便確認最初購買者。如果物品沒有刻印，收購可能會被拒絕。
這是因為近年來有許多從海外走私到日本的金條，犯罪者往往會將其熔化後出售，
從而掩蓋其來源。
不過，如果您能提供購買證明，且您的說法一致，
我們可以按照普通金條的價格進行收購。歡迎隨時諮詢。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							黃金飾品和金條的收購價格有區別嗎？
							</dt>
							<dd class="qa__list__a">
							黃金飾品和金條的收購價格確實有差異。
金條通常由純金（K24）製成，不同品牌的金條有不同的價值。
經過全球認可的公司才能在金條上打刻印，市場對於高信譽品牌的金條價格會更高。
此外，金條在精煉工廠經過多道工序加工而成，其加工費用也會影響收購價格。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							斷裂的項鍊等也能收購嗎？
							</dt>
							<dd class="qa__list__a">
							斷裂的項鍊也可以交給我們，很多物品可以輕易修復，請放心。
							切勿自行使用工具修復，這可能會損壞物品的原本價值，請保持原狀並交給我們。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							刮痕或污漬會影響收購價格嗎？
							</dt>
							<dd class="qa__list__a">
							雖然保持物品清潔是最好的，但如果自行處理污漬可能會擴大損壞。
污漬方面，使用不當的清潔劑可能會影響物品的顏色和品質。
建議您不要對物品做任何處理，並直接交給我們。如果您希望進行簡單清潔，
可以用柔軟的乾布擦拭，或用稀釋的中性清潔劑清潔。
但請注意，黃金及貴金屬的保養需要專業知識，
以免損壞商品狀態。
如有疑問，請隨時與附近的門店或客服聯絡。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							沒有刻印的黃金及貴金屬可以評估嗎？
							</dt>
							<dd class="qa__list__a">
							是的，我們可以收購。雖然現在的製品大多數都有刻印，
但其實一些古老時期製作的物品或海外製品，很多都沒有刻印。
有些店家可能會拒絕沒有刻印的物品，但OTAKARAYA配備了螢光X射線分析裝置，
能夠從科學角度測定黃金及貴金屬的含量，解決了傳統儀器無法檢測的問題。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							大判、小判、外國金幣、古錢或硬幣也可以收購嗎？
							</dt>
							<dd class="qa__list__a">
							當然可以收購，包括江戶時代發行的大判、小判，
還有以前使用的紙幣和硬幣，即所謂的古錢。至於外國金幣，
有一些非常受歡迎的系列，例如中國發行的『熊貓金幣』、
美國的『鷹揚金幣』和加拿大的『楓葉金幣』等。
這些金幣在OTAKARAYA會被綜合評價，包括其歷史和稀有性，
而不僅僅是根據金的品質和重量來定價。
我們也收購銀幣、鈀金、鉑金硬幣、紀念幣和獎牌。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							黃金及貴金屬的鑑定需要多少時間？
							</dt>
							<dd class="qa__list__a">
							視乎物品的數量，通常需要5至15分鐘。
如果您不方便到店，或附近沒有店舖，也可以選擇上門收購服務。
我們也接受電話和電郵諮詢。
不論您選擇哪種方式，評估金額都是一樣的，
而且鑑定費用完全免費，請放心。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							黃金及貴金屬什麼時候賣出比較好？聽說每天的收購價格都不一樣，這是真的嗎？
							</dt>
							<dd class="qa__list__a">
							是的，因為金價每天更新，收購價格會隨日波動。
建議在金價上升或匯率偏向日圓貶值時賣出。
此外，當世界局勢不穩時，貨幣的信譽會下降，
黃金的信譽則會上升，推動金價上漲。
近年來，黃金及貴金屬的長期價格上升趨勢持續，收購時能期待高價。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							黃金及貴金屬的收購價格是如何決定的？
							</dt>
							<dd class="qa__list__a">
							我們根據全球每日更新的市場行情、物品的重量、
物品的品位（如K24、K18）這三個因素，再加上設計和品牌的綜合評價，
給出收購價格。我們始終以高價收購為目標，力求比其他公司更有競爭力。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">
							什麼時候是出售貴金屬的好時機？
							</dt>
							<dd class="qa__list__a">
							貴金屬的最佳出售時機無法一概而論，有時賣出時機會很快到來，
有時則需要長時間等待才能看到價值上升。
如果您打算長期保存，建議保持物品的良好狀態，
定期進行保養和維護，以確保其價值不受影響。
							</dd>
						</dl>
					</div>
				</div>
				<div class="btn__wrap btn__more js__more--btn3 gtm-more-qa">
					<span>查看更多</span>
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