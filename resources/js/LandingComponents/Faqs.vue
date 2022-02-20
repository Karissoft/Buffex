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
        <ul>
          <li><img src="/images/star.png" class="w-6 h-6 mr-3"> Who can use Buffex?</li>
           <li><img src="/images/star.png" class="w-6 h-6 mr-3"> How can I access my Buffex Wallet?</li>
            <li> <img src="/images/star.png" class="w-6 h-6 mr-3"> How long does it take for a transaction to be completed on Buffex? </li>
             <li><img src="/images/star.png" class="w-6 h-6 mr-3"> What currencies does Buffex support?</li>
              <li><img src="/images/star.png" class="w-6 h-6 mr-3"> What currencies does Buffex support?</li>
               <li><img src="/images/star.png" class="w-6 h-6 mr-3"> What currencies does Buffex support?</li>
        </ul>
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
    padding: 15px 5px;
    display: flex;
    font-size: 1.2rem;
  }
}
</style>