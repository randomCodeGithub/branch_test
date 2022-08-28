</div>

<footer class="site-footer bg-black" data-an-type="single">



    <?php get_template_part( 'template-parts/general/info-bar' ); ?>



    <div class="logo container narrow-3 flex align-items-center">



        <?php get_template_part( 'template-parts/general/site-logo', 'footer' ); ?>



        <!-- Social networks -->

        <div class="m-l-auto hide-xl hide-lg">

            <?php get_template_part( 'template-parts/social' ); ?>

        </div>

        <!-- /Social networks -->



    </div>



    <div class="container hide-xl hide-lg">

        <?php get_template_part( 'template-parts/general/contacts' ); ?>

    </div>



    <div class="menu container narrow-3">

        <nav class="nav-footer">

            <?php pandago_nav( 'footer-1' ); ?>

        </nav>

        <nav class="nav-footer">

            <?php pandago_nav( 'footer-2' ); ?>

        </nav>

    </div>



    <div class="container">

        <p class="copyright text-center"><?php the_field( 'copyright', 'option' ); ?> <?php echo date( 'Y' ); ?></p>

    </div>



</footer>



<script async defer src="https://cdn.bitrix24.eu/b5735413/crm/site_button/loader_4_wewi6x.js"></script>

<script type="text/javascript">

    var _smid = "4aqn6uwd80105ziq";

    (function(w, r, a, sm, s ) {

        w['SalesmanagoObject'] = r;

        w[r] = w[r] || function () {( w[r].q = w[r].q || [] ).push(arguments)};

        sm = document.createElement('script'); sm.type = 'text/javascript'; sm.async = true; sm.src = a;

        s = document.getElementsByTagName('script')[0];

        s.parentNode.insertBefore(sm, s);

    })(window, 'sm', ('https:' == document.location.protocol ? 'https://' : 'http://') + 'app3.salesmanago.pl/static/sm.js');

</script>

<script>
window.recaptchaCallback = function() {}
</script>













<style>
.csc-block-features-table .col-check .header .title { font-size: 22px; }

@media ( min-width: 1100px ) {
  .col-lg-one-fifth {
    -ms-flex: 0 0 20%;
    -webkit-box-flex: 0;
    flex: 0 0 20%;
    max-width: 20%;
    padding-left: 10px;
    padding-right: 10px;
  }
}



.hx {
  font-size: 35px;
  font-weight: 700;
}
.hx.mg-large { margin-bottom: 35px; }

.highlight {
  font-size: 20px;
  font-weight: 700;
  color: #ff0000;
}

.strikethrough {
  position: relative;
  color: red;
  text-decoration: line-through;
}

.strikethrough span { color: #000; }

.strikethrough:after {
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 2px;
  background: #ff0000;
  /* content: ''; */
}

.notification.orange { color: #e5702a; }



.ccf-block,
.form-text { margin-bottom: 50px; }
.ccf-block { justify-content: center; }



.radio-wrap { margin-bottom: 20px; }

.radio-box {
  position: relative;
  display: block;
  cursor: pointer;
}

.radio-box .wpcf7-form-control-wrap { position: static; }

.radio-box span.wpcf7-list-item {
  display: block;
  margin: 0;
}

.radio-box .wpcf7-list-item-label {
  display: block;
  padding: 10px;
  text-align: center;
  border: 1px solid #000;
  border-radius: 4px;
}

.radio-box .wpcf7-list-item-label:before {
  position: absolute;
  top: -10px;
  right: -10px;
  width: 20px;
  height: 20px;
  opacity: 0;
  background-color: #e5702a;
  border-radius: 50%;
  content: '';
}

.radio-box .wpcf7-list-item-label:after {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 12px;
  height: 12px;
  opacity: 0;
  background-color: #fff;
  border-radius: 50%;
  content: '';
}

.radio-box input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  visibility: hidden;
}


.radio-box input:checked + .wpcf7-list-item-label {
  color: #e5702a;
  border: 1px solid #e5702a;
  box-shadow: 0 0 0 2px #e5702a;
}

.radio-box .wpcf7-not-valid .wpcf7-list-item-label {
  color: #ff0000;
  border: 1px solid #ff0000;
  box-shadow: 0 0 0 2px #ff0000;
}

.radio-box .wpcf7-not-valid-tip { display: none !important; }

.radio-box input:checked + .wpcf7-list-item-label:before,
.radio-box input:checked + .wpcf7-list-item-label:after {
  opacity: 1;
}



.radio-card,
.radio-card .csc-block-price-request { height: 100%; }

.radio-card {
  position: relative;
  display: block;
  cursor: pointer;
}

.radio-card .csc-block-price-request {
  margin: 0;
  padding: 25px 20px 31px;
}

.radio-card .inner {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.radio-card .internet-label { margin-bottom: 5px; }

.radio-card .description-block { margin-bottom: 30px; }

.radio-card .buttons { margin-top: auto; }

.radio-card .btn-default:hover {
  color: #fff;
  background: #000;
}

.radio-card .wpcf7-form-control-wrap { position: static; }

.radio-card input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  visibility: hidden;
}

.radio-card .wpcf7-list-item-label {
  position: absolute;
  top: 0;
  left: 0;
  text-indent: -9999px;
}

.radio-card input:checked + .wpcf7-list-item-label,
.radio-card .wpcf7-not-valid .wpcf7-list-item-label {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  color: #e5702a;
  border: 1px solid #e5702a;
  box-shadow: 0 0 0 2px #e5702a;
}
.radio-card .wpcf7-not-valid .wpcf7-list-item-label {
  color: #ff0000;
  border: 1px solid #ff0000;
  box-shadow: 0 0 0 2px #ff0000;
}

.radio-card .wpcf7-not-valid-tip { display: none !important; }


.radio-card .wpcf7-list-item-label:before {
  position: absolute;
  top: -10px;
  right: -10px;
  width: 20px;
  height: 20px;
  opacity: 0;
  background-color: #e5702a;
  border-radius: 50%;
  content: '';
}

.radio-card .wpcf7-list-item-label:after {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 12px;
  height: 12px;
  opacity: 0;
  background-color: #fff;
  border-radius: 50%;
  content: '';
}

.radio-card input:checked + .wpcf7-list-item-label:before,
.radio-card input:checked + .wpcf7-list-item-label:after {
  opacity: 1;
}



.numbers-slider {
  margin: 0 -3px 40px;
}

.numbers-slider .slide {
  padding: 10px 11px;
}

.numbers-slider .slick-arrow {
  position: absolute;
  top: 100%;
}
.numbers-slider .slick-prev { left: 0; }
.numbers-slider .slick-next { left: 50px; }

.numbers-slider .slick-arrow:not(.slick-disabled) { cursor: pointer; }

.numbers-slider .slick-arrow:not(.slick-disabled):hover { color: #e5702a; }

.numbers-slider .slick-disabled { opacity: .3; }

.numbers-slider .slick-arrow .arrow-label {
  position: relative;
  top: -3px;
  margin-left: 10px;
  font-size: 14px;
}
</style>



<?php get_template_part( 'template-parts/foot' ); ?>

<script type="text/javascript">

	

function someFunction(event) {

  var classList = event.currentTarget.classList.toString();

  var targetClass = classList.toString().slice(classList.indexOf('open'));

  var element = document.getElementByTagName("button");
  element.classList.remove("active");



  var toOpen = document.getElementsByClassName(targetClass);

  var _iteratorNormalCompletion = true;

  var _didIteratorError = false;

  var _iteratorError = undefined;



    for (var _iterator = toOpen[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {

      var el = _step.value;



      var childPanels = el.querySelectorAll('.fa');

      Array.prototype.slice.call(childPanels).forEach(function (child) {

        child.classList.toggle('fa-minus');child.classList.toggle('fa-active');

      });

	  

	  



      var childPanels = el.querySelectorAll('.panel');

      Array.prototype.slice.call(childPanels).forEach(function (child) {

        child.classList.toggle('current');

      });

    }

  

}



</script>