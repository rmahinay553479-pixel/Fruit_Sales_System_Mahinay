<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $fruit->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">{{ $fruit->name }}</h2>
                        <div class="flex gap-2">
                            <a href="{{ route('fruits.edit', $fruit) }}" style="background-color: #eab308; color: white; padding: 12px 16px; border-radius: 4px; font-weight: bold; text-decoration: none; display: inline-block;" onmouseover="this.style.backgroundColor='#ca8a04'" onmouseout="this.style.backgroundColor='#eab308'">
                                Edit
                            </a>
                            <a href="{{ route('fruits.index') }}" style="background-color: #6b7280; color: white; padding: 12px 16px; border-radius: 4px; font-weight: bold; text-decoration: none; display: inline-block;" onmouseover="this.style.backgroundColor='#374151'" onmouseout="this.style.backgroundColor='#6b7280'">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Category</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{ $fruit->category }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Availability</h3>
                            <p class="mt-1">
                                <span class="inline-block px-3 py-1 text-sm font-semibold {{ $fruit->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $fruit->availability ? 'Available' : 'Out of Stock' }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Price per kg</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">₱{{ number_format($fruit->price_per_kg, 2) }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Stock Quantity</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{ $fruit->stock_quantity }} kg</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Description</h3>
                        <p class="mt-2 text-gray-700">{{ $fruit->description ?? 'No description provided.' }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Created</h3>
                        <p class="mt-1 text-gray-700">{{ $fruit->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Last Updated</h3>
                        <p class="mt-1 text-gray-700">{{ $fruit->updated_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div class="mt-8">
                        <form action="{{ route('fruits.destroy', $fruit) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #ef4444; color: white; padding: 12px 16px; border-radius: 4px; font-weight: bold; border: none; cursor: pointer;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'" onclick="return confirm('Are you sure you want to delete this fruit?')">
                                Delete Fruit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
