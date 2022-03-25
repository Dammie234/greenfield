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
                                        <h6 class="text-blueGray-700 text-xl font-bold">Landlords/Landladies </h6>
                                        <input type="text" v-model="searchTerm" placeholder="Search Landlord/Landlady Surname..." class="px-3 py-3 placeholder-blueGray-900 text-blueGray-900 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full md:w-4/12 pl-10">
                                        
                                        
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
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
                                                WhatsApp
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Gender
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Address
                                            </th>
                                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="profile.role == 1">
                                            <tr v-for="(landlord, index) in filterSearch" :key="index">
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
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <router-link :to="{name: 'landlord-profile', params:{id: landlord.id}}" class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" title="View Profile">
                                                        <i class="fa fa-user"></i>
                                                    </router-link>
                                                    <router-link :to="{name: 'landlord-properties', params:{id: landlord.id}}" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" title="View Properties">
                                                        <i class="fa fa-home"></i>
                                                    </router-link>
                                                    <router-link :to="{name: 'landlord-apartments', params:{id: landlord.id}}" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" title="View Apartments">
                                                        <i class="fa fa-home"></i>
                                                    </router-link>
                                                    <router-link :to="{name: 'landlord-tenants', params:{id: landlord.id}}" class="bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" title="View Tenants">
                                                        <i class="fa fa-house-user"></i>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
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
    name: 'landlord',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            id: '',
            token: '',
            landlords: [],
            searchTerm: '',
            profile: ''
        }
    },
    created() {
        this.login()
        this.getProfile()
        this.getLandlords()
    },
    computed: {
        filterSearch() {
            return this.landlords.filter(landlord => {
                return landlord.lastname.match(this.searchTerm)
            })
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
        getProfile() {
             axios.get('/api/v1/profile/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.profile = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
        },
        getLandlords() {
             axios.get('/api/v1/landlords', {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.landlords = response.data))
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

</style>
