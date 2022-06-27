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
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Token</th>
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
                                                <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Confirmed</span>
                                            @elseif ($transaction->status == false)
                                                <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Cancelled</span>
                                            @elseif($transaction->status == Null)
                                                <span class="text-xs bg-yellow-600 p-1 rounded-lg text-black bg-opacity-50">processing</span>
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