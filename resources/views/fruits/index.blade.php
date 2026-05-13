<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruit Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Fruit Management</h2>
                        <a href="{{ route('fruits.create') }}" style="background-color: #3b82f6; color: white; padding: 12px 16px; border-radius: 4px; font-weight: bold; text-decoration: none; display: inline-block;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#3b82f6'">
                            Add New Fruit
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left">Name</th>
                                    <th class="border px-4 py-2 text-left">Category</th>
                                    <th class="border px-4 py-2 text-left">Price/kg</th>
                                    <th class="border px-4 py-2 text-left">Stock</th>
                                    <th class="border px-4 py-2 text-left">Availability</th>
                                    <th class="border px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($fruits as $fruit)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-4 py-2">{{ $fruit->name }}</td>
                                        <td class="border px-4 py-2">{{ $fruit->category }}</td>
                                        <td class="border px-4 py-2">₱{{ number_format($fruit->price_per_kg, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $fruit->stock_quantity }} kg</td>
                                        <td class="border px-4 py-2">
                                            <span class="inline-block px-2 py-1 text-sm font-semibold {{ $fruit->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $fruit->availability ? 'Available' : 'Out of Stock' }}
                                            </span>
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('fruits.show', $fruit) }}" style="background-color: #22c55e; color: white; padding: 6px 10px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 12px; display: inline-block; margin-right: 5px;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">
                                                View
                                            </a>
                                            <a href="{{ route('fruits.edit', $fruit) }}" style="background-color: #eab308; color: white; padding: 6px 10px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 12px; display: inline-block; margin-right: 5px;" onmouseover="this.style.backgroundColor='#ca8a04'" onmouseout="this.style.backgroundColor='#eab308'">
                                                Edit
                                            </a>
                                            <form action="{{ route('fruits.destroy', $fruit) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #ef4444; color: white; padding: 6px 10px; border-radius: 4px; font-weight: bold; font-size: 12px; border: none; cursor: pointer;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="border px-4 py-2 text-center text-gray-500">
                                            No fruits found. <a href="{{ route('fruits.create') }}" class="text-blue-500 hover:underline">Add one now!</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $fruits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
