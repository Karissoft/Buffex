<template >
  <section id="about" class="p-3 lg:p-14 pt-24 pb-20">
    <div class="container mx-auto">
      <h1 class="text-center text-2xl lg:text-4xl font-bold pt-4 lg:pt-8">
        Our Product Offering
      </h1>
      <carousel :items-to-show="1" :autoplay="5000" :loop="true">
        <slide :key="1">
          <div class="flex items-center">
            <div class="flex flex-col lg:flex-row">
              <div class="lg:w-3/6 text-center p-5 lg:p-10">
                <div class="mb-4">
                  <img src="/images/payout.png" alt="" class="w-36 lg:w-auto mx-auto" />
                </div>
                <p class="mb-5 p-10">
                  Experience freedom with access to secure wallets, merchant
                  payment services, instant payouts as a <span class="text-purple-500">Buffex Private Consumer</span>
                  or<span class="text-purple-500"> Business Owner</span>
                </p>
                <div class="banner_b text-center">
                  <BreezeButton class="bg-purple-800 text-white"> Get started</BreezeButton>
                </div>
              </div>
              <div class="flex justify-center lg:w-3/6">
                <img src="/images/world.svg" alt="" class="w-32 lg:w-3/5" />
                <img
                  src="/images/phone.png"
                  alt=""
                  class="w-28 lg:w-2/5 object-contain"
                />
              </div>
            </div>
          </div>
        </slide>
        <slide :key="2">
          <div class="p-5 lg:p-16">
            <div class="flex justify-around mb-5">
              <img src="/images/phone.png" class=" w-16 lg:w-40  object-contain" alt="" />
              <img
                src="/images/instant.png"
                class="w-16 lg:w-40  object-contain"
                alt=""
              />
              <img src="/images/bag.png" class="w-16 lg:w-40  object-contain" alt="" />
            </div>
            <p class="lg:p-16 mb-4 text-xl lg:text-2xl text-center">
              <span class="text-purple-500">Buffex Instant Payout</span>
              provides you the freedom of instant access to payout funds in your
              bank accounts in the currency of your choosing.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-purple-800 text-white"> Get started</BreezeButton>
            </div>
          </div>
        </slide>
        <slide :key="3">
          <div class="p-5 lg:p-16 relative">
            <div class="flex justify-around mb-5">
              <img
                src="/images/money.png"
                class="w-9/12 mx-auto object-contain"
                alt=""
              />
            </div>
            <p class="p-3 lg:p-16 mb-4 text-xl lg:text-3xl text-center">
              <span class="text-purple-500"> Buffex Merchant Pay</span> gives
              you the freedom to send and receive payments for merchant and
              lifestyle services with cryptocurrencies.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-purple-800 text-white"> Get started</BreezeButton>
            </div>

            <span class="absolute bottom-0 right-0">
              <img src="/images/btc.png" class="w-24"
            /></span>
          </div>
        </slide>
        <slide :key="4">
          <div class="p-5 lg:p-16 relative">
            <div class="flex justify-around mb-5">
              <img
                src="/images/money.png"
                class="w-9/12 mx-auto object-contain"
                alt=""
              />
            </div>
            <p class="p-3 lg:p-16 mb-4 text-xl lg:text-2xl text-center">
              <span class="text-purple-500"> Buffex Wallet</span> empowers you
              as an individuals or business owner with the freedom to trade
              (buy, sell and swap) cryptocurrencies and receive payouts in fiat.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-purple-800 text-white"> Get started</BreezeButton>
            </div>
          </div>
        </slide>
        <slide :key="5">
          <div class="lg:p-16 relative">
            <p class="lg:p-16 mb-4 text-md lg:text-2xl text-center">
              <span class="text-purple-500"> Buffex </span> is an innovative,
              one-stop financial services platform that gives users premium
              offerings in popular, legacy financial products alongside more
              modern, revolutionary utilities available anywhere in the world
            </p>
            <div class="relative mb-28 text-center">
              <div>
                <img
                  src="/images/grupie.png"
                  class="ml-auto object-contain"
                  alt=""
                />
              </div>
              <!-- <div
                class="
                  text-center
                  p-5
                  bg-blue
                  shadow
                  rounded-lg
                  bg-blue-50
                  lg:absolute lg:top-0
                  mb-3
                  lg:mb-0 lg:left-28
                  w-[80%] lg:w-auto mx-auto
                "
              >
                <span class="text-purple-500">Multi-digital Asset Wallet</span>
                <br />
                <span>Learn more</span>
              </div>
              <div
                class="
                  text-center
                  p-5
                  bg-blue
                  shadow
                  rounded-lg
                  bg-blue-50
                  lg:absolute
                  mb-3
                  lg:mb-0 lg:top-36
                   w-[80%] lg:w-auto mx-auto
                "
              >
                <span class="text-purple-500">Multi-digital Asset Wallet</span>
                <br />
                <span>Learn more</span>
              </div>
              <div
                class="
                  text-center
                  p-5
                  bg-blue
                  shadow
                  rounded-lg
                  bg-blue-50
                  lg:absolute lg:top-72
                  mb-3
                  lg:mb-0 lg:left-72
                   w-[80%] lg:w-auto mx-auto
                "
              >
                <span class="text-purple-500">Multi-digital Asset Wallet</span>
                <br />
                <span>Learn more</span>
              </div> -->
            </div>
            <div class="banner_b text-center">
              <BreezeButton class="bg-purple-800 text-white">Register Now</BreezeButton>
            </div>
          </div>
        </slide>

        <template #addons>
          <navigation />
          <pagination />
        </template>
      </carousel>
    </div>
  </section>
</template>
<script>
import BreezeButton from "@/Components/Button.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
export default {
  components: {
    BreezeButton,
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
};
</script>
<style lang="scss" scoped>
.container {
  background-image: url("/images/b.png");
  background-repeat: no-repeat;
  background-position: right;
  background-size: contain;
}
</style>