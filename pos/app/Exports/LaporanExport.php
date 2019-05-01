<?php
namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Model\Order;
use App\Model\User;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanExport implements FromView
{
	public function __construct($tahun, $bulan, $user)
    {
        $this->tahun 	= $tahun;
        $this->bulan 	= $bulan;
        $this->user 	= $user;
    }
    public function view(): View
    {
    	if ($this->user == '') {
    		$orders = Order::whereYear('created_at', '=', date($this->tahun))->whereMonth('created_at', '=', date($this->bulan))->paginate(100);
	        return view('laporan.excel', [
	            'orders' => $orders,
	            'users' => User::all()
	        ]);
    	} else {
    		$orders = Order::where('user_id', $this->user)->whereYear('created_at', '=', date($this->tahun))->whereMonth('created_at', '=', date($this->bulan))->paginate(100);
	        return view('laporan.excel', [
	            'orders' => $orders,
	            'users' => User::all()
	        ]);
    	}
    	
    }
}
