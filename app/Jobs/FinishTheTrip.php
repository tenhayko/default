<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Book;
use App\AgencyTransactionHistory;
use App\Agency;
use App\TaiXe;

class FinishTheTrip implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $book_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $book = Book::where('id', $this->book_id)->where('delete', false)->where('status', 1)->where('trang_thai', 2)->where('trang_thai_dau_gia', '<>', 0)->first();
        if ($book) {

            if ($book->trang_thai_dau_gia == 1 || $book->trang_thai_dau_gia ==2) {
                $taixe = TaiXe::where('id', $book->id_taixe)->first();
                if ($taixe) {
                    $book->status = 2;
                    $book->save();
                    if ($book->type_code == 1) {
                        $agency = Agency::where('code', $book->ma_km)->first();
                        if ($agency && $book->feedback) {
                            $agency->amount = $agency->amount + $book->feedback;
                            $agency->save();
                            $agencyHistory = new AgencyTransactionHistory();
                            $agencyHistory->content = 'Cộng tiền chiết khấu cuốc '.$book->ma;
                            $agencyHistory->transaction_amount = $book->feedback;
                            $agencyHistory->surplus = $agency->amount;
                            $agencyHistory->agency_id = $agency->id;
                            $agencyHistory->save();
                        }
                    }
                }else{
                    $book->status = 3;
                    $book->save();
                }
            }
            pushChangeBook();
            
        }
    }
}
