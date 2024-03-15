<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  = $request->search ?? null;
        $results = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('desc', 'LIKE', '%' . $search . '%');

        if ($request->date) {
            $results = $results->whereDate('created_at', '=', $request->date);
        }
        if ($request->month) {
            $results = $results->whereMonth('created_at', '=', $request->month);
        }
        if ($request->year) {
            $results = $results->whereYear('created_at', $request->year);
        }
        $results = $results
            ->orderBy("created_at", "desc")
            ->paginate($request->limit ?? 10);
        return ProductResource::collection($results);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            "title" => "required",
            "desc" => "required",
            "price" => "required",
        ]);
        $img = null;
        // if ($request->picture) {
        //     $img = $this->uploadFile($request->picture, $request->user()?->username ?? "tester");
        // }
        $data = Product::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "price" => $request->price,
            // "user_id" => $request->user()?->id ?? 1,
        ]);

        return response()->json([
            "message" => "Success",
            "data" => $data
        ], 200);
    }


    public function get($id)
    {
        $data = Product::find($id);
        if (!$data) {
            return response()->json([
                "message" => "Product not found!"
            ], 404);
        }
        return new ProductResource($data);
    }


    public function edit(Request $request, $id)
    {
        $credentials = $request->validate([
            // 'picture' => 'mimes:jpeg,jpg,png',
            "title" => "required",
            "desc" => "required",
            "price" => "required",
        ]);

        $img = null;
        // if ($request->picture) {
        //     $img = $this->uploadFile($request->picture, $request->user()?->username ?? "tester");
        // }
        $data = Product::find($id);
        if (!$data) {
            return response()->json([
                "message" => "Product not found!"
            ], 404);
        }

        if ($data->user_id != $request->user()?->id)
            return response()->json([
                "message" => "Product not found!"
            ], 404);

        $data->update([
            "title" => $request->title,
            "desc" => $request->desc,
            "price" => $request->price,
        ]);

        return response()->json([
            "message" => "Success edit Product"
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $data = Product::find($id);
        if (!$data) {
            return response()->json([
                "message" => "Product not found!"
            ], 404);
        }
        // if ($request->user()?->role_id == 0 && $data->user_id != $request->user()?->id)
        //     return response()->json([
        //         "message" => "Product not found!"
        //     ], 404);

        $data->delete();
        return response()->json([
            "message" => "Success delete Product"
        ]);
    }

    // public function uploadFile($file, $user)
    // {
    //     $filename = $file->getClientOriginalName();
    //     $ext = $file->getClientOriginalExtension();
    //     $newFilename = 'img-' . rand() . '-' . time() . '.' . $ext;
    //     // Image::configure(['driver' => 'gd']);
    //     // $foto = Image::make($file);
    //     // $foto->resize(480, null, function ($constraint) {
    //     //     $constraint->aspectRatio();
    //     // });
    //     $path = Storage::disk('local')->put('image/' . $user . '/' . $newFilename, $file);

    //     return  [
    //         "path" =>  $path,
    //         "name" => $newFilename
    //     ];
    // }
}
