<template lang="">
<div  class="w-screen h-screen bg-purple-100 overflow-auto">
    <div >
<TopBar :auth="auth"/>
  </div>
  
  <div class="flex flex-col md:flex-row main_body">
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
  props:['auth'],
components: {
  SideBar,
  TopBar,
  MainPage
}
}
</script>
<style lang="scss" scoped>
.main_body{
  height:calc(100vh - 64px);
}
</style>