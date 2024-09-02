<div class="cabinet_radius12_fff">
    @include('dashboard.left_bar.avatar')
    <div class="c__title_subtitle">
        <h3 class="F_h1 left_bar__name" title="{{ $user->name }}">{{ $user->name }}</h3>
        <div class="F_h2 left_bar__email pad_t5"><span>{{ $user->email }}</span></div>
        @if($user->phone)
            <div class="left_bar__phone pad_t10"><span>{{ format_phone($user->phone) }}</span></div>
        @endif





    </div>
</div>

<br>
<br>
<div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
    <div class="pd_b_new enter_to_website__a">
        <x-forms.auth-form_mob
            title=""
            subtitle=""
            action="{{ route('logout') }}"
            method="POST"
        >
            <button type="submit" class="enter_to_website__a2"> <span class="sp__kab">{{__('Выход')}}</span> </button>
        </x-forms.auth-form_mob>
    </div>
</div>


