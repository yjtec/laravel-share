<?php

namespace Yjtec\LaravelShare\Requests;

/**
 *
 * @OA\RequestBody(
 *     request="UpdateShareBody",
 *     description="",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(
 *                 type="object",
 *                 required={},
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
 *                 )
 *         )
 *     )
 * )
 */
class UpdateRequest extends ApiRequest
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
           
        ];
    }
}
