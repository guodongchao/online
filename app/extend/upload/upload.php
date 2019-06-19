class upload
{

    uploadAjax(Request $request)
    {

    if ($request->isMethod('POST')) {
    $fileCharater = $request->file('file');
    //            var_dump($fileCharater);die;
    if ($fileCharater->isValid()) {
    $ext = $fileCharater->getClientOriginalExtension();// 文件后缀
    $path = $fileCharater->getRealPath();//获取文件的绝对路径
    $filename = date('Ymdhis') . '.' . $ext;//定义文件名
    Storage::disk('public')->put($filename, file_get_contents($path));
    $file = "./upload/" . $filename;
    //调用接口
    $info = $this->uploadFileDo($file);
    //把调用回来的数据储存到redis缓存
    $arrImg = json_decode($info, true);
    $media_id = $arrImg['media_id'];
    $created_at = $arrImg['created_at'];
    $endTime = $created_at + 86400 * 3;
    //                var_dump($endTime);die;
    $data = [
    'media_id' => $media_id,
    'path' => $file,
    'created_at' => $created_at,
    'end_time' => $endTime
    ];

    $this->uploadCach($data);
    return json_encode($file);


    }
    }


    }
}