<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex-row">

                
                <div class="flex py-5">
                    <h2 class="text-lg font-bold">Transaction Management</h2>
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
                                <a class="hover:underline hover:text-blue-800" href="{{ route('transaction.show', ['id' => 1])}}">
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