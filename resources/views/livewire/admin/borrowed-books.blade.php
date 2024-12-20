<div>
    <div class="p-6 bg-white shadow-md rounded-lg mt-12">
        <h2 class="text-2xl font-semibold mb-4">Borrowed Books</h2>

        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Book Title
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Borrower
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Phone Number
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Borrowed At
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Date Return
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $borrow)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $borrow->book->title ?? 'N/A' }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $borrow->user->name ?? 'N/A' }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $borrow->user->phone_number ?? 'N/A' }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ \Carbon\Carbon::parse($borrow->borrowed_at)->format('M d, Y') }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ \Carbon\Carbon::parse($borrow->due_date)->format('M d, Y') }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ ucfirst($borrow->status) }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex space-x-2">
                                <button
                                    wire:click="markAsReturned({{ $borrow->id }})"
                                    class="py-1 px-3 rounded
                                    @if($borrow->status === 'Returned' || $borrow->status === 'Not Returned') bg-gray-400 text-gray-700 cursor-not-allowed @else bg-blue-500 text-white hover:bg-blue-600 @endif"
                                    @if($borrow->status === 'Returned' || $borrow->status === 'Not Returned') disabled @endif
                                >
                                    Return
                                </button>
                                <button
                                    wire:click="markAsNotReturned({{ $borrow->id }})"
                                    class="py-1 px-3 rounded
                                    @if($borrow->status === 'Returned' || $borrow->status === 'Not Returned') bg-gray-400 text-gray-700 cursor-not-allowed @else bg-red-500 text-white hover:bg-red-600 @endif"
                                    @if($borrow->status === 'Returned' || $borrow->status === 'Not Returned') disabled @endif
                                >
                                    Not Return
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $borrowedBooks->links() }}
        </div>
    </div>
</div>
