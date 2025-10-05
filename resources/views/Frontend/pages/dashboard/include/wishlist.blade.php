<div class="dashboard__content__wraper" id="enrolledCourseSection">
    <div class="dashboard__section__title">
        <h4>My Wishlist</h4>
    </div>
    <div class="row">
        <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
            <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one"
                            type="button" aria-selected="true" role="tab">Wishlist
                    </button>
                </li>
            </ul>
        </div>


        <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">

            <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                <div class="row">
                    @forelse($wishCourses as $wishCourse)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="gridarea__wraper">
                                <div class="gridarea__img">

                                    <a href="{{route('course-lessons', $wishCourse->course->slug)}}"><img loading="lazy" src="{{asset($wishCourse->course->thumbnail_img)}}" alt="grid"></a>
                                    <div class="gridarea__small__button gridarea__small__button__1">
                                        <div class="grid__badge">{{ $wishCourse->course->class->title }}</div>
                                    </div>

                                    <div class="gridarea__small__icon">
                                        <a href="javascript:void(0);" class="wishlist" data-course-id="{{ $wishCourse->course->id}}">
                                            <i class="icofont-heart-alt wish-active"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{ $wishCourse->course->lessons->count() }} Lessons
                                            </li>

                                            <li>
                                                <i class="icofont-clock-time"></i> {{ $wishCourse->course->duration }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="{{route('course-lessons', $wishCourse->course->slug)}}">{{ $wishCourse->course->title }}</a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        ৳ {{ $wishCourse->course->sale_price }} <del>/ ৳ {{ $wishCourse->course->regular_price }}</del>
                                        @if($wishCourse->course->sale_price=0)
                                            <span> Free</span>

                                        @else
                                            <span> <del class="del__2">Free</del></span>
                                        @endif


                                    </div>
                                    <div class="gridarea__bottom">

                                        <a href="{{route('teacher.details', $wishCourse->course->teacher->slug)}}">
                                            <div class="gridarea__small__img">
                                                <img loading="lazy" src="{{asset($wishCourse->course->teacher->profile_image ?? 'frontend/img/grid/grid_small_1.jpg')}}"  alt="grid">
                                                <div class="gridarea__small__content">
                                                    <h6>{{$wishCourse->course->teacher->name}}</h6>
                                                </div>
                                            </div>
                                        </a>

                                        {{--                                    <div class="gridarea__star">--}}
                                        {{--                                        <i class="icofont-star"></i>--}}
                                        {{--                                        <i class="icofont-star"></i>--}}
                                        {{--                                        <i class="icofont-star"></i>--}}
                                        {{--                                        <i class="icofont-star"></i>--}}
                                        {{--                                        <i class="icofont-star"></i>--}}
                                        {{--                                        <span>(44)</span>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>


        </div>

    </div>
</div>
