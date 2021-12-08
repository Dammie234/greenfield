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
                                        <h6 class="text-blueGray-700 text-xl font-bold">{{profile.salutation + ' ' + profile.lastname + ' ' + profile.firstname}}'s Tenants </h6>
                                        <button  class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Tenants
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse" v-if="tenants.length != 0">
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
                                                        <router-link :to="{name: 'landlord-tenant', params:{id: tenant.user_id}}" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                            View Profile
                                                        </router-link>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-else>
                                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-600">
                                                <span class="text-xl inline-block mr-5 align-middle">
                                                    <i class="fas fa-bell"></i>
                                                </span>
                                                <span class="inline-block align-middle mr-8">
                                                    <b class="capitalize">Whoops!</b> Landlord has not add tenants.
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
            profile: '',
            tenants: []
        }
    },
    created() {
        this.login()
        this.getProfile()
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
                if(this.middlename == 'null'){
                    this.$router.push({
                        name: 'edit-profile'
                    })
                }
            }
        },
        getProfile() {
            let id = this.$route.params.id
            axios.get("/api/profile/" + id)
                .then(({ data }) => (this.profile = data))
                .catch();
        },
        
        getTenants() {
            let id = this.$route.params.id
            axios.get("/api/tenants/" + id)
                .then(({ data }) => (this.tenants = data))
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
