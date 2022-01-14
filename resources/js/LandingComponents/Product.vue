<template >
  <section id="product" class="p-3 md:p-14 pt-24 pb-20">
    <div class="container mx-auto">
      <h1 class="text-center text-2xl md:text-4xl font-bold py-4 md:py-8">
        Our Product Offering
      </h1>
      <carousel :items-to-show="1">
        <slide :key="1">
          <div class="flex items-center">
            <div class="flex flex-col md:flex-row">
              <div class="md:w-3/6 text-center p-5 md:p-10">
                <div class="mb-4">
                  <img src="/images/payout.png" alt="" class="w-36 md:w-auto mx-auto" />
                </div>
                <p class="mb-5 p-10">
                  Experience freedom with access to secure wallets, merchant
                  payment services, instant payouts as a Buffex Private Consumer
                  or Business Owner
                </p>
                <div class="banner_b text-center">
                  <BreezeButton class="bg-white"> Get started</BreezeButton>
                </div>
              </div>
              <div class="flex justify-center md:w-3/6">
                <img src="/images/world.svg" alt="" class="w-32 md:w-3/5" />
                <img
                  src="/images/phone.png"
                  alt=""
                  class="w-28 md:w-2/5 object-contain"
                />
              </div>
            </div>
          </div>
        </slide>
        <slide :key="2">
          <div class="p-5 md:p-16">
            <div class="flex justify-around mb-5">
              <img src="/images/phone.png" class=" w-16 md:w-40  object-contain" alt="" />
              <img
                src="/images/instant.png"
                class="w-16 md:w-40  object-contain"
                alt=""
              />
              <img src="/images/bag.png" class="w-16 md:w-40  object-contain" alt="" />
            </div>
            <p class="md:p-16 mb-4 text-xl md:text-3xl text-center">
              <span class="text-purple-500">Buffex Instant Payout</span>
              provides you the freedom of instant access to payout funds in your
              bank accounts in the currency of your choosing.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-white"> Get started</BreezeButton>
            </div>
          </div>
        </slide>
        <slide :key="3">
          <div class="p-5 md:p-16 relative">
            <div class="flex justify-around mb-5">
              <img
                src="/images/money.png"
                class="w-9/12 mx-auto object-contain"
                alt=""
              />
            </div>
            <p class="p-3 md:p-16 mb-4 text-xl md:text-3xl text-center">
              <span class="text-purple-500"> Buffex Merchant Pay</span> gives
              you the freedom to send and receive payments for merchant and
              lifestyle services with cryptocurrencies.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-white"> Get started</BreezeButton>
            </div>

            <span class="absolute bottom-0 right-0">
              <img src="/images/btc.png" class="w-24"
            /></span>
          </div>
        </slide>
        <slide :key="4">
          <div class="p-5 md:p-16 relative">
            <div class="flex justify-around mb-5">
              <img
                src="/images/money.png"
                class="w-9/12 mx-auto object-contain"
                alt=""
              />
            </div>
            <p class="p-3 md:p-16 mb-4 text-xl md:text-3xl text-center">
              <span class="text-purple-500"> Buffex Wallet</span> empowers you
              as an individuals or business owner with the freedom to trade
              (buy, sell and swap) cryptocurrencies and receive payouts in fiat.
            </p>
            <div class="banner_b text-center">
              <BreezeButton class="bg-white"> Get started</BreezeButton>
            </div>
          </div>
        </slide>
        <slide :key="5">
          <div class="md:p-16 relative">
            <p class="md:p-16 mb-4 text-md md:text-3xl text-center">
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
              <div
                class="
                  text-center
                  p-5
                  bg-blue
                  shadow
                  rounded-lg
                  bg-blue-50
                  md:absolute md:top-0
                  mb-3
                  md:mb-0 md:left-28
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
                  md:absolute
                  mb-3
                  md:mb-0 md:top-36
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
                  md:absolute md:top-72
                  mb-3
                  md:mb-0 md:left-72
                "
              >
                <span class="text-purple-500">Multi-digital Asset Wallet</span>
                <br />
                <span>Learn more</span>
              </div>
            </div>
            <div class="banner_b text-center">
              <BreezeButton class="bg-white">Register Now</BreezeButton>
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