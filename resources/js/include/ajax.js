export function object_delete() {

    /* удаление ранее созданных билетов */
    $('body').on('click', '.cart_icon__js', function (event) {


        if(confirm('Удаление. Вы уверены?')) {

            let Objects = [];
            $('input[type="checkbox"].checkbox_change').each(function (i) {
                if ($(this).is(':checked')) {
                    let Ob = {object: $(this).data('object')};
                    Objects.push(Ob);
                }
            });
            let Model = $(this).data('model');


            $.ajax({
                url: "/cabinet/object-delete",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "objects": Objects,
                    "model": Model,


                },
                success: function (response) {
                    if (response.error) {

                        console.log(response.error)


                    } else {
                        //console.log(response.result) // количество удаленных
                       window.location.reload();


                    }
                }
            });
        } // confirm

    });
}
export function object_one_delete() {

    /* удаление ранее созданных билетов */
    $('body').on('click', '.m_trush__js', function (event) {


        if(confirm('Удаление. Вы уверены?')) {

            let Object = $(this).data('object');
            let Model = $(this).data('model');



            $.ajax({
                url: "/cabinet/object-one-delete",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "object": Object,
                    "model": Model,

                },
                success: function (response) {
                    if (response.error) {

                        console.log(response.error)

                    } else {

                        window.location.reload();


                    }
                }
            });
        } // confirm

    });
}

export function published_user() {

    /* удаление ранее созданных билетов */
    $('input[type="checkbox"].published_user__js').on('change', function () {

        var Published = 0;
        let UserId = $(this).data('user_id');
        if ($(this).is(':checked')) {
            Published = 1;
        }



            $.ajax({
                url: "/cabinet/published_user",
                method: "POST",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "published": Published,
                    "id": UserId,

                },
                success: function (response) {
                    if (response.error) {

                        console.log(response.error)

                    } else {
                     //   console.log(response.result) // 1
                        if(response.result) {
                            if(Published === 1) {
                                $('.user_blocked__right').html('<span class="green_mess">Опубликован</span>');
                            } else {
                                $('.user_blocked__right').html('<span class="red_mess">Заблокирован</span>');
                            }
                        }
                       // window.location.reload();


                    }
                }
            });

    });
}


/*  загрузка аватара */
export function upload_f() {


    $('.upload_f').change(function (event) {
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var Parent = $(this).parents('.image-upload__cabinet');
            event.preventDefault();
            let form = $(this).parents('form').get(0);
            let formData = new FormData(form);


            $.ajax({
                async: true,
                url: '/cabinet/upload-avatar',
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                contentType: false,
                data: formData,
                cache: false,
                processData: false,
                success: function (result) {
                    console.log(result);

                    if (result.success == true) {

                        console.log(result.avatar)
                        Parent.find('.site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        $('.site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        if ($('.enter_to_website__a').length) {
                            $('.enter_to_website__a .site_avatar').css('background-image', 'url("' + result.avatar + '")');
                        }
                    } else {
                        console.log(result);
                        alert('Ошибка при загрузке аватара.');

                    }
                },
                error: function (data) {
                    console.log(data.err);
                    console.log(data);
                }
            });


        }
    });
    return true;

}

/*  загрузка аватара */


/*  загрузка фото на стронице user */
export function upload_photo() {
    if ($('#upload-button').length) {
        let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");
        let fileName = document.getElementById("file-name");
        let container = document.querySelector(".drob_container");
        let error = document.getElementById("error");
        let imageDisplay = document.getElementById("image-display");
        let form = document.getElementById("form_drob");
        const fileHandler = (file, name, type) => {
            if (type.split("/")[0] !== "image") {
                //File Type Error
                error.innerText = "Please upload an image file";
                return false;
            }
            error.innerText = "";
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = () => {
                //image and file name
                let imageContainer = document.createElement("figure");
                let img = document.createElement("img");
                img.src = reader.result;
                imageContainer.appendChild(img);
                imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
                imageDisplay.appendChild(imageContainer);
            };


        };

        //Upload Button
        uploadButton.addEventListener("change", () => {
            imageDisplay.innerHTML = "";
            Array.from(uploadButton.files).forEach((file) => {
                //   fileHandler(file, file.name, file.type);
            });

            if ($("#upload-button")[0].files.length > 10) {
                alert('Превышено максимально допустимое количество изображений. Максимально - 10');
                return false;
            }


            form.submit();

        });

        container.addEventListener(
            "dragenter",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.add("active");
            },
            false
        );

        container.addEventListener(
            "dragleave",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.remove("active");
            },
            false
        );

        container.addEventListener(
            "dragover",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.add("active");
            },
            false
        );

        container.addEventListener(
            "drop",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.remove("active");
                let draggedData = e.dataTransfer;
                let files = draggedData.files;
                imageDisplay.innerHTML = "";
                Array.from(files).forEach((file) => {
                    fileHandler(file, file.name, file.type);
                });
            },
            false
        );

        window.onload = () => {
            error.innerText = "";
        };
    }
}

/*  загрузка фото на стронице user */


/*  удаление фото - страница фото user  */
export function delete_photo() {


    $('body').on('click', '.mItemDelete__del__js', function (event) {

        var Id = $(this).data('id');
        var Thumb = $(this).data('thumb');
        var Parent = $(this).parents('.mItem');
        var Token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/cabinet/photo-delete',
            type: 'POST',
            data: {
                "_token": Token,
                "id": Id,
                "thumb": Thumb,
            },

            success: function (response) {

                if (response.error) {
                    alert('Ошибка при удалении файла');
                } else {
                    console.log(response.success);
                    Parent.remove();
                }

            }

        });


    });

    $('body').on('click', '.mItemDelete__js', function (event) {
        $(this).find('.mItemDelete__list').slideToggle();

    });


        return true;

}

/*  удаление фото - страница фото user  */





/*  загрузка тестового видео  */
export function upload_v() {


    $('.upload_v').change(function (event) {
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var Parent = $(this).parents('.parent_upload_v');
            event.preventDefault();
            let form = $(this).parents('form').get(0);
            let formData = new FormData(form);


            $.ajax({
                async: true,
                url: '/cabinet/upload_v',
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                contentType: false,
                data: formData,
                cache: false,
                processData: false,

                success: function (result) {
                    if (result.error) {

                        console.log(result.error)

                    } else {

                        console.log(result.filepath);
                        console.log(result.result);
                        $('#result_upload_video').html(result.filepath);


                    }
                },

                error: function (data) {
                    console.log(data.err);
                    console.log(data);
                }
            });


        }
    });
    return true;

}

