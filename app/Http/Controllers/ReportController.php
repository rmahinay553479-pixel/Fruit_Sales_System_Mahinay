<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display fruit reports page
     */
    public function index()
    {
        $fruits = Fruit::all();
        $categories = $fruits->pluck('category')->unique()->values();
        $totalFruits = $fruits->count();
        $availableFruits = $fruits->where('availability', true)->count();
        $outOfStockFruits = $fruits->where('availability', false)->count();
        $totalValue = $fruits->sum(fn($f) => $f->price_per_kg * $f->stock_quantity);

        return view('reports.index', compact(
            'fruits',
            'categories',
            'totalFruits',
            'availableFruits',
            'outOfStockFruits',
            'totalValue'
        ));
    }

    /**
     * Filter fruits by category
     */
    public function filterByCategory($category)
    {
        $fruits = Fruit::where('category', $category)->get();
        $categories = Fruit::pluck('category')->unique()->values();

        return view('reports.filtered', compact('fruits', 'categories', 'category'));
    }

    /**
     * Filter fruits by availability
     */
    public function filterByAvailability($status)
    {
        $availability = $status === 'available' ? true : false;
        $fruits = Fruit::where('availability', $availability)->get();
        $categories = Fruit::pluck('category')->unique()->values();
        $statusLabel = $status === 'available' ? 'Available' : 'Out of Stock';

        return view('reports.filtered', compact('fruits', 'categories', 'statusLabel', 'fruits'));
    }

    /**
     * Export all fruits to CSV
     */
    public function exportCSV()
    {
        $fruits = Fruit::all();

        $filename = 'fruits_report_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://memory', 'r+');

        fputcsv($handle, ['Fruit Name', 'Category', 'Price per kg', 'Stock Quantity', 'Description', 'Availability', 'Created At']);

        foreach ($fruits as $fruit) {
            fputcsv($handle, [
                $fruit->name,
                $fruit->category,
                $fruit->price_per_kg,
                $fruit->stock_quantity,
                $fruit->description,
                $fruit->availability ? 'Available' : 'Out of Stock',
                $fruit->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    /**
     * Export available fruits to CSV
     */
    public function exportAvailableCSV()
    {
        $fruits = Fruit::where('availability', true)->get();

        $filename = 'available_fruits_report_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://memory', 'r+');

        fputcsv($handle, ['Fruit Name', 'Category', 'Price per kg', 'Stock Quantity', 'Description', 'Created At']);

        foreach ($fruits as $fruit) {
            fputcsv($handle, [
                $fruit->name,
                $fruit->category,
                $fruit->price_per_kg,
                $fruit->stock_quantity,
                $fruit->description,
                $fruit->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    /**
     * Export out of stock fruits to CSV
     */
    public function exportOutOfStockCSV()
    {
        $fruits = Fruit::where('availability', false)->get();

        $filename = 'out_of_stock_fruits_report_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://memory', 'r+');

        fputcsv($handle, ['Fruit Name', 'Category', 'Price per kg', 'Stock Quantity', 'Description', 'Created At']);

        foreach ($fruits as $fruit) {
            fputcsv($handle, [
                $fruit->name,
                $fruit->category,
                $fruit->price_per_kg,
                $fruit->stock_quantity,
                $fruit->description,
                $fruit->created_at->format('Y-m-d H:i:s'),
            ]);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }

    /**
     * Export all fruits to PDF
     */
    public function exportPDF()
    {
        $fruits = Fruit::all();
        $totalValue = $fruits->sum(fn($f) => $f->price_per_kg * $f->stock_quantity);

        $html = view('reports.pdf', compact('fruits', 'totalValue'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->download('fruits_report_' . date('Y-m-d_His') . '.pdf');
    }

    /**
     * Export available fruits to PDF
     */
    public function exportAvailablePDF()
    {
        $fruits = Fruit::where('availability', true)->get();
        $totalValue = $fruits->sum(fn($f) => $f->price_per_kg * $f->stock_quantity);

        $html = view('reports.pdf', compact('fruits', 'totalValue'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->download('available_fruits_report_' . date('Y-m-d_His') . '.pdf');
    }

    /**
     * Export out of stock fruits to PDF
     */
    public function exportOutOfStockPDF()
    {
        $fruits = Fruit::where('availability', false)->get();
        $totalValue = $fruits->sum(fn($f) => $f->price_per_kg * $f->stock_quantity);

        $html = view('reports.pdf', compact('fruits', 'totalValue'))->render();
        $pdf = PDF::loadHTML($html);

        return $pdf->download('out_of_stock_fruits_report_' . date('Y-m-d_His') . '.pdf');
    }
}
