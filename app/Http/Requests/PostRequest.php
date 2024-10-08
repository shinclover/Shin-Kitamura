<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.tyourizikan' => 'required|integer|between:0,300',
            'post.karori' => 'required|numeric|between:0,1000',
            'post.enbun' => 'required|numeric|between:0,200',
            'post.tanpakusitu' => 'required|numeric|between:0,200',
            'post.sisitu' => 'required|numeric|between:0,200',
            'post.tansuikabutu' => 'required|numeric|between:0,200',
            'post.syokuensoutouryou' => 'required|numeric|between:0,200',
            'post.tousitu' => 'required|numeric|between:0,200',
            'post.tukurikata' => 'required|string|max:500',
            'post.zairyou' => 'required|string|max:200',
        
            
        ];
    }
}