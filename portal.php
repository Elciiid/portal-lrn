<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities Portal - La Rose Noire</title>
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
        .portal-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }
        .portal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(244, 114, 182, 0.2);
        }
    </style>
</head>
<body class="font-sans text-gray-700">

<aside class="w-72 bg-white/40 backdrop-blur-2xl border-r border-white/20 flex flex-col h-screen shrink-0 relative z-50">
    
    <div class="flex-1 flex flex-col pt-52 px-6">
        
        <div class="flex items-center gap-4 mb-12 shrink-0 ml-2"> 
            <div class="w-14 h-14 bg-gradient-to-tr from-pink-400 to-rose-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-pink-200/50 shrink-0 transition-transform hover:rotate-12 duration-500">
                <i class="fa-solid fa-leaf text-xl"></i>
            </div>

            <div class="flex flex-col justify-center"> 
                <h1 class="font-black text-gray-800 leading-none text-lg tracking-tighter uppercase font-sans">La Rose Noire</h1>
                
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-[1px] w-2 bg-pink-300"></span>
                    <p class="text-[8px] uppercase tracking-[0.3em] text-pink-400 font-bold whitespace-nowrap">Facilities</p>
                </div>
            </div>
        </div>

        <div class="overflow-y-auto custom-scrollbar">
    <div class="mb-8">
        <nav class="space-y-4">
            <a href="combined_dashboard.php" class="group flex items-center gap-4 px-6 py-4 rounded-2xl text-gray-400 hover:text-pink-600 transition-all duration-500 hover:bg-white/60">
                <div class="w-8 flex justify-center transition-colors"> <i class="fa-solid fa-chart-line text-lg"></i>
                </div>
                <span class="font-bold text-sm tracking-tight">Overview</span>
            </a>
            
            <a href="portal.php" class="flex items-center gap-4 px-6 py-4 rounded-2xl bg-white/80 shadow-sm border border-white/50 text-pink-600 font-bold text-sm">
                <div class="w-8 flex justify-center"> <i class="fa-solid fa-house-chimney text-lg"></i>
                </div>
                <span class="tracking-tight">System Portal</span>
            </a>
        </nav>
    </div>

    <div>
        <p class="text-[10px] font-black text-gray-300 uppercase tracking-[0.5em] mb-4 ml-6">Operations</p>
        <nav class="space-y-2">
            <a href="return-to-work/index.php" class="group flex items-center gap-4 px-6 py-3 rounded-2xl text-gray-500 hover:text-pink-600 hover:bg-white/40 transition-all">
                <div class="w-8 flex justify-center opacity-40 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-notes-medical"></i>
                </div>
                <span class="text-xs font-bold tracking-wide">Return to Work</span>
            </a>

            <a href="disposal/index.php" class="group flex items-center gap-4 px-6 py-3 rounded-2xl text-gray-500 hover:text-pink-600 hover:bg-white/40 transition-all">
                <div class="w-8 flex justify-center opacity-40 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-recycle"></i>
                </div>
                <span class="text-xs font-bold tracking-wide">Disposal Form</span>
            </a>

            <a href="gmp/index.php" class="group flex items-center gap-4 px-6 py-3 rounded-2xl text-gray-500 hover:text-pink-600 hover:bg-white/40 transition-all">
                <div class="w-8 flex justify-center opacity-40 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-clipboard-check"></i>
                </div>
                <span class="text-xs font-bold tracking-wide">GMP Checklist</span>
            </a>

            <a href="uniform/index.php" class="group flex items-center gap-4 px-6 py-3 rounded-2xl text-gray-500 hover:text-pink-600 hover:bg-white/40 transition-all">
                <div class="w-8 flex justify-center opacity-40 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-soap"></i>
                </div>
                <span class="text-xs font-bold tracking-wide">Uniform Inspection</span>
            </a>

            <a href="requests/index.php" class="group flex items-center gap-4 px-6 py-3 rounded-2xl text-gray-500 hover:text-pink-600 hover:bg-white/40 transition-all">
                <div class="w-8 flex justify-center opacity-40 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <span class="text-xs font-bold tracking-wide">Item Request</span>
            </a>
        </nav>
    </div>
</div>
    </div>

    <div class="p-10 flex justify-center opacity-20">
        <div class="h-1 w-12 bg-pink-300 rounded-full"></div>
    </div>
</aside>

<main class="flex-1 h-screen flex flex-col items-center justify-center p-10 overflow-hidden">
    
    <div class="w-full max-w-[1400px] flex flex-col">
        
        <header class="mb-12 shrink-0 text-left">
            <h2 class="text-5xl font-black text-gray-800 tracking-tight">Facilities Management</h2>
            <p class="text-gray-600 font-medium text-xl italic mt-2">Centralized portal for all internal forms and checklists</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div onclick="window.location.href='return-to-work/index.php'" 
                  class="group relative bg-white/40 backdrop-blur-xl rounded-[3rem] p-10 border border-white/40 shadow-sm hover:shadow-2xl hover:shadow-pink-200/50 transition-all duration-500 cursor-pointer flex flex-col h-full overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-pink-400/10 rounded-full blur-3xl group-hover:bg-pink-400/20 transition-colors"></div>
                
                <div class="w-16 h-16 bg-white/60 text-pink-500 rounded-3xl flex items-center justify-center mb-8 shadow-sm group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-notes-medical text-3xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Return to Work</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8 flex-1">Filing system for health clearance and absence tracking.</p>
                <span class="text-pink-500 font-black text-xs uppercase tracking-widest flex items-center gap-2">
                    Open System <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-2 transition-transform"></i>
                </span>
            </div>

            <div onclick="window.location.href='disposal/index.php'" 
                  class="group relative bg-white/40 backdrop-blur-xl rounded-[3rem] p-10 border border-white/40 shadow-sm hover:shadow-2xl hover:shadow-rose-200/50 transition-all duration-500 cursor-pointer flex flex-col h-full overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-rose-400/10 rounded-full blur-3xl group-hover:bg-rose-400/20 transition-colors"></div>
                
                <div class="w-16 h-16 bg-white/60 text-rose-500 rounded-3xl flex items-center justify-center mb-8 shadow-sm group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-recycle text-3xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Disposal Form</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8 flex-1">Request for items or equipment disposal management.</p>
                <span class="text-rose-500 font-black text-xs uppercase tracking-widest flex items-center gap-2">
                    Open System <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-2 transition-transform"></i>
                </span>
            </div>

            <div onclick="window.location.href='gmp/index.php'" 
                  class="group relative bg-white/40 backdrop-blur-xl rounded-[3rem] p-10 border border-white/40 shadow-sm hover:shadow-2xl hover:shadow-indigo-200/50 transition-all duration-500 cursor-pointer flex flex-col h-full overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-indigo-400/10 rounded-full blur-3xl group-hover:bg-indigo-400/20 transition-colors"></div>
                
                <div class="w-16 h-16 bg-white/60 text-indigo-500 rounded-3xl flex items-center justify-center mb-8 shadow-sm group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-clipboard-check text-3xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">GMP Checklist</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8 flex-1">Good Manufacturing Practices compliance audit.</p>
                <span class="text-indigo-500 font-black text-xs uppercase tracking-widest flex items-center gap-2">
                    Open System <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-2 transition-transform"></i>
                </span>
            </div>

            <div onclick="window.location.href='uniform/index.php'" 
                  class="group relative bg-white/40 backdrop-blur-xl rounded-[3rem] p-10 border border-white/40 shadow-sm hover:shadow-2xl hover:shadow-blue-200/50 transition-all duration-500 cursor-pointer flex flex-col h-full overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-blue-400/10 rounded-full blur-3xl group-hover:bg-blue-400/20 transition-colors"></div>
                
                <div class="w-16 h-16 bg-white/60 text-blue-500 rounded-3xl flex items-center justify-center mb-8 shadow-sm group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-soap text-3xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Uniform Inspection</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8 flex-1">Monitoring and hygiene check for washed uniforms.</p>
                <span class="text-blue-500 font-black text-xs uppercase tracking-widest flex items-center gap-2">
                    Open System <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-2 transition-transform"></i>
                </span>
            </div>

            <div onclick="window.location.href='requests/index.php'" 
                  class="group relative bg-white/40 backdrop-blur-xl rounded-[3rem] p-10 border border-white/40 shadow-sm hover:shadow-2xl hover:shadow-amber-200/50 transition-all duration-500 cursor-pointer flex flex-col h-full overflow-hidden">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-amber-400/10 rounded-full blur-3xl group-hover:bg-amber-400/20 transition-colors"></div>
                
                <div class="w-16 h-16 bg-white/60 text-amber-500 rounded-3xl flex items-center justify-center mb-8 shadow-sm group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-boxes-stacked text-3xl"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Item Request</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8 flex-1">Facility supplies and material requisition form.</p>
                <span class="text-amber-500 font-black text-xs uppercase tracking-widest flex items-center gap-2">
                    Open System <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-2 transition-transform"></i>
                </span>
            </div>

        </div>
    </div>
</main>

</body>
</html>