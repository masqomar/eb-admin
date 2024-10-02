<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmmProvider;
use App\Models\SmmTransaction;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SmmLayananController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:smm provider view')->only('index', 'show');
    //     $this->middleware('permission:smm provider create')->only('create', 'store');
    //     $this->middleware('permission:smm provider edit')->only('edit', 'update');
    //     $this->middleware('permission:smm provider delete')->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $smmProvider = SmmProvider::first();
        $api_id = $smmProvider->api_id;
        $api_key = $smmProvider->api_key;
 
        // URL API yang akan diakses
        $profileUrl = "https://irvankedesmm.co.id/api/profile";
        $servicesUrl = "https://irvankedesmm.co.id/api/services";

        // Kirim request POST ke API
        $postData =[
            'api_id' => $api_id,
            'api_key' => $api_key
        ];

         // Mengambil data profile (balance) menggunakan POST
         $profileResponse = Http::post($profileUrl, $postData);

         // Mengambil data services menggunakan POST
         $servicesResponse = Http::post($servicesUrl, $postData);

         // Memeriksa apakah request profile berhasil
        if ($profileResponse->successful()) {
            $profileData = $profileResponse->json();
            $balance = $profileData['data']['balance'];
        } else {
            $balance = null;
        }

        // Memeriksa apakah request services berhasil
        if ($servicesResponse->successful()) {
            $servicesData = $servicesResponse->json();
            $services = $servicesData['data'];
        } else {
            $services = [];
        }

        // Mengumpulkan kategori yang unik dari daftar layanan
        $categories = collect($services)->pluck('category')->unique();
        
         // Filter berdasarkan kategori atau harga dari input form
         $filteredServices = collect($services);

         if ($request->filled('category')) {
             $filteredServices = $filteredServices->where('category', $request->category);
         }
 
         if ($request->filled('min_price') && $request->filled('max_price')) {
             $filteredServices = $filteredServices->whereBetween('price', [$request->min_price, $request->max_price]);
         }

        return view('smm-services.index', [
            'balance' => $balance,
            'services' => $filteredServices->all(),
            'categories' => $categories,
            'request' => $request // Mengirim request untuk mempertahankan nilai filter
        ]);
          
    }

    public function order()
    {
        return view('smm-services.order');
    }

    // public function submitOrder(Request $request)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'service' => 'required|integer',
    //         'target' => 'required|string',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $smmProvider = SmmProvider::first();
    //     $api_id = $smmProvider->api_id;
    //     $api_key = $smmProvider->api_key;

    //     // URL API untuk order
    //     $url = 'https://irvankedesmm.co.id/api/order';

    //     // Kirim request POST ke API
    //     $response = Http::post($url, [
    //         'api_id' => $api_id,
    //         'api_key' => $api_key,
    //         'service' => $request->input('service'),
    //         'target' => $request->input('target'),
    //         'quantity' => $request->input('quantity'),
    //     ]);

    //     // Cek respons dari API
    //     if ($response->successful()) {
    //         $result = $response->json();
    //         return redirect()->back()->with('success', 'Order berhasil: ' . $result['msg']);
    //     } else {
    //         return redirect()->back()->with('error', 'Gagal melakukan order: ' . $response->body());
    //     }
    // }

    public function submitOrder(Request $request)
    {
        $validated = $request->validate([
            'service' => 'required|integer',
            'target' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil api_id dan api_key dari database
        $smmProvider = SmmProvider::first();
        $api_id = $smmProvider->api_id;
        $api_key = $smmProvider->api_key;

        // URL API untuk order
        $url = 'https://irvankedesmm.co.id/api/order';

        // Kirim permintaan order
        $response = Http::post($url, [
            'api_id' => $api_id,
            'api_key' => $api_key,
            'service' => $validated['service'],
            'target' => $validated['target'],
            'quantity' => $validated['quantity'],
        ]);

        // Cek apakah respons sukses
        if ($response->successful()) {
            $data = $response->json();

            // Simpan respons order ke database
            SmmTransaction::create([
                'service_id' => $validated['service'],
                'target' => $validated['target'],
                'quantity' => $validated['quantity'],
                'api_response' => json_encode($data), // Simpan respons dalam bentuk JSON
            ]);

            return redirect()->back()->with('success', 'Order berhasil: ' . $data['msg']);
        } else {
            return response()->json(['message' => 'Gagal melakukan order', 'error' => $response->json()], $response->status());
        }
    }

    public function orderHistoy()
    {
        $smmHistories = SmmTransaction::get();

        // return json_encode($smmHistories);
        return view('smm-services.history', compact('smmHistories'));
    }

    public function cekStatus(Request $request)
    {
        $client = new Client();

        // API URL dan data yang akan dikirim ke API
        $url = 'https://irvankedesmm.co.id/api/status';
        $smmProvider = SmmProvider::first();
        $api_id = $smmProvider->api_id;
        $api_key = $smmProvider->api_key;
        $order_id = $request->input('order_id'); // Ambil order ID dari request

        try {
            // Lakukan POST request ke API eksternal
            $response = $client->post($url, [
                'form_params' => [
                    'api_id' => $api_id,
                    'api_key' => $api_key,
                    'id' => $order_id,
                ]
            ]);

            // Decode response API
            $apiResponse = json_decode($response->getBody(), true);

            // Kirim response lengkap ke frontend
            return response()->json([
                'status' => $apiResponse['status'],
                'msg' => $apiResponse['msg'],
                'data' => $apiResponse['data'], // Kirim data lengkap dari API
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal melakukan request ke API',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
