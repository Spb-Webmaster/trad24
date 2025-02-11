<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <a class="user25_m__video_link" href="#{{ $yakor }}" data-fancybox  wire:click="click_video({{ $video->video }})">
        <span class="_play_"></span>
        <img    loading="lazy" class="pc_category_img" width="210" height="120" data-url_video="{{ $video->video }}"  src="{{preview($video->video)}}" alt="photo_" title="" />
    </a>
    {{--preview($it->video)--}}

    <div class="F_form  F_form_order_middle" style="display: none" id="{{ $yakor }}">

        <div class="F_form__body new__temp">
            <div class="new__temp_top">

                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span>{{ __('Просмотр видеоролика') }}</span></div>
                        <div class="F_h2" ><span>{{ $video->title }}</span></div>
                    </div>
                </div>

                <div class="_video_emb pad_t0_important">
                    {!!  render_video($video->video, 752, 425)  !!}
                </div>
                <br>
                <div class="F_h1"><span>{{ $video->title }}</span></div>

                <div class="_articles_text desc pad_t20_important pad_b20_important">{!!   $video->article !!}</div>

            </div><!--.new__temp_top-->


            <div class="new__temp_middle">
                <div class="alax_inputs">

                </div><!--.alax_inputs-->


            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

</div>
