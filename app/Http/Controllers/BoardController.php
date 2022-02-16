<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Show list board
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $boards = Board::query()->where([
            'NOTICE_YN' => 'Y',
            'ACCOUNT_ID' => 'adpia',
            ['MERCHANT_ID', '!=', '_deleted_']
        ])->orderBy('CDATE', 'DESC')->paginate(12, ['article_id','merchant_id', 'image', 'summary', 'title', 'cdate']);
        
        return view('board.index', compact('boards'));
    }

    /**
     * show detail board
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $board = Board::query()->where([
            'NOTICE_YN' => 'Y',
            'ACCOUNT_ID' => 'adpia',
            ['MERCHANT_ID', '!=', '_deleted_']
        ])->findOrFail($id);

        $otherBoard = Board::query()->whereKeyNot($id)->where([
            'NOTICE_YN' => 'Y',
            'ACCOUNT_ID' => 'adpia',
            ['MERCHANT_ID', '!=', '_deleted_']
        ])->limit(10)->orderBy('ARTICLE_ID', 'DESC')->get();

        return view('board.detail', compact('otherBoard', 'board'));
    }

}
