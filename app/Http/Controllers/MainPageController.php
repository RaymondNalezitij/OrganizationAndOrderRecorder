<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function create(): view
    {
        $organizations = \App\Models\Organization::select('*')->get();

        foreach ($organizations as $organization) {
            $orderInfo[] = DB::table('organizations_products')
                ->select('id', 'organization_id', 'product_id', 'date_provided', 'quantity')
                ->where('organization_id', $organization['id'])
                ->get();

            foreach ($orderInfo as $product) {
                foreach ($product as $value) {
                    if ($organization['id'] == $value->organization_id) {
                        $productInfo[] = [
                            Product::select('*')->where('id', $value->product_id)->get(),
                            $value->organization_id,
                            $value->quantity,
                            str_replace("-", " ", $value->date_provided),
                        ];
                    }
                }
            }
        }

        return view('mainPage', [
            'productInfo' => $productInfo,
            'organizations' => $organizations
        ]);
    }
}
