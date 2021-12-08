<template>
<div>
    <nprogress-container></nprogress-container>
    <section class="relative w-full h-full py-40 min-h-screen">
        <div
          class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
          :style="{ backgroundImage: `url(${backgroundUrl})` }"
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                      Forget Password
                    </h6>
                  </div>
                  
                  <hr class="mt-6 border-b-1 border-blueGray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <div v-if="errors.length > 0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" v-for="error in errors" :key="errors.indexOf(error)">
                        <strong>Whoops!</strong> {{error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="success == true">
                    <strong>Success!</strong> {{success}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                  <form @submit.prevent="forgetPassword">
                     <div class="loader" v-if="loading == true"></div> 
                    <div class="relative w-full mb-3" :disabled="loading">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        for="grid-password"
                        >Email</label
                      ><input
                        type="email"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Email" v-model="form.email"
                      />
                    </div>
                    
                    <div class="text-center mt-6">
                      <button
                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                        type="submit"
                      >
                        Forgot Password
                      </button>
                    </div>
                  </form>
                  <div class="flex flex-wrap mt-6">
                    <div class="w-1/2">
                        <router-link to="/" class="text-blueGray-200" style="color:#000;"> <small>Already have an account?</small> </router-link>
                    </div>
                    <div class="w-1/2 text-right">
                        <router-link to="/register" class="text-blueGray-200" style="color:#000;"><small>Create new account</small></router-link>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <auth-footer></auth-footer>
      </section>
</div>
</template>

<script>
export default {
    name: 'forgor',
    created() {
        
    },

    data() {
        return {
            backgroundUrl: 'assets/img/register_bg_2.png',
            form: {
                email: ''
            },
            errors: {},
            error: false,
            loading:false,
            success: ''
        }
    },
    methods: {
        forgetPassword() {
            this.errors = []
            this.loading = true
            axios.post('/api/auth/forgot-password', this.form)
                .then(res => {
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Password link to your email Successful'
                    });
                    this.success = 'Password link to your email Successful';
                    
                })
                .catch((error) => {
                    this.error = true;
                    console.log(error)
                    if (error.response.status == 401) {
                      this.errors.push(error.response.data.error);
                    }
                }).finally(() => {
                    this.loading =  false
                })
        }
    }
}
</script>

<style scoped>

</style>
