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
                                        <h6 class="text-blueGray-700 text-xl font-bold">Have you add your tenant? </h6>
                                        <button @click="addTenant" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Add a tenant now
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    
                                    <form @submit.prevent="store" v-if="add_tenant == true">
                                        <div class="loader" v-if="loading == true"></div>
                                        <div :disabled="loading">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">User Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Salutation</label>
                                                        <select v-model="form.salutation" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(salute, index) in salutations" :key="index" :value="salute">{{salute}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.salutation"> {{ errors.salutation[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Last Name / Surname
                                                        </label>
                                                        <input v-model="form.lastname" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
                                                        <small class="text-danger" style="color:#f00" v-if="errors.lastname"> {{ errors.lastname[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            First Name
                                                        </label>
                                                        <input v-model="form.firstname" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.firstname"> {{ errors.firstname[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Gender
                                                        </label>
                                                        <select v-model="form.gender" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.gender"> {{ errors.gender[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Email address
                                                        </label>
                                                        <input v-model="form.email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.email"> {{ errors.email[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Mobile Phone
                                                        </label>
                                                        <input v-model="form.mobile_phone" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.mobile_phone"> {{ errors.mobile_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4" v-if="form.email">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Tenant Login Email
                                                        </label>
                                                        <input v-model="form.email" disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.mobile_phone"> {{ errors.mobile_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4" v-if="form.email">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Tenant Login Password
                                                        </label>
                                                        <input disabled type="text" value="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.mobile_phone"> {{ errors.mobile_phone[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Tenant Information</h6>
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
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Apartment Type
                                                        </label>
                                                        <select v-model="form.apartment_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(apartment, index) in apartment_types" :key="index" :value="apartment">{{apartment}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.apartment_type"> {{ errors.apartment_type[0] }} </small>
                                                    </div>
                                                </div>     
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Third Party Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Name
                                                        </label>
                                                        <input v-model="form.third_party_name" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_name"> {{ errors.third_party_name[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Email Address
                                                        </label>
                                                        <input v-model="form.third_party_email" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_email"> {{ errors.third_party_email[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Phone
                                                        </label>
                                                        <input v-model="form.third_party_phone" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_phone"> {{ errors.third_party_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Whats App Number
                                                        </label>
                                                        <input v-model="form.third_party_whatsapp" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_whatsapp"> {{ errors.third_party_whatsapp[0] }} </small>
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
                    <div class="flex flex-wrap" v-if="edit_tenant == true">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">Have you add your tenant? </h6>
                                        <button @click="closeTenant" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Close Edit Tenant
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    
                                    <form @submit.prevent="update">
                                        <div class="loader" v-if="loading == true"></div>
                                        <div :disabled="loading">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">User Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Salutation</label>
                                                        <select v-model="form.salutation" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(salute, index) in salutations" :key="index" :value="salute">{{salute}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.salutation"> {{ errors.salutation[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Last Name / Surname
                                                        </label>
                                                        <input v-model="form.lastname" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" >
                                                        <small class="text-danger" style="color:#f00" v-if="errors.lastname"> {{ errors.lastname[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            First Name
                                                        </label>
                                                        <input v-model="form.firstname" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.firstname"> {{ errors.firstname[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Gender
                                                        </label>
                                                        <select v-model="form.gender" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.gender"> {{ errors.gender[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Email address
                                                        </label>
                                                        <input v-model="form.email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.email"> {{ errors.email[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Mobile Phone
                                                        </label>
                                                        <input v-model="form.mobile_phone" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.mobile_phone"> {{ errors.mobile_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Tenant Information</h6>
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
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Apartment Type
                                                        </label>
                                                        <select v-model="form.apartment_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(apartment, index) in apartment_types" :key="index" :value="apartment">{{apartment}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.apartment_type"> {{ errors.apartment_type[0] }} </small>
                                                    </div>
                                                </div>     
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Third Party Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Name
                                                        </label>
                                                        <input v-model="form.third_party_name" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_name"> {{ errors.third_party_name[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Email Address
                                                        </label>
                                                        <input v-model="form.third_party_email" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_email"> {{ errors.third_party_email[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Phone
                                                        </label>
                                                        <input v-model="form.third_party_phone" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_phone"> {{ errors.third_party_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Whats App Number
                                                        </label>
                                                        <input v-model="form.third_party_whatsapp" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_whatsapp"> {{ errors.third_party_whatsapp[0] }} </small>
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
                    <div class="flex flex-wrap" v-if="tenants.length != 0">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">My Tenants </h6>
                                        <button  class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Tenants
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Mobile Phone</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Email Address</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Apartment Type</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(tenant, index) in tenants" :key="index">
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{tenant.salutation + ' ' + tenant.lastname + ' ' + tenant.firstname}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{tenant.mobile_phone}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{tenant.email}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{tenant.apartment_type}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                        <button @click="editTenant(tenant.user_id)" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                            <i class="fas fa-edit"></i> Edit 
                                                        </button>
                                                        <button @click="deleteTenant(tenant.user_id)" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </td>
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
    name: 'tenant',
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
                landlord_user_id: '',
                email: '',
                firstname: '',
                gender: '',
                lastname: "",
                mobile_phone: '',
                salutation: '',
                date_moved_in: '',
                property: '',
                apartment_type: '',
                third_party_name: '',
                third_party_phone: '',
                third_party_email: '',
                third_party_whatsapp: ''
            },
            add_tenant:false,
            edit_tenant:false,
            tenant_id: null,
            errors: {},
            properties: [],
            tenants:[],
            error: false,
            loading:false,
            apartment_types: ['3 bedroom', '2 bedroom',  'Room & Palour', 'Self Contain', 'Shop', 'Office Space'],
            salutations: ['Mr', 'Mrs', 'Miss', 'Ms', 'Dr', 'Admiral', 'Air Comm', 'Ambassador', 'Baron', 'Baroness', 'Brig Gen', 'Brigadier', 'Brother', 'Canon',
                    'Capt', 'Chief', 'Col', 'Commander', 'Consul', 'Consul General', 'Cpl', 'Dr', 'Drs', 'Duchess', 'Duke', 'Earl', 'Father', 'General', 'Gräfin', 'Judge',
                    'Justice', 'Lady', 'Lt', 'Lt Col', 'Lt Cpl', 'Madam', 'Madame', 'Major', 'Major General', 'Minister', 'Prince', 'Princess', 'Professor', 'Prof',
                    'Rev', 'Senator', 'Sgt', 'Sheriff', 'Sir', 'The Hon', 'The Honourable', 'The Rt Hon']

        }
    },
    created() {
        this.login()
        this.getProperties()
        this.getTenants()
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
                this.form.landlord_user_id = User.id()
            }
        },
        addTenant(){
            if (this.add_tenant == false) {
                this.add_tenant = true
            }else{
                this.add_tenant = false
            }
        },
        editTenant(id){
            if (this.edit_tenant == false) {
                this.edit_tenant = true
                this.tenant_id = id
                axios.get("/api/tenant/" + id)
                .then(({ data }) => (this.form = data))
                .catch()
            }
        },
        closeTenant(){
            this.edit_tenant = false
                this.form = {
                    landlord_user_id: '',
                    email: '',
                    firstname: '',
                    gender: '',
                    lastname: "",
                    mobile_phone: '',
                    salutation: '',
                    date_moved_in: '',
                    property: '',
                    apartment_type: '',
                    third_party_name: '',
                    third_party_phone: '',
                    third_party_email: '',
                    third_party_whatsapp: ''
                }
        },
        getProperties() {
            axios.get("/api/properties/" + this.id)
                .then(({ data }) => (this.properties = data))
                .catch();
        },
        store() {
            this.loading = true
            axios.post('/api/tenant', this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.getTenants()
                    this.add_tenant = false
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        update() {
            this.loading = true
            axios.patch('/api/tenant/' + this.tenant_id, this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.getTenants()
                    this.edit_tenant = false
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        getTenants() {
            axios.get("/api/tenants/" + this.id)
                .then(({ data }) => (this.tenants = data))
                .catch();
        },
        deleteTenant(id) {
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
                    axios.delete('/api/tenant/' + id)
                        .then(() => {
                            this.tenants = this.tenants.filter(tenant => {
                                return tenant.user_id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({
                                name: 'tenant'
                            })
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
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
</style>
