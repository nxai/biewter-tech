<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // --- ສ່ວນຂອງຜູ້ໃຊ້ທົ່ວໄປ ---
    public function index(Request $request)
    {
        $query = Product::with('images');

        // ຖ້າມີການຄົ້ນຫາ
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $products = $query->latest()->get();

        $rateData = ExchangeRate::first();
        $rate = $rateData ? $rateData->rate : 700;

        return view('products.index', compact('products', 'rate'));
    }

    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);

        // ດຶງສິນຄ້າອື່ນໆ 4 ລາຍການມາສະແດງ
        $relatedProducts = Product::with('images')
            ->where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        $rateData = ExchangeRate::first();
        $rate = $rateData ? $rateData->rate : 700;

        return view('products.show', compact('product', 'relatedProducts', 'rate'));
    }

    // --- ສ່ວນຂອງ Admin ---
    public function adminIndex()
    {
        $products = Product::with('images')->latest()->get();
        return view('admin.products', compact('products'));
    }

    // ເພີ່ມສິນຄ້າໃໝ່ (ຮອງຮັບ Stock)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0', // ເພີ່ມການກວດສອບ Stock
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // ບັນທຶກຂໍ້ມູນຫຼັກ (Price ໃນ DB ຈະເປັນ THB)
        $product = Product::create($request->only('name', 'description', 'price', 'stock'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }
        return back()->with('success', 'ເພີ່ມສິນຄ້າໃໝ່ຮຽບຮ້ອຍແລ້ວ!');
    }

    // --- ຟັງຊັນ Update (ແກ້ໄຂ Error PATCH) ---
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // ອັບເດດຂໍ້ມູນຫຼັກ
        $product->update($request->only('name', 'description', 'price', 'stock'));

        // ຖ້າມີການອັບໂຫຼດຮູບໃໝ່ເພີ່ມ
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return back()->with('success', 'ອັບເດດຂໍ້ມູນສິນຄ້າສຳເລັດ!');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }
        $product->delete();
        return back()->with('success', 'ລຶບສິນຄ້າອອກຈາກລະບົບແລ້ວ!');
    }

    public function destroyImage($id)
    {
        $image = ProductImage::findOrFail($id);
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();
        return back()->with('success', 'ລຶບຮູບພາບຮຽບຮ້ອຍແລ້ວ!');
    }
}
