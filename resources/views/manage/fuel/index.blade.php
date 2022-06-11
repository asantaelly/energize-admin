<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex-row">

                
                <div class="flex items-center justify-between py-5">
                    <div>
                        <h2 class="text-lg font-bold">Fuel Management</h2>
                    </div>

                    <div>
                        <a href="{{ route('fuel.create')}}" class="px-5 py-2 bg-indigo-500 rounded-lg shadow-lg text-white">Register Fuel</a>
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

                            @foreach ($fuels as $fuel)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-700">
                                        <a class="hover:text-blue-500 hover:font-bold" href="{{ route('fuel.show', ['fuel' => $fuel])}}">
                                            000{{ $fuel->id}}
                                        </a>
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">{{ ucfirst($fuel->name)}}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $fuel->price}}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $fuel->total_litres}}</td>
                                    <td class="p-3 text-sm text-gray-700">
                                        @if ($fuel->status == TRUE)
                                            <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Available</span>
                                        @else
                                            <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Unavailable</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>


            </div>


        </div>

        
    </div>
</x-app-layout>