<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TestController extends Controller
{
    // Contoh 1: Eloquent dengan Eager Loading (Menghindari N+1)
    // Asumsi ada tabel users dan posts
    public function getActiveUsers()
    {
        /*
        return User::where('is_active', true)
                   ->with('department') // Eager load
                   ->orderBy('created_at', 'desc')
                   ->get();
        */
        return response()->json(['message' => 'Eager loading example']);
    }

    // Contoh 2: Raw Query SQL (Banyak ditanya jika user ngetes SQL skill)
    public function getReport()
    {
        $report = DB::select("
            SELECT department, COUNT(id) as total_users, AVG(salary) as avg_salary
            FROM employees
            GROUP BY department
            HAVING total_users > 1
        ");
        return response()->json($report);
    }
}
