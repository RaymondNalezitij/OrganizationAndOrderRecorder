<?php

namespace App\Http\Controllers;

use App\Jobs\StoreProduct;
use App\Models\Organization;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create(): view
    {
        return view('products', [
            'products' => Product::select('*')->get(),
        ]);
    }

    public function store(Request $request)
    {
        if (isset($_POST['addProduct'])) {
            $this->validate($request, [
                'name' => ['required'],
                'type' => ['required'],
                'quantity' => ['required'],
                'price' => ['required'],
            ]);

            $this->dispatch(new StoreProduct(
                $request->get('name'),
                $request->get('type'),
                (integer)$request->get('quantity'),
                (float)$request->get('price'),
            ));

            return Redirect::route('products');

        } else if (isset($_POST['getProduct'])) {
            $x = DB::table('organizations_products')
                ->select('organization_id', 'date_provided','quantity')
                ->where('product_id', $request->get('productId'))
                ->get();

            $organizationArray = [];

            foreach ($x as $value) {
                $organizationArray[] = [
                    Organization::select('*')->where('id', $value->organization_id)->get(),
                    $value->quantity,
                    $value->date_provided
                ];
            }

            return view('product', [
                'product' => Product::select('*')->where('id', $request->get('productId'))->get(),
                'orderedBy' => $organizationArray,
            ]);
        }

    }
}
