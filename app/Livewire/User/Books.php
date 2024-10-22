<?php

namespace App\Livewire\User;

use App\Models\books as Book;
use App\Models\borrowbooks as BorrowBook;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Books extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $returnDate;
    public $confirmmodal = false;
    public $qrModal = false;
    public $selectedBookId = null;
    public $selectedBook = null;
    public $isAgreed = false;
    public $validationMessage = '';
    public $qrCodeDataUrl = '';

    protected $listeners = ['openConfirmModal'];

    public function render()
    {
        $books = Book::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('author', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('category', 'like', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.user.books', ['books' => $books]);
    }

    public function search()
    {

    }

    public function openConfirmModal($bookId)
    {
        $this->selectedBookId = $bookId;
        $this->selectedBook = Book::find($bookId);
        $this->confirmmodal = true;
        $this->isAgreed = false;
        $this->validationMessage = '';
    }

    public function filterByCategory($category)
{
    $this->searchTerm = $category;
    $this->search();
}


    public function closeModal()
    {
        $this->confirmmodal = false;
    }

    public function closeQRModal()
    {
        $this->qrModal = false;
    }

    public function borrow()
    {
        if (!$this->isAgreed) {
            $this->validationMessage = 'You must agree to the terms and conditions.';
            return;
        }

        if ($this->selectedBookId) {
            $userId = Auth::id();
            $book = Book::find($this->selectedBookId);

            if ($book) {
                try {
                    BorrowBook::create([
                        'book_id' => $book->id,
                        'user_id' => $userId,
                        'borrowed_at' => now(),
                        'due_date' => $this->returnDate,
                        'returned_at' => null,
                        'status' => 'Borrow',
                    ]);

                    $qrCode = new QrCode('Book ID: ' . $book->id . ', Title: ' . $book->title . ', Borrower: ' . Auth::user()->name);

                    $writer = new PngWriter();
                    $result = $writer->write($qrCode);
                    $this->qrCodeDataUrl = 'data:image/png;base64,' . base64_encode($result->getString());

                    $this->qrModal = true;
                    $this->closeModal();
                } catch (\Exception $e) {
                    Log::error('Error borrowing book: ' . $e->getMessage());
                    session()->flash('error', 'Error borrowing book. Please try again later.');
                }
            } else {
                session()->flash('error', 'Book not found.');
            }
        } else {
            session()->flash('error', 'No book selected.');
        }
    }





}
