<?php

namespace App\Http\Controllers;

use App\Data\StoreOrderRequestData;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $dataCollection = StoreOrderRequestData::from($request);
        } catch (\Throwable $th) {
            return $this->sendResponse($th->getMessage(), null, 422);
        }

        return DB::transaction(function () use ($dataCollection) {
            $order = Order::create();
            try {
                $this->createOrderProducts($order, $dataCollection->products);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendResponse($th->getMessage(), null, 422);
            }
            return $this->sendResponse('Order created successfully', $order->id, 200);
        });
    }
    
    /**
     * sendResponse
     *
     * @param  string $message
     * @param  int $orderId
     * @param  int $status
     * @return JsonResponse
     */
    private function sendResponse(string $message,?int $orderId,int $status): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'order_id' => $orderId
        ], $status);
    }
    
    /**
     * createOrderProducts
     *
     * @param  Order $order
     * @param  array $products
     * @return void
     */
    private function createOrderProducts($order, $products): void
    {
        $products->each(function ($product) use ($order) {
            $order->products()->attach($product->product_id, [
                'quantity' => $product->quantity
            ]);
        });
    }
}
