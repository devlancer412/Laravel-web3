<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function getnews(Request $req)
    {
        $data = News::where("c_status","=","A")
                  ->get(["c_title","c_news"]);
                  dd($data);exit;
            // return view (Dashboard)->with('data',$data);
    }
}
