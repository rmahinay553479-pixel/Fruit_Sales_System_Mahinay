<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Fruit Sales System</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Fruit Management Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-800">Fruit Management</h4>
                        </div>
                        <p class="text-gray-600 mb-4">Manage your fruit inventory, add new products, update prices, and track stock levels.</p>
                        <div class="space-y-2">
                            <a href="{{ route('fruits.index') }}" style="display: block; background-color: #3b82f6; color: white; padding: 12px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 10px;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#3b82f6'">
                                View All Fruits
                            </a>
                            <a href="{{ route('fruits.create') }}" style="display: block; background-color: #22c55e; color: white; padding: 12px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none;" onmouseover="this.style.backgroundColor='#16a34a'" onmouseout="this.style.backgroundColor='#22c55e'">
                                Add New Fruit
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Reports Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-semibold text-gray-800">Reports</h4>
                        </div>
                        <p class="text-gray-600 mb-4">Generate detailed reports, filter by category or availability, and export data as CSV for analysis.</p>
                        <div class="space-y-2">
                            <a href="{{ route('reports.index') }}" style="display: block; background-color: #a855f7; color: white; padding: 12px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none; margin-bottom: 10px;" onmouseover="this.style.backgroundColor='#9333ea'" onmouseout="this.style.backgroundColor='#a855f7'">
                                View Reports
                            </a>
                            <a href="{{ route('reports.exportCSV') }}" style="display: block; background-color: #f97316; color: white; padding: 12px 16px; border-radius: 4px; text-align: center; font-weight: bold; text-decoration: none;" onmouseover="this.style.backgroundColor='#ea580c'" onmouseout="this.style.backgroundColor='#f97316'">
                                Export All Data (CSV)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Quick Stats</h4>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Fruit::count() }}</p>
                            <p class="text-gray-600 text-sm">Total Products</p>
                        </div>
                        <div class="text-center">
                            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Fruit::where('availability', true)->count() }}</p>
                            <p class="text-gray-600 text-sm">Available</p>
                        </div>
                        <div class="text-center">
                            <p class="text-3xl font-bold text-red-600">{{ \App\Models\Fruit::where('availability', false)->count() }}</p>
                            <p class="text-gray-600 text-sm">Out of Stock</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
