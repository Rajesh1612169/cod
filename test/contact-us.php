<?php include('header.php') ?>

	<div class="inerpage_section1">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="conatc_us_form" id="conatc_us_form">
						<form>
							<div class="form-group">
								<label>Your name *</label>
								<input type="text" class="form-control require" id="contact_name">
							</div>
							<div class="form-group">
								<label>Your email address *</label>
								<input type="email" class="form-control require" id="contact_email">
							</div>
							<div class="form-group">
								<label>Phone Number *</label>
								<input class="form-control require" type="number" id="contact_num">
							</div>
							<div class="form-group">
								<label>Message *</label>
								<textarea class="form-control require" rows="3" id="contact_inst"></textarea>
							</div>
							<div class="form-group hide">
								<div class="capbox0">
									<div id="CaptchaDiv0"></div>
									<div class="capbox-inner0">
										Type the above number:
										<input type="hidden" id="txtCaptcha0">
										<input type="text" name="CaptchaInput0" id="CaptchaInput0" size="15">
									</div>
								</div>
							</div>
							<button type="button" class="cont_but" id="btn_contactForm">Book my Consultation Now</button>
						</form>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
			</div>
		</div>
	</div>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>modal</title>
		<link rel="stylesheet" type="text/css" href="popup.css">
		<link rel="stylesheet" type="text/css" href="animation.css">

		<style type="text/css">
			.pop-img {
				margin-left: 40% !important;
			}

			.setup {
				border: 1px solid #ef391e !important;
				height: 45px !important;
				border-radius: 38px !important;
				padding-left: 35px !important;
			}

			.special-offer-modal .off-offer {
				color: #ef391e;
				color: #ef391e !important;
			}

			button.submit.modal-signup-btn {
				background: #ef391e !important;
			}

			.mbtn2 {
				background: #ef391e !important;
				border-radius: 38px !important;
			}

			.modal-content {
				box-shadow: none !important;
				border-radius: none !important;
			}

			.special-offer-modal .form-modal {
				position: absolute !important;
			}

			button.close {
				background: none !important;
				top: none !important;
			}

			#close-btn {
				margin-top: 0 !important;
			}

			.special-offer-modal .off-offer {

				font-size: 36px;
				font-weight: 800;
				position: relative;
				top: 0 !important;
				margin-bottom: 10px;
			}

			.special-offer-modal .submit {
				/*padding: 15px 100px;*/
				font-size: 14px;
				width: 100%;
			}

			/*.modal-dialog .special-offer-popup{*/
			/*right:26%!important;    */
			/*}*/
		</style>
	</head>

	<body>
		<div class="special-offer-modal modal fade" id="enquirypopup" tabindex="-1" role="dialog" aria-labelledby="enquirypopup" aria-hidden="true">
			<div class="modal-dialog special-offer-popup" role="document" style="right:26%;">
				<div class="modal-content">
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 modal-bg">
									<div class="">
										<img class="pop-img" src="assets/images/popup-img.png">
									</div>
								</div>
								<div class="col-lg-6 content-form">


									<form class="modal-signup-form">


										<div class="form-modal">
											<button type="button" class="close" id="close-btn" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="special-offer text-center">Limited Time Offer!</h4>
											<p class="text-center upto">Get Instant Discount Now!</p>
											<h1 class="text-center off-offer">Upto 50% OFF</h1>
											<div class="col-md-12 mt-4 modal-signup-result"></div>
											<div class="col-md-12 mt-4 modal-signup-hide">
												<div class="form-group formFeildsWrap">
													<style>
														/*#checker{
padding-left: 35px !important;
}   */
													</style>



													<input type="text" class="form-control setup" id="ename" required placeholder="*Enter Your Name" aria-label="name">
													<span class="Inputborder"></span>
												</div>
												<div class="form-group formFeildsWrap">
													<input type="email" class="form-control setup" id="eemail" required placeholder="*Enter Your Email Address" aria-label="Email Address">
													<span class="Inputborder"></span>
												</div>
												<div class="form-group formFeildsWrap">
													<input type="tel" class="form-control setup" id="ephone" required placeholder="*Enter Your Number" aria-label="Phone">
													<span class="Inputborder"></span>
												</div>
												<div class="form-group formFeildsWrap">
													<button type="button" id="esubmit" class="submit mbtn2">GET DISCOUNT NOW!</button>
												</div>
											</div>
											<!-- <div class="row">
                      <div class="mx-auto limited-time">
                        <p>This is a limited time Offer*</p>
                      </div>
                    </div> -->
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
		<!--End POP UP-->



		<script type="text/javascript">
			$(window).on('load', function() {
				$('#enquirypopup').modal('show');
			});
		</script>
	</body>
	</html>

	<?php include('footer.php') ?>