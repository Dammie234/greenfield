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
                    <h4 class="text-blueGray-500 text-lg font-bold">
                      Sign in
                    </h4>
                  </div>
                  
                  <hr class="mt-6 border-b-1 border-blueGray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <div v-if="error == true">
                    <div class="alert alert-danger" style="color:#f00">
                      <strong>Whoops!</strong> Invalid Email or Password
                    </div>
                  </div>
                  <form @submit.prevent="login">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        for="grid-password"
                        >Email</label
                      ><input
                        type="email"
                        v-model="form.email"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Email"
                      />
                          <small v-if="errors.length !== 0"><span style="color:#f00" v-for="(err, index) in errors" :key="index">{{err.email[0]}}</span></small>
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        for="grid-password"
                        >Password</label
                      ><input
                        type="password" v-model="form.password"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Password"
                      />
                          <small v-if="errors.length !== 0"><span style="color:#f00" v-for="(err, index) in errors" :key="index">{{err.password[0]}}</span></small>
                    </div>
                    <div>
                      <label class="inline-flex items-center cursor-pointer"
                        ><input
                          id="customCheckLogin"
                          type="checkbox"
                          class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                        /><span
                          class="ml-2 text-sm font-semibold text-blueGray-600"
                          >Remember me</span
                        ></label
                      >
                    </div>
                    <div class="text-center mt-6">
                      <button
                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                        type="submit"
                      >
                        Sign In
                      </button>
                    </div>
                  </form>
                  <div class="flex flex-wrap mt-6">
                    <div class="w-1/2">
                        <router-link to="/forget" class="text-blueGray-200" style="color:#000;"> <small>Forget password?</small> </router-link>
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
    name: 'login',
    created() {
        if (User.loggedIn()) {
            this.$router.push({
                name: 'home'
            })
        }
    },

    data() {
        return {
            backgroundUrl: 'assets/img/register_bg_2.png',
            form: {
                email: null,
                password: null
            },
            errors: {},
            error:false,
            loading:false
        }
    },
    methods: {
        login() {
            this.loading = true
            axios.post('/api/auth/login', this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                    this.$router.push({
                        name: 'home'
                    })
                })
                .catch((error) => {
                    this.error = true;
                    console.log(error)
                    if (error.response.status == 422) {
                      this.errors = []
                      this.errors.push(error.response.data.errors);
                    }
                }).finally(() => {
                    this.loading =  false
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
