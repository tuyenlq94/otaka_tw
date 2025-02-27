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
					<span itemprop="name">Specialized Purchase Store Otakaraya Top</span>
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
					Visit a <span>Specialized Purchase</span> Store Otakaraya <br>
					to Appraise and Sell Your Diamonds
				</h2> <!--     ▲▲▲ top_h2_text▲▲▲     -->
				<div class="head_text">
					Diamonds, the hardest natural substance formed under high pressure and temperature deep within the
					Earth,
					are evaluated based on the 4Cs: Carat, Color, Clarity, and Cut. Their value increases with proximity
					to colorlessness,
					and the quality of the cut determines their brilliance. <br>
					At Otakaraya, we are actively purchasing various diamond jewelry, including rings and necklaces, at
					high prices. <br>
					Our expert appraisers accurately assess the quality of your diamonds to offer a satisfying price.
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
								<h3>Diamond Reference Purchase Price Chart</h3>
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
						Diamond <span>Reference Purchase Price</span>
					</p>
				</h2>
				<div class="renew_2024_dia_title_lead">
					<p>
						Please note that the reference purchase prices
						may fluctuate depending on the timing and market conditions.
						Feel free to contact us for more information.
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
							src="../images/daiya/arrow_b_br.png">Rings</div>
					<div class="renew_2024_tabbox"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">Necklaces</div>
					<div class="renew_2024_tabbox"><img class="renew_2024_tab_arrow renew_2024_tab_arrow_wh"
							src="../images/daiya/arrow_b_wh.png"><img
							class="renew_2024_tab_arrow renew_2024_tab_arrow_br"
							src="../images/daiya/arrow_b_br.png">Bracelets</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
										<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
										<div class="renew_2024_result_item_price">968,000<span class="unit">&yen;</span></div>
										<div class="renew_2024_result_item_arrow">
											<div></div>
										</div>
									</div>
								</a></div>
						</div>
						<div class="flex_annitation">
							*Images are for illustration purposes only.<br>
							*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
									<div class="renew_2024_result_item_price">996,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="flex_annitation">
						*Images are for illustration purposes only.<br>
						*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
									<div class="renew_2024_result_item_price">353,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a></div>
					</div>
					<div class="flex_annitation">
						*Images are for illustration purposes only.<br>
						*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
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
									<div class="renew_2024_result_item_kaitori">Reference Purchase Prices</div>
									<div class="renew_2024_result_item_price">374,000<span class="unit">&yen;</span></div>
									<div class="renew_2024_result_item_arrow">
										<div></div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="flex_annitation">
						*Images are for illustration purposes only.<br>
						*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
					</div>
					<!-- <div class="btn__wrap btn__red"><a href="../daiya/result.html" class="gtm-list-result">查看鑽石參考收購價格表請點此</a></div> -->
				</div>
			</div>


			</div>
			<section>
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						Diamond <span>Reference Purchase Price</span>
					</h2>
					<div class="titleMain--lead">
						<p>
							Please note that the reference purchase prices may fluctuate depending
							on the timing and market conditions. Feel free to contact us for more information.
						</p>
					</div>
				</div>
				<div class="flex flex--hasItem4">
					<!-- タブメニュー -->
					<ul class="flex__tab is-pc">
						<!-- タブ部分 -->
						<li class="tab__item active"><a>Rings</a></li>
						<li class="tab__item "><a>Necklaces</a></li>
						<li class="tab__item "><a>Bracelets</a></li>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">3,085,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">2,101,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">671,000<span>&yen;</span></p>
									</div>
								</li>

							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
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
										<p class="content--title">Reference Purchase Prices</p>
										<p class="content--price">404,000<span>&yen;</span></p>
									</div>
								</li>
							</div>
							<div class="flex_annitation">
								*Images are for illustration purposes only.<br>
								*The reference purchase prices are for items that come with the guarantee (warranty) and accessories.
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
							Points for High-Value Diamond Purchase and Appraisal
						</h2>
						<div class="titleMain--lead">
							<p>
								Many people know that the value of a diamond is determined by its carat weight. However,
								its value is also influenced by the other 4Cs: cut, clarity, and color.
								<br><br>
								Additionally, factors such as brand, design, condition, and the presence of accessories
								can also impact its value. At Otakaraya, we not only evaluate the 4Cs but also carefully
								assess these additional factors to offer the highest possible purchase price.
							</p>
						</div>
					</div>

					<div class="brandinfo brandinfo_red_repeat is-pc">
						<div class="fshoplist-target__list brand_about_repeat_parent_wrap open is_table">
							<div class="fshoplist-target--ttl">
								<h3 class="titleSub">
									Factors That Determine the Value of a Diamond
								</h3>
							</div>
							<div class="fshoplist-target--item ">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Carat</h4>
											<div class="points_content_text">
												<p>Carat is a unit of weight for gemstones, and 1 carat (ct) is equivalent to 0.2 grams. In the case of diamonds, certificates issued by domestic gemological and appraisal institutions provide precise measurements up to three decimal places, although in general transactions, it is often rounded to two decimal places.<br><br>

													As the carat weight increases, the rarity of the gemstone also increases, causing its price to rise significantly. Even with diamonds of the same quality, when the carat weight doubles, the price does not necessarily double. Especially for round figures like 0.5ct or 1.0ct, the price tends to rise sharply.<br><br>

													In the ideal cut of a round brilliant cut, the relationship between carat weight and size is as follows: A 0.1ct diamond has a diameter of approximately 3.0mm, a 0.5ct diamond is about 5.2mm, and a 1.0ct diamond measures around 6.5mm.
												</p>
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
												<p>Cut is a crucial factor in maximizing a diamond's brilliance. A diamond with an excellent cut reflects light effectively, producing a beautiful sparkle. The cut is evaluated on a scale from 'Excellent' to 'Poor' in five grades.<br><br>

													The evaluation is divided into two categories: 'Proportion' and 'Finish.' Proportion refers to the size, ratio, and angles of the facets in a round brilliant cut. There is an 'ideal shape' for this cut that maximizes brilliance, and diamonds are classified into five grades based on how close they come to this ideal.<br><br>

													Next, Finish is further divided into 'Polish' and 'Symmetry.' Polish evaluates the quality of the diamond's polish, while Symmetry assesses the arrangement and symmetry of the facets, both on a five-grade scale.<br><br>

													In this way, the cut evaluation is done based on 'Proportion,' 'Polish,' and 'Symmetry.' Diamonds that receive the highest rating of 'Excellent' in all these areas are particularly referred to as '3EX' (Triple Excellent). Additionally, diamonds that meet certain criteria may exhibit a 'Hearts and Arrows' pattern, a feature seen in diamonds with the 'Heart & Cupid' trademark.<br><br>

													Diamonds with '3EX' or 'Hearts & Arrows' are considered the highest grade, with their brilliance easily visible to the naked eye and receiving high acclaim for their exceptional cut.</p>
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
											<h4 class="titleH4 title--left">Clarity</h4>
											<div class="points_content_text">
												<p>Diamonds typically contain minute inclusions (internal characteristics) or surface blemishes. The extent of these inclusions and surface features is evaluated as 'clarity.' Skilled gemologists use a 10x loupe to inspect the diamond, and based on the severity of these characteristics, the clarity is ranked in 11 levels.<br><br>

													Clarity is graded from the highest transparency, 'FL' (Flawless), to the lowest, 'I3', as follows.<br><br>

													FL (Flawless): No inclusions or blemishes are visible under 10x magnification, even by a skilled gemologist.<br>
													IF (Internally Flawless): No inclusions are visible under 10x magnification, only minor blemishes are detected.<br>
													VVS1/VVS2 (Very, Very Slightly Included): Inclusions are extremely difficult to detect under 10x magnification.<br>
													VS1/VS2 (Very Slightly Included): Minor inclusions are visible under 10x magnification.<br>
													SI1/SI2 (Slightly Included): Inclusions are clearly visible under 10x magnification.<br>
													I1/I2/I3 (Included): Inclusions are visible under 10x magnification or even to the naked eye, significantly affecting the diamond's clarity.<br><br>

													Clarity grading is not determined solely by the size of the inclusions, but takes into account various factors such as the number, location, type, visibility, and color of the inclusions.</p>
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
												<p>Diamonds are graded for color on a scale from D to Z. The grading starts with D, which represents diamonds that are closest to colorless, and the scale progresses as the diamond's color deepens, ultimately reaching Z. The closer a diamond is to D, the higher its value, and as the color becomes more pronounced, its grade tends to decrease.<br><br>

													This color grading of the 4Cs mainly applies to yellow and brown hues. Diamonds with other colors, such as pink or blue, are referred to as 'fancy colored diamonds' and are evaluated based on different criteria rather than the 4Cs. If a diamond's color exceeds Z, it is also classified as a fancy colored diamond.<br><br>

													In general, diamonds with yellow or brownish hues are considered less valuable, but once they reach the level of fancy colored diamonds, their rarity can increase their value. As a result, yellow diamonds with a color deeper than Z can often trade for more than colorless D diamonds due to their scarcity.<br><br>

													Additionally, you may have heard that a diamond's 'fluorescence' can affect its color grading. However, this has little actual impact on the grade. Fluorescence refers to the bluish glow emitted by a diamond when exposed to ultraviolet light. Since the 4C color grading is based on yellow tones, fluorescence can affect the appearance of the diamond's color. However, unless the fluorescence is extremely strong, it doesn't significantly influence the overall grade.
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
								<h3 class="titleSub">The criteria for evaluating diamonds?</h3>
								<div class="high_price_purchase_points_content_lead"></div>
							</div>
							<div class="fshoplist-target--item
								existence_img">
								<div class="horizonlist horizonnumblist">
									<div class="horizonlist--link">

										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">
												Regarding the quality evaluation of diamonds.
											</h4>
											<p class="points_content_text">
												Diamonds are evaluated based on four criteria:
												carat (weight), cut (polishing technique),
												clarity (transparency), and color. Among these,
												"cut" is the only criterion that is influenced
												by human craftsmanship, and it is a crucial factor
												in determining the diamond's brilliance, depending
												on the quality of the technique.
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
												Regarding diamond treatments and processing.
											</h4>
											<p class="points_content_text">
												Diamonds are generally not subject to any human treatments
												other than cutting and polishing. However, some diamonds may
												undergo treatments to improve their clarity or color.
												At Otakaraya, we strive to evaluate your items to the fullest extent,
												so please feel free to show us any items you're unsure about.
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
												Regarding the origin of diamonds.
											</h4>
											<p class="points_content_text">
												Diamonds are mined in various countries around the world,
												with prominent countries including Russia, Botswana, and Canada.
												The value and quality of diamonds are generally considered
												not to vary based on their origin.
												However, diamonds mined from the Jwaneng mine in Botswana
												are often regarded as being of the highest quality. As of 2023,
												there are only 10 companies globally involved in diamond mining.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="fshoplist-target__list brand_about_repeat_parent_wrap open">
							<div class="fshoplist-target--ttl">
								<h3 class="titleSub">
									About the Colors of Diamonds with High Purchase Appraisal Value
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
											<h4 class="titleH4 title--left">Colorless Diamonds</h4>
											<p class="points_content_text">Diamonds are evaluated based on the 4Cs, and their value increases the larger, clearer, and more transparent they are.</p>
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
											<h4 class="titleH4 title--left">Red Diamonds</h4>
											<p class="points_content_text">Red diamonds are the rarest and most valuable among colored diamonds. Their color is ranked as follows: Fancy Red, Fancy Purplish Red, and Fancy Orangy Red, in descending order of value.</p>
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
											<h4 class="titleH4 title--left">Blue Diamonds</h4>
											<p class="points_content_text">
												Blue diamonds are the second most highly valued after red diamonds. They are occasionally mined in the Premier Mine in South Africa. Diamonds with vivid colors, free from pale or grayish hues, are considered superior.</p>
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
											<h4 class="titleH4 title--left">Green Diamonds</h4>
											<p class="points_content_text">Green diamonds are extremely rare and highly valued. Among them, those with high saturation, such as "Fancy Intense Green" and "Fancy Vivid Green," fetch premium prices.</p>
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
												alt="Purple Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Purple Diamonds</h4>
											<p class="points_content_text">
												Purple diamonds come in a range of shades from light to deep hues. The deeper and more distinct the color, the higher the value.</p>
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
												alt="Pink Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Pink Diamonds</h4>
											<p class="points_content_text">Pink diamonds are considered one of the most valuable colored diamonds due to their limited supply.</p>
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
												alt="Orange Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Orange Diamonds</h4>
											<p class="points_content_text">Orange diamonds are highly prized for their rarity and are generally valued more than standard colored diamonds.</p>
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
												alt="Yellow Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Yellow Diamonds</h4>
											<p class="points_content_text">Yellow diamonds are relatively abundant. However, those with canary or lemon-like hues, free from orange undertones, are considered the most valuable.</p>
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
												alt="Brown Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Brown Diamonds</h4>
											<p class="points_content_text">
												Brown diamonds come in various shades, such as reddish-brown or yellowish-brown, with varying levels of saturation. They are widely used in different types of jewelry due to their availability, and their resale value often depends on the design.
											</p>
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
												alt="Black Diamonds">
										</div>
										<div class="horizonlist--text">
											<h4 class="titleH4 title--left">Black Diamonds</h4>
											<p class="points_content_text">Black diamonds are characterized by inclusions of iron or graphite spread throughout the stone. Natural black diamonds are extremely rare, and the deeper and richer the black color, the higher their value.</p>
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
							Points for<br><span>High-Value Diamond Purchase and Appraisal</span>
						</h2>
						<div class="renew_2024_top_pont_story">
							Many people know that the value of a diamond is determined by its carat weight. However, its value is also influenced by the other 4Cs: cut, clarity, and color.<br><br>Additionally, factors such as brand, design, condition, and the presence of accessories can also impact its value. At Otakaraya, we not only evaluate the 4Cs but also carefully assess these additional factors to offer the highest possible purchase price.
						</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>Factors That Determine the Value of a Diamond</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp">
						<h4 class="renew_2024_top_point_item_h4"><span>01</span>Carat</h4>
						<div class="renew_2024_top_point_item_story">
							Carat is a unit of weight for gemstones, and 1 carat (ct) is equivalent to 0.2 grams. In the case of diamonds, certificates issued by domestic gemological and appraisal institutions provide precise measurements up to three decimal places, although in general transactions, it is often rounded to two decimal places.<br><br>

							As the carat weight increases, the rarity of the gemstone also increases, causing its price to rise significantly. Even with diamonds of the same quality, when the carat weight doubles, the price does not necessarily double. Especially for round figures like 0.5ct or 1.0ct, the price tends to rise sharply.<br><br>

							In the ideal cut of a round brilliant cut, the relationship between carat weight and size is as follows: A 0.1ct diamond has a diameter of approximately 3.0mm, a 0.5ct diamond is about 5.2mm, and a 1.0ct diamond measures around 6.5mm.
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_carat_translation.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>02</span>Cut</h4>
						<div class="renew_2024_top_point_item_story">
							Cut is a crucial factor in maximizing a diamond's brilliance. A diamond with an excellent cut reflects light effectively, producing a beautiful sparkle. The cut is evaluated on a scale from 'Excellent' to 'Poor' in five grades.<br><br>

							The evaluation is divided into two categories: 'Proportion' and 'Finish.' Proportion refers to the size, ratio, and angles of the facets in a round brilliant cut. There is an 'ideal shape' for this cut that maximizes brilliance, and diamonds are classified into five grades based on how close they come to this ideal.<br><br>

							Next, Finish is further divided into 'Polish' and 'Symmetry.' Polish evaluates the quality of the diamond's polish, while Symmetry assesses the arrangement and symmetry of the facets, both on a five-grade scale.<br><br>

							In this way, the cut evaluation is done based on 'Proportion,' 'Polish,' and 'Symmetry.' Diamonds that receive the highest rating of 'Excellent' in all these areas are particularly referred to as '3EX' (Triple Excellent). Additionally, diamonds that meet certain criteria may exhibit a 'Hearts and Arrows' pattern, a feature seen in diamonds with the 'Heart & Cupid' trademark. &C）」<br><br>

							Diamonds with '3EX' or 'Hearts & Arrows' are considered the highest grade, with their brilliance easily visible to the naked eye and receiving high acclaim for their exceptional cut.
							<div class="point_item_captionImg"><img
									class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_cut.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>03</span>Clarity</h4>
						<div class="renew_2024_top_point_item_story">
							Diamonds typically contain minute inclusions (internal characteristics) or surface blemishes. The extent of these inclusions and surface features is evaluated as 'clarity.' Skilled gemologists use a 10x loupe to inspect the diamond, and based on the severity of these characteristics, the clarity is ranked in 11 levels.<br><br>

							Clarity is graded from the highest transparency, 'FL' (Flawless), to the lowest, 'I3', as follows.<br><br>

							FL (Flawless): No inclusions or blemishes are visible under 10x magnification, even by a skilled gemologist.<br>
							IF (Internally Flawless): No inclusions are visible under 10x magnification, only minor blemishes are detected.<br>
							VVS1/VVS2 (Very, Very Slightly Included): Inclusions are extremely difficult to detect under 10x magnification.<br>
							VS1/VS2 (Very Slightly Included): Minor inclusions are visible under 10x magnification.<br>
							SI1/SI2 (Slightly Included): Inclusions are clearly visible under 10x magnification.<br>
							I1/I2/I3 (Included): Inclusions are visible under 10x magnification or even to the naked eye, significantly affecting the diamond's clarity.<br><br>

							Clarity grading is not determined solely by the size of the inclusions, but takes into account various factors such as the number, location, type, visibility, and color of the inclusions.
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_clarity.webp" alt=""></div>
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4"><span>04</span>Color</h4>
						<div class="renew_2024_top_point_item_story">
							Diamonds are graded for color on a scale from D to Z. The grading starts with D, which represents diamonds that are closest to colorless, and the scale progresses as the diamond's color deepens, ultimately reaching Z. The closer a diamond is to D, the higher its value, and as the color becomes more pronounced, its grade tends to decrease.<br><br>

							This color grading of the 4Cs mainly applies to yellow and brown hues. Diamonds with other colors, such as pink or blue, are referred to as 'fancy colored diamonds' and are evaluated based on different criteria rather than the 4Cs. If a diamond's color exceeds Z, it is also classified as a fancy colored diamond.<br><br>

							In general, diamonds with yellow or brownish hues are considered less valuable, but once they reach the level of fancy colored diamonds, their rarity can increase their value. As a result, yellow diamonds with a color deeper than Z can often trade for more than colorless D diamonds due to their scarcity.<br><br>

							Additionally, you may have heard that a diamond's 'fluorescence' can affect its color grading. However, this has little actual impact on the grade. Fluorescence refers to the bluish glow emitted by a diamond when exposed to ultraviolet light. Since the 4C color grading is based on yellow tones, fluorescence can affect the appearance of the diamond's color. However, unless the fluorescence is extremely strong, it doesn't significantly influence the overall grade.
							<div class="point_item_captionImg"><img class="renew_2024_top_point_item_h4_image"
									src="../images/daiya/2024_diamond_color.webp" alt=""></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>The criteria for evaluating diamonds?</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp">
						<h4 class="renew_2024_top_point_item_h4">Regarding the quality evaluation of diamonds.</h4>
						<div class="renew_2024_top_point_item_story">
							Diamonds are evaluated based on four criteria: carat (weight), cut (polishing technique), clarity (transparency), and color. Among these, "cut" is the only criterion that is influenced by human craftsmanship, and it is a crucial factor in determining the diamond's brilliance, depending on the quality of the technique.
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4">Regarding diamond treatments and processing.</h4>
						<div class="renew_2024_top_point_item_story">Diamonds are generally not subject to any human treatments other than cutting and polishing. However, some diamonds may undergo treatments to improve their clarity or color. At Otakaraya, we strive to evaluate your items to the fullest extent, so please feel free to show us any items you're unsure about.
						</div>
						<div class="renew_2024_top_point_item_bar"></div>
						<h4 class="renew_2024_top_point_item_h4">Regarding the origin of diamonds.</h4>
						<div class="renew_2024_top_point_item_story">
							Diamonds are mined in various countries around the world, with prominent countries including Russia, Botswana, and Canada. The value and quality of diamonds are generally considered not to vary based on their origin. However, diamonds mined from the Jwaneng mine in Botswana are often regarded as being of the highest quality. As of 2023, there are only 10 companies globally involved in diamond mining.</div>
					</div>
					<div class="renew_2024_top_pont_item_titlebox">
						<h3>About the Colors of Diamonds with High Purchase Appraisal Value</h3>
						<div class="renew_2024_top_pont_item_title_circle">
							<div></div>
						</div>
					</div>
					<div class="renew_2024_top_pont_item_content is-sp"><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/0179640947107c8ce4ea929f8fabf164.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>01</span>Colorless Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Diamonds are evaluated based on the 4Cs, and their value increases the larger, clearer, and more transparent they are.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/765829cc287d1ac17677d3b4bead81e6.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>02</span>Red Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Red diamonds are the rarest and most valuable among colored diamonds. Their color is ranked as follows: Fancy Red, Fancy Purplish Red, and Fancy Orangy Red, in descending order of value.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/cccd2bc758949f98d64a7d337d76ec6a.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>03</span>Blue Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Blue diamonds are the second most highly valued after red diamonds. They are occasionally mined in the Premier Mine in South Africa. Diamonds with vivid colors, free from pale or grayish hues, are considered superior.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/a1d4aefe9a3a9eb13922078d8726347b.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>04</span>Green Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Green diamonds are extremely rare and highly valued. Among them, those with high saturation, such as "Fancy Intense Green" and "Fancy Vivid Green," fetch premium prices.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/dfd4f792d6329e44ef3f282e136cc0fa.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>05</span>Purple Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Purple diamonds come in a range of shades from light to deep hues. The deeper and more distinct the color, the higher the value.
						</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/58a97c8b6893da89264e714f7a43b3ea.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>06</span>Pink Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Pink diamonds are considered one of the most valuable colored diamonds due to their limited supply.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/857520b29ac66eab447eba193215d84e.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>07</span>Orange Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Orange diamonds are highly prized for their rarity and are generally valued more than standard colored diamonds.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/bddb718ade6b729a59cc1c6244e39317.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>08</span>Yellow Diamonds</h4>
						<div class="renew_2024_top_point_item_story">Yellow diamonds are relatively abundant. However, those with canary or lemon-like hues, free from orange undertones, are considered the most valuable.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/c5c61e747e7ee3d7e6559b96051f425f.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>09</span>Brown Diamonds</h4>
						<div class="renew_2024_top_point_item_story">
							Brown diamonds come in various shades, such as reddish-brown or yellowish-brown, with varying levels of saturation. They are widely used in different types of jewelry due to their availability, and their resale value often depends on the design.</div>
						<div class="renew_2024_top_point_item_bar"></div><img class="renew_2024_top_point_item_h4_image"
							src="../images/daiya/532ae322efb836b3bb2878eec8606009.webp" alt="">
						<h4 class="renew_2024_top_point_item_h4"><span>10</span>Black Diamonds</h4>
						<div class="renew_2024_top_point_item_story">
							Black diamonds are characterized by inclusions of iron or graphite spread throughout the stone. Natural black diamonds are extremely rare, and the deeper and richer the black color, the higher their value.</div>
					</div>
				</div> <!-- renew_2024_top_pont_superbox -->
			</div>
			<!-- ▼▼▼変形ダイヤ説明▼▼▼ -->
			<section></section>
			<section class="transformation_description_section">
				<div class="titleMain--wrapper">
					<h2 class="titleMain--main">
						What is a <span>Shaped Diamond</span>?
					</h2>
					<div class="titleMain--lead">
						<p>Fancy-shaped diamonds refer to all diamond cuts other than the round brilliant cut, which is known for its classic round shape. While the round brilliant cut remains the most popular and traditional choice, many diamonds are crafted into unique and stylish fancy shapes. Below are some examples of these fascinating fancy-shaped diamonds.</p>
					</div>
				</div>
				<div class="transformation_description_content_wrap">
					<div class="transformation_description_content">
						<div class="circle_btn_accordion_area">
							<div class="circle_btn_accordion_include circle_btn_accordion_control">
								<button class="circle_btn_accordion" type="button" circle_btn_accordion_expanded="false">
									<p class="transformation_description_content_ttl" style="position: relative;">
										<!-- <span style="position: absolute; left: -1em;">1</span> -->
										<span class="transformation_description_content_text">Emerald Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img1@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img1@4x.webp" alt="">
									<p>
										Diamonds with a square shape when viewed from above and a stepped design when viewed from the side, this cut allows you to fully appreciate the diamond's inherent transparency and brilliance. With fewer facets and a luxurious wide table facet, this cut enhances the diamond's natural clarity.
									</p>
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
										<span class="transformation_description_content_text">Oval Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img2@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img2@4x.webp" alt="">
									<p>
										Diamonds cut into an oval shape, with 57 to 58 facets, making it similar to the round shape in terms of the number of facets. This cut is often used in various accessories, including rings. The oval shape allows for different impressions depending on the ratio between the length and width. With a facet count close to that of the round shape, this cut enhances the diamond's beauty and gives it a sense of depth and richness.
									</p>
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
										<span class="transformation_description_content_text">Trilliant Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img3@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img3@4x.webp" alt="">
									<p>
										They are the diamonds cut into a 'trilliant' (triangle) shape, rather than round or square. The standard number of facets is 43, and they have a unique brilliance different from that of round or square cuts. There are various variations, ranging from the basic equilateral triangle to those with sharper or more rounded corners, all of which have a strong, geometric sparkle.
									</p>
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
										<span class="transformation_description_content_text">Heart Shape</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img4@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img4@4x.webp" alt="">
									<p>
										This cut is shaped like a heart, and it is a variation of the round brilliant cut. It is considered ideal for the heart shape to fit within a square, and pieces that are too wide or elongated are seen as having a special shape. The outline of the heart shape is carefully polished by craftsmen, and their skill greatly impacts the beauty of the final piece.
									</p>
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
										<span class="transformation_description_content_text">Princess Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img5@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img5@4x.webp" alt="">
									<p>
										The mixed cut combines both brilliant cut and step cut to create a sparkling square shape. It features a wide table surface, and compared to the round brilliant cut, it requires less cutting, making it easier to create larger stones. However, since the corners are prone to chipping, careful handling is necessary.
									</p>
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
										<span class="transformation_description_content_text">Pear Shape Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img6@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img6@4x.webp" alt="">
									<p>
										The Pear cut, as the name suggests, is shaped like a pear. Similar to the heart shape, it is a variation of the round brilliant cut with 58 facets. It is also referred to as the teardrop cut due to its resemblance to a tear-shaped droplet.
									</p>
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
										<span class="transformation_description_content_text">Radiant Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img7@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img7@4x.webp" alt="">
									<p>
										It is a cut that combines the brilliant cut and the emerald cut, typically in a square or rectangular shape. Developed in 1977 by Henry Grossbard, it resembles the princess cut in some ways, but the facet arrangement is different. This cutting method is often used for colored gemstones as well.
									</p>
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
										<span class="transformation_description_content_text">Marquise Cut</span>
									</p>
									<img class="is-pc" src="../images/daiya/transformation_description_img8@4x.webp" alt="">
								</button>
								<div class="circle_btn_accordion_list_wrap" aria-hidden="true" style="height: 0px; transition: height;">
									<img class="is-sp" src="../images/daiya/transformation_description_img8@4x.webp" alt="">
									<p>
										It is a boat-shaped cut where both ends of an elongated oval are sharply tapered. Classified as one of the brilliant cuts, it is typically composed of 58 facets, though it can also be cut into 18 facets. The name 'marquise' comes from the French term for 'marquis.' This diamond shape was named after Madame de Pompadour, the mistress of King Louis XV of France, who was granted the title of marquise, and thus, the cut became known as 'marquise.
									</p>
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
						Visit Otakaraya to Sell Your <span>Diamonds</span>
					</h2>
				</div>
				<section>
					<h3 class="titleSub">The staff includes holders of the GG (Graduate Gemologist) qualification.</h3>
					<p style="text-align: center;">
						The GG (Graduate Gemologist) qualification is a prestigious gemologist certification awarded by the Gemological Institute of America (GIA), recognized globally as one of the most authoritative credentials. <br>At Otakaraya, we have staff members who hold the GG qualification, and we also provide regular gemologist training through our in-house educational program. <br>As a result, we are capable of performing highly accurate and high-level assessments of all types of gemstones.</p>

					<div class="colBox colBox__col01">
						<div class="col" style="display: flex; justify-content: space-between;">
							<div class="img gg_holder_profile">
								<img src="../images/daiya/568433d3328efc80e6346b56a8db47df.webp" alt="岩松利香のプロフィール">
							</div>
							<div class="gg_profile">
								<h4 class="titleSub" style="color:black;">Rika Iwamatsu</h4>
								<div class="profile">
									<nobr>
										<p class="profile1">Profile</p>
									</nobr>
									<p class="profile2">：<span>Started working at a gemological laboratory and has been involved in diamond grading and gemstone identification for nearly 30 years.</span></p>
								</div>
								<p><span>Qualifications</span>：<span>GG (Graduate Gemologist) - obtained in May 1994</span>
								</p>
								<p><span>Hometown</span>：Tokyo</p>
								<p><span>Hobbies</span>：Traveling</p>
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
					<h3 class="titleSub">Latest appraisal equipment of Otakaraya</h3>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/8429090fa4171a8ce59873218128502a.webp"
								alt="UV-Visible Near-Infrared Spectrophotometer"></div>
						<div class="equip_meta">
							<p class="equip_title">UV-Visible Near-Infrared Spectrophotometer</p>
							<p class="equip_explain">
								When visible light (light that can be seen by the human eye) passes through a substance, some of the light is absorbed by the material. The UV-Visible Near-Infrared Spectrophotometer is excellent at analyzing the wavelengths of the absorbed light. At 'Otakaraya,' this instrument is used to inspect treatments applied to diamonds and the treatments on gold-based white pearls, allowing for accurate assessment of the gem's value.
							</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/3b83232250cb59ab1761d1e66521fde9.webp"
								alt="Fourier Transform Infrared Spectrophotometer"></div>
						<div class="equip_meta">
							<p class="equip_title">Fourier Transform Infrared Spectrophotometer</p>
							<p class="equip_explain">
								The Fourier Transform Infrared Spectrophotometer is a precision instrument that analyzes samples by shining infrared light onto them and measuring the transmitted or reflected light. At 'Otakaraya,' this equipment is used for a wide range of tests, including examining the presence of resin impregnation treatments in jade and conducting specific tests on diamonds.
							</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/0609b87cd0ef7ac42d7e05f14aa2451f.webp"
								alt="Type I and Type II Determiner"></div>
						<div class="equip_meta">
							<p class="equip_title">Type I and Type II Determiner</p>
							<p class="equip_explain">
								The sample is placed inside the determiner, and ultraviolet light is applied to assess the diamond by its transmission rate. In just one second, the device can determine whether the diamond is Type I (natural diamond) or Type II (high-temperature, high-pressure treated diamond or synthetic diamond).
								The device can assess both loose diamonds and diamonds set in a setting, allowing for measurement without removing the stone from the setting. It provides quick and accurate evaluation without damaging your items.</p>
						</div>
					</div>
					<div class="equip">
						<div class="equip_img"><img src="../images/daiya/5592cdbaa593d89e3ab7da0e4768e03f.webp"
								alt="Moissanite Determiner"></div>
						<div class="equip_meta">
							<p class="equip_title">Moissanite Determiner</p>
							<p class="equip_explain">After cleaning the surface of the gemstone, the probe is applied to the sample. The electrical conductivity measured by the device is used to determine whether the stone is a diamond or moissanite.
								Similar to the Type I and II determiner, it provides instant and accurate assessments.</p>
						</div>
					</div>
				</section>
				<!-- appraisal_equips -->


				<section>
					<h3 class="titleSub">Evaluation of Design and Brand Value</h3>
					<p style="text-align: center;">
						At Otakaraya, we not only assess the intrinsic value of the gemstones themselves but also take into account the brand value and design when determining the appraisal value.<br><br>
						We ensure that even small gemstones are thoroughly evaluated, and we can offer a Purchase regardless of whether the item has accessories or a box.
					</p>
				</section>
				<section>
					<h3 class="titleSub">All Fees Are Free for Purchase</h3>
					<p style="text-align: center;">
						All fees, including appraisal fees and travel expenses, are completely free, with no burden placed on the customer.<br>
						We offer a variety of purchasing methods, including home visits, in-store, and online appraisals.
					</p>
				</section>
				<section>
					<h3 class="titleSub">Network of Over 1,300 Stores Nationwide</h3>
					<p style="text-align: center;">
						A boasts over 1,300 stores nationwide, the largest number among purchasing stores.<br>If you bring your item to a nearby Otakaraya store, you can receive immediate cash payment.<br><br>
						Additionally, Otakaraya has a proven track record of transactions with 44 countries worldwide, handling large-scale transactions not only with individuals but also with corporations and businesses.<br>In addition to diamonds, Otakaraya also purchases a wide range of gemstones, including rubies, sapphires, and more.
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
							Visit Otakaraya to Sell Your <span>Diamonds</span>
						</p>
					</h2>
					<h3 class="renew_2024_dia_title_subtitle_h3">
						The staff includes holders of the GG (Graduate Gemologist) qualification.
					</h3>
				</div>
				<!-- MOD_20240417 -->
				<div class="renew_2024_top_gg_desc">
					The GG (Graduate Gemologist) qualification is a prestigious gemologist certification awarded by the Gemological Institute of America (GIA), recognized globally as one of the most authoritative credentials.<br>At Otakaraya, we have staff members who hold the GG qualification, and we also provide regular gemologist training through our in-house educational program.<br>As a result, we are capable of performing highly accurate and high-level assessments of all types of gemstones.
				</div>
				<img class="renew_2024_top_gg_photo" src="../images/daiya/photo_iwamatsu_202404_en.webp" alt="岩松 ">
				<div class="renew_2024_top_gg_profile_superbox">
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
							Profile
						</div>
						<div class="renew_2024_top_gg_profile_right">
							Started working at a gemological laboratory and has been involved in diamond grading and gemstone identification for nearly 30 years.
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
							Qualifications
						</div>
						<div class="renew_2024_top_gg_profile_right">
							GG (Graduate Gemologist) - obtained in May 1994
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
							Hometown
						</div>
						<div class="renew_2024_top_gg_profile_right">
							Tokyo
						</div>
					</div>
					<div class="renew_2024_top_gg_profile_flex">
						<div class="renew_2024_top_gg_profile_left">
							Hobbies
						</div>
						<div class="renew_2024_top_gg_profile_right">
							Traveling
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
								Latest appraisal equipment of Otakaraya </h3>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/8429090fa4171a8ce59873218128502a.webp"
										alt="UV-Visible Near-Infrared Spectrophotometer"></div>
								<div class="equip_meta">
									<p class="equip_title">UV-Visible Near-Infrared Spectrophotometer</p>
									<p class="equip_explain">
										When visible light (light that can be seen by the human eye) passes through a substance, some of the light is absorbed by the material. The UV-Visible Near-Infrared Spectrophotometer is excellent at analyzing the wavelengths of the absorbed light. At 'Otakaraya,' this instrument is used to inspect treatments applied to diamonds and the treatments on gold-based white pearls, allowing for accurate assessment of the gem's value.
									</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/3b83232250cb59ab1761d1e66521fde9.webp"
										alt="Fourier Transform Infrared Spectrophotometer"></div>
								<div class="equip_meta">
									<p class="equip_title">Fourier Transform Infrared Spectrophotometer</p>
									<p class="equip_explain">
										The Fourier Transform Infrared Spectrophotometer is a precision instrument that analyzes samples by shining infrared light onto them and measuring the transmitted or reflected light. At 'Otakaraya,' this equipment is used for a wide range of tests, including examining the presence of resin impregnation treatments in jade and conducting specific tests on diamonds.
									</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/0609b87cd0ef7ac42d7e05f14aa2451f.webp"
										alt="Type I and Type II Determiner"></div>
								<div class="equip_meta">
									<p class="equip_title">Type I and Type II Determiner</p>
									<p class="equip_explain">
										The sample is placed inside the determiner, and ultraviolet light is applied to assess the diamond by its transmission rate. In just one second, the device can determine whether the diamond is Type I (natural diamond) or Type II (high-temperature, high-pressure treated diamond or synthetic diamond).
										The device can assess both loose diamonds and diamonds set in a setting, allowing for measurement without removing the stone from the setting. It provides quick and accurate evaluation without damaging your items.</p>
								</div>
							</div>
							<div class="equip">
								<div class="equip_img"><img
										src="../images/daiya/5592cdbaa593d89e3ab7da0e4768e03f.webp"
										alt="Moissanite Determiner"></div>
								<div class="equip_meta">
									<p class="equip_title">Moissanite Determiner</p>
									<p class="equip_explain">After cleaning the surface of the gemstone, the probe is applied to the sample. The electrical conductivity measured by the device is used to determine whether the stone is a diamond or moissanite.
										Similar to the Type I and II determiner, it provides instant and accurate assessments.</p>
								</div>
							</div>
						</section>
						<!-- appraisal_equips -->
					</div>
					<div class="renew_2024_top_gg_profile_itembox">

						<h3 class="renew_2024_top_point_item_h4">
							Evaluation of Design and Brand Value
						</h3>
						<div class="renew_2024_top_point_item_story">
							At Otakaraya, we not only assess the intrinsic value of the gemstones themselves but also take into account the brand value and design when determining the appraisal value.<br><br>
							We ensure that even small gemstones are thoroughly evaluated, and we can offer a Purchase regardless of whether the item has accessories or a box.
						</div>
						<div class="renew_2024_top_point_item_bar"></div>

						<h3 class="renew_2024_top_point_item_h4">
							All Fees Are Free for Purchase
						</h3>
						<div class="renew_2024_top_point_item_story">
							All fees, including appraisal fees and travel expenses, are completely free, with no burden placed on the customer.<br>
							We offer a variety of purchasing methods, including home visits, in-store, and online appraisals.
						</div>
						<div class="renew_2024_top_point_item_bar"></div>

						<h3 class="renew_2024_top_point_item_h4">
							Network of Over 1,300 Stores Nationwide
						</h3>
						<div class="renew_2024_top_point_item_story">
							A boasts over 1,300 stores nationwide, the largest number among purchasing stores.<br>If you bring your item to a nearby Otakaraya store, you can receive immediate cash payment.<br><br>
							Additionally, Otakaraya has a proven track record of transactions with 44 countries worldwide, handling large-scale transactions not only with individuals but also with corporations and businesses.<br>In addition to diamonds, Otakaraya also purchases a wide range of gemstones, including rubies, sapphires, and more.
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
							About <span>Diamond</span> Certificates
						</h2>
					</div>
					<section>
						<h3 class="titleSub">What are certificates and identification reports?</h3>
						<p style="text-align: center;">
							A certificate or identification report is provided when purchasing a diamond, detailing the origin and type of the diamond.
							<br><br>
							If you have it, please bring the certificate or identification report when selling the diamond.
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
						<h3 class="titleSub">The GIA (Gemological Institute of America)</h3>
						<div class="colBox colBox__col01">
							<div class="col">
								<div class="img">
									<img class="custom-popup-img"
										src="../images/daiya/diamond_GIA.webp"
										alt="The GIA (Gemological Institute of America)">
								</div>
							</div>
						</div>
					</section>
					<section>
						<h3 class="titleSub">How to Read a Diamond Grading Report</h3>
						<ol class="num-content__lists">
							<li class="num-content__list">
								<dl>
									<dt>Cut and Shape</dt>
									<dd>
										<p>The diamond's shape and facet arrangement are described.</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>Weight (Carat)</dt>
									<dd>
										<p>The weight is evaluated as 1 carat = 0.2g (200mg).</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>Color Grade</dt>
									<dd>
										<p>The diamond's color intensity is evaluated using the GIA Master Stone (JJA/AGL certified) in grades from D to Z.</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>Clarity Grade</dt>
									<dd>
										<p>The number, size, color, and location of inclusions in the diamond are evaluated in grades such as FL, IF, VVS1–VVS2, VS1–VS2, SI1–SI2, I1–I2.</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>Cut Grade</dt>
									<dd>
										<p>Using the GIA Facetware Cut Estimator database and visual assessment, the cut is graded as Excellent, Very Good, Good, Fair, or Poor.</p>
									</dd>
								</dl>
							</li>
							<li class="num-content__list">
								<dl>
									<dt>Fluorescence</dt>
									<dd>
										<p>The color and strength of fluorescence are evaluated using a fluorescence master stone in grades of None, Faint, Medium, Strong, or Very Strong.</p>
									</dd>
								</dl>
							</li>
						</ol>
					</section>
					<section>
						<h3 class="titleSub">Certificates can be reissued.</h3>
						<p style="text-align: center;">
							A certificate of appraisal can be reissued at a jewelry shop or a specialized jewelry buying store where certified gemologists or appraisal experts are employed.
							<br><br>
							A reissue fee applies, which varies depending on the size and quantity of the gemstones, as well as the location where the reissue is requested. Additionally, the fee may differ depending on the number of details included, with the typical range being between 1,000 to 15,000 yen.
						</p>
					</section>
					<section>
						<section>
							<h3 class="titleSub">Customers who do not have a certificate of appraisal.</h3>
							<p style="text-align: center;">
								At Otakaraya, appraisal and purchase are possible even without a certificate of appraisal or identification certificate.<br>
								As Otakaraya employs certified gemologists who hold the GG qualification, they will conduct an on-the-spot gem appraisal and provide an appropriate valuation.
							</p>

						</section>
					</section>
					<section>
						<div class="titleMain titleMain--wrapper">
							<h2 class="titleMain--main">
								Even products with defects <span>can be purchased</span>.
							</h2>
							<div class="titleMain--lead">
								<p style="text-align: center;">
									Even items with defects such as old designs, rust, tarnishing, bending, dirt, or missing certificates of authenticity or warranties can be assessed and traded at Otakaraya.

									<br><br>
									Professional appraisers use specialized tools to assess the items, allowing us to offer the highest possible purchase price to our customers.

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
						What are certificates and identification reports?
					</h3>
					<img class="renew_2024_auth_title_image"
						src="../images/daiya/report_titleimage_202404.png">
				</div>
				<div class="renew_2024_top_gg_desc">
					A certificate or identification report is provided when purchasing a diamond, detailing the origin and type of the diamond.
					<br><br>
					If you have it, please bring the certificate or identification report when selling the diamond.
				</div>
				<div class="renew_2024_auth_item_superbox">
					<img class="renew_2024_auth_item_innerimage custom-popup-img" src="../images/daiya/kantei_org.webp" alt="鑑定書について">
					<h3 class="renew_2024_auth_title_about">
						The GIA (Gemological Institute of America)
					</h3>
					<img class="renew_2024_auth_item_innerimage custom-popup-img"
						src="../images/daiya/diamond_GIA.webp"
						alt="The GIA (Gemological Institute of America)">
					<h3 class="renew_2024_auth_title_about">
						ダイヤモンド鑑定書の見方
					</h3>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">01</div>
							<div class="renew_2024_auth_howtoread_title">Cut and Shape</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">The diamond's shape and facet arrangement are described.</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">02</div>
							<div class="renew_2024_auth_howtoread_title">Weight (Carat)</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">The weight is evaluated as 1 carat = 0.2g (200mg).</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">03</div>
							<div class="renew_2024_auth_howtoread_title">Color Grade</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">The diamond's color intensity is evaluated using the GIA Master Stone (JJA/AGL certified) in grades from D to Z.</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">04</div>
							<div class="renew_2024_auth_howtoread_title">Clarity Grade</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">
							The number, size, color, and location of inclusions in the diamond are evaluated in grades such as FL, IF, VVS1–VVS2, VS1–VS2, SI1–SI2, I1–I2.</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">05</div>
							<div class="renew_2024_auth_howtoread_title">Cut Grade</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">Using the GIA Facetware Cut Estimator database and visual assessment, the cut is graded as Excellent, Very Good, Good, Fair, or Poor.</div>
					</div>
					<div class="renew_2024_auth_howtoread_bar"></div>
					<div class="renew_2024_auth_howtoread_itembox">
						<div class="renew_2024_auth_howtoread_titlebox">
							<div class="renew_2024_auth_howtoread_num">06</div>
							<div class="renew_2024_auth_howtoread_title">Fluorescence</div>
						</div>
						<div class="renew_2024_auth_howtoread_story">The color and strength of fluorescence are evaluated using a fluorescence master stone in grades of None, Faint, Medium, Strong, or Very Strong.</div>
					</div>
				</div>
				<div class="renew_2024_auth_additional_superbox">
					<h3 class="renew_2024_auth_additional_tilte">
						<img class="renew_2024_auth_item_image"
							src="../images/daiya/auth_item_check.png">
						Certificates can be reissued.
					</h3>
					<div class="renew_2024_auth_additional_story">
						A certificate of appraisal can be reissued at a jewelry shop or a specialized jewelry buying store where certified gemologists or appraisal experts are employed.
						<br><br>
						A reissue fee applies, which varies depending on the size and quantity of the gemstones, as well as the location where the reissue is requested. Additionally, the fee may differ depending on the number of details included, with the typical range being between 1,000 to 15,000 yen.
					</div>
					<div class="renew_2024_auth_additional_bar"></div>
					<h3 class="renew_2024_auth_additional_tilte">
						<img class="renew_2024_auth_item_image"
							src="../images/daiya/auth_item_check.png">
						Customers who do not have a certificate of appraisal.
					</h3>
					<div class="renew_2024_auth_additional_story">
						At Otakaraya, appraisal and purchase are possible even without a certificate of appraisal or identification certificate.<br>
						As Otakaraya employs certified gemologists who hold the GG qualification, they will conduct an on-the-spot gem appraisal and provide an appropriate valuation.
					</div>
				</div>
				<!-- renew_2024_auth_additional_superbox -->
				<div class="renew_2024_auth_oldok_superbox">
					<h2 class="renew_2024_auth_oldok_title">
						<img class="renew_2024_auth_oldok_photo"
							src="../images/daiya/ok_photo_202404.png">
						<p>
							Don't worry if you're unsure of the purity of your gold items for purchase.
						</p>
					</h2>
					<div class="renew_2024_auth_oldok_story">
						Even items with defects such as old designs, rust, tarnishing, bending, dirt, or missing certificates of authenticity or warranties can be assessed and traded at Otakaraya.

						<br><br>
						Professional appraisers use specialized tools to assess the items, allowing us to offer the highest possible purchase price to our customers.
					</div>
				</div>
				<!-- renew_2024_auth_oldok_superbox -->
			</section>
			<!--     ▲▲▲評価について▲▲▲     -->

			<section></section>
			<!--     ▲▲▲carat別買取▲▲▲     --><!-- MOD_20240417 -->
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
									<h2 class="is-pc bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="font-size: 26px; font-family: serif;">Appraiser</span></h2>
									<h2 class="is-sp bgsitecolor bordersitecolor relative"><span class="noto thin"
											style="margin:-1rem 0 0 0; font-size: 26px; font-family: serif;">Appraiser</span></h2>
								</div>
								<div class="shop-leader_head_shadow absolute">
									<div class="relative"></div>
								</div>
								<div class="imgbox absolute">
									<img src=../images/daiya/568433d3328efc80e6346b56a8db47df.webp alt="">
								</div>
								<ul class="floatlist">
									<li class="shop-leader_name sitetextcolor" style="font-family: serif;">
										<span class="noto ja" style="font-weight: bold;"> Iwamatsu</span>
									</li>
									<li class="shop-leader_info">
										<table>
											<tbody>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">Hobbies</span>
													</th>
													<td>
														<span class="noto">Travel</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">Favorite Quote</span>
													</th>
													<td>
														<span class="noto">'Actions speak louder than words'</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">Favorite Brand</span>
													</th>
													<td>
														<span class="noto">Diamonds and Jewelry</span>
													</td>
												</tr>
												<tr>
													<th class="sitetextcolor">
														<span class="noto">Past Purchase Examples</span>
													</th>
													<td>
														<span class="noto">10-carat Diamond</span>
													</td>
												</tr>
											</tbody>
										</table>
									</li>
								</ul>
							</div>
							<p class="shop-leader_text">
								<span class="noto">At Otakaraya, we assess hundreds of gemstones every day, both large and small. The value of gemstones can fluctuate greatly depending on various factors such as the 4Cs of diamonds, color, shape, weight, and fluorescence. Otakaraya holds its own auctions, allowing us to respond quickly and sensitively to daily gemstone demand. Regarding assessments, we have professional staff and specialized tools such as diamond testers, enabling accurate evaluations at our stores nationwide. If you're interested in any items, please feel free to use Otakaraya's services.</span>
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
				Frequently Asked <span>Questions</span> About Diamond Purchases
			</h2>
			<section class="renew2024">
				<div class="titleMain titleMain--wrapper is-pc">
					<h2 class="titleMain--main">
						Frequently Asked <span>Questions</span> About Diamond Purchases
					</h2>
					<div class="titleMain--lead">
						<p></p>
					</div>
				</div>
				<div class="qa__wrap js__more--3th">
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">When is the best time to sell diamonds?</dt>
							<dd class="qa__list__a">
								The best time to sell diamonds can vary. Sometimes, the right opportunity arises quickly, while at other times, holding onto them for a longer period can increase their value. It is difficult to pinpoint a universally ideal time. If you plan to keep your diamonds for a longer duration before selling, it is essential to store them properly. We recommend using appropriate storage methods and performing regular maintenance to preserve their condition.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can I sell diamonds without a certificate?</dt>
							<dd class="qa__list__a">Yes, you can. Our appraisers will evaluate the diamond 4Cs (Carat, Color, Clarity, and Cut) and provide you with a purchase price.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Does the design affect the purchase price?</dt>
							<dd class="qa__list__a">For gemstone purchases, the grade of the diamond itself is crucial. Even with an older design, Otakaraya ensures a high-value purchase, so you can rest assured.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Does the shape of the diamond affect the purchase price?</dt>
							<dd class="qa__list__a">
								Yes, the purchase price varies by shape. The "round brilliant cut" is the most highly valued cut for diamonds. The purchase price also changes depending on the diamond's grade, so feel free to take advantage of our free appraisal service.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Do specialty gemstone purchase shops offer higher prices?</dt>
							<dd class="qa__list__a">
								At Otakaraya, we handle a wide range of items, including diamonds, gemstones, jewelry, gold, precious metals, branded items, and watches. This extensive sales network allows us to avoid holding excess inventory, enabling us to offer the highest possible prices for your items.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can melee diamonds (pavé diamonds) be purchased?</dt>
							<dd class="qa__list__a">Yes, they can be purchased. Jewelry adorned with melee diamonds (pavé diamonds) may receive a higher appraisal value. However, loose stones may not be eligible for purchase.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Are there diamonds with high purchase values?</dt>
							<dd class="qa__list__a">
								Diamonds over 1 carat, diamonds with a VS grade or higher, branded diamond jewelry, and rare colored diamonds often fetch high purchase prices. Not only colorless diamonds but also natural pink diamonds, blue diamonds, and yellow diamonds tend to have higher purchase values.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Is there anything I should bring for the appraisal?</dt>

							<dd class="qa__list__a">If you have a grading certificate, please bring it with you. The certificate serves as proof of the diamond’s value, such as its 4C grade, which may increase the likelihood of obtaining a favorable purchase price.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">What kind of items can be purchased at a high price?</dt>
							<dd class="qa__list__a">
								For diamond purchases, items with a high 4C grade are considered. Additionally, the quality of the surrounding stones, not just the main stone, also plays a role in the evaluation. Feel free to consult with us first.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Does 'yen depreciation/yen appreciation' affect the purchase price?</dt>
							<dd class="qa__list__a">
								Since gemstones like diamonds are not produced in Japan, they are influenced by exchange rates such as yen depreciation or yen appreciation. When the yen depreciates, the value (price) increases, and as the prices in the second-hand market rise, the purchase price becomes higher.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can diamonds purchased a long time ago be sold?</dt>
							<dd class="qa__list__a btn--more">
								Yes, they can be purchased. Even items purchased a long time ago will be appraised based on current evaluation standards.<br>If the diamond comes with a certificate, the purchase price may vary depending on the issuing organization and the issuance date of the certificate.</dd>
							<div class="qa__list__button gtm-more-qa"><button>View More</button></div>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Can loose diamonds or rough stones be purchased?
							</dt>
							<dd class="qa__list__a">Yes, we also purchase loose diamonds and rough stones.</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Does the size of the gemstone affect its purchase price?</dt>
							<dd class="qa__list__a">
								Yes, the size of the gemstone does affect the purchase price. If there are two diamonds with the same grade, the larger stone is considered rarer and can expect a higher purchase price.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">What factors affect the purchase price of diamonds?</dt>
							<dd class="qa__list__a">
								The quality of the diamond, known as the 4Cs, and its size are the main factors that influence its purchase price.
							</dd>
						</dl>
					</div>
					<div class="qa__list js__more--item3">
						<dl class="qa__list__inner">
							<dt class="qa__list__q">Why is identification required?</dt>

							<dd class="qa__list__a">The identification of the seller is required by the Antique Dealer Law, and we are required to keep a record for that purpose. It will not be used for any other reasons.</dd>
						</dl>
					</div>
				</div>
				<div class="btn__wrap btn__more js__more--btn3 gtm-more-qa">
					<span>View More</span>
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