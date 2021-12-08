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
                                        <h6 class="text-blueGray-700 text-xl font-bold">{{landlord.salutation + ' ' + landlord.lastname + ' '  + landlord.firstname}}'s Tenant </h6>
                                        <button class="bg-light-green text-white active:bg-light-green font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                                            Tenant
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">User Information</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Name</strong>{{profile.salutation + ' ' + profile.lastname + ' ' + profile.middlename + ' ' + profile.firstname}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Email Address</strong>{{profile.email}}</td>
                                        </tr>
                                    </table>
                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Biodata</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Gender</strong>{{profile.gender}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Date of Birth</strong>{{profile.date_of_birth | moment("Do, MMMM")}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Religion</strong>{{profile.religion}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Occupation</strong>{{profile.occupation}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Nationality</strong>{{profile.nationality}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Are you a Resident?</strong><span v-if="profile.are_you_a_resident == 1">Yes</span><span v-else>No</span></td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Date Moved In</strong>{{profile.date_moved_in | moment('Do MMMM YYYY')}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Marital Status</strong>{{profile.marital_status }}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4" v-if="profile.marital_status == 'Married'"><strong>Name of Spouse</strong>{{profile.name_of_spouse}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4" v-if="profile.marital_status == 'Married'"><strong>Wedding Aniversary Date</strong>{{profile.wedding_aniversary_date | moment("Do, MMMM")}}</td>
                                            
                                        </tr>
                                    </table>
                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Contact Information</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Phone (Mobile)</strong>{{profile.mobile_phone}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Phone (Home)</strong>{{profile.phone_number_home}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Phone (Whats App)</strong>{{profile.phone_number_whatsapp}}</td>
                                        </tr>
                                    </table>
                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Next of Kin Information</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Next of Kin</strong>{{profile.next_of_kin}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Relationship with Next of Kin</strong>{{profile.relationship_with_next_of_kin}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Next of Kin Phone Number</strong>{{profile.next_of_kin_phone_number}}</td>
                                        </tr>
                                    </table>
                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Third Party Information</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Third Party Name</strong>{{profile.third_party_name}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Third Party Email Address</strong>{{profile.third_party_email}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Third Party Phone Number</strong>{{profile.third_party_phone}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Third Party WhatsApp Number</strong>{{profile.third_party_whatsapp}}</td>
                                        </tr>
                                    </table>
                                    
                                    <hr class="mt-6 border-b-1 border-blueGray-300" >
                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Landlord/Landlady Information</h6>
                                    <table class="items-center w-full bg-transparent border-collapse">
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Name</strong>{{landlord.salutation  + ' ' + landlord.lastname + ' ' + landlord.middlename + ' ' + landlord.firstname}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Email Address</strong>{{profile.email}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Mobile Phone Number</strong>{{landlord.mobile_phone}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Address</strong>{{landlord.house_number + ', ' + landlord.street_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Property</strong>{{landlord.property_class}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Category</strong>{{landlord.property_category}}</td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4"><strong>Type</strong>{{landlord.property_type}}</td>
                                            <td></td>
                                        </tr>
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
    name: 'edit profile',
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
            landlord: ''
            
        }
    },
    created() {
        this.login()
        this.getTenantProfile()
        this.getTenantLandlord()
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
        getTenantProfile() {
            let id = this.$route.params.id
            axios.get("/api/tenant-profile/" + id)
                .then(({ data }) => (this.profile = data))
                .catch();
        },
        getTenantLandlord() {
            let id = this.$route.params.id
            axios.get("/api/tenant-landlord/" + id)
                .then(({ data }) => (this.landlord = data))
                .catch();
        }
    }
}
</script>

<style scoped>
table tr td strong{
    display:block;
    font-size: 12px;
}
</style>
