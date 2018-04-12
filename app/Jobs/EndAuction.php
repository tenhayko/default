<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Book;
use App\AuctionHistory;

class EndAuction implements ShouldQueue
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
        $book = Book::where('id', $this->book_id)->where('trang_thai_dau_gia', 0)->where('trang_thai', 2)->where('status', 1)->where('delete', false)->first();
        if ($book) {
            $book->trang_thai_dau_gia = 1;
            $book->save();
            $AuctionHistoryCount = AuctionHistory::where('books_id', $book->id)->where('win', 1)->orderBy('id', 'DESC')->first();
            if (!$AuctionHistoryCount) {
                $AuctionHistory = AuctionHistory::where('books_id', $book->id)->orderBy('price_paid', 'DESC')->orderBy('created_at', 'ASC')->first();
            }else{
                $AuctionHistory = AuctionHistory::where('books_id', $book->id)->where('id', '>', $AuctionHistoryCount->id)->orderBy('price_paid', 'DESC')->orderBy('created_at', 'ASC')->first();
            }
            if ($AuctionHistory) {
                if ($AuctionHistory->win != 2) {
                    $AuctionHistory->win = 1;
                }
                $AuctionHistory->save();
            }
            pushChangeBook();
        }
    }
}
