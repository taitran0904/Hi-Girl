<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\at;

class PageController extends Controller
{ 
    public function getIndex()
    {
        //khai báo biên hứng dữ liệu slide từ database
        $slide = Slide::all();
        //        return view('page.home', ['slide'=>$slide]);
        $new_product = Product::where('new', 1)->paginate(4, ['*'], 'pag');
        $sale_product = Product::where('promotion_price', '<>', 0)->paginate(8, ['*'], 'pagee');
        //        dd($new_product);
        return view('page.home', compact('slide', 'new_product', 'sale_product'));
    }
    public function getProductType($type)
    {
        $pro_type = Product::where('id_type', $type)->get();
        $product_other = Product::where('id_type', '<>', $type)->paginate(3);
        $type1 = ProductType::all();
        $type2 = ProductType::where('id', $type)->first();
        return view('page.product_type', compact('pro_type', 'product_other', 'type1', 'type2'));
    }
    public function getProductDetail(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $similar_product = Product::where('id_type', $product->id_type)->paginate(6);
        return view('page.product_detail', compact('product', 'similar_product'));
    }
    public function getContacts()
    {
        return view('page.contacts');
    }
    public function getAbout()
    {
        return view('page.about');
    }

    public function getAddtoCart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart); //Dùng request để đẩy cart vào trong session
        return redirect()->back();
    }

    public function getDeleteItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout()
    {
        if (Session::has('cart')) {
            $oldcart = Session::get('cart');
            $cart = new Cart($oldcart);
            // dd($cart);
            return view('page.check_out', ['product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        }
        return view('page.check_out');
    }

    public function postCheckout(Request $req)
    {
        
        $cart = Session::get('cart');
        $customer = new Customer;
        if(Auth::check()){
            $customer->id_user = Auth::user()->id;
        }
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->status = 0;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function getSignUp(){
        return view('page.sign_up');
    }
    
    public function postSignUp(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'full_name'=>'required',
                'password'=>'required|min:6|max:20',
            ],
            [
                'full_name.required'=>'Vui lòng nhập tên đăng nhập',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('full_name'=>$req->full_name, 'password'=>$req->password);
        $user = User::where('full_name', $req->full_name)->first();
        if(Auth::attempt($credentials)){
            if($user->status == 1)
            return redirect()->route('admin');
            return redirect()->route('trang-chu');
            // ->route('admin')->with('tai', 'Updated!')
            
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search', compact('product'));
    }

//------------------------------------------------------------------------------------------------------------------------------------------------------------//
    public function getListTypeProduct(){
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $product_type = ProductType::all();
        return view('page.list_type_product', compact('product_type'));
    }

    public function getEditTypeProduct(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $type_product = ProductType::where('id', $req->id)->first();
        return view('page.edit_type_product', compact('type_product')); 
    }

    public function postEditTypeProduct(Request $req, $id)
    {
        $this->validate($req,
            [        
                'nametype'=>'required',
            ],
            [
                'nametype.required'=>'Vui lòng nhập tên danh mục',
            ]);
        $product = ProductType::find($id);
        $product->name = $req->nametype;
        $product->status = $req->status_radio;
        $product->save();
        return redirect()->route('danh-sach-danh-muc')->with('alert', 'Cập nhật danh mục thành công');
    }

    public function getAddTypeProduct()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        return view('page.add_type_product');
    }
    
    public function postAddTypeProduct(Request $req)
    {
        $this->validate($req,
            [        
                'nametype'=>'required|unique:type_products,name',
            ],
            [
                'nametype.required'=>'Vui lòng nhập tên danh mục',
                'nametype.unique'=>'Danh mục đã tồn tại',
            ]);
        $product = new ProductType();
        $product->name = $req->nametype;
        $product->status = $req->status_radio;
        $product->save();
        return redirect()->route('danh-sach-danh-muc')->with('alert','Tạo danh mục thành công');
    }

    public function getDeleteTypeProduct(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $type_product = ProductType::where('id', $req->id)->first();
        $type_product->delete();
        return redirect()->route('admin')->with('alert','Xoá danh mục thành công');
    }

    public function getListProduct()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $product = Product::paginate(10);
        $type_product = ProductType::all();
        return view('page.list_product', compact('product','type_product'));
    }

    public function getAddProduct()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $product_type = ProductType::all();
        return view('page.add_product', compact('product_type'));
    }
    
    public function postAddProduct(Request $req)
    {
        $this->validate($req,
            [        
                'name'=>'required|unique:products,name',
                'amount'=>'required|integer|min:0',
                'rest'=>'required|integer|min:0',
                'cost'=>'required|integer|min:0',
                'unit_price'=>'required|integer|min:0',
                'promotion_price'=>'required|integer|min:0',
            ],
            [
                'name.required'=>'Vui lòng nhập tên sản phẩm',
                'name.unique'=>'Tên sản phẩm đã tồn tại đã tồn tại',
                'amount.required'=>'Vui lòng nhập số lượng',
                'amount.integer'=>'Vui lòng nhập số',
                'amount.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
                'rest.required'=>'Vui lòng nhập số lượng còn lại',
                'rest.integer'=>'Vui lòng nhập số',
                'rest.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
                'cost.required'=>'Vui lòng nhập giá vốn',
                'cost.integer'=>'Vui lòng nhập số',
                'cost.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
                'unit_price.required'=>'Vui lòng nhập giá bán',
                'unit_price.integer'=>'Vui lòng nhập số',
                'unit_price.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
                'promotion_price.required'=>'Vui lòng nhập giá khuyến mãi',
                'promotion_price.integer'=>'Vui lòng nhập số',
                'promotion_price.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            ]);
        $product = new Product();
        $product->name = $req->name;
        $product->id_type = $req->type_product;
        $product->description = $req->description;
        $product->amount = $req->amount;
        $product->rest = $req->rest;
        $product->cost = $req->cost;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->image = $req->image;
        $product->new = 1;
        $product->save();
        return redirect()->route('danh-sach-san-pham')->with('alert','Thêm sản phẩm thành công');
    }

    public function getEditProduct(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $product_type = ProductType::all();
        $product = Product::where('id', $req->id)->first();
        return view('page.edit_product', compact('product','product_type')); 
    }

    public function postEditProduct(Request $req, $id)
    {
        $this->validate($req,
        [        
            'name'=>'required|unique:products,name',
            'amount'=>'required|integer|min:0',
            'rest'=>'required|integer|min:0',
            'cost'=>'required|integer|min:0',
            'unit_price'=>'required|integer|min:0',
            'promotion_price'=>'required|integer|min:0',
        ],
        [
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại đã tồn tại',
            'amount.required'=>'Vui lòng nhập số lượng',
            'amount.integer'=>'Vui lòng nhập số',
            'amount.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'rest.required'=>'Vui lòng nhập số lượng còn lại',
            'rest.integer'=>'Vui lòng nhập số',
            'rest.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'cost.required'=>'Vui lòng nhập giá vốn',
            'cost.integer'=>'Vui lòng nhập số',
            'cost.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'unit_price.required'=>'Vui lòng nhập giá bán',
            'unit_price.integer'=>'Vui lòng nhập số',
            'unit_price.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'promotion_price.required'=>'Vui lòng nhập giá khuyến mãi',
            'promotion_price.integer'=>'Vui lòng nhập số',
            'promotion_price.min'=>'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        ]);
        $product = Product::find($id);
        $product->name = $req->name;
        $product->id_type = $req->type_product;
        $product->description = $req->description;
        $product->amount = $req->amount;
        $product->rest = $req->rest;
        $product->cost = $req->cost;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->image = $req->image;
        $product->new = 1;
        $product->save();
        return redirect()->route('danh-sach-san-pham')->with('alert', 'Cập nhật sản phẩm thành công');
    }

    public function getDeleteProduct(Request $req)
    {
        $product = Product::where('id', $req->id)->first();
        $product->delete();
        return redirect()->route('danh-sach-san-pham')->with('alert','Xoá sản phẩm thành công');
    }

    public function getSlide()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $item_slide = Slide::all();
        return view('page.slide', compact('item_slide'));
    }

    public function getEditItemSlide(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $slide = Slide::where('id', $req->id)->first();
        return view('page.edit_slide', compact('slide')); 
    }

    public function postEditItemSlide(Request $req, $id)
    {
        $slide = Slide::find($id);
        $slide->image = $req->image;
        $slide->save();
        return redirect()->route('admin')->with('alert', 'Cập nhật banner thành công');
    }

    public function getListUser()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $user = User::paginate(10);
        return view('page.list_user', compact('user'));
    }

    public function getDeleteUser(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $user = User::where('id', $req->id)->first();
        $user->delete();
        return redirect()->route('danh-sach-khach-hang')->with('alert','Xoá sản phẩm thành công');
    }

    public function getListBill()
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $bill = Bill::paginate(10);
        $customer = Customer::all();
        $user = User::all();
        return view('page.list_bill', compact('bill','customer','user'));
    }

    public function getEditBill(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $customer = Customer::all();
        $user = User::all();
        $bill = Bill::where('id', $req->id)->first();
        return view('page.edit_bill', compact('customer','user','bill')); 
    }

    public function postEditBill(Request $req, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $req->status_radio;
        $bill->save();
        return redirect()->route('danh-sach-hoa-don')->with('alert', 'Cập nhật sản phẩm thành công');
    }

    public function getDeleteBill(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $bill_detail = BillDetail::where('id_bill', $req->id);
        $bill = Bill::where('id', $req->id)->first();
        $bill_detail->delete();
        $bill->delete();
        return redirect()->route('danh-sach-hoa-don')->with('alert','Xoá hoá đơn thành công');
    }

    public function getViewBillDetail(Request $req)
    {
        if (!$this->userCan('admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
      
        }
        $bill_detail = BillDetail::where('id_bill', $req->id)->paginate(10);
        $product = Product::all();
        $bill = Bill::where('id', $req->id)->first();
        return view('page.list_bill_detail', compact('bill_detail','product','bill'));
    }

// ---------------------------------------------------------------------------------------------
    public function userCan($action, $option = NULL)
    {
        $user = Auth::user();
        return Gate::forUser($user)->allows($action, $option);
    }

}
