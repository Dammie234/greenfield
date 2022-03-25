<template>
    <div>
        <nprogress-container></nprogress-container>
        <div id="root">
            <sidebar></sidebar>
            <div class="relative md:ml-64 bg-blueGray-50">
               <page-nav></page-nav>
                <!-- Header -->
                <div class="relative bg-light-green md:pt-32 pb-32 pt-12" >
                    <div class="px-4 md:px-10 mx-auto w-full">
                        <div>
                        <!-- Card stats -->
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4" v-show="user.role == 1 ? true : false" style="display:none;">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Landlords
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 1">
                                            {{admin.landlords}}
                                        </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-light-green">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-blueGray-400 mt-4">
                                        <span class="whitespace-nowrap">
                                            Number of landlords
                                        </span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4" v-show="user.role == 2 || user.role == 1 ? true : false" style="display:none;">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Properties
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 1">
                                            {{admin.aproperties}}
                                        </span>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 2">
                                            {{dashboard.aproperties}}
                                        </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-blueGray-400 mt-4">
                                        <span class="whitespace-nowrap">
                                            Number of properties
                                        </span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4" v-show="user.role == 2? true : false" style="display:none;">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Apartments
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 2">
                                            {{dashboard.aapartments}}
                                        </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                            <i class="fas fa-house-user"></i>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-blueGray-400 mt-4">
                                        <span class="whitespace-nowrap">
                                            Number of apartments
                                        </span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4" v-show="user.role == 2 || user.role == 1 ? true : false" style="display:none;">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                            Tenants
                                        </h5>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 1">
                                            {{admin.atenants}}
                                        </span>
                                        <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 2">
                                            {{dashboard.atenants}}
                                        </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-light-green">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-blueGray-400 mt-4">
                                        <span class="whitespace-nowrap">
                                            Number of tenants occuping apartments 
                                        </span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4" v-show="user.role == 2 || user.role == 1 ? true : false" style="display:none;">
                                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                            <h5 class="text-blueGray-400 uppercase font-bold text-xs" v-if="user.role == 2">
                                                Debts
                                            </h5>
                                            <h5 class="text-blueGray-400 uppercase font-bold text-xs" v-if="user.role == 1">
                                                Debtors
                                            </h5>
                                            <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 2"><span v-if="debt > 0" class="text-red">&#8358;{{debt}}</span><span v-else>&#8358;{{debt}}</span></span>
                                            <span class="font-semibold text-xl text-blueGray-700" v-if="user.role == 1"> <span v-if="debts_data.debtors > 0" class="text-red">{{debts_data.debtors}} debtors owing &#8358;{{debts_data.debts}}</span><span v-else>{{debts_data.debtors}} debtors</span> </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-blueGray-400 mt-4">
                                        <span class="whitespace-nowrap" v-if="user.role == 2">Total debts <router-link to="/services" class="text-blue">Click here to make payment</router-link></span>
                                        <span class="whitespace-nowrap" v-if="user.role == 1">Number of debtors. <router-link to="/debtors" class="text-blue">Click here to view debtors.</router-link></span>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 md:px-10 mx-auto w-full -m-24">
                    <div class="flex flex-wrap">
                        <div class="w-full mb-12 xl:mb-0 px-4" v-show="user.role == 1 ? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        Landlords/Landladies
                                    </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <router-link  to="" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                        See all
                                    </router-link>
                                    </div>
                                </div>
                                </div>
                                <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                        <tr>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Name
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Email Address
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Mobile Phone
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                WhatsApp Phone Number
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Gender
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Address
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="user.role == 1">
                                            <tr v-for="(landlord, index) in admin.nlandlords" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.salutation + ' ' + landlord.lastname + ' ' + landlord.firstname}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.email}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.mobile_phone}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.phone_number_whatsapp}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.gender}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{landlord.house_number + ', ' + landlord.street_name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mb-12 xl:mb-0 px-4" v-show="user.role == 2 || user.role == 1 ? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        Properties
                                    </h3>
                                    </div>
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <router-link v-if="user.role == 2" to="/property" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                        See all
                                    </router-link>
                                    </div>
                                </div>
                                </div>
                                <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                        <tr>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Address
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Property
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Category
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Type
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="user.role == 1">
                                            <tr v-for="(property, index) in admin.nproperties" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.house_number + ', ' + property.street_name}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_class}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_category}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_type}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody v-if="user.role == 2">
                                            <tr v-for="(property, index) in dashboard.nproperties" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.house_number + ', ' + property.street_name}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_class}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_category}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{property.property_type}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4" v-show="user.role == 2 ? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="rounded-t mb-0 px-4 py-3 border-0">
                                    <div class="flex flex-wrap items-center">
                                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                            <h3 class="font-semibold text-base text-blueGray-700">
                                                Apartments
                                            </h3>
                                        </div>
                                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                            <router-link  to="/apartment" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                See all
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                                <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Address
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Building Type
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of 3 Bedroom
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of 2 Bedroom
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of Room &amp; Palour
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of Self Contain
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of Shop
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    No of Office Space
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(apartment, index) in dashboard.napartments" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.house_number + ', ' + apartment.street_name}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.building_type}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_3_bedroom}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_2_bedroom}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_room_and_palour}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_self_contain}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_shop}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{apartment.number_of_office_space}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4" v-show="user.role == 2 || user.role == 1 ? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                <div class="rounded-t mb-0 px-4 py-3 border-0">
                                    <div class="flex flex-wrap items-center">
                                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                            <h3 class="font-semibold text-base text-blueGray-700">
                                                Tenants
                                            </h3>
                                        </div>
                                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                            <router-link v-if="user.role == 2" to="/tenant" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                See all
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                                <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <thead>
                                            <tr>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Name
                                                </th>
                                                
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Mobile Phone
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                E-mail Address
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Apartment Type
                                                </th>
                                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                    Address
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="user.role == 1 ">
                                            <tr v-for="(tenant, index) in admin.ntenants" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.salutation + ' ' + tenant.lastname + ' ' + tenant.firstname}}
                                                </td>
                                                
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.mobile_phone}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.email}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.apartment_type}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.house_number + ', ' + tenant.street_name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody v-if="user.role == 2">
                                            <tr v-for="(tenant, index) in dashboard.ntenants" :key="index">
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.salutation + ' ' + tenant.lastname + ' ' + tenant.firstname}}
                                                </td>
                                                
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.mobile_phone}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.email}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.apartment_type}}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{tenant.house_number + ', ' + tenant.street_name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4" v-show="user.role == 3 || user.role == 2? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">Monthly Unpaid Services </h6>
                                        <router-link  to="/services" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            View All
                                        </router-link>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0" >
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse" v-if="data.monthly.length != 0">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Year</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Jan.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Feb.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Mar.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Apr.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">May</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Jun.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Jul.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Aug.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Sept.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Oct.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Nov.</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Dec.</th>
                                                    
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(service, index) in data.monthly" :key="index">
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{service.name}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{'&#8358;' + service.amount}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{service.year}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.january == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.february == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.march == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.april == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.may == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.june == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.july == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.august == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.september == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.october == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.november == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <span v-if="service.december == 1">
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-light-green text-white uppercase last:mr-0 mr-1">paid</span>
                                                        </span>
                                                        <span v-else>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blueGray-100 bg-red-600 uppercase last:mr-0 mr-1">unpaid</span>
                                                        </span>
                                                    </td>
                                                
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><router-link class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" :to="{name: 'monthly-services', params:{id: service.id}}">Make Payment</router-link></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-else>
                                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-600">
                                                <span class="text-xl inline-block mr-5 align-middle">
                                                    <i class="fas fa-bell"></i>
                                                </span>
                                                <span class="inline-block align-middle mr-8">
                                                    <b class="capitalize">Whoops!</b> You have no debts
                                                </span>
                                                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                                    <span>×</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4" v-show="user.role == 3 || user.role == 2 ? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">One-Off Unpaid Services </h6>
                                        <router-link  to="/services" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            View All
                                        </router-link>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0" >
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse" v-if="data.one_off_payments.length != 0">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Month &amp; Year Created</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(service, index) in data.one_off_payments" :key="index">
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{service.name}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{'&#8358;' + service.amount}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{service.created_at | moment('MMMM, YYYY')}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><router-link class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" :to="{name: 'one-off-services', params:{id: service.id}}">Make Payment</router-link></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-else>
                                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-600">
                                                <span class="text-xl inline-block mr-5 align-middle">
                                                    <i class="fas fa-bell"></i>
                                                </span>
                                                <span class="inline-block align-middle mr-8">
                                                    <b class="capitalize">Whoops!</b> You have no debts
                                                </span>
                                                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                                    <span>×</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4" v-show="(user.role == 3 || user.role == 2) && debt > 0? true : false" style="display:none;">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">Debts </h6>
                                        <router-link  to="/services" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            View All
                                        </router-link>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0" >
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Outstanding Debts</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{'&#8358;' + debt}}</td>
                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <page-footer></page-footer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'home',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            id: '',
            token: '',
            user:'',
            dashboard: [],
            data: {},
            debt: '',
            admin: [],
            debts_data: {}
        }
    },
    created() {
        this.login()
        this.getUser()
        this.getDashboard()
        this.getAdminDashboard()
        this.getUserDebts()
        this.getFewUnpaidServices()
        
    },
    methods:{
        login(){
            if (!User.loggedIn()) {
                this.$router.push({
                    name: '/'
                })
            }else{
                this.token = User.token()
            }
        },
        getUser(){
            axios.get('/api/v1/user/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.user = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getDashboard(){
            axios.get('/api/v1/dashboard-landlord/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.dashboard = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getAdminDashboard(){
            axios.get('/api/v1/dashboard-admin', {
                    headers: {
                        Authorization: 'Bearer ' + this.token,
                        Accept: 'application/json'
                    }
            }).then(response => (this.admin = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getUserDebts(){
            axios.get('/api/v1/user-debts/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.debt = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getFewUnpaidServices(){
            axios.get('/api/v1/few-unpaid-services/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.data = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getDebts(){
            axios.get('/api/v1/debts', {
                    headers: {
                        Authorization: 'Bearer ' + this.token,
                        Accept: 'application/json'
                    }
            }).then(response => (this.debts_data = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        }
        
    }
}
</script>

<style scoped>
.text-blue{color:blue}
.text-red{color: red;}
</style>
