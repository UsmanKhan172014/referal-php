<?php
include "includes/header.php";
?>

<!-- Price start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Charge your creative inspiration</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Site1</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <?php

            $query = "SELECT * FROM packages";
            $sql = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($sql)){

            ?>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card pricing pricing-primary business-rate shadow bg-light border-0 rounded">
                        <div class="card-body">
                            <h6 class="title name fw-bold text-uppercase mb-4"><?=$row["p_name"]?></h6>
                            <div class="d-flex mb-4">
                                <span class="h4 mb-0 mt-2">Rs.</span>
                                <span class="price h1 mb-0"><?=$row["p_invest"]?></span>
                            </div>

                            <ul class="list-unstyled mb-0 ps-0">
                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Duration <?=$row["p_duration"]?></li>
                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Daily Auto Profit Rs.<?=$row["p_earning"]?></li>
                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Min/Max Unlimited Rs.<?=$row["p_earning"]?></li>
                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Refer Commission Rs.<?=$row["p_reffered_commision"]?></li>
                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Total Profit Rs.<?=$row["p_total_profit"]?></li>
                            </ul>
                            <a href="javascript:void(0)" class="btn mt-4">Buy Now</a>
                        </div>
                    </div>
                </div><!--end col-->

            <?php
            }
            ?>
           
        </div><!--end row-->
        
    </div><!--end container-->

    

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Schedule a demo with us</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Site1</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center mt-4 pt-2">
            <div class="col-lg-7 col-md-10">
                <div class="subcribe-form">
                    <form class="ms-0">
                        <input type="email" id="subemail" name="email" class="rounded-pill border" placeholder="E-mail :">
                        <button type="submit" class="btn btn-pills btn-primary">Submit <i class="uil uil-arrow-right"></i></button>
                    </form><!--end form-->
                </div><!--end subscribe form-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Price End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <<!-- Feature Start -->
  <section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">What We Do ?</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Site1
                        
                    </span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-edit-alt h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>
                            Referral program</h5>
                        <!-- <p class="text-muted mb-0">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam aenean elementum semper.</p> -->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-vector-square h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Secure investment</h5>
                        <!-- <p class="text-muted mb-0">Allegedly, a Latin scholar established the origin of the text by established compiling unusual word.</p> -->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-file-search-alt h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>
                            Registered company</h5>
                        <!-- <p class="text-muted mb-0">It seems that only fragments of the original text remain in the Lorem the original Ipsum texts used today.</p> -->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-airplay h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Instant withdrawal</h5>
                        <!-- <p class="text-muted mb-0">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam eleifend aenean elementum semper.</p> -->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-calendar-alt h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>
                            24/7 support</h5>
                        <!-- <p class="text-muted mb-0">Allegedly, a Latin scholar established the origin of the established text by compiling unusual word.</p> -->
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5">
             
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

        </section><!--end section-->
        <!-- Feature End -->

        
        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End -->

        
        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-footer">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Footer Start -->
        <footer class="footer">    
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60">
                            <div class="row">
                                <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <a href="#" class="logo-footer">
                                        <img src="images/logo1.png" height="24" alt="">
                                    </a>
                                    <p class="mt-4">Start working withSite1 that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Company</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>

                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Usefull Links</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>
                                    </ul>
                                </div><!--end col-->
            
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Newsletter</h5>
                                    <p class="mt-4">Sign up and receive the latest tips via email.</p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="foot-subscribe mb-3">
                                                    <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid">
                                                    <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar">
                <div class="container text-center">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="text-sm-start">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>Site1.</i> </p>
                            </div>
                        </div><!--end col-->
    
                        <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <ul class="list-unstyled text-sm-end mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header p-4 border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="images/logo-dark.png" height="24" class="light-version" alt="">
                    <img src="images/logo-light.png" height="24" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4">
                <div class="row">
                    <div class="col-12">
                        <img src="images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                        <div class="card border-0 mt-5" style="z-index: 1">
                            <div class="card-body p-0">
                                <form method="post" name="myForm" onsubmit="return validateForm()">
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
    
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>

            <div class="offcanvas-footer p-4 border-top text-center">
                <ul class="list-unstyled social-icon social mb-0">
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
                </ul><!--end icon-->
            </div>
        </div>
        <!-- Offcanvas End -->

        <!-- Cookies Start -->
        <div class="cookie-popup bg-white shadow rounded py-3 px-4">
            <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-success h6">use of cookies</a></p>
            <div class="cookie-popup-actions text-end">
                <button><i class="uil uil-times text-dark fs-4"></i></button>
            </div>
        </div><!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
        <!-- Cookies End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

       

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js "></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>