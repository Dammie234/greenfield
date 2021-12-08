<template>
    <div>
         <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <router-link class="text-white text-sm uppercase hidden lg:inline-block font-semibold" to="/home" v-if="role == 1">Hello Administrator</router-link>
                <router-link class="text-white text-sm uppercase hidden lg:inline-block font-semibold" to="/home" v-else>Hello {{lastname + ' ' + firstname}}</router-link>
                
                <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                    <div class="items-center flex">
                    <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" :src="'../' + team1"></span>
                    </div>
                </a>
                <div class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 hidden" id="user-dropdown" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(861px, 64px);" data-popper-reference-hidden="" data-popper-escaped="">
                    <router-link to="/edit-profile" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Edit Profile</router-link>
                    <router-link to="/profile" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Profile</router-link>
                    
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <router-link to="/logout" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Sign Out</router-link>
                </div>
                </ul>
            </div>
        </nav>
    </div>
</template>
<script>

export default {
    name: 'home',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            lastname: '',
            middlename: '',
            firstname: '',
            id: '',
            role: ''
        }
    },
    created() {
        this.login()
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
            }
        }
    }
}
</script>

<style scoped>

</style>