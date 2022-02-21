<template lang="">
 <section class="relative h-full " id="contact">
    <div class="container mx-auto h-full w-full pt-20 text-center p-3">
      <h1 class="text-4xl font-bold text-center mb-4">Contact Us</h1>
      <p class="mb-3">Thank you for stopping by. <br>
We appreciate you and would love to hear from you.

</p>
<p class="mb-8">
  Do you have any questions? Comments? Suggestions?<br>
Leave a message and we will get back to you shortly.
</p>
    <div class="mb-5 relative flex flex-col md:flex-row w-full ">
      <div class="md:w-3/6 md:p-16 mb-10 md:mb-5">
 <BreezeValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>

            <BreezeInput id="name" type="text" class="mt-1 block w-full" placeholder="Name" v-model="form.name" required  autocomplete="name" />
        </div>

        <div class="mt-4">

            <BreezeInput id="email" type="email" class="mt-1 block w-full" placeholder="Email"  v-model="form.email" required autocomplete="email" />
        </div>

        <div class="mt-4">

            <BreezeInput id="phone" type="text" class="mt-1 block w-full" placeholder="Phone number"  v-model="form.phone" required autocomplete="phoned" />
        </div>

         <div class="mt-4">

            <BreezeTextarea id="complaint" type="text" class="mt-1 block w-full" placeholder="Message"  v-model="form.message" required autocomplete="complaints" > </BreezeTextarea>
        </div>


        <div class="flex justify-center mt-4">


            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Submit
            </BreezeButton>
        </div>
    </form>
      </div>
       <div class="md:w-3/6 md:p-16 chatter relative ">
       <div class="mb-3">
         <h2 class="font-bold">Talk to us on:</h2>
       <ul>
         <!-- <li>Call: +233 54 380 6578</li>
<li>Text:+233 54 380 6578</li> -->
<li>Email: info@buffex.co</li>
       </ul>
       </div>

        <div>
         <h2 class="font-bold">Connect on socials:</h2>
       <ul>
         <li>Facebook: mybuffex
</li>
<li>Instagram: mybuffex
</li>
<!-- <li>Twitter: @buffex_
</li>
<li>Telegram: @buffex</li> -->
       </ul>
       </div>

      </div>

    </div>

  </div>

 </section>
</template>
<script>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeTextarea from "@/Components/Textarea.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    BreezeTextarea,
    Head,
    Link,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        phone: "",
        message: "",
      }),
    };
  },
};
</script>
<style lang="scss" scoped>
section {
  background: #f5f2ff;

  .container {
    background-image: url("/images/b.png");
    background-repeat: no-repeat;
    background-position: left;
    background-size: contain;
  }
}
.banner_b {
  transform: translateX(-50%);
}
.line_1 {
  position: absolute;
  top: 23rem;
  left: 8rem;
}
.line_2 {
  position: absolute;
  left: 38%;
  top: 15rem;
}
.line_3 {
  position: absolute;
  top: 15rem;
  right: 7rem;
  transform: rotate(27deg);
}
.plane {
  position: absolute;
  right: 5px;
  top: 14rem;
}
.chatter {
  background-image: url("/images/chat.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  min-height: 300px;
}
</style>