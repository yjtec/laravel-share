<?php 
namespace Yjtec\LaravelShare\Controllers;
use Illuminate\Http\Request;
use Yjtec\LaravelShare\Resources\Jsapi;
class ShareController extends Controller{

    /**
     * @OA\Post(
     *     path="/share",
     *     description="分享配置",
     *     tags={"Share"},
     *     summary="分享配置",
     *     operationId="ShareInit",
     *     @OA\Response(
     *         response="200",
     *         description="登陆成功",
     *         
     *     ),
     *     security={
     *         {"token":{}}
     *     }
     * )
     */    
    public function index(Request $request){
        $data = app('share')->jsapi($request->url());
        //dd($data);
        return new Jsapi($data);
    }
}
?>