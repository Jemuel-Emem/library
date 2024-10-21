<?php

namespace App\Livewire\Admin;

use App\Models\processed_borrowbooks as ProcessedBorrowBooks;
use App\Models\Return_Books as Bookre;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\Component;

class BorrowedBooks extends Component
{
    use WithPagination;

    public function render()
    {
        $borrowedBooks = ProcessedBorrowBooks::with('book', 'user')
            ->paginate(10);

        return view('livewire.admin.borrowed-books', [
            'borrowedBooks' => $borrowedBooks
        ]);
    }
    public function markAsReturned($borrowbookId)
    {


        $borrowedBook = ProcessedBorrowBooks::find($borrowbookId);

        if ($borrowedBook) {
            $borrowedBook->update(['status' => 'Returned']);
           flash( 'Book marked as returned.');
        } else {
         flash( 'Borrowed book not found.');
        }

    }


    public function markAsNotReturned($borrowbookId)
    {
        $borrowedBook = ProcessedBorrowBooks::find($borrowbookId);

        if ($borrowedBook) {
            $borrowedBook->update(['status' => 'Not Returned']);
           flash( 'Book marked as not returned.');
        } else {
         flash( 'Borrowed book not found.');
        }
    }

}
