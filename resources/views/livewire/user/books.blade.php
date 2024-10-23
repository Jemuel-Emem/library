<div>
    <div class="flex mb-6 mt-4 p-4">
        <input type="text" wire:model="searchTerm" placeholder="Search by title, author, category..." class="border rounded-l px-4 py-2 w-full" />
        <button wire:click="search" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r ml-2 w-32">
            Search
        </button>
    </div>

    <div class="flex flex-wrap gap-2 mb-6 p-4">
        <button wire:click="filterByCategory('Fiction')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Fiction</button>
        <button wire:click="filterByCategory('Non-Fiction')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Non-Fiction</button>
        <button wire:click="filterByCategory('Science')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Science</button>
        <button wire:click="filterByCategory('History')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">History</button>
        <button wire:click="filterByCategory('Biography')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Biography</button>
        <button wire:click="filterByCategory('Fantasy')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Fantasy</button>
        <button wire:click="filterByCategory('Mystery')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Mystery</button>
        <button wire:click="filterByCategory('Thriller')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Thriller</button>
        <button wire:click="filterByCategory('Romance')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Romance</button>
    </div>



    <div class="p-6 bg-white shadow-md rounded-lg mt-12">
        <h2 class="text-2xl font-semibold mb-4">Books List</h2>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($books as $book)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                    <img src="{{ $book->image ? asset('storage/' . $book->image) : 'https://via.placeholder.com/150' }}" alt="Book Cover" class="w-full h-48 object-cover">
                    <div class="p-4 w-80">
                        <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
                        <p class="text-gray-600 mb-1">ISBN: {{ $book->isbn }}</p>
                        {{-- <p class="text-gray-600 mb-1">Catalog: {{ $book->catalog }}</p> --}}
                        <p class="text-gray-600 mb-1">Author: {{ $book->author }}</p>
                        <p class="text-gray-600 mb-1">Publisher: {{ $book->publisher }}</p>
                        <p class="text-gray-600 mb-1">Category: {{ $book->category }}</p>
                        <p class="text-gray-600 mb-1">Available: {{ $book->quantity }}</p>
                    </div>
                    <div class="flex justify-center p-4 border-t border-gray-200">
                        <button wire:click="openConfirmModal({{ $book->id }})" class="bg-green-500 text-white py-1 px-4 rounded hover:bg-green-600">Borrow Now</button>
                    </div>
                </div>
            @empty

                <div class="col-span-full text-center text-gray-500 mt-6 w-screen">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.209 0-4 1.791-4 4s1.791 4 4 4 4-1.791 4-4-1.791-4-4-4zM5.635 6.343A9 9 0 0116.95 2.318m-1.414 1.414A9.006 9.006 0 005.636 6.343M16.95 2.318a9 9 0 01.033 12.729M2.318 16.95a9 9 0 0112.728-.033m-1.414-1.414a9.006 9.006 0 00-12.728.033"></path>
                    </svg>
                    <p class="mt-4">No books found. Try adjusting your search criteria.</p>
                </div>
            @endforelse
        </div>


        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>



    <x-modal-card title="Borrow Book" name="confirmmodal" wire:model.defer="confirmmodal" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="flex flex-col items-center">
            @if ($selectedBook)
                <img src="{{ $selectedBook->image ? asset('storage/' . $selectedBook->image) : 'https://via.placeholder.com/300' }}" alt="Book Cover" class="w-full h-64 object-cover rounded-md shadow-md mb-4">
                <div class="bg-gray-100 p-4 rounded-md shadow-sm w-full mb-4">
                    <label for="return_date" class="block text-gray-700 font-semibold mb-2">Select Return Date:</label>
                    <input type="date" id="return_date" wire:model="returnDate" class="w-full px-4 py-2 border rounded-md">
                </div>

                <div class="w-full bg-gray-50 p-4 rounded-md shadow-sm">
                    <x-checkbox id="agree" wire:model="isAgreed" label="I agree to the terms and conditions" primary />
                    <div class="mt-4 text-gray-700">
                        <h4 class="font-semibold mb-2">Terms and Conditions</h4>
                        <div>
                            <h5 class="font-semibold">Borrowing Period</h5>
                            <p>The borrower is allowed to borrow the book for a period of one week (7 days) starting from the date of issuance.</p>
                        </div>
                        <div class="mt-2">
                            <h5 class="font-semibold">Late Return Penalty</h5>
                            <p>If the borrower fails to return the book by the due date, a penalty fee will be applied for each day the book is overdue. The penalty fee is P20.00 per day.</p>
                        </div>
                        <div class="mt-2">
                            <h5 class="font-semibold">Responsibility</h5>
                            <p>The borrower is responsible for the book during the borrowing period and must ensure that it is returned in the same condition as it was issued.</p>
                        </div>
                        <div class="mt-2">
                            <h5 class="font-semibold">Lost or Damaged Books</h5>
                            <p>In the event that the book is lost or returned damaged, the borrower will be required to pay the full replacement cost of the book.</p>
                        </div>
                    </div>
                </div>

                @if ($validationMessage)
                    <div class="w-full bg-red-100 text-red-700 p-4 rounded-md mb-4">
                        {{ $validationMessage }}
                    </div>
                @endif
            @endif
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4 p-4">
                <x-button flat label="Cancel" wire:click="closeModal" />
                <x-button primary label="Borrow Now" wire:click="borrow" />
            </div>
        </x-slot>
    </x-modal-card>


    <x-modal-card title="QR Code" name="qrModal" wire:model.defer="qrModal" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="flex flex-col items-center">
            @if ($qrCodeDataUrl)
                <p class="mb-4">QR Code Data: Book ID: {{ $this->selectedBookId }}, Title: {{ $this->selectedBook->title }}, Borrower: {{ Auth::user()->name }}</p>

                <!-- Display the QR code image -->
                <img src="{{ $qrCodeDataUrl }}" alt="QR Code for Borrowed Book" class="w-64 h-64">

                <!-- Provide a download link for the QR code -->
                <a href="{{ $qrCodeDataUrl }}" download="borrowed_book_qr_code.png" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Download QR Code
                </a>

                <p class="text-gray-700 mt-4 text-center">
                    Please download the QR code before closing this modal.
                </p>
            @else
                <p class="text-red-500">QR Code data not found.</p>
            @endif
        </div>
    </x-modal-card>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        document.addEventListener('livewire:load', function () {
            // Hook into Livewire message processed event to check when modal opens
            Livewire.hook('message.processed', (message, component) => {
                // Check if the QR Modal is open
                if (component.fingerprint.name === 'user.books' && @json($qrModal)) {
                    let qrCodeData = @json($qrCodeData);

                    if (qrCodeData) {
                        // Clear any previous QR code
                        let qrCodeContainer = document.getElementById('qrcode');
                        qrCodeContainer.innerHTML = ""; // Ensure previous QR codes are cleared

                        // Generate new QR code
                        new QRCode(qrCodeContainer, {
                            text: qrCodeData, // The data from Livewire
                            width: 256,
                            height: 256
                        });

                        // Set the download link for the generated QR code
                        setTimeout(() => {
                            const qrImage = qrCodeContainer.querySelector('img'); // Grab the generated QR code image
                            if (qrImage) {
                                const downloadLink = document.getElementById("download-qr");
                                downloadLink.href = qrImage.src;
                                downloadLink.download = "borrowed_book_qr_code.png";
                            }
                        }, 100); // Wait a little to ensure the QR code is generated
                    }
                }
            });
        });
    </script>


</div>
