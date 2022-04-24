

<template>
  <AdminLayout>

    <template #title>
      Orders
    </template>
    <template #default>
      <Orders :orders="orders"/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Orders from "@/Dashboard/Orders/index";


export default {
  props:['auth','orders'],
  components: {

    Orders,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>