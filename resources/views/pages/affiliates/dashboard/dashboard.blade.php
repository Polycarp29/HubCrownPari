<x-layouts.dashboard>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col dark:bg-gray-900 dark:border-gray-800">
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-800">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">H</span>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-gray-100">Hub Crownpari</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <!-- Active item -->
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-white bg-purple-600 rounded-lg dark:bg-purple-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <!-- Standard nav item -->
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Referrals
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Earnings
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Analytics
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Payouts
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    Marketing Tools
                </a>

                <!-- Support Section -->
                <div class="pt-6 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider dark:text-gray-500">
                        Support</p>
                </div>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Help Center
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition
                  dark:text-gray-300 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-800">
                <div class="flex items-center">
                    <div
                        class="h-10 w-10 rounded-full bg-purple-600 flex items-center justify-center text-white font-semibold">
                        AM
                    </div>
                    <div class="ml-3 flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate">Alex Morgan</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">alex@example.com</p>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </div>
            </div>
        </aside>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-end px-6 dark:bg-gray-900 dark:border-gray-800">
                <button
                    class="relative p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-6 dark:bg-gray-900">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50">Dashboard</h1>
                        <p class="text-gray-600 mt-1 dark:text-gray-400">Track your performance and earnings</p>
                    </div>
                    <div class="flex gap-3">
                        <button
                            class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:border-purple-600 dark:bg-gray-900 dark:text-gray-50 dark:hover:bg-purple-600 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            Share Link
                        </button>
                        <button
                            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Download Report
                        </button>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 dark:bg-gray-800/50 dark:border-gray-800">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-50">Total Earnings</p>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-50 mt-2">$12,847.50</h3>
                                <p class="text-sm text-green-600 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" />
                                    </svg>
                                    +18.2% from last month
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-lg dark:bg-blue-950/100">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 dark:bg-gray-800/50 dark:border-gray-800 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-50">Active Referrals</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-2 dark:text-gray-50">347</h3>
                                <p class="text-sm text-green-600 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" />
                                    </svg>
                                    +12.5% this month
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-lg dark:bg-green-950/100">
                                <svg class="w-8 h-8 text-green-600 " fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 dark:bg-gray-800/50 dark:border-gray-800 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-50">Conversion Rate</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-2 dark:text-gray-50">24.8%</h3>
                                <p class="text-sm text-green-600 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" />
                                    </svg>
                                    +3.2% improvement
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-lg dark:bg-purple-950/100">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 dark:bg-gray-800/50 dark:border-gray-800 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-50">Pending Commission</p>
                                <h3 class="text-2xl font-bold text-gray-900 mt-2 dark:text-gray-50">$2,456.00</h3>
                                <p class="text-sm text-gray-600 mt-2 dark:text-gray-500">Available in 14 days</p>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-lg dark:bg-orange-950/100">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referral Link -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl shadow-sm p-6 text-white mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold mb-2">Your Referral Link</h3>
                            <p class="text-blue-100 text-sm mb-4">Share this link to earn commissions on every referral
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="bg-gray-100/20 backdrop-blur-sm rounded-lg px-4 py-3 flex-1 max-w-xl">
                                    <code
                                        class="text-white font-mono text-sm">https://yoursite.com/ref/YOUR-CODE-123</code>
                                </div>
                                <button
                                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition whitespace-nowrap">
                                    Copy Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Earnings Chart -->
                    <div
                        class="lg:col-span-2 bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6 relative overflow-hidden">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Earnings Overview</h3>
                            <div class="flex gap-2">
                                <button
                                    class="px-3 py-1 text-sm font-medium bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 transition">7
                                    Days</button>
                                <button
                                    class="px-3 py-1 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">30
                                    Days</button>
                                <button
                                    class="px-3 py-1 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">90
                                    Days</button>
                            </div>
                        </div>

                        <!-- Gradient bar chart -->
                         <div id="revenueChart" class="w-full h-80"></div>
                    </div>

                    <!-- Quick Stats -->
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">Quick Stats</h3>
                        <div class="space-y-5">
                            <!-- Animated progress bars -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Click-through Rate</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">8.4%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2 overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-400 h-2 rounded-full animate-[progress_1.8s_ease-in-out_forwards]"
                                        style="width:84%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Average Order Value</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">$127</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2 overflow-hidden">
                                    <div class="bg-gradient-to-r from-green-500 to-emerald-400 h-2 rounded-full animate-[progress_2s_ease-in-out_forwards]"
                                        style="width:65%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Return Rate</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">92%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2 overflow-hidden">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-400 h-2 rounded-full animate-[progress_2.5s_ease-in-out_forwards]"
                                        style="width:92%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Commission Rate</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">15%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2 overflow-hidden">
                                    <div class="bg-gradient-to-r from-orange-500 to-amber-400 h-2 rounded-full animate-[progress_2.2s_ease-in-out_forwards]"
                                        style="width:15%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-800">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Total Clicks</span>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">1,398</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress animation -->
                <style>
                    @keyframes progress {
                        0% {
                            width: 0%;
                        }
                    }
                </style>


                <!-- Recent Referrals Table -->
                <div
                    class="bg-white dark:bg-gray-900 rounded-2xl shadow-md border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <!-- Header -->
                    <div
                        class="px-6 py-5 border-b border-gray-200 dark:border-gray-800 flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Recent Referrals</h3>
                        <button
                            class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition">View
                            All</button>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse">
                            <thead class="bg-gray-50 dark:bg-gray-800/50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        User</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        Date Joined</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        Order Value</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        Commission</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                <!-- Row -->
                                <tr class="hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-6 py-4 flex items-center">
                                        <div
                                            class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-800 text-blue-600 dark:text-blue-300 flex items-center justify-center font-semibold">
                                            JD</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">John Doe
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">john.doe@email.com
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">Nov 7, 2025</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">$149.00
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">
                                        $22.35</td>
                                </tr>

                                <!-- Another Row -->
                                <tr class="hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-6 py-4 flex items-center">
                                        <div
                                            class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-800 text-purple-600 dark:text-purple-300 flex items-center justify-center font-semibold">
                                            SM</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Sarah
                                                Miller</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">sarah.m@email.com
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">Nov 6, 2025</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">$89.00
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">
                                        $13.35</td>
                                </tr>

                                <!-- Add more rows as needed... -->
                            </tbody>
                        </table>
                    </div>
                </div>


            </main>
        </div>
    </div>
</x-layouts.dashboard>
