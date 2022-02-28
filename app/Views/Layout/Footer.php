 <!-- Start Footer Area -->
 <footer class="footer">
     <!-- Start Footer Top -->
     <div class="footer-top">
         <div class="container">
             <div class="inner-content">
                 <div class="row">
                     <div class="col-lg-12 col-md-4 col-12">
                         <div class="footer-logo">
                             <a href="index.html">
                                 <h1 class="text-white">Camera</h1>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Footer Top -->
     <!-- Start Footer Middle -->

     <!-- End Footer Middle -->
     <p class="text-center pb-5 text-white">Developed By Your Eyes.</p>
 </footer>
 <!--/ End Footer Area -->

 <!-- ========================= scroll-top ========================= -->
 <a href="#" class="scroll-top">
     <i class="lni lni-chevron-up"></i>
 </a>




 <!-- ========================= JS here ========================= -->
 <script src="<?= base_url('assets/js/bootstrap.min.js')  ?>"></script>
 <script src="<?= base_url('assets/js/tiny-slider.js') ?>"></script>
 <script src="<?= base_url('assets/js/glightbox.min.js') ?>"></script>
 <script src="<?= base_url('assets/js/main.js') ?>"></script>
 <script type="text/javascript">
     //========= Hero Slider 
     tns({
         container: '.hero-slider',
         slideBy: 'page',
         autoplay: true,
         autoplayButtonOutput: false,
         mouseDrag: true,
         gutter: 0,
         items: 1,
         nav: false,
         controls: true,
         controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
     });

     //======== Brand Slider
     tns({
         container: '.brands-logo-carousel',
         autoplay: true,
         autoplayButtonOutput: false,
         mouseDrag: true,
         gutter: 15,
         nav: false,
         controls: false,
         responsive: {
             0: {
                 items: 1,
             },
             540: {
                 items: 3,
             },
             768: {
                 items: 5,
             },
             992: {
                 items: 6,
             }
         }
     });
 </script>
 </body>

 </html>