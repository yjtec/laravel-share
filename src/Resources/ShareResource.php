<?php
namespace Yjtec\LaravelShare\Resources;

/**
 * @OA\Schema(
 *   schema="ShareResponse",
 *   type="object",
 *   allOf={
 *       @OA\Schema(ref="#/components/schemas/Success"),
 *       @OA\Schema(
 *              @OA\Property(
 *                  property="data",type="object",
 *                  ref="#/components/schemas/ShareOne"
 *             ),
 *       )
 *   }
 * )
 */
/**
 * @OA\Schema(
 *      schema="ShareOne",
 *      @OA\Property(property="id",type="integer",description="分享ID"),
 *      @OA\Property(property="title",type="string",description="分享标题"),
 *      @OA\Property(property="desc",type="string",description="分享描述"),
 *      @OA\Property(property="link",type="string",description="分享链接"),
 *      @OA\Property(property="img",type="string",description="分享图片地址"),
 *  )
 */

class ShareResource extends Resource
{
    public function toArray($request)
    {
        if ($this->resource) {
            return [
                'id'      => $this->id,
                'title'   => $this->title,
                'desc'    => $this->desc,
                'link'    => $this->link,
                'img'     => $this->img,
                'img_url' => $this->img_url,
            ];
        }
        return [];
    }
}
