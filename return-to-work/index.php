<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHE - Return to Work</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%); height: 100vh; overflow: hidden; }
        .sidebar-active { background: linear-gradient(to right, #ec4899, #db2777); color: white; box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3); }
        .input-focus:focus { border-color: #f472b6; background-color: white; box-shadow: 0 0 0 4px rgba(244, 114, 182, 0.1); }
        @keyframes modalShow { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
        .animate-modal { animation: modalShow 0.3s ease-out forwards; }
    </style>
</head>
<body class="font-sans text-gray-700 flex">

   <aside class="w-72 bg-white/40 backdrop-blur-2xl border-r border-white/20 flex flex-col h-screen shrink-0 relative z-50">
    
    <div class="flex-1 flex flex-col pt-52 px-6">
        
        <div class="flex items-center gap-4 mb-12 shrink-0 ml-2"> 
            <div class="w-14 h-14 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-pink-200/50 shrink-0">
                <i class="fa-solid fa-notes-medical text-xl"></i>
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

                <a href="index.php" class="flex items-center gap-4 px-6 py-4 rounded-2xl bg-white/80 shadow-sm border border-white/50 text-pink-600 font-bold text-sm">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center text-white shadow-lg shadow-pink-200">
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

    <main class="flex-1 h-screen flex items-center justify-center p-10 relative">
        
        <?php if(isset($_GET['success'])): ?>
        <div id="successModal" class="fixed inset-0 z-[200] flex items-center justify-center bg-pink-900/20 backdrop-blur-sm">
            <div class="bg-white rounded-[2.5rem] p-10 shadow-2xl border border-white text-center max-w-sm animate-modal">
                <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <i class="fa-solid fa-check text-4xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Success!</h3>
                <p class="text-gray-500 font-medium mb-8">Your application has been submitted successfully.</p>
                <button onclick="window.location.href='index.php'" class="w-full bg-pink-500 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-200 uppercase text-xs tracking-widest hover:bg-pink-600 transition-all">
                    Great, Thanks!
                </button>
            </div>
        </div>
        <?php endif; ?>

        <div class="w-full max-w-[1400px] mx-auto">
            <header class="mb-8">
                <h2 class="text-4xl font-black text-gray-800 tracking-tight">Return to Work</h2>
                <p class="text-gray-600 font-medium text-lg italic">Complete the form to initiate your health clearance</p>
            </header>

            <form action="submit.php" method="POST" id="rtwForm" onsubmit="return validateForm()" class="flex flex-col lg:flex-row gap-8 items-stretch">
                
                <div class="flex-[3] space-y-6">
                    <div class="bg-white/90 rounded-[2.5rem] p-8 shadow-sm border border-white">
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                            <div class="lg:col-span-3">
                                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Employee Search</label>
                                <div class="relative">
                                    <i class="fa-solid fa-magnifying-glass absolute left-6 top-1/2 -translate-y-1/2 text-pink-400 text-xl"></i>
                                    <input type="text" id="emp_name" name="emp_name" autocomplete="off" required 
                                           placeholder="Start typing employee name..."
                                           class="w-full bg-pink-50/40 border-2 border-pink-100 p-5 pl-16 rounded-[1.5rem] outline-none transition-all text-xl font-bold input-focus">
                                </div>
                                <div id="suggestion_box" class="absolute z-50 w-[70%] bg-white border border-pink-100 rounded-2xl shadow-2xl hidden max-h-40 overflow-y-auto mt-2"></div>
                            </div>
                            <div>
                                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Date of Filing</label>
                                <input type="date" name="filing_date" required
                                       class="w-full bg-pink-50/40 border-2 border-pink-100 p-5 rounded-[1.5rem] outline-none transition-all text-xl font-bold input-focus text-gray-700"
                                       value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/90 rounded-[2.5rem] p-8 shadow-sm border border-white space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-xs font-black text-gray-400 uppercase mb-2 ml-1">Assigned Area</label>
                                <input type="text" name="assigned_area" required placeholder="e.g. Production Area"
                                       class="w-full bg-pink-50/40 border-2 border-pink-100 p-4 rounded-2xl outline-none text-lg font-bold input-focus">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-gray-400 uppercase mb-2 ml-1">Days Absent</label>
                                <input type="number" name="days" required class="w-full bg-pink-50/40 border-2 border-pink-100 p-4 rounded-2xl outline-none text-lg font-bold input-focus">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-[10px] font-black text-gray-400 uppercase mb-2">First Date</label>
                                    <input type="date" name="start_date" required class="w-full bg-pink-50/40 border-2 border-pink-100 p-4 rounded-2xl outline-none text-sm font-bold input-focus">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-gray-400 uppercase mb-2">Return Date</label>
                                    <input type="date" name="return_date" required class="w-full bg-pink-50/40 border-2 border-pink-100 p-4 rounded-2xl outline-none text-sm font-bold input-focus">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase mb-2 ml-1">Detailed Reason</label>
                            <textarea name="reason" rows="2" required class="w-full bg-pink-50/40 border-2 border-pink-100 p-4 rounded-2xl outline-none text-lg font-bold input-focus" placeholder="Provide reason for absence..."></textarea>
                        </div>

                        <div class="bg-pink-50/40 p-6 rounded-3xl border border-pink-100 space-y-6">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-black text-pink-600 uppercase tracking-widest">Superior Notified?</label>
                                <div class="flex gap-10">
                                    <label class="flex items-center gap-3 text-lg font-bold cursor-pointer"><input type="radio" name="notified" value="Yes" onclick="toggleSuperior(true)" class="w-6 h-6 accent-pink-500"> Yes</label>
                                    <label class="flex items-center gap-3 text-lg font-bold cursor-pointer"><input type="radio" name="notified" value="No" onclick="toggleSuperior(false)" checked class="w-6 h-6 accent-pink-500"> No</label>
                                </div>
                            </div>
                            <div id="superior_input_area" class="hidden grid grid-cols-1 md:grid-cols-2 gap-4 animate-in fade-in slide-in-from-left duration-300">
                                <div>
                                    <label class="text-[10px] font-black text-gray-400 uppercase">Superior Name</label>
                                    <input type="text" id="sup_name" name="sup_name" class="w-full bg-white border-2 border-pink-200 p-4 rounded-2xl outline-none text-base font-bold input-focus shadow-sm">
                                </div>
                                <div>
                                    <label class="text-[10px] font-black text-gray-400 uppercase">Position</label>
                                    <input type="text" id="sup_pos" name="sup_pos" class="w-full bg-white border-2 border-pink-200 p-4 rounded-2xl outline-none text-base font-bold input-focus shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 flex flex-col gap-6">
                    <div class="bg-white/90 rounded-[2.5rem] p-8 shadow-sm border border-white flex flex-col justify-between h-full">
                        <div class="space-y-6">
                            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-pink-50 to-white border border-pink-100 shadow-inner">
                                <p class="text-xs font-black text-pink-400 uppercase mb-2">Employee ID</p>
                                <input type="text" id="emp_no" name="emp_no" readonly placeholder="---" class="text-4xl font-black text-gray-800 bg-transparent text-center w-full outline-none">
                            </div>
                            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-pink-50 to-white border border-pink-100 shadow-inner">
                                <p class="text-xs font-black text-pink-400 uppercase mb-2">Department</p>
                                <input type="text" id="dept" name="dept" readonly placeholder="---" class="text-2xl font-black text-gray-800 bg-transparent text-center w-full outline-none">
                            </div>
                        </div>

                        <div class="space-y-4">
                             <button type="button" onclick="resetForm()" class="w-full py-4 text-gray-400 font-black uppercase text-xs tracking-widest hover:text-rose-500 transition-colors">Reset Form</button>
                             <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white font-black py-6 rounded-[2rem] shadow-xl shadow-pink-200 uppercase text-sm tracking-widest active:scale-95 transition-all flex items-center justify-center gap-3">
                                <i class="fa-solid fa-paper-plane"></i> Submit Application
                             </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        function toggleSuperior(show) {
            const area = document.getElementById('superior_input_area');
            show ? area.classList.remove('hidden') : area.classList.add('hidden');
        }

        function validateForm() {
            const notified = document.querySelector('input[name="notified"]:checked').value;
            if (notified === 'Yes') {
                const name = document.getElementById('sup_name').value.trim();
                const pos = document.getElementById('sup_pos').value.trim();
                if (!name || !pos) {
                    alert("Please provide the Superior's Name and Position.");
                    return false;
                }
            }
            return true;
        }

        const nameInput = document.getElementById('emp_name');
        const suggestionBox = document.getElementById('suggestion_box');

        nameInput.addEventListener('input', function() {
            let val = this.value;
            if (val.length < 1) { suggestionBox.classList.add('hidden'); return; }
            fetch('search_employees.php?term=' + encodeURIComponent(val))
                .then(res => res.json())
                .then(data => {
                    suggestionBox.innerHTML = '';
                    if (data.length > 0) {
                        suggestionBox.classList.remove('hidden');
                        data.forEach(emp => {
                            let div = document.createElement('div');
                            div.className = "p-5 hover:bg-pink-50 cursor-pointer border-b border-pink-50 last:border-0 flex justify-between items-center";
                            div.innerHTML = `<span class="font-bold text-gray-800">${emp.employee_name}</span><span class="text-xs font-black text-pink-400 uppercase">${emp.department}</span>`;
                            div.onclick = () => {
                                nameInput.value = emp.employee_name;
                                document.getElementById('emp_no').value = emp.employee_number;
                                document.getElementById('dept').value = emp.department;
                                suggestionBox.classList.add('hidden');
                            };
                            suggestionBox.appendChild(div);
                        });
                    }
                });
        });

        function resetForm() { if(confirm("Discard all changes?")) { location.reload(); } }
    </script>
</body>
</html>