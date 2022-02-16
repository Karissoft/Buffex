<template lang="">
 <section class="relative h-full lg:h-[95vh] pb-10">
    <div class="container mx-auto h-full w-full pt-10 lg:pt-20 p-4">
      <h1 class="text-2xl lg:text-4xl font-bold text-center">How does it work?</h1>
    <div class="mb-5 relative pl-8 lg:pl-0">

       <div class="flex justify-between items-center"> <span class="text_work text-sm lg:text-2xl font-bold">
            Using Buffex is as easy as A, B, C</span>

      <div class="text_img mb-5 lg:mb-0">
        <img src="/images/world.svg" class="w-52 lg:w-80"/>
      </div></div>
      <div class="text_signup lg:absolute mb-5 lg:mb-0 lg:top-72">

            <BreezeButton class="bg-white">Sign up</BreezeButton>
            <ul class="mt-5">
              <li>Easy set-up
                </li>
                <li>No long forms
                </li>
                <li>Choose your route</li>
            </ul>

      </div>
        <div class="text_wallet lg:absolute  mb-5 lg:mb-0 lg:top-96 lg:left-1/4">

            <BreezeButton class="bg-white">Fund your wallet </BreezeButton>
            <ul  class="mt-5">
              <li>Multiple fiat & crypto wallets </li>
            </ul>

      </div>
      <div class="text_transact lg:absolute  mb-5 lg:mb-0 lg:top-72 lg:right-80 ">

            <BreezeButton class="bg-white">Transact</BreezeButton>
              <ul  class="mt-5">
              <li>Easy settlement </li>
                <li>Instant payout to bank account</li>
            </ul>

      </div>
      <span class="line_1 hidden lg:block">
        <img  src="/images/line1.png"/>
      </span>
       <span class="line_2 hidden lg:block">
         <img  src="/images/line2.png"/>
      </span>
       <span class="line_3 hidden lg:block">
         <img  src="/images/line3.png"/>
      </span>
       <span class="plane hidden lg:block">
        <img  src="/images/plane.png"/>
      </span>

  </div>

           </div>
            <div class="banner_b text-center lg:absolute lg:bottom-16 lg:left-1/2">
            <BreezeButton class="bg-purple-800 text-white">Register now</BreezeButton>

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