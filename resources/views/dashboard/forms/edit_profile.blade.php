<div class="formCabinet">
    <x-forms.auth-form
        title=""
        subtitle=""
        action="{{ route('setting.handel') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="c__flex">
            <div class="c__flex_50 c__flex_50_left">

                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        id="registerName"
                        name="name"
                        placeholder="Имя"
                        value="{{ (old('name'))?:$user->name }}"
                        class="input name"
                        required="true"
                        :isError="$errors->has('name')"
                    />
                    <x-forms.error class="error_name"/>

                </div>

                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        id="registerPhone"
                        name="phone"
                        placeholder="Номер телефона"
                        class="input phone"
                        value="{{ (old('phone'))?:$user->phone }}"
                        :isError="$errors->has('phone')"
                    />
                    <x-forms.error class="error_phone"/>

                </div>


                <div class="text_input">


                </div>

            </div><!--.c__flex_50_left-->
            <div class="c__flex_50 c__flex_50_right">

                <div class="text_input">
                    <x-forms.text-input_fromLabel
                        type="text"
                        readonly="readonly"
                        id="registerEmail"
                        name="email"
                        placeholder="E-mail"
                        required="true"
                        class="input email"
                        value="{{ (old('email'))?:$user->email }}"
                        :isError="$errors->has('email')"
                    />
                    <x-forms.error class="error_email"/>

                </div>

                <div class="text_input pad_t8_important">

                    <div class="birthdate_wrap">
                        @if($user->birthdate)
                            <div class="birthdate">
                                {{ __('Дата рождения') }}

                                <div class="birthdate_pic">
                                    <input type="text" name="birthdate" class="datepicker-birthdate"
                                           value="{{ $user->birthdate }}"/>
                                    <a href="javascript:void(0);" class="datepicker-birthdate_result"
                                       id="alternate">{{ rusdate3($user->birthdate) }}</a>
                                </div>
                            </div>
                        @else
                            <div class="birthdate">

                                <span>{{ __('Дата рождения') }}</span>

                                <div class="birthdate_pic">
                                    <input type="text" name="birthdate" class="datepicker-birthdate"
                                           value="1970-01-01"/>
                                    <a href="javascript:void(0);" class="datepicker-birthdate_result"
                                       id="alternate">{{ __('Добавить') }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text_input">


                </div>


            </div><!--.c__flex_50_right-->

        </div><!--.c__flex-->


        <div class="slotButtons slotButtons__right pad_t15">
            <div class=" text_input w_30">
                <input type="hidden" value="{{ $user->id  }}" name="id">
                <x-forms.primary-button>
                    {{ __('Изменить профиль') }}
                </x-forms.primary-button>
            </div>
        </div>

    </x-forms.auth-form>

</div>



