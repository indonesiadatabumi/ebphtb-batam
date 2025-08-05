<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionModel;

class TransactionController extends Controller
{
    public function transaction()
    {
        // if(\Session::has('id_user')) return redirect()->back();
        $data = TransactionModel::getByRegPpat();
        
        return view('pages.transaction', compact('data'));
    }
}
