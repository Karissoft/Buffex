<template lang="">
<div  class="w-screen h-screen bg-purple-50 overflow-auto">
    <div >
<TopBar/>
  </div>
  <div class="flex flex-col md:flex-row">
   <div class="md:w-1/6"> <SideBar/></div>
    <div class="md:w-5/6"> <MainPage/></div>
  </div>
</div>
</template>
<script>
import SideBar from './sidebar';
import TopBar from './topbar';
import MainPage from './mainpage';
export default {
components: {
  SideBar,
  TopBar,
  MainPage
}
}
</script>
<style lang="">

</style>