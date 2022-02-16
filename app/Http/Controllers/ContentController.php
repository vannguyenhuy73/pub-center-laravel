<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

/**
 * Class ContentController
 *
 * @deprecated none use
 * @package App\Http\Controllers
 */
class ContentController extends Controller
{

    public function show($id, $type = 'notice')
    {
        
    }

    private function readContent($contentID)
    {
        $content = Content::query()->find($contentID);

        $contentData = $content->content;

        if ($content->next) {
            $contentData .= $this->readContent($content->next);
        }

        return $contentData;
    }
}
