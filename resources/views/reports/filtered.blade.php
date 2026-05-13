<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @isset($category)
                {{ $category }} Report
            @elseif(isset($statusLabel))
                {{ $statusLabel }} Report
            @else
                Filtered Report
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">
                            @isset($category)
                                {{ $category }} Fruits Report
                            @elseif(isset($statusLabel))
                                {{ $statusLabel }} Fruits Report
                            @else
                                Filtered Fruits Report
                            @endisset
                        </h2>
                        <a href="{{ route('reports.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Reports
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left">Name</th>
                                    <th class="border px-4 py-2 text-left">Category</th>
                                    <th class="border px-4 py-2 text-left">Price/kg</th>
                                    <th class="border px-4 py-2 text-left">Stock</th>
                                    <th class="border px-4 py-2 text-left">Total Value</th>
                                    <th class="border px-4 py-2 text-left">Availability</th>
                                    <th class="border px-4 py-2 text-left">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($fruits as $fruit)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-4 py-2">{{ $fruit->name }}</td>
                                        <td class="border px-4 py-2">{{ $fruit->category }}</td>
                                        <td class="border px-4 py-2">P{{ number_format($fruit->price_per_kg, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $fruit->stock_quantity }} kg</td>
                                        <td class="border px-4 py-2">P{{ number_format($fruit->price_per_kg * $fruit->stock_quantity, 2) }}</td>
                                        <td class="border px-4 py-2">
                                            <span class="inline-block px-2 py-1 text-sm font-semibold {{ $fruit->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $fruit->availability ? 'Available' : 'Out of Stock' }}
                                            </span>
                                        </td>
                                        <td class="border px-4 py-2 text-sm">{{ Str::limit($fruit->description, 50) ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="border px-4 py-2 text-center text-gray-500">
                                            No fruits found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">
                            <strong>Total Records:</strong> {{ $fruits->count() }} |
                            <strong>Total Value:</strong> P{{ number_format($fruits->sum(fn($f) => $f->price_per_kg * $f->stock_quantity), 2) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
