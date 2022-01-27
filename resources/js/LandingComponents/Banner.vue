<template>
 <section id="banner" class="relative">
    <div class="container mx-auto flex h-full w-full">
      <div class="left_banner w-full md:w-3/6 h-full flex flex-col justify-center py-5 px-14">

      <div class="banner_h text-center transition ease-in-out">
        <img src="/images/topb.png" alt="freedom" class="mx-auto">
      </div>
        <div class="banner_m  text-center md:text-left">
          <p class="font-bold"><span class="text-purple-500 font-bold">Buffex</span> provides unique consumer-centric <br> <span  class="text-purple-500 font-bold">Digital Financial Services</span> built around <br>  <span  class="text-purple-500 font-bold">blockchain</span> and <span  class="text-purple-500 font-bold">digital currencies</span>.</p>
        </div>
          <div class="banner_b text-center ">
            <BreezeButton class="bg-purple-800 text-white">Register now</BreezeButton>
          </div>
      </div>
        <div class="right_banner hidden md:block md:w-3/6 h-full p-5 md:pt-16 pl-14 relative flex items-center">
       <div class="">
          <!-- <div class="search flex items-center">

            <BreezeInput id="search" type="text" placeholder="Type in search" class="mt-1 block w-full mr-5 " required  autocomplete="search" />
             <BreezeDropdown align="center" width="30">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                              En

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <BreezeDropdownLink  as="button">
                                           En
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
        </div> -->
                <div class="flex justify-between items-center w-3/6">
                  <span>
                    <img  src="/images/banner1.png" class="w-28 hover:motion-safe:animate-wiggle"/>
                  </span>
                   <span>
                   <img  src="/images/banner2.png"  class="w-36 hover:motion-safe:animate-wiggle"/>
                  </span>
                </div>
                 <div class="flex justify-between items-center w-2/3">
                  <span>
                   <img  src="/images/banner3.png" class="w-44 hover:motion-safe:animate-wiggle"/>
                  </span>
                   <span>
                   <img  src="/images/banner4.png" class="w-36 hover:motion-safe:animate-wiggle"/>
                  </span>
                </div>
                 <div class="flex justify-between items-center   w-3/4 ">
                  <span>
                   <img  src="/images/banner5.png" class="w-40 hover:motion-safe:animate-wiggle"/>
                  </span>
                   <span>
                   <img  src="/images/banner6.png" class="w-52 hover:motion-safe:animate-wiggle"/>
                  </span>
                </div>
                 <div class="">
                  <span>
                   <img  src="/images/banner7.png" class="w-52 hover:motion-safe:animate-wiggle"/>
                  </span>

                </div>

       </div>
        </div>

  </div>
 </section>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
export default {
components:{
  Link,
  BreezeButton,
  BreezeInput,
  BreezeLabel,
  BreezeDropdown,
  BreezeDropdownLink
}
}
</script>
<style scoped lang="scss">
#banner{
  height: 85vh;
  background: #F5F2FF;
  .container .left_banner{

 background-image: url('/images/b.png');
 background-repeat: no-repeat;
 background-position:center;
 background-size:60%;

  }

}
.banner_h{
  margin-bottom: 4rem;
}
.banner_m{
  margin-bottom: 4rem;
  p{
    font-size:1.4rem
  }
}
.right_banner{

}
.search{
  position: absolute;
  top:8%;
  left:20%;
}
</style>