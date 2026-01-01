<?php
include 'db.php';

// Feature: Filtering and Sorting
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';
$sort_order = $_GET['sort'] ?? 'DESC';

try {
    $query = "SELECT * FROM return_to_work WHERE 1=1";
    $params = [];
    if ($date_from) { $query .= " AND filing_date >= ?"; $params[] = $date_from; }
    if ($date_to) { $query .= " AND filing_date <= ?"; $params[] = $date_to; }
    $query .= " ORDER BY filing_date " . ($sort_order === 'ASC' ? 'ASC' : 'DESC');
    
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) { die("Database Error: " . $e->getMessage()); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History - La Rose Noire</title>
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
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #fbcfe8; border-radius: 10px; }
        .modal-enter { animation: modalFadeIn 0.3s ease-out forwards; }
        @keyframes modalFadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="font-sans text-gray-700">

    <aside class="w-72 bg-white/40 backdrop-blur-2xl border-r border-white/20 flex flex-col h-screen shrink-0 relative z-50">
    
    <div class="flex-1 flex flex-col pt-52 px-6">
        
        <div class="flex items-center gap-4 mb-12 shrink-0 ml-2"> 
            <div class="w-14 h-14 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-pink-200/50 shrink-0">
                <i class="fa-solid fa-clock-rotate-left text-xl"></i>
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

                <a href="dashboard.php" class="group flex items-center gap-4 px-6 py-4 rounded-2xl text-gray-400 hover:text-pink-600 transition-all hover:bg-white/60 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center group-hover:bg-pink-100">
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

                <a href="history.php" class="flex items-center gap-4 px-6 py-4 rounded-2xl bg-white/80 shadow-sm border border-white/50 text-pink-600 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center text-white shadow-lg shadow-pink-200">
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
            <h2 class="text-4xl font-black text-gray-800 tracking-tight">Submissions</h2>
            <p class="text-gray-600 font-medium text-lg italic">Tracking and status updates</p>
        </header>

        <form method="GET" action="history.php" class="bg-white/90 rounded-[2rem] p-6 shadow-sm border border-white mb-8 shrink-0">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 mb-1 block">Date From</label>
                    <input type="date" name="date_from" value="<?= htmlspecialchars($date_from) ?>" class="w-full bg-pink-50/40 border-2 border-pink-100 p-3 rounded-xl outline-none text-sm font-bold">
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 mb-1 block">Date To</label>
                    <input type="date" name="date_to" value="<?= htmlspecialchars($date_to) ?>" class="w-full bg-pink-50/40 border-2 border-pink-100 p-3 rounded-xl outline-none text-sm font-bold">
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 mb-1 block">Sort Order</label>
                    <select name="sort" class="w-full bg-pink-50/40 border-2 border-pink-100 p-3 rounded-xl outline-none text-sm font-bold">
                        <option value="DESC" <?= $sort_order==='DESC'?'selected':'' ?>>Newest First</option>
                        <option value="ASC" <?= $sort_order==='ASC'?'selected':'' ?>>Oldest First</option>
                    </select>
                </div>
                <button type="submit" class="bg-pink-500 text-white font-black py-3 rounded-xl shadow-lg uppercase text-[10px] tracking-widest hover:bg-pink-600 transition-all">Apply Filters</button>
            </div>
        </form>

        <div class="flex-1 overflow-y-auto pr-4 space-y-6">
            <?php if (count($submissions) > 0): ?>
                <?php foreach ($submissions as $row): ?>
                <div class="bg-white/90 rounded-[2rem] p-8 shadow-sm border border-white group transition-all">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500 shadow-inner">
                                <i class="fa-solid fa-file-lines text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-gray-800 tracking-tight">RTW #<?= str_pad($row['id'], 4, '0', STR_PAD_LEFT) ?></h3>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"><i class="fa-solid fa-calendar mr-1"></i> <?= date('M d, Y', strtotime($row['filing_date'])) ?></p>
                            </div>
                        </div>
                        </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-6 border-t border-pink-50">
                        <div><p class="text-[9px] font-black text-pink-400 uppercase mb-1">Employee ID</p><p class="text-sm font-bold text-gray-700"><?= htmlspecialchars($row['employee_number']) ?></p></div>
                        <div><p class="text-[9px] font-black text-pink-400 uppercase mb-1">Area / Type</p><p class="text-sm font-bold text-gray-700"><?= htmlspecialchars($row['prodn_type'] ?: 'N/A') ?></p></div>
                        <div><p class="text-[9px] font-black text-pink-400 uppercase mb-1">Return Date</p><p class="text-sm font-bold text-gray-700"><?= date('M d, Y', strtotime($row['date_returned'])) ?></p></div>
                        <div class="text-right flex items-center justify-end">
                            <button onclick='openDetails(<?= json_encode($row) ?>)' class="text-xs font-black text-pink-500 uppercase flex items-center gap-2 hover:text-pink-700 transition-colors">
                                View Full Details <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="h-full flex flex-col items-center justify-center opacity-40">
                    <i class="fa-solid fa-folder-open text-6xl mb-4 text-pink-200"></i>
                    <p class="font-black uppercase tracking-widest text-gray-400">No records found</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <div id="detailsModal" class="fixed inset-0 z-[100] hidden bg-pink-900/20 backdrop-blur-sm flex items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden modal-enter">
            <div class="p-8 border-b border-pink-50 flex justify-between items-center bg-pink-50/30">
                <div>
                    <h3 id="modalTitle" class="text-2xl font-black text-gray-800">Application Details</h3>
                    <p id="modalSubtitle" class="text-sm font-bold text-pink-400 uppercase mt-1"></p>
                </div>
                <button onclick="closeDetails()" class="text-gray-400 hover:text-rose-500 text-2xl transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-6 md:col-span-2">
                    <div class="bg-pink-50/30 p-6 rounded-3xl border border-pink-100">
                        <label class="block text-[10px] font-black text-pink-400 uppercase mb-2">Detailed Reason</label>
                        <p id="modalReason" class="text-gray-700 font-medium leading-relaxed"></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl border border-pink-50 text-gray-700">
                            <label class="block text-[9px] font-black text-gray-400 uppercase">First Date</label>
                            <p id="modalFirstDay" class="font-bold"></p>
                        </div>
                        <div class="p-4 rounded-2xl border border-pink-50 text-gray-700">
                            <label class="block text-[9px] font-black text-gray-400 uppercase">Return Date</label>
                            <p id="modalReturnDay" class="font-bold"></p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 text-gray-700">
                        <label class="block text-[9px] font-black text-gray-400 uppercase">Days Absent</label>
                        <p id="modalDays" class="font-bold"></p>
                    </div>
                    <div class="p-4 rounded-2xl bg-pink-50 border border-pink-100">
                        <label class="block text-[9px] font-black text-pink-400 uppercase">Superior</label>
                        <p id="modalSupDetails" class="font-bold text-pink-600"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDetails(data) {
            document.getElementById('detailsModal').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = 'Application #' + data.id.toString().padStart(4, '0');
            document.getElementById('modalSubtitle').innerText = 'Employee: ' + data.employee_number + ' | ' + (data.employee_name || 'N/A');
            document.getElementById('modalReason').innerText = data.reason || 'No reason provided';
            document.getElementById('modalFirstDay').innerText = data.first_date_absence || 'N/A';
            document.getElementById('modalReturnDay').innerText = data.date_returned || 'N/A';
            document.getElementById('modalDays').innerText = (data.days_absence || '0') + ' Days';
            document.getElementById('modalSupDetails').innerText = data.superior_name_position || 'Not Notified';
        }
        function closeDetails() { 
            document.getElementById('detailsModal').classList.add('hidden'); 
        }
        window.onclick = function(event) {
            let modal = document.getElementById('detailsModal');
            if (event.target == modal) closeDetails();
        }
    </script>
</body>
</html>