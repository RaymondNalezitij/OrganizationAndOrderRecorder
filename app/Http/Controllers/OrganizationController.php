<?php

namespace App\Http\Controllers;

use App\Jobs\StoreOrganization;
use App\Models\Organization;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function create(): view
    {
        return view('organizations', [
            'organizations' => Organization::select('*')->get(),
        ]);
    }

    public function store(Request $request)
    {
        if (isset($_POST['addOrganization'])) {
            $this->validate($request, [
                'name' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'contact_email' => ['required'],
            ]);

            $this->dispatch(new StoreOrganization(
                $request->get('name'),
                $request->get('address'),
                (integer)$request->get('contact_number'),
                $request->get('contact_email'),
            ));

            return Redirect::route('organizations');

        } else if (isset($_POST['getOrganization'])) {
            $productInfo = DB::table('organizations_products')
                ->select('product_id', 'date_provided', 'quantity')
                ->where('organization_id', $request->get('organizationId'))
                ->get();

            $productArray = [];
            foreach ($productInfo as $value) {
                $productArray[] = [
                    Product::select('*')->where('id', $value->product_id)->get(),
                    $value->quantity,
                    $value->date_provided
                ];
            }

            return view('organization', [
                'organization' => Organization::select('*')->where('id', $request->get('organizationId'))->get(),
                'orderedProducts' => $productArray,
                'products' => Product::select('*')->get(),
            ]);

        } else if (isset($_POST['addProduct'])) {
            $this->validate($request, [
                'product' => ['required'],
                'quantity' => ['required'],
            ]);

            $productAmount = Product::select('quantity', 'id')->where('name', $request->get('product'))->get();
            $remainder = $productAmount[0]['quantity'] - $request->get('quantity');

            Product::where('name', $request->get('product'))
                ->update(['quantity' => $remainder]);

            DB::table('organizations_products')
                ->insert([
                    'organization_id' => $request->get('organizationId'),
                    'product_id' => $productAmount[0]['id'],
                    'quantity' => $request->get('quantity'),
                    'date_provided' => date('y-m-d')
                ]);

            return Redirect::route('organizations');
        }
    }
}
