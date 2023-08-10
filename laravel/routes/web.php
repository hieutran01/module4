<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Web\UserController as WebUserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
  return view('hi'); 
});
Route::get('/hello/{name?}/{age?}', function ($name = 'hieu',$age = 21 ){
    return 'hello ' . $name . ' age ' . $age;
})->where(['name' =>'[A-Za-z]+', 'age' => '[0-9]+']);


  // Route::group(['prefix' => 'users'], function(){
  //   Route::get('/profile', [UserController::class , 'getProfile']);
  //     Route::get('/login',  [UserController::class , 'getLogin'])->name('login');
  // });
  // Route::resource('contact', ContactController::class);
// //Admin
Route::get('/',function () {
  return '<h1 style="text-align: center;">TRANG CHỦ </h1>';
})->name('home');
  Route::group(['prefix' => 'users'], function(){
    Route::get('/',[UserController::class,'index'])->name('users.index');
    Route::get('create',[UserController::class,'create'])->name('users.create');
    Route::post('/',[UserController::class,'store'])->name('users.store');
    Route::get('/{id}',[UserController::class,'show'])->name('users.show');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('/{id}',[UserController::class,'update'])->name('users.update');
    Route::delete('/{id}',[UserController::class,'destroy'])->name('users.destroy');
});
//admin routes
Route::middleware('auth.admin')->prefix('admin')->group (function(){
  Route::get('/', [DashboardController::class,'index']);
  Route::resource('product', ProductController::class)->Middleware('auth.admin.product');

});

Route::get('link-18', function(){
  echo 'day la noi dung 18';
})->middleware('CheckAge');

// Route::get('home', function(){
//   echo 'trang chu';
// })->name('home');


Route::get('admin', function(){
  $name = 'NVA';
  return view('admin',compact('name'));
})->middleware('CheckView');

  
  
Route::group(['middleware' => 'locale'], function () {
  Route::get('/', function () {
      return view('welcome');
  })->name('home');
// Hiển thị danh sách bài viết
  Route::get('/posts', [PostController::class, 'index'])->name('posts.list');

// Hiển thị giao diện thêm mới bài viết
  Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Tạo mới bài viết
  Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

// Chuyển đổi ngôn ngữ cho website
  Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('user.change-language');
});





Route::get('getMessage',function(){
  $lang = session()->get('lang','en');
  App::setLocale($lang);
  echo '<br>'.__('messages.save_success');
  echo '<br>'.__('messages.update_success');
  echo '<br>'.__('messages.delete_success');
  echo '<br>'.__('messages.welcome', ['name' => 'hiếu']);
  echo '<br>'.trans_choice('messages.apples', 3);

});

Route::get('changeLanguage/{lang}',function($lang){
  session()->put('lang', $lang);
  return redirect('/getMessage');
});

// Web
// Route::get('/', HomeController::class);
// Route::get('login', [WebUserController::class,'login']);
// Route::get('danhmuc/{name}', function () {
//     return 'Trang danh sach may tinh';
// });
// Route::get('sanpham/{name}', function () {
//     return 'Trang danh sach may tinh';
// });
// Route::get('giohang', function(){
//     return 'day la gio hang';
// });
// Route::post('xulygiohang', function(){
//     return 'day la gio hang';
// });
// Route::get('lienhe', function(){
//     return 'day la lien he';
// });
// Route::post('xulylienhe', function(){
//     return 'day la lien he';
// });
// Route::get('thanhtoan', function(){
//     return 'day la thanh toan';
// });
// Route::post('xulythanhtoan', function(){
//     return 'day la thanh toan';
// });

  // Route::redirect('/1', 'https://google.com');

    // route::get('hi', function(){
    //   return view('form'); 
    // });
      
  // route::post('hi', function(){
  //   return 'hii';
  // });

  // route::put('hi', function(){
  //   return 'putne';
  // });

  // route::delete('hi', function(){
  //   return 'delete';
  // });
  // route::patch('hi', function(){
  //   return 'patch';
  // });

  // route::match(['get','post'],'hi',function(){
  //   return $_SERVER['REQUEST_METHOD'];
  // });
  
  //    route::any('hi', function(Request $request){
  //     //  return $_SERVER['REQUEST_METHOD'];
  //     // $request = new Request();
  //     return $request->method();


  //    });
   
  // route::get('form', function(){
  //   return view('form');
  // });
// Route::group(['prefix' => 'users'], function(){
//   Route::get('/index', function(){
//     echo '<h1>Welcome!</h1';
//   })->name('users.index');

//   Route::get('/show/{id?}', function ($id){
//     echo '<h1>Welcome!</h1';
//   })->name('users.show');

//   Route::get('/create', function(){
//     echo '<h1>Welcome!</h1';
//   })->name('users.create');
  
//   Route::post('/store', function(){
//     echo '<h1>Welcome!</h1';
//   })->name('users.store');

//   Route::get('/edit/{id}', function($id){
//     echo '<h1>Welcome!</h1';
//   })->name('users.edit');

//   Route::put('/update/{id}', function($id){
//     echo '<h1>Welcome!</h1';
//   })->name('users.update');

//   Route::delete('/delete/{id}', function($id){
//     echo '<h1>Welcome!</h1';
//   })->name('users.delete');
// });




// Route::get('/baithuchanh2', [HomeController::class, 'index']);

  
// Route::get('/baithuchanh{timezone?}', function ($timezone = null) {
//   if (!empty($timezone)) {

//       // Khởi tạo giá trị giờ theo múi giờ UTC
//       $time = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('UTC'));

//       // Thay đổi về múi giờ được chọn
//       $time->setTimezone(new DateTimeZone(str_replace('-', '/', $timezone)));

//       // Hiển thị giờ theo định dạng mong muốn
//       echo 'Múi giờ bạn chọn ' . $timezone . ' hiện tại đang là: ' . $time->format('d-m-Y H:i:s');
//   }
//   return view('baihoc2.thuchanh');
// });

// BÀI-TẬP1
// BÀI TẬP 01C
// Hien thi form calculator
// Route::get('/bai1/baitap1', function () {
//     return view('bai1.baitap1');
// });
// Route::get('/bai1/show_discount_amount', function () {
//     return view('bai1.show_discount_amount');
// });

// Route::post('/bai1/calculate', function (Request $request) {
//     $productDescription = $request->input('product_description');
//     $price = $request->input('list_price');
//     $discountPercent = $request->input('discount_percent');

//     $discountAmount = $price * $discountPercent * 0.1;
//     $discountPrice = $price - $discountAmount;

//     return view('bai1.show_discount_amount', compact('discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent'));
// })->name('calculate');




// bai2
// Route::get('/bai1/baitap2', function () {
//     return view('bai1.bt2dichanhviet');
// });


// Route::post('/xu-ly-bai02', function (Request $request){
//     $dictionary = [
//         "hello" => "xin chào",
//         "how" => "thế nào",
//         "book" => "quyển vở",
//         "computer" => "máy tính"
//     ];
//     $textbox = $request->input('textbox');
//     $dich = $request->input('dich');
//     $flag = 0;
//     foreach ($dictionary as $word => $description) {
//         if ($word == $textbox) {
//             echo "Từ: " . $word . ". <br/>Có nghĩa là: " . $description;
//             echo "<br/>";
//             $flag = 1;
//         }
//          elseif($description ==  $textbox ){
//             echo "Từ: " . $description . ". <br/>Có nghĩa là: " . $word;
//             $flag = 1;

//         }
    
//     }
//      if ($flag == 0) {
//         echo "Không tìm thấy từ cần tra." . '<br>';

//     }
// });



 //Tạo 1 nhóm route với tiền tố customer
//  Route::prefix('customer')->group(function () {

//   Route::get('index',  [CustomerController::class , 'index'])->name("customer.index");

//   Route::get('create', function () {
//       return view('baihoc2.customer.create');
//   })->name("customer.create");

//   Route::post('store' , [CustomerController::class , 'store'])->name('customer.store');

//   Route::get('{id}/{name}/{phone}/{email}/show', [CustomerController::class , 'show'])->name('customer.show');

//   Route::get('{id}/edit', [CustomerController::class , 'edit'])->name('customer.edit');

//   Route::patch('{id}/update', [CustomerController::class , 'update'])->name('customer.update');

//   Route::delete('{id}', [CustomerController::class , 'destroy'])->name('customer.destroy');
// });
