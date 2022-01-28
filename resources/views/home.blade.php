@extends('layouts.app')

@section('content')

 <!-- slider Area Start-->
 <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="hero__caption">
                            <h1>Find your <span>Next tour!</span> </h1>
                            <p>Where would you like to go?</p>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- form -->
                        <form method="POST" action="{{route('searchPT')}}" class="search-box">
                            @csrf
                            <div class="input-form mb-30">
                                <input  name="pays" id="searchPays"type="text" placeholder="Où allez-vous ?">
                            </div>
                            <div class="select-form mb-30">
                                <div class="select-itms">
                                    <select name="select" id="select1">
                                        <option value="1">Appartements</option>
                                        <option value="2">Hotels</option>
                                        <option value="3">Villas</option>
                                        <option value="4">Auberge</option>
                                        <option value="5">Maisons</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-form mb-30">
                                <button type="submit" class="btn btn-primary">search</button>
                            </div>	
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End--> 


<!-- recently added -->
<div class="favourite-place place-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Recently Added</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($ads_data as $elm)          
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-place mb-30">
                    <div class="place-img">
                        <img src="{{ Storage::url($elm->image_path) }}" alt="">
                    </div>
                    <div class="place-cap">
                        <div class="place-cap-top">
                            <span><i class="fas fa-star"></i><span>8.0 Superb</span> </span>
                            <h3><a href="{{ route('showAd', ['id'=> $elm->id]) }}">{{$elm->title}}</a></h3>
                            <p class="dolor">{{$elm->price}}MAD <span>/ Per Person</span></p>
                        </div>
                        <div class="place-cap-bottom">
                            <ul>
                                <li><i class="far fa-clock"></i>{{$elm->time_in_days}} Days</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{$elm->ville}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach                  
        </div>
    </div>
</div>
<!-- recently added End -->

<!-- Les hébergements que les clients adorent  -->
<div class="favourite-place place-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Les hébergements que les clients adorent</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($ads_data as $elm)          
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-place mb-30">
                    <div class="place-img">
                        <img src="{{ Storage::url($elm->image_path) }}" alt="">
                    </div>
                    <div class="place-cap">
                        <div class="place-cap-top">
                            <span><i class="fas fa-star"></i><span>8.0 Superb</span> </span>
                            <h3><a href="{{ route('showAd', ['id'=> $elm->id]) }}">{{$elm->title}}</a></h3>
                            <p class="dolor">{{$elm->price}}MAD <span>/ Per Person</span></p>
                        </div>
                        <div class="place-cap-bottom">
                            <ul>
                                <li><i class="far fa-clock"></i>{{$elm->time_in_days}} Days</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{$elm->ville}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach                  
        </div>
    </div>
</div>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding footer-bg" data-background="assets/img/service/footer_bg.jpg">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                   <div class="single-footer-caption mb-50">
                     <div class="single-footer-caption mb-30">
                          <!-- logo -->
                         <div class="footer-logo">
                             <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                         </div>
                         <div class="footer-tittle">
                             <div class="footer-pera">
                                 <p>Lorem iaspsum doldfor sit amvset, consectetur adipisicing cvelit csed do eiusmod tempor incididucvccnt ut labovre.</p>
                            </div>
                         </div>
                     </div>
                   </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Offers & Discounts</a></li>
                                <li><a href="#"> Get Coupon</a></li>
                                <li><a href="#">  Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>New Products</h4>
                            <ul>
                                <li><a href="#">Woman Cloth</a></li>
                                <li><a href="#">Fashion Accessories</a></li>
                                <li><a href="#"> Man Accessories</a></li>
                                <li><a href="#"> Rubber made Toys</a></li>
                            </ul>
                        </div>
                    </div>  
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                             <li><a href="#">Frequently Asked Questions</a></li>
                             <li><a href="#">Terms & Conditions</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Report a Payment Issue</a></li>
                         </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row pt-padding">
             <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="footer-copy-right">
                     <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
             </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                    <!-- social -->
                    <div class="footer-social f-right">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </div>
             </div>
         </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Les hébergements que les clients adorent  End -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var route = "{{ route('autocomplete-search') }}";
    $('#searchPays').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });
    
</script>
@endsection
