<template>
 <section class="bg-purple-500 py-10 px-10 md:px-0">
    <div class="container mx-auto flex flex-col-reverse md:flex-row justify-between text-white md:w-10/12">

      <div class="basis-1/4 p-3">
        <h3 class="text-3xl font-bold mb-3 text-slate-100">Buffex Letters</h3>
        <p class="text-purple-50 mb-5 text-sm">
          Join over 25000 subscribers receiving our newslwtters!
  <br>
Subscribe today and stay up-to-date with the latest news
        </p>
           <div class="mt-4 relative">

            <BreezeInput id="text" type="text" class="mt-1 block w-full rounded-full" placeholder="Your email"   autocomplete="email" />
           <BreezeButtonSmall class="footer absolute  text-slate-100 top-[10%] right-[7px] bg-purple-500 rounded-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Subscribe
            </BreezeButtonSmall>
        </div>


      </div>
       <div  class="basis-1/4 p-3 text-center">
        <h3 class="mb-3  text-slate-100">About us</h3>
       <ul>

 <Link href="/"> <li class="text-purple-50 text-sm ">Our Company</li></Link>
        <Link href="/#products"> <li class="text-purple-50 text-sm">Our Products</li></Link>
        <Link  href="/#partners">    <li class="text-purple-50 text-sm">Our Partners</li></Link>
           <Link  href="/#testimoials">    <li class="text-purple-50 text-sm">Testimonials</li></Link>
             <Link  href="/blogs">     <li class="text-purple-50 text-sm">Blogs</li></Link>
               <Link  href="/#faqs">      <li class="text-purple-50 text-sm">FAQs</li></Link>
                <Link  href="/#contact">      <li class="text-purple-50 text-sm">Contact</li></Link>
       </ul>
      </div >
        <div  class="basis-1/4 p-3 text-center">
        <h3 class="mb-3  text-slate-100"> Legal</h3>
        <p class="text-purple-50 text-sm">Terms of use</p>
        <p class="text-purple-50 text-sm">Terms and Conditions</p>
        <p class="text-purple-50 text-sm">Privacy policy</p>
        <p class="text-purple-50 text-sm">Cookie policy</p>
      </div>
         <div  class="basis-1/4 p-3 text-center">
        <h3 class="mb-3  text-slate-100"> Community</h3>
        <div class="flex flex-row md:flex-col">
          <p class=" w-12 mb-1 mx-auto"><img src="/images/fb.png"/></p>
        <p class="w-12 mb-1 mx-auto"><img src="/images/insta.png"/></p>
        <p class="w-12 mb-1 mx-auto"><img src="/images/gram.png"/></p>
        <p class="w-12 h-auto mx-auto"><img src="/images/twitter.png"/></p>
        </div>
      </div>
    </div>
    <hr>
    <div class="text-center text-slate py-2">
      <span class="text-purple-50">Made with love by Buffex Nigeria Limited</span>
    </div>
    <div class="text-center py-2">
      <small class="text-purple-50"> Copyright &#169;{{new Date().getFullYear()}} buffex.co. All rights reserved  </small>

    </div>
 </section>
</template>
<style scoped lang="scss">

</style>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BreezeButtonSmall from '@/Components/ButtonSmall.vue'
import BreezeInput from '@/Components/Input.vue'
export default {
components:{
  Link,
  BreezeButtonSmall,
  BreezeInput
},
 data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },
}
</script>