<?php

namespace App\Livewire\Pages\Members;


use App\Models\Receive;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Deposits extends Component
{
    public string $search = '';
  public ?string $startDate = null;
  public ?string $endDate = null;
  public int $maxExportRows = 1000;
    

    public $todayDeposit;

    public function mount()
    {
        $this->todayDeposit=Receive::whereDate('created_at',Carbon::today())->sum('deposit');


    }

    public function delete($id)
    {
         $deposit = Receive::find($id)->delete('deposit');

         if( $deposit)
         {
            Toaster::success('payment deleted successfully');
         }

      
    }

   public function sendsms($phone,$massage){
    //public function sendsms(){f
    //$phone = '255628323760';
    //$massage = 'mapenzi yanauwa';
    // $api_key = '';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    //$api_key = 'qFzd89PXu1e/DuwbwxOE5uUBn6';
    //$curl = curl_init();
    $url = "https://sms-api.kadolab.com/api/send-sms";
    $token = getenv('SMS_TOKEN');

  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Authorization: Bearer '. $token,
      'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      "phoneNumbers" => ["+$phone"],
      "message" => $massage
    ]));
  
  $server_output = curl_exec($ch);
  curl_close ($ch);
  
  //print_r($server_output);
  }


    #[Computed]
    public function payments()
    {
      return $this->buildPaymentsQuery()->get();
    }

    #[Computed]
    public function exportCount()
    {
      return (clone $this->buildPaymentsQuery())->count();
    }

    public function downloadDepositsPdf()
    {
      // Guard against large exports that can exhaust DomPDF memory.
      $query = $this->buildPaymentsQuery();
      $totalRows = (clone $query)->count();
      $maxExportRows = $this->maxExportRows;

      if ($totalRows > $maxExportRows) {
        Toaster::error('Data ni nyingi sana kwa PDF. Tafadhali chagua tarehe fupi zaidi (chini ya rekodi 1000).');
        return;
      }

      @ini_set('memory_limit', '512M');
      $payments = $query->limit($maxExportRows)->get();

      if ($payments->isEmpty()) {
        Toaster::error('Hakuna data ya kupakua kwa vichujio ulivyochagua.');
        return;
      }

      $pdf = Pdf::loadView('pdf.deposits-list', [
        'payments' => $payments,
        'search' => $this->search,
        'startDate' => $this->startDate,
        'endDate' => $this->endDate,
      ])->setPaper('A4', 'landscape');

      $pdf->setOption([
        'dpi' => 72,
        'isRemoteEnabled' => false,
      ]);

      $filename = 'deposits-report-' . now()->format('YmdHis') . '.pdf';

      return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
      }, $filename);
    }

    protected function buildPaymentsQuery()
    {
      $query = Receive::query()
        ->with(['customer', 'user', 'payment'])
        ->whereNotNull('deposit');

      if ($this->startDate && $this->endDate) {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        if ($start->gt($end)) {
          [$start, $end] = [$end->copy()->startOfDay(), $start->copy()->endOfDay()];
        }

        $query->whereBetween('created_at', [
          $start,
          $end,
        ]);
      } elseif ($this->startDate) {
        $query->whereDate('created_at', '>=', Carbon::parse($this->startDate)->toDateString());
      } elseif ($this->endDate) {
        $query->whereDate('created_at', '<=', Carbon::parse($this->endDate)->toDateString());
      } else {
        $query->whereDate('created_at', now()->toDateString());
      }

      if (!empty($this->search)) {
        $search = $this->search;
        $query->where(function ($q) use ($search) {
          $q->whereRelation('customer', 'fname', 'LIKE', "%{$search}%")
            ->orWhereRelation('customer', 'nickname', 'LIKE', "%{$search}%")
            ->orWhereRelation('user', 'name', 'LIKE', "%{$search}%");
        });
      }

      return $query->orderByDesc('created_at');
    }
    
    public function render()
    {
        return view('livewire.pages.deposits',[ "todayDeposit" => $this->todayDeposit,
    ]);
    }
}
