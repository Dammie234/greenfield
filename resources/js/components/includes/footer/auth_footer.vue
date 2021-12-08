<template>
    <div>
        <footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6">
          <div class="container mx-auto px-4">
            <hr class="mb-6 border-b-1 border-blueGray-600" />
            <div
              class="flex flex-wrap items-center md:justify-between justify-center"
            >
              <div class="w-full md:w-4/12 px-4">
                <div
                  class="text-sm text-white font-semibold py-1 text-center md:text-left"
                >
                  Copyright © {{ new Date().getFullYear() }}
                  Greenfield Estate
                  
                </div>
              </div>
              <div class="w-full md:w-8/12 px-4">
                <ul
                  class="flex flex-wrap list-none md:justify-end justify-center"
                >
                  <li>
                        <a href="https://webtagsltd.com.ng/" target="_blank" class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                            Powered by Web Tags Ltd
                        </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
    </div>
</template>
<script>
export default {
    name: 'auth-footer'
}
</script>