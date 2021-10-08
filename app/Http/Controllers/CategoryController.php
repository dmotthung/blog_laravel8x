<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category_show', ['only' => 'index']);
        $this->middleware('permission:category_create', ['only' => ['creat', 'store']]);
        $this->middleware('permission:category_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category_detail', ['only' => 'show']);
        $this->middleware('permission:category_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $perPage = 6;
    public function index(Request $request)
    {
        $categories = Category::with('descendants');

        if ($request->has('keyword') && trim($request->keyword)){
            $categories->search($request->keyword);
        }else{
            $categories->onlyParent(); //onlyParent lấy từ model category: scopeOnlyParent
        }
        return view('categories.index', [
            'categories'    =>  $categories->paginate($this->perPage)->appends(['keyword' => $request->get('keyword')])
        ]);
    }

    public function select(Request $request)
    {
        $categories = [];

        if ($request->has('q')){
            $search = $request->q;
            $categories = Category::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(12)->get(); //id và title lấy từ javascript-internal
        }else{
            $categories = Category::select('id', 'title')->onlyParent()->limit(12)->get(); //onlyParent lấy từ model category: scopeOnlyParent
        }
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // process data validation
        $validator  =   Validator::make(
            $request->all(),
            [
                'title'             =>  'required|string|max:60',
                'slug'              =>  'required|string|unique:categories,slug',
                'thumbnail'         =>  'required',
                'description'       =>  'required|string|max:240',
            ],
            [],
            $this->attribute()
        );
        if ($validator->fails()){
            if ($request->has('parent_category')){
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // Process insert data to database
        try {
            Category::create([
                'title'         =>  $request->title,
                'slug'          =>  $request->slug,
                'thumbnail'     =>  parse_url($request->thumbnail)['path'],
                'description'   =>  $request->description,
                'parent_id'     =>  $request->parent_category
            ]);

            Alert::success(trans('categories.alert.create.title'), trans('categories.alert.create.message.success'));
            return redirect()->route('categories.index');

        }catch (\Exception $ex){
            if ($request->has('parent_category')){
                $request['parent_category'] =   Category::select('id','title')->find($request->parent_category);
            }

            Alert::error(trans('categories.alert.create.title'), trans('categories.alert.create.message.error', ['error' => $ex->getMessage()]));
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // process data validation
        $validator  =   Validator::make(
            $request->all(),
            [
                'title'             =>  'required|string|max:60',
                'slug'              =>  'required|string|unique:categories,slug,'. $category->id,
                'thumbnail'         =>  'required',
                'description'       =>  'required|string|max:240',
            ],
            [],
            $this->attribute()
        );
        if ($validator->fails()){
            if ($request->has('parent_category')){
                $request['parent_category'] = Category::select('id', 'title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // Process update data to database
        try {
            $category->update([
                'title'         =>  $request->title,
                'slug'          =>  $request->slug,
                'thumbnail'     =>  parse_url($request->thumbnail)['path'],
                'description'   =>  $request->description,
                'parent_id'     =>  $request->parent_category
            ]);

            Alert::success(trans('categories.alert.update.title'), trans('categories.alert.update.message.success'));
            return redirect()->route('categories.edit', ['category'=>$category]);

        }catch (\Exception $ex){
            if ($request->has('parent_category')){
                $request['parent_category'] =   Category::select('id','title')->find($request->parent_category);
            }

            Alert::error(trans('categories.alert.update.title'), trans('categories.alert.update.message.error', ['error' => $ex->getMessage()]));
            return redirect()->back()->withInput($request->all());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success(trans('categories.alert.delete.title'), trans('categories.alert.delete.message.success'));
        }catch (\Exception $ex){
            Alert::error(trans('categories.alert.delete.title'), trans('categories.alert.delete.message.error', ['error' => $ex->getMessage()]));
        }
        return redirect()->back();
    }


    private function attribute()
    {
        return [
            'title'             =>  trans('categories.form_control.input.title.attribute'),
            'slug'              =>  trans('categories.form_control.input.slug.attribute'),
            'thumbnail'         =>  trans('categories.form_control.input.thumbnail.attribute'),
            'description'       =>  trans('categories.form_control.textarea.description.attribute'),
        ];
    }
}
