<template lang="">
 <section id="faqs" class="h-full ">
    <div class="container mx-auto pt-24 pb-20 h-full p-3">
      <div class="flex justify-center mb-4">
        <span class="text-center mr-6">
          <span class="text-3xl md:text-5xl font-bold">F.</span> <br>
          <span class="font-bold">Frequently</span>
        </span>
         <span class="text-center mr-6">
          <span class="text-3xl md:text-5xl font-bold">A.</span> <br>
          <span class="font-bold">Asked</span>
        </span>
         <span class="text-center">
          <span class="text-3xl md:text-5xl font-bold">Q.</span> <br>
          <span class="font-bold">Questions</span>
        </span>
      </div>

      <div>
      <details>
          <summary> Who can use Buffex?</summary>
          <ul>
            <li>Anyone can use buffex. But you need to have a cryptocurrency wallet either on Buffex or with any other provider.</li>
          </ul>
      </details>
       <details>
          <summary>How can I access my Buffex Wallet?</summary>
          <ul>
            <li>To access your buffex wallet, simply head to <a href="https://app.buffex.co/" class="text-purple-600">https://app.buffex.co/</a>
</li>
          </ul>
      </details>
       <details>
          <summary>  How long does it take for a transaction to be completed on Buffex?</summary>
          <ul>
            <li>Typically it takes less than 5minutes to start and end a transaction on buffex. However, our default timer for instant payout transactions is set at 15mins.</li>
          </ul>
      </details>
       <details>
          <summary>What currencies does Buffex support?</summary>
          <ul>
            <li>Buffex accepts 15 cryptocurrencies at the moment to check it out go to <a href="https://instantpay.buffex.co/" class="text-purple-600">https://instantpay.buffex.co/</a></li>
          </ul>
      </details>
       <details>
          <summary> Will my bank not block my account since it's a crypto transaction?
</summary>
          <ul>
            <li>Payment description will not reflect cryptocurrency so you have nothing to worry about.</li>
          </ul>
      </details>
        <details>
          <summary> I want to buy crypto how do I do that?
</summary>
          <ul>
            <li>Contact us at <a href="mailto:info@buffex.co" class="text-putple-600">info@buffex.co</a></li>
          </ul>
      </details>

      </div>
      <div class="flex justify-end py-3 ">
<span class="flex"><span class="text-sm">Click for more</span>  <img src="/images/star.png" class="w-4 h-4 ml-3"></span>
      </div>

  </div>
 </section>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
#faqs {
  .container {
    background-image: url("/images/b.png");
    background-repeat: no-repeat;
    background-position: right;
    background-size: contain;
  }
}
ul {
  li {
    padding: 5px 15px;

    font-size: .9rem;
  }
}
</style>