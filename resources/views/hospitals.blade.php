@extends('layout')


@section('hospitals_content')
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
                            <div id="search_toggle_div" class="cbp-filter-item" onclick="toggle_top_search('top-search');"><i class="fa fa-search listing-padding-right"></i>Search</div>
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
                                {{$live_hospital->city}}
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


    
    <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>

@endsection