<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Memo;

use Illuminate\Support\Facades\DB;

use App\Services\CheckFormData;

use App\Http\Requests\StoreMemo;

class MemosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('memos');

        if($search !== null){

            $search_split = mb_convert_kana($search,'s');

            $search_split2 = preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value)
            {
                $query->where('name','like','%'.$value.'%');
            }
        }

       $query->select('id','name','comment','created_at');
       $memos = $query->paginate(10);

        return view('memo.index',compact('memos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemo $request)
    {
        $memo = new Memo;


        $memo->name = $request->input('name');
        $memo->comment = $request->input('comment');
        $memo->created_at = $request->input('created_at');

        $memo->save();

        return redirect('memo/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memo = Memo::find($id);



        return view('memo.show',compact('memo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memo = Memo::find($id);

        return view('memo.edit',compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $memo = Memo::find($id);


        $memo->name = $request->input('name');
        $memo->comment = $request->input('comment');
        $memo->updated_at = $request->input('created_at');

        $memo->save();

        return redirect('memo/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::find($id);

        $memo->delete();

        return redirect('memo/index');
    }
}
