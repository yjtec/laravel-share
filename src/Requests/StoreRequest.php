<?php

namespace Yjtec\LaravelShare\Requests;

/**
 *
 * @OA\RequestBody(
 *     request="StoreShareBody",
 *     description="",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(
 *                 type="object",
 *                 required={"type","title","desc","img"},
 *                 @OA\Property(
 *                     property="type",
 *                     description="分享类型",
 *                     enum={"home","store","member_point"},
 *                 ),
 *                 @OA\Property(
 *                     property="title",
 *                     description="分享标题",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="desc",
 *                     description="分享描述",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="link",
 *                     description="分享链接(留空表示自定义连接地址)",
 *                     type="string",
 *                 ),
 *                 @OA\Property(
 *                     property="img",
 *                     description="图片地址",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="foreign_key",
 *                     description="外键",
 *                     type="integer"
 *                 )
 *         )
 *     )
 * )
 */
class StoreRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            //'title' => 'required|min:2|max:10',
        ];
    }
    public function attributes()
    {
        return [
            'title' => '角色名称',
            'name'  => '标识',
            'pid'   => '父级ID',
        ];
    }
}
