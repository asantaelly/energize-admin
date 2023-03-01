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
                            @if($petrol)
                                <a class="hover:text-orange-500" href="{{ route('fuel.show', ['fuel' => $petrol])}}">
                                    {{ ucfirst($petrol->name) }}
                                </a>
                            @else
                                Petrol
                            @endif
                        </h1>
                    </div>
                    <div class="flex flex-column items-center justify-between">
                        <div class="text-sm text-slate-400 font-500">Price per Litre <span class="text-lg font-black"> TZS {{ $petrol ? $petrol->price : '' }}/=</span></div>

                        @if ($petrol)
                            @if ($petrol->status == TRUE)
                                <div class="flex bg-yellow-300 h-10 w-20 items-center justify-center rounded-lg">
                                    <h4 class="text-sm px-2">available</h4>
                                </div>
                            @else
                                <div class="flex bg-gray-300 h-10 w-20 items-center justify-center rounded-lg">
                                    <h4 class="text-sm px-2">Unavailable</h4>
                                </div>
                            @endif  
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
                            @if($diesel)
                                <a class="hover:text-orange-500" href="{{ route('fuel.show', ['fuel' => $diesel])}}">
                                    {{ ucfirst($diesel->name) }}
                                </a>
                            @else
                                Diesel
                            @endif
                             
                        </h1>
                    </div>
                    <div class="flex flex-column items-center justify-between">
                        <div class="text-sm text-slate-400 font-500">Price per Litre <span class="text-lg font-black"> TZS {{ $diesel ?  $diesel->price : '' }}/=</span></div>
                    
                        @if ($diesel)  
                            @if ($diesel->status == TRUE)
                                <div class="flex bg-yellow-300 h-10 w-20 items-center justify-center rounded-lg">
                                    <h4 class="text-sm p-3">available</h4>
                                </div>
                            @else
                                <div class="flex bg-gray-300 h-10 w-20 items-center justify-center rounded-lg">
                                    <h4 class="text-sm p-3">Unavailable</h4>
                                </div>
                            @endif
                        @else
                            <div class="flex bg-gray-300 h-10 w-20 items-center justify-center rounded-lg">
                                <h4 class="text-sm p-3">Unavailable</h4>
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
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Access Token</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">


                            @if ($transactions->isEmpty())
                                <tr>
                                    <td class="p-3 text-md font-semibold text-gray-700 text-center" colspan="8">No transactions were made!</td>
                                </tr>
                            @else
                                @foreach ($transactions as $key => $transaction)
                                    <tr>
                                        <td class="p-3 text-sm text-gray-700">
                                            <a class="hover:underline hover:text-blue-800" href="{{ route('transaction.show', ['id' => $transaction->id])}}">
                                                {{ $key+1 }}
                                            </a>
                                        </td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->created_at->diffForHumans()}}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->user->name}}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->fuel->name}}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->price }}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->cash_paid}}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->litres}}</td>
                                        <td class="p-3 text-sm text-gray-700">{{ $transaction->access_token}}</td>
                                        <td class="p-3 text-sm text-gray-700">
                                            @if ($transaction->status)
                                                <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Active</span>
                                            @elseif ($transaction->status == false)
                                                <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Inactive</span>
                                            @elseif($transaction->status == Null)
                                                <span class="text-xs bg-yellow-600 p-1 rounded-lg text-black bg-opacity-50">Processing</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endif
                        </tbody>
                      </table>
                </div>


            </div>


        </div>

        
    </div>
</x-app-layout>
