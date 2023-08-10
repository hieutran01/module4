<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $this->authorize('viewAny', Category::class);
        $categories = Category::orderBy('id', 'DESC')->paginate(2);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $this->authorize('create', Category::class);
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
      
        $this->authorize('create', Category::class);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        alert()->success('Thêm thể loại thành công!');
        return redirect()->route('category.index');
    }


    // public function store(StoreCategoryRequest $request)
    // {
    //     $categoryName = $request->name;
    
    //     // Kiểm tra xem thể loại đã tồn tại hay chưa
    //     if (Category::where('name', $categoryName)->exists()) {
    //         alert()->error('Thể loại đã tồn tại!');
    //         return redirect()->back();
    //     }
    
    //     $category = new Category();
    //     $category->name = $categoryName;
    //     $category->save();
    //     alert()->success('Thêm thể loại thành công!');
    //     return redirect()->route('category.index');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('view', Category::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        alert()->success('Cập nhật thể loại thành công!');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Category::class);
        try {
            // Check if the category is referenced by products
            $category = Category::findOrFail($id);
            $products = $category->products;
    
            if ($products->isEmpty()) {
                $category->delete();
                alert()->success('Thể loại đã vào thùng rác!');
            } else {
                // Throw an exception if there are products referencing the category
                throw new \Exception('Không thể xóa thể loại đã được sử dụng trong sản phẩm.');
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            alert()->error($e->getMessage());
        }
    
        return redirect()->route('category.index');
    }

    public function trash()
    {
        $this->authorize('view', Category::class);
        $softs = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('softs'));
    }
    public function restore($id)
    {
        try {
            $this->authorize('restore', Category::class);
            $softs = Category::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục Thể Loại Thành Công!');
            return redirect()->route('category.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('category.index');
        }
    }
      //xóa vĩnh viễn
      public function deleteforever($id)
      {
          try {
            $this->authorize('forceDelete', Category::class);
              $softs = Category::withTrashed()->find($id);
              $softs->forceDelete();
            alert()->success('Xóa Vĩnh Viễn Thành Công!');
              return redirect()->route('category.index');
          } catch (\exception $e) {
              Log::error($e->getMessage());
              toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
              return redirect()->route('category.index');
          }
      }
    public function search(Request $request){
        $search = $request->input('search');
        if(!$search){
            return redirect()->route('category.index');
        }
        $categories = Category::where('name','LIKE','%'.$search.'%')->paginate(2);
        return view('admin.categories.index',compact('categories'));
      }
}
