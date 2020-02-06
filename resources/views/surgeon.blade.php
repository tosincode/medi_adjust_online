@extends('layout')



@section('surgeon_content')

  <div>
            <div id="top-map" class="div-hide">
                <div id="map"></div>
            </div>
            <div id="top-search" class=" navbar-default navbar listing-search ">
                <div class=" navbar-collapse text-left">
                     <form class="form-inline advanced-serach" action="{{url('doctors_search')}}" method="get">
                         @csrf
                        <div class="container">
                            <div class="input-field ">
                                <div class="form-group top-8">
                                    <input type="text" class="form-control " id="keyword" name="keyword" placeholder="Keyword" value="">
                                </div>
                                <div class="form-group top-8"> <i class="fa fa-chevron-down arrow"></i>
                                    <select name="doctor-category" class="form-control">
                                        <option selected="" value="">Any Category</option>
                                        <option value="Cardiologist"><strong>Cardiologist</strong></option>
                                        <option value="Endocrinologist"><strong>Endocrinologist</strong></option>
                                        <option value="General Medicals"><strong>General Medicals</strong></option>
                                        <option value="General Practitioner"><strong>General Practitioner</strong></option>
                                        <option value="Geriatrician"><strong>Geriatrician</strong></option>
                                        <option value="Laboratory Scientist"><strong>Laboratory Scientist</strong></option>
                                        <option value="Nurse"><strong>Nurse</strong></option>
                                        <option value="Optician"><strong>Optician</strong></option>
                                        <option value="Public Health Physician"><strong>Public Health Physician</strong></option>
                                        <option value="Surgery"><strong>Surgery</strong></option>
                                    </select>
                                </div>
                                <div class="form-group top-8">
                                    <input type="text" class="form-control location-input" id="address" name="address" placeholder="Location" value=""> <i class="fa fa-map-marker marker"></i>
                                    <input type="hidden" id="latitude" name="latitude" value="">
                                    <input type="hidden" id="longitude" name="longitude" value="">
                                </div>
                                <div class="form-group top-8">
                                    <input type="text" class="form-control location-input " id="city" name="city" placeholder="City" value="">
                                </div>
                                <div class="form-group search top-8">
                                    <button type="submit" id="submit" name="submit" class="btn-new btn-custom-search "><i class="fa fa-search"></i><span>Search</span></button>
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
                    
                    <div id="js-filters-lightbox-gallery2" class="cbp-l-filters-button cbp-l-filters-left">
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('doctors')) ? 'active' : '' }}"> <a href="/doctors">Show All  </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('cardiologists')) ? 'active' : '' }}"><a href="/cardiologists"> Cardiologist </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('endocrinologists')) ? 'active' : '' }}"><a href="/endocrinologists"> Endocrinologist </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('general_medicals')) ? 'active' : '' }}"><a href="/general_medicals"> General Medicals </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('general_practitioners')) ? 'active' : '' }}"><a href="/general_practitioners"> General Practitioner </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('geriatricians')) ? 'active' : '' }}"><a href="/geriatricians"> Geriatrician </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('laboratory_scientists')) ? 'active' : '' }}"><a href="/laboratory_scientists"> Laboratory Scientist </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('nurses')) ? 'active' : '' }}"><a href="/nurses"> Nurse </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('opticians')) ? 'active' : '' }}"><a href="/opticians"> Optician </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('public_health_physicians')) ? 'active' : '' }}"><a href="/public_health_physicians"> Public Health Physician </a></div>
                        <div data-filter="" class="cbp-filter-item {{ (request()->is('surgeons')) ? 'active' : '' }}"><a href="surgeons"> Surgeon </a></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix top-20">
                            <div id="js-grid-lightbox-gallery" class="cbp">
                              <?php foreach ($doctors  as $doctor ): ?>
                                <div class="cbp-item ">  
                                    <a href="/listed_doctor/{{ $doctor->user_id}}" class="cbp-caption" data-title="" rel="nofollow">
                                        <div class="cbp-caption-defaultWrap">
                                            <div class="image-container" style="background: url({{asset('uploads/images/'.$doctor->image)}})  center center no-repeat; background-size: cover;"></div>
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignLeft">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-title">{{$doctor->full_name}}</div>
                                                    <div class="cbp-l-grid-team-position">{{$doctor->specialities}}
                                    
                                                   </div>
                                                    <div class="cbp-l-caption-desc"></div>
                                                    <div class="cbp-l-caption-desc long">
                                                        <div class="stars" style="z-index: 99;position: relative;"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span>(0)</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </a>

                                </div>  
                                 <?php endforeach ?>

                            </div>
                            <div class="text-center">
                            {{ $doctors->links() }}
                              </div>
                           
                           <!--  <div class="text-center">
                                <ul class="uou-paginatin list-unstyled">
                                    <li class="active"><a href="index.html">1</a></li>
                                    <li><a href="page/2/index.html">2</a></li>
                                    <li><a href="page/3/index.html">3</a></li>
                                    <li>..</li>
                                    <li><a href="page/12/index.html">12</a></li>
                                    <li></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        
        <script type='text/javascript'>
        var medicaldirectory_data = {
           
        };
    </script>


        <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>

@endsection