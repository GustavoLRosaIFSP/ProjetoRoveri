<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class AlphaVantageService
{
    protected $baseUrl;
    protected $apiKey;

    protected $map = [
        'PETR4' => 'PBR',
        'VALE3' => 'VALE',
        'ITUB4' => 'ITUB',
        'BBAS3' => 'BDORY',
    ];

    public function __construct()
    {
        $this->baseUrl = config('services.alpha.base_url');
        $this->apiKey  = config('services.alpha.key');
    }

    public function getPrecos(array $tickers)
    {
        $resultados = [];

        foreach ($tickers as $ticker) {

            $symbol = $this->map[$ticker] ?? null;

            if (!$symbol) {
                $resultados[] = [
                    'ticker' => $ticker,
                    'erro'   => true,
                    'status' => 404,
                ];
                continue;
            }

            $response = Http::get($this->baseUrl, [
                'function' => 'GLOBAL_QUOTE',
                'symbol'   => $symbol,
                'apikey'   => $this->apiKey,
            ]);

            if ($response->failed() || empty($response['Global Quote'])) {
                $resultados[] = [
                    'ticker' => $ticker,
                    'erro'   => true,
                    'status' => $response->status(),
                ];
                continue;
            }

            $data = $response['Global Quote'];

            $resultados[] = [
                'ticker' => $ticker,
                'preco'  => $data['05. price'] ?? null,
                'symbol_adr' => $symbol,
            ];
        }

        return $resultados;
    }
}
