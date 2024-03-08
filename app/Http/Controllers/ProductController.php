<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $endpoint = 'http://localhost:8000/api/product';
        $curl = curl_init();
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY1OTI0NjM4MSwiZXhwIjoxNjU5MjQ5OTgxLCJuYmYiOjE2NTkyNDYzODEsImp0aSI6IjNGVGQzM1ptMjdCZTNKcFQiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Hy_iF0HHIaizqJPTg5-5PCQsDWqyOylUgFK7FocOO3c",
            )
        );
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $resultt = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($resultt);
        return view('product.index', compact('result'));
    }
}