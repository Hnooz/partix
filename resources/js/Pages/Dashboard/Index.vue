<template>
    <layout>
        <div class="mx-auto w-full">
            <div>
                <h1 class="my-2 text-gray-500">Home/Dashboard</h1>
                <!-- Card stats -->
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                                            Orders
                                        </h5>
                                        <span class="font-semibold text-xl text-gray-800">
                                        2,356
                                        </span>
                                    </div>
                                    <div class="relative w-auto px-2 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-purple-900">

                                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-green-600 mt-4">
                                    <span class="text-green-600">+3.48%</span>
                                    <span class="whitespace-no-wrap">this week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-500 uppercase font-bold text-xs">Customers</h5>

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
                                    <span class="whitespace-no-wrap">this week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                                        <h5 class="text-gray-500 uppercase font-bold text-xs">Car Brands</h5>
                                        <span class="font-semibold text-xl text-gray-800">49</span>

                                    </div>
                                    <div class="relative w-auto px-2 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-400">
                                            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                 stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-4">
                                    <span class="text-green-500 mr-2"><i class="fas fa-arrow-up"></i>+12</span>
                                    <span class="whitespace-no-wrap">this week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 w-full flex justify-between">
            <div class="bg-white rounded-t-lg w-72">
                <div class="border-b-2 flex items-center relative">
                    <i class="absolute bg-red-500 h-3 mx-3 rounded-full w-3"></i>
                    <p class="pl-8 py-4 text-indigo-900">Sales Statistical Overview</p>
                </div>
                <div class="flex m-6">
                    <button class="hover:bg-gray-400  mr-3 px-3 text-sm" type="button">1D</button>
                    <button class="hover:bg-gray-400  mr-3 px-3 text-sm" type="button">5D</button>
                    <button class="hover:bg-gray-400 bg-gray-400  mr-3 px-3 text-sm" type="button">1M</button>
                    <button class="hover:bg-gray-400  mr-3 px-3 text-sm" type="button">1Y</button>
                    <button class="hover:bg-gray-400  mr-3 px-3 text-sm" type="button">Max</button>
                </div>

                <div class="flex items-center justify-between">
                    <div class="mx-6 text-gray-600">
                        <h1>Total Sales</h1>
                        <p>4,559</p>
                    </div>
                    <div class="flex items-center mx-6">
                        <i class="-ml-12 absolute bg-teal-300 h-2 rounded-full w-10"></i>
                        <h1>Sales</h1>
                    </div>
                </div>
                <!-- chart1 -->
                    <chart class="max-w-screen-sm mx-auto" width="500" height="240"
                    id="chart2"
                    type="line"
                    title="Top Salling"
                    :labels='["", "", "", "","", "","", "", "", "","", "",""]'
                    :data='[0, 10, 17, 12, 23, 10, 41, 40, 30, 19, 31, 39, 50]'
                    :background-color="'rgba(129, 230, 217, 0.6)'"
                    :border-color="'rgba(129, 230, 217, 0.5)'"
                    border-width="2"
                    fill="false"></chart>

                    <!-- footer labels -->
                    <div class="border-t-8 flex justify-center py-6">
                        <div class="mx-6 flex">
                            <div class="text-gray-600 text-xs">
                                <i class="absolute bg-gray-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>Pendinig</h1>
                            </div>
                            <span class="font-semibold ml-2 text-2xl text-gray-700">382</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-orange-400 text-xs">
                                <i class="absolute bg-orange-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>Awaiting</h1>
                            </div>
                            <span class="font-semibold ml-2 text-2xl text-gray-700">82</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-teal-300 text-xs">
                                <i class="absolute bg-teal-300 h-2 mt-6 rounded-full w-12"></i>
                                <h1>Delivered</h1>
                            </div>
                            <span class="font-semibold ml-2 text-2xl text-gray-700">1,382</span>
                        </div>
                        <div class="mx-6 flex">
                            <div class="text-red-400 text-xs">
                                <i class="absolute bg-red-400 h-2 mt-6 rounded-full w-12"></i>
                                <h1>Rejected</h1>
                            </div>
                            <span class="font-semibold ml-2 text-2xl text-gray-700">382</span>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="bg-white rounded-t-lg w-70">
                <div class="border-b-2 flex items-center relative">
                    <i class="absolute bg-blue-400 h-3 mx-3 rounded-full w-3"></i>
                    <p class="pl-8 py-4 text-indigo-900">Top Salling Brands</p>
                </div>
                <chart class="chartjs-render-monitor max-w-xs mt-24 mb-16"
                width="200" height="165"
                id="chart1"
                title="Top Salling Brands"
                :labels='["test", "Blue", "Yellow", "Green","Purple", "Orange"]'
                :data='[12, 19, 3, 5, 6, 3]'
                :background-color="'rgba(68, 58, 123,1)'"
                :border-color="'rgba(68, 58, 123, 1)'"
                ></chart>
                <div></div>
                <div class="border-t-8 py-6 flex">
                        <div class="mx-4">
                            <div class="text-gray-600 text-xs flex items-center relative">
                                <i class="absolute bg-red-400 h-2 rounded-full w-2"></i>
                                <h1 class="ml-3 text-xs">Total Sales</h1>
                            </div>
                            <span class="font-semibold text-xl text-gray-700">QAR 7,382</span>
                            <div class="absolute bg-gray-300 h-2 rounded-full w-64">
                                <i class="absolute bg-red-400 h-2 rounded-full w-20"></i>
                            </div>
                        </div>
                        
                    </div>
            </div>

            <!-- <h2 class="text-2xl font-medium">Tables</h2> -->
            <!-- <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Title
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Role
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt=""/>
                                            </div>
                                            <div class="mx-2">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Jone Doe</div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Software Engineer
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                  </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt=""/>
                                            </div>
                                            <div class="mx-2">
                                                <div class="text-sm leading-5 font-medium text-gray-900">Jone Doe</div>
                                                <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Actor
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                  </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                        Owner
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
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
            }
    }
</script>
