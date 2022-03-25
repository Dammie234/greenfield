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
                                        <h6 class="text-blueGray-700 text-xl font-bold">Have you add your property? </h6>
                                        <button @click.prevent="addProperty" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Click here to Add
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <form v-if="add_property == true" @submit.prevent="store">
                                        <div class="loader" v-if="loading == true"></div>
                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Address</h6>
                                        <div :disabled="loading">
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">House Number</label>
                                                        <input v-model="form.house_number" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.house_number"> {{ errors.house_number[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-6/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Street Name
                                                        </label>
                                                        <input v-model="form.street_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.street_name"> {{ errors.street_name[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">

                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Property Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Class
                                                        </label>
                                                        <select v-model="form.property_class" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(property_class, index) in classes" :key="index" :value="property_class">{{property_class}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_class"> {{ errors.property_class[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Category
                                                        </label>
                                                        <select v-model="form.property_category" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(category, index) in categories" :key="index" :value="category">{{category}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_category"> {{ errors.property_category[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Type
                                                        </label>
                                                        <select v-model="form.property_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <optgroup v-if="form.property_category == 'Residential'">
                                                                <option  v-for="(residential, index) in residentials" :key="index" :value="residential">{{residential}}</option>
                                                            </optgroup>
                                                            <optgroup v-else-if="form.property_category == 'Commercial'">
                                                                <option  v-for="(commercial, index) in commercials" :key="index" :value="commercial">{{commercial}}</option>
                                                            </optgroup>
                                                            <optgroup v-else>
                                                                <option value="">Select the Property Category First</option>
                                                            </optgroup>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_type"> {{ errors.property_type[0] }} </small>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <input type="submit" value="Submit" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        <button @click="addProperty" class="bg-teal-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-wrap" v-if="properties.length != 0">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">My Properties </h6>
                                        <button  class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Properties
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <div class="block w-full overflow-x-auto mt-2">
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Address</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Property Class</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Property Category</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Property Type</th>
                                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(property, index) in properties" :key="index">
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{property.house_number + ', ' + property.street_name}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{property.property_class}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{property.property_category}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">{{property.property_type}}</td>
                                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                                        <button @click.prevent="editProperty(property.id)" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                                            <i class="fas fa-edit"></i> Edit 
                                                        </button>
                                                        <button @click="deleteProperty(property.id)" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
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
                    <div class="flex flex-wrap"  v-if="edit_property == true">
                        <div class="w-full px-4">
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                <div class="rounded-t bg-white mb-0 px-6 py-6">
                                    <div class="text-center flex justify-between">
                                        <h6 class="text-blueGray-700 text-xl font-bold">It seems there is an error, edit now </h6>
                                        <button @click.prevent="closeProperty" class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Click here to Close
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <form @submit.prevent="update">
                                        <div class="loader" v-if="loading == true"></div>
                                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Address</h6>
                                        <div :disabled="loading">
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-3/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">House Number</label>
                                                        <input v-model="form.house_number" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.house_number"> {{ errors.house_number[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-6/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Street Name
                                                        </label>
                                                        <input v-model="form.street_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                        <small class="text-danger" style="color:#f00" v-if="errors.street_name"> {{ errors.street_name[0] }} </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-6 border-b-1 border-blueGray-300">

                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Property Information</h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Class
                                                        </label>
                                                        <select v-model="form.property_class" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(property_class, index) in classes" :key="index" :value="property_class">{{property_class}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_class"> {{ errors.property_class[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Category
                                                        </label>
                                                        <select v-model="form.property_category" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <option v-for="(category, index) in categories" :key="index" :value="category">{{category}}</option>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_category"> {{ errors.property_category[0] }} </small>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                            Property Type
                                                        </label>
                                                        <select v-model="form.property_type" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                                            <optgroup v-if="form.property_category == 'Residential'">
                                                                <option  v-for="(residential, index) in residentials" :key="index" :value="residential">{{residential}}</option>
                                                            </optgroup>
                                                            <optgroup v-else-if="form.property_category == 'Commercial'">
                                                                <option  v-for="(commercial, index) in commercials" :key="index" :value="commercial">{{commercial}}</option>
                                                            </optgroup>
                                                            <optgroup v-else>
                                                                <option value="">Select the Property Category First</option>
                                                            </optgroup>
                                                        </select>
                                                        <small class="text-danger" style="color:#f00" v-if="errors.property_type"> {{ errors.property_type[0] }} </small>
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
    name: 'property',
    data() {
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: '../../assets/img/team-2-800x800.jpg',
            token: '',
            form:{
                token: null,
                house_number: null,
                street_name: null,
                property_class: null,
                property_category: null,
                property_type: null
            },
            profile: '',
            loading: false,
            errors: {},
            error:false,
            add_property:false,
            edit_property:false,
            property_id: '',
            classes: ['Stand alone Private Residential', 'Private & Commercial Joint', 'Fully Commerial'],
            categories: ['Residential', 'Commercial'],
            residentials: ['Flat', 'Block of Flat', 'Semi-detached House', 'Terraced House', 'Bungalow', 'Town House', 'Developing'],
            commercials: ['Shopping Complex', 'Plaza', 'Hotel', 'Hall', 'Event Centre', 'School', 'Church', 'Mosque', 'Warehouse', 'Developing'],
            properties: []
        }
    },
    created() {
        this.login()
        this.getProfile()
        this.getProperties()
    },
    methods:{
        login(){
            if (!User.loggedIn()) {
                this.$router.push({
                    name: '/'
                })
            }else{
                this.token = User.token()
                this.form.token = User.token()
                
            }
        },
        getProfile(){
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
        addProperty(){
            if (this.add_property == false) {
                this.add_property = true
            }else{
                this.add_property = false
            }
        },
        editProperty(id){
            if (this.edit_property == false) {
                this.edit_property = true
                this.property_id = id
                
                axios.get('/api/v1/property/' + this.property_id, {
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
        },
        closeProperty(){
            this.edit_property = false
            this.property_id = ''
            this.form = {
                token: null,
                house_number: null,
                street_name: null,
                property_class: null,
                property_category: null,
                property_type: null
            }
        },
        store() {
            this.loading = true
            this.form.token = this.token
            axios.post('/api/property', this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.$router.push({
                        name: 'property'
                    })
                    this.add_property = false
                    this.getProperties()
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        update() {
            this.loading = true
            axios.patch('/api/property/' + this.property_id, this.form)
                .then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully Done'
                    })
                    this.$router.push({
                        name: 'property'
                    })
                    this.add_property = false
                    this.edit_property = false
                    this.property_id = ''
                    this.getProperties()
                })
                .catch(error => this.errors = error.response.data.errors)
                .finally(() => {
                    this.loading =  false
                }) 
        },
        deleteProperty(id) {
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
                    axios.delete('/api/property/' + id)
                        .then(() => {
                            this.properties = this.properties.filter(property => {
                                return property.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({
                                name: 'property'
                            })
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
        getProperties(){
            axios.get('/api/v1/properties/' + this.token, {
                headers: {
                    Authorization: 'Bearer ' + this.token,
                    Accept: 'application/json'
                }
           }).then(response => (this.properties = response.data))
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
table tr td strong{
    display:block;
    font-size: 12px;
}
</style>
