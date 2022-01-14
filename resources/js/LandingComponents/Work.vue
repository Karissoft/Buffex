<template lang="">
 <section class="relative h-full md:h-[95vh] pb-10">
    <div class="container mx-auto h-full w-full pt-10 md:pt-20 p-4">
      <h1 class="text-2xl md:text-4xl font-bold text-center">How does it work?</h1>
    <div class="mb-5 relative pl-8 md:pl-0">

       <div class="flex justify-between items-center"> <span class="text_work text-sm md:text-2xl font-bold">
            Using Buffex is as easy as A, B, C</span>

      <div class="text_img mb-5 md:mb-0">
        <img src="/images/world.svg" class="w-52 md:w-80"/>
      </div></div>
      <div class="text_signup md:absolute mb-5 md:mb-0 md:top-72">

            <BreezeButton class="bg-white">Sign up</BreezeButton>
            <ul class="mt-5">
              <li>Easy set-up
                </li>
                <li>No long forms
                </li>
                <li>Choose your route</li>
            </ul>

      </div>
        <div class="text_wallet md:absolute  mb-5 md:mb-0 md:top-96 md:left-1/4">

            <BreezeButton class="bg-white">Fund your wallet </BreezeButton>
            <ul  class="mt-5">
              <li>Multiple fiat & crypto wallets </li>
            </ul>

      </div>
      <div class="text_transact md:absolute  mb-5 md:mb-0 md:top-72 md:right-80 ">

            <BreezeButton class="bg-white">Transact</BreezeButton>
              <ul  class="mt-5">
              <li>Easy settlement </li>
                <li>Instant payout to bank account</li>
            </ul>

      </div>
      <span class="line_1 hidden md:block">
        <img  src="/images/line1.png"/>
      </span>
       <span class="line_2 hidden md:block">
         <img  src="/images/line2.png"/>
      </span>
       <span class="line_3 hidden md:block">
         <img  src="/images/line3.png"/>
      </span>
       <span class="plane hidden md:block">
        <img  src="/images/plane.png"/>
      </span>

  </div>

           </div>
            <div class="banner_b text-center md:absolute md:bottom-16 md:left-1/2">
            <BreezeButton class="bg-white">Register now</BreezeButton>

          </div>
 </section>
</template>
<script>
import BreezeButton from "@/Components/Button.vue";
export default {
  components: {
    BreezeButton,
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
  @media(max-width:900px){
    transform:none;
  }
}
.line_1{
  position: absolute;
    top: 23rem;
    left: 8rem;
}
.line_2{
  position: absolute;
    left: 38%;
    top: 15rem;
}
.line_3{
  position: absolute;
       top: 15rem;
    right: 7rem;
    transform: rotate(27deg);
}
.plane{
  position:absolute;
  right: 5px;
   top: 14rem;
}
</style>