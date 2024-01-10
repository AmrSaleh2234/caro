<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>
                    <p>{{ __('Users') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{ route('admin.users.type',['admin']) }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3>{{ $product_count }}</h3>
                    <p>{{ __('Products') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-menu"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $order_count }}</h3>
                        <p>{{ __('Orders') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-cart"></i>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $order_sum }}</h3>
                        <p>{{ __('Total Order') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-usd"></i>
                    </div>
                    <a href="{{ route('admin.orders.type',['deliver']) }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-sm-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $client_count }}</h3>
                        <p>{{ __('Clients') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-happy"></i>
                    </div>
                    <a href="{{ route('admin.users.type',['client']) }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-sm-6">
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{{ $offer_count }}</h3>
                        <p>{{ __('Offers') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>
                    <a href="{{ route('admin.products.index',['offer'=>1]) }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <div class="col-lg-3 col-sm-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $contact_count }}</h3>
                            <p>{{ __('Contact Us') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                        <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $review_count }}</h3>
                    <p>{{ __('Reviews') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-star"></i>
                </div>
                <a href="{{ route('admin.reviews.index') }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $fav_count }}</h3>
                    <p>{{ __('Favorites') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-heart"></i>
                </div>
                <a href="{{ route('admin.favorites.index') }}" class="small-box-footer">{{ __('Show All') }} <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
