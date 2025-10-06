<div class="dashboard__content__wraper" id="dashboardSummerSection">
    <div class="dashboard__section__title">
        <h4>Summery</h4>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
            <div class="dashboard__single__counter">
                <div class="counterarea__text__wraper">
                    <div class="counter__img">
                        <img loading="lazy"
                             src="{{asset('frontend')}}/img/counter/counter__1.png"
                             alt="counter">
                    </div>
                    <div class="counter__content__wraper">
                        <div class="counter__number">
                            <span class="counter">{{$enrollments_count ?? 0}}</span>+

                        </div>
                        <p>Enrolled Courses</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
            <div class="dashboard__single__counter">
                <div class="counterarea__text__wraper">
                    <div class="counter__img">
                        <img loading="lazy"
                             src="{{asset('frontend')}}/img/counter/counter__2.png"
                             alt="counter">
                    </div>
                    <div class="counter__content__wraper">
                        <div class="counter__number">
                            <span class="counter">{{$course_count ?? 0}}</span>+

                        </div>
                        <p>Active Courses</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
            <div class="dashboard__single__counter">
                <div class="counterarea__text__wraper">
                    <div class="counter__img">
                        <img loading="lazy"
                             src="{{asset('frontend')}}/img/counter/counter__3.png"
                             alt="counter">
                    </div>
                    <div class="counter__content__wraper">
                        <div class="counter__number">
                            <span class="counter">{{$exam_count ?? 0}}</span>
                        </div>
                        <p>Exam Given</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="dashboard__section__title">
            <h4>Affiliate</h4>
        </div>
        <div class="row">
            {{-- Affiliate --}}
            {{-- My Shop --}}
            <a href="{{ route('student.dashboard.my-shop') }}">
                <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                    <div class="dashboard__single__counter">
                        <div class="counterarea__text__wraper">
                            <div class="counter__img">
                                <img loading="lazy"
                                     src="{{asset('frontend')}}/img/counter/counter__3.png"
                                     alt="counter">
                            </div>
                            <div class="counter__content__wraper">
                                <p>My Shop</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            {{--Pending Orders--}}
            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <div class="dashboard__single__counter">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img loading="lazy"
                                 src="{{asset('frontend')}}/img/counter/counter__3.png"
                                 alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="counter">{{ $pendingOrders ?? 0}}</span>
                            </div>
                            <p>Pending Orders</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Successful Orders --}}
            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <div class="dashboard__single__counter">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img loading="lazy"
                                 src="{{asset('frontend')}}/img/counter/counter__3.png"
                                 alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="counter">{{ $successOrders ?? 0}}</span>
                            </div>
                            <p>Successful Orders</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Sales --}}
            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <div class="dashboard__single__counter">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img loading="lazy"
                                 src="{{asset('frontend')}}/img/counter/counter__3.png"
                                 alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="counter">{{ $totalSales ?? 0 }}</span>
                            </div>
                            <p>Total Sales</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Account Balance --}}
            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <div class="dashboard__single__counter">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img loading="lazy"
                                 src="{{asset('frontend')}}/img/counter/counter__3.png"
                                 alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="counter">{{ $account_balance ?? 0 }}</span>
                            </div>
                            <p>Account Balance</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Withdraw Balance --}}
            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                <div class="dashboard__single__counter">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img loading="lazy"
                                 src="{{asset('frontend')}}/img/counter/counter__3.png"
                                 alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="counter">{{ $withdrawal_balance ?? 0 }}</span>
                            </div>
                            <p>Withdraw Balance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
