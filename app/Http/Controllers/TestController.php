<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test()
    {


        return view('test');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'video' => 'required|file',
        ]);

        dd('stop');

        /** @var  $fileName / загрузка к себе */
 /*       $fileName = $this->upload_self($request);
        if ($fileName) {
            return back()
                ->with('success', 'Video has been successfully uploaded.');
        }*/
        /** @var  $fileName //// загрузка к себе */


     //   dd($request->file('video'));

        $name = $request->video->getClientOriginalName();
        $size = $request->file('video')->getSize(); // in bytes;
        $KINESCOPE_API_TOKEN = '2fe04f14-8e2a-4fff-9fdf-41995309c76a';
        $parent_id = "2e5b701a-f54f-4faf-8480-160e9b81c612";
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $KINESCOPE_API_TOKEN,
        );
        $data = json_encode(array(
            'filesize' => (int)$size,
            'type' => 'video',
            'title' => $name,
            'parent_id' => $parent_id,
            'filename' => $name,
            'description' => 'video description',
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, "https://uploader.kinescope.io/v2/init");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);


      return redirect(null, 201)->away($result['data']['endpoint']);


    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ajax
     */

    public function upload_v(Request $request)
    {

        $this->validate($request, [
            'video' => 'required|file',
        ]);

        dd('stop');

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;
        $name = $request->video->getClientOriginalName();
        $size = $request->file('video')->getSize(); // in bytes;
        $KINESCOPE_API_TOKEN = '2fe04f14-8e2a-4fff-9fdf-41995309c76a';
        $parent_id = "2e5b701a-f54f-4faf-8480-160e9b81c612";
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $KINESCOPE_API_TOKEN,
        );
        $data = json_encode(array(
            'filesize' => (int)$size,
            'type' => 'video',
            'title' => $name,
            'parent_id' => $parent_id,
            'filename' => $name,
            'description' => 'video description',
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, "https://uploader.kinescope.io/v2/init");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);

        //  return redirect(null, 201)->away($result['data']['endpoint']);

        return response()->json([
            'filepath' => $filePath,
            'result' => $result,
        ]);
    }


    public function upload_self($request)
    {

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

        if ($isFileUploaded) {
            return $fileName;
            /*      return back()
                      ->with('success','Video has been successfully uploaded.');*/
        }
        return false;
    }
}
