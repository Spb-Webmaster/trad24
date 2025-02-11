<?php


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Support\Flash\Flash;
use Support\Module\Module;
use Illuminate\Support\Facades\Route;


if (!function_exists('flash')) {

    function flash(): Flash
    {
        return app(Flash::class);
    }
}
/* вырезаем из телефона все, кроме цифр */
if (!function_exists('phone')) {
    function phone(string $phone = null): string|int
    {
        return trim(preg_replace('/^1|\D/', "", $phone));
    }
}

/* Более корректная дата рождения birthdate */
if (!function_exists('birthdate')) {
    function birthdate(string $birthdate = null): string|int|null
    {
        if ($birthdate == '1970-01-01') {
            return null;
        }
        return $birthdate;
    }
}


/* Удаляем лэш  */
if (!function_exists('cache_clear ')) {


    function cache_clear($model = null)
    {
        Cache::forget('top_menu');
        Cache::forget('bottom_menu');
        Cache::forget('slider_videos');
        Cache::forget('slider_infos');
        Cache::forget('religion_list');
        Cache::forget('area_list');
        Cache::forget('cities_list');

    }
}


if (!function_exists('format_phone')) {

    function format_phone($from): string
    {
        if ($from) {
            $to = sprintf("%s (%s) %s-%s-%s",
                substr($from, 0, 1),
                substr($from, 1, 3),
                substr($from, 4, 3),
                substr($from, 7, 2),
                substr($from, 9)
            );
            return '+' . $to;
        }
        return '';
    }
}


if (!function_exists('clearFolder')) {

    function clearFolder($path, $disk)
    {

        if (Storage::disk($disk)->directoryExists($path)) {

            $folderPath = public_path('storage/' . $disk . '/' . $path);

            File::deleteDirectory($folderPath);

            return __('Папка успешно очищена и удалена.');

        }
        return __('Папка не существует, файлов не было удалено.');


    }
}


if (!function_exists('module')) {

    function module(): Module
    {
        return app(Module::class);
    }
}


if (!function_exists('num2word')) {

    function num2word($num, $words)
    {
        $num = $num % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1:
            {
                return ($words[0]);
            }
            case 2:
            case 3:
            case 4:
            {
                return ($words[1]);
            }
            default:
            {
                return ($words[2]);
            }
        }
    }


}


if (!function_exists('active_link')) {
    function active_link(string|array $names, string $class = 'active'): string|null
    {

        if (is_string($names)) {
            $names = [$names];
        }
        return Route::is($names) ? $class : null;
    }
}


if (!function_exists('active_linkMenu')) {
    function active_linkMenu($url, string $find = null, string $class = 'active'): string|null
    {

        if ($find) {
            if (str_starts_with(url()->current(), trim($url))) {
                return $class;
            }
            return null;

        }


        return ($url == url()->current()) ? $class : null;
    }
}


if (!function_exists('active_linkParse')) {

    function active_linkParse($url, string $find = null, string $class = 'active'): string|null
    {

        $parse_url = parse_url(url()->current(), PHP_URL_PATH) ?? '/';

        if ($parse_url == '/') {
            /** * мы на главной  */
            if ($url == $parse_url) {
                return $class;
            }
        }

        if ($find) {
            if ($url == '/') {
                /** * мы на главной (дальше не ходим) */
                return null;
            }
            if (str_starts_with(parse_url(url()->current(), PHP_URL_PATH), trim($url))) {
                return $class;
            }
            return null;
        }


        return ($url == url()->current()) ? $class : null;
    }
}


if (!function_exists('active_linkReligion')) {
    function active_linkReligion($array = null, string $class = 'active'): string|null
    {

        $parse_url = parse_url(url()->current(), PHP_URL_PATH) ?? '/';

        if ($array) {
            foreach ($array as $item) {

                if (str_starts_with(parse_url(url()->current(), PHP_URL_PATH), trim($item))) {
                    return $class;
                }

            }

        }


        return null;
    }
}


if (!function_exists('route_name')) {
    function route_name(): string|null
    {

        return Route::currentRouteName();
    }
}


if (!function_exists('shortcode')) {
    function shortcode($html)
    {


        preg_match_all("/\{(.+?)\}/", $html, $matches);
        if ($matches[1]) {
            foreach ($matches[1] as $match) {
                //dd($match);
                $html = str_replace('{' . $match . '}', '<embed style="width: 100%" width="100%" height="480" src="https://www.youtube.com/embed/' . $match . '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></embed>', $html);
            }
            //  return implode(',', $matches[1]);
            return $html;
        }
        return $html;
    }
}


if (!function_exists('rusdate')) {
    function rusdate($date): string|null
    {
        $timestump = strtotime($date);
        $month = [1 => "янв.", 2 => "фев.", 3 => "мар.", 4 => "апр.", 5 => "май", 6 => "июн.", 7 => "июл.", 8 => "авг.", 9 => "сен.", 10 => "окт.", 11 => "ноя.", 12 => "дек."];

        $days = ['(вс)', '(пн)', '(вт)', '(ср)', '(чт)', '(пт)', '(сб)'];

        $day = $days[date("w", strtotime($date))];
        $m = $month[date('n', $timestump)];
        $y = date('Y', $timestump);
        $d = date('d', $timestump);

        return $d . ' ' . $m . ' ' . $y;

    }
}
if (!function_exists('rusdate2')) {
    function rusdate2($date): string|null
    {
        $timestump = strtotime($date);
        $month = [1 => "янв.", 2 => "фев.", 3 => "мар.", 4 => "апр.", 5 => "май", 6 => "июн.", 7 => "июл.", 8 => "авг.", 9 => "сен.", 10 => "окт.", 11 => "ноя.", 12 => "дек."];

        $days = ['(вс)', '(пн)', '(вт)', '(ср)', '(чт)', '(пт)', '(сб)'];

        $day = $days[date("w", strtotime($date))];
        $m = $month[date('n', $timestump)];
        $d = date('d', $timestump);

        return $d . ' ' . $m . ' ' . $day;

    }
}

if (!function_exists('rusdate3')) {
    function rusdate3($date): string|null
    {
        $timestump = strtotime($date);
        $month = [1 => "января", 2 => "февраля", 3 => "марта", 4 => "апреля", 5 => "мая", 6 => "июня", 7 => "июля", 8 => "августа", 9 => "сентября", 10 => "октября", 11 => "ноября", 12 => "декабря"];

        $days = ['(вс)', '(пн)', '(вт)', '(ср)', '(чт)', '(пт)', '(сб)'];

        $day = $days[date("w", strtotime($date))];
        $m = $month[date('n', $timestump)];
        $y = date('Y', $timestump);
        $d = date('d', $timestump);

        return $d . ' ' . $m . ' ' . $y . 'г.';

    }
}
if (!function_exists('convert_bytes')) {

    function convert_bytes($size)
    {
        $i = 0;
        while (floor($size / 1024) > 0) {
            ++$i;
            $size /= 1024;
        }

        $size = str_replace('.', ',', round($size, 1));
        switch ($i) {
            case 0:
                return $size .= ' байт';
            case 1:
                return $size .= ' КБ';
            case 2:
                return $size .= ' МБ';
        }
    }
}
if (!function_exists('file_size')) {
    function file_size(string $image = null)
    {
        if (!$image) {
            return null;
        }

        if (File::exists(public_path('storage/' . $image))) {
            return File::size(public_path('storage/' . $image));
        }
        return false;

    }
}
if (!function_exists('file_mime')) {
    function file_mime(string $image = null)
    {
        if (!$image) {
            return null;
        }

        if (File::exists(public_path('storage/' . $image))) {
            return File::mimeType(public_path('storage/' . $image));
        }
        return false;

    }
}

if (!function_exists('intervention')) {
    function intervention(string $size, string $image = null, string $dir = 'countries', string $method = 'cover')
    {
        if (!$image) {
            return null;
        }
        if (!File::exists(public_path('storage/' . $image))) {
            return null;
        }

        // $dir = 'countries';
        // $method = 'fit'; // 'resize|crop|fit'
        $file = File::basename($image);

        // dd($image);
        abort_if(!in_array($size, config('thumbnail.allowed_sizes', [])),
            403,
            'size not allowed'
        );


        $storage = Storage::disk('intervention');


        $realPath = $image;
        $newDirPath = "$dir/$method/$size";
        $resultPaht = "$newDirPath/$file";

        if (!$storage->exists($newDirPath)) {
            $storage->makeDirectory($newDirPath);
        }


        if (!$storage->exists($resultPaht)) {

            $image = Image::read($storage->path($realPath));


            [$w, $h] = explode('x', $size);
            if ($h == 0) {
                $image->{$method}(width: $w);
            } else {
                $image->{$method}($w, $h);

            }


            $image->save($storage->path($resultPaht));


        }


        return 'storage/' . $resultPaht;

    }
}


if (!function_exists('role')) {

    function role($id = null): string
    {
        if (!auth()->user()) {
            return 'guest';
        }

        if ($id) {

            $user = User::query()
                ->where('id', $id)
                ->first();
            if ($user) {
                if (isset($user->parent)) {
                    if (strtolower($user->parent->name) == 'admin') {
                        return 'admin';
                    }
                }

                if ($user->senior == $user->id) {
                    return 'senior';
                }


                if (isset($user->parent)) {
                    if (strtolower($user->parent->name) == 'manager') {
                        return 'manager';
                    }
                }


                return 'user';
            }
            return 'error_id';

        }
        $id = (auth()->user()) ? auth()->user()->id : '';
        if ($id) {

            $user = User::query()
                ->where('id', $id)
                ->first();
            if ($user) {
                if (isset($user->parent)) {
                    if (strtolower($user->parent->name) == 'admin') {
                        return 'admin';
                    }
                }
                if (isset($user->parent)) {
                    if (strtolower($user->parent->name) == 'manager') {
                        return 'manager';
                    }
                }
                return 'user';
            }
        }
        return 'error_id';

    }
}

/**
 * операции с youtube
 */

if (!function_exists('codeYoutube')) {

    function codeYoutube($url): string|null
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

        if (isset($match[1])) {
            return $match[1];
        }

        return null;
    }
}

if (!function_exists('fullYoutube')) {

    function fullYoutube($code): string|null
    {

        return 'https://www.youtube.com/watch?v=' . trim($code);
    }
}

if (!function_exists('youtube')) {
    function youtube($html, $w = null, $h = null)
    {
        $style = 'style="width:';
        $wi = ($w) ? $w . 'px' : '100%';
        $style .= $wi . '"';
        $he = ($h) ?: 'auto';
        $style .= 'height="' . $he . '"';

        return
            '<embed ' . $style . ' src="https://www.youtube.com/embed/' . codeYoutube($html) . '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></embed>';

    }
}

/**
 * операции с rutube
 */

if (!function_exists('rutube')) {
    function rutube($html, $w = null, $h = null)
    {
        $style = 'style="width:';
        $wi = ($w) ? $w . 'px' : '100%';
        $style .= $wi . '"';
        $he = ($h) ?: 'auto';
        $style .= 'height="' . $he . '"';

        $url = $html;
        $s = substr($url, -1); // returns "s"
        if ($s == '/') {
            $uri = rtrim($url, '/');
        } else {
            $uri = $url;
        }


        preg_match("/[^\/]+$/", $uri, $matches);
        $rutube = $matches[0]; // ID rutube
        return '<iframe  ' . $style . '  src="https://rutube.ru/play/embed/' . $rutube . '"  frameBorder="0"  allow="clipboard-write; autoplay"  webkitAllowFullScreen  mozallowfullscreen  allowFullScreen></iframe>';


    }
}

if (!function_exists('render_video')) {
    function render_video($link, $w = null, $h = null)
    {

        if (mb_substr_count($link, 'rutube.ru')) { // int

            return rutube($link, ($w) ?? null, ($h) ?? null);

        }

        if (mb_substr_count($link, 'youtube.com')) { // int


            return youtube($link, ($w) ?? null, ($h) ?? null);

        }
        return null;
    }
}


if (!function_exists('preview')) {
    function preview($link)
    {

        if (mb_substr_count($link, 'rutube.ru')) {

            $url = $link;
            $s = substr($url, -1); // returns "s"
            if ($s == '/') {
                $uri = rtrim($url, '/');
            } else {
                $uri = $url;
            }

            preg_match("/[^\/]+$/", $uri, $matches);
            $rutube = $matches[0]; // ID rutube
            return "https://rutube.ru/api/video/$rutube/thumbnail/?redirect=1";

        }

        if (mb_substr_count($link, 'youtube.com')) {

            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);

            if (isset($match[1])) {
                return "https://img.youtube.com/vi/$match[1]/1.jpg";
            }


        }
        return null;
    }
}

if (!function_exists('name_hosting')) {
    function name_hosting($link)
    {

        if (mb_substr_count($link, 'rutube.ru')) {

            return 'rutube.ru';
        }

        if (mb_substr_count($link, 'youtube.com')) {

            return 'youtube.com';


        }
        return 'Не определено';
    }
}


/**
 * операции с rutube
 */


/**
 * textarea оствляем некоторрые теги
 */

if (!function_exists('textarea')) {
    function textarea($str): string
    {
        if (is_string($str)) {
            $result = strip_tags(nl2br($str), '<code><p><br><br /><br/><b><i><strong>');
            return $result;
        }

        return '';

    }
}


if (!function_exists('a_url')) {
    function a_url($url = null)
    {

        $d = config('app.app_url');
        if ($url) {
            $a = $d . '/' . $url;
            return trim($a);
        }
        return false;
    }
}


/* Формируем slug  Версия 2 */
if (!function_exists('createSlug')) {
    function createSlug($title, $model)
    {
        $slug = Str::slug($title, '-');
        $count = $model::query()->where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}

/* Формируем slug Версия 1  */
if (!function_exists('slugCheck')) {

    function slugCheck($str, Model $model)
    {
        $placeObj = $model;

        $businessName = $str; //Input from User
        $businessNameURL = Str::slug($businessName, '-'); //Convert Input to Str Slug

        //Check if this Slug already exists
        $checkSlug = $placeObj->whereSlug($businessNameURL)->exists();

        if ($checkSlug) {
            //Slug уже существует.
            //Добавьте числовой префикс в конце. Начиная с 1
            $numericalPrefix = 1;

            while (1) {
                //Check if Slug with final prefix exists.

                $newSlug = $businessNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug


                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.

                if (!$checkSlug) {

                    //There is not more coincidence. Finally found unique slug.
                    $slug = $newSlug; //New Slug

                    break; //Break Loop

                }


            }

        } else {
            //Slug do not exists. Just use the selected Slug.
            $slug = $businessNameURL;
        }

        return $slug;
    }


}

