<template >
  <section id="coinbanner" class=" p-4 md:p-8">
    <div class="bgi rounded-3xl flex justify-between md:justify-around items-center p-3">
      <span class="flex flex-col md:flex-row items-center text-center md:text-left p-2">
        <img src="/images/onecoin.png" alt="" class="w-8 md:w-16 mb-3 md:mb-0 mb-3 md:mr-3" />
        <span>
          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">BTC/USDT</span>
            <span class="text-green-300">17.8%</span>
          </span>

          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">$43,0000</span>
            <span class="text-slate-200">Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center text-center md:text-left  p-2">
        <img src="/images/ethereum.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">BTC/USDT</span>
            <span class="text-green-300">17.8%</span>
          </span>

          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">$43,0000</span>
            <span class="text-slate-200">Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center text-center md:text-left  p-2">
        <img src="/images/btccoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">BTC/USDT</span>
            <span class="text-green-300">17.8%</span>
          </span>

          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">$43,0000</span>
            <span class="text-slate-200">Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center text-center md:text-left  p-2">
        <img src="/images/adacoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">BTC/USDT</span>
            <span class="text-green-300">17.8%</span>
          </span>

          <span class="flex justify-between text-[0.5rem] md:text-md">
            <span class="text-slate-200 pr-3">$43,0000</span>
            <span class="text-slate-200">Last 1hr</span>
          </span>
        </span>
      </span>
    </div>
  </section>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
#coinbanner {
  div.bgi {
    background-image: url("/images/coinbanner.png");
    height: 200px;
    background-size: cover;
  }
}
</style>