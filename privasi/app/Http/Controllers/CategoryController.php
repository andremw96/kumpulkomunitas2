<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use Redirect;
use Illuminate\Support\Facades\View;
use DB;
use App\thread;
use App\comment;
use App\User;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->category = category::all(array('category'));
       // $this->subcategory = subcategory::all(array('subcategory'));

        //$this->comment = comment::all(array('comment', 'post_id'));
       // $this->post = post::all(array('title', 'content'));
        $subcate=new subcategory;

        try {

            $this->allSubCategories=$subcate->getCategories();
            
        } catch (Exception $e) {
            
            //no parent category found
        }

        view::share('allSubCategories', $this->allSubCategories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {      

        $category = DB::table('tblpost')
            ->select(DB::raw('category.id, category.category, count(tblpost.post_id) as JmlhPost, count(tblcomment.comment_id) as JmlhComment, max(  tblpost.updated_at) as LastPost, category.parent_id'))
            ->rightJoin('tblcomment', 'tblpost.post_id', '=', 'tblcomment.post_id')
            ->rightJoin('category', 'category.id', '=', 'tblpost.category_id')
            ->whereNull('tblpost.deleted_at')
            ->whereNull('tblcomment.deleted_at')
            ->whereNull('category.deleted_at')
            ->groupBy('category.category')
            ->paginate(15);

        return view("/admin/kategori/DaftarKategori", compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::where('parent_id', '=', 0)->get();
        return view('/admin/kategori/TambahKategori', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new category();
        $category->category = $request->category;
        $category->description = $request->description;
        $category->parent_id = $request->parent;
        $category->user_id = $request->userid;
        $category->save();

        return redirect()->action('CategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $IsiCategory = category::findOrFail($id);
        $category = category::where('parent_id', '=', 0)->get();
        $userid = $IsiCategory->user_id;
        $CariUsername = User::findOrFail($userid);

        return view('/admin/kategori/EditKategori', compact('category', 'IsiCategory', 'CariUsername'));
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
         $category = category::findOrFail($id);
         $category->category = $request->input('category');
         $category->description = $request->input('description');
         $category->updated_by = $request->input('updated_by');
         $category->parent_id = $request->input('parent');
         $category->save();
          
         return redirect()->action('CategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category = category::find($id);
         $category->delete();
         
         \Session::flash('flash_message', 'Kategori sudah terhapuss..!!');
         return redirect()->action('CategoryController@index');
    }
}
