@extends('website.layouts.main')

@section('content')
    <section class="banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="banner_content">
                        <div class="socail_links">
                            <a href="javascript:;"><i class="fa-brands fa-facebook"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-youtube"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-tumblr"></i></a>
                        </div>
                        <h1>Dating for Grown Ups <br> Make a Real Connection</h1>
                        <p>Start meeting singles who are ready to commit today.</p>
                        <div class="actionBtn mt-3">
                            <a href="javascript::">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset(auth()->user()->id))
        <section class="first_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/explore-Image.png') }}" class="img-fluid vert-move"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                        <div class="content">
                            <h2>Start your love story</h2>
                            <p>Lorem: find love with our dating site!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="first_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/explore-Image.png') }}" class="img-fluid vert-move"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="content">
                            <h2>Start your love story</h2>
                            <p>Lorem: find love with our dating site!</p>
                        </div>
                    </div>
                    <div class="col-md-3 align-self-center">
                        <div class="actionBtn  text-right">
                            <a href="{{ route('user.register') }}">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="second_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mainHeading py-5">The No.1 Trusted Dating Site</h2>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/d_1.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h4>Awesome Community</h4>
                        <p>Caramels pie cake pie marshmallow soufflé donut biscuit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/d_2.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h4>Million Members</h4>
                        <p>Caramels pie cake pie marshmallow soufflé donut biscuit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/d_3.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h4>Private Groups</h4>
                        <p>Caramels pie cake pie marshmallow soufflé donut biscuit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/d_4.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h4>Friendly Forums</h4>
                        <p>Caramels pie cake pie marshmallow soufflé donut biscuit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="live_video_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 pl-0">
                    <div class="video_img_div">
                        <img src="{{ asset('website/assets/images/video_img.jpg') }}" class="img-fluid" alt="">
                        <img src="{{ asset('website/assets/images/play-button.svg') }}" class="img-fluid ply_btn_img"
                            alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="content">
                        <h2 class="mainHeading">Explore Dating Advice</h2>
                        <p class="subHeading">Be calm. Be kind. Be yourself.</p>
                        <p class="message">
                            Hello, I’m Sarah and I’m the first Dating AI for Qiupid. <span>What are your preferences?</span>
                        </p>
                        <div class="actionBtns">
                            <div><button>Men</button></div>
                            <div>
                                <button>Women</button>
                            </div>
                            <div>
                                <button>Other</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second_wrap fourth_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="sub_heading">Our Groups</p>
                    <h2 class="mainHeading pb-5">Start your Search Here</h2>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/member-1.png') }}" class="img-fluid" alt="">
                        </div>
                        <h4>Maisha Reid</h4>
                        <h6>Marketing</h6>
                        <p>Quisque sit amet ante vehicula risus pharetra sagittis ac sit amet justo. Duis eu sapien nisl
                            condimentum vitae.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/member-2.png') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h4>Million Members</h4>
                        <h6>Brand Manager</h6>
                        <p>Quisque sit amet ante vehicula risus pharetra sagittis ac sit amet justo. Duis eu sapien nisl
                            condimentum vitae.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/member-3.png') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h4>Private Groups</h4>
                        <h6>General Manager</h6>
                        <p>Quisque sit amet ante vehicula risus pharetra sagittis ac sit amet justo. Duis eu sapien nisl
                            condimentum vitae.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dating_card">
                        <div class="img_div">
                            <img src="{{ asset('website/assets/images/member-4.png') }}" class="img-fluid"
                                alt="">
                        </div>
                        <h4>Friendly Forums</h4>
                        <h6>Dating Expert</h6>
                        <p>Quisque sit amet ante vehicula risus pharetra sagittis ac sit amet justo. Duis eu sapien nisl
                            condimentum vitae.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fifth_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="content">
                        <h2 class="mainHeading py-3">Over 30 Million Downloads</h2>
                        <p>Download eAmo online dating app and you’re always ready to check out profiles near you & chat
                            with real commited singles ready for a real relationship.
                            It puts at the power of eAmo in the palm of your hand for a faster dating experience.​</p>
                        <div class="social_images">
                            <a href="javascript:;">
                                <img src="{{ asset('website/assets/images/store_img.svg') }}" class="img-fluid"
                                    alt="">
                            </a>
                            <a href="javascript:;">
                                <img src="{{ asset('website/assets/images/google_btn_img.webp') }}"
                                    class="google_img img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img_div">
                        <img src="{{ asset('website/assets/images/moblie_app_img.png') }}" class="vert-move img-fluid"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="love_stories_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><i class="fa-solid fa-quote-left"></i></p>
                    <h2 class="mainHeading pb-5">Qiupid Love Stories</h2>
                </div>
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-1.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-2.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-3.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-1.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-2.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-3.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-1.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-3.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="love_story_card">
                                            <div class="img_div">
                                                <img class="d-block w-100"
                                                    src="{{ asset('website/assets/images/member-2.png') }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="content">
                                                <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat,
                                                    accusantium.</h5>
                                                <h6>Witney Austin</h6>
                                                <p>Founder,Some Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carouselArrows">
                            <a class="carousel-control-prevs" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span> -->
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </a>
                            <a class="carousel-control-nexts" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span> -->
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                    <div class="all_review">
                        <a href="javascritp:;">See All Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2 class="mainHeading pb-5">Contact Us</h2>
                    <form action="{{route('user.contect.us')}}" method="post">
@csrf
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">

                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea name="message" name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="actionBtn">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="seventh_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h2>They Met On Qiupid!</h2>
                        <p>We’re incredibly happy & proud to have sparked thousands of
                            encounters & beautiful love stories. So please share your story with us! We need our a daily
                            love fix.</p>
                        <div class="actionBtn mt-5">
                            <a href="javascript:;">Coming Sonn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script></script>
@endpush
