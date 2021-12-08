<template>
    <div>
        <nav
      class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
    >
        <div
            class="container px-4 mx-auto flex flex-wrap items-center justify-between"
        >
            <div
            class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
            >
            <router-link
                class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                to="/"
                ><img :src="logo" alt="" style="height:90px;"></router-link>
            ><button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                onclick="toggleNavbar('example-collapse-navbar')"
            >
                <i class="text-white fas fa-bars"></i>
            </button>
            </div>
            <div
            class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
            id="example-collapse-navbar"
            >
            
            <ul
                class="flex flex-col lg:flex-row list-none lg:ml-auto items-center"
            >
                
                <li class="flex items-center">
                    <router-link to="/login" target="_blank"
                        class="bg-white text-blueGray-700 active:bg-blueGray-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                        
                    >
                        <i class="fas fa-sign-in-alt"></i> Login
                    </router-link>
                </li>
                <li class="flex items-center">
                    <router-link to="/register" target="_blank"
                        class="bg-light-green text-white active:bg-blueGray-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                        
                    >
                        <i class="fas fa-user-plus"></i> Register as a Landlord/Landlady
                    </router-link>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <main>
        <div
            class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75"
        >
            <div
            class="absolute top-0 w-full h-full bg-center bg-cover"
            style="
                background-image: url('assets/img/houses.jpeg');
            "
            >
            <span
                id="blackOverlay"
                class="w-full h-full absolute opacity-50 bg-black"
            ></span>
            </div>
            <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div class="pr-12">
                    <h1 class="text-white font-semibold text-5xl">
                        Welcome to Greenfield Estate
                    </h1>
                    <p class="mt-4 text-lg text-blueGray-200">
                    This is a simple website that helps you manage your property has a landlord/landlady. The landlord/landlady can add their property,
                    add their apartments and their tenants. The added tenants can as well login to pay their services.
                    </p>
                </div>
                </div>
            </div>
            </div>
            <div
            class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
            style="transform: translateZ(0px)"
            >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                class="text-blueGray-200 fill-current"
                points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
            </div>
        </div>
        <section class="pb-20 bg-blueGray-200 -mt-18">
            <div class="container mx-auto px-4">
            
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <div
                    class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white"
                >
                    <i class="fas fa-user-friends text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 font-semibold leading-normal">
                    Procedures as a Landlord/Landlady
                </h3>
                <p
                    class="text-lg font-light leading-relaxed mt-4 mb-4 text-blueGray-600"
                >
                    These are the procedures you need to follow as a guide to get register and use the website.
                </p>
                <ul class="list-none mt-6">
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-mouse-pointer"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">
                            Click on the Register button
                            </h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-user-plus"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Create an account by providing the details for the form fields and click Create Account</h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-user"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Update your your profile if it is the first time.</h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-building"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Add your property by clicking on Properties on the right sidebar.</h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-house-user"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Add your apartments by clicking on Apartments on the right sidebar.</h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-users"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Add your tenants by clicking on Tenants on the right sidebar.</h4>
                        </div>
                        </div>
                    </li>
                    </ul>
                    <router-link to="/register" target="_blank" class="font-bold text-blueGray-700 mt-8"
                    >Click here to register</router-link>
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-500"
                >
                    <img
                    alt="..."
                    :src="landlord"
                    class="w-full align-middle rounded-t-lg"
                    />
                    <blockquote class="relative p-8 mb-4">
                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 583 95"
                        class="absolute left-0 w-full block h-95-px -top-94-px"
                    >
                        <polygon
                        points="-30,95 583,95 583,65"
                        class="text-pink-500 fill-current"
                        ></polygon>
                    </svg>
                    <h4 class="text-xl font-bold text-white">
                        Landlord/Landlady Registration Procedures
                    </h4>
                    <p class="text-md font-light mt-2 text-white">
                        Follow the procedures as a Landlord/Landlady to Register on the website.
                    </p>
                    </blockquote>
                </div>
                </div>
            </div>
            </div>
        </section>
        <section class="relative py-20">
            <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
            style="transform: translateZ(0px)"
            >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                class="text-white fill-current"
                points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
            </div>
            <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                <img
                    alt="..."
                    class="max-w-full rounded-lg shadow-lg"
                    :src="tenant"
                />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                <div class="md:pr-12">
                    <div
                    class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
                    >
                    <i class="fas fa-users text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-semibold">Procedures as a Tenant</h3>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                     These are the procedures you need to follow as a guide to get register and use the website. The tenants are added by the landlord/landlady. So, the tenants
                     have account once the landlord/landlady has added the tenants. The login details are also provided by the landlord/landlady.
                    </p>
                    <ul class="list-none mt-6">
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-sign-in-alt"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">
                            Click the login button to login.
                            </h4>
                        </div>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="flex items-center">
                        <div>
                            <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                            ><i class="fas fa-user"></i
                            ></span>
                        </div>
                        <div>
                            <h4 class="text-blueGray-500">Update your profile if it is your first time.</h4>
                        </div>
                        </div>
                    </li>
                    
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </section>
        <section class="pt-20 pb-48 bg-blueGray-800">
            <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                <h2 class="text-4xl font-semibold" style="color:#fff;">Here are our heroes</h2>
                <p class="text-lg leading-relaxed m-4" style="color:#fff;">
                    For the administration of the estate, here are the list of our frontline administrator.
                </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                <div class="px-6">
                    <img
                    alt="..."
                    :src="team1"
                    class="shadow-lg rounded-full mx-auto max-w-120-px"
                    />
                    <div class="pt-6 text-center">
                    <h5 class="text-xl font-bold" style="color:#fff;">Ryan Tompson</h5>
                    <p class="mt-1 text-sm text-blueGray-400 uppercase font-semibold">
                        Web Developer
                    </p>
                    
                    </div>
                </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                <div class="px-6">
                    <img
                    alt="..."
                    :src="team2"
                    class="shadow-lg rounded-full mx-auto max-w-120-px"
                    />
                    <div class="pt-6 text-center">
                    <h5 class="text-xl font-bold" style="color:#fff;">Romina Hadid</h5>
                    <p
                        class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                    >
                        Marketing Specialist
                    </p>
                    
                    </div>
                </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                <div class="px-6">
                    <img
                    alt="..."
                    :src="team3"
                    class="shadow-lg rounded-full mx-auto max-w-120-px"
                    />
                    <div class="pt-6 text-center">
                    <h5 class="text-xl font-bold" style="color:#fff;">Alexa Smith</h5>
                    <p
                        class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                    >
                        UI/UX Designer
                    </p>
                    
                    </div>
                </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                <div class="px-6">
                    <img
                    alt="..."
                    :src="team3"
                    class="shadow-lg rounded-full mx-auto max-w-120-px"
                    />
                    <div class="pt-6 text-center">
                    <h5 class="text-xl font-bold" style="color:#fff;">Jenna Kardi</h5>
                    <p
                        class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                    >
                        Founder and CEO
                    </p>
                    
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        
        </main>
        <footer class="relative bg-blueGray-200 pt-8 pb-6">
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
            style="transform: translateZ(0px)"
        >
            <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
            >
            <polygon
                class="text-blueGray-200 fill-current"
                points="2560 0 2560 100 0 100"
            ></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap text-center lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                Find us on any of these platforms, we respond 1-2 business days.
                </h5>
                
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                    <span
                    class="block uppercase text-blueGray-500 text-sm font-semibold mb-2"
                    >Useful Links</span
                    >
                    <ul class="list-unstyled">
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.creative-tim.com/presentation?ref=njs-landing"
                        >About Us</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://blog.creative-tim.com?ref=njs-landing"
                        >Blog</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.github.com/creativetimofficial?ref=njs-landing"
                        >Github</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-landing"
                        >Free Products</a
                        >
                    </li>
                    </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                    <span
                    class="block uppercase text-blueGray-500 text-sm font-semibold mb-2"
                    >Other Resources</span
                    >
                    <ul class="list-unstyled">
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-landing"
                        >MIT License</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/terms?ref=njs-landing"
                        >Terms &amp; Conditions</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/privacy?ref=njs-landing"
                        >Privacy Policy</a
                        >
                    </li>
                    <li>
                        <a
                        class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/contact-us?ref=njs-landing"
                        >Contact Us</a
                        >
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
            <hr class="my-6 border-blueGray-300" />
            <div
            class="flex flex-wrap items-center md:justify-between justify-center"
            >
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year"></span> Greenfield Estate by
                <a
                    href="https://webtagsltd.com.ng" target="_blank"
                    class="text-blueGray-500 hover:text-blueGray-800"
                    >Web Tags Ltd</a>.
                </div>
            </div>
            </div>
        </div>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'home page',
    data(){
        return {
            team1: 'assets/img/team-1-800x800.jpg',
            team2: 'assets/img/team-2-800x800.jpg',
            team3: 'assets/img/team-3-800x800.jpg',
            team4: 'assets/img/team-4-470x470.jpg',
            logo: 'assets/img/logo.jpg',
            landlord: 'assets/img/landlord.jpg',
            tenant: 'assets/img/tenant.jpg'
        }
    }
}
</script>