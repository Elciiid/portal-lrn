<?php
include 'db.php';

try {
    // Analytics Queries
    $total_stmt = $conn->query("SELECT COUNT(*) FROM return_to_work");
    $total_submissions = $total_stmt->fetchColumn();

    $recent_stmt = $conn->query("SELECT TOP 5 filing_date, employee_name, prodn_type FROM return_to_work ORDER BY filing_date DESC");
    $recent_activity = $recent_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get count of submissions from the last 7 days
    $seven_days_stmt = $conn->query("SELECT COUNT(*) FROM return_to_work WHERE filing_date >= DATEADD(day, -7, GETDATE())");
    $weekly_count = $seven_days_stmt->fetchColumn();

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - La Rose Noire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%); 
            height: 100vh; 
            margin: 0;
            display: flex;
            overflow: hidden; 
        }
        .sidebar-active { 
            background: linear-gradient(to right, #ec4899, #db2777); 
            color: white; 
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3); 
        }
        .stat-card:hover { transform: translateY(-5px); transition: all 0.3s ease; }
    </style>
</head>
<body class="font-sans text-gray-700">

    <aside class="w-72 bg-white/40 backdrop-blur-2xl border-r border-white/20 flex flex-col h-screen shrink-0 relative z-50">
    
    <div class="flex-1 flex flex-col pt-52 px-6">
        
        <div class="flex items-center gap-4 mb-12 shrink-0 ml-2"> 
            <div class="w-14 h-14 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-pink-200/50 shrink-0">
                <i class="fa-solid fa-chart-line text-xl"></i>
            </div>

            <div class="flex flex-col justify-center"> 
                <h1 class="font-black text-gray-800 leading-none text-lg tracking-tighter uppercase font-sans">La Rose Noire</h1>
                
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-[1px] w-2 bg-pink-300"></span>
                    <p class="text-[8px] uppercase tracking-[0.3em] text-pink-400 font-bold whitespace-nowrap">Return to Work</p>
                </div>
            </div>
        </div>

        <div class="overflow-y-auto custom-scrollbar">
            <nav class="space-y-6">
                <a href="../portal.php" class="group flex items-center gap-4 px-6 py-4 rounded-2xl text-gray-400 hover:text-pink-600 transition-all duration-500 hover:bg-white/60">
                    <div class="w-10 h-10 rounded-xl bg-transparent group-hover:bg-pink-100 flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-house-chimney text-lg"></i>
                    </div>
                    <span class="font-bold text-sm tracking-tight">Main Portal</span>
                </a>

                <a href="dashboard.php" class="flex items-center gap-4 px-6 py-4 rounded-2xl bg-white/80 shadow-sm border border-white/50 text-pink-600 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center text-white shadow-lg shadow-pink-200">
                        <i class="fa-solid fa-chart-pie text-lg"></i>
                    </div>
                    <span class="tracking-tight">RTW Dashboard</span>
                </a>

                <a href="index.php" class="group flex items-center gap-4 px-6 py-4 rounded-2xl text-gray-400 hover:text-pink-600 transition-all hover:bg-white/60 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center group-hover:bg-pink-100">
                        <i class="fa-solid fa-file-signature text-lg"></i>
                    </div>
                    <span class="tracking-tight">New Application</span>
                </a>

                <a href="history.php" class="group flex items-center gap-4 px-6 py-4 rounded-2xl text-gray-400 hover:text-pink-600 transition-all hover:bg-white/60 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center group-hover:bg-pink-100">
                        <i class="fa-solid fa-clock-rotate-left text-lg"></i>
                    </div>
                    <span class="tracking-tight">History</span>
                </a>
            </nav>
        </div>
    </div>

    <div class="p-10 flex justify-center opacity-20">
        <div class="h-1 w-12 bg-pink-300 rounded-full"></div>
    </div>
</aside>

    <main class="flex-1 h-full flex flex-col p-10 overflow-hidden">
        <header class="mb-8 shrink-0">
            <h2 class="text-4xl font-black text-gray-800 tracking-tight">Facilities Dashboard</h2>
            <p class="text-gray-600 font-medium text-lg italic">Overview of Return to Work compliance</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10 shrink-0">
            <div class="stat-card bg-white/90 p-8 rounded-[2.5rem] shadow-sm border border-white">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500">
                        <i class="fa-solid fa-folder-tree text-xl"></i>
                    </div>
                    <span class="text-xs font-black text-green-500 uppercase">Lifetime</span>
                </div>
                <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest">Total Submissions</h3>
                <p class="text-5xl font-black text-gray-800"><?= $total_submissions ?></p>
            </div>

            <div class="stat-card bg-white/90 p-8 rounded-[2.5rem] shadow-sm border border-white">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-rose-100 rounded-2xl flex items-center justify-center text-rose-500">
                        <i class="fa-solid fa-calendar-check text-xl"></i>
                    </div>
                    <span class="text-xs font-black text-rose-500 uppercase">Last 7 Days</span>
                </div>
                <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest">Weekly Activity</h3>
                <p class="text-5xl font-black text-gray-800"><?= $weekly_count ?></p>
            </div>

            <div class="stat-card bg-gradient-to-br from-pink-500 to-rose-600 p-8 rounded-[2.5rem] shadow-lg text-white">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-white">
                        <i class="fa-solid fa-bolt text-xl"></i>
                    </div>
                </div>
                <h3 class="text-sm font-black opacity-80 uppercase tracking-widest">Quick Action</h3>
                <p class="text-lg font-bold mb-4">Need a new clearance?</p>
                <a href="index.php" class="inline-block bg-white text-pink-600 px-6 py-2 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-pink-50 transition-colors">Start Form</a>
            </div>
        </div>

        <div class="flex-1 bg-white/90 rounded-[3rem] p-10 shadow-sm border border-white overflow-hidden flex flex-col">
            <h3 class="text-2xl font-black text-gray-800 mb-6 shrink-0">Recent Submissions</h3>
            <div class="flex-1 overflow-y-auto pr-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-pink-50">
                            <th class="pb-4 px-4">Date</th>
                            <th class="pb-4 px-4">Employee</th>
                            <th class="pb-4 px-4">Area / Type</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-50">
                        <?php foreach($recent_activity as $recent): ?>
                        <tr class="group">
                            <td class="py-5 px-4 text-sm font-bold text-gray-500"><?= date('M d, Y', strtotime($recent['filing_date'])) ?></td>
                            <td class="py-5 px-4 text-sm font-black text-gray-800"><?= htmlspecialchars($recent['employee_name']) ?></td>
                            <td class="py-5 px-4 text-sm">
                                <span class="bg-pink-50 text-pink-600 px-3 py-1 rounded-lg font-black text-[10px] uppercase">
                                    <?= htmlspecialchars($recent['prodn_type'] ?: 'General') ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>