<template>
    <div>
        <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
            <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
            <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                <i class="fas fa-bars"></i>
            </button>
            <router-link class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" to="/home">
                <img :src="logo" alt="Logo" class="shadow-lg rounded-full max-w-full h-auto align-middle border-none">
                Greenfield Estate
            </router-link>
            <ul class="md:hidden items-center flex flex-wrap list-none">
                
                <li class="inline-block relative">
                    <router-link to="/edit-profile" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Edit Profile</router-link>
                    <router-link to="/profile" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Profile</router-link>
                        
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <router-link to="/logout" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Sign Out</router-link>
                </li>
            </ul>
            <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
                <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                    <router-link class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" to="/home">
                        Greenfield Estate
                    </router-link>
                    </div>
                    <div class="w-6/12 flex justify-end">
                    <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                </div>
                <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    <input type="text" placeholder="Search" class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal">
                </div>
                </form>
                <!-- Divider -->
                <hr class="my-4 md:min-w-full">
                <!-- Heading -->
                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Profile
                </h6>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                    <li class="items-center">
                        <router-link to="/edit-profile" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-user-circle text-blueGray-300 mr-2 text-sm"></i>
                            Edit Profile
                        </router-link>
                    </li>
                    <li class="items-center">
                        <router-link to="/profile" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="far fa-user-circle text-blueGray-300 mr-2 text-sm"></i>
                            Profile
                        </router-link>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-4 md:min-w-full">
                <!-- Heading -->
                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Pages
                </h6>
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <router-link to="/home" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                            Dashboard
                        </router-link>
                    </li>

                    <li class="items-center" v-if="user.role == 2">
                        <router-link to="/property" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-building mr-2 text-sm text-blueGray-300"></i>
                            Properties
                        </router-link>
                    </li>

                    <li class="items-center" v-if="user.role == 2">
                        <router-link to="/apartment" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-house-user mr-2 text-sm text-blueGray-300"></i>
                            Apartments
                        </router-link>
                    </li>

                    <li class="items-center" v-if="user.role == 2">
                        <router-link to="/tenant" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-users mr-2 text-sm text-blueGray-300"></i>
                            Tenants
                        </router-link>
                    </li>
                    <li class="items-center" v-if="user.role == 1">
                        <router-link to="/landlord" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-users mr-2 text-sm text-blueGray-300"></i>
                            Landlords/Landladies
                        </router-link>
                    </li>
                    <li class="items-center" v-if="user.role == 1">
                        <router-link to="/service" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-house-user mr-2 text-sm text-blueGray-300"></i>
                            Services
                        </router-link>
                    </li>
                     <li class="items-center" v-if="user.role == 1">
                        <router-link to="/debtors" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-users mr-2 text-sm text-blueGray-300"></i>
                            Debtors
                        </router-link>
                    </li>
                    <li class="items-center" v-if="user.role == 2 || user.role == 3">
                        <router-link to="/services" class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fas fa-house-user mr-2 text-sm text-blueGray-300"></i>
                            Services
                        </router-link>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full">
                
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                    <li class="items-center">
                        <router-link to="/logout" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-sign-out-alt text-blueGray-300 mr-2 text-sm"></i>
                            Sign Out 
                        </router-link>
                    </li>
                </ul>

                

                
            </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    name: 'sidebar',
    data(){
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            logo: '../assets/img/logo.jpg',
            token: '',
            user: '',
            data: '',

        }
    },
    created(){
        this.login()
        this.getUser()
        this.checkUser()
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
        checkUser(){
            axios.get('/api/v1/check-user/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.data = response.data))
            .catch((error) => {
                console.log(error)
                if (error.response.status == 401) {
                    this.$router.push({
                        name: 'edit-profile'
                    })
                    Toast.fire({
                        icon: 'warning',
                        title: 'Update Account to continue'
                    })
                }
            })
        }
    }
}
</script>