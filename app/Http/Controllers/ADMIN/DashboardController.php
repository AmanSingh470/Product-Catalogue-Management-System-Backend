<?php
namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Services\admin\DashboardService;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function DashboardData()
    {
        $dashboardStats = $this->service->getDashboardStats();
        $recentProducts = $this->service->getRecentProducts();

        return view('admin.dashboard.index', [
            'username'       => 'Aman',
            'stats'          => $dashboardStats,
            'recentProducts' => $recentProducts
        ]);
    }
}
