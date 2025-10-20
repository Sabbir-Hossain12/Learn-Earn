<!-- register__section__start-->
<div class="registerarea sp_top_90">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                <div class="registerarea__wraper">
                    <div class="section__title registerarea__section__title">

                        <div class="section__title__heading heading__underline">
                            <h2>Register as a <span>Teacher </span>and Earn<small>Through</small> online courses
                            </h2>
                        </div>
                    </div>
                    <div class="registerarea__content">
                        <div class="registerarea__video">
                            <div class="video__pop__btn">
                                <a class="video-btn" href="{{ $heroBanner->video_url ?? '' }}"> <img loading="lazy" src="{{ asset('frontend') }}/img/icon/video.png" alt=""></a>
                            </div>

                            <div class="registerarea__para">
                                <p>Teach Something new &amp; Build Your Career From Anywhere In The World</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                <div class="registerarea__form">
                    <div class="registerarea__form__heading">
                        <h4>Fill Your Registration</h4>
                    </div>
                    <form action="{{ route('register-as-teacher') }}" method="post" id="teacher-registration-section">
                        @csrf
                        <input class="register__input" type="text" placeholder="Your Name" name="name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row">
                            <div class="col-xl-6">
                                <input class="register__input" type="text" name="email" placeholder="Email Address" required>
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-xl-6">
                                <input class="register__input" type="text" name="phone" placeholder="Phone" required>
                            </div>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input class="register__input" type="text" name="address" placeholder="Address">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea class="register__input textarea" name="info" id="#" cols="30" rows="10">Educational Qualification or Experience</textarea>
                        @error('info')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="registerarea__button">
                            <button type="submit" class="default__button">Sign Up
                                <i class="icofont-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="registerarea__img">
        <img loading="lazy" class="register__1" src="{{asset('frontend')}}/img/register/register__1.png" alt="register">
        <img loading="lazy" class="register__2" src="{{asset('frontend')}}/img/register/register__2.png" alt="register">
        <img loading="lazy" class="register__3" src="{{asset('frontend')}}/img/register/register__3.png" alt="register">
    </div>
</div>
<!-- register__section__start-->
