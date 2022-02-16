<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'thelp';

    public function getHelpById($id)
    {
    	$result = Help::where('help_id', $id)
    		->where('section', 'AFF_GUIDE')
    		->get()
    		->toArray();

    	return $result[0];	
    }

    public function getAllGuide() {
    	$result = Help::select('content_id', 'title')
    		->where('section', 'AFF_GUIDE')
    		->where('help_id','!=', 'AC_GUIDE_A007')
    		->get();

    	return $result;
    }
}
