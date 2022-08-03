<?php include('header.php') ?>

<div class="inner_page_banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1>Terms &amp; conditions</h1>
      </div>
    </div>
  </div>
</div>

<div class="terms_condition_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="terms_cond_inner">
          <h3>Refund Policy</h3>
          <ul>
            <li>If customers aren’t satisfied with the revised work then they can claim their money back. We have the entire policy set for refund. Customers can talk to our support team to get more information.</li>
            <li>Our process of order is very simple. Payments should be made in advance for order confirmation.</li>
            <li>Our services are available all 24/7. Holidays, weekends, midnight or noon... we're here &amp; ready to Assist!</li>
            <li>Customer has right to ask for cancellation of an order if order is waiting to move to processing. We will refund 100% fee amount for a qualified cancellation request.</li>
            <li>We accept refund claims if order is placed with standard delivery timeline. Standard delivery time line is at least 2 days or more.</li>
            <li>Research Pro , the evaluation of the refund claim case is done by a Quality Assurance committee and customer is required to accept their decision as final and non-challengeable regarding the qualification/disqualification and the amount of refund.</li>
            <li>Revisions are offered free. Customer can ask for multiple revisions in case their requirements remain un-catered.</li>
            <li>Research Pro when we process the funds for claimed refunds; funds shall take around 6 to 8 working days to reach customer’s account.</li>
            <li>We have designed are products to meet industry standards. We are offering services to provide customized solutions to our customers in return of affordable prices.</li>
          </ul>
          <h3>Terms &amp; conditions</h3>
          <ul>
            <li><strong>Terms of Use</strong><br>Customer is required to use website in accordance with the policies of Research Pro. Hence, when customer starts placing an order with the company, they are supposed to have read and agreed to 100% comply with all policies of Research Pro as published on its website.</li>
            <li><strong>Terms of Sale:</strong><br>We have designed are products to meet industry standards. We are offering services to provide customized solutions to our customers in return of affordable prices.</li>
            <li><strong>Payments:</strong><br>We receive payments through safe and secure methods only. Customer can choose to pay either via Online Bank Transfer, Credit Cards.</li>
            <li><strong>Revisions:</strong><br>Revision requests are entertained if are found as valid and justified. This means if a customer is not able to prove that committed requirement(s) was/were missed, then revision request shall not be accepted.</li>
          </ul>
        </div>
      </div>
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