<?php 
namespace Yjtec\LaravelShare\Controllers;
use Illuminate\Http\Request;
use Yjtec\LaravelShare\Resources\Jsapi;
use Yjtec\LaravelShare\Resources\ShareResource;
use Yjtec\LaravelShare\Models\Share;
use Yjtec\LaravelShare\Requests\UpdateRequest;
class ShareController extends Controller{

    /**
     * @OA\Get(
     *     path="/share",
     *     description="分享配置",
     *     tags={"Share"},
     *     summary="分享配置",
     *     operationId="ShareInit",
     *     @OA\Response(
     *         response="200",
     *         description="登陆成功",
     *         
     *     )
     * )
     */
    public function index(Request $request){
        $data = app('share')->jsapi($request->uri);
        return new Jsapi($data);
    }
    /**
     * @OA\Post(
     *     path="/share",
     *     description="设置分享内容",
     *     tags={"Share"},
     *     summary="设置分享内容",
     *     operationId="ShareStore",
     *     @OA\RequestBody(ref="#/components/requestBodies/StoreShareBody"),
     *     @OA\Response(
     *         response="200",
     *         description="获取成功",
     *         @OA\JsonContent(ref="#/components/schemas/ShareResponse")
     *     )
     * )
     */    
    public function store(Request $request){
        $data = $request->only(['type','title','desc','link','img','foreign_key']);
        $share = Share::create($data);
        return new ShareResource($share);
    }

    /**
     * @OA\get(
     *     path="/share/search",
     *     description="获取分类下的分享",
     *     tags={"Share"},
     *     summary="获取分享",
     *     @OA\Parameter(
     *         description="类型",
     *         in="query",
     *         name="type",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="外键",
     *         in="query",
     *         name="foreign_key",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     operationId="ShareSearch",
     *     @OA\Response(
     *         response="200",
     *         description="获取成功",
     *         @OA\JsonContent(ref="#/components/schemas/ShareResponse")
     *     )
     * )
     */
    
    public function search(Request $request){
        $where = [];
        if($request->has('type') && $request->type){
            $where[] = ['type',$request->type];
        }
        if($request->has('foreign_key') && $request->foreign_key){
            $where[] = ['foreign_key',$request->foreign_key];
        }
        $share = Share::where($where)->first();
        return new ShareResource($share);
    }

    /**
     * @OA\Put(
     *     path="/share/{id}",
     *     description="修改分享内容",
     *     tags={"Share"},
     *     summary="修改分享内容",
     *     @OA\Parameter(ref="#/components/parameters/id"),
     *     operationId="ShareUpdate",
     *     @OA\RequestBody(ref="#/components/requestBodies/UpdateShareBody"),
     *     @OA\Response(
     *         response="200",
     *         description="获取成功",
     *         @OA\JsonContent(ref="#/components/schemas/ShareResponse")
     *     )
     * )
     */
    
    public function update($share,UpdateRequest $request){
        $data = $request->only(['title','desc','link','img']);
        foreach($data as $k=>$v){
            $share->$k = $v;
        }
        $share->save();
        return new ShareResource($share);
    }
}
?>