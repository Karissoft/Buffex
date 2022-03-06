<template >
  <section id="coinbanner" class=" p-4 md:p-8">
    <div class="bgi grid grid-cols-2 lg:grid-cols-4 rounded-3xl flex justify-between md:justify-around items-center p-3">
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left p-2 mb-5 md:mb-0">
        <img src="/images/onecoin.png" alt="" class="w-8 md:w-16 mb-3 md:mb-0 mb-3 md:mr-3" />
        <span>
          <span class="flex justify-between items-end text-sm">
            <span class="text-slate-100 pr-3 font-bold ">SOL/USDT</span>
            <span class="text-green-300 text-sm"></span>
          </span>

          <span class="flex justify-between text-sm">
            <span class="text-slate-100 pr-3 font-bold">${{sortcoin('sol')}}</span>
            <span class="text-slate-100 text-xs" ></span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2 mb-5 md:mb-0">
        <img src="/images/ethereum.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between items-end ">
            <span class="text-slate-100 pr-3 font-bold text-sm ">ETH/USDT</span>
            <span class="text-green-300 text-sm"></span>
          </span>

          <span class="flex justify-between items-end text-sm">
            <span class="text-slate-100 pr-3 font-bold">${{sortcoin('eth')}}</span>
            <span class="text-slate-100 text-xs" ></span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2 ">
        <img src="/images/btccoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between items-end text-sm ">
            <span class="text-slate-100 pr-3 font-bold">BTC/USDT</span>
            <span class="text-green-300 text-sm"></span>
          </span>

          <span class="flex justify-between  text-sm">
            <span class="text-slate-100 pr-3 font-bold">${{sortcoin('btc')}}</span>
            <span class="text-slate-100 text-xs" ></span>
          </span>
        </span>
      </span>
      <span class="flex flex-col md:flex-row items-center justify-center text-center md:text-left  p-2">
        <img src="/images/adacoin.png" alt="" class="w-8 md:w-16 md:mr-3 mb-3 md:mb-0" />
         <span>
          <span class="flex justify-between text-sm items-end">
            <span class="text-slate-100 pr-3 font-bold">ADA/USDT</span>
            <span class="text-green-300 text-sm"></span>
          </span>

          <span class="flex justify-between text-sm">
            <span class="text-slate-100 pr-3 font-bold ">${{sortcoin('ada')}}</span>
            <span class="text-slate-100 text-xs" ></span>
          </span>
        </span>
      </span>
    </div>
  </section>
</template>
<script>
export default {
  data() {
    return{
      coins:[]
    }
  },
  mounted() {
    this.getcoins()
  },

  methods: {
    sortcoin(val){
      if(!this.coins.length) return 0.00
     let info = this.coins.find(item=>item.currency.toLowerCase()==val.toLowerCase())
     return info.amount_in_usd
    },
    getcoins(){
      axios.get('https://app.buffex.co/api/prices').then(res=>{
        this.coins = res.data
      })
    }
  }
};
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