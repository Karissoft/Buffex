<template >
  <section id="coinbanner" class=" p-4 md:p-8">
    <div class="bgi grid grid-cols-2 lg:grid-cols-4 rounded-3xl flex justify-between md:justify-around items-center p-3">
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left p-2 mb-5 md:mb-0">
        <img src="/images/onecoin.png" alt="" class="w-8 md:w-16 mb-3 md:mb-0 mb-3 md:mr-3" />
        <span>
          <span class="flex justify-between items-end text-sm">
            <span class="text-slate-100 pr-3 font-bold ">ONE/USDT</span>
            <span class="text-green-300 text-sm">1%</span>
          </span>

          <span class="flex justify-between text-sm">
            <span class="text-slate-100 pr-3 font-bold">$0.566</span>
            <span class="text-slate-100 text-xs" >Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2 mb-5 md:mb-0">
        <img src="/images/ethereum.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between items-end ">
            <span class="text-slate-100 pr-3 font-bold text-sm ">ETH/USDT</span>
            <span class="text-green-300 text-sm">8%</span>
          </span>

          <span class="flex justify-between items-end text-sm">
            <span class="text-slate-100 pr-3 font-bold">$3,300</span>
            <span class="text-slate-100 text-xs" >Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2 ">
        <img src="/images/btccoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between items-end text-sm ">
            <span class="text-slate-100 pr-3 font-bold">BTC/USDT</span>
            <span class="text-green-300 text-sm">1%</span>
          </span>

          <span class="flex justify-between  text-sm">
            <span class="text-slate-100 pr-3 font-bold">$39,400</span>
            <span class="text-slate-100 text-xs" >Last 1hr</span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2">
        <img src="/images/adacoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between text-sm items-end">
            <span class="text-slate-100 pr-3 font-bold">ADA/USDT</span>
            <span class="text-green-300 text-sm">2%</span>
          </span>

          <span class="flex justify-between text-sm">
            <span class="text-slate-100 pr-3 font-bold ">$1.034</span>
            <span class="text-slate-100 text-xs" >Last 1hr</span>
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
    min-height: 200px;
    background-size: cover;
  }
}
</style>