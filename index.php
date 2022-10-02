<?php
include "includes/header.php";
?>

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100">
            <div class="container">
                <div class="row mt-5 align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="title-heading me-lg-4">
                            <h1 class="heading mb-3">

Safe and secure investment <span class="text-primary">Invest For Future In Best Platform</span> </h1>
                           
                            <div class="mt-4">
                                <a href="page-contact-one.html" class="btn btn-primary mt-2 me-2"><i class="uil uil-envelope"></i> Get Started</a>

                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <img src="images/illustrator/Startup_SVG.svg" alt="">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        

        <!-- How It Work Start -->
        <section class="section bg-light border-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">About US</h4>
                              </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 mt-4 pt-2">
                        <img src="images/illustrator/SEO_SVG.svg" alt="">
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 mt-4 pt-2">
                        .<div class="row">
                            <div class="col-12 mt-4">
                                <div class="tiny-three-item">
                                    <div class="tiny-slide text-center">
                                        <div class="client-testi rounded shadow m-2 p-4">
                                           <h4>
                                            Fast Transfer
                                           </h4>   <p class="text-muted mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. "</p>
                                           
                                        </div>
                                    </div>
        
                                    <div class="tiny-slide text-center">
                                        <div class="client-testi rounded shadow m-2 p-4">
                                            <!-- <img src="images/client/google.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt=""> -->
                                            <h4>
                                                Refferral bonus
                                               </h4> <p class="text-muted mt-4">we offer referral bonus for each new member you invite to our program. After he makes a deposit you receive a referral commission.</p>

                                        </div>
                                    </div>
        
                                    <div class="tiny-slide text-center">
                                        <div class="client-testi rounded shadow m-2 p-4">
                                            <!-- <img src="images/client/lenovo.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt=""> -->
                                            <h4>
                                                Live Support
                                            </h4>
                                            <p class="text-muted mt-4">" One dWe are at your service 24 hours a day, 7 days a week for all your questions, problems and suggestions.</p>

                                        </div>
                                    </div>
        
                                    <div class="tiny-slide text-center">
                                        <div class="client-testi rounded shadow m-2 p-4">
                                            <!-- <img src="images/client/paypal.svg" class="img-fluid avatar avatar-ex-sm mx-auto" alt=""> -->
                                           <h4>
                                            Super security
                                           </h4>
                                            <p class="text-muted mt-4">The company guarantees the maximum availability of the site, the safety of your personal data and protection.</p>

                                        </div>
                                    </div>
        
                               
        
                                 
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

          
        </section><!--end section-->
        <!-- How It Work End -->
 <!-- Price start -->
 <section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Investment Plan</h4>
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
<!--            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">-->
<!--                <div class="card pricing pricing-primary business-rate shadow bg-white border-0 rounded">-->
<!--                    <div class="ribbon ribbon-right ribbon-warning overflow-hidden"><span class="text-center d-block shadow small h6">Best</span></div>-->
<!--                    <div class="card-body">-->
<!--                        <h6 class="title name fw-bold text-uppercase mb-4">Starter</h6>-->
<!--                        <div class="d-flex mb-4">-->
<!--                            <span class="h4 mb-0 mt-2">$</span>-->
<!--                            <span class="price h1 mb-0">39</span>-->
<!--                            <span class="h4 align-self-end mb-1">/mo</span>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="list-unstyled mb-0 ps-0">-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Appointments</li>-->
<!--                        </ul>-->
<!--                        <a href="javascript:void(0)" class="btn mt-4">Get Started</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">-->
<!--                <div class="card pricing pricing-primary business-rate shadow bg-light border-0 rounded">-->
<!--                    <div class="card-body">-->
<!--                        <h6 class="title name fw-bold text-uppercase mb-4">Professional</h6>-->
<!--                        <div class="d-flex mb-4">-->
<!--                            <span class="h4 mb-0 mt-2">$</span>-->
<!--                            <span class="price h1 mb-0">59</span>-->
<!--                            <span class="h4 align-self-end mb-1">/mo</span>-->
<!--                        </div>-->
<!--                        -->
<!--                        <ul class="list-unstyled mb-0 ps-0">-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>1 Domain Free</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>-->
<!--                        </ul>-->
<!--                        <a href="javascript:void(0)" class="btn mt-4">Try It Now</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">-->
<!--                <div class="card pricing pricing-primary business-rate shadow bg-light border-0 rounded">-->
<!--                    <div class="card-body">-->
<!--                        <h6 class="title name fw-bold text-uppercase mb-4">Ultimate</h6>-->
<!--                        <div class="d-flex mb-4">-->
<!--                            <span class="h4 mb-0 mt-2">$</span>-->
<!--                            <span class="price h1 mb-0">79</span>-->
<!--                            <span class="h4 align-self-end mb-1">/mo</span>-->
<!--                        </div>-->
<!--                        -->
<!--                        <ul class="list-unstyled mb-0 ps-0">-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>1 Domain Free</li>-->
<!--                            <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Installment</li>-->
<!--                        </ul>-->
<!--                        <a href="javascript:void(0)" class="btn mt-4">Started Now</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div><!--end row-->
    </div><!--end container-->

   
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
               <!-- Pricing Start -->
<!--        <section class="section">-->
<!--            <div class="container">-->
<!--                <div class="row mt-lg-4 align-items-center">-->
<!--                    <div class="col-lg-5 col-md-12 text-center text-lg-start">-->
<!--                        <div class="section-title mb-4 mb-lg-0 pb-2 pb-lg-0">-->
<!--                            <h4 class="title mb-4">Our Comfortable Rates</h4>-->
<!--                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Site1</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>-->
<!--                            <a href="https://1.envato.market/landrick" target="_blank" class="btn btn-primary mt-4">Buy Now <span class="badge rounded-pill bg-danger ms-2">v4.0</span></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-lg-7 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">-->
<!--                        <div class="ms-lg-5">-->
<!--                            <div class="row align-items-center">-->
<!--                                <div class="col-md-6 col-12 px-md-0">-->
<!--                                    <div class="card pricing pricing-primary starter-plan shadow rounded border-0">-->
<!--                                        <div class="card-body py-5">-->
<!--                                            <h6 class="title name fw-bold text-uppercase mb-4">Starter</h6>-->
<!--                                            <div class="d-flex mb-4">-->
<!--                                                <span class="h4 mb-0 mt-2">$</span>-->
<!--                                                <span class="price h1 mb-0">39</span>-->
<!--                                                <span class="h4 align-self-end mb-1">/mo</span>-->
<!--                                            </div>-->
<!--    -->
<!--                                            <ul class="list-unstyled mb-0 ps-0">-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Appointments</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>-->
<!--                                            </ul>-->
<!--                                            <a href="javascript:void(0)" class="btn mt-4">Get Started</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--    -->
<!--                                <div class="col-md-6 col-12 mt-4 pt-2 pt-sm-0 mt-sm-0 px-md-0">-->
<!--                                    <div class="card pricing pricing-primary bg-light shadow rounded border-0">-->
<!--                                        <div class="card-body py-5">-->
<!--                                            <h6 class="title name fw-bold text-uppercase mb-4">Professional</h6>-->
<!--                                            <div class="d-flex mb-4">-->
<!--                                                <span class="h4 mb-0 mt-2">$</span>-->
<!--                                                <span class="price h1 mb-0">59</span>-->
<!--                                                <span class="h4 align-self-end mb-1">/mo</span>-->
<!--                                            </div>-->
<!--    -->
<!--                                            <ul class="list-unstyled mb-0 ps-0">-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Free Appointments</li>-->
<!--                                                <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>-->
<!--                                            </ul>-->
<!--                                            <a href="javascript:void(0)" class="btn mt-4">Try it now</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>end row-->
<!--            </div>-->
<!--        </section>-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-light">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Pricing End -->

  <!-- Feature Start -->
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

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title">
                    <h4 class="title mb-4">Speed up your development <br> with <span class="text-primary">Site1.</span></h4>
                    <p class="text-muted">Using Site1 to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                    </ul>
                    <a href="javascript:void(0)" class="mt-3 h6 text-primary">Find Out More <i class="uil uil-angle-right-b align-middle"></i></a>
                </div>
            </div><!--end col-->

            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                <div class="card rounded border-0 shadow ms-lg-5">
                    <div class="card-body">
                        <img src="images/illustrator/Mobile_notification_SVG.svg" alt="">

                        <div class="content mt-4 pt-2">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Name : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control ps-5" placeholder="Name" name="name" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Password : <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="form-control ps-5" placeholder="Password" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 mt-2 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </form>                                    
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Feature End -->
        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Client Reviews</h4>
                             </div>
                </div><!--end col-->
            </div><!--end row-->

          
        </div>
        <!-- Testi Start -->
        <section class="section" style="background: url('images/3.jpg') center center;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row py-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="tiny-single-item">
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/01.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Thomas Israel </h6>
                            </div>
                            
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/02.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Carl Oliver </h6>
                            </div>
                            
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/03.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Barbara McIntosh </h6>
                            </div>
                            
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/04.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Christa Smith </h6>
                            </div>
                            
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/05.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Dean Tolle </h6>
                            </div>
                            
                            <div class="tiny-slide client-testi text-center">
                                <img src="images/client/06.jpg" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                <p class="text-light para-dark h5 fw-normal fst-italic mt-4">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <h6 class="text-light title-dark"> Jill Webb </h6>
                            </div>
                        </div><!--end owl carousel-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Testi End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->
        <!-- FAQ n Contact Start -->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0">How our <span class="text-primary">Site1</span> work ?</h5>
                                <p class="answer text-muted mb-0">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> What is the main process open account ?</h5>
                                <p class="answer text-muted mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> How to make unlimited data entry ?</h5>
                                <p class="answer text-muted mb-0">Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-6 col-12 mt-4 pt-2">
                        <div class="d-flex">
                            <i data-feather="help-circle" class="fea icon-ex-md text-primary me-2 mt-1"></i>
                            <div class="flex-1">
                                <h5 class="mt-0"> Is <span class="text-primary">Site1</span> safer to use with my account ?</h5>
                                <p class="answer text-muted mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row my-md-5 pt-md-3 my-4 pt-2 pb-lg-4 justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title mb-4">Have Question ? Get in touch!</h4>
                            <p class="text-muted para-desc mx-auto">Start working with <span class="text-primary fw-bold">Site1</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                            <a href="page-contact-two.html" class="btn btn-primary mt-4"><i class="uil uil-phone"></i> Contact us</a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-footer">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- FAQ n Contact End -->

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
                                    <p class="mt-4">Start working with Site1 that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="#" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
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
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>

                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Usefull Links</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>

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
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Site1. Design with  <a href="#" target="_blank" class="text-reset"></a>.</p>
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
                    <img src="images/logo1.png" height="24" class="light-version" alt="">
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
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="#" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
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