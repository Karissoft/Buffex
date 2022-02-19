<template >
  <section id="coinbanner" class="p-4 md:p-8">
    <div class="bgi rounded-3xl p-4">
      <h1 class="text-2xl md:text-4xl mb-4 p-3 text-white font-bold text-center md:text-left">
        Why Choose Buffex?
      </h1>
      <div class="flex flex-col md:flex-row justify-around items-center p-3">
        <div class="text-center mb-4 md:mb-0">
          <img src="/images/padlock.png" alt="" class="w-16 mx-auto" /> <br />
          <span class="text-white text-xl text-center font-bold"
            >Robust cyber <br> security</span
          >
        </div>
        <div class="text-center mb-4 md:mb-0">
          <img src="/images/graph.png" alt="" class="w-16 mx-auto" /><br />
          <span class="text-white text-xl text-center font-bold"
            >Shared<br>property</span
          >
        </div>
        <div class="text-center mb-4 md:mb-0">
          <img src="/images/run.png" alt="" class="w-16 mx-auto" /> <br />
          <span class="text-white text-xl text-center font-bold"
            >Quick <br> response</span
          >
        </div>
        <div class="text-center mb-4 md:mb-0">
          <img src="/images/ship.png" alt="" class="w-16 mx-auto" /><br />
          <span class="text-white text-xl text-center font-bold"
            >Freedom to do <br> more</span
          >
        </div>
      </div>
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
    background-size: cover;
  }
}
</style>