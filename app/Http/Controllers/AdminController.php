<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if ($credentials['username'] === 'admin' && $credentials['password'] === 'password') {
                session(['admin_logged_in' => true]);
                return redirect()->route('admin.database');
            }

            return back()->withErrors([
                'username' => 'ログイン情報が正しくありません。',
            ]);
        }

        return view('admin.login');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function database()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $tables = DB::select('SHOW TABLES');
        $tableKey = 'Tables_in_' . env('DB_DATABASE');
        
        $tablesData = [];
        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            $columns = DB::select("SHOW COLUMNS FROM $tableName");
            $data = DB::table($tableName)->get();
            $tablesData[$tableName] = [
                'columns' => $columns,
                'data' => $data
            ];
        }

        return view('admin.database', compact('tablesData'));
    }
}