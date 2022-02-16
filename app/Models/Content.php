<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'tcontent';
    public $primaryKey = 'content_id';
    public $timestamps = false;

    public function getContentById($contentID)
    {
        $content = Content::query()->find($contentID);
        $contentData = $content->content;
        if ($content->next) {
            $contentData .= $this->getContentById($content->next);
        }

        return $contentData;
    }
}
