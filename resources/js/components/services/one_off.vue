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
    name: 'one-off-service',
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
                name:'',
                amount:'',
                
            },
            service: '',
            total: 0
        }
    },
    created() {
        this.login()
        this.getOneOffService()
        this.getService()
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
        
        getOneOffService() {
            let id = this.$route.params.id
            axios.get("/api/one-off-services/" + id)
                .then(({ data }) => (this.form = data))
                .catch();
        },
        getService() {
            let id = this.$route.params.id
            axios.get("/api/one-off-services/" + id)
                .then(({ data }) => (this.service = data))
                .catch();
        }
    }
}
</script>

<style scoped>

</style>
