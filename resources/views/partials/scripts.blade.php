

<!-- jquery, bootstrap,  popper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<!-- plugins -->
<script type="text/javascript" src="/plugins/dropzone/dropzone.js"></script>
<script type="text/javascript" src="/plugins/slick/slick.min.js"></script>
<script type="text/javascript" src="/plugins/sweetalert-master/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="/plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- animated bg -->
{{-- <script language="javascript" type="text/javascript" src="/js/animated_bg.js"></script> --}}

<!-- Google Analytics -->
{{-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87342532-1', 'auto');
  ga('send', 'pageview');
</script>
 --}}

 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87342532-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-87342532-2');
</script>


<script type="text/javascript" src="/js/custom.js"></script>


<!-- custom per page -->
@yield('js')


