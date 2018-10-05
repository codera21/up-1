<!-- Footer Section Start -->
<footer>
    <!-- Footer Container Start -->
    <div class="container footer-text">
        <!-- About Us Section Start -->
        <div class="col-sm-4">
            <h4>About Us</h4>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged.
            </p>
            <h4>Follow Us</h4>
            <ul class="list-inline">
                <li>
                    <a href="#"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#ccc"
                                    data-hc="#ccc"></i>
                    </a>
                </li>
                <li>
                    <a href="#"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#ccc"
                                    data-hc="#ccc"></i>
                    </a>
                </li>
                <li>
                    <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true"
                                    data-c="#ccc" data-hc="#ccc"></i>
                    </a>
                </li>
                <li>
                    <a href="#"> <i class="livicon" data-name="linkedin" data-size="18" data-loop="true" data-c="#ccc"
                                    data-hc="#ccc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- //About Us Section End-->
        <!-- Contact Section Start -->
        <div class="col-sm-4">
            <h4>Contact Us</h4>
            <ul class="list-unstyled">
                <li>35,Lorem Lis Street, Park Ave</li>
                <li>Lis Street, India.</li>
                <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i>Phone:9140 123 4588
                </li>
                <li><i class="livicon icon4 icon3" data-name="printer" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> Fax:400 423 1456
                </li>
                <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> Email:<span class="success">
                        <a href="mailto:">info@joshadmin.com</a></span>
                </li>
                <li><i class="livicon icon4 icon3" data-name="skype" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> Skype:
                    <span class="success">Joshadmin</span>
                </li>
            </ul>
            <div class="news">
                <h4>News letter</h4>
                <p>subscribe to our newsletter and stay up to date with the latest news and deals</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="yourmail@mail.com"
                           aria-describedby="basic-addon2">
                    <a href="#" class="btn btn-primary text-white" role="button">Subscribe</a>
                </div>
            </div>
        </div>
        <!-- //Contact Section End -->
        <!-- Recent post Section Start -->
        <div class="col-sm-4">
            <h4>Recent Posts</h4>
            <div class="media">
                <div class="media-left media-top">
                    <a href="#">
                        <img class="media-object" src="images/image_14.jpg" alt="image">
                    </a>
                </div>
                <div class="media-body">
                    <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry
                        dummy.<i class="pull-right">John Doe</i></p>

                </div>
            </div>
            <div class="media">
                <div class="media-left media-top">
                    <a href="#">
                        <img class="media-object" src="images/image_15.jpg" alt="image">
                    </a>
                </div>
                <div class="media-body">
                    <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry
                        dummy.<i class="pull-right">John Doe</i></p>

                </div>
            </div>
            <div class="media">
                <div class="media-left media-top">
                    <a href="#">
                        <img class="media-object" src="images/image_13.jpg" alt="image">
                    </a>
                </div>
                <div class="media-body">
                    <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry
                        dummy.
                        <i class="pull-right">John Doe</i>
                    </p>
                </div>
            </div>
            <div class="media">
                <div class="media-left media-top">
                    <a href="#">
                        <img class="media-object" src="images/c1.jpg" alt="image">
                    </a>
                </div>
                <div class="media-body">
                    <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry
                        dummy.<i class="pull-right">John Doe</i>
                    </p>

                </div>
            </div>
        </div>
        <!-- //Recent Post Section End -->
    </div>
    <!-- Footer Container Section End -->
</footer>
<!-- //Footer Section End -- >
<!-- Copy Right Section Start -->
<div class="copyright">
    <div class="container">
        <p>Copyright &copy; Josh Admin Template, 2015</p>
    </div>
</div>
<!-- //Copy right Section End -->
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<script>
    $('.autoplay').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: $('.previous'),
        nextArrow: $('.next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.autoplay1').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

</script>