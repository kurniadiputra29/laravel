<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\UserReport;
​
class UserController extends Controller
{
	public function export() 
	{
	    return Excel::download(new InvoicesExport, 'invoices.xlsx');
	}
}
