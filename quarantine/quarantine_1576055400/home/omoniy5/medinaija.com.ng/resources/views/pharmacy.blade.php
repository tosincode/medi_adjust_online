@extends('layout')


@section('pharmacy_content')
<div class=" ">
            <div id="top-map" class="div-hide">
                <div id="map"></div>
            </div>
            <div id="top-search" class=" navbar-default navbar ">
                <div class=" navbar-collapse text-left">
                    <form class="form-inline advanced-serach" action="{{url('hospitals_search')}}" method="get">
                         @csrf
                        <div class="container">
                            <div class="input-field">
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="keyword" name="keyword" placeholder="Keyword" value="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group"> <i class="fa fa-chevron-down arrow"></i>
                                        <select name="hospital_category" class="form-control">
                                            <option selected="" value="">Any Category</option>
                                            <option value="General Hospital">General Hospital</option>
                                            <option value="General Medicine">General Medicine</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Specialist Hospital">Specialist Hospital</option>
                                            <option value="Private Hospital">Private Hospital</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control location-input " id="address" name="address" placeholder="Location" value=""> <i class="fa fa-map-marker marker"></i>
                                    <input type="hidden" id="latitude" name="latitude" value="">
                                    <input type="hidden" id="longitude" name="longitude" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control location-input " id="city" name="city" placeholder="City" value="">
                                </div>
                                <div class="">
                                    <div class="form-group search">
                                        <button type="submit" id="submit" name="submit" class="btn-new btn-custom-search "><i class="fa fa-search"></i> <span>Search</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

 <div class="blog-content bg-white">
            <div class="listing-filter-content">
                <div class="container">
                    <div class="clearfix top-8">
                        <div id="js-filters-meet-the-team" class="cbp-l-filters-button cbp-l-filters-left">
                            <div data-filter="" class="cbp-filter-item {{ (request()->is('hospitals')) ? 'active' : '' }}"><a href="/hospitals"> Show All </a></div>
                            <div data-filter="" class="cbp-filter-item {{ (request()->is('general_hospitals')) ? 'active' : '' }}"><a href="/general_hospitals"> GENERAL HOSPITAL </a></div>
                            <div data-filter="" class="cbp-filter-item {{ (request()->is('general_medicine_hospital')) ? 'active' : '' }}" ><a href="/general_medicine_hospital"> General Medicine </a></div>
                            <div data-filter="" class="cbp-filter-item {{ (request()->is('pharmacy')) ? 'active' : '' }}"><a href="/pharmacy"> PHARMACY </a></div>
                            <div data-filter="" class="cbp-filter-item  {{ (request()->is('private_hospitals')) ? 'active' : '' }}"><a href="/private_hospitals"> PRIVATE HOSPITAL </a></div>
                            <div data-filter="" class="cbp-filter-item {{ (request()->is('specialist_hospitals')) ? 'active' : '' }}"><a href="/specialist_hospitals"> SPECIALIST HOSPITAL </a></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
               <div class="row">
                    <div class="col-md-12">
                        <div id="js-grid-meet-the-team" class="cbp cbp-l-grid-team">
                              <?php foreach ($hospitals  as $live_hospital ): ?>  
                            <div class="cbp-item general-medicine ">
                                <a href="/listed_hospital/{{ $live_hospital->id }}" class="" rel="nofollow">
                                    <div class="cbp-caption-defaultWrap">
                                        <div class="image-container" style="background: url({{asset('uploads/images/'.$live_hospital->image)}})  center center no-repeat; background-size: cover;"></div>
                                    </div>
                                    <div class="cbp-caption-activeWrap for-hospital">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-text">VIEW DETAIL</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="/listed_hospital/{{ $live_hospital->id }}" class="cbp-l-grid-team-name">{{$live_hospital->full_name}}</a>
                                <div class="cbp-l-grid-team-position">{{$live_hospital->specialities}}&nbsp;
                                    <div class="stars" style="z-index: 99;position: relative;"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span>(0)</span></div>
                                </div>
                            </div>

                             <?php endforeach ?>
                    </div>
                </div>
            </div>
             {{ $hospitals->links() }}
             <!-- <div class="text-center pt100">
                            <ul class="uou-paginatin list-unstyled">
                                <li class="active"><a href="index.html">1</a></li>
                                <li><a href="page/2/index.html">2</a></li>
                                <li><a href="page/3/index.html">3</a></li>
                                <li>..</li>
                                <li><a href="page/27/index.html">27</a></li>
                                <li></li>
                            </ul>
            </div> -->
        </div>
    </div>

@endsection

@section('hospital_script')

<!-- <script type='text/javascript'>
        var medicaldirectory_data = {
            "ajaxurl": "https:\/\/medinaija.com.ng\/wp-admin\/admin-ajax.php",
            "loading_image": "<img src=\"https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/assets\/img\/loader2.gif\">",
            "current_user_id": "0",
            "login_message": "Please login to remove favorite",
            "Add_to_Favorites": "Add to Favorites",
            "Login_claim": "Please login to Claim The Listing",
            "login_favorite": "Please login to add favorite",
            "login_review": "Please login to add review",
            "ins_lat": "37.4419",
            "ins_lng": "-122.1419",
            "dirs": [{
                "link": "https:\/\/medinaija.com.ng\/hospital\/tai-oworu-memorial-hospital\/",
                "title": "Tai Oworu Memorial Hospital",
                "lat": "",
                "lng": "",
                "address": "12, emmanuel street, palmgrove, shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/mike-bethel-hospital\/",
                "title": "Mike Bethel Hospital",
                "lat": "",
                "lng": "",
                "address": "2, odunsi street, Bariga, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/affirmed-ogp-specialist-nigeria-limited\/",
                "title": "Affirmed Ogp specialist Nigeria limited.",
                "lat": "",
                "lng": "",
                "address": "1B, Williams street, Gbagada, shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/theo-lad-hosoital-maternity\/",
                "title": "Theo Lad Hosoital& Maternity",
                "lat": "",
                "lng": "",
                "address": "51, jagunmolu street, Bariga, shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/didero-medical-centre\/",
                "title": "Didero Medical Centre",
                "lat": "",
                "lng": "",
                "address": "32, eyo street, off shipeolu street, palmgrove, shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/solbi-continental-hospital\/",
                "title": "Solbi Continental Hospital",
                "lat": "",
                "lng": "",
                "address": "2, Fola Agoro street, Fola Agoro, Shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/paragon-medical-centre\/",
                "title": "Paragon Medical Centre",
                "lat": "",
                "lng": "",
                "address": "14, fred Ayamu street, Adelabi, Surulere, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/osuntuyi-medical-centre\/",
                "title": "Osuntuyi Medical Centre",
                "lat": "",
                "lng": "",
                "address": "9, Alhaji Salisu street, Obanikoro, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/trost-pharmacy\/",
                "title": "Trost Pharmacy",
                "lat": "",
                "lng": "",
                "address": "96, shipeolu street, shomolu, Lagos.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }, {
                "link": "https:\/\/medinaija.com.ng\/hospital\/kerson-phamarcy\/",
                "title": "Kerson Phamarcy",
                "lat": "",
                "lng": "",
                "address": "3, williams street, sawmill, gbagada, shomolu.",
                "image": "",
                "marker_icon": "https:\/\/medinaija.com.ng\/wp-content\/themes\/medical-directory\/framework\/hospital-doctor-directory\/\/assets\/images\/map-marker\/map-marker.png"
            }]
        };
    </script> -->
    
    <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>

@endsection