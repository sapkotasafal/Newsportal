<!--Main Footer-->
<footer class="main-footer">
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Widget Column / Reviews Widget-->
                <div class="widget-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget reviews-widget">
                        <h2>Popular Reviews</h2>
                        <!--Review Block-->
                        <div class="review-block">
                            <div class="inner-box">
                                <div class="image"><a href="blog-single-2.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/review-1.jpg" alt="" /></a></div>
                                <div class="text"><a href="blog-single-2.html">A young woman holding a beautiful umbrella in the rain</a></div>
                                <span class="ratings">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star light"></span>
                                    <span>9.0</span>
                                </span>
                            </div>
                        </div>

                        <!--Review Block-->
                        <div class="review-block">
                            <div class="inner-box">
                                <div class="image"><a href="blog-single-2.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/review-2.jpg" alt="" /></a></div>
                                <div class="text"><a href="blog-single-2.html">Study the New Digital Course Developed with Google</a></div>
                                <span class="ratings">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star light"></span>
                                    <span>9.0</span>
                                </span>
                            </div>
                        </div>

                        <!--Review Block-->
                        <div class="review-block">
                            <div class="inner-box">
                                <div class="image"><a href="blog-single-2.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/review-3.jpg" alt="" /></a></div>
                                <div class="text"><a href="blog-single-2.html">A modern day security strategy for your computer</a></div>
                                <span class="ratings">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star light"></span>
                                    <span>9.0</span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Widget Column / Instagram Widget-->
                <div class="widget-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget isntagram-widget">
                        <h2>Instagram Photos</h2>
                        <div class="clearfix">
                            <figure class="image"><a href="/assets/images/resource/news-1.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-1.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-2.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-2.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-3.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-3.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-4.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-4.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-1.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-5.jpg" alt=""></a></figure>
                            <figure class="image"><a href="assets/images/resource/news-2.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-6.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-3.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-7.jpg" alt=""></a></figure>
                            <figure class="image"><a href="/assets/images/resource/news-4.jpg" class="lightbox-image"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/instagram-8.jpg" alt=""></a></figure>
                        </div>
                    </div>

                    <div class="footer-widget popular-tags">
                        <h2>Popular Tags</h2>
                        <a href="#">Design</a>
                        <a href="#">Fashion</a>
                        <a href="#">Money</a>
                        <a href="#">Fashion</a>
                        <a href="#">Entertanment</a>
                        <a href="#">Design</a>
                        <a href="#">Fashion</a>
                        <a href="#">Pixels</a>
                        <a href="#">Business</a>
                        <a href="#">Fashion</a>
                        <a href="#">Design</a>
                    </div>
                </div>

                <!--Widget Column / Popular Widget-->
                <div class="widget-column col-md-4 col-sm-6 col-xs-12">



                    <div class="footer-widget popular-widget">
                        <h2>Popular Posts</h2>
                        <!--News Info-->
                        @foreach ($popular_news as $post )
                        <div class="news-info">
                            <div class="inner-box">
                                <div class="image">
                                    <img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$post['image'])}}" alt="" />
                                    <a class="overlay" href="{{route('newsSingle',$post->slug)}}"><span class="icon fa fa-play"></span></a>
                                </div>
                                <div class="text"><a href="/assets/blog-single-2.html">{{$post->title}}</a></div>
                                <div class="post-date">{{$post->created_at->diffForHumans()}}</div>
                            </div>
                        </div>

                       @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="index.html"></a>
                    </div>
                </div>
                <!--Column-->
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec qua. Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor.</div>
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <ul class="social-icon-one">
                        @if(!empty($social->facebook))
                        <li><a href="{{$social->facebook}}"target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                        @endif
                        @if(!empty($social->twitter))
                        <li><a href="{{$social->twitter}}"target="_blank"><span class="fa fa-twitter"></span></a></li>
                        @endif
                        @if(!empty($social->google))
                        <li><a href="{{$social->google}}"target="_blank"><span class="fa fa-google-plus"></span></a></li>
                        @endif
                        @if(!empty($social->linkedin))
                        <li><a href="{{$social->linkedin}}"target="_blank"><span class="fa fa-linkedin-square"></span></a></li>
                        @endif
                        @if(!empty($social->pinterest))
                        <li><a href="{{$social->pinterest}}"target="_blank"><span class="fa fa-pinterest-p"></span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!--Copyright Section-->
        <div class="copyright-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <ul class="footer-nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Advertisement</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="copyright">&copy; Copyright NINZIO. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!--End Scroll to top-->

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.fancybox.pack.js"></script>
<script src="/assets/js/jquery.fancybox-media.js"></script>
<script src="/assets/js/owl.js"></script>
<script src="/assets/js/appear.js"></script>
<script src="/assets/js/wow.js"></script>
<script src="/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/color-settings.js"></script>
<script id="dsq-count-scr" src="//newsportal-7.disqus.com/count.js" async></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61239347dd75219f"></script>



