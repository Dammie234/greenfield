<template>
    <div>
        <nprogress-container></nprogress-container>
        <div id="root">
            <sidebar></sidebar>
            <div class="relative md:ml-64 bg-blueGray-50">
                <page-nav></page-nav>
                <!-- Header -->
                <div class="relative bg-light-green md:pt-32 pb-32 pt-12">
                    
                </div>
                <div class="px-4 md:px-10 mx-auto w-full -m-24">
                    <div class="flex flex-wrap">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">Have you add your apartment? </h6>
                                        <button @click.prevent="addApartment" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Click here to Add
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <form v-if="add_apartment == true" @submit.prevent="store">
                                        <div class="loader" v-if="loading == true"></div>
                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Apartment Information</h6>
                                        <div :disabled="loading">
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Property</label>
                                                        <select v-model="form.property" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(property, index) in properties" :key="index" :value="property.id">{{property.house_number + ', ' + property.street_name}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property"> {{ errors.property[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Building Type
                                                        </label>
                                                        <select v-model="form.building_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(building_type, index) in building_types" :key="index" :value="building_type">{{building_type}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.building_type"> {{ errors.building_type[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">

                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Room Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of 3 Bedroom
                                                        </label>
                                                        <input v-model="form.number_of_3_bedroom" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_3_bedroom"> {{ errors.number_of_3_bedroom[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of 2 Bedroom
                                                        </label>
                                                        <input v-model="form.number_of_2_bedroom" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_2_bedroom"> {{ errors.number_of_2_bedroom[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Room and Parlour
                                                        </label>
                                                        <input v-model="form.number_of_room_and_palour" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_room_and_palour"> {{ errors.number_of_room_and_palour[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Self Contain
                                                        </label>
                                                        <input v-model="form.number_of_self_contain" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_self_contain"> {{ errors.number_of_self_contain[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Shop
                                                        </label>
                                                        <input v-model="form.number_of_shop" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_shop"> {{ errors.number_of_shop[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Office Space
                                                        </label>
                                                        <input v-model="form.number_of_office_space" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_office_space"> {{ errors.number_of_office_space[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">About Apartment</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-12/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                           Description
                                                        </label>
                                                        <textarea v-model="form.description" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="5"> 
                                                            
                                                        </textarea>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.description"> {{ errors.description[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="form.building_type == 'Hall' || form.building_type == 'Event Centre' || form.building_type == 'Hotel' || form.building_type == 'School' || form.building_type == 'Mosque' || form.building_type == 'Church'">
                                                <hr class="mt-6 border-b-1 border-blueGray-300">
                                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Estate Resource Allocation</h6>
                                                <div class="flex flex-wrap">
                                                    <div class="w-full lg:w-12/12 px-4">
                                                        <div class="relative w-full mb-3">
                                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Which Transformer are you Connected to?
                                                            </label>
                                                            <input v-model="form.transformer" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="5"> 
                                                            
                                                            <small class="text-danger" style="color:#f00" v-if="errors.transformer"> {{ errors.transformer[0] }} </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <input type="submit" value="Submit" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        <button @click="addApartment" class="bg-teal-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-wrap" v-if="edit_apartment == true">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">It seems you have an error, edit now.</h6>
                                        <button @click.prevent="closeEditApartment" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Click here to Close
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <form @submit.prevent="update">
                                        <div class="loader" v-if="loading == true"></div>
                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Apartment Information</h6>
                                        <div :disabled="loading">
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Property</label>
                                                        <select v-model="form.property" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(property, index) in properties" :key="index" :value="property.id">{{property.house_number + ', ' + property.street_name}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property"> {{ errors.property[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Building Type
                                                        </label>
                                                        <select v-model="form.building_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(building_type, index) in building_types" :key="index" :value="building_type">{{building_type}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.building_type"> {{ errors.building_type[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">

                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Room Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of 3 Bedroom
                                                        </label>
                                                        <input v-model="form.number_of_3_bedroom" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_3_bedroom"> {{ errors.number_of_3_bedroom[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of 2 Bedroom
                                                        </label>
                                                        <input v-model="form.number_of_2_bedroom" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_2_bedroom"> {{ errors.number_of_2_bedroom[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Room and Parlour
                                                        </label>
                                                        <input v-model="form.number_of_room_and_palour" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_room_and_palour"> {{ errors.number_of_room_and_palour[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Self Contain
                                                        </label>
                                                        <input v-model="form.number_of_self_contain" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_self_contain"> {{ errors.number_of_self_contain[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Shop
                                                        </label>
                                                        <input v-model="form.number_of_shop" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_shop"> {{ errors.number_of_shop[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Number of Office Space
                                                        </label>
                                                        <input v-model="form.number_of_office_space" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.number_of_office_space"> {{ errors.number_of_office_space[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">About Apartment</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-12/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                           Description
                                                        </label>
                                                        <textarea v-model="form.description" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="5"> 
                                                            
                                                        </textarea>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.description"> {{ errors.description[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="form.building_type == 'Hall' || form.building_type == 'Event Centre' || form.building_type == 'Hotel' || form.building_type == 'School' || form.building_type == 'Mosque' || form.building_type == 'Church'">
                                                <hr class="mt-6 border-b-1 border-blueGray-300">
                                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Estate Resource Allocation</h6>
                                                <div class="flex flex-wrap">
                                                    <div class="w-full lg:w-12/12 px-4">
                                                        <div class="relative w-full mb-3">
                                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Which Transformer are you Connected to?
                                                            </label>
                                                            <input v-model="form.transformer" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="5"> 
                                                            
                                                            <small class="text-danger" style="color:#f00" v-if="errors.transformer"> {{ errors.transformer[0] }} </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <input type="submit" value="Submit" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-wrap" v-if="apartments.length != 0">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">My Apartments </h6>
                                        <button  class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Apartments
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-6/12 px-4" v-for="(apartment, index) in apartments" :key="index">
                                            <table class="items-center w-full bg-transparent border-collapse">
                                                <tr>
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Address</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.house_number + ', ' + apartment.street_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Building Type</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.building_type}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_3_bedroom !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of 3 Bedroom</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_3_bedroom}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_2_bedroom !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of 2 Bedroom</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_2_bedroom}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_room_and_palour !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of Room &amp; Palour</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_room_and_palour}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_self_contain !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of Self Contain</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_self_contain}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_shop !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of Shop</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_shop}}</td>
                                                </tr>
                                                <tr v-if="apartment.number_of_office_space !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Number of Office Space</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.number_of_office_space}}</td>
                                                </tr>
                                                <tr v-if="apartment.description !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Description</th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.description}}</td>
                                                </tr>
                                                <tr v-if="apartment.transformer !== null">
                                                    <th class="px-3 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Which Transformer are you Connected to? </th>
                                                    <td class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{apartment.transformer}}</td>
                                                </tr>
                                                <tr>
                                                
                                                    <td colspan="2" class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                        <button @click="editApartment(apartment.id)" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                                <i class="fas fa-edit"></i> Edit 
                                                        </button>
                                                        <button @click="deleteApartment(apartment.id)" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </td>
                                                </tr>
                        
                                            </table>
                                        </div>
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
    name: 'property',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            lastname: '',
            middlename: '',
            firstname: '',
            id: '',
            role: '',
            form:{
                user_id: null,
                property: null,
                building_type: null,
                number_of_3_bedroom: null,
                number_of_2_bedroom: null,
                number_of_room_and_palour: null,
                number_of_self_contain: null,
                number_of_shop: null,
                number_of_office_space: null,
                description: null,
                transformer: null
            },
            add_apartment:false,
            edit_apartment:false,
            apartment_id: '',
            loading: false,
            errors: {},
            properties:[],
            apartments: [],
            building_types: ['Flat', 'Block of Flat', 'Semi-detached House', 'Terraced House', 'Bungalow', 'Town House', 'Developing', 'Shopping Complex', 'Plaza', 
            'Hotel', 'Hall', 'Event Centre', 'School', 'Church', 'Mosque', 'Warehouse'],
        }
    },
    created() {
        this.login()
        this.getApartments()
        this.getProperties()
    },
    methods:{
        login(){
            if (!User.loggedIn()) {
                this.$router.push({
                    name: '/'
                })
            }else{
                this.lastname = User.lastname()
                this.middlename = User.middlename()
                this.firstname = User.firstname()
                this.role = User.role()
                this.id = User.id()
                this.form.user_id = User.id()
                if(this.middlename == 'null'){
                    this.$router.push({
                        name: 'edit-profile'
                    })
                }
            }
        },
        
        addApartment(){
            if (this.add_apartment == false) {
                this.add_apartment = true
            }else{
                this.add_apartment = false
            }
        },
        editApartment(id){
            if (this.edit_apartment == false) {
                this.apartment_id = id
                this.edit_apartment = true
                axios.get("/api/apartment/" + id)
                .then(({ data }) => (this.form = data))
                .catch();
            }
        },
        closeEditApartment(){
            if (this.edit_apartment == true) {
                this.edit_apartment = false
                this.form = {
                    property: null,
                    building_type: null,
                    number_of_3_bedroom: null,
                    number_of_2_bedroom: null,
                    number_of_room_and_palour: null,
                    number_of_self_contain: null,
                    number_of_shop: null,
                    number_of_office_space: null,
                    description: null,
                    transformer: null
                }
            }
        },
        store() {
            this.loading = true
            axios.post('/api/apartment', this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.$router.push({
                        name: 'apartment'
                    })
                    this.add_apartment = false
                    this.getApartments()
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        update() {
            this.loading = true
            axios.patch('/api/apartment/' + this.apartment_id, this.form)
                .then(res => {
                   Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.$router.push({
                        name: 'apartment'
                    })
                    this.add_apartment = false
                    this.edit_apartment = false
                    this.property_id = ''
                    this.getProperties()
                    this.getApartments()
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        deleteApartment(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/apartment/' + id)
                        .then(() => {
                            this.apartments = this.apartments.filter(apartment => {
                                return apartment.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({
                                name: 'property'
                            })
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
        getApartments() {
            axios.get("/api/apartments/" + this.id)
                .then(({ data }) => (this.apartments = data))
                .catch();
        },
        getProperties() {
            axios.get("/api/properties/" + this.id)
                .then(({ data }) => (this.properties = data))
                .catch();
        },
    }
}
</script>

<style scoped>
.loader{  
    position: absolute;
    top:0px;
    right:0px;
    width:100%;
    height:100%;
    background-color:#eceaea;
    background-image: url('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/ajax-loader.gif');
    background-size: 50px;
    background-repeat:no-repeat;
    background-position:center;
    z-index:10000000;
    opacity: 0.4;
    filter: alpha(opacity=40);
}
table tr td strong{
    display:block;
    font-size: 12px;
}
</style>
