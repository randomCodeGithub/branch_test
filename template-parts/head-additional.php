<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WLCSL4W');</script><!-- End Google Tag Manager -->

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">


<script type="text/javascript">

	

 function someFunction(event){

 var classList = event.currentTarget.classList.toString();

 var targetClass = classList.toString().slice(classList.indexOf('open'));

  $('button').removeClass('active')



  var toOpen = document.getElementsByClassName(targetClass);

  for(var el of toOpen){

	var childPanels = el.querySelectorAll('.fa');

	childPanels.forEach(child => {

      child.classList.toggle('fa-minus');child.classList.toggle('fa-active');

	  

    })



    var childPanels = el.querySelectorAll('.panel');

    childPanels.forEach(child => {

      child.classList.toggle('current');

	  

    })

   }

 } 



</script>

<?php if ( is_page() && get_field( 'is_thank_you_page' ) && ! empty( $_GET ) ): ?>
<script type='text/javascript'>
  window._tfa = window._tfa || [];
  window._tfa.push({notify: 'event', name: 'page_view', id: 1379036});
  !function (t, f, a, x) {
         if (!document.getElementById(x)) {
            t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
         }
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  '//cdn.taboola.com/libtrc/unip/1379036/tfa.js',
  'tb_tfa_script');
</script>
<?php endif; ?>

<!-- Pipedrive -->
<script> (function(ss,ex){ window.ldfdr=window.ldfdr||function(){(ldfdr._q=ldfdr._q||[]).push([].slice.call(arguments));}; (function(d,s){ fs=d.getElementsByTagName(s)[0]; function ce(src){ var cs=d.createElement(s); cs.src=src; cs.async=1; fs.parentNode.insertBefore(cs,fs); }; ce('https://sc.lfeeder.com/lftracker_v1_'+ss+(ex?'_'+ex:'')+'.js'); })(document,'script'); })('lAxoEaKkZw1aOYGd'); </script>
<!-- / Pipedrive -->