<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex-row">

                
                <div class="flex items-center justify-between py-5">
                    <div>
                        <h2 class="text-lg font-bold">Fuel Management</h2>
                    </div>

                    <div>
                        <a href="{{ route('fuel.create')}}" class="px-5 py-2 bg-indigo-500 rounded-lg shadow-lg">Register Fuel</a>
                    </div>  
                </div>

                <div class="w-full overflow-auto rounded-lg shadow">
                    <table class="w-full">
                        <thead class="bg-gray-300 border-gray-200">
                          <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">S/N</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Price per Litre</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Total Amount (litres)</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                          </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-300">
                          <tr>
                            <td class="p-3 text-sm text-gray-700">
                                <a class="hover:underline hover:text-blue-800" href="{{ route('fuel.show', ['id' => 1])}}">
                                    0001
                                </a>
                            </td>
                            <td class="p-3 text-sm text-gray-700">Petrol</td>
                            <td class="p-3 text-sm text-gray-700">2.994</td>
                            <td class="p-3 text-sm text-gray-700">15,238</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Available</span>
                            </td>
                          </tr>

                          <tr>
                            <td class="p-3 text-sm text-gray-700">
                                <a class="hover:underline hover:text-blue-800" href="#">
                                    0002
                                </a>
                            </td>
                            <td class="p-3 text-sm text-gray-700">Diesel</td>
                            <td class="p-3 text-sm text-gray-700">3,120</td>
                            <td class="p-3 text-sm text-gray-700">15</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Unavailable</span>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                </div>


            </div>


        </div>

        
    </div>
</x-app-layout>