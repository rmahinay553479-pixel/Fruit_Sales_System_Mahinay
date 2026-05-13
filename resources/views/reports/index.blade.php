<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Fruit Reports</h2>

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-4 gap-4 mb-8">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 uppercase">Total Fruits</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ $totalFruits }}</p>
                        </div>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 uppercase">Available</h3>
                            <p class="text-3xl font-bold text-green-600">{{ $availableFruits }}</p>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 uppercase">Out of Stock</h3>
                            <p class="text-3xl font-bold text-red-600">{{ $outOfStockFruits }}</p>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 uppercase">Total Value</h3>
                            <p class="text-2xl font-bold text-purple-600">P{{ number_format($totalValue, 2) }}</p>
                        </div>
                    </div>

                    <!-- Report Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 bg-white p-4 rounded-lg border-2 border-gray-300">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Filter by Category</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($categories as $category)
                                    <a href="{{ route('reports.filterByCategory', $category) }}" style="display: inline-block; background-color: #3b82f6; color: white; padding: 8px 12px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 13px;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#3b82f6'">
                                        {{ $category }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b-2 border-purple-600 pb-2">Filter by Availability</h3>
                            <div class="flex gap-2">
                                <a href="{{ route('reports.filterByAvailability', 'available') }}" style="display: inline-block; background-color: #10b981; color: white; padding: 8px 12px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 13px;" onmouseover="this.style.backgroundColor='#059669'" onmouseout="this.style.backgroundColor='#10b981'">
                                    Available Fruits
                                </a>
                                <a href="{{ route('reports.filterByAvailability', 'out-of-stock') }}" style="display: inline-block; background-color: #ef4444; color: white; padding: 8px 12px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 13px;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">
                                    Out of Stock
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Export Buttons -->
                    <div class="mb-6 p-4 bg-gray-100 rounded-lg border-2 border-gray-300">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Export Reports</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- CSV Exports -->
                            <div>
                                <h4 class="text-base font-bold text-gray-800 mb-3 border-b-2 border-green-600 pb-2">CSV Exports</h4>
                                <div class="space-y-2">
                                    <a href="{{ route('reports.exportCSV') }}" style="display: block; background-color: #22c55e; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 8px;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">
                                        Export All Fruits (CSV)
                                    </a>
                                    <a href="{{ route('reports.exportAvailableCSV') }}" style="display: block; background-color: #22c55e; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 8px;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">
                                        Export Available Fruits (CSV)
                                    </a>
                                    <a href="{{ route('reports.exportOutOfStockCSV') }}" style="display: block; background-color: #22c55e; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">
                                        Export Out of Stock (CSV)
                                    </a>
                                </div>
                            </div>

                            <!-- PDF Exports -->
                            <div>
                                <h4 class="text-base font-bold text-gray-800 mb-3 border-b-2 border-red-600 pb-2">PDF Exports</h4>
                                <div class="space-y-2">
                                    <a href="{{ route('reports.exportPDF') }}" style="display: block; background-color: #ef4444; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 8px;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">
                                        Export All Fruits (PDF)
                                    </a>
                                    <a href="{{ route('reports.exportAvailablePDF') }}" style="display: block; background-color: #ef4444; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 8px;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">
                                        Export Available Fruits (PDF)
                                    </a>
                                    <a href="{{ route('reports.exportOutOfStockPDF') }}" style="display: block; background-color: #ef4444; color: white; padding: 10px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">
                                        Export Out of Stock (PDF)
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fruits Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">All Fruits</h3>

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
                                    <th class="border px-4 py-2 text-center">Actions</th>
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
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('fruits.show', $fruit) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm">
                                                View
                                            </a>
                                            <a href="{{ route('fruits.edit', $fruit) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm">
                                                Edit
                                            </a>
                                        </td>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
