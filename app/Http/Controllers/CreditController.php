<?php

namespace App\Http\Controllers;

use App\Http\Application\Service\Credit\CreditService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreditController extends Controller
{
    private $creditService;

    public function __construct(CreditService $creditService)
    {
        $this->creditService = $creditService;
    }

    public function index(Request $request, Response $response)
    {
        $result = $this->creditService->getCredit($request);

        return $result;
    }
}
