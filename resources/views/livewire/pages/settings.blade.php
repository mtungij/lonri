<div>



    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User settings</h1>
        </div>
    </div>
    <div x-data="{ activeTab: 'profile' }" class="border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <!-- Profile Tab -->
            <li class="me-2">
                <a href="#" @click.prevent="activeTab = 'profile'" :class="activeTab === 'profile' ? 'border-blue-600 text-blue-600 dark:text-blue-500 dark:border-blue-500' : 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg group">
                    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>Change Password
                </a>
            </li>

            <!-- Dashboard Tab -->
            <li class="me-2">
                <a href="#" @click.prevent="activeTab = 'dashboard'" :class="activeTab === 'dashboard' ? 'border-blue-600 text-blue-600 dark:text-blue-500 dark:border-blue-500' : 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg group">
                    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>Profile Picture
                </a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div x-show="activeTab === 'profile'">
            <div class="col-span-2">

                <div
                    class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Badilisha Password') }}
                    </h2>

                    <p class="mt-2 mb-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Hakikisha umetumia nenosiri lefu na lenye mchanganyiko wa herufi ili kuongeza usalama wa akaunti yako.') }}
                    </p>
                    <form action="#">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                                <x-text-input wire:model.live="current_password" id="update_password_current_password"
                                    name="current_password" type="password" class="mt-1 block w-full"
                                    autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-input-label for="update_password_password" :value="__('New Password')" />
                                <x-text-input wire:model.live="password" id="update_password_password" name="password"
                                    type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input wire:model.live="password_confirmation"
                                    id="update_password_password_confirmation" name="password_confirmation"
                                    type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-full">
                                <button wire:click.prevent="updatePassword"
                                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                    type="submit">Save all</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div x-show="activeTab === 'dashboard'">
        <div class="col-span-full xl:col-auto">
    <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
            <img class="mb-4 rounded-lg w-12 me-2 h-12 sm:mb-0 xl:mb-4 2xl:mb-0"
                 src="{{ auth()->user()->img ? asset('storage/' . auth()->user()->img) : asset('assets/admin.png') }}"
                 alt="Profile Picture">
            <h3 class="mb-1 text-xl font-bold text-gray-900 me-3 dark:text-white">Profile picture</h3>
            <div class="flex items-center space-x-4">
                <input wire:model="img" 
                       class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       id="large_size" type="file" accept="image/*">
                <button wire:click.prevent="save" 
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                    </svg>
                    Upload picture
                </button>
            </div>
        </div>
    </div>
</div>

        </div>

    </div>



</div>