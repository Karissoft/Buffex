<template lang="">
<div  class="w-screen h-screen bg-purple-50 overflow-auto">
    <div >
<TopBar/>
  </div>
  <div class="flex">
   <div class="w-1/6"> <SideBar/></div>
    <div class="w-5/6"> <MainPage/></div>
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