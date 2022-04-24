

<template>
  <AdminLayout>

    <template #title>
      Products
    </template>
    <template #default>
      <Products :products="products"/>
    </template>
  </AdminLayout>
</template>

<script>

import AdminLayout from '@/Layouts/AdminLayout';
import Products from "@/Dashboard/AdminProducts/index";


export default {
  props:['auth','products'],
  components: {

    Products,
    AdminLayout
  },
  setup() {
    return {

    };
  },
};
</script>