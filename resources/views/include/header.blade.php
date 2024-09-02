<header>
    <div class="block header_img">
        <div class="header_top">

            <div class="block header_top__flex">
                <div class="h_t_left">
                    <div class="top_hidden_menu">
                        <div class="gamburger menu-trigger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div><!--.h_t_left-->

                <div class="h_t_center">
                    @include('include.blocks.search.top_search')
                </div><!--.h_t_center-->

                <div class="h_t_right">
                    <div class="calendal_events">
                        <a href="#">
                            <span>{{__('Календарь событий')}}</span>
                        </a>
                    </div>
                    <div class="enter_to_LK">
                    @include('include.blocks.enter.enter')
                    </div>
                </div><!--.h_t_right-->

            </div><!--.header_top__flex-->

        </div><!--.header_top-->
        <div class="header_middle">
            <div class="block block_mobile">
                <div class="top_menu top_menu_over">
                    @include('include.menu.top_menu')
                </div>
            </div>

        </div>
    </div><!--.header_img-->
    <div class="header_bottom">

        <div class="block header_bottom__flex">
            <div class="h_b_left">
                @include('include.blocks.logo.top_logo')
            </div><!--.h_b_left-->
            <div class="h_b_right">
                <div class="h_b_right__divs">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <div class="h_b_right__text">
                    {{ __('Межрелигиозное взаимодействие') }}
                </div>
            </div><!--.h_b_right-->
        </div>


    </div>
</header>
