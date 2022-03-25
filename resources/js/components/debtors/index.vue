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
                                        <h6 class="text-blueGray-700 text-xl font-bold">Debtors </h6>
                                        <input type="text" v-model="searchTerm" placeholder="Search Debtors Surname/Lastname" class="px-3 py-3 placeholder-blueGray-900 text-blueGray-900 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full md:w-4/12 pl-10">
                                        
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0" >
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse" v-if="users.count != 0">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Name</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Role</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Service</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Month</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(debt, index) in filterSearch" :key="index">
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{debt.salutation + ' ' + debt.user}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{debt.type}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{debt.service}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{debt.month}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">&#8358;{{debt.amount}}</td>
                                                    
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-right">Total:</th>
                                                    <td><strong>&#8358;{{sumDebtors}}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div v-else>
                                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-600">
                                                <span class="text-xl inline-block mr-5 align-middle">
                                                    <i class="fas fa-bell"></i>
                                                </span>
                                                <span class="inline-block align-middle mr-8">
                                                    <b class="capitalize">Whoops!</b> There are no debtors.
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
                        
                    </div>
                    <page-footer></page-footer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'debtors',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            id: '',
            token: '',
            users: {},
            searchTerm: ''
        }
    },
    created() {
        this.login()
        this.getDebtors()
    },
   
    computed:{
        filterSearch() {
            return this.users.data.filter(debtor => {
                return debtor.user.match(this.searchTerm)
            })
        },
        sumDebtors(){
            let total = 0
            this.users.data.forEach(user => {
                total += parseInt(user.amount)
            });
            return total
        }
    },
    methods:{
        login(){
            if (!User.loggedIn()) {
                this.$router.push({
                    name: '/'
                })
            }else{
                this.token = User.token()
                this.id = User.id()
                
            }
        },
        
        getDebtors() {
            axios.get('/api/v1/debts', {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.users = response.data))
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
