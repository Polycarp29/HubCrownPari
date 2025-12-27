<div class="min-h-screen w-full">

    <div class="container mx-auto px-6 pb-12 py-16">
        <!-- Navigation Breadcrumb -->
        <div class="container mx-auto px-2 py-6">
            <nav class="flex items-center text-sm text-gray-600 dark:text-gray-300 space-x-2">
                <a href="#"
                    class="hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">Dashboard</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-blue-600 dark:text-blue-400 font-semibold">Profile</span>
            </nav>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column -->
            <div class="w-full lg:w-1/3 flex flex-col gap-8">
                <!-- Profile Card -->
                @if (userHasAccess('Affiliates') || userHasAccess('Creators'))
                    <div
                        class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl transition">
                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-4">
                                <img src="{{ $avatar ? $avatar->temporaryUrl() : ($avatarPath ? asset('storage/' . $avatarPath) : $defaultAvatar) }}"
                                    alt="Profile"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-lg">

                                <!-- Loading Spinner using Livewire's wire:loading -->
                                <div wire:loading wire:target="avatar"
                                    class="relative  inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                    <svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4" />
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z" />
                                    </svg>
                                </div>

                                <div class="relative inline-block">
                                    <!-- Hidden file input -->
                                    <input type="file" id="fileUpload" wire:model="avatar" class="hidden"
                                        accept="image/*">

                                    <!-- Label acts as clickable button -->
                                    <label for="fileUpload"
                                        class="absolute bottom-0 right-0  bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full shadow transition cursor-pointer">
                                        <i class="fas fa-camera"></i>
                                    </label>
                                </div>
                            </div>
                            <h2
                                class="text-xl font-semibold 
           {{ $profileData?->fullname ? 'text-gray-900 dark:text-gray-100' : 'text-red-600 dark:text-red-400 underline' }}">
                                {{ $profileData?->fullname ?? 'Update Name' }}
                            </h2>

                            <p class="text-gray-500 dark:text-gray-400">Senior Product Manager</p>
                            <div class="flex space-x-2 mt-3">
                                <span
                                    class="bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 text-xs px-3 py-1 rounded-full">{{ $profileData->is_complete ? 'Verified' : 'Unverified'}}</span>
                                <span
                                    
                                    class="bg-green-100 {{ $user->active ? 'text-green-800 dark:bg-green-900 dark:text-green-300' : 'text-red-800 dark:bg-red-900 dark:text-red-300' }}  text-xs px-3 py-1 rounded-full">{{ $user->active ? 'Active' : 'Inactive'}}</span>
                            </div>
                        </div>

                        <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-5">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">Profile Completion</span>
                                <span class="font-medium text-blue-600 dark:text-blue-400">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-blue-600 h-2.5 rounded-full w-[85%] transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>
                @elseif(userHasAccess('Organizations'))
                    <!---Organization---->

                    <div
                        class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl transition">
                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-4">
                                <img src="{{ $defaultAvatar }}" alt="Profile"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-lg">
                                <button
                                    class="absolute bottom-0 right-0 bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full shadow transition">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Business Name</h2>
                            <p class="text-gray-500 dark:text-gray-400">Business Industry</p>
                            <div class="flex space-x-2 mt-3">
                                <span
                                    class="bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 text-xs px-3 py-1 rounded-full">Verified</span>
                                <span
                                    class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 text-xs px-3 py-1 rounded-full">Active</span>
                            </div>
                        </div>

                        <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-5">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">Profile Completion</span>
                                <span class="font-medium text-blue-600 dark:text-blue-400">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-blue-600 h-2.5 rounded-full w-[85%] transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>
                @endif



                <!-- Basic Info -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl transition">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-5 flex items-center">
                        <i class="fas fa-id-card text-blue-500 mr-2"></i> Basic Information
                    </h3>
                    <ul class="space-y-3">
                        <li><strong class="block text-gray-900 dark:text-gray-100">Email:</strong> <span
                                class="text-gray-500 dark:text-gray-400">john.doe@example.com</span></li>
                        <li><strong class="block text-gray-900 dark:text-gray-100">Phone:</strong> <span
                                class="text-gray-500 dark:text-gray-400">+1 (555) 123-4567</span></li>
                        <li><strong class="block text-gray-900 dark:text-gray-100">Location:</strong> <span
                                class="text-gray-500 dark:text-gray-400">San Francisco, CA</span></li>
                        <li><strong class="block text-gray-900 dark:text-gray-100">Department:</strong> <span
                                class="text-gray-500 dark:text-gray-400">Product Development</span></li>
                        <li><strong class="block text-gray-900 dark:text-gray-100">Joined:</strong> <span
                                class="text-gray-500 dark:text-gray-400">March 15, 2020</span></li>
                    </ul>
                    <button
                        class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit Profile
                    </button>
                </div>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-2/3 flex flex-col gap-8">
                <!-- Contract Details -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl transition">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                            <i class="fas fa-file-contract text-indigo-500 mr-2"></i> Contract Details
                        </h3>
                        <button
                            class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition text-sm">
                            <i class="fas fa-pen mr-1"></i>Edit
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Contract Type</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">Full-time Employee</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Employee ID</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">EMP-2020-0456</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Start Date</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">March 15, 2020</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Salary</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">$95,000 / year</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 dark:text-gray-400 mb-3">Contract Documents</h4>
                        <div class="space-y-2">
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-file-pdf text-red-500 mr-3 text-lg"></i>
                                    <span
                                        class="text-gray-800 dark:text-gray-100 font-medium">Employment_Contract.pdf</span>
                                </div>
                                <button
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                            <div
                                class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                <div class="flex items-center">
                                    <i class="fas fa-file-word text-blue-500 mr-3 text-lg"></i>
                                    <span
                                        class="text-gray-800 dark:text-gray-100 font-medium">NDA_Agreement.docx</span>
                                </div>
                                <button
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl transition">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-6 flex items-center">
                        <i class="fas fa-shield-alt text-green-500 mr-2"></i> Account Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Username</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">johndoe</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Last Login</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">Today, 09:42 AM</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Account Created</label>
                            <p class="text-gray-900 dark:text-gray-100 font-medium">March 15, 2020</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500 dark:text-gray-400">Two-Factor Auth</label>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Enabled</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-3">Security Settings</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700 dark:text-gray-300">Change Password</span>
                                <button
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm font-medium">Update</button>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700 dark:text-gray-300">Login Notifications</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:bg-blue-600 transition">
                                    </div>
                                    <span
                                        class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full peer-checked:translate-x-5 transition"></span>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700 dark:text-gray-300">Session Timeout</span>
                                <span class="text-gray-700 dark:text-gray-300">30 minutes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
