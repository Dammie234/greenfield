<template>
    <div>
        <nprogress-container></nprogress-container>
        <div id="root">
            <sidebar></sidebar>
            <div class="relative md:ml-64 bg-blueGray-50">
                <page-nav></page-nav>
                <!-- Header -->
                <div class="relative bg-light-green md:pt-32 pb-32 pt-12">
                    <div class="px-4 md:px-10 mx-auto w-full">
                        
                    </div>
                    
                </div>
                <div class="px-4 md:px-10 mx-auto w-full -m-24">
                    <div class="flex flex-wrap">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">My account </h6>
                                        <button class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Settings
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    
                                    <form @submit.prevent="updateProfile">
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
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Middle Name
                                                        </label>
                                                        <input v-model="form.middlename" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.middlename"> {{ errors.middlename[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            First Name
                                                        </label>
                                                        <input v-model="form.firstname" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Email address
                                                        </label>
                                                        <input v-model="form.email" disabled type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4" v-if="user.role == 3">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Password
                                                        </label>
                                                        <input v-model="form.password" type="password" required class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4" v-if="user.role == 3">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Confirm Password
                                                        </label>
                                                        <input v-model="form.password_confirmation" required type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Biodata</h6>
                                            <div class="flex flex-wrap">
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
                                                            Date of Birth
                                                        </label>
                                                        <input v-model="form.date_of_birth" type="date" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.date_of_birth"> {{ errors.date_of_birth[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Religion
                                                        </label>
                                                        <input v-model="form.religion" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.religion"> {{ errors.religion[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Occupation
                                                        </label>
                                                        <input v-model="form.occupation" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.occupation"> {{ errors.occupation[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Nationality
                                                        </label>
                                                        <input v-model="form.nationality" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.nationality"> {{ errors.nationality[0] }} </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Marital Status
                                                        </label>
                                                        <select v-model="form.marital_status" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(marital, index) in maritals" :key="index" :value="marital">{{marital}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.marital_status"> {{ errors.marital_status[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4" v-if="form.marital_status == 'Married'">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Name of Spouse
                                                        </label>
                                                        <input v-model="form.name_of_spouse" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4" v-if="form.marital_status == 'Married'">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Wedding Aniversary Date
                                                        </label>
                                                        <input v-model="form.wedding_aniversary_date" type="date" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Are you a Resident?
                                                        </label>
                                                        <select v-model="form.are_you_a_resident" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.are_you_a_resident"> {{ errors.are_you_a_resident[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Date Moved In
                                                        </label>
                                                        <input v-model="form.date_moved_in" type="date" maxlength="4" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.date_moved_in"> {{ errors.date_moved_in[0] }} </small>
                                                    </div>
                                                </div>       
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Contact Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Phone (Mobile)
                                                        </label>
                                                        <input v-model="form.mobile_phone" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Phone (Home)
                                                        </label>
                                                        <input v-model="form.phone_number_home" type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.phone_number_home"> {{ errors.phone_number_home[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Phone (Whats App)
                                                        </label>
                                                        <input v-model="form.phone_number_whatsapp" required type="text" maxlength="11" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.phone_number_home"> {{ errors.phone_number_whatsapp[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Next of Kin Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                           Next of Kin
                                                        </label>
                                                        <input v-model="form.next_of_kin" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.next_of_kin"> {{ errors.next_of_kin[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Relationship with Next of Kin
                                                        </label>
                                                        <input v-model="form.relationship_with_next_of_kin" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.relationship_with_next_of_kin"> {{ errors.relationship_with_next_of_kin[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Next of Kin Phone Number
                                                        </label>
                                                        <input v-model="form.next_of_kin_phone_number" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.next_of_kin_phone_number"> {{ errors.next_of_kin_phone_number[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-6 border-b-1 border-blueGray-300" v-if="user.role == 3">
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase" v-if="user.role == 3">If Property is managed by a third party</h6>
                                            <div class="flex flex-wrap" v-if="user.role == 3">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                           Third Party Name
                                                        </label>
                                                        <input v-model="form.third_party_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_name"> {{ errors.third_party_name[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Third Party Email
                                                        </label>
                                                        <input v-model="form.third_party_email" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_email"> {{ errors.third_party_email[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Third Party Phone Number
                                                        </label>
                                                        <input v-model="form.third_party_phone" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.third_party_phone"> {{ errors.third_party_phone[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Third Party WhatsApp Number
                                                        </label>
                                                        <input v-model="form.third_party_whatsapp" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Postal Code">
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
                
                    <page-footer></page-footer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'edit profile',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            token: '',
            user: '',
            form:{
                date_of_birth: '',
                email: '',
                firstname: '',
                gender: '',
                lastname: "",
                marital_status: '',
                middlename: '',
                mobile_phone: '',
                name_of_spouse: '',
                nationality: '',
                occupation: '',
                phone_number_home: '',
                phone_number_whatsapp: '',
                religion: '',
                salutation: '',
                wedding_aniversary_date: '',
                date_moved_in: '',
                are_you_a_resident: '',
                next_of_kin: '',
                relationship_with_next_of_kin: '',
                next_of_kin_phone_number: '',
                third_party_name:'',
                third_party_phone: '',
                third_party_email: '',
                third_party_whatsapp: '',
                password: null,
                confirm_password: null,
                user_id: ''
            },
            errors: {},
            error: false,
            loading:false,
            maritals: ['Single', 'Married', 'Divorced', 'Widowed'],
            salutations: ['Mr', 'Mrs', 'Miss', 'Ms', 'Dr', 'Admiral', 'Air Comm', 'Ambassador', 'Baron', 'Baroness', 'Brig Gen', 'Brigadier', 'Brother', 'Canon',
                    'Capt', 'Chief', 'Col', 'Commander', 'Consul', 'Consul General', 'Cpl', 'Dr', 'Drs', 'Duchess', 'Duke', 'Earl', 'Father', 'General', 'Gräfin', 'Judge',
                    'Justice', 'Lady', 'Lt', 'Lt Col', 'Lt Cpl', 'Madam', 'Madame', 'Major', 'Major General', 'Minister', 'Prince', 'Princess', 'Professor', 'Prof',
                    'Rev', 'Senator', 'Sgt', 'Sheriff', 'Sir', 'The Hon', 'The Honourable', 'The Rt Hon']

        }
    },
    created() {
        this.login()
        this.getProfile()
        this.getUser()
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
        updateProfile() {
            this.loading = true
            axios.patch('/api/profile/' + this.token, this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    if(this.middlename == 'null'){
                        Toast.fire({
                            icon: 'success',
                            title: 'Sign in again to update profile'
                        })
                        this.$router.push({
                            name: 'logout'
                        })
                    }else{
                        this.$router.push({
                            name: 'home'
                        })
                    }
                    
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        getProfile(){
            axios.get('/api/v1/tenant-profile/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.form = response.data))
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
