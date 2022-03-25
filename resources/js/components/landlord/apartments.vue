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
                                        <h6 class="text-blueGray-700 text-xl font-bold">{{profile.salutation + ' ' + profile.lastname + ' ' + profile.firstname}}'s Apartments </h6>
                                        <button  class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Apartments
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <div v-if="apartments.length != 0">
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
                                                </table>
                                            </div>
                                        </div>
                                        <div v-else>
                                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-600">
                                                <span class="text-xl inline-block mr-5 align-middle">
                                                    <i class="fas fa-bell"></i>
                                                </span>
                                                <span class="inline-block align-middle mr-8">
                                                    <b class="capitalize">Whoops!</b> Landlord has not add apartments.
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
    name: 'apartment',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            id: '',
            token: '',
            profile: '',
            apartments: []
        }
    },
    created() {
        this.login()
        this.getLandlord()
        this.getApartments();
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
        getLandlord() {
            let id = this.$route.params.id
            axios.get('/api/v1/get-profile/' + id, {
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
        
        getApartments() {
            let id = this.$route.params.id
            axios.get('/api/v1/user-apartments/' + id, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.apartments = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'logout'
                    })
                }
            })
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
