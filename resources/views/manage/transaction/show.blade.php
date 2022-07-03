<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        
            <div class="flex items-ceter justify-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Transaction Details') }}
                </h2>
            </div>

            <div class="flex flex-row items-center justify-center py-5">

                <div class="rounded-lg bg-white p-5 w-full sm:w-1/2">


                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Date
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->created_at->diffForHumans()}}
                            </h2>
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                User
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->user->name}}
                            </h2>
                        </div>

                    </div>



                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Fuel
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->fuel->name}}
                            </h2>
                        </div>

                    </div>


                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Price per Litre (TZS)
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->price }}
                            </h2>
                        </div>

                    </div>



                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Litres
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->litres}}
                            </h2>
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Payment
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->cash_paid}}
                            </h2>
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Access Token
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $transaction->access_token}}
                            </h2>
                        </div>

                    </div>

                    

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Status
                            </h2>
                        </div>

                        <div>
                            <h2>

                                @if ($transaction->status)
                                    <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Active</span>
                                @elseif ($transaction->status == false)
                                    <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Inactive</span>
                                @elseif($transaction->status == Null)
                                    <span class="text-xs bg-yellow-600 p-1 rounded-lg text-black bg-opacity-50">Processing</span>
                                @endif



                                {{-- <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Confirmed</span> --}}
                            </h2>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
