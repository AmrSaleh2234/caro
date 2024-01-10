<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            @include('admin.layouts.image-head')
            @if ($user_account->image != null)
                <img src="{{ $user_account->image }}" class="img-circle" alt="User Image">
            @else
                <img src="{{ asset('css/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="pull-right info">
            <p>{{ $user_account->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
        </div>
        </div>
        <ul class="sidebar-menu">
            {{--  <li class="treeview">
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i> <span>{{ __('Site') }}</span>
                </a>
            </li>  --}}
            {{--  @if ($access_all == 1)  --}}
            <li class="treeview @if (isset($class) && $class == 'home') active @endif">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('Home') }}</span>
                </a>
            </li>
            @if (auth()->user()->isAbleTo($access_all_perms))
            <li class="treeview @if (isset($class) && $class == 'setting') active @endif">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-asterisk"></i> <span>{{ __('Setting') }}</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->isAbleTo(['roles.index']))
            <li class="treeview @if (isset($class) && $class == 'role') active @endif">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-wrench"></i> <span>{{ __('Roles') }}</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->isAbleTo(['cities.index', 'regions.index']))
                <li class="treeview  @if (isset($class) && ($class == 'city' || $class == 'region')) active @endif">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>{{ __('Cities') }}</span>
                    </a>
                    <ul class="treeview-menu">
                        @if (auth()->user()->isAbleTo(['cities.index']))
                            <li class="treeview @if (isset($class) && $class == 'city') active @endif">
                                <a href="{{ route('admin.cities.index') }}">
                                    <i class="fa fa-map"></i> <span>{{ __('Cities') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->isAbleTo(['regions.index']))
                            <li class="treeview @if (isset($class) && $class == 'region') active @endif">
                                <a href="{{ route('admin.regions.index') }}">
                                    <i class="fa fa-map-marker"></i> <span>{{ __('Regions') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['branches.index']))
                <li class="treeview @if (isset($class) && $class == 'branch') active @endif">
                    <a href="{{ route('admin.branches.index') }}">
                        <i class="fa fa-location-arrow"></i> <span>{{ __('Branches') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['groups.index']))
                <li class="treeview @if (isset($class) && $class == 'group') active @endif">
                    <a href="{{ route('admin.groups.index') }}">
                        <i class="fa fa-briefcase"></i> <span>{{ __('Groups') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['users.index']))
                <li class="treeview  @if (isset($class) && in_array($class,['admin','delivery','client'])) active @endif">
                    <a href="#">
                        <i class="fa fa-male"></i> <span>{{ __('Users') }}</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview @if (isset($class) && $class == 'admin') active @endif">
                            <a href="{{ route('admin.users.index', ['type' => 'admin']) }}">
                                <i class="fa fa-users"></i> <span>{{ __('Users') }}</span>
                            </a>
                        </li>
                        <li class="treeview @if (isset($class) && $class == 'client') active @endif">
                            <a href="{{ route('admin.users.index', ['type' => 'client']) }}">
                                <i class="fa fa-user-circle"></i> <span>{{ __('Clients') }}</span>
                            </a>
                        </li>
                        <li class="treeview @if (isset($class) && $class == 'delivery') active @endif">
                            <a href="{{ route('admin.users.index', ['type' => 'delivery']) }}">
                                <i class="fa fa-user-circle"></i> <span>{{ __('Deliveries') }}</span>
                            </a>
                        </li>
                    </ul>
            @endif
            @if (auth()->user()->isAbleTo(['orders.index']))
                <li class="treeview @if (isset($class) && $class == 'order') active @endif">
                    <a href="{{ route('admin.orders.index') }}">
                        <i class="fa fa-cart-plus"></i> <span>{{ __('Orders') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['order_rejects.index']))
                <li class="treeview @if (isset($class) && $class == 'order_reject') active @endif">
                    <a href="{{ route('admin.order_rejects.index') }}">
                        <i class="fa fa-question"></i> <span>{{ __('Order Rejects') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['categories.index']))
                <li class="treeview @if (isset($class) && $class == 'category') active @endif">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fa fa-cube"></i> <span>{{ __('Categories') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['products.index']))
                <li class="treeview @if (isset($class) && $class == 'product') active @endif">
                    <a href="{{ route('admin.products.index') }}">
                        <i class="fa fa-window-maximize"></i> <span>{{ __('Products') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['additions.index']))
                <li class="treeview @if (isset($class) && $class == 'addition') active @endif">
                    <a href="{{ route('admin.additions.index') }}">
                        <i class="fa fa-compress"></i> <span>{{ __('Additions') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['pages.index']))
                <li class="treeview @if (isset($class) && $class == 'page') active @endif">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="fa fa-compass"></i> <span>{{ __('Pages') }}</span>
                    </a>
                </li>
                <li class="treeview @if (isset($class) && $class == 'page_slider') active @endif">
                    <a href="{{ route('admin.pages.index',['type'=>'slider']) }}">
                        <i class="fa fa-gift"></i> <span>{{ __('Slider') }}</span>
                    </a>
                </li>
                <li class="treeview @if (isset($class) && $class == 'page_support') active @endif">
                    <a href="{{ route('admin.pages.index',['type'=>'support']) }}">
                        <i class="fa fa-shield"></i> <span>{{ __('Support') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['units.index']))
                <li class="treeview @if (isset($class) && $class == 'unit') active @endif">
                    <a href="{{ route('admin.units.index') }}">
                        <i class="fa fa-mercury"></i> <span>{{ __('Units') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['sizes.index']))
                <li class="treeview @if (isset($class) && $class == 'size') active @endif">
                    <a href="{{ route('admin.sizes.index') }}">
                        <i class="fa fa-sort"></i> <span>{{ __('Sizes') }}</span>
                    </a>
                </li>
            @endif
            {{--  @if (auth()->user()->isAbleTo(['brands.index']))
                <li class="treeview @if (isset($class) && $class == 'brand') active @endif">
                    <a href="{{ route('admin.brands.index') }}">
                        <i class="fa fa-tumblr-square"></i> <span>{{ __('Brands') }}</span>
                    </a>
                </li>
            @endif  --}}
            @if (auth()->user()->isAbleTo(['notifications.index']))
                <li class="treeview @if (isset($class) && $class == 'notification_create') active @endif">
                    <a href="{{ route('admin.notifications.create') }}">
                        <i class="fa fa-bell-slash-o"></i> <span>{{ __('Create Notification') }}</span>
                    </a>
                </li>
                <li class="treeview @if (isset($class) && $class == 'notification') active @endif">
                    <a href="{{ route('admin.notifications.index') }}">
                        <i class="fa fa-bell"></i> <span>{{ __('Notifications') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['favorites.index']))
                <li class="treeview @if (isset($class) && $class == 'favorite') active @endif">
                    <a href="{{ route('admin.favorites.index') }}">
                        <i class="fa fa-heart"></i> <span>{{ __('Favorites') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['reviews.index']))
                <li class="treeview @if (isset($class) && $class == 'review') active @endif">
                    <a href="{{ route('admin.reviews.index') }}">
                        <i class="fa fa-star"></i> <span>{{ __('Reviews') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['coupons.index']))
                <li class="treeview @if (isset($class) && $class == 'coupon') active @endif">
                    <a href="{{ route('admin.coupons.index') }}">
                        <i class="fa fa-credit-card-alt"></i> <span>{{ __('Coupons') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['payments.index']))
                <li class="treeview @if (isset($class) && $class == 'payment') active @endif">
                    <a href="{{ route('admin.payments.index') }}">
                        <i class="fa fa-cc-paypal"></i> <span>{{ __('Payments') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['contacts.index']))
                <li class="treeview @if (isset($class) && $class == 'contact') active @endif">
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="fa fa-envelope"></i> <span>{{ __('Contact Us') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['addresses.index']))
                <li class="treeview @if (isset($class) && $class == 'address') active @endif">
                    <a href="{{ route('admin.addresses.index') }}">
                        <i class="fa fa-map-pin"></i> <span>{{ __('Address') }}</span>
                    </a>
                </li>
            @endif
            {{--  @if (auth()->user()->isAbleTo(['wallets.index']))
                <li class="treeview @if (isset($class) && $class == 'wallet') active @endif">
                    <a href="{{ route('admin.wallets.index') }}">
                        <i class="fa fa-usd"></i> <span>{{ __('Wallets') }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['points.index']))
                <li class="treeview @if (isset($class) && $class == 'point') active @endif">
                    <a href="{{ route('admin.points.index') }}">
                        <i class="fa fa-podcast"></i> <span>{{ __('Points') }}</span>
                    </a>
                </li>
            @endif  --}}
            @if (auth()->user()->isAbleTo(['translations.index']))
                <li class="treeview @if (isset($class) && $class == 'translation') active @endif">
                    <a href="{{ url('') }}/translations">
                        <i class="fa fa-pencil"></i> <span>{{ __('Translations') }}</span>
                    </a>
                </li>
            @endif
            @if (in_array(auth()->user()->type, $access_all_type) &&
                    in_array(auth()->user()->id, $access_all_id) &&
                    auth()->user()->can($access_all_perms))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sitemap"></i> <span>{{ __('Developer') }}</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="{{ route('admin.optimize.clear') }}">
                                <i class="fa fa-refresh"></i> <span>{{ __('Optimize') }}</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="{{ route('admin.optimize') }}">
                                <i class="fa fa-lock"></i> <span>{{ __('Cache') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
