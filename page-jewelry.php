<?php
/* Template Name: 宝石トップページ */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php wp_head(); ?>
	<?php get_template_part( 'head2' ); ?>


	<!-- local css -->


	<link rel="stylesheet" type="text/css" href="../css/jewelry.min.css">
	<link rel="stylesheet" href="../css/renew202404_2.css">
	<link rel="stylesheet" href="../css/vertical-m.css">
	<link rel="stylesheet" type="text/css" href="../css/shared.css">
	<link rel="stylesheet" type="text/css" href="../css/daiya.css">
	<title><?php echo get_the_title(); ?></title>

	<style>
		#jewelry .jewelrySoubaBox__table table .table__items .table__item.price::after {
			content: none;
		}

		#jewelry .jewelrySoubaBox__table table .table__items .table__item.price::before {
			font-size: 68.75%;
			font-weight: normal;
			content: "HK$";
		}

		#jewelry .jewelrySoubaBox__form .form__answer .price .value {
			font-size: inherit;
			font-weight: unset;
		}
	</style>
</head>


<body id="jewelry">
	<?php get_header( 'common' ); ?>

	<div id="topic__path" class="topic__path">
		<ol class="topic__path--list">
			<li class="topic__path--item" itemprop="itemListElement" itemscope=""
				itemtype="https://schema.org/ListItem">
				<a itemprop="item" href="/">
					<span itemprop="name">收購專門店・OTAKARAYA首頁</span>
				</a>
				<meta itemprop="position" content="1">
			</li>
			<li class="topic__path--item" itemprop="itemListElement" itemscope=""
				itemtype="https://schema.org/ListItem">
				<span itemprop="name">鑽石・珠寶收購</span>
				<meta itemprop="position" content="2">
			</li>
		</ol>
	</div>

	<div class="fv_img_wrap">
		<img class="is-pc" src="../images/daiya/2024_diamondhouseki_TOP_PC.webp" alt="">
		<img class="is-sp" src="../images/daiya/2024_diamondhouseki_TOP_SP.webp" alt="">
		<?php include __DIR__ . '/template-parts/fv_obi.php'; ?>
	</div>

	<?php get_template_part( 'template-parts/license' ); ?>
	<?php get_template_part( 'template-parts/shop-info' ); ?>

	<main class="contents">
		<article class="contents__left">
			<section>
				<!--     ▼▼▼ top_h2_text▼▼▼     -->
				<h2 class="titleHeading top_h2_text">
					鑽石高價收購——盡在OTAKARAYA
				</h2> <!--     ▲▲▲ top_h2_text▲▲▲     -->
				<div class="head_text">
					鑽石是在地球深處經過高溫高壓形成的最堅硬天然礦物，
					其評價標準主要依據 4C（克拉、顏色、淨度、切工）。
					越接近無色的鑽石價值越高，切工的品質則影響其光輝。
					OTAKARAYA現正高價收購各類鑽石珠寶，
					如鑽石戒指、項鍊等。我們的專業鑑定師將精準評估您的鑽石品質，
					並提供最具競爭力的價格。
				</div>
			</section>
			<section class="simple_cta_top">
				<div class="kv_area">
					<p class="is-pc"><img src="../images/daiya/diamond_banner_PC.webp" alt="眠っているダイアモンド　今、売らないと損するかも！？">
					</p>
					<p class="is-sp"><img src="../images/daiya/diamond_banner_SP.webp" alt="眠っているダイアモンド　今、売らないと損するかも！？">
					</p>
				</div>
			</section>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>



			<?php
			// モジュール化すると変数をスクリプトに渡せないため
			//  get_template_part('template-parts/daiya_parts');
			?>
			<?php if ( isset( $_GET[ 'mode' ] ) && $_GET[ 'mode' ] === 'test' ) { ?>

				<!-- MOD_20240417 -->
				<div class="renew_2024_dia_titlebox is-sp">
					<h2 class="renew_2024_dia_title_h2">
						<img class="renew_2024_dia_title_l" src="../images/daiya/dia_image01_202404.png">
						<img class="renew_2024_dia_title_r" src="../images/daiya/dia_image02_202404.png">
						<p>

						</p>
					</h2>
					<div class="renew_2024_dia_title_lead">
						<p>

						</p>
					</div>
				</div>
				<!-- MOD_20240417 -->

				<!-- ▼▼▼為替計算▼▼▼ -->
				<?php

				// REST APIからデータを取得する関数
				function fetch_wp_api_data( $url ) {
					$response = wp_remote_get( $url );

					// エラーチェック
					if ( is_wp_error( $response ) ) {
						echo "Something went wrong: " . $response->get_error_message();
						return null;
					}

					return json_decode( wp_remote_retrieve_body( $response ), true );
				}


				// APIエンドポイントのURL
				$daiya_api_url       = 'https://www.otakaraya.jp/daiya/wp-json/wp/v2/pages/24486/';
				$kawase_rate_api_url = 'https://www.otakaraya.jp/daiya/wp-json/wp/v2/pages/23897/';

				// APIリクエストを実行
				$daiya_data             = fetch_wp_api_data( $daiya_api_url );
				$kawase_rate_daiya_data = fetch_wp_api_data( $kawase_rate_api_url );

				// データが取得できたかチェック
				if ( ! $daiya_data || ! $kawase_rate_daiya_data ) {
					return; // エラーが出た場合は処理を中断
				}

				// 為替レート取得
				$exchangeRate = $kawase_rate_daiya_data[ 'acf' ][ 'kawase_rate' ];
				;

				if ( ! is_numeric( $exchangeRate ) ) {
					$exchangeRate = 140;
				}


				// ダイヤモンド買取相場価格表のhtmlソースを管理画面から取得
				$price_all   = get_page_by_path( 'price_all' );
				$price_all   = $price_all->ID;
				$table       = $daiya_data[ 'acf' ][ 'souba_price_all' ];
				$carat_num   = [
					[ "value" => "0.1", "label" => "01ct" ],
					[ "value" => "0.2", "label" => "02ct" ],
					[ "value" => "0.3", "label" => "03ct" ],
					[ "value" => "0.4", "label" => "04ct" ],
					[ "value" => "0.5", "label" => "05ct" ],
					[ "value" => "0.6", "label" => "06ct" ],
					[ "value" => "0.7", "label" => "07ct" ],
					[ "value" => "0.8", "label" => "08ct" ],
					[ "value" => "0.9", "label" => "09ct" ],
					[ "value" => "1.0", "label" => "1ct" ],
					[ "value" => "2.0", "label" => "2ct" ],
					[ "value" => "3.0", "label" => "3ct" ],
					[ "value" => "4.0", "label" => "4ct" ],
					[ "value" => "5.0", "label" => "5ct" ],
					[ "value" => "6.0", "label" => "6ct" ],
					[ "value" => "7.0", "label" => "7ct" ],
					[ "value" => "8.0", "label" => "8ct" ],
					[ "value" => "9.0", "label" => "9ct" ],
					[ "value" => "10.0", "label" => "10ct" ],
				];
				$carat_value = array_column( $carat_num, 'value' );
				$carat_label = array_column( $carat_num, 'label' );



				$daiya_cut     = $daiya_data[ 'acf' ][ 'daiya_cut' ];
				$daiya_clarity = $daiya_data[ 'acf' ][ 'daiya_clarity' ];
				$daiya_color   = $daiya_data[ 'acf' ][ 'daiya_color' ];


				// 相場価格(金額)を一覧取得する
				$souba_num = preg_match_all( '/\<td class\=\"table__item price\"\>([\d.]+)\<\/td\>/', $table, $m );

				// APIのURL
				$rate_api_url = "https://api.exchangerate-api.com/v4/latest/JPY";

				// APIから為替レートを取得
				$rate_response = file_get_contents( $rate_api_url );

				// エラーチェック
				if ( $rate_response === false ) {
					echo "Failed to fetch exchange rate.";
					return;
				}

				$rate_data = json_decode( $rate_response, true );

				// JPYからHKDのレートを取得
				$exchange_rate_src = $rate_data[ 'rates' ][ 'HKD' ];

				$kawase_price = [];
				$cnt          = 0;
				// 相場価格に対しカラット数をかける
				foreach ( $m[ 0 ] as $index => $value ) {
					$interval    = 660; // $interval の初期値を設定(各カラットの要素数が660)
					$carat_index = floor( ( $cnt ) / $interval ); // カラットのインデックスを計算

					// インデックスが carat_value の範囲内にあるかどうかを確認し、それに応じて $ct_num を設定
					if ( $carat_index >= 0 && $carat_index < count( $carat_value ) ) {
						$ct_num = $carat_value[ $carat_index ];
					} else {
						$ct_num = $carat_value[ 0 ];
					}
					// 相場価格に対し為替レートをかける
					preg_match( '/\d+(\.\d+)?/', $value, $matches );
					$num    = $matches[ 0 ];
					$result = $num * $exchangeRate;
					// 10のくらいで繰り上げ
					$price = ceil( $result / 100 ) * 100;

					$price = $price * $ct_num;
					$price = number_format( floor( $price * $exchange_rate_src ) );
					array_push( $kawase_price, $price );

					$cnt++;
				}

				?>

				<section>
					<h2 class="renew_2024_titlesub follow is-sp">
						<div class="renew_2024_titlesub_topbar">
							<div class="renew_2024_titlesub_topbar_center"></div>
							<div class="renew_2024_titlesub_topbar_left"></div>
							<div class="renew_2024_titlesub_topbar_right"></div>
						</div>
					</h2>
					<section>
						<div class="titleMain titleMain--wrapper is-pc">
							<h2 class="titleMain--main">

							</h2>
							<div class="titleMain--lead">
								<p>

								</p>
							</div>
						</div>
						<div class="carat_select">select carat</div>
						<div class="scroll-box">
							<div class="f_area">
								<div class="tabbox">0.1</div>
								<div class="tabbox">0.2</div>
								<div class="tabbox">0.3</div>
								<div class="tabbox">0.4</div>
								<div class="tabbox">0.5</div>
								<div class="tabbox">0.6</div>
								<div class="tabbox">0.7</div>
								<div class="tabbox">0.8</div>
								<div class="tabbox">0.9</div>
								<div class="tabbox active">1.0</div>
								<div class="tabbox">2.0</div>
								<div class="tabbox">3.0</div>
								<div class="tabbox">4.0</div>
								<div class="tabbox">5.0</div>
								<div class="tabbox">6.0</div>
								<div class="tabbox">7.0</div>
								<div class="tabbox">8.0</div>
								<div class="tabbox">9.0</div>
								<div class="tabbox">10.0</div>
							</div>
						</div>
						<div class="jewelrySoubaBox">
							<div class="jewelrySoubaBox__title">
								<h3>鑽石鑽石收購參考價格表表</h3>
							</div>
							<div class="jewelrySoubaBox__body">
								<div class="jewelrySoubaBox__table">
									<!-- <div class="jewelry__category__time text--center">最終更新日：2024/01/16/</div> -->
									<div class="jewelry__category__time text--center">最後更新日期：2024/12/19</div>
									<div class="jewelrySoubaBox__table__scroll">
										<div id="pricelistframe" class="inner">
											<?php
											// カラットページの処理。一致するカラットに対応するコンテンツを表示
											echo $table;
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<section class="jewelrySoubaBox__table__attend">
							<dl class="attendList">
								<dt class="attendList__title">注意事項</dt>
								<dd class="attendList__item">價格已包含稅。</dd>
								<dd class="attendList__item">鑽石的等級可能會因簽發證書的認證機構不同而有所差異。</dd>
								<dd class="attendList__item">此為圓形明亮式切割鑽石的價格。</dd>
								<dd class="attendList__item">價格表僅供參考，並不保證收購價格。</dd>
								<dd class="attendList__item">淨度為FL的鑽石一般不會在二手市場流通，因此不會在價格表中列出。</dd>
								<dd class="attendList__item">顏色等級在N級以上的鑽石將被視為彩色鑽石，價格會根據個別情況處理。</dd>
							</dl>
						</section>
						<section>
							<div class="titleMain titleMain--wrapper is-pc">
								<h2 class="titleMain--main">
									參考收購價格表的使用方法
								</h2>
							</div>
							<h2 class="renew_2024_titlesub is-sp">
								<div class="renew_2024_titlesub_topbar">
									<div class="renew_2024_titlesub_topbar_center"></div>
									<div class="renew_2024_titlesub_topbar_left"></div>
									<div class="renew_2024_titlesub_topbar_right"></div>
								</div>
								參考收購價格表的使用方法
							</h2>
							<div class="wd_carattable_superbox">
								<div class="wd_carattable_flex">
									<div class="wd_carattable_flex_arrowtext">
										大
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_l.png">
									</div>
									<div class="wd_carattable_flex_arrowbar">
										<div class="wd_carattable_flex_kind">
											克拉
										</div>
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_r.png">
									</div>
									<div class="wd_carattable_flex_arrowtext">
										小
									</div>
								</div>
								<div class="wd_carattable_flex">
									<div class="wd_carattable_caratitem">10</div>
									<div class="wd_carattable_caratitem">5</div>
									<div class="wd_carattable_caratitem">3</div>
									<div class="wd_carattable_caratitem">1</div>
									<div class="wd_carattable_caratitem">0.9</div>
									<div class="wd_carattable_caratitem">0.8</div>
									<div class="wd_carattable_caratitem">0.7</div>
									<div class="wd_carattable_caratitem">0.6</div>
									<div class="wd_carattable_caratitem">0.5</div>
									<div class="wd_carattable_caratitem">0.4</div>
									<div class="wd_carattable_caratitem">0.3</div>
									<div class="wd_carattable_caratitem">0.2</div>
									<div class="wd_carattable_caratitem">0.1</div>
								</div>
							</div> <!-- wd_carattable_superbox -->
							<div class="wd_carattable_superbox">
								<div class="wd_carattable_flex">
									<div class="wd_carattable_flex_arrowtext_s">
										淨度高
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_l.png">
									</div>
									<div class="wd_carattable_flex_arrowbar">
										<div class="wd_carattable_flex_kind">
											顏色
										</div>
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_r.png">
									</div>
									<div class="wd_carattable_flex_arrowtext_s">
										Low transparency
									</div>
								</div>
								<div class="wd_carattable_flex">
									<div class="wd_carattable_coloritem">D</div>
									<div class="wd_carattable_coloritem">E</div>
									<div class="wd_carattable_coloritem">F</div>
									<div class="wd_carattable_coloritem">G</div>
									<div class="wd_carattable_coloritem">H</div>
									<div class="wd_carattable_coloritem">I</div>
									<div class="wd_carattable_coloritem">J</div>
									<div class="wd_carattable_coloritem">K</div>
									<div class="wd_carattable_coloritem">L</div>
									<div class="wd_carattable_coloritem">M</div>
								</div>
							</div> <!-- wd_carattable_superbox -->
							<div class="wd_carattable_superbox">
								<div class="wd_carattable_flex">
									<div class="wd_carattable_flex_arrowtext">
										High
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_l.png">
									</div>
									<div class="wd_carattable_flex_arrowbar">
										<div class="wd_carattable_flex_kind">
											Cut
										</div>
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_r.png">
									</div>
									<div class="wd_carattable_flex_arrowtext">
										Low
									</div>
								</div>
								<div class="wd_carattable_flex">
									<div class="wd_carattable_cutitem">3EX</div>
									<div class="wd_carattable_cutitem">EXELLENT</div>
									<div class="wd_carattable_cutitem">VERY <br class="is-sp">GOOD</div>
									<div class="wd_carattable_cutitem">GOOD</div>
									<div class="wd_carattable_cutitem">FAIR</div>
									<div class="wd_carattable_cutitem">POOR</div>
								</div>
							</div> <!-- wd_carattable_superbox -->


							<div class="wd_carattable_superbox">
								<div class="wd_carattable_flex">
									<div class="wd_carattable_flex_arrowtext">
										High
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_l.png">
									</div>
									<div class="wd_carattable_flex_arrowbar">
										<div class="wd_carattable_flex_kind">
											Clarity
										</div>
									</div>
									<div class="wd_carattable_flex_arrowbox">
										<img src="../images/daiya/arrow_carathigh_r.png">
									</div>
									<div class="wd_carattable_flex_arrowtext">
										Low
									</div>
								</div>
								<div class="wd_carattable_flex">
									<div class="wd_carattable_clarityitem">IF</div>
									<div class="wd_carattable_clarityitem">VVS1</div>
									<div class="wd_carattable_clarityitem">VVS2</div>
									<div class="wd_carattable_clarityitem">VS1</div>
									<div class="wd_carattable_clarityitem">VS2</div>
									<div class="wd_carattable_clarityitem">SI1</div>
									<div class="wd_carattable_clarityitem">SI2</div>
									<div class="wd_carattable_clarityitem">I1</div>
									<div class="wd_carattable_clarityitem">I2</div>
									<div class="wd_carattable_clarityitem">I3</div>
								</div>
							</div> <!-- wd_carattable_superbox -->
						</section>
					</section>
					<h3 class="renew_2024_titlesub is-sp">
						<div class="renew_2024_titlesub_topbar">
							<div class="renew_2024_titlesub_topbar_center"></div>
							<div class="renew_2024_titlesub_topbar_left"></div>
							<div class="renew_2024_titlesub_topbar_right"></div>
						</div>
						模擬持有鑑定書時的鑽石收購
					</h3>
					<section>
						<section>
							<div class="jewelrySoubaBox">
								<!-- MOD_20240417 -->
								<h3 class="titleSub is-pc">
									模擬持有鑑定書時的鑽石收購
								</h3>

								<!-- tab -->
								<ul class="jewelrySoubaBox__header flex__tab">
									<li class="tab__item active"><a class="price_table_contents_nav1">只有寶石的狀態</a></li>
									<li class="tab__item"><a class="price_table_contents_nav2">附有金飾品的鑽石</a></li>
								</ul>
								<!-- contact -->
								<div class="flex__tabContents kantei">
									<!-- tab1 鑑定書-->
									<div id="searchbox" class="tab1 searchbox jewelrySoubaBox__body flex__content active">
										<div class="jewelrySoubaBox__form">
											<p class="form__lead text--center">請查看鑑定書上記載的4C，並從下面表格確認收購參考金額。<br>
												即使沒有鑑定書，我們也會進行收購，歡迎隨時聯繫我們。</p>
											<dl>
												<dt><label for="carat">Carat</label></dt>
												<dd>
													<div class="form__liner">
														<select name="carat" id="jewelrySoubaBox__carat--select">
															<option value="">請選擇克拉</option>
															<option value="01ct">0.1ct</option>
															<option value="02ct">0.2ct</option>
															<option value="03ct">0.3ct</option>
															<option value="04ct">0.4ct</option>
															<option value="05ct">0.5ct</option>
															<option value="06ct">0.6ct</option>
															<option value="07ct">0.7ct</option>
															<option value="08ct">0.8ct</option>
															<option value="09ct">0.9ct</option>
															<option value="1ct">1.0ct</option>
															<option value="2ct">2.0ct</option>
															<option value="3ct">3.0ct</option>
															<option value="4ct">4.0ct</option>
															<option value="5ct">5.0ct</option>
															<option value="6ct">6.0ct</option>
															<option value="7ct">7.0ct</option>
															<option value="8ct">8.0ct</option>
															<option value="9ct">9.0ct</option>
															<option value="10ct">10.0ct</option>
															<!-- <option value="03ct">0.3ct</option> -->
														</select>
													</div>
												</dd>
												<dt><label for="color">Colour</label></dt>
												<dd>
													<div class="form__liner">
														<select name="color" id="jewelrySoubaBox__color--select">
															<option value="">請選擇顏色</option>
															<option value="D">D</option>
															<option value="E">E</option>
															<option value="F">F</option>
															<option value="G">G</option>
															<option value="H">H</option>
															<option value="I">I</option>
															<option value="J">J</option>
															<option value="K">K</option>
															<option value="L">L</option>
															<option value="M">M</option>
														</select>
													</div>
												</dd>
												<dt><label for="clarity">Quolity</label></dt>
												<dd>
													<div class="form__liner">
														<select name="clarity" id="jewelrySoubaBox__clarity--select">
															<option value="">請選擇淨度</option>
															<option value="if">IF</option>
															<option value="vvs1">VVS1</option>
															<option value="vvs2">VVS2</option>
															<option value="vs1">VS1</option>
															<option value="vs2">VS2</option>
															<option value="si1">SI1</option>
															<option value="si2">SI2</option>
															<option value="i1">I1</option>
															<option value="i1-">I1-</option>
															<option value="i2">I2</option>
															<option value="i3">I3</option>
															<!-- <option value="vvs1">VVS1</option> -->
														</select>
													</div>
												</dd>
												<dt><label for="cut">Cut</label></dt>
												<dd>
													<div class="form__liner">
														<select name="cut" id="jewelrySoubaBox__cut--select">
															<option value="">請選擇切工</option>
															<option value="3ex">3EX</option>
															<option value="excellent">Excellent</option>
															<option value="verygood">Verygood</option>
															<option value="good">Good</option>
															<option value="fair">Fair</option>
															<option value="poor">Poor</option>
															<!-- <option value="excellent">Excellent</option> -->
														</select>
													</div>
												</dd>
											</dl>
											<div class="btn__wrap btn__red">
												<button id="price-search" class="tab1 souba gtm-simu-daiya1"
													type="button">查詢此內容的收購參考金額</button>
											</div>

											<div class="form__answer">
												<div id="diamond_price_table_display_inner" class="form__answer--inner">
													<div class="sumTitle">您的物品收購參考金額：</div>
													<div id="price_table_calc" class="tab1 price"><span
															class="value">HK$</span>0</div>
												</div>
											</div>
										</div>
									</div>
									<!-- tab2 鑑定書-->
									<div id="diamond_price_table_display_2" class="jewelrySoubaBox__body flex__content">
										<div id="price" class="jewelrySoubaBox__form">
											<p class="form__lead text--center">請查看鑑定書上記載的4C，並從下面表格確認收購參考金額。<br>
												即使沒有鑑定書，我們也會進行收購，歡迎隨時聯繫我們。</p>
											<dl>
												<dt><label for="carat">金飾品</label></dt>
												<dd>
													<div class="form__wrap">
														<div class="form__liner">
															<select name="carat" id="simulation_select">
																<option value="" selected="selected">金の品位</option>
																<option v-bind:value="au_ingod_price">インゴット（金）</option>
																<option v-bind:value="au_scrap[0].price">K24</option>
																<option v-bind:value="au_scrap[1].price">K22</option>
																<option v-bind:value="au_scrap[2].price">K21.6</option>
																<option v-bind:value="au_scrap[3].price">K20</option>
																<option v-bind:value="au_scrap[4].price">K18</option>
																<option v-bind:value="au_scrap[5].price">K14</option>
																<option v-bind:value="au_scrap[6].price">K10</option>
																<option v-bind:value="au_scrap[7].price">K9</option>
																<option v-bind:value="au_scrap[8].price">K18WG</option>
																<option v-bind:value="au_scrap[9].price">K14WG</option>
																<option v-bind:value="pt_ingod_price">インゴット（プラチナ）</option>
																<option v-bind:value="pt_scrap[0].price">Pt1000</option>
																<option v-bind:value="pt_scrap[1].price">Pt950</option>
																<option v-bind:value="pt_scrap[2].price">Pt900</option>
																<option v-bind:value="pt_scrap[3].price">Pt850</option>
															</select>
														</div>
														<span class="form--symbol">x</span>
														<div class="form__liner form__liner--weight">
															<input type="number" id="weight" min="0" max="100000"
																placeholder="0">
														</div>
													</div>
												</dd>
												<dd class="border"></dd>
											</dl>
											<section id="tablelistbox">
												<div id="" class="tab2 searchbox">
													<dl>
														<dt><label for="carat">Carat</label></dt>
														<dd>
															<div class="form__liner">
																<select name="carat" id="jewelrySoubaBox__carat--select">
																	<option value="">請選擇克拉</option>
																	<option value="01ct">0.1ct</option>
																	<option value="02ct">0.2ct</option>
																	<option value="03ct">0.3ct</option>
																	<option value="04ct">0.4ct</option>
																	<option value="05ct">0.5ct</option>
																	<option value="06ct">0.6ct</option>
																	<option value="07ct">0.7ct</option>
																	<option value="08ct">0.8ct</option>
																	<option value="09ct">0.9ct</option>
																	<option value="1ct">1.0ct</option>
																	<option value="2ct">2.0ct</option>
																	<option value="3ct">3.0ct</option>
																	<option value="4ct">4.0ct</option>
																	<option value="5ct">5.0ct</option>
																	<option value="6ct">6.0ct</option>
																	<option value="7ct">7.0ct</option>
																	<option value="8ct">8.0ct</option>
																	<option value="9ct">9.0ct</option>
																	<option value="10ct">10.0ct</option>
																	<!-- <option value="03ct">0.3ct</option> -->
																</select>
															</div>
														</dd>
														<dt><label for="color">Colour</label></dt>
														<dd>
															<div class="form__liner">
																<select name="color" id="jewelrySoubaBox__color--select">
																	<option value="">請選擇顏色</option>
																	<option value="D">D</option>
																	<option value="E">E</option>
																	<option value="F">F</option>
																	<option value="G">G</option>
																	<option value="H">H</option>
																	<option value="I">I</option>
																	<option value="J">J</option>
																	<option value="K">K</option>
																	<option value="L">L</option>
																	<option value="M">M</option>
																</select>
															</div>
														</dd>
														<dt><label for="clarity">Quolity</label></dt>
														<dd>
															<div class="form__liner">
																<select name="clarity"
																	id="jewelrySoubaBox__clarity--select">
																	<option value="">請選擇淨度</option>
																	<option value="if">IF</option>
																	<option value="vvs1">VVS1</option>
																	<option value="vvs2">VVS2</option>
																	<option value="vs1">VS1</option>
																	<option value="vs2">VS2</option>
																	<option value="si1">SI1</option>
																	<option value="si2">SI2</option>
																	<option value="i1">I1</option>
																	<option value="i1-">I1-</option>
																	<option value="i2">I2</option>
																	<option value="i3">I3</option>
																	<!-- <option value="vvs1">VVS1</option> -->
																</select>
															</div>
														</dd>
														<dt><label for="cut">Cut</label></dt>
														<dd>
															<div class="form__liner">
																<select name="cut" id="jewelrySoubaBox__cut--select">
																	<option value="">請選擇切工</option>
																	<option value="3ex">3EX</option>
																	<option value="excellent">Excellent</option>
																	<option value="verygood">Verygood</option>
																	<option value="good">Good</option>
																	<option value="fair">Fair</option>
																	<option value="poor">Poor</option>
																	<!-- <option value="excellent">Excellent</option> -->
																</select>
															</div>
														</dd>
													</dl>
													<div class="btn__wrap btn__red">
														<button id="" class="tab2 souba gtm-simu-daiya1"
															type="button">查詢此內容的收購參考金額</button>
													</div>
												</div>
											</section>
											<div class="form__answer">

												<div class="form__answer--inner">
													<div class="sumTitle">金的參考價格</div>
													<div class="price">
														<input readonly="readonly" class="gold_price_table_calc_num"
															type="text" id="answer" value="0">
													</div>
												</div>

												<div class="form__answer--inner hasBorder">
													<div class="sumTitle">鑽石的參考價格</div>
													<div id="" class="tab2 price"><span class="value">HK$</span>0</div>
												</div>

												<div class="form__answer--inner">
													<div class="sumTitle">您的物品收購參考金額：</div>
													<div id="daiya_gold_calc" class="price"><span class="value">HK$</span>0
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</section>
					<h3 class="renew_2024_titlesub is-sp">
						<div class="renew_2024_titlesub_topbar">
							<div class="renew_2024_titlesub_topbar_center"></div>
							<div class="renew_2024_titlesub_topbar_left"></div>
							<div class="renew_2024_titlesub_topbar_right"></div>
						</div>
						模擬只知鑽石的克拉的鑽石收購
					</h3>
					<section>
						<div id="price_table_contents1" class="jewelrySoubaBox">
							<!-- MOD_20240417 -->
							<h3 class="titleSub is-pc">
								模擬只知鑽石的克拉的鑽石收購
							</h3>

							<!-- tab -->
							<ul class="jewelrySoubaBox__header flex__tab">
								<li class="tab__item active"><a>只有寶石的狀態</a></li>
								<li class="tab__item"><a>附有金飾品的鑽石</a></li>
							</ul>
							<!-- contact -->
							<div class="flex__tabContents">
								<!-- tab1 -->
								<div class="jewelrySoubaBox__body flex__content active">
									<div class="jewelrySoubaBox__form">
										<dl>
											<dt><label for="carat_only">カラット数</label></dt>
											<dd>
												<div id="carat_only_price_area" class="form__liner">
													<select name="carat_only" id="jewelrySoubaBox__carat--select">
														<option value="">カラット数を選択してください</option>
														<option value="01ct">0.1ct</option>
														<option value="02ct">0.2ct</option>
														<option value="03ct">0.3ct</option>
														<option value="04ct">0.4ct</option>
														<option value="05ct">0.5ct</option>
														<option value="06ct">0.6ct</option>
														<option value="07ct">0.7ct</option>
														<option value="08ct">0.8ct</option>
														<option value="09ct">0.9ct</option>
														<option value="1ct">1.0ct</option>
														<option value="2ct">2.0ct</option>
														<option value="3ct">3.0ct</option>
														<option value="4ct">4.0ct</option>
														<option value="5ct">5.0ct</option>
														<option value="6ct">6.0ct</option>
														<option value="7ct">7.0ct</option>
														<option value="8ct">8.0ct</option>
														<option value="9ct">9.0ct</option>
														<option value="10ct">10.0ct</option>
													</select>
												</div>
											</dd>
										</dl>
										<div class="btn__wrap btn__red">
											<button id="carat_only_btn1" class="souba gtm-simu-daiya2"
												type="button">查詢此內容的收購參考金額</button>
										</div>

										<div class="form__answer">

											<div class="form__answer--inner">
												<div class="sumTitle">您的物品收購參考金額：</div>
												<div id="carat_only_price" class="price"><span class="value">HK$</span>0
												</div>
											</div>
										</div>
										<p class="caution">注意事項<br>
											※模擬是假設顏色為「D」，淨度為「IF」，切工為「3EX」。</p>
									</div>
								</div>
								<!-- tab2 -->
								<div id="simulation" class="carat_and_gold_price jewelrySoubaBox__body flex__content">
									<div class="jewelrySoubaBox__form">
										<dl>
											<dt><label for="carat">金飾品</label></dt>
											<dd>
												<div class="form__wrap">
													<div class="form__liner">
														<select name="carat" id="simulation_select2">
															<option value="" selected="selected">金の品位</option>
															<option v-bind:value="au_ingod_price">インゴット（金）</option>
															<option v-bind:value="au_scrap[0].price">K24</option>
															<option v-bind:value="au_scrap[1].price">K22</option>
															<option v-bind:value="au_scrap[2].price">K21.6</option>
															<option v-bind:value="au_scrap[3].price">K20</option>
															<option v-bind:value="au_scrap[4].price">K18</option>
															<option v-bind:value="au_scrap[5].price">K14</option>
															<option v-bind:value="au_scrap[6].price">K10</option>
															<option v-bind:value="au_scrap[7].price">K9</option>
															<option v-bind:value="au_scrap[8].price">K18WG</option>
															<option v-bind:value="au_scrap[9].price">K14WG</option>
															<option v-bind:value="pt_ingod_price">インゴット（プラチナ）</option>
															<option v-bind:value="pt_scrap[0].price">Pt1000</option>
															<option v-bind:value="pt_scrap[1].price">Pt950</option>
															<option v-bind:value="pt_scrap[2].price">Pt900</option>
															<option v-bind:value="pt_scrap[3].price">Pt850</option>
														</select>
													</div>
													<span class="form--symbol">x</span>
													<div class="form__liner form__liner--weight">
														<input type="number" id="weight2" min="0" max="100000"
															placeholder="0">
													</div>
												</div>
											</dd>
											<dd class="border"></dd>
											<dt><label for="carat">Carat</label></dt>
											<dd>
												<div id="carat_only_price_area2" class="form__liner">
													<select name="carat">
														<option value="">請選擇克拉</option>
														<option value="01ct">0.1ct</option>
														<option value="02ct">0.2ct</option>
														<option value="03ct">0.3ct</option>
														<option value="04ct">0.4ct</option>
														<option value="05ct">0.5ct</option>
														<option value="06ct">0.6ct</option>
														<option value="07ct">0.7ct</option>
														<option value="08ct">0.8ct</option>
														<option value="09ct">0.9ct</option>
														<option value="1ct">1.0ct</option>
														<option value="2ct">2.0ct</option>
														<option value="3ct">3.0ct</option>
														<option value="4ct">4.0ct</option>
														<option value="5ct">5.0ct</option>
														<option value="6ct">6.0ct</option>
														<option value="7ct">7.0ct</option>
														<option value="8ct">8.0ct</option>
														<option value="9ct">9.0ct</option>
														<option value="10ct">10.0ct</option>
													</select>
												</div>
											</dd>
										</dl>
										<div class="btn__wrap btn__red">
											<button id="carat_only_btn2" class="souba gtm-simu-daiya2"
												type="button">查詢此內容的收購參考金額</button>
										</div>

										<div class="form__answer">

											<div class="form__answer--inner">
												<div class="sumTitle">金的參考價格</div>
												<div class="price"><input class="gold_price_table_calc_num" type="text"
														id="answer2" readonly="readonly" value="0"><span
														class="value">&yen;</span></div>
											</div>

											<div class="form__answer--inner hasBorder">
												<div class="sumTitle">鑽石的參考價格</div>
												<div class="price" id="carat_only_price2"><span class="value">HK$</span>0
												</div>
											</div>

											<div class="form__answer--inner">
												<div class="sumTitle">您的物品收購參考金額：</div>
												<div id="daiya_gold_calc2" class="price"><span class="value">HK$</span>0
												</div>
											</div>
										</div>
										<p class="caution">注意事項<br>
											※模擬是假設顏色為「D」，淨度為「IF」，切工為「3EX」。</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end カラット -->
					</section>
				</section>



				<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
				<script>
					$( document ).ready( function () {
						jQuery( document ).ready( function ( $ ) {
							var $listWrap = $( "#tablelistbox" ); //鑑定書あり部分のID
							var $priceWrap = $( "#pricelistframe" ); //価格相場のID
							var $searchWrap = $( "#searchbox" ); //select部分のID
							var $selects = $searchWrap.find( "select" );
							var $submit = $( "#price-search" ); //検索ボタンのID
							var theCls = "the-price"; //使っていない
							var hdnCls = "hidden";
							//searchboxとprice-searchが重要
							//

							//var hdnLoadingCls = "hidden-loading";
							//$listWrap.find("." + hdnLoadingCls).removeClass(hdnLoadingCls);


							var reachScorllIfSp = function () {
								if ( $searchWrap.hasClass( 'sp-searchbox' ) ) {
									var parentScrollTo = $searchWrap.offset().top;
									var currentScroll = $( window ).scrollTop();
									if ( currentScroll < parentScrollTo ) {
										$( "html,body" ).animate( {
											scrollTop: parentScrollTo,
										}, {
											duration: 400,
										} );
									}
								}
							};

							var reachScroll = function ( reach, cell ) {
								var timer;
								var itvlNum = 0;
								$( cell ).addClass( theCls );
								$priceWrap.stop().animate( {
									scrollTop: reach,
								}, {
									duration: 500,
									complete: function () {
										timer = setInterval( function () {
											itvlNum++;
											if ( itvlNum >= 5 && $( cell ).hasClass( theCls ) ) {
												clearInterval( timer );
												return;
											}
											$( cell ).toggleClass( theCls );
										}, 300 );
									}
								} );
							};



							//鑑定書をお持ちお持ちの方はこちら
							function updateElementsAndEvents( tab ) {
								$( '.kantei .' + tab + '.searchbox' ).attr( 'id', null );
								$( '.kantei .' + tab + ' button' ).attr( 'id', null );
								$( '.kantei .' + tab + '.price' ).attr( 'id', null );


								var otherTab = ( tab === 'tab1' ) ? 'tab2' : 'tab1';
								$( '.kantei .' + otherTab + '.searchbox' ).attr( 'id', 'searchbox' );
								$( '.kantei .' + otherTab + ' button' ).attr( 'id', 'price-search' );
								$( '.kantei .' + otherTab + '.price' ).attr( 'id', 'price_table_calc' );


								var $searchWrap = $( "#searchbox" );
								var $selects = $searchWrap.find( "select" );
								var $submit = $( "#price-search" );

								// Attach event handler to $submit
								//鑑定書をお持ちお持ちの方はこちら
								$submit.on( 'click', function () {
									$priceWrap.find( 'td' ).removeClass( theCls );

									var vals = {};
									var errors = "";
									$.each( $selects, function ( k, ele ) {
										var sidx = $( ele ).prop( 'selectedIndex' );

										var name = $( ele ).attr( "name" );
										var $cOpt = $( $( ele ).find( 'option' ).get( sidx ) );
										var v = ( "conditions" === name && $cOpt.length ) ? $cOpt.html() : $( ele ).val();
										var isEmpty = ( 0 === sidx && ( "--" === v || "" === v ) );
										if ( isEmpty ) {
											var label = $( ele ).parent().parent().prev( 'dt' ).find( 'label' ).html();
											errors += label + "を選択してください\n";
										}
										vals[ name ] = v;

									} );

									if ( errors ) {
										alert( errors );
										return;
									}

									var $reachWrap = {};
									var point = {
										x: {
											s: 'thead th:not(.none)',
											f: function ( idx ) {
												return ( $( this ).html() === condition_val ) ? idx : null;
											},
										},
										y: {
											s: 'tbody th',
											f: function ( idx ) {
												return ( $( this ).html() === color_val ) ? idx : null},
																},
															};
																																																																																																																																						var reachAdjust = 8;

																																																																																																																																						var applyCellReach = true;


																																																																																																																																						var ct_id = "#ct-" + vals.carat; //変更

																																																																																																																																						var clarity = vals.clarity;
																																																																																																																																						var cut = vals.cut;
																																																																																																																																						var color = vals.color;
																																																																																																																																						var reach_id = ct_id + "-" + clarity;
																																																																																																																																						$reachWrap = $(reach_id);

																																																																																																																																						point.x.s = 'thead th';
																																																																																																																																						point.x.f = function(idx) {
																																																																																																																																							return ($(this).hasClass(cut)) ? idx : null;
																																																																																																																																						};
																																																																																																																																						point.y.s = 'tbody td[class*="color"]';
																																																																																																																																						point.y.f = function(idx) {
																																																																																																																																							return ($(this).html() === color) ? idx : null;
																																																																																																																																						};

																																																																																																																																						reachAdjust = 5;

																																																																																																																																						applyCellReach = false;


																																																																																																																																						if (!$reachWrap.length) return;

																																																																																																																																						var $table = $('table');
																																																																																																																																						var x = $table.find(point.x.s).map(point.x.f).get(0);
																																																																																																																																						var y = $table.find(point.y.s).map(point.y.f).get(0);
																																																																																																																																						var cell = $reachWrap.find("tr").eq(y).find("td").eq(x);
																																																																																																																																						reachScorllIfSp();

																																																																																																																																						applyCellReach = (y > 0 && applyCellReach) || false;

																																																																																																																																						var reach = (applyCellReach) ? $(cell).position().top : $reachWrap.position().top;
																																																																																																																																						reach = reach - $priceWrap.position().top;
																																																																																																																																						reach = $priceWrap.scrollTop() + reach - reachAdjust;

																																																																																																																																						// スクロール
																																																																																																																																						// reachScroll(reach, cell);
																																																																																																																																						$("#diamond_price_table_display_inner #price_table_calc").html(cell.text() +
																																																																																																																																							'<span class="value">HK$</span>');
																																																																																																																																						$("#diamond_price_table_display_2 #price_table_calc").html(cell.text() +
																																																																																																																																							'<span class="value">HK$</span>');

																																																																																																																																						daiya_calc = cell.text();
																																																																																																																																						daiya_calc = daiya_calc.replace(/en/g, '');
																																																																																																																																						daiya_calc = daiya_calc.replace(/,/g, '');
																																																																																																																																						daiya_calc = Number(daiya_calc);
																																																																																																																																						simulation_select_val = $("#simulation_select").val();
																																																																																																																																						simulation_select_val = simulation_select_val.replace(/,/g, '');
																																																																																																																																						simulation_select_val = Number(simulation_select_val);
																																																																																																																																						weight_val = $("#weight").val();
																																																																																																																																						weight_val = Number(weight_val);
																																																																																																																																						simulation_select_val = simulation_select_val * weight_val;
																																																																																																																																						gold_daiya_calc = simulation_select_val + daiya_calc;
																																																																																																																																						gold_daiya_calc = String(gold_daiya_calc).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
																																																																																																																																						$("#daiya_gold_calc").html(gold_daiya_calc + '<span class="value">HK$</span>');

																																																																																																																																					});
																																																																																																																																				}

																																																																																																																																				// Initial setup
																																																																																																																																				updateElementsAndEvents('tab2');

																																																																																																																																				// Event handlers
																																																																																																																																				$(".price_table_contents_nav2").on('click', function() {
																																																																																																																																					updateElementsAndEvents('tab1');
																																																																																																																																				});

																																																																																																																																				$(".price_table_contents_nav1").on('click', function() {
																																																																																																																																					updateElementsAndEvents('tab2');
																																																																																																																																				});


																																																																																																																																				// new
																																																																																																																																				// ページロード時に価格データを取得
																																																																																																																																				var carat_num = <?php echo wp_json_encode( $carat_num ) ?>;
																																																																																																																																				var prices = {};
																																																																																																																																				for (var i = 0; i < carat_num.length; i++) {
																																																																																																																																					var label = carat_num[i]['label'];
																																																																																																																																					var id = "#ct-" + label + "-if";
																																																																																																																																					var price = $(id + " > tr:nth-child(1) > td:nth-child(2)").text();
																																																																																																																																					prices[label] = price;
																																																																																																																																				}

																																																																																																																																				function updatePrice(carat, target) {
																																																																																																																																					var price = prices[carat];
																																																																																																																																					if (price) {
																																																																																																																																						$(target).html(price + '<span class="value">HK$</span>');
																																																																																																																																					}
																																																																																																																																				}

																																																																																																																																				$("#carat_only_btn1").on('click', function() {
																																																																																																																																					var carat_only_price_area = $("#carat_only_price_area select").val();
																																																																																																																																					updatePrice(carat_only_price_area, "#carat_only_price");
																																																																																																																																				});

																																																																																																																																				$(document).on('click', '#carat_only_btn2', function() {
																																																																																																																																					var carat_only_price_area2 = $("#carat_only_price_area2 select").val();
																																																																																																																																					console.log("Selected carat: ", carat_only_price_area2);
																																																																																																																																					updatePrice(carat_only_price_area2, "#carat_only_price2");

																																																																																																																																					var caratPrice = parseInt($("#carat_only_price2").text().replace(/[HK$,]/g, ''), 10);
																																																																																																																																					var answer2 = parseInt($("#answer2").val().replace(/,/g, ''), 10);
																																																																																																																																					var goldPriceVal = parseInt($("#simulation_select2").val().replace(/,/g, ''), 10);
																																																																																																																																					var weight = parseFloat($("#weight2").val().replace(/,/g, ''));

																																																																																																																																					var goldCalcPrice = goldPriceVal * weight;
																																																																																																																																					if (isNaN(goldCalcPrice)) {
																																																																																																																																						goldCalcPrice = 0;
																																																																																																																																					}
																																																																																																																																					// var total = caratPrice + answer2 + goldCalcPrice;
																																																																																																																																					var total = caratPrice + answer2;

																																																																																																																																					$("#daiya_gold_calc2").html(total.toLocaleString() + '<span class="value">HK$</span>');
																																																																																																																																				});


																																																																																																																																				$(".price_table_contents_nav").on('click', function() {
																																																																																																																																					$("#price_table_contents1 #price_table_calc").text("0");
																																																																																																																																					$("#price_table_contents2 #price_table_calc").text("0");
																																																																																																																																				});

																																																																																																																																				// タブ処理
																																																																																																																																				$("a[href='#price_table_contents2']").on('click', function() {
																																																																																																																																					$(".arrow_bottom_daiya_default").css("display", "block");
																																																																																																																																					$(".arrow_bottom_gold_default").css("display", "none");
																																																																																																																																					$(".arrow_bottom_gold").css("display", "block");
																																																																																																																																					$(".arrow_bottom_daiya").css("display", "none");
																																																																																																																																					$("#diamond_price_table_display_inner .price_table_calc_area").css("display", "none");
																																																																																																																																					$(".prompt_text_daiya").css("display", "none");
																																																																																																																																					$(".prompt_text_gold").css("display", "block");
																																																																																																																																				});
																																																																																																																																				$("a[href='#price_table_contents1']").on('click', function() {
																																																																																																																																					$(".arrow_bottom_daiya_default").css("display", "none");
																																																																																																																																					$(".arrow_bottom_daiya").css("display", "block");
																																																																																																																																					$("#diamond_price_table_display_inner .price_table_calc_area").css("display", "flex");
																																																																																																																																					$(".prompt_text_gold").css("display", "none");
																																																																																																																																					$(".prompt_text_daiya").css("display", "block");
																																																																																																																																				});
																																																																																																																																				let clone1 = $(".calc_area").clone();
																																																																																																																																				$(".cloned_gold_calc").append(clone1);


																																																																																																																																			});
																																																																																																																																			const ua = navigator.userAgent;
																																																																																																																																			if (ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)) {

																																																																																																																																				// タブ処理
																																																																																																																																				$("a[href='#price_table_contents2']").on('click', function() {
																																																																																																																																					$("#tablelistbox h2").css("margin-top", "680px");
																																																																																																																																					$("a[href='#price_table_contents2'] .arrow_bottom_gold").css("display", "none")
																																																																																																																																					$("a[href='#price_table_contents2'] .arrow_bottom").css("display", "block")
																																																																																																																																				});
																																																																																																																																				$("a[href='#price_table_contents1']").on('click', function() {
																																																																																																																																					$("#tablelistbox h2").css("margin-top", "160%");
																																																																																																																																				});

																																																																																																																																			} else {
																																																																																																																																				// pc


																																																																																																																																				jQuery(document).ready(function($) {
																																																																																																																																					input_width = $(".otkr-plicelist #searchbox p input").width();
																																																																																																																																					text_width = 130
																																																																																																																																					arrow_width = 15;
																																																																																																																																					margin_width = 10;
																																																																																																																																					arrow_text_width = text_width + arrow_width + margin_width;
																																																																																																																																					arrow_text_width_calc = input_width - arrow_text_width;
																																																																																																																																					arrow_text_width_calc = arrow_text_width_calc / 2;
																																																																																																																																					arrow_text_width_calc = arrow_text_width_calc + 22;
																																																																																																																																					$(".otkr-plicelist #searchbox p input").css("padding-right", arrow_text_width_calc);
																																																																																																																																				});


																																																																																																																																				// タブ処理
																																																																																																																																				$("a[href='#price_table_contents2']").on('click', function() {
																																																																																																																																					var windowWidth = $(window).width();

																																																																																																																																					if (windowWidth >= 1361) {
																																																																																																																																						$("#tablelistbox > h2").css("margin-top", "650px");
																																																																																																																																					} else {
																																																																																																																																						$("#tablelistbox > h2").css("margin-top", "650px");
																																																																																																																																					}

																																																																																																																																				});
																																																																																																																																				$("a[href='#price_table_contents1']").on('click', function() {
																																																																																																																																					$("#tablelistbox > h2").css("margin-top", "400px");

																																																																																																																																				});
																																																																																																																																			}

																																																																																																																																		});
																																																																																																																																	</script>

																																																																																																																																	<script>
																																																																																																																																		document.addEventListener('DOMContentLoaded', function() {

																																																																																																																																			function multi(selectId, weightId, answerId, answerCpId) {
																																																																																																																																				var text = jQuery('#' + selectId + ' option:selected').val();
																																																																																																																																				if (text === undefined) {
																																																																																																																																					console.error('No selected option found for #' + selectId);
																																																																																																																																					return;
																																																																																																																																				}

																																																																																																																																				var removed = text.replace(/,/g, '');
																																																																																																																																				var num = parseInt(removed, 10);
																																																																																																																																				var weight = jQuery("#" + weightId).val();

																																																																																																																																				if (num) {
																																																																																																																																					if (weight) {
																																																																																																																																						var _up = 0;

																																																																																																																																						var answer_cp = num * weight + _up * weight;
																																																																																																																																						answer_cp = Math.round(answer_cp).toLocaleString();
																																																																																																																																						jQuery('#' + answerCpId).text(answer_cp);

																																																																																																																																						var answer = num * weight;
																																																																																																																																						answer = Math.round(answer).toLocaleString();

																																																																																																																																						// ここで値を確認
																																																																																																																																						console.log("Calculated Answer:", answer);

																																																																																																																																						// 1. `val()` で `input` の値を設定
																																																																																																																																						jQuery('#' + answerId).val("HK$ " + answer);

																																																																																																																																						// 2. `setAttribute` も試してみる
																																																																																																																																						document.getElementById(answerId).setAttribute("value", "HK$ " + answer);

																																																																																																																																						// 値が正しくセットされたか確認
																																																																																																																																						console.log("Updated Input Value:", jQuery('#' + answerId).val());
																																																																																																																																					}
																																																																																																																																				}
																																																																																																																																			}



																																																																																																																																			jQuery(document).on('change', '#simulation_select', function() {
																																																																																																																																				multi('simulation_select', 'weight', 'answer', 'answer_cp');
																																																																																																																																			});

																																																																																																																																			jQuery(document).on('change', '#weight', function() {
																																																																																																																																				multi('simulation_select', 'weight', 'answer', 'answer_cp');
																																																																																																																																			});

																																																																																																																																			jQuery(document).on('change', '#simulation_select2', function() {
																																																																																																																																				multi('simulation_select2', 'weight2', 'answer2', 'answer_cp2');
																																																																																																																																			});

																																																																																																																																			jQuery(document).on('change', '#weight2', function() {
																																																																																																																																				multi('simulation_select2', 'weight2', 'answer2', 'answer_cp2');
																																																																																																																																			});

																																																																																																																																			jQuery(function() {
																																																																																																																																				jQuery(document).on('mouseup keyup', '#weight, #weight2', function(e) {
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
																																																																																																																																	</script>

																																																																																																																																	<script src="https://www.otakaraya.jp/js/vue.min.js"></script>
																																																																																																																																	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
																																																																																																																																	<script src="/rate_files_v2/japanese-holidays.min.js"></script>
																																																																																																																																	<script src="/rate_files_v2/price_load_ex.js"></script>
																																																																																																																																	<script>
																																																																																																																																		//crossdomainのphpファイルのアップ先URL
																																																																																																																																		const crossdomain_file = "https://www.otakaraya.jp/rate_files_v2/crossdomain.php";
																																																																																																																																		//データを反映したいDOM要素のID
																																																																																																																																		const dom_id = ["#price", "#simulation", "#todayprice"];
																																																																																																																																		Vue.use(PriceLoad, {
																																																																																																																																			_file: crossdomain_file,
																																																																																																																																			_dom: dom_id
																																																																																																																																		});
																																																																																																																																	</script>

			<?php } ?>



			<!-- MOD_20240417 -->
			<!-- MOD_20240417 -->
			<div class="renew_2024_dia_titlebox is-sp">
				<h2 class="renew_2024_dia_title_h2">
					<img class="renew_2024_dia_title_l_leaf"
						src="../images/daiya/dialeaf_l_202404.png">
					<img class="renew_2024_dia_title_r_leaf"
						src="../images/daiya/dialeaf_r_202404.png">
					<p>
					鑽石參考價格
					</p>
				</h2>
				<div class="renew_2024_dia_title_lead">
					<p>
					收購參考金額會依市場行情與時期變動，歡迎隨時洽詢。
					</p>
				</div>
			</div>
			<!-- MOD_20240417 -->

			<!-- MOD_20240417 ===================================================================== -->
			<div class="renew_2024_top_result_superbox is-sp">
				<div class="renew_2024_tab_superbox">
					<div class="renew_2024_tabbox wd_active"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">戒指</div>
					<div class="renew_2024_tabbox"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">項鍊</div>
					<div class="renew_2024_tabbox"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">手鐲</div>
					<div class="renew_2024_tabbox"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">brooch</div>
					<div class="renew_2024_result_contentsbox" style="display: block;">
						<div class="renew_2024_result_contentsbox_flex">
							<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-2carat/25167/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/27b0e8037216bcbeecb235ed5c88282a-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="K18 diamond ring 2.027 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">K18 diamond ring 2.027 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,067,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25157/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/9e2d4f73e1d5b51f77554fd10544a2c5-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.038 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 2.038 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">2,722,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25198/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/e067b3f2e82b77781fff1280b851e264-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.081 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 2.081 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">902,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25202/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/4e6c6fbaed6c2eae401cc2bf9780c06a-1-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.381 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 2.381 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">797,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25165/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/e5873ef7b27116ff2147fac0a8855aa4-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.014 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 3.014 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,133,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25191/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/fc1b88445fdfed2b273060b1abb8a780-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.02 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 3.02 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,039,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25155/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/78601aaaf41f819c9d8541725dcc8bdc-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.041 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 3.041 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">3,085,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-3carat/25163/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/35c50eeca24f55237026670b96a89506-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.587 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 3.587 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,138,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-5carat/25159/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/60fdf5d0f8ff8a5f1c109347692934f7-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 5.227 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 5.227 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,787,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25193/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/ba3ba147e1e10201825cbf7ed29a2027-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.378 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 2.378 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,006,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25161/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/da8fa4b2753b149e5662d9dda72976bb-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="K18 diamond ring 2.636 ct"
												decoding="async" loading="lazy" sizes="100vw"></div>
										<div class="renew_2024_result_item_name">K18 diamond ring 2.636 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">1,490,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
							<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25196/">
									<div class="renew_2024_result_itembox">
										<div class="renew_2024_result_item_image"><img width="300" height="300"
												src="../images/daiya/171943538be9b67a3e95bc711cc8486e-300x300.webp"
												class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.109 ct"
												decoding="async" loading="lazy"
												sizes="100vw"></div>
										<div class="renew_2024_result_item_name">Pt･Pm900 diamond ring 3.109 ct</div>
										<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
										<div class="renew_2024_result_item_price">968,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
						</div>
						<div class="flex_annitation">
							※圖片僅供參考<br>
							※附有保證書及完整配件的產品鑽石收購參考價格表
						</div>

						<!-- <div class="btn__wrap btn__red"><a href="../daiya/result.html" class="gtm-list-result">查看鑽石參考收購價格表請點此</a> -->
					</div>
				</div>
				<div class="renew_2024_result_contentsbox">
					<div class="renew_2024_result_contentsbox_flex">
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-10carat/25181/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/8e8561b5e8f90315505686d38c99fb16-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt850・Pt900 diamond necklace 15 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt850・Pt900 diamond necklace 15 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">1,177,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25223/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/905423510ed336395bc889700fa304c4-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 3.22 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond necklace 3.22 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">962,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25227/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/1bffa42f3c50b684bda418a2524eba53-1-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K14WG diamond necklace 12.89 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K14WG diamond necklace 12.89 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">886,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-9carat/25232/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/9bb0dd2b83e15a6821b8c8b039e07836-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond necklace 9.77 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond necklace 9.77 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">869,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25236/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/b8c211efa76fc22dc3cc0f32a8ff6bf9-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="diamond necklace 10.5 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">diamond necklace 10.5 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">858,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25234/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/042b8aef3c42fa8d689152c8e540b6ee-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm850 diamond necklace 10 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm850 diamond necklace 10 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">891,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25230/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/749521b6c40a5dc258267feda0bd17cd-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond necklace 50.554 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond necklace 50.554 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">3,448,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-2carat/25057/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/4cedb8d9fb64e09f1efb16e549c7bd74-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 2.016 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond necklace 2.016 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">2,101,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/25225/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/3d04d3d616ad869772fa4a41f5b33ab5-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm950 diamond necklace 1.15 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm950 diamond necklace 1.15 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">1,237,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/25061/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/4167e23364eb7df4a8f8b88a9b5fe4e0-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 1.57 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond necklace 1.57 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">1,655,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25195/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/b0502e2e155fdc41573e71404d3185af-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 2.259 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond necklace 2.259 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">1,056,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-04carat/26200/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/b8f9a66b7c1c0eaf3a43bd5dbb20d788-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="diamond necklace Pt・Pm850 0.449ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">diamond necklace Pt・Pm850 0.449ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">29,700<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/26203/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/c4e08d8f36be3877e44fc641d6a7648d-300x300.jpg"
											class="attachment-thumbnail size-thumbnail" alt="diamond necklace 1carat pt850"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">diamond necklace 1carat pt850</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">49,500<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/26205/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/ae65a7f7eb26d47380d54fa69f44687e-300x300.jpg"
											class="attachment-thumbnail size-thumbnail" alt="diamond necklace 1carat Pt850・Pt900 combi"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">diamond necklace 1carat Pt850・Pt900 combi</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">47,300<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/26178/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/99856989f40e8b5ee2e353374eafeee8-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="diamondnecklace 1.2carat"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">diamondnecklace 1.2carat</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">93,500<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25204/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/28830920d24c470a67e4e8e9e169e075-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 11.56 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond necklace 11.56 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">996,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="flex_annitation">
						※圖片僅供參考<br>
						※附有保證書及完整配件的產品鑽石收購參考價格表
					</div>

					<!-- <div class="btn__wrap btn__red"><a href="../daiya/result.html" class="gtm-list-result">查看鑽石參考收購價格表請點此</a>
					</div> -->
				</div>
				<div class="renew_2024_result_contentsbox">
					<div class="renew_2024_result_contentsbox_flex">
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/bracelet/25119/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/5a0fa1c0cff0f36c526083ff2533fe7b-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="18KT diamond Bracelet"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">18KT diamond Bracelet</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">331,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/bracelet/25123/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/67db17377b3f5a80d5f285853711b688-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet" decoding="async"
											loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">325,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25121/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/8b866539057e26196caf7e304f67fee3-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 2.05 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet 2.05 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">326,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-5carat/25090/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/29da05cd0e7a127f2e8c2566286295d0-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 5.29 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet 5.29 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">470,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25088/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/ac2fa71c8317fa80b6c33f35d0ac1683-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 3.134 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet 3.134 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">543,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-4carat/25148/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/ba044445792b4001d0473643075c8c7c-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 4.48 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet 4.48 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">258,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-5carat/25114/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/f1517cbda0710f7320acec8c0498d1fb-1-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt850 K18 diamond Bracelet 5 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt850 K18 diamond Bracelet 5 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">363,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-08carat/25133/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/1f0316c4c9d73ab899709dde55b81aab-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond Bracelet 0.85 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond Bracelet 0.85 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">313,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/bracelet/25104/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/ddc9da983dc27b73737e8886f3d12ebd-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm850 diamond Bracelet"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm850 diamond Bracelet</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">441,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-5carat/25135/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/a5f4a4a3014e58b0c2decd5ed20c4de7-300x300.webp"
											class="attachment-thumbnail size-thumbnail"
											alt="Pt･Pm850 diamond Bracelet bangle 5.00 ct" decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm850 diamond Bracelet bangle 5.00 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">286,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-10carat/25049/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/c2c4b281193055a9c2dc5e997b440362-1-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond Bracelet 10.52 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond Bracelet 10.52 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">671,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/bracelet/25117/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/672cac14d58a952c1ba49df15dd222c1-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet" decoding="async"
											loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond Bracelet</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">353,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="flex_annitation">
						※圖片僅供參考<br>
						※附有保證書及完整配件的產品鑽石收購參考價格表
					</div>

					<!-- <div class="btn__wrap btn__red"><a href="../daiya/result.html" class="gtm-list-result">查看鑽石參考收購價格表請點此</a>
					</div> -->
				</div>
				<div class="renew_2024_result_contentsbox">
					<div class="renew_2024_result_contentsbox_flex">
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-2carat/25039/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/fd818dd6f22b09f248ca991dd98e1f8f-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 2.18 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond brooch 2.18 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">209,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25031/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/b41350ace8209492b075c4cf7b72d914-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 2.05 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond brooch 2.05 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">265,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-brooch/25043/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/94102e05583b4c1d77d4d41b55bcafe2-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch" decoding="async"
											loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond brooch</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">196,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-brooch/25047/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/4fd501583effa092f8c496f7f84ca0cd-1-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch" decoding="async"
											loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond brooch</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">183,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25045/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/df4c68c6e996ce36c5bb65a08112cf11-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 3 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond brooch 3 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">191,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-3carat/25041/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/aa21bc1a6b34b677709687329b008c94-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt900 K14WG diamond brooch 3 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt900 K14WG diamond brooch 3 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">199,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-01carat/25023/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/85646796326ff0e1bf5466e1e457c20a-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 K18WG diamond brooch 0.171 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 K18WG diamond brooch 0.171 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">278,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap wd_long"><a href="/daiya/result/daiya/daiya-1carat/25029/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/c39bed3f70e373cc41ba4cc9425b3b50-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 1.33 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond brooch 1.33 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">206,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-1carat/25025/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/443950510d383275461a64262c74a98c-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 1.708 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond brooch 1.708 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">270,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-4carat/25018/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/d8b27c064d525351330b2972bb04d351-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 4.99 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18WG diamond brooch 4.99 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">404,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-2carat/25027/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/1321e1b44c713db4a8fe84d90d997001-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond brooch 2.98 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">Pt･Pm900 diamond brooch 2.98 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">232,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
						<div class="renew_2024_result_itembox_wrap"><a href="/daiya/result/daiya/daiya-5carat/25021/">
								<div class="renew_2024_result_itembox">
									<div class="renew_2024_result_item_image"><img width="300" height="300"
											src="../images/daiya/0286d9de92e1490064443403958c7cc3-300x300.webp"
											class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 5.4 ct"
											decoding="async" loading="lazy" sizes="100vw"></div>
									<div class="renew_2024_result_item_name">K18 diamond brooch 5.4 ct</div>
									<div class="renew_2024_result_item_kaitori">鑽石收購參考價格表</div>
									<div class="renew_2024_result_item_price">374,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="flex_annitation">
						※圖片僅供參考<br>
						※附有保證書及完整配件的產品鑽石收購參考價格表
					</div>
					<!-- <div class="btn__wrap btn__red"><a href="../daiya/result.html" class="gtm-list-result">查看鑽石參考收購價格表請點此</a></div> -->
				</div>
			</div>


			</div>
			<section>
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						鑽石參考價格
					</h2>
					<div class="titleMain--lead">
						<p>
						收購參考金額會依市場行情與時期變動，歡迎隨時洽詢。
						</p>
					</div>
				</div>
				<div class="flex flex--hasItem4">
					<!-- タブメニュー -->
					<ul class="flex__tab is-pc">
						<!-- タブ部分 -->
						<li class="tab__item active"><a>戒指</a></li>
						<li class="tab__item "><a>項鍊</a></li>
						<li class="tab__item "><a>手鐲</a></li>
						<li class="tab__item "><a>brooch</a></li>
					</ul>
					<!-- スライダー部分 -->
					<div class="flex__tabContents no_slider is-pc">
						<div class="flex__content active " style="align-items: stretch">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25196/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/171943538be9b67a3e95bc711cc8486e-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.109 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 3.109 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">968,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25202/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/4e6c6fbaed6c2eae401cc2bf9780c06a-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.381 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 2.381 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">797,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25198/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/e067b3f2e82b77781fff1280b851e264-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.081 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 2.081 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">902,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25193/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/ba3ba147e1e10201825cbf7ed29a2027-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.378 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 2.378 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,006,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25191/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/fc1b88445fdfed2b273060b1abb8a780-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.02 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 3.02 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,039,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25167/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/27b0e8037216bcbeecb235ed5c88282a-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond ring 2.027 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond ring 2.027 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,067,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25165/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/e5873ef7b27116ff2147fac0a8855aa4-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.014 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 3.014 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,133,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25163/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/35c50eeca24f55237026670b96a89506-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.587 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 3.587 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,138,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25161/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/da8fa4b2753b149e5662d9dda72976bb-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond ring 2.636 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond ring 2.636 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,490,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-5carat/25159/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/60fdf5d0f8ff8a5f1c109347692934f7-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 5.227 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 5.227 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,787,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25157/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/9e2d4f73e1d5b51f77554fd10544a2c5-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 2.038 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 2.038 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">2,722,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25155/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/78601aaaf41f819c9d8541725dcc8bdc-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond ring 3.041 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond ring 3.041 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">3,085,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								※圖片僅供參考<br>
								※附有保證書及完整配件的產品鑽石收購參考價格表
							</div>
						</div>
						<div class="flex__content  " style="align-items: stretch">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/26205/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/ae65a7f7eb26d47380d54fa69f44687e-300x300.jpg"
													class="attachment-thumbnail size-thumbnail" alt="diamond necklace 1carat Pt850・Pt900 combi"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">diamond necklace 1carat Pt850・Pt900 combi</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">47,300<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/26203/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/c4e08d8f36be3877e44fc641d6a7648d-300x300.jpg"
													class="attachment-thumbnail size-thumbnail" alt="diamond necklace 1carat pt850"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">diamond necklace 1carat pt850</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">49,500<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-04carat/26200/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/b8f9a66b7c1c0eaf3a43bd5dbb20d788-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="diamond necklace Pt・Pm850 0.449ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">diamond necklace Pt・Pm850 0.449ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">29,700<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/26178/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/99856989f40e8b5ee2e353374eafeee8-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="diamondnecklace 1.2carat"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">diamondnecklace 1.2carat</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">93,500<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25236/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/b8c211efa76fc22dc3cc0f32a8ff6bf9-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="diamond necklace 10.5 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">diamond necklace 10.5 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">858,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25234/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/042b8aef3c42fa8d689152c8e540b6ee-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm850 diamond necklace 10 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm850 diamond necklace 10 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">891,000<span>&yen;</span></p>
									</div>
								</li>
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-9carat/25232/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/9bb0dd2b83e15a6821b8c8b039e07836-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond necklace 9.77 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond necklace 9.77 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">869,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25230/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/749521b6c40a5dc258267feda0bd17cd-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond necklace 50.554 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond necklace 50.554 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">3,448,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25227/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/1bffa42f3c50b684bda418a2524eba53-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K14WG diamond necklace 12.89 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K14WG diamond necklace 12.89 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">886,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/25225/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/3d04d3d616ad869772fa4a41f5b33ab5-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm950 diamond necklace 1.15 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm950 diamond necklace 1.15 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,237,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25223/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/905423510ed336395bc889700fa304c4-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 3.22 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond necklace 3.22 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">962,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25204/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/28830920d24c470a67e4e8e9e169e075-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 11.56 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond necklace 11.56 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">996,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25195/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/b0502e2e155fdc41573e71404d3185af-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 2.259 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond necklace 2.259 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,056,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25181/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/8e8561b5e8f90315505686d38c99fb16-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt850・Pt900 diamond necklace 15 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt850・Pt900 diamond necklace 15 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,177,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/25061/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/4167e23364eb7df4a8f8b88a9b5fe4e0-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 1.57 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond necklace 1.57 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">1,655,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25057/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/4cedb8d9fb64e09f1efb16e549c7bd74-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond necklace 2.016 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond necklace 2.016 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">2,101,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								※圖片僅供參考<br>
								※附有保證書及完整配件的產品鑽石收購參考價格表
							</div>
						</div>
						<div class="flex__content  " style="align-items: stretch">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-4carat/25148/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/ba044445792b4001d0473643075c8c7c-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 4.48 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet 4.48 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">258,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-5carat/25135/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/a5f4a4a3014e58b0c2decd5ed20c4de7-300x300.webp"
													class="attachment-thumbnail size-thumbnail"
													alt="Pt･Pm850 diamond Bracelet bangle 5.00 ct" decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm850 diamond Bracelet bangle 5.00 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">286,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-08carat/25133/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/1f0316c4c9d73ab899709dde55b81aab-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond Bracelet 0.85 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond Bracelet 0.85 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">313,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/bracelet/25123/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/67db17377b3f5a80d5f285853711b688-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet" decoding="async"
													loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">325,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25121/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/8b866539057e26196caf7e304f67fee3-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 2.05 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet 2.05 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">326,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/bracelet/25119/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/5a0fa1c0cff0f36c526083ff2533fe7b-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="18KT diamond Bracelet"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">18KT diamond Bracelet</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">331,000<span>&yen;</span></p>
									</div>
								</li>
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/bracelet/25117/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/672cac14d58a952c1ba49df15dd222c1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet" decoding="async"
													loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">353,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-5carat/25114/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/f1517cbda0710f7320acec8c0498d1fb-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt850 K18 diamond Bracelet 5 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt850 K18 diamond Bracelet 5 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">363,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/bracelet/25104/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/ddc9da983dc27b73737e8886f3d12ebd-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm850 diamond Bracelet"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm850 diamond Bracelet</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">441,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-5carat/25090/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/29da05cd0e7a127f2e8c2566286295d0-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 5.29 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet 5.29 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">470,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25088/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/ac2fa71c8317fa80b6c33f35d0ac1683-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond Bracelet 3.134 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond Bracelet 3.134 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">543,000<span>&yen;</span></p>
									</div>
								</li>
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-10carat/25049/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/c2c4b281193055a9c2dc5e997b440362-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond Bracelet 10.52 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond Bracelet 10.52 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">671,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								※圖片僅供參考<br>
								※附有保證書及完整配件的產品鑽石收購參考價格表
							</div>
						</div>
						<div class="flex__content  " style="align-items: stretch">
							<div id="flex-slider" class="content__list flex--slide">
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25045/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/df4c68c6e996ce36c5bb65a08112cf11-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 3 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond brooch 3 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">191,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-brooch/25047/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/4fd501583effa092f8c496f7f84ca0cd-1-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch" decoding="async"
													loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond brooch</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">183,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-brooch/25043/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/94102e05583b4c1d77d4d41b55bcafe2-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch" decoding="async"
													loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond brooch</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">196,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-3carat/25041/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/aa21bc1a6b34b677709687329b008c94-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt900 K14WG diamond brooch 3 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt900 K14WG diamond brooch 3 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">199,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25039/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/fd818dd6f22b09f248ca991dd98e1f8f-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 2.18 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond brooch 2.18 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">209,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25031/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/b41350ace8209492b075c4cf7b72d914-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 2.05 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond brooch 2.05 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">265,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/25029/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/c39bed3f70e373cc41ba4cc9425b3b50-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 1.33 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond brooch 1.33 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">206,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-2carat/25027/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/1321e1b44c713db4a8fe84d90d997001-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="Pt･Pm900 diamond brooch 2.98 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">Pt･Pm900 diamond brooch 2.98 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">232,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-1carat/25025/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/443950510d383275461a64262c74a98c-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 1.708 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond brooch 1.708 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">270,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-01carat/25023/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/85646796326ff0e1bf5466e1e457c20a-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 K18WG diamond brooch 0.171 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 K18WG diamond brooch 0.171 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">278,000<span>&yen;</span></p>
									</div>
								</li>

								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-5carat/25021/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/0286d9de92e1490064443403958c7cc3-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18 diamond brooch 5.4 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18 diamond brooch 5.4 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">374,000<span>&yen;</span></p>
									</div>
								</li>
								<li class="content__item content_item_wrap align_items_stretch_parent">
									<a href="/daiya/result/daiya/daiya-4carat/25018/" class="img__link">
										<div class="content_image_wrap">
											<p class="content__image img">
											</p>
											<p class="content__image img"><img width="300" height="300"
													src="../images/daiya/d8b27c064d525351330b2972bb04d351-300x300.webp"
													class="attachment-thumbnail size-thumbnail" alt="K18WG diamond brooch 4.99 ct"
													decoding="async" loading="lazy" sizes="100vw"></p>
											<p></p>
											<p class="content--name">K18WG diamond brooch 4.99 ct</p>
										</div>

									</a>
									<div class="content__text">
										<p class="content--title">鑽石收購參考價格表</p>
										<p class="content--price">404,000<span>&yen;</span></p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								※圖片僅供參考<br>
								※附有保證書及完整配件的產品鑽石收購參考價格表
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- MOD_20240417 -->

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>
			<!-- MOD_20240417 -->
			<!--     ▼▼▼評価について2▼▼▼     -->

			<!-- MOD_20240417 -->
			<div class="is-pc">
				<section class="brandinfo_section">
					<div class="titleMain titleMain--wrapper">
						<h2 class="titleMain--main">
						購買和評估高價值鑽石的要點
						</h2>
						<div class="titleMain--lead">
							<p>
								許多人可能知道鑽石的價值是
由「克拉」決定的，但其實其他4C指標，如切工、
淨度和顏色也會影響其價值。
								<br><br>
								此外，品牌、設計、狀態和是否有附屬品等因素
也會影響價格。在OTAKARAYA，
我們不僅評估4C，還會充分考量這些附加價值，
為客人提供最高的收購金額。
							</p>
						</div>
					</div>

					<div class="brandinfo brandinfo_red_repeat is-pc">
						<div class="fshoplist-target__list brand_about_repeat_parent_wrap open is_table">
							<div class="fshoplist-target--ttl">
								<h3 class="titleSub">
								決定鑽石價值的因素
								</h3>
							</div>
							<div class="fshoplist-target--item ">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Carat</h4>
											<div class="points_content_text">
												<p>克拉是表示寶石重量的單位，1克拉（ct）相當於0.2克。特別是在鑽石領域，國內的鑑定機構所發行的鑑定書會精確標示至小數點後三位，而在一般交易中，通常標示至小數點後兩位。<br><br>

												隨著克拉數的增加，寶石的稀有價值也會提高，
價格因此急劇上升。
即使是相同品質的鑽石，當克拉數增加至原本的兩倍時，
價格並不一定只是單純的兩倍。
特別是在 0.5 克拉或 1.0 克拉等整數區間的尺寸時，
價格往往會大幅上升。
在理想的圓形明亮式切工（Round Brilliant Cut）中，
克拉數與尺寸之間的關係如下：0.1 克拉的鑽石直徑約為 3.0mm，
0.5 克拉約為 5.2mm，
而 1.0 克拉則約為 6.5mm。												</p>
												<div class="horizonlist--captionImg">
													<img src="../images/daiya/2024_diamond_carat_translation.webp" alt="Carat">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="fshoplist-target--item ">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Cut</h4>
											<div class="points_content_text">
												<p>切工（Cut）是鑽石能夠最大程度展現璀璨光芒的關鍵因素。
經過優秀切工的鑽石能夠有效地反射光線，
展現出耀眼的光輝。
鑽石的切工評級分為 「Excellent（極優）」至「Poor（較差）」
五個等級。<br><br>

切工的評估主要分為兩個部分：
「比例（Proportion）」與「修飾度（Finish）」。「比例」是指圓形明亮式切工（Round Brilliant Cut）中，各個切面的大小、比例與角度是否符合理想標準。這種切工有一種能夠最大化光線折射與反射的「理想比例」，鑽石的切工等級便是根據其與理想形狀的接近程度，分為五個等級進行評估。


這兩個要素也各自被評為五個等級。<br><br>

修飾度（Finish）：「修飾度」進一步細分為拋光（Polish） 和
對稱性（Symmetry）。
拋光（Polish）：指鑽石表面的打磨
程度，影響光線的反射與透射效果。
對稱性（Symmetry）：指各個切面的位置與對稱度，影響鑽石的整體均衡與光學效果。
這兩個要素也各自被評為五個等級。<br><br>

因此，鑽石的切工評價是根據「比例（Proportion）」、
「拋光（Polish）」、「對稱性（Symmetry）」這三個項目
來進行評定。
如果一顆鑽石在這三個項目中都獲得最高等級的「Excellent」，
則被稱為「3EX（Triple Excellent，三重完美）」，
代表其擁有頂級切工品質。
此外，符合特定條件的鑽石可能會呈現出心形與箭矢圖案
（Heart & Cupid, H&C），
這種特徵進一步證明其擁有卓越的對稱性與光學效果。<br><br>

擁有「3EX」或「哈特＆丘比特（H&C）」特徵的鑽石，
其璀璨光輝可用肉眼清晰可見，
被評為最高級的切工，並在市場上享有極高的評價。</p>
												<div class="horizonlist--captionImg">
													<!-- <span>02</span> -->
													<img src="../images/daiya/2024_diamond_cut.webp" alt="Cut">
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="fshoplist-target--item ">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">

										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">擇淨度</h4>
											<div class="points_content_text">
												<p>鑽石通常含有微小的內部包裹體（Inclusion）或表面特徵
（Blemish）。這些內部包裹體與表面特徵的程度被用來評估淨度
（Clarity），並由經驗豐富的鑑定師使用 10 倍放大鏡進行檢查，
根據其可見程度將鑽石的淨度分為 11 個等級。<br><br>

淨度（Clarity）**的評級從最高的「FL（Flawless，無瑕級）」到
最低的「I3（Included 3，內含物明顯級）」，具體分級如下：<br><br>

FL（無瑕）：即使由經驗豐富的鑑定師在 10 倍放大鏡下觀察，也看不到內含物或表面瑕疵。<br>
IF（內部無瑕）：10 倍放大鏡下看不到內含物，只能看到輕微的表面瑕疵。<br>
VVS1/VVS2（極輕微內含物）：在 10 倍放大鏡下很難找到內含物。<br>
VS1/VS2（輕微內含物）：在 10 倍放大鏡下可以看到輕微內含物。<br>
SI1/SI2（微內含物）：10 倍放大鏡下可清晰看到內含物。<br>
I1/I2/I3（有明顯內含物）：在10倍放大鏡下或用肉眼可以看到內含物，這大大影響了鑽石的淨度。<br><br>

淨度評估不僅取決於內含物的大小，還要綜合考慮「數量、位置、種類、可見度、顏色」等諸多因素從而決定。</p>
												<div class="horizonlist--captionImg">
													<!-- <span>03</span> -->
													<img src="../images/daiya/2024_diamond_clarity.webp"
														alt="Clarity">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item ">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Color</h4>
											<div class="points_content_text">
												<p>鑽石的顏色（Color）評級範圍從 D 到 Z，按照顏色的深淺程度進
行分類。D 色級代表完全無色，是最高等級，最為稀有且價值最
高。隨著顏色等級向 Z 發展，黃色或棕色調會變得更加明顯，整
體價值也相對降低。<br><br>

4C 中的顏色（Color）評級主要適用於黃調至棕調的鑽石。若鑽石
呈現粉紅、藍色等其他顏色，則被歸類為「彩色鑽石（Fancy
Color Diamond）」，其品質不再依照 4C 標準評估，而是依照不
同的標準來衡量價值與稀有性。此外，當鑽石的顏色超過 Z 級，
即顏色變得更加濃烈時，該鑽石也會被視為彩色鑽石（Fancy
Color Diamond），不再適用於傳統的 D-Z 顏色分級體系，而是根
據顏色的濃度與飽和度來進行評估。<br><br>

一般而言，帶有黃色或棕色調的鑽石通常被認為價值較低。然
而，當顏色達到足以被歸類為彩色鑽石（Fancy Color Diamond）
的程度時，因其稀有性反而會受到高度評價。因此，顏色超過 Z
級的黃鑽（即彩黃鑽）通常比 D 色級的無色鑽石更為稀有，並且
市場價格往往更高。這是因為濃艷的彩黃鑽屬於珍稀的「彩鑽
（Fancy Diamond）」，其價值不再依據傳統 4C 標準，而是取決
於顏色的濃度、飽和度與稀有性。<br><br>

此外，你可能聽說過鑽石的「螢光反應（Fluorescence）」會影響顏色評級，
但實際上，這種影響幾乎可以忽略不計。
螢光性是指鑽石在紫外線（UV）照射下發出的藍白色光芒。由於
4C 顏色評級主要針對黃調色階，當鑽石帶有藍色螢光時，可能會
在某些光線環境下視覺上略微降低黃色調，但這種影響通常不會
顯著改變顏色評級。
只有在螢光反應極強的情況下，才可能導致鑽石的外觀變得霧濛
或帶有乳白色調，進而影響市場評價。但在大多數情況下，螢光
性對於鑽石的顏色評級影響極小，不會成為決定性因素。
												</p>
												<div class="horizonlist--captionImg">
													<!-- <span>04</span> -->
													<img src="../images/daiya/2024_diamond_color.webp" alt="Color">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="fshoplist-target__list brand_about_repeat_parent_wrap open">
							<div class="fshoplist-target--ttl">
								<h3 class="titleSub">鑽石的評價標準是什麼？</h3>
								<div class="high_price_purchase_points_content_lead"></div>
							</div>
							<div class="fshoplist-target--item
								existence_img">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">

										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">
											關於鑽石的品質評價
											</h4>
											<p class="points_content_text">
											鑽石的評估有一套標準，主要依據 克拉（Carat，重量）、
切工（Cut，研磨技術）、淨度（Clarity）、顏色（Color） 這四個
項目來判斷品質，這也被稱為 4C 標準。其中，「切工（Cut）」
是唯一由人為技術決定的因素，直接影響鑽石的光芒與火彩。切
工的優劣決定了光線在鑽石內部的折射與反射，因此是評估鑽石
價值時極為重要的標準。
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item existence_img">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">

										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">
											關於鑽石的加工處理
											</h4>
											<p class="points_content_text">
											鑽石基本上不會經過除切工與拋光之外的人工處理。然而，也有一些鑽石經過處理以改善淨度或顏色。
在OTAKARAYA，我們致力於對您的物品進行最大程度的評估，因
此，即使您有所疑慮，也請放心帶來讓我們鑑定。
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item existence_img">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">
											關於鑽石的產地
											</h4>
											<p class="points_content_text">
											鑽石的開採國遍布世界各地，代表性的國家包括俄羅斯、博茨瓦納、加拿大等。
												鑽石的價值和品質通常不會因產地而有所不同。
然而，來自博茨瓦納的朱瓦能礦山所開採的鑽石，被認為是最高
品質之一。此外，截至2023年，全球僅有10家公司從事鑽石開採業務。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="fshoplist-target__list brand_about_repeat_parent_wrap open">
							<div class="fshoplist-target--ttl">
								<h3 class="titleSub">
								關於收購評價較高的鑽石顏色
								</h3>
								<div class="high_price_purchase_points_content_lead"></div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>01</span>
											<img src="../images/daiya/0179640947107c8ce4ea929f8fabf164.webp"
												alt="Colorless Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">無色鑽石</h4>
											<p class="points_content_text">鑽石的品質由 4C 評估，尺寸越大、越透明且純淨，其價值越高。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>02</span>
											<img src="../images/daiya/765829cc287d1ac17677d3b4bead81e6.webp"
												alt="Red Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">紅鑽（Red Diamond）</h4>
											<p class="points_content_text">在彩鑽中是最具稀有價值的種類。其色調也有等級區分，價值依
次為：「Fancy Red」、「Fancy Purplish Red」、「Fancy Orangy
Red」。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>03</span>
											<img src="../images/daiya/cccd2bc758949f98d64a7d337d76ec6a.webp"
												alt="Blue Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">藍鑽（Blue Diamond</h4>
											<p class="points_content_text">
											僅次於紅鑽，具有極高的評價，偶爾可在南非的普雷米爾礦山開
											採到。理想的藍鑽應具有濃郁的色調，且不帶灰色調。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>04</span>
											<img src="../images/daiya/a1d4aefe9a3a9eb13922078d8726347b.webp"
												alt="Green Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">綠鑽（Green Diamond）</h4>
											<p class="points_content_text">極為罕見，具有極高的稀有價值。其中，色彩飽和度較高的
「Fancy Intense Green」和「Fancy Vivid Green」在市場上交易價
格極高。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>05</span>
											<img src="../images/daiya/dfd4f792d6329e44ef3f282e136cc0fa.webp"
												alt="紫鑽（Purple Diamond）">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">紫鑽（Purple Diamond）</h4>
											<p class="points_content_text">
											紫色的鑽石，顏色範圍從淡紫到深紫不等。顏色越深、越鮮明，其價值越高。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>06</span>
											<img src="../images/daiya/58a97c8b6893da89264e714f7a43b3ea.webp"
												alt="粉紅鑽">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">粉紅鑽</h4>
											<p class="points_content_text">由於供應量極其稀少，粉紅鑽被評為最具價值的彩鑽之一。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>07</span>
											<img src="../images/daiya/857520b29ac66eab447eba193215d84e.webp"
												alt="橙鑽">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">橙鑽</h4>
											<p class="points_content_text">橙色鑽石極為罕見，相較於一般彩鑽，擁有更高的市場評價與價值。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>08</span>
											<img src="../images/daiya/bddb718ade6b729a59cc1c6244e39317.webp"
												alt="黃鑽">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">黃鑽</h4>
											<p class="points_content_text">黃鑽的產量相對較多，但不帶橙色調、且顏色接近金絲雀黃或檸檬黃的鑽石，價值更高。</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>09</span>
											<img src="../images/daiya/c5c61e747e7ee3d7e6559b96051f425f.webp"
												alt="棕鑽">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">棕鑽</h4>
											<p class="points_content_text">
											棕色鑽石的色調與飽和度多樣，例如紅棕色或黃棕色。由於產量較多，廣泛應用於各類珠寶設計，回收價格因設計不同而有所差異。											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="fshoplist-target--item">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--img">
											<span>10</span>
											<img src="../images/daiya/532ae322efb836b3bb2878eec8606009.webp"
												alt="黑鑽">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">黑鑽</h4>
											<p class="points_content_text">黑鑽的內部富含赤鐵礦或石墨，天然黑鑽極為稀有。其漆黑色澤越深邃，價值越高。</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="is-sp">
				<div class="renew_2024_top_pont_superbox">
					<img class="renew_2024_top_pont_title_icon"
						src="../images/daiya/point_image_202404.png">
					<div class="renew_2024_top_pont_titlebox">
						<h2 class="renew_2024_top_pont_title">
						鑽石的高價收購・鑑定要點
						</h2>
						<div class="renew_2024_top_pont_story">
						許多人可能知道鑽石的價值是
由「克拉」決定的，但其實其他4C指標，如切工、
淨度和顏色也會影響其價值。						</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>決定鑽石價值的因素</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp">
						<h4 class="renew_2024_top_point_item_h4"><span>01</span>Carat</h4>
						<div class="renew_2024_top_point_item_story">
							克拉是表示寶石重量的單位，1克拉（ct）相當於0.2克。特別是在鑽石領域，國內的鑑定機構所發行的鑑定書會精確標示至小數點後三位，而在一般交易中，通常標示至小數點後兩位。<br><br>

							隨著克拉數的增加，寶石的稀有價值也會提高，
價格因此急劇上升。
即使是相同品質的鑽石，當克拉數增加至原本的兩倍時，
價格並不一定只是單純的兩倍。
特別是在 0.5 克拉或 1.0 克拉等整數區間的尺寸時，
價格往往會大幅上升。<br><br>

在理想的圓形明亮式切工（Round Brilliant Cut）中，
克拉數與尺寸之間的關係如下：0.1 克拉的鑽石直徑約為 3.0mm，
0.5 克拉約為 5.2mm，
而 1.0 克拉則約為 6.5mm。
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_carat_translation.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>02</span>Cut</h4>
						<div class="renew_2024_top_point_item_story">
							切工（Cut）是鑽石能夠最大程度展現璀璨光芒的關鍵因素。
經過優秀切工的鑽石能夠有效地反射光線，
展現出耀眼的光輝。
鑽石的切工評級分為 「Excellent（極優）」至「Poor（較差）」
五個等級。<br><br>

							切工的評估主要分為兩個部分：
「比例（Proportion）」與「修飾度（Finish）」。「比例」是指圓形明亮式切工（Round Brilliant Cut）中，各個切面的大小、比例與角度是否符合理想標準。這種切工有一種能夠最大化光線折射與反射的「理想比例」，鑽石的切工等級便是根據其與理想形狀的接近程度，分為五個等級進行評估。


這兩個要素也各自被評為五個等級<br><br>

							修飾度（Finish）：「修飾度」進一步細分為拋光（Polish） 和
對稱性（Symmetry）。
拋光（Polish）：指鑽石表面的打磨
程度，影響光線的反射與透射效果。
對稱性（Symmetry）：指各個切面的位置與對稱度，影響鑽石的整體均衡與光學效果。
這兩個要素也各自被評為五個等級。<br><br>

							因此，鑽石的切工評價是根據「比例（Proportion）」、
「拋光（Polish）」、「對稱性（Symmetry）」這三個項目
來進行評定。
如果一顆鑽石在這三個項目中都獲得最高等級的「Excellent」，
則被稱為「3EX（Triple Excellent，三重完美）」，
代表其擁有頂級切工品質。
此外，符合特定條件的鑽石可能會呈現出心形與箭矢圖案
（Heart & Cupid, H&C），
這種特徵進一步證明其擁有卓越的對稱性與光學效果。<br><br>

擁有「3EX」或「哈特＆丘比特（H&C）」特徵的鑽石，
其璀璨光輝可用肉眼清晰可見，
被評為最高級的切工，並在市場上享有極高的評價。
							<div class="point_item_captionImg"><img
									class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_cut.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>03</span>Clarity</h4>
						<div class="renew_2024_top_point_item_story">
						鑽石通常含有微小的內部包裹體（Inclusion）或表面特徵
（Blemish）。這些內部包裹體與表面特徵的程度被用來評估淨度
（Clarity），並由經驗豐富的鑑定師使用 10 倍放大鏡進行檢查，
根據其可見程度將鑽石的淨度分為 11 個等級。<br><br>

淨度（Clarity）**的評級從最高的「FL（Flawless，無瑕級）」到
最低的「I3（Included 3，內含物明顯級）」，具體分級如下：<br><br>

FL（無瑕）：即使由經驗豐富的鑑定師在 10 倍放大鏡下觀察，也看不到內含物或表面瑕疵。<br>
IF（內部無瑕）：10 倍放大鏡下看不到內含物，只能看到輕微的表面瑕疵。<br>
VVS1/VVS2（極輕微內含物）：在 10 倍放大鏡下很難找到內含物。<br>
VS1/VS2（輕微內含物）：在 10 倍放大鏡下可以看到輕微內含物。<br>
SI1/SI2（微內含物）：10 倍放大鏡下可清晰看到內含物。<br>
I1/I2/I3（有明顯內含物）：在10倍放大鏡下或用肉眼可以看到內含物，這大大影響了鑽石的淨度。<br><br>

淨度評估不僅取決於內含物的大小，還要綜合考慮「數量、位置、種類、可見度、顏色」等諸多因素從而決定。
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_clarity.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>04</span>Color</h4>
						<div class="renew_2024_top_point_item_story">
						鑽石的顏色（Color）評級範圍從 D 到 Z，按照顏色的深淺程度進
行分類。D 色級代表完全無色，是最高等級，最為稀有且價值最
高。隨著顏色等級向 Z 發展，黃色或棕色調會變得更加明顯，整
體價值也相對降低。<br><br>

4C 中的顏色（Color）評級主要適用於黃調至棕調的鑽石。若鑽石
呈現粉紅、藍色等其他顏色，則被歸類為「彩色鑽石（Fancy
Color Diamond）」，其品質不再依照 4C 標準評估，而是依照不
同的標準來衡量價值與稀有性。此外，當鑽石的顏色超過 Z 級，
即顏色變得更加濃烈時，該鑽石也會被視為彩色鑽石（Fancy
Color Diamond），不再適用於傳統的 D-Z 顏色分級體系，而是根
據顏色的濃度與飽和度來進行評估。<br><br>

一般而言，帶有黃色或棕色調的鑽石通常被認為價值較低。然
而，當顏色達到足以被歸類為彩色鑽石（Fancy Color Diamond）
的程度時，因其稀有性反而會受到高度評價。因此，顏色超過 Z
級的黃鑽（即彩黃鑽）通常比 D 色級的無色鑽石更為稀有，並且
市場價格往往更高。這是因為濃艷的彩黃鑽屬於珍稀的「彩鑽
（Fancy Diamond）」，其價值不再依據傳統 4C 標準，而是取決
於顏色的濃度、飽和度與稀有性。<br><br>

此外，你可能聽說過鑽石的「螢光反應（Fluorescence）」會影響顏色評級，
但實際上，這種影響幾乎可以忽略不計。
螢光性是指鑽石在紫外線（UV）照射下發出的藍白色光芒。由於
4C 顏色評級主要針對黃調色階，當鑽石帶有藍色螢光時，可能會
在某些光線環境下視覺上略微降低黃色調，但這種影響通常不會
顯著改變顏色評級。
只有在螢光反應極強的情況下，才可能導致鑽石的外觀變得霧濛
或帶有乳白色調，進而影響市場評價。但在大多數情況下，螢光
性對於鑽石的顏色評級影響極小，不會成為決定性因素。
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_color.webp" alt=""></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>鑽石的評價標準是什麼？</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp">
						<h4 class="renew_2024_top_point_item_h4">關於鑽石的品質評價</h4>
						<div class="renew_2024_top_point_item_story">
							鑽石的評估有一套標準，主要依據 克拉（Carat，重量）、
切工（Cut，研磨技術）、淨度（Clarity）、顏色（Color） 這四個
項目來判斷品質，這也被稱為 4C 標準。其中，「切工（Cut）」
是唯一由人為技術決定的因素，直接影響鑽石的光芒與火彩。切
工的優劣決定了光線在鑽石內部的折射與反射，因此是評估鑽石
價值時極為重要的標準。
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4">關於鑽石的加工處理</h4>
						<div class="renew_2024_top_point_item_story">鑽石基本上不會經過除切工與拋光之外的人工處理。然而，也有一些鑽石經過處理以改善淨度或顏色。
在OTAKARAYA，我們致力於對您的物品進行最大程度的評估，因
此，即使您有所疑慮，也請放心帶來讓我們鑑定。
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4">關於鑽石的產地.</h4>
						<div class="renew_2024_top_point_item_story">
							鑽石的開採國遍布世界各地，代表性的國家包括俄羅斯、博茨瓦納、加拿大等。鑽石的價值和品質通常不會因產地而有所不同。
然而，來自博茨瓦納的朱瓦能礦山所開採的鑽石，被認為是最高
品質之一。此外，截至2023年，全球僅有10家公司從事鑽石開採業務。
						</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>關於收購評價較高的鑽石顏色</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp">
						<img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/0179640947107c8ce4ea929f8fabf164.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>01</span>無色鑽石</h4>
						<div class="renew_2024_top_point_item_story">鑽石的品質由 4C 評估，尺寸越大、越透明且純淨，其價值越高。</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/765829cc287d1ac17677d3b4bead81e6.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>02</span>紅鑽</h4>
						<div class="renew_2024_top_point_item_story">在彩鑽中是最具稀有價值的種類。其色調也有等級區分，價值依
次為：「Fancy Red」、「Fancy Purplish Red」、「Fancy Orangy
Red」。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/cccd2bc758949f98d64a7d337d76ec6a.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>03</span>藍鑽</h4>
						<div class="renew_2024_top_point_item_story">僅次於紅鑽，具有極高的評價，偶爾可在南非的普雷米爾礦山開
						採到。理想的藍鑽應具有濃郁的色調，且不帶灰色調。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/a1d4aefe9a3a9eb13922078d8726347b.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>04</span>綠鑽</h4>
						<div class="renew_2024_top_point_item_story">極為罕見，具有極高的稀有價值。其中，色彩飽和度較高的
「Fancy Intense Green」和「Fancy Vivid Green」在市場上交易價
格極高。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/dfd4f792d6329e44ef3f282e136cc0fa.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>05</span>紫鑽</h4>
						<div class="renew_2024_top_point_item_story">紫色的鑽石，顏色範圍從淡紫到深紫不等。顏色越深、越鮮明，其價值越高。
						</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/58a97c8b6893da89264e714f7a43b3ea.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>06</span>粉紅鑽</h4>
						<div class="renew_2024_top_point_item_story">由於供應量極其稀少，粉紅鑽被評為最具價值的彩鑽之一。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/857520b29ac66eab447eba193215d84e.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>07</span>橙鑽</h4>
						<div class="renew_2024_top_point_item_story">橙色鑽石極為罕見，相較於一般彩鑽，擁有更高的市場評價與價值。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/bddb718ade6b729a59cc1c6244e39317.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>08</span>黃鑽</h4>
						<div class="renew_2024_top_point_item_story">黃鑽的產量相對較多，但不帶橙色調、且顏色接近金絲雀黃或檸檬黃的鑽石，價值更高。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/c5c61e747e7ee3d7e6559b96051f425f.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>09</span>棕鑽</h4>
						<div class="renew_2024_top_point_item_story">
						棕色鑽石的色調與飽和度多樣，例如紅棕色或黃棕色。由於產量較多，廣泛應用於各類珠寶設計，回收價格因設計不同而有所差異。</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/532ae322efb836b3bb2878eec8606009.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>10</span>黑鑽</h4>
						<div class="renew_2024_top_point_item_story">
						黑鑽的內部富含赤鐵礦或石墨，天然黑鑽極為稀有。其漆黑色澤越深邃，價值越高。</div>
					</div>
				</div> <!-- renew_2024_top_pont_superbox -->
			</div>
			<!-- ▼▼▼変形ダイヤ説明▼▼▼ -->
			<section></section>
			<section class="transformation_description_section">
				<div class="titleMain--wrapper">
					<h2 class="titleMain--main">
					什麼是變形鑽石？
					</h2>
					<div class="titleMain--lead">
						<p>「變形鑽石」是指除了圓形明亮式切工（Round Brilliant Cut），
						即圓形（正圓）以外形狀的鑽石的統稱。雖然圓形明亮式切工是最經典的切割方式，但還有許多不同形狀
						的變形鑽石（Fancy Shape），以下是其中的一部分介紹。</p>
					</div>
				</div>
				<div class="transformation_description_content_wrap">
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">1</span> -->
										<span class="transformation_description_content_text">祖母綠切割</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img1@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img1@4x.webp" alt="">
									<p>
									從上面看呈現正方形或長方形，從側面看呈階梯形狀，可以充分
享受鑽石原來的透明度和閃爍。切割面極少，奢華的寬檯面加
工，突顯出鑽石原本的淨度。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">2</span> -->
										<span class="transformation_description_content_text">橢圓形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img2@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img2@4x.webp" alt="">
									<p>
									將鑽石加工成橢圓形，擁有 57～58 個切面，與圓形切工相近，
因此能展現出類似的光彩與厚重感。橢圓形的長寬比例不同，會
帶來不同的視覺效果，適用於戒指等各種珠寶設計。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">3</span> -->
										<span class="transformation_description_content_text">三角形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img3@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img3@4x.webp" alt="">
									<p>
									非圓形或方形，而是三角形切工。標準切面數為 43 面，擁有獨
特的光芒。此切工有等邊型與帶圓角或尖角的變體，呈現強烈的
幾何閃耀效果。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">4</span> -->
										<span class="transformation_description_content_text">心形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img4@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img4@4x.webp" alt="">
									<p>
									以心形為輪廓的切工，屬於圓形明亮式切工的變形款。標準比例
應讓心形完整地落於正方形內，過寬或過長的心形可能被視為特
殊形狀。由於心形輪廓需要手工精細打磨，因此切割技術對其美
感影響極大。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">5</span> -->
										<span class="transformation_description_content_text">公主方形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img5@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img5@4x.webp" alt="">
									<p>
									結合明亮式切工（Brilliant Cut）與階梯式切工（Step Cut）的混合
切工，呈現閃耀的方形鑽石。其桌面較大，相較於圓形切工，原
石的切割損耗較少，因此能製作出較大顆的成品。然而，由於邊
角較脆弱，佩戴時需特別注意避免碰撞。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">6</span> -->
										<span class="transformation_description_content_text">梨形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img6@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img6@4x.webp" alt="">
									<p>
									形狀如同洋梨，又稱淚滴形（Teardrop），是圓形明亮式切工的
變形款，擁有 58 個切面。其獨特的形狀使其在戒指與吊墜設計
中極具吸引力。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">7</span> -->
										<span class="transformation_description_content_text">雷地恩切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img7@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img7@4x.webp" alt="">
									<p>
									形狀為正方形或長方形，結合了明亮式切工與祖母綠切工
（Emerald Cut）的特色。此切工由亨利·格羅斯·巴德（Henry
Grossbard）於 1977 年開發，與公主方形切工類似，但其刻面
排列方式不同，亦常用於彩色寶石的切割。									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">8</span> -->
										<span class="transformation_description_content_text">馬眼形切工</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img8@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img8@4x.webp" alt="">
									<p>
									呈細長的橢圓形，兩端收窄成尖形，也被稱為「舟形切工」。屬
於明亮式切工的一種，標準為 58 面，但部分版本僅有 18 面。其
名稱「Marquise」來自於侯爵（Marquis），據說此形狀的鑽石最
初受到法國國王路易十五寵妾龐巴度夫人（Madame de
Pompadour）的啟發，因此得名。									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section></section><!-- MOD_20240417 -->
			<section class="certificate is-pc">
				<div class="titleMain titleMain--wrapper titleMain--mtPc128 titleMain--mtSp32">
					<h2 class="titleMain--main">
					鑽石回收就選OTAKARAYA
					</h2>
				</div>
				<section>
					<h3 class="titleSub">擁有 GG 資格 的專業鑑定師在職</h3>
					<p style="text-align: center;">
					GG（Graduate Gemologist） 資格是由 GIA
（Gemological Institute of America，美國寶石研究院） 授予的全
球權威寶石鑑定師資格，獲得者被稱為「寶石學修了者」。OTAKARAYA擁有 GG 資格 的專業鑑定師，並透過培訓制度定期進
行鑑定師教育。因此，能夠對各類寶石進行高精度、高水準的專業鑑定，確保評
估的準確性與公正性。
					</p>

					<div class="colBox colBox__col01">
						<div class="col" style="display: flex; justify-content: space-between;">
							<div class="img gg_holder_profile">
								<img src="../images/daiya/568433d3328efc80e6346b56a8db47df.webp" alt="岩松利香のプロフィール">
							</div>
							<div class="gg_profile">
								<h4 class="titleSub" style="color:black;">岩松 利香</h4>
								<div class="profile">
									<nobr>
										<p class="profile1">Profile</p>
									</nobr>
									<p class="profile2">：<span>就職於鑑別機構，從事鑽石分級與寶石鑑別業務近 30 年。</span></p>
								</div>
								<p><span>保持資格</span>：<span>GG（1994 年 5 月取得）</span>
								</p>
								<p><span>出身地</span>： 東京</p>
								<p><span>興趣</span>：旅行</p>
							</div>
						</div>
					</div>
					<div class="colBox colBox__col01">
						<div class="col">
							<div class="img">
								<img class="custom-popup-img"
									src="../images/daiya/e3eeb8346efbe5cff2b0ba7d1f7c1987.webp" alt=GGの証明書>
							</div>
						</div>
					</div>

				</section>


				<!-- appraisal_equips -->
				<section class="appraisal_equips">
					<h3 class="titleSub">OTAKARAYA的最新鑑定設備</h3>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/8429090fa4171a8ce59873218128502a.webp"
								alt="紫外可視近紅外分光光度計"></div>
						<div class="equip_meta">
							<p class="equip_title">紫外可視近紅外分光光度計</p>
							<p class="equip_explain">
							當光（可見光）穿透物質時，部分波長的光會被吸收。紫外可視
近紅外分光光度計擅長分析這些吸收光的波長。OTAKARAYA
使用此設備來檢測鑽石的處理技術與金色系白蝶珍珠的處理，以
精確評估寶石的價值。							</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/3b83232250cb59ab1761d1e66521fde9.webp"
								alt="傅立葉變換紅外分光光度計（FTIR）"></div>
						<div class="equip_meta">
							<p class="equip_title">傅立葉變換紅外分光光度計（FTIR）</p>
							<p class="equip_explain">
							傅立葉變換紅外分光光度計是一種高精密分析儀器，透過照射紅
外光並測量透過或反射的光來分析樣品。「おたからや」使用此
設備進行翡翠的樹脂充填處理檢測及鑽石的特定鑑定，提供多方
面的專業檢測服務。							</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/0609b87cd0ef7ac42d7e05f14aa2451f.webp"
								alt="I 型・II 型鑑定器"></div>
						<div class="equip_meta">
							<p class="equip_title">I 型・II 型鑑定器</p>
							<p class="equip_explain">
							將樣品放入鑑定器內，透過紫外線照射並測量透過率來判定鑽石
的類型。僅需 1 秒即可區分I 型（天然鑽石）與 II 型（高溫高
壓處理鑽石・合成鑽石）。此設備不僅能測試裸石，還可檢測鑲
嵌狀態的鑽石，無需拆除鑲座即可測定，確保在不損傷物品的情
況下，提供快速且精準的鑑定。								在測試前需先清潔寶石表面，然後將測試探針接觸樣品。此設備
透過測量電導率來判斷寶石是否為鑽石或莫桑石
（Moissanite）。與 I 型・II 型鑑定器相同，此設備能夠瞬間且準
確地鑑定，確保高效且精確的評估結果。</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/5592cdbaa593d89e3ab7da0e4768e03f.webp"
								alt="Moissanite Determiner"></div>
						<div class="equip_meta">
							<p class="equip_title">莫桑石鑑定器</p>
							<p class="equip_explain">在測試前需先清潔寶石表面，然後將測試探針接觸樣品。此設備
透過測量電導率來判斷寶石是否為鑽石或莫桑石
（Moissanite）。與 I 型・II 型鑑定器相同，此設備能夠瞬間且準
確地鑑定，確保高效且精確的評估結果。</p>
						</div>
					</div>
				</section>
				<!-- appraisal_equips -->


				<section>
					<h3 class="titleSub">評估設計與品牌價值</h3>
					<p style="text-align: center;">
					在 おたからや，我們不僅評估寶石本身的價值，還會考慮品牌價
					值與設計，綜合判斷後提供最適當的估價。<br><br>
					我們確保即使是小寶石也經過徹底評估，並且無論物品是否有配件或盒子，我們都可以提供購買。
					</p>
				</section>
				<section>
					<h3 class="titleSub">購買所有費用均免費</h3>
					<p style="text-align: center;">
					所有費用如鑑定費、上門出差費等都是全免的，您無需支付任何手續費用。
					我們透過多種方式進行採購，包括上門、店內和線上評估收購。
					</p>
				</section>
				<section>
					<h3 class="titleSub">全國約 1,300 家門店的強大網絡</h3>
					<p style="text-align: center;">
					A在全國擁有超過1300家門市，是門市數量最多的代購店。<br>如果您將商品帶到附近的 Otakaraya 商店，您可以立即收到現金付款。<br><br>
					此外，Otakaraya 擁有與全球 44 個國家進行交易的成功經驗，不僅與個人，還與公司和企業進行大規模交易。
					</p>
				</section>
			</section>
			<section class="renew_2024_top_gg_profile_section is-sp" style="margin-top:0px !important;">
				<!-- MOD_20240417 -->
				<div class="renew_2024_dia_titlebox">
					<h2 class="renew_2024_dia_title_h2">
						<img class="renew_2024_dia_title_l_leaf"
							src="../images/daiya/dialeaf_l_202404.png">
						<img class="renew_2024_dia_title_r_leaf"
							src="../images/daiya/dialeaf_r_202404.png">
						<p>
						鑽石回收就選OTAKARAYA
						</p>
					</h2>
					<h3 class="renew_2024_dia_title_subtitle_h3">
						擁有 GG 資格 的專業鑑定師在職
					</h3>
				</div>
				<!-- MOD_20240417 -->
				<div class="renew_2024_top_gg_desc">
				GG（Graduate Gemologist） 資格是由 GIA
（Gemological Institute of America，美國寶石研究院） 授予的全
球權威寶石鑑定師資格，獲得者被稱為「寶石學修了者」。
				</div>
				<img class="renew_2024_top_gg_photo" src="../images/daiya/photo_iwamatsu_202404_en.webp" alt="岩松 ">
				<div class="renew_2024_top_gg_profile_superbox">
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
						岩松 利香
						</div>
						<div class="renew_2024_top_gg_profile_right">
						就職於鑑別機構，從事鑽石分級與寶石鑑別業務近 30 年。
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
						保持資格
						</div>
						<div class="renew_2024_top_gg_profile_right">
						GG（1994 年 5 月取得）
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
						出身地
						</div>
						<div class="renew_2024_top_gg_profile_right">
						東京
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
						興趣
						</div>
						<div class="renew_2024_top_gg_profile_right">
						旅行
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_itembox">
						<img class="renew_2024_top_gg_profile_gg_certificate_img"
							src="../images/daiya/e3eeb8346efbe5cff2b0ba7d1f7c1987.webp" alt="GGの証明書">
					</div>
					<div class="renew_2024_top_gg_profile_itembox">
						<!-- appraisal_equips -->
						<section class="appraisal_equips">
							<h3 class="renew_2024_top_point_item_h4">
							OTAKARAYA的最新鑑定設備 </h3>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/8429090fa4171a8ce59873218128502a.webp"
										alt="紫外可視近紅外分光光度計"></div>
								<div class="equip_meta">
									<p class="equip_title">紫外可視近紅外分光光度計</p>
									<p class="equip_explain">
									當光（可見光）穿透物質時，部分波長的光會被吸收。紫外可視
近紅外分光光度計擅長分析這些吸收光的波長。OTAKARAYA
使用此設備來檢測鑽石的處理技術與金色系白蝶珍珠的處理，以
精確評估寶石的價值。									</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/3b83232250cb59ab1761d1e66521fde9.webp"
										alt="傅立葉變換紅外分光光度計（FTIR）"></div>
								<div class="equip_meta">
									<p class="equip_title">傅立葉變換紅外分光光度計（FTIR）</p>
									<p class="equip_explain">
									傅立葉變換紅外分光光度計是一種高精密分析儀器，透過照射紅
外光並測量透過或反射的光來分析樣品。「おたからや」使用此
設備進行翡翠的樹脂充填處理檢測及鑽石的特定鑑定，提供多方
面的專業檢測服務。									</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/0609b87cd0ef7ac42d7e05f14aa2451f.webp"
										alt="I 型・II 型鑑定器"></div>
								<div class="equip_meta">
									<p class="equip_title">I 型・II 型鑑定器</p>
									<p class="equip_explain">
									將樣品放入鑑定器內，透過紫外線照射並測量透過率來判定鑽石
的類型。僅需 1 秒即可區分I 型（天然鑽石）與 II 型（高溫高
壓處理鑽石・合成鑽石）。此設備不僅能測試裸石，還可檢測鑲
嵌狀態的鑽石，無需拆除鑲座即可測定，確保在不損傷物品的情
況下，提供快速且精準的鑑定。</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/5592cdbaa593d89e3ab7da0e4768e03f.webp"
										alt="莫桑石鑑定器（Moissanite Tester）"></div>
								<div class="equip_meta">
									<p class="equip_title">莫桑石鑑定器（Moissanite Tester）</p>
									<p class="equip_explain">在測試前需先清潔寶石表面，然後將測試探針接觸樣品。此設備
透過測量電導率來判斷寶石是否為鑽石或莫桑石
（Moissanite）。與 I 型・II 型鑑定器相同，此設備能夠瞬間且準
確地鑑定，確保高效且精確的評估結果。</p>
								</div>
							</div>
						</section>
						<!-- appraisal_equips -->
					</div>
					<div class="renew_2024_top_gg_profile_itembox">

						<h3 class="renew_2024_top_point_item_h4">
						評估設計與品牌價值
						</h3>
						<div class="renew_2024_top_point_item_story">
						在 おたからや，我們不僅評估寶石本身的價值，還會考慮品牌價
						值與設計，綜合判斷後提供最適當的估價。<br><br>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>

						<h3 class="renew_2024_top_point_item_h4">
						購買所有費用均免費
						</h3>
						<div class="renew_2024_top_point_item_story">
						包括評估費和差旅費在內的所有費用都是完全免費的，不會給客戶帶來任何負擔。<br>
						我們提供多種購買方式，包括上門拜訪、店內購買和線上評估。
						</div>
						<div class="renew_2024_top_point_item_bar"></div>

						<h3 class="renew_2024_top_point_item_h4">
						全國超過 1,300 家門市網絡
						</h3>
						<div class="renew_2024_top_point_item_story">
						A在全國擁有超過1,300家店鋪，是購物店鋪中數量最多的。<br><br>
						此外，Otakaraya 擁有與全球 44 個國家進行交易的成功經驗，不僅與個人，還與公司和企業進行大規模交易。
						</div>
					</div>
				</div>
			</section>
			<!-- renew_2024_top_gg_profile_section -->

			<section></section><!-- MOD_20240417 -->
			<div class="is-pc">
				<div class="wd_spacer is-pc"></div><!-- MOD_20240417 -->
				<section class="certificate">
					<div class="titleMain titleMain--wrapper titleMain--mtPc128 titleMain--mtSp32">
						<h2 class="titleMain--main">
						關於鑽石鑑定書
						</h2>
					</div>
					<section>
						<h3 class="titleSub">鑑定書・鑑別書是什麼？</h3>
						<p style="text-align: center;">
						購買鑽石時，通常會附帶鑑別書，
						其中記載了鑽石的成因與種類。
							<br><br>
							若您擁有鑑定書或鑑別書，請在出售時一併攜帶，
有助於更精確的評估。
						</p>
					</section>
					<section>
						<div class="colBox colBox__col01">
							<div class="col">
								<div class="img">
									<img class="custom-popup-img" src="../images/daiya/kantei_org.webp"
										alt="鑑定書について">
								</div>
							</div>
						</div>
					</section>
					<section>
						<h3 class="titleSub">GIA（美國寶石研究院）</h3>
						<div class="colBox colBox__col01">
							<div class="col">
								<div class="img">
									<img class="custom-popup-img"
										src="../images/daiya/diamond_GIA.webp"
										alt="GIA（美國寶石研究院）">
								</div>
							</div>
						</div>
					</section>
					<section>
						<h3 class="titleSub">鑽石鑑定書的閱讀方式</h3>
						<ol class="num-content__lists">
							<li class="num-content__list">
								<dl>
									<dt>切工與形狀</dt>
									<dd>
										<p>記載鑽石的外形與刻面排列。</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>重量（克拉）</dt>
									<dd>
										<p>鑽石重量以克拉（Carat）計算，1克拉 = 0.2克（200毫克）。</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>顏色（Color）等級</dt>
									<dd>
										<p>使用GIA標準比色石（JJA/AGL認證）評估鑽石的顏色濃度，並依
										照D ~ Z 等級進行分級。</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>淨度（Clarity）等級</dt>
									<dd>
										<p>根據鑽石內含物的數量、大小、顏色和位置，分為 FL、IF、VVS1~VVS2、VS1~VS2、SI1~SI2、I1~I3 等等級進行評估。</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>切工（Cut）等級</dt>
									<dd>
										<p>使用 GIA Facetware Cut Estimator 數據庫與目視評估，分為
										Excellent、Very Good、Good、Fair、Poor 等等級。</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>螢光反應（Fluorescence）</dt>
									<dd>
										<p>使用螢光標準比色石評估發光時的顏色及強度，分為 None、
										Faint、Medium、Strong、Very Strong 等等級。</p>
									</dd>
								</dl>
							</li>
						</ol>
					</section>
					<section>
						<h3 class="titleSub">鑑定書可重新發行</h3>
						<p style="text-align: center;">
						鑑別書可由具備鑑定專業機構、持有寶石鑑定師資格的珠寶店或專業寶石回收店重新發行。
							<br><br>
							重新發行需支付手續費，費用會根據寶石的大小、數量及發行機
							構有所不同。此外，費用也取決於記載項目的多少，通常費用範圍約為 1,000～15,000日圓。</p>
					</section>
					<section>
						<section>
							<h3 class="titleSub">未持有鑑定書的顧客</h3>
							<p style="text-align: center;">
							在OTAKARAYA，即使沒有鑑定書或鑑別書，也能進行鑑定與
							收購。<br>
							因店內有持有 GG（寶石鑑定士資格） 的專業鑑定師，能夠現場
							鑑定寶石，並提供適當的估價。
							</p>

						</section>
					</section>
					<section>
						<div class="titleMain titleMain--wrapper">
							<h2 class="titleMain--main">
							即使有缺陷的產品也可以購買。
							</h2>
							<div class="titleMain--lead">
								<p style="text-align: center;">
								即使是有缺陷的物品，例如設計陳舊、生鏽、失去光澤、彎曲、有污垢或缺少真品證書或保固單，都可以在 Otakaraya 進行評估和交易。
									<br><br>
									專業評估師使用專門的工具對物品進行評估，使我們能夠向客戶提供最高的購買價格。
								</p>
							</div>
						</div>
					</section>
				</section>
			</div>
			<section class="renew_2024_top_gg_profile_section is-sp" style="margin-top:0px !important;">
				<div class="renew_2024_titlesub_topbar follow">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				<div class="renew_2024_auth_titlebox">
					<h2 class="renew_2024_auth_title_h2">
						About <span>Diamond</span> Certificates
					</h2>
					<h3 class="renew_2024_auth_title_about">
					鑑定書・鑑別書是什麼？
					</h3>
					<img class="renew_2024_auth_title_image"
						src="../images/daiya/report_titleimage_202404.png">
				</div>
				<div class="renew_2024_top_gg_desc">
				購買鑽石時，通常會附帶鑑別書，
				其中記載了鑽石的成因與種類。
					<br><br>
					若您擁有鑑定書或鑑別書，請在出售時一併攜帶，
有助於更精確的評估。
				</div>
				<div class="renew_2024_auth_item_superbox">
					<img class="renew_2024_auth_item_innerimage custom-popup-img" src="../images/daiya/kantei_org.webp" alt="鑑定書について">
					<h3 class="renew_2024_auth_title_about">
						GIA（美國寶石研究院）
					</h3>
					<img class="renew_2024_auth_item_innerimage custom-popup-img"
						src="../images/daiya/diamond_GIA.webp"
						alt="GIA（美國寶石研究院）">
					<h3 class="renew_2024_auth_title_about">
						ダイヤモンド鑑定書の見方
					</h3>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">01</div>
							<div class="renew_2024_auth_howtoread_title">切工與形狀</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">記載鑽石的外形與刻面排列。</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">02</div>
							<div class="renew_2024_auth_howtoread_title">重量（克拉）)</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">鑽石重量以克拉（Carat）計算，1克拉 = 0.2克（200毫克）。</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">03</div>
							<div class="renew_2024_auth_howtoread_title">顏色（Color）等級</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">使用GIA標準比色石（JJA/AGL認證）評估鑽石的顏色濃度，並依
						照D ~ Z 等級進行分級。</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">04</div>
							<div class="renew_2024_auth_howtoread_title">淨度（Clarity）等級</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">
						根據鑽石內含物的數量、大小、顏色和位置，分為 FL、IF、VVS1~VVS2、VS1~VS2、SI1~SI2、I1~I3 等等級進行評估。</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">05</div>
							<div class="renew_2024_auth_howtoread_title">切工（Cut）等級</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">使用 GIA Facetware Cut Estimator 數據庫與目視評估，分為
						Excellent、Very Good、Good、Fair、Poor 等等級。</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">06</div>
							<div class="renew_2024_auth_howtoread_title">螢光反應（Fluorescence）</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">使用螢光標準比色石評估發光時的顏色及強度，分為 None、
						Faint、Medium、Strong、Very Strong 等等級。</div>
					</div>
				</div>
				<div class="renew_2024_auth_additional_superbox">
					<h3 class="renew_2024_auth_additional_tilte">
						<img class="renew_2024_auth_item_image"
							src="../images/daiya/auth_item_check.png">
							鑑定書可重新發行
					</h3>
					<div class="renew_2024_auth_additional_story">
					鑑別書可由具備鑑定專業機構、持有寶石鑑定師資格的珠寶店或專業寶石回收店重新發行。
						<br><br>
						重新發行需支付手續費，費用會根據寶石的大小、數量及發行機
構有所不同。
此外，費用也取決於記載項目的多少，通常費用範圍約為 1,000～15,000日圓。
					</div>
					<div class="renew_2024_auth_additional_bar"></div>
					<h3 class="renew_2024_auth_additional_tilte">
						<img class="renew_2024_auth_item_image"
							src="../images/daiya/auth_item_check.png">
							未持有鑑定書的顧客
					</h3>
					<div class="renew_2024_auth_additional_story">
					在OTAKARAYA，即使沒有鑑定書或鑑別書，也能進行鑑定與
					收購。<br>
					因店內有持有 GG（寶石鑑定士資格） 的專業鑑定師，能夠現場
					鑑定寶石，並提供適當的估價。
					</div>
				</div>
				<!-- renew_2024_auth_additional_superbox -->
				<div class="renew_2024_auth_oldok_superbox">
					<h2 class="renew_2024_auth_oldok_title">
						<img class="renew_2024_auth_oldok_photo"
							src="../images/daiya/ok_photo_202404.png">
						<p>
						不清楚金製品的純度也可安心出售
						</p>
					</h2>
					<div class="renew_2024_auth_oldok_story">
					無論是設計老舊、生鏽、暗淡、彎曲、污損，或是缺少鑑定書與
					保證書的商品，OTAKARAYA皆可進行鑑定與收購。

						<br><br>
						專業鑑定師將使用專業的鑑定工具進行評估，確保能夠最大程度
地回饋給顧客最佳收購價格。
					</div>
				</div>
				<!-- renew_2024_auth_oldok_superbox -->
			</section>
			<!--     ▲▲▲評価について▲▲▲     -->

			<section></section>
			<!--     ▲▲▲carat別買取▲▲▲     --><!-- MOD_20240417 -->
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
									<h2 class="is-pc bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="font-size: 26px; font-family: serif;">鑑定師</span></h2>
									<h2 class="is-sp bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="margin:-1rem 0 0 0; font-size: 26px; font-family: serif;">鑑定師</span></h2>
								</div>
								<div class="shop-leader_head_shadow absolute">
									<div class="relative"></div>
								</div>
								<div class="imgbox absolute">
									<img src=../images/daiya/568433d3328efc80e6346b56a8db47df.webp alt="">
								</div>
								<ul class="floatlist">
									<li class="shop-leader_name sitetextcolor" style="font-family: serif;">
										<span class="noto ja" style="font-weight: bold;"> 岩松</span>
									</li>
									<li class="shop-leader_info">
										<table>
											<tbody>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">興趣</span>
													</th>
													<td>
														<span class="noto">旅行</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">喜歡的座右銘：</span>
													</th>
													<td>
														<span class="noto">有言實行</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">喜愛的品牌</span>
													</th>
													<td>
														<span class="noto">鑽石・寶石</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">過去收購案例</span>
													</th>
													<td>
														<span class="noto"> 10克拉鑽石</span>
													</td>
												</tr>
											</tbody>
										</table>
									</li>
								</ul>
							</div>
							<p class="shop-leader_text">
								<span class="noto">在OTAKARAYA，每天都會鑑定並收購數百件大小不一的寶
石。鑽石的評估價格會根據 4C標準（克拉、顏色、淨度、切工）
以及形狀、重量、螢光性等多種因素而有所不同。

此外，おたからや 自營拍賣會，能夠靈活應對市場對寶石的最新
需求。我們的專業鑑定團隊配備 鑽石測試儀 及其他專業設備，
因此全國各門店都能夠提供快速且精準的鑑定服務。
若您有任何想要鑑定或出售的寶石，歡迎隨時利用OTAKARAYA！</span>
							</p>
							<div class="shop-detail_button clearfix">
							</div>
						</div>
					</div>
				</section>
			</div>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>
			<!-- MOD_20240417 -->

			<section class="reason_section">
				<?php get_template_part( 'template-parts/otakaraya_sel' ); ?>
			</section>

			<!-- MOD_20240417 -->
			<h2 class="renew_2024_titlesub follow is-sp">
				<div class="renew_2024_titlesub_topbar">
					<div class="renew_2024_titlesub_topbar_center"></div>
					<div class="renew_2024_titlesub_topbar_left"></div>
					<div class="renew_2024_titlesub_topbar_right"></div>
				</div>
				鑽石收購常見問題
			</h2>
			<section class="renew2024">
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						鑽石收購常見問題
					</h2>
					<div class="titleMain--lead">
						<p></p>
					</div>
				</div>
				<div class="qa__wrap js__more--3th">
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">什麼時候是出售鑽石的最佳時機？</dt>
							<dd class="qa__list__a">
							鑽石的市場行情變動較大，有時價格可能快速上漲，有時則需長時間持有才能提升價值。因此，無法一概而論最佳出售時機。如果打算長期持有鑽石，請確保妥善保管，並定期進行維護，以保持其最佳狀態。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">沒有鑑定書也能收購嗎？</dt>
							<dd class="qa__list__a">是的，我們可收購您的鑽石。專業鑑定師將依據 4C標準（克拉、顏色、淨度、切工）進行評估，並提供合適的收購價格。</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">設計款式會影響收購價格嗎？</dt>
							<dd class="qa__list__a">在寶石收購中，鑽石本身的等級是主要評估因素。即使設計較老
							舊，OTAKARAYA仍可提供高價收購，請放心出售。</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">鑽石的形狀會影響收購價格嗎？</dt>
							<dd class="qa__list__a">
							是的，收購價格會因形狀不同而有所變動。其中，「圓形明亮式
切工（Round Brilliant Cut）」通常擁有最高評價。此外，鑽石的
等級也會影響價格，建議您先進行免費鑑定。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">專業寶石收購店的價格會更高嗎？</dt>
							<dd class="qa__list__a">
							OTAKARAYA不僅收購鑽石、寶石和珠寶，還涵蓋黃金、貴金屬、
品牌精品、手錶等多種類別，擁有豐富的銷售渠道。因此，我們
能夠快速流通庫存，並提供極具競爭力的高價收購。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">碎鑽 / 密釘鑲鑽可以收購嗎？</dt>
							<dd class="qa__list__a">是的，我們可以收購。鑲有碎鑽 / 密釘鑲鑽的珠寶可能會獲得更
高的評估價值。不過，若為裸石（Loose Diamond），則可能無法
收購。</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">哪些類型的鑽石收購價格較高？</dt>
							<dd class="qa__list__a">
							一般來說，1克拉以上、VS等級以上、品牌鑽石珠寶，以及稀有
彩鑽（如天然粉鑽、藍鑽、黃鑽）通常能獲得較高的收購價格。
不僅無色透明的鑽石，天然彩鑽的市場價值也較高。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">鑑定時應攜帶哪些物品？</dt>

							<dd class="qa__list__a">若您有鑑定書，請一併攜帶。鑑定書可證明鑽石的 4C等級，有助
							於獲得更理想的收購價格。</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">哪些商品能獲得高價收購？</dt>
							<dd class="qa__list__a">
							在鑽石收購中，4C等級較高 的鑽石通常能獲得更高評估。此外，
不僅是主鑽，周圍鑲嵌的小鑽等整體品質也會影響價格。如有任
何疑問，歡迎隨時與我們聯繫！							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">日圓貶值或升值會影響收購價格嗎？</dt>
							<dd class="qa__list__a">
							由於鑽石等寶石並非產自日本，因此會受到日圓匯率變動的影響。當日圓貶值時，鑽石的價值（價格）通常會上升，二手市場價格也會上漲，因此收購價格會提高。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">很久以前購買的鑽石也能收購嗎？</dt>
							<dd class="qa__list__a btn--more">
							是的，可以收購。即使是多年以前購買的商品，也會依照當前的評估標準進行鑑定。<br>如果商品附有鑑定書，其發行機構與發行時間可能會影響最終的收購價格。</dd>
							<div class="qa__list__button gtm-more-qa"><button>查看更多</button></div>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">裸石（Loose Diamond）或原石可以收購嗎？
							</dt>
							<dd class="qa__list__a">是的，我們也收購裸石與原石。</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">寶石的大小會影響收購價格嗎？</dt>
							<dd class="qa__list__a">
							是的，寶石的大小會影響收購價格。即使同等級的鑽石，大顆寶
							石因為稀有性較高，通常能獲得更高的收購價格。							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">哪些因素會影響鑽石的收購價格？</dt>
							<dd class="qa__list__a">
							鑽石的收購價格主要受到 4C標準（克拉、顏色、淨度、切工）與
							寶石大小的影響。
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">為何需要身分證明文件？</dt>

							<dd class="qa__list__a">我們需確認出售者的身分並進行記錄，但不會用於其他目的，請
							放心提供。</dd>
						</dl>
					</div>
				</div>
				<div class="btn__wrap btn__more js__more--btn3 gtm-more-qa">
					<span>查看更多</span>
				</div>
			</section>

			<?php get_template_part( 'template-parts/assessment_cta' ); ?>
		</article>
		<?php get_template_part( 'template-parts/side-menu' ); ?>
	</main>


	<script src="../js/jquery-3.6.3.min.js"></script>
	<script src="../js/renew202404_2.js"></script>
	<script src="../js/common_daiya.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/shared.js"></script>
	<script src="../js/breadlist.js"></script>


	<?php get_footer( 'common' ); ?>


	<script>
		var carat_page = "";
		var carat_label = ["01ct", "02ct", "03ct", "04ct", "05ct", "06ct", "07ct", "08ct", "09ct", "1ct", "2ct", "3ct", "4ct", "5ct", "6ct", "7ct", "8ct", "9ct", "10ct"];

		// ページ表示時の選択されたタブの位置を中央に配置
		if (carat_page === '') {
			// caratページでなければ1caratをデフォルトに設定
			var startSlideIndex = 9;
			if (navigator.userAgent.match(/(iPhone|iPod|Android.*Mobile)/i)) {
				// ❶スマホのみに適用
				if ((startSlideIndex - 1) % 3 === 0) {
					startSlideIndex = startSlideIndex - 1;
				}
			} else {
				startSlideIndex = startSlideIndex - 3;
			}
		} else {
			carat_page = carat_page + 'ct';
			if (navigator.userAgent.match(/(iPhone|iPod|Android.*Mobile)/i)) {
				// ❶スマホのみに適用
				var startSlideIndex = Math.min(carat_label.indexOf(carat_page), 20);
				console.log(startSlideIndex);
				if ((startSlideIndex - 1) % 3 === 0) {
					startSlideIndex = startSlideIndex - 1;
				}
			} else {
				// ❷その他PC・タブレットに適用
				var startSlideIndex = Math.min(carat_label.indexOf(carat_page), 16);
				startSlideIndex = startSlideIndex - 3;
			}
		}

		$(function() {
			var slickOptions = {
				slide: '.tabbox',
				infinite: false,
				slidesToShow: 7,
				slidesToScroll: 3,
				responsive: [{
					breakpoint: 782,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				}, ]
			};
			$('.f_area').slick(slickOptions);
			$('.f_area').slick('slickGoTo', startSlideIndex);

			// caratタブクリック時の処理
			$(".tabbox").click(
				function() {
					if ($(this).hasClass("active") == false) {
						var list_i = $(".tabbox").index(this);
						$(".tabbox").removeClass("active");
						$(".tablelist").removeClass("active").hide();
						$(".tab_selectbox").removeClass("active").hide();
						$(".selectbox-5").removeClass("active").hide();
						$(".tabbox").eq(list_i).addClass("active");
						$(".ct-if").eq(list_i).addClass("active").stop().fadeIn(200);
						$(".tab_selectbox").eq(list_i).addClass("active").stop().fadeIn(200);
						$(".selectbox-5").eq(list_i).addClass("active").stop().fadeIn(200);
					}
					// 現状tablelistが全てのtbodyに設定されているので、caratごとに1つ設定するよう修正
					// 同一caratにはct-01ctなどのクラスが設定されているので、セレクトボックスを選択したときはこのクラスでテーブルを切り替える。
				}
			);

			// クラリティセレクトボックス変化時の処理
			$(".tab_selectbox").change(function() {
				var selectedIndex = $(this).prop('selectedIndex');
				var selectedId = $(this).attr('id');
				$("." + selectedId).removeClass("active").hide();
				$("." + selectedId).eq(selectedIndex).addClass("active").stop().fadeIn(200);
			});
		});
		/* // 為替の計算結果を反映する
		var kawase_price = <?php echo wp_json_encode( $kawase_price ) ?>;
		var priceElements = document.querySelectorAll('.jewelrySoubaBox__table__scroll .table__items .price');
		if (kawase_price.length === priceElements.length) {
			priceElements.forEach(function(priceCell, index) {
				priceCell.textContent = kawase_price[index];
			});
		} else {
			// 要素数12540が正
			console.log('kawase_price' + kawase_price.length);
			console.log('priceElements' + priceElements.length);
			console.log("kawase_priceとpriceElementsの要素数が一致しません");
		} */

		$(document).ready(function() {
			jQuery(document).ready(function($) {
				var $listWrap = $("#tablelistbox"); //鑑定書あり部分のID
				var $priceWrap = $("#pricelistframe"); //価格相場のID
				var $searchWrap = $("#searchbox"); //select部分のID
				var $selects = $searchWrap.find("select");
				var $submit = $("#price-search"); //検索ボタンのID
				var theCls = "the-price"; //使っていない
				var hdnCls = "hidden";
				//searchboxとprice-searchが重要
				//

				//var hdnLoadingCls = "hidden-loading";
				//$listWrap.find("." + hdnLoadingCls).removeClass(hdnLoadingCls);


				var reachScorllIfSp = function() {
					if ($searchWrap.hasClass('sp-searchbox')) {
						var parentScrollTo = $searchWrap.offset().top;
						var currentScroll = $(window).scrollTop();
						if (currentScroll < parentScrollTo) {
							$("html,body").animate({
								scrollTop: parentScrollTo,
							}, {
								duration: 400,
							});
						}
					}
				};

				var reachScroll = function(reach, cell) {
					var timer;
					var itvlNum = 0;
					$(cell).addClass(theCls);
					$priceWrap.stop().animate({
						scrollTop: reach,
					}, {
						duration: 500,
						complete: function() {
							timer = setInterval(function() {
								itvlNum++;
								if (itvlNum >= 5 && $(cell).hasClass(theCls)) {
									clearInterval(timer);
									return;
								}
								$(cell).toggleClass(theCls);
							}, 300);
						}
					});
				};



				//鑑定書をお持ちお持ちの方はこちら
				function updateElementsAndEvents(tab) {
					$('.kantei .' + tab + '.searchbox').attr('id', null);
					$('.kantei .' + tab + ' button').attr('id', null);
					$('.kantei .' + tab + '.price').attr('id', null);


					var otherTab = (tab === 'tab1') ? 'tab2' : 'tab1';
					$('.kantei .' + otherTab + '.searchbox').attr('id', 'searchbox');
					$('.kantei .' + otherTab + ' button').attr('id', 'price-search');
					$('.kantei .' + otherTab + '.price').attr('id', 'price_table_calc');


					var $searchWrap = $("#searchbox");
					var $selects = $searchWrap.find("select");
					var $submit = $("#price-search");

					// Attach event handler to $submit
					//鑑定書をお持ちお持ちの方はこちら
					$submit.on('click', function() {
						$priceWrap.find('td').removeClass(theCls);

						var vals = {};
						var errors = "";
						$.each($selects, function(k, ele) {
							var sidx = $(ele).prop('selectedIndex');

							var name = $(ele).attr("name");
							var $cOpt = $($(ele).find('option').get(sidx));
							var v = ("conditions" === name && $cOpt.length) ? $cOpt.html() : $(ele).val();
							var isEmpty = (0 === sidx && ("--" === v || "" === v));
							if (isEmpty) {
								var label = $(ele).parent().parent().prev('dt').find('label').html();
								errors += label + "を選択してください\n";
							}
							vals[name] = v;

						});

						if (errors) {
							alert(errors);
							return;
						}

						var $reachWrap = {};
						var point = {
							x: {
								s: 'thead th:not(.none)',
								f: function(idx) {
									return ($(this).html() === condition_val) ? idx : null;
								},
							},
							y: {
								s: 'tbody th',
								f: function(idx) {
									return ($(this).html() === color_val) ? idx : null
								},
							},
						};
						var reachAdjust = 8;

						var applyCellReach = true;


						var ct_id = "#ct-" + vals.carat; //変更

						var clarity = vals.clarity;
						var cut = vals.cut;
						var color = vals.color;
						var reach_id = ct_id + "-" + clarity;
						$reachWrap = $(reach_id);

						point.x.s = 'thead th';
						point.x.f = function(idx) {
							return ($(this).hasClass(cut)) ? idx : null;
						};
						point.y.s = 'tbody td[class*="color"]';
						point.y.f = function(idx) {
							return ($(this).html() === color) ? idx : null;
						};

						reachAdjust = 5;

						applyCellReach = false;


						if (!$reachWrap.length) return;

						var $table = $('table');
						var x = $table.find(point.x.s).map(point.x.f).get(0);
						var y = $table.find(point.y.s).map(point.y.f).get(0);
						var cell = $reachWrap.find("tr").eq(y).find("td").eq(x);
						reachScorllIfSp();

						applyCellReach = (y > 0 && applyCellReach) || false;

						var reach = (applyCellReach) ? $(cell).position().top : $reachWrap.position().top;
						reach = reach - $priceWrap.position().top;
						reach = $priceWrap.scrollTop() + reach - reachAdjust;

						// スクロール
						// reachScroll(reach, cell);
						$("#diamond_price_table_display_inner #price_table_calc").html(
							'<span class="value">HK$</span>' + cell.text()
						);

						$("#diamond_price_table_display_2 #price_table_calc").html(
							'<span class="value">HK$</span>' + cell.text()
						);

						daiya_calc = cell.text();
						daiya_calc = daiya_calc.replace(/en/g, '');
						daiya_calc = daiya_calc.replace(/,/g, '');
						daiya_calc = Number(daiya_calc);
						simulation_select_val = $("#simulation_select").val();
						simulation_select_val = simulation_select_val.replace(/,/g, '');
						simulation_select_val = Number(simulation_select_val);
						weight_val = $("#weight").val();
						weight_val = Number(weight_val);
						simulation_select_val = simulation_select_val * weight_val;
						gold_daiya_calc = simulation_select_val + daiya_calc;
						gold_daiya_calc = String(gold_daiya_calc).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
						$("#daiya_gold_calc").html('<span class="value">HK$</span>' + gold_daiya_calc);

					});
				}

				// Initial setup
				updateElementsAndEvents('tab2');

				// Event handlers
				$(".price_table_contents_nav2").on('click', function() {
					updateElementsAndEvents('tab1');
				});

				$(".price_table_contents_nav1").on('click', function() {
					updateElementsAndEvents('tab2');
				});


				// new
				// ページロード時に価格データを取得
				var carat_num = [{
					"value": "0.1",
					"label": "01ct"
				}, {
					"value": "0.2",
					"label": "02ct"
				}, {
					"value": "0.3",
					"label": "03ct"
				}, {
					"value": "0.4",
					"label": "04ct"
				}, {
					"value": "0.5",
					"label": "05ct"
				}, {
					"value": "0.6",
					"label": "06ct"
				}, {
					"value": "0.7",
					"label": "07ct"
				}, {
					"value": "0.8",
					"label": "08ct"
				}, {
					"value": "0.9",
					"label": "09ct"
				}, {
					"value": "1.0",
					"label": "1ct"
				}, {
					"value": "2.0",
					"label": "2ct"
				}, {
					"value": "3.0",
					"label": "3ct"
				}, {
					"value": "4.0",
					"label": "4ct"
				}, {
					"value": "5.0",
					"label": "5ct"
				}, {
					"value": "6.0",
					"label": "6ct"
				}, {
					"value": "7.0",
					"label": "7ct"
				}, {
					"value": "8.0",
					"label": "8ct"
				}, {
					"value": "9.0",
					"label": "9ct"
				}, {
					"value": "10.0",
					"label": "10ct"
				}];
				var prices = {};
				for (var i = 0; i < carat_num.length; i++) {
					var label = carat_num[i]['label'];
					var id = "#ct-" + label + "-if";
					var price = $(id + " > tr:nth-child(1) > td:nth-child(2)").text();
					prices[label] = price;
				}

				function updatePrice(carat, target) {
					var price = prices[carat];
					if (price) {
						$(target).html(price + '<span class="value">&yen;</span>');
					}
				}

				$("#carat_only_btn1").on('click', function() {
					var carat_only_price_area = $("#carat_only_price_area select").val();
					updatePrice(carat_only_price_area, "#carat_only_price");
				});

				$(document).on('click', '#carat_only_btn2', function() {
					var carat_only_price_area2 = $("#carat_only_price_area2 select").val();
					console.log("Selected carat: ", carat_only_price_area2);
					updatePrice(carat_only_price_area2, "#carat_only_price2");

					var caratPrice = parseInt($("#carat_only_price2").text().replace(/[HK$,]/g, ''), 10);
					var answer2 = parseInt($("#answer2").val().replace(/,/g, ''), 10);
					var goldPriceVal = parseInt($("#simulation_select2").val().replace(/,/g, ''), 10);
					var weight = parseFloat($("#weight2").val().replace(/,/g, ''));

					var goldCalcPrice = goldPriceVal * weight;
					if (isNaN(goldCalcPrice)) {
						goldCalcPrice = 0;
					}
					// var total = caratPrice + answer2 + goldCalcPrice;
					var total = caratPrice + answer2;

					$("#daiya_gold_calc2").html(total.toLocaleString() + '<span class="value">&yen;</span>');
				});


				$(".price_table_contents_nav").on('click', function() {
					$("#price_table_contents1 #price_table_calc").text("0");
					$("#price_table_contents2 #price_table_calc").text("0");
				});

				// タブ処理
				$("a[href='#price_table_contents2']").on('click', function() {
					$(".arrow_bottom_daiya_default").css("display", "block");
					$(".arrow_bottom_gold_default").css("display", "none");
					$(".arrow_bottom_gold").css("display", "block");
					$(".arrow_bottom_daiya").css("display", "none");
					$("#diamond_price_table_display_inner .price_table_calc_area").css("display", "none");
					$(".prompt_text_daiya").css("display", "none");
					$(".prompt_text_gold").css("display", "block");
				});
				$("a[href='#price_table_contents1']").on('click', function() {
					$(".arrow_bottom_daiya_default").css("display", "none");
					$(".arrow_bottom_daiya").css("display", "block");
					$("#diamond_price_table_display_inner .price_table_calc_area").css("display", "flex");
					$(".prompt_text_gold").css("display", "none");
					$(".prompt_text_daiya").css("display", "block");
				});
				let clone1 = $(".calc_area").clone();
				$(".cloned_gold_calc").append(clone1);


			});
			const ua = navigator.userAgent;
			if (ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)) {

				// タブ処理
				$("a[href='#price_table_contents2']").on('click', function() {
					$("#tablelistbox h2").css("margin-top", "680px");
					$("a[href='#price_table_contents2'] .arrow_bottom_gold").css("display", "none")
					$("a[href='#price_table_contents2'] .arrow_bottom").css("display", "block")
				});
				$("a[href='#price_table_contents1']").on('click', function() {
					$("#tablelistbox h2").css("margin-top", "160%");
				});

			} else {
				// pc


				jQuery(document).ready(function($) {
					input_width = $(".otkr-plicelist #searchbox p input").width();
					text_width = 130
					arrow_width = 15;
					margin_width = 10;
					arrow_text_width = text_width + arrow_width + margin_width;
					arrow_text_width_calc = input_width - arrow_text_width;
					arrow_text_width_calc = arrow_text_width_calc / 2;
					arrow_text_width_calc = arrow_text_width_calc + 22;
					$(".otkr-plicelist #searchbox p input").css("padding-right", arrow_text_width_calc);
				});


				// タブ処理
				$("a[href='#price_table_contents2']").on('click', function() {
					var windowWidth = $(window).width();

					if (windowWidth >= 1361) {
						$("#tablelistbox > h2").css("margin-top", "650px");
					} else {
						$("#tablelistbox > h2").css("margin-top", "650px");
					}

				});
				$("a[href='#price_table_contents1']").on('click', function() {
					$("#tablelistbox > h2").css("margin-top", "400px");

				});
			}

		});

		function priceset() {
			// 読み込み時にselect二種類追加
			var k18val = jQuery('#k18val').text();
			k18val = k18val.replace(/,/g, '');

			var pt900 = jQuery('#pt900').text();
			var pt850 = jQuery('#pt850').text();
			//pt900 = pt900.replace(/,/g, '');
			//pt850 = pt850.replace(/,/g, '');
			//pt900 = pt900 / 2 + k18val / 2;
			//pt850 = pt850 / 2 + k18val / 2;
			//jQuery('#simulation_select').append(jQuery('<option>').html('Pt900/K18 半々').val(pt900));
			//jQuery('#simulation_select').append(jQuery('<option>').html('Pt850/K18 半々').val(pt850));
		}
		window.onload = priceset;
		document.addEventListener('DOMContentLoaded', function() {

			function multi(selectId, weightId, answerId, answerCpId) {
				var text = jQuery('#' + selectId + ' option:selected').val();
				if (text === undefined) {
					console.error('No selected option found for #' + selectId);
					return;
				}
				var removed = text.replace(/,/g, '');
				var num = parseInt(removed, 10);
				var weight = jQuery("#" + weightId).val();
				if (num) {
					if (weight) {
						var _up = 0;

						var answer_cp = num * weight + _up * weight;
						answer_cp = Math.round(answer_cp);
						answer_cp = answer_cp.toLocaleString();

						jQuery('#' + answerCpId).text(answer_cp);

						var answer = num * weight;
						answer = Math.round(answer);
						answer = answer.toLocaleString();

						jQuery('#' + answerId).val(answer);

					}
				}
			}


			// 謎
			// jQuery(document).on('change', '#simulation_select', function() {
			//     multi('simulation_select', 'weight', 'answer', 'answer_cp');
			// });

			// jQuery(document).on('change', '#weight', function() {
			//     multi('simulation_select', 'weight', 'answer', 'answer_cp');
			// });

			jQuery(document).on('change', '#simulation_select2', function() {
				multi('simulation_select2', 'weight2', 'answer2', 'answer_cp2');
			});

			jQuery(document).on('change', '#weight2', function() {
				multi('simulation_select2', 'weight2', 'answer2', 'answer_cp2');
			});

			jQuery(function() {
				jQuery(document).on('mouseup keyup', '#weight, #weight2', function(e) {
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
		// latest_results_item のクラスを持つ要素の数を取得
		var itemCount = $('.latest_results_item').length;

		console.log(itemCount);

		// 要素の数が10個未満の場合に実行する処理
		if (itemCount < 11) {
			// ここに処理を記述
			console.log('latest_results_item のクラスが10個未満です');

			// 例えば、特定の要素にメッセージを追加する場合
			$('#message').text('There are less than 10 items.');
		}

		// HK$矢印アコーディオン
		const circle_btnSlideDown = function(el) {
			el.style.height = 'auto';
			let h = el.offsetHeight;
			el.style.height = '0px';
			el.offsetHeight;
			if (window.innerWidth <= 767) {
				el.style.transition = 'height 0.3s';
			} else {
				el.style.transition = 'height 0.0s';
			}

			el.style.height = h + 'px';
			el.setAttribute('aria-hidden', 'false');
		};

		circle_btnSlideUp = function(el) {
			let h = el.offsetHeight;
			el.style.height = h + 'px';
			el.offsetHeight;
			if (window.innerWidth <= 767) {
				el.style.transition = 'height 0.3s';
			} else {
				el.style.transition = 'height 0.0s';
			}

			el.style.height = '0px';
			el.setAttribute('aria-hidden', 'true');
		};

		const circle_btnAccordions = document.querySelectorAll('.circle_btn_accordion_include');
		circle_btnAccordions.forEach(function(accordion) {
			const circleAccordionBtns = accordion.querySelectorAll('.circle_btn_accordion');
			circleAccordionBtns.forEach(function(circle_AccordionBtn, index) {
				circle_AccordionBtn.addEventListener('click', function(e) {
					const circle_btn_content = e.currentTarget.nextElementSibling;
					const circle_btn_isActive = e.currentTarget.parentNode.classList.contains('active');

					// SPのみ
					if (window.innerWidth < 767) {
						if (circle_btn_isActive) {
							e.currentTarget.parentNode.classList.remove('active');
							e.currentTarget.setAttribute('circle_btn_accordion_expanded', 'false');
							circle_btnSlideUp(circle_btn_content);
							return;
						}
					}

					// クリックされたアコーディオンが閉じていた場合のみ開く
					if (!circle_btn_isActive) {
						e.currentTarget.parentNode.classList.add('active');
						e.currentTarget.setAttribute('circle_btn_accordion_expanded', 'true');
						circle_btnSlideDown(circle_btn_content);
						console.log("test");
					}

					// スクロール制御のために上位階層のクラス名を変える
					let container = accordion.closest('.circle_btn_accordion_control');
					if (container !== null) {
						if (e.currentTarget.parentNode.classList.contains('active')) {
							container.classList.add('active');
						} else {
							container.classList.remove('active');
						}
					}
				});
			});
		});

		// HK$矢印アコーディオン
		document.addEventListener("DOMContentLoaded", function() {
			const listItems = document.querySelectorAll('.transformation_description_content_ttl');
			const isMobile = window.matchMedia("(max-width: 768px)").matches;

			listItems.forEach((item, index) => {
				let number = index + 1;

				if (isMobile && number < 10) {
					number = "0" + number;
				}

				item.style.position = "relative";
				const span = document.createElement('span');
				span.style.position = "absolute";
				span.style.left = "-1em";
				span.textContent = number;
				item.prepend(span);
			});
		});

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
					brandItems.forEach(item => item.style.display = 'none');
					noResults.forEach(el => el.style.display = 'none');
					activeTitle.textContent = '検索結果：';
					return;
				}

				searchQuery = hiraganaToKatakana(searchQuery); // ひらがなをカタカナに変換

				// 検索結果に基づいてフィルタring
				let hasResults = false;
				brandItems.forEach(item => {
					const brandKana = hiraganaToKatakana(item.querySelector('.list_katakana_brand_kana').textContent); // カタカナ名を取得してひらがなからカタカナに変換

					if (brandKana.includes(searchQuery)) {
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


		$(function() {

			window.onload = function() {
				$('.modal-container').css('display', 'block');
			};



			var open = $('.modal-open'),
				close = $('.modal-close'),
				container = $('.modal-container');

			open.on('click', function() {
				container.addClass('active');
				return false;
			});
			close.on('click', function() {
				container.removeClass('active');
			});

			$(document).on('click', function(e) {
				if (!$(e.target).closest('.modal-body').length) {
					container.removeClass('active');
				}
			});
		});


		$('.cm1').on("click", function() {
			$("#player3").removeClass('active');
			$("#player2").addClass('active');
			$(".player3_wrap").removeClass('active');
			$(".player2_wrap").addClass('active');
			$(".video_play2").addClass('play_active');
			$(".video_play3").removeClass('play_active');
			$('#player3').get(0).pause();
		})
		$('.cm2').on("click", function() {
			$("#player2").removeClass('active');
			$(".player3_wrap").addClass('active');
			$(".player2_wrap").removeClass('active');
			$("#player3").addClass('active');
			$(".video_play3").addClass('play_active');
			$(".video_play2").removeClass('play_active');
			$('#player2').get(0).pause();
		})

		$(function() {

			$('.modal-container').on('click', function() {
				setTimeout(function() {
					if ($('.modal-container').hasClass('active')) {

					} else {
						$('#player2').get(0).pause();
						$('#player3').get(0).pause();
					}
				}, 100);
			});


			$('.video_play2').on('click', function() {
				if ($(this).hasClass('playActive')) {
					$('#player2').get(0).pause();
				} else {
					$('#player2').get(0).play();
				}
			});

			$('.video_play3').on('click', function() {
				if ($(this).hasClass('playActive')) {
					$('#player3').get(0).pause();
				} else {
					$('#player3').get(0).play();
				}
			});



			$('#player2').on('playing', function() {
				$('.video_play').addClass('playActive');
			});

			$("#player2").on('pause', function() {
				$('.video_play').removeClass('playActive');
			});

			$('#player3').on('playing', function() {
				$('.video_play').addClass('playActive');
			});

			$("#player3").on('pause', function() {
				$('.video_play').removeClass('playActive');
			});

		});

		document.addEventListener("DOMContentLoaded", function() {
			var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

			if ("IntersectionObserver" in window) {
				var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
					entries.forEach(function(video) {
						if (video.isIntersecting) {
							for (var source in video.target.children) {
								var videoSource = video.target.children[source];
								if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
									videoSource.src = videoSource.dataset.src;
								}
							}

							video.target.load();
							video.target.classList.remove("lazy");
							lazyVideoObserver.unobserve(video.target);
						}
					});
				});

				lazyVideos.forEach(function(lazyVideo) {
					lazyVideoObserver.observe(lazyVideo);
				});
			}
		});


		document.addEventListener("DOMContentLoaded", function() {

			function addNumberingToItemsInSection(parentSelector, childSelector, position = "relative", offset = 0, positionLeft = "0", text = "", spanClass = "numbering") {
				const parentElements = document.querySelectorAll(parentSelector);

				parentElements.forEach(parent => {
					const listItems = parent.querySelectorAll(childSelector);

					listItems.forEach((item, index) => {
						let number = index + 1 + offset;

						if (number < 10) {
							number = "0" + number;
						}

						item.style.position = "relative";
						const span = document.createElement('span');
						span.style.position = position;
						span.style.left = positionLeft;
						span.textContent = number + text;

						if (spanClass) {
							span.classList.add(spanClass);
						}

						item.prepend(span);
					});
				});
			}

			addNumberingToItemsInSection('.cta_section', '.cta_section_content_ttl', undefined, 0, undefined, '.');
			addNumberingToItemsInSection('.reason_section', '.reason_area_img_wrap', "absolute", 0, undefined, undefined, 'reason_numbering');

		});
	</script>
</body>

</html>