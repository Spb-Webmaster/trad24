<div class="block block_1147 sections">
    <div class="_h1 color_green "><span>{{__('Выберите одно из направлений:')}}</span></div>
    <div class="sections__flex">

        @foreach($religions as $religion)

            <a href="{{ asset('r-'. $religion->slug) }}" class="sect  sect_{{$religion->slug}}">
                <div class="sect__img">
                    <div class="sect_{{$loop->index}} sect__background-image" style="background-image: url('{{ asset('storage/'.$religion->img) }}')" ></div>
                </div>
                <div class="sect__title">
                    <div class="h1"><span>{{ $religion->title }}</span></div>
                </div>
            </a>

        @endforeach

    </div>
</div>

