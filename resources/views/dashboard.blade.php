<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:px-1 gap-4 items-center justify-evenly">
                <div class="bg-gray-900 p-5 h-40 w-30 gap-y-5  rounded-lg">

                    <div class="flex">
                        <h1 class="text-lg text-white font-black">
                            <a class="hover:text-orange-500" href="#">
                                {{ ucfirst($petrol->name)}}
                            </a>
                        </h1>
                    </div>
                    <div class="flex flex-column items-center justify-between">
                        <div class="text-sm text-slate-400 font-500">Price per Litre <span class="text-lg font-black"> TZS {{ $petrol->price }} /=</span></div>
                    
                        @if ($petrol->status == TRUE)
                            <div class="flex bg-yellow-300 h-10 w-20 items-center justify-center rounded-lg">
                                <h4 class="text-sm px-2">available</h4>
                            </div>
                        @else
                            <div class="flex bg-gray-300 h-10 w-20 items-center justify-center rounded-lg">
                                <h4 class="text-sm px-2">Unavailable</h4>
                            </div>
                        @endif
                        

                    </div>
                </div>

                <div class="bg-gray-900 p-5 h-40 w-30 gap-y-5  rounded-lg">

                    <div class="flex">
                        <h1 class="text-lg text-white font-black">
                            {{ ucfirst($diesel->name)}}
                        </h1>
                    </div>
                    <div class="flex flex-column items-center justify-between">
                        <div class="text-sm text-slate-400 font-500">Price per Litre <span class="text-lg font-black"> TZS {{ $diesel->price }} /=</span></div>
                    
                        @if ($diesel->status == TRUE)
                            <div class="flex bg-yellow-300 h-10 w-20 items-center justify-center rounded-lg">
                                <h4 class="text-sm px-2">available</h4>
                            </div>
                        @else
                            <div class="flex bg-gray-300 h-10 w-20 items-center justify-center rounded-lg">
                                <h4 class="text-sm px-2">Unavailable</h4>
                            </div>
                        @endif

                    </div>
                </div> 
            </div>

            <div class="flex-row py-5">

                
                <div class="flex py-5">
                    <h2 class="text-lg font-bold">Transactions</h2>
                </div>

                <div class="w-full overflow-auto rounded-lg shadow">
                    <table class="w-full">
                        <thead class="bg-gray-300 border-gray-200">
                          <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">S/N</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">User</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Fuel</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Price per Litre</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Amount(TZS)</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Litre(s)</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                          <tr>
                            <td class="p-3 text-sm text-gray-700">
                                <a class="hover:underline hover:text-blue-800" href="#">
                                    0001
                                </a>
                            </td>
                            <td class="p-3 text-sm text-gray-700">2/02/2022</td>
                            <td class="p-3 text-sm text-gray-700">John Doe</td>
                            <td class="p-3 text-sm text-gray-700">Petrol</td>
                            <td class="p-3 text-sm text-gray-700">2,994</td>
                            <td class="p-3 text-sm text-gray-700">30,000</td>
                            <td class="p-3 text-sm text-gray-700">10</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Confirmed</span>
                            </td>
                          </tr>

                          <tr>
                            <td class="p-3 text-sm text-gray-700">
                                <a class="hover:underline hover:text-blue-800" href="#">
                                    0002
                                </a>
                            </td>
                            <td class="p-3 text-sm text-gray-700">2/02/2022</td>
                            <td class="p-3 text-sm text-gray-700">John Doe</td>
                            <td class="p-3 text-sm text-gray-700">Petrol</td>
                            <td class="p-3 text-sm text-gray-700">2,994</td>
                            <td class="p-3 text-sm text-gray-700">30,000</td>
                            <td class="p-3 text-sm text-gray-700">10</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Cancelled</span>
                            </td>
                          </tr>

                          <tr>
                            <td class="p-3 text-sm text-gray-700">
                                <a class="hover:underline hover:text-blue-800" href="#">
                                    0003
                                </a>
                            </td>
                            <td class="p-3 text-sm text-gray-700">2/02/2022</td>
                            <td class="p-3 text-sm text-gray-700">John Doe</td>
                            <td class="p-3 text-sm text-gray-700">Petrol</td>
                            <td class="p-3 text-sm text-gray-700">2,994</td>
                            <td class="p-3 text-sm text-gray-700">30,000</td>
                            <td class="p-3 text-sm text-gray-700">10</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="text-xs bg-yellow-600 p-1 rounded-lg text-black bg-opacity-50">processing</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>


            </div>


        </div>

        
    </div>
</x-app-layout>
