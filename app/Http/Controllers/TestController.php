<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index(){

        $values = Test::all();//dbのデータをそのまま取得

        $tests = DB::table('tests')->select('id')->get();//dbのデータをコレクション型で取得

        dd($tests);

        return view('tests.test', compact('values'));
    }
}
