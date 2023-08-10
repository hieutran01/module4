<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $this->authorize('viewAny', Product::class);

        $products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        $categories = Category::get();
        $sizes = Size::all();
        $param = [
            'categories'=>$categories,
            'sizes' => $sizes,
        ];
        return view('admin.products.create',$param);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);
        
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->amount;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
                $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
                $extension = $request->file($fieldName)->getClientOriginalExtension();
                $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
                $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
                $path = str_replace('public/', '', $path);
                $product->image = $path;
            }

             // Lưu các size được chọn cho sản phẩm
    // Lưu các size được chọn cho sản phẩm
    if ($request->has('sizes')) {
        $product->save(); // Save the product first to generate an ID
        $product->sizes()->sync($request->sizes); // Sync the sizes with the product ID
    }
            alert()->success('Thêm sản phẩm thành công!');
            $product->save();
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // Xử lý lỗi tại đây
            // Ví dụ: Hiển thị thông báo lỗi cho người dùng
            alert()->error('Đã xảy ra lỗi khi thêm sản phẩm!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('view', Product::class);

        $productshow = Product::findOrFail($id);
        $param =[
            'productshow'=>$productshow,
        ];
        return view('admin.products.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Product::class);

        $products = Product::find($id);
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin.products.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $this->authorize('update', Product::class);

        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->amount;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
                $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
                $extenshion = $request->file($fieldName)->getClientOriginalExtension();
                $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
                $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
                $path = str_replace('public/', '', $path);
                $product->image = $path;
            }
            $product->save();
            alert()->success('Cập nhật sản phẩm thành công!');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            // Xử lý lỗi tại đây
            Log::error($e->getMessage());   
            alert()->error('Đã xảy ra lỗi khi thêm sản phẩm!');
            return redirect()->back();
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Product::class);

        $products = Product::find($id);
        $products->delete();
        alert()->success('Sản phẩm đã vào thùng rác!');

        return redirect()->route('product.index');
        //
    }
    public function trash()
    {
        $this->authorize('view', Product::class);

        $softs = Product::onlyTrashed()->get();
        return view('admin.products.trash', compact('softs'));
    }
    public function restore($id)
    {
        try {
            $this->authorize('restore', Product::class);

            $softs = Product::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi Phục Sản Phẩm Thành Công!');
            return redirect()->route('product.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('product.index');
        }
    }
      //xóa vĩnh viễn
      public function deleteforever($id)
      {
          try {
            $this->authorize('forceDelete', Product::class);

              $softs = Product::withTrashed()->find($id);
              $softs->forceDelete();
            alert()->success('Xóa Vĩnh Viễn Thành Công!');
              return redirect()->route('product.index');
          } catch (\exception $e) {
              Log::error($e->getMessage());
              toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
              return redirect()->route('product.index');
          }
      }
      public function search(Request $request)
      {
          $search = $request->input('search');
          if (!$search) {
              return redirect()->route('product.index');
          }
      
          $products = Product::where(function (Builder $query) use ($search) {
              $query->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('price', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%')
                  ->orWhere('category_id', 'LIKE', '%' . $search . '%')
                  ->orWhere('status', 'LIKE', '%' . $search . '%');
          })->paginate(10);
      
          return view('admin.products.index', compact('products'));
      }
}