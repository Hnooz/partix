<template>
    <layout>
        <div class="mx-auto w-full capitalize">
            <div>
                <h1 class="my-2 text-gray-500">{{__('dashboard')}}</h1>
                <!-- Card stats -->
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            {{__('orders')}}
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                        {{$page.order.total}}
                                        </span>
                                    </div>
                                    <div class="relative w-auto px-2 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-purple-900">

                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-green-600 mt-4">
                                    <span class="text-green-600">+3.48%</span>
                                    <span class="whitespace-no-wrap">{{__('this week')}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">{{__('customers')}}</h5>

                                        <span class="font-semibold text-xl text-gray-800">924</span>

                                    </div>
                                    <div class="relative w-auto px-2 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-green-600 mt-4">
                                    <span class="text-green-600"><i class="fas fa-arrow-down"></i>+35</span>
                                    <span class="whitespace-no-wrap">{{__('this week')}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                                        <h5 class="text-gray-500 uppercase font-bold text-xs">{{__('car brands')}}</h5>
                                        <span class="font-semibold text-xl text-gray-800">{{brands}}</span>

                                    </div>
                                    <div class="relative w-auto px-2 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-green-500 mt-4">
                                    <span class="mr-2"><i class="fas fa-arrow-up"></i>+12</span>
                                    <span class="whitespace-no-wrap">{{__('this week')}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 w-full md:flex justify-between">
            <div class="bg-white mb-16 md:mb-0 md:w-72 rounded-lg shadow-lg">
                <div class="border-b-2 flex items-center relative">
                    <i class="absolute bg-red-500 h-3 mx-3 rounded-full w-3"></i>
                    <p class="px-8 py-4 text-indigo-900">{{__('sales statistical overview')}}</p>
                </div>
                <div class="flex m-6">
                    <button class="hover:bg-gray-400 focus:outline-none outline-none  mr-3 px-3 text-sm" type="button">1D</button>
                    <button class="hover:bg-gray-400 focus:outline-none outline-none  mr-3 px-3 text-sm" type="button">5D</button>
                    <button class="hover:bg-gray-400 focus:outline-none outline-none bg-gray-400  mr-3 px-3 text-sm" type="button">1M</button>
                    <button class="hover:bg-gray-400 focus:outline-none outline-none  mr-3 px-3 text-sm" type="button">1Y</button>
                    <button class="hover:bg-gray-400 focus:outline-none outline-none  mr-3 px-3 text-sm" type="button">Max</button>
                </div>

                <div class="flex items-center justify-between">
                    <div class="mx-6 text-gray-600">
                        <h1>{{__('total sales')}}</h1>
                        <p>{{total}}</p>
                    </div>
                    <div class="flex items-center mx-6">
                        <i class="-mx-12 absolute bg-teal-300 h-2 rounded-full w-10"></i>
                        <h1>{{__('sales')}}</h1>
                    </div>
                </div>
                <!-- chart1 -->
                    <!-- <div class="container"> -->
                    <chart class="max-w-screen-sm mx-auto md:mb-20" width="500" height="200"
                    id="chart2"
                    type="line"
                    title="Top Salling"
                    :labels='["", "", "", "","", "","", "", "", "","", "",""]'
                    
                    :data='[0, 10, 17, 12, 23, 10, 41, 40, 30, 19, 31, 39, 50]'
                    :background-color="'rgba(129, 230, 217, 0.6)'"
                    :border-color="'rgba(129, 230, 217, 0.5)'"
                    :top="20"
                    :left="0"
                    :right="10"
                    :bottom="0"
                    border-width="2"
                    fill="false"></chart>
                    <!-- </div> -->

                    <!-- footer labels -->
                    <div class="border-t-8 grid grid-cols-2 justify-center md:flex py-6">
                        <div class="mx-6 flex">
                            <div class="text-gray-600 text-xs">
                                <i class="absolute bg-gray-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>{{__('pending')}}</h1>
                            </div>
                            <span class="font-semibold mx-2 text-2xl text-gray-700">{{pending_order}}</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-orange-400 text-xs">
                                <i class="absolute bg-orange-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>{{__('awaiting')}}</h1>
                            </div>
                            <span class="font-semibold mx-2 text-2xl text-gray-700">{{awaiting_order}}</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-teal-300 text-xs">
                                <i class="absolute bg-teal-300 h-2 mt-6 rounded-full w-12"></i>
                                <h1>{{__('delivered')}}</h1>
                            </div>
                            <span class="font-semibold mx-2 text-2xl text-gray-700">{{delivered_order}}</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-red-400 text-xs">
                                <i class="absolute bg-red-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>{{__('rejected')}}</h1>
                            </div>
                            <span class="font-semibold mx-2 text-2xl text-gray-700">{{rejected_order}}</span>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="bg-white rounded-lg md:w-70 shadow-lg">
                <div class="border-b-2 flex items-center relative">
                    <i class="absolute bg-blue-400 h-3 mx-3 rounded-full w-3"></i>
                    <p class="px-8 py-4 text-indigo-900">{{__('top salling brands')}}</p>
                </div>
                <chart class="chartjs-render-monitor max-w-xs mt-24 mb-24"
                width="200" height="164"
                id="chart1"
                :title="__('top salling brands')"
                :labels='["BMW", "Chevrelet", "Alfa Romeo", "Cilroen","Chrysler", "GMC"]'
                :data='[45, 75, 150, 90, 75, 30]'
                :top="20"
                :left="30"
                :right="30"
                :bottom="0"
                :background-color="'rgba(68, 58, 123,1)'"
                :border-color="'rgba(68, 58, 123, 1)'"
                ></chart>
                <div></div>
                <div class="border-t-8 py-6 flex">
                        <div class="mx-4">
                            <div class="text-gray-600 text-xs flex items-center relative">
                                <i class="absolute bg-red-400 h-2 rounded-full w-2"></i>
                                <h1 class="mx-3 text-xs">{{__('total sales')}}</h1>
                            </div>
                            <span class="font-semibold text-xl text-gray-700">QAR {{total}}</span>
                            <div class="absolute bg-gray-300 h-2 rounded-full w-64">
                                <i class="absolute bg-red-400 h-2 rounded-full w-20"></i>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>


        

    </layout>
    
</template>

<script>
    import Layout from "../../Shared/Layout";
    import Chart from '../Dashboard/Chart'
    export default {
        components: {
            Layout,
            Chart
            },
        props:[
        'brands','pending_order', 
        'delivered_order', 'awaiting_order', 
        'rejected_order', 'total'],
    }
</script>
