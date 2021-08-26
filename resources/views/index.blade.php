@extends('includes.front_design')


@section('content')


    <!-- End / Hidden Bar -->

    <!--Main Slider-->
    <section class="main-slider">
    	<div class="auto-container">
        	<div class="single-item-carousel owl-carousel owl-theme">
                @foreach($latest_news as $news)

            	<!--Slide-->
                <div class="slide">
                	<figure class="image">
                    	<a href="{{route('newsSingle',$news->slug)}}"><img src="{{asset('/storage/uploads/'.$news['image'])}}" alt="" /></a>
                    </figure>
                	<div class="overlay-box">
                    	<div class="overlay-inner">
                        	<div class="content">
                            	<div class="category"><a href="{{route('newsSingle',$news->slug)}}">{{ $news->category->category_name }}</a></div>
                                <h2><a href="{{route('newsSingle',$news->slug)}}"> {{ $news->news_title }}</a></h2>
                                <ul class="post-meta">
                                	<li><span class="icon qb-clock"></span> {{ $news->created_at->diffForHumans() }}</li>
                                    <li><span class="icon qb-eye"></span>{{$news->view_count}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    @foreach ($categories as $category)

                    <!--Category Tabs Box-->
                    <div class="category-tabs-box">
                        <!--Product Tabs-->
                        <div class="prod-tabs tabs-box">

                            <!--Tab Btns-->
                            <div class="tab-btns tab-buttons clearfix">
                            	<div class="pull-left">
                                	<div class="category">{{$category->category_name}}</div>
                                </div>


                            </div>

                            <!--Tabs Container-->
                            <div class="tabs-content">

                                <!--Tab / Active Tab-->
                                <div class="tab active-tab" id="prod-alls">
                                    <div class="content">
                                        <div class="row clearfix">
                                        	<div class="column col-md-6 col-sm-6 col-xs-12">
                                            	<div class="single-item-carousel owl-carousel owl-theme">
                                                    @php $news_category = \App\Models\News::where('category_id', $category->id)->latest()->take(5)->get(); @endphp
                                                    @foreach ($news_category as $cat_news)


                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$cat_news['image'])}}" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">{{ $cat_news->news_title }}</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>{{$cat_news->created_at->diffForHumans()}}</li>

                                                                    <li><span class="icon fa fa-eye"></span>{{$cat_news->view_count}}</li>
                                                                </ul>
                                                                <div class="text">
                                                                    {{ Str::limit(strip_tags($cat_news->news_content), 200, '...') }}

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach


                                                 </div>
                                            </div>
                                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                                @foreach ($categories_news_view  as $cat_news_view )
                                                      @if($category->id == $cat_news_view->category_id)



                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$cat_news_view['image'])}}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">{{$cat_news_view->news_title}}</a></div>
                                                    <div class="post-info">{{$cat_news_view->created_at->diffForHumans()}}</div>
                                                </article>
                                                @endif
                                                @endforeach

                                                <!--Widget Post-->


                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="prod-design">
                                    <div class="content">
                                        <div class="row clearfix">
                                        	<div class="column col-md-6 col-sm-6 col-xs-12">
                                            	<div class="single-item-carousel owl-carousel owl-theme">

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                 </div>
                                            </div>
                                            <div class="column col-md-6 col-sm-6 col-xs-12">

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-1.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Priyanka Chopra got her what photoshopped?</a></div>
                                                    <div class="post-info">April 01, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">American Black Film Festival New projects from film TV</a></div>
                                                    <div class="post-info">April 03, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-2.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Jerry Seinfeld grabs coffee with Margaret Cho and it gets</a></div>
                                                    <div class="post-info">April 02, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-4.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Amy Schumer swaps lives with Anna Wintour</a></div>
                                                    <div class="post-info">April 04, 2016</div>
                                                </article>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="prod-fashion">
                                    <div class="content">
                                        <div class="row clearfix">
                                        	<div class="column col-md-6 col-sm-6 col-xs-12">
                                            	<div class="single-item-carousel owl-carousel owl-theme">

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                 </div>
                                            </div>
                                            <div class="column col-md-6 col-sm-6 col-xs-12">

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-3.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">American Black Film Festival New projects from film TV</a></div>
                                                    <div class="post-info">April 03, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-4.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Amy Schumer swaps lives with Anna Wintour</a></div>
                                                    <div class="post-info">April 04, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-1.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Priyanka Chopra got her what photoshopped?</a></div>
                                                    <div class="post-info">April 01, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-2.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Jerry Seinfeld grabs coffee with Margaret Cho and it gets</a></div>
                                                    <div class="post-info">April 02, 2016</div>
                                                </article>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="prod-sports">
                                    <div class="content">
                                        <div class="row clearfix">
                                        	<div class="column col-md-6 col-sm-6 col-xs-12">
                                            	<div class="single-item-carousel owl-carousel owl-theme">

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                 </div>
                                            </div>
                                            <div class="column col-md-6 col-sm-6 col-xs-12">

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-2.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Jerry Seinfeld grabs coffee with Margaret Cho and it gets</a></div>
                                                    <div class="post-info">April 02, 2016</div>
                                                    Lif    </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-4.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Amy Schumer swaps lives with Anna Wintour</a></div>
                                                    <div class="post-info">April 04, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-1.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Priyanka Chopra got her what photoshopped?</a></div>
                                                    <div class="post-info">April 01, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-3.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">American Black Film Festival New projects from film TV</a></div>
                                                    <div class="post-info">April 03, 2016</div>
                                                </article>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="prod-money">
                                    <div class="content">
                                        <div class="row clearfix">
                                        	<div class="column col-md-6 col-sm-6 col-xs-12">
                                            	<div class="single-item-carousel owl-carousel owl-theme">

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--News Block Two-->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-5.jpg" alt="" /></a>
                                                                <div class="category"><a href="#">Travel</a></div>
                                                            </div>
                                                            <div class="lower-box">
                                                                <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                <ul class="post-meta">
                                                                    <li><span class="icon fa fa-clock-o"></span>March 16, 2016</li>
                                                                    <li><span class="icon fa fa-comment-o"></span>3</li>
                                                                    <li><span class="icon fa fa-eye"></span>1524</li>
                                                                </ul>
                                                                <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                 </div>
                                            </div>
                                            <div class="column col-md-6 col-sm-6 col-xs-12">

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-2.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Jerry Seinfeld grabs coffee with Margaret Cho and it gets</a></div>
                                                    <div class="post-info">April 02, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-1.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Priyanka Chopra got her what photoshopped?</a></div>
                                                    <div class="post-info">April 01, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-3.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">American Black Film Festival New projects from film TV</a></div>
                                                    <div class="post-info">April 03, 2016</div>
                                                </article>

                                                <!--Widget Post-->
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-4.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Amy Schumer swaps lives with Anna Wintour</a></div>
                                                    <div class="post-info">April 04, 2016</div>
                                                </article>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--End Category Info Tabs-->

                    <!--Category Tabs Box-->

                    <!--End Category Info Tabs-->
                    @endforeach
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar default-sidebar right-sidebar">

                    	<!--Social Widget-->
                        <div class="sidebar-widget sidebar-social-widget">
                            <div class="sidebar-title">
                                <h2>Follow Us</h2>
                            </div>
                            <ul class="social-icon-one alternate">
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
                    	<!--End Social Widget-->

                    	<!--Adds Widget-->
                        <div class="sidebar-widget sidebar-adds-widget">
                        	<div class="adds-block" style="background-image:url(public/safal.gif);">
                            	<div class="inner-box">
                                	<div class="text">Advertisement <span> 340 x 283</span></div>
                                    <a href="#" class="theme-btn btn-style-two">Purchase Now</a>
                                </div>
                            </div>
                        </div>
                        <!--Ends Adds Widget-->

                        <!--News Post Widget-->
                        <div class="sidebar-widget posts-widget">

                            <!--Product widget Tabs-->
                            <div class="product-widget-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-popular" class="tab-btn active-btn">Popular</li>
                                        <li data-tab="#prod-recent" class="tab-btn">Recent</li>
                                        <li data-tab="#prod-comment" class="tab-btn">Comments</li>
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->



                                        <div class="tab active-tab" id="prod-popular">
                                            <div class="content">
                                                @foreach ($popular_news as $popular)

                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="{{route('newsSingle', $popular->slug)}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$popular['image'])}}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="{{route('newsSingle', $popular->slug)}}">{{$popular->news_title}}</a></div>
                                                    <div class="post-info">{{$popular->created_at->diffForHumans()}}</div>
                                                </article>
                                                @endforeach


                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="prod-recent">
                    						<div class="content">
                                                @foreach ($recent_news as $post)



                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="{{route('newsSingle', $post->slug)}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$post['image'])}}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="{{asset('/storage/uploads/'.$post['image'])}}">{{$post->news_title}}</a></div>
                                                    <div class="post-info">{{$post->created_at->diffForHumans()}}</div>
                                                </article>

                                                @endforeach

                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="prod-comment">
                                            <div class="content">

                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-3.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">American Black Film Festival New projects from film TV</a></div>
                                                    <div class="post-info">April 03, 2016</div>
                                                </article>

                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-4.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Amy Schumer swaps lives with Anna Wintour</a></div>
                                                    <div class="post-info">April 04, 2016</div>
                                                </article>

                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-1.jpg" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="blog-single.html">Priyanka Chopra got her what photoshopped?</a></div>
                                                    <div class="post-info">April 01, 2016</div>
                                                </article>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!--End Product Info Tabs-->

                        </div>
                        <!--End Post Widget-->

                        <!--Category Widget-->
                        <div class="sidebar-widget categories-widget">
                            <div class="sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            @foreach ($categories as $category)


                            <ul class="cat-list">
                            	<li class="clearfix"><a href="#">{{$category->category_name}} <span>(30)</span></a></li>
                                @endforeach
                            </ul>

                        </div>
                        <!--End Category Widget-->

                    </aside>
               	</div>

            </div>

            <!--Fullwidth Add-->
            <div class="fullwidth-add text-center">
            	<div class="image">
                	<a href="#"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/add-1.jpg" alt="" /></a>
                </div>
            </div>

        </div>
    </div>
    <!--End Sidebar Page Container-->

    <!--Blog Carousel Section-->
    <section class="blog-carousel-section grey-bg">
    	<div class="auto-container">
        	<div class="three-item-carousel owl-carousel owl-theme">

            	<!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-7.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                    <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>0</li>
                                        <li><span class="icon qb-eye"></span>740</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-8.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Sports</a></div>
                                    <h3><a href="blog-single-2.html">Does the festival have popular Design support</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 04, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>5</li>
                                        <li><span class="icon qb-eye"></span>2640</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-9.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Fashion</a></div>
                                    <h3><a href="blog-single-2.html">What is the festival about happens </a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 05, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>9</li>
                                        <li><span class="icon qb-eye"></span>1577</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-7.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                    <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>0</li>
                                        <li><span class="icon qb-eye"></span>740</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-8.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Sports</a></div>
                                    <h3><a href="blog-single-2.html">Does the festival have popular Design support</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 04, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>5</li>
                                        <li><span class="icon qb-eye"></span>2640</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-9.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Fashion</a></div>
                                    <h3><a href="blog-single-2.html">What is the festival about happens </a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 05, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>9</li>
                                        <li><span class="icon qb-eye"></span>1577</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img  class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-7.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                    <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>0</li>
                                        <li><span class="icon qb-eye"></span>740</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-8.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Sports</a></div>
                                    <h3><a href="blog-single-2.html">Does the festival have popular Design support</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 04, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>5</li>
                                        <li><span class="icon qb-eye"></span>2640</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-9.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Fashion</a></div>
                                    <h3><a href="blog-single-2.html">What is the festival about happens </a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 05, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>9</li>
                                        <li><span class="icon qb-eye"></span>1577</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-7.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                    <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>0</li>
                                        <li><span class="icon qb-eye"></span>740</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-8.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Sports</a></div>
                                    <h3><a href="blog-single-2.html">Does the festival have popular Design support</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 04, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>5</li>
                                        <li><span class="icon qb-eye"></span>2640</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block Three-->
            	<div class="news-block-three">
                	<div class="inner-box">
                    	<div class="image">
                        	<img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-9.jpg" alt="" />
                            <div class="overlay-box">
                            	<a href="blog-single-2.html" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                	<div class="tag"><a href="blog-single-2.html">Fashion</a></div>
                                    <h3><a href="blog-single-2.html">What is the festival about happens </a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>March 05, 2016</li>
                                        <li><span class="icon fa fa-comment-o"></span>9</li>
                                        <li><span class="icon qb-eye"></span>1577</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Blog Carousel Section-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                	<!--Sec Title-->
                    <div class="sec-title">
                    	<h2>Latest News</h2>
                    </div>
                    <div class="content-blocks">
                        @foreach ($news_latest as $data)


                        <!--News Block Four-->
                        <div class="news-block-four">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                        <div class="image">
                                            <a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{asset('/storage/uploads/'.$data['image'])}}" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="content-box col-md-6 col-sm-6 col-xs-12">
                                        <div class="content-inner">
                                            <div class="category"><a href="blog-single.html">{{$data->category->category_name}}</a></div>
                                            <h3><a href="blog-single.html">{{$data->news_title}}</a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon fa fa-clock-o"></span>{{$data->created_at->diffForHumans()}}</li>
                                                <li><span class="icon fa fa-eye"></span>{{$data->view_count}}</li>
                                            </ul>
                                            <div class="text">
                                                {{Str::limit(strip_tags($data->news_content),200,'...')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        @endforeach


                    </div>

                     <!-- Styled Pagination -->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                            {{$news_latest->links()}}
                        </ul>
                    </div>

                </div>

                <!--Sidebar Side-->
                {{-- <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar default-sidebar">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search" required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>

                        <!--Recent News Widget-->
                        <div class="sidebar-widget recent-news-widget home-one">
                        	<div class="sec-title">
                            	<h2>Recent Reviews</h2>
                            </div>
                        	<!--News Block Five-->
                            <div class="news-block-five">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/news-14.jpg" alt="" /></a>
                                        <div class="category"><a href="blog-single.html">Travel</a></div>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="blog-single.html">Casto dog meat festival begins in China amid widespread criticism</a></h3>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star light"></span>
                                            <span class="total-rating">9.3</span>
                                        </div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>
                                    </div>
                                </div>
                            </div>

                        	<!--Widget Post Two-->
                            <article class="widget-post-two">
                                <div class="inner">
                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                    <div class="text"><a href="blog-single.html">A young woman holding a beautiful umbrella in the rain</a></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star light"></span>
                                        <span class="total-rating">7.2</span>
                                    </div>
                                </div>
                            </article>

                        	<!--Widget Post Two-->
                            <article class="widget-post-two">
                                <div class="inner">
                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-2.jpg" alt=""></a></figure>
                                    <div class="text"><a href="blog-single.html">Fix an Exchange Rate now with a Forward Contract</a></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="total-rating">9.0</span>
                                    </div>
                                </div>
                            </article>

                        	<!--Widget Post Two-->
                            <article class="widget-post-two">
                                <div class="inner">
                                    <figure class="post-thumb"><a href="blog-single.html"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="images/resource/post-thumb-3.jpg" alt=""></a></figure>
                                    <div class="text"><a href="blog-single.html">Study the New Digital Course Developed with Google</a></div>
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star light"></span>
                                        <span class="total-rating">5.3</span>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <!--Tweet Widget-->
                        <div class="sidebar-widget tweet-widget">
                        	<div class="sec-title">
                            	<h2>Recent Tweets</h2>
                            </div>
                            <div class="single-item-carousel owl-carousel owl-theme">
                            	<div class="tweet-block">
                                	<div class="inner-box">
                                    	<div class="tweet-icon">
                                        	<span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">Under a week until our iTunes redesign contest closes. Don't miss the chance to share in $2000 in valuable super prizes!</div>
                                       <div class="post-time">2 Hours Ago</div>
                                    </div>
                                </div>

                                <div class="tweet-block">
                                	<div class="inner-box">
                                    	<div class="tweet-icon">
                                        	<span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">Under a week until our iTunes redesign contest closes. Don't miss the chance to share in $2000 in valuable super prizes!</div>
                                       <div class="post-time">2 Hours Ago</div>
                                    </div>
                                </div>

                                <div class="tweet-block">
                                	<div class="inner-box">
                                    	<div class="tweet-icon">
                                        	<span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">Under a week until our iTunes redesign contest closes. Don't miss the chance to share in $2000 in valuable super prizes!</div>
                                       <div class="post-time">2 Hours Ago</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </aside>
                </div> --}}

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->

    <!--Main Footer-->

    <!--End Main Footer-->



@endsection
