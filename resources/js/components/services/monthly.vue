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
                                        <h6 class="text-blueGray-700 text-xl font-bold">{{form.name}} Service  for {{form.created_at | moment('YYYY')}}</h6>
                                        <button class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Service
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <form>
                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Service Information</h6>
                                        <div class="flex flex-wrap">
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Name</label>
                                                    <input type="text" v-model="form.name" disabled class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="lucky.jesse">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                        Payment Type
                                                    </label>
                                                    <input type="text" v-model="form.payment_type" disabled class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="jesse@example.com">
                                                </div>
                                            </div>
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                        Amount
                                                    </label>
                                                    <input type="text" v-model="form.amount" disabled class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="Lucky">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <hr class="mt-6 border-b-1 border-blueGray-300">

                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Month Information</h6>
                                        <div class="flex flex-wrap">
                                            <div class="w-full lg:w-12/12 px-4">
                                                <table class="items-center w-full bg-transparent border-collapse">
                                                    <thead>
                                                        <tr>
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.january == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input   @click="pay(1, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.february == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="february"   @click="pay(2, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.march == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="march"   @click="pay(3, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.april == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input   name="april"   @click="pay(4, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.may == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="may"   @click="pay(5, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.june == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="june"   @click="pay(6, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.july == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="july"   @click="pay(7, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.august == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="august"   @click="pay(8, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.september == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="september"   @click="pay(9, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.october == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="october"   @click="pay(10, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.novemeber == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input  name="november"   @click="pay(11, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                <span v-if="service.december == 1">-</span>
                                                                <span v-else>
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input name="december"   @click="pay(12, service.amount)" type="checkbox" class="form-checkbox rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                                                        <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                                                            Pay
                                                                        </span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                             </div>   
                                            <div class="w-full lg:w-4/12 px-4">
                                                <div class="relative w-full mb-3">
                                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                        Total
                                                    </label>
                                                    <input type="text" v-model="total" disabled class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Make Payment" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                        
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
    name: 'monthly-services',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            lastname: '',
            middlename: '',
            firstname: '',
            id: '',
            role: '',
            booleanValue: false,
            checkBoxVal: true,
            form:{
                name:'',
                amount:'',
                january: '',
                february: '',
                march: '',
                april: '',
                may: '',
                june: '',
                july: '',
                august: '',
                september: '',
                october: '',
                november: '',
                december: ''
            },
            service: '',
            total: 0
        }
    },
    created() {
        this.login()
        this.getService()
        this.getMonthlyService()
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
                if(this.middlename == 'null'){
                    this.$router.push({
                        name: 'edit-profile'
                    })
                }
            }
        },
        pay(month, amount,){
            if (month == 1) {
                if (this.form.january == false) {
                    this.total += parseInt(amount)
                    this.form.january = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.january = false
                }
            }
            if (month == 2) {
                if (this.form.february == false) {
                    this.total += parseInt(amount)
                    this.form.february = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.february = false
                }
            }
            if (month == 3) {
                if (this.form.march == false) {
                    this.total += parseInt(amount)
                    this.form.march = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.march = false
                }
            }
            if (month == 4) {
                if (this.form.april == false) {
                    this.total += parseInt(amount)
                    this.form.april = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.april = false
                }
            }
            if (month == 5) {
                if (this.form.may == false) {
                    this.total += parseInt(amount)
                    this.form.may = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.may = false
                }
            }
            if (month == 6) {
                if (this.form.june == false) {
                    this.total += parseInt(amount)
                    this.form.june = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.june = false
                }
            }
            if (month == 7) {
                if (this.form.july == false) {
                    this.total += parseInt(amount)
                    this.form.july = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.july = false
                }
            }
            if (month == 8) {
                if (this.form.august == false) {
                    this.total += parseInt(amount)
                    this.form.august = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.august = false
                }
            }
            if (month == 9) {
                if (this.form.september == false) {
                    this.total += parseInt(amount)
                    this.form.september = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.september = false
                }
            }
            if (month == 10) {
                if (this.form.october == false) {
                    this.total += parseInt(amount)
                    this.form.october = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.october = false
                }
            }
            if (month == 11) {
                if (this.form.november == false) {
                    this.total += parseInt(amount)
                    this.form.november = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.november = false
                }
            }
            if (month == 12) {
                if (this.form.december == false) {
                    this.total += parseInt(amount)
                    this.form.december = true
                }else{
                    this.total -= parseInt(amount)
                    this.form.december = false
                }
            } 
        },
        getMonthlyService() {
            let id = this.$route.params.id
            axios.get("/api/unpaid-monthly-services/" + id)
                .then(({ data }) => (this.form = data))
                .catch();
        },
        getService() {
            let id = this.$route.params.id
            axios.get("/api/unpaid-monthly-services/" + id)
                .then(({ data }) => (this.service = data))
                .catch();
        }
    }
}
</script>

<style scoped>

</style>
