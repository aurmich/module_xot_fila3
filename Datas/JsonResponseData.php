<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class JsonResponseData extends Data
{
    public bool $success = true; // => false,
    public string $message;
    public ?int $code = null;
    public array $data = [];
    public int $status = 200;

    /*
    public function toResponse($request)
    {

    }
    */
    public function response(): \Illuminate\Http\JsonResponse
    {
        $data = [
            'success' => $this->success,
            'message' => $this->message,
            'code' => $this->code,
            'data' => $this->data,
            'now' => now(),
        ];

        return response()->json($data, $this->status);
    }
}